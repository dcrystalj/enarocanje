<?php

class MicroserviceApiController extends BaseController
{
	public function getTimetable($id)
	{
		if(Auth::user() && !Auth::user()->isProvider())
		{
			$workingHours = Cache::remember('timetable'.$id, 10, function() use ($id)
			{
			    return Whours::where('macservice_id',$id)->orderBy('day')->get();
			});
		}
		else
			$workingHours = Whours::where('macservice_id',$id)->orderBy('day')->get();

		$one_day = 3600*24; // Ugly: First day = monday
		$start = Input::get('start')+$one_day; //get start day
		$end   = Input::get('end')+$one_day;

		$timetable = Events::invert($start, $end, $workingHours);
		return Response::json($timetable);
	}

	public function getUsertimetable($id)
	{
		if(Auth::guest())
		{
			return [];
		}
		$timetable = array();
		$micserviceid = $id;
		$userid = Auth::user()->id;

		$r = Reservation::where('micservice_id',$micserviceid)
						->where('user_id',$userid)
						->where('date','>=',Input::get('start'))
						->get();
		foreach ($r as $b) 
		{
			$date  = $b->date;
			$title = "From: ";
			$title .= date('G:i',strtotime($b->from)) ." to ";
			$title .= date('G:i',strtotime($b->to));

			$timetable[] = array(
					"id"        => $b->id,
					"title"     => $title,
					"start"     => $date . " " . $b->from ,
					"end"       => $date . " " . $b->to ,
					"allDay"    => false,
					'eventType' => 'reservation',
			);
		}

		return Response::json($timetable);
	}

	public function getAllreservation($id){
		if(Auth::guest())
		{
			return [];
		}
		$timetable = array();
		$micserviceid = $id;
		$userid = Auth::user()->id;

		$r = Reservation::where('micservice_id',$micserviceid)
						//->where('user_id',$userid)
						//->where('date','>=',Input::get('start'))
						->get();
		foreach ($r as $b) 
		{
			$timetable[] = array(
					"id"        => "r".$b->id,
					"title"     => User::find($b->user_id) ? User::find($b->user_id)->email : 'x',
					"start"     => $b->date . " " . $b->from ,
					"end"       => $b->date . " " . $b->to ,
					"allDay"    => false,
					'eventType' => 'reservation',
			);
		}

		return Response::json($timetable);
	}

	public function postReservation($id){
		$userid      = Auth::user()->id;
		$microservid = $id;
		$events      = Input::get('event');
		$event       = json_decode($events);
		
		$date        = date('Y-m-d', strtotime($event->start));
		$start       = date('G:i', strtotime($event->start));
		$end         = date('G:i', strtotime($event->end));

		//cant make reservation on yesterday =)
		if(strtotime($date) < strtotime(date('Y-m-d')))
		{
			return json_encode(array(
				'success' => false,
				'text'    => 'Cannot make reservation on passed days')
			);
		}

		$r                = new Reservation;
		$r->from          = $start;
		$r->to            = $end;
		$r->micservice_id = $microservid;
		$r->date          = $date;
		$r->user_id       = $userid;
		$r->save();
		//return json_encode(['a'=> $r->microservice->name]);
		if($r){

			$data = array(
				'username'  => Auth::user()->name,
				'useremail' => Auth::user()->email,
				'date'      => $r->date,
				'from'      => $r->from,
				'name'      => Service::serviceName($id),
			);

			Queue::getIron()->ssl_verifypeer = false;
			Mail::queue('emails.reservation.customer', $data, function($m) use ($data)
			{
			    $m->to(
		    		$data['useremail'], 
		    		$data['username']
		    	)
		    	->subject('Successful reservation!');
			});

			Mail::queue('emails.reservation.provider', $data, function($m) use ($r)
			{
			    $m->to(
		    		$r->microservice->macroservice->email, 
		    		$r->microservice->macroservice->name
		    	)
		    	->subject('Successful reservation!');
			});

			return json_encode(array('success'=>true,'text'=>'Sucessfull reservation'));
		}
		return json_encode(array('success'=>false,'text'=>'Unucessfully created reservation'));

	}

	public function postDeletereservation($id,$reservationid){
		$userid = Auth::user()->id;
		$microservid = $id;

 		$r = Reservation::where('id',$reservationid)
			->where('micservice_id',$microservid)
			->where('user_id',$userid)
			->delete();

		if($r)			
			return json_encode(array('success'=>true,'text'=>'Sucessfully deleted.'));
		else
			return json_encode(array('success'=>false,'text'=>'Unucessfully deleted, please try again.'));

	}

	public function getWorkinghours($id)
	{
		$start = Input::get('start')+(24*3600); //get first day
				
		$workingHours = Whours::where('macservice_id',$id)->get();
		$timetable = array();

		foreach ($workingHours as $wh) 
		{
			$date = $start+$wh->day*3600*24; // offset
			$timetable[] = array(
				"id"        => $wh->id,
				"title"     => "",
				"start"     => date("Y-m-d", $date) . " " . $wh->from ,
				"end"       => date("Y-m-d", $date) . " " . $wh->to ,
				"allDay"    => false,
				'eventType' => 'work',
			);
		}
		return Response::json($timetable);
	}

	public function getBreaks($id) {
		if(Auth::user() && !Auth::user()->isProvider())
		{
			$breaks = Cache::remember('breaks'.$id, 10, function() use ($id)
			{
			    return Breakt::where('macservice_id',$id)->get();
			});
		}
		else
			$breaks = Breakt::where('macservice_id',$id)->get();

		$timetable = array();

		$start = Input::get('start')+3600*24; //get start day
		foreach($breaks as $break) {
			$date = $start+$break->day*3600*24; // offset
			$timetable[] = array(
				"id"        => 'brk'.$break->id,
				"title"     => "",
				"start"     => date("Y-m-d", $date) . " " . $break->from, 
				"end"       => date("Y-m-d", $date) . " " . $break->to,
				"allDay"    => false,
				'eventType' => 'break',
			);
		}
		return Response::json($timetable);
	}

	public function getAbsences($id) {
		$start =  date('Y-m-d H:i:s', Input::get('start'));
		$end =  date('Y-m-d H:i:s', Input::get('end'));

		$absences = Absences::where('macservice_id', $id)					
					->where(function($q) use($start, $end) {
						$q  ->where('repetable',0)
							->where(function($q1) use($start, $end){
								$q1->where(function($query) use($start, $end){
							 		$query	->where('from', '<=', $start)
											->where('to', '>', $start);
								})
								->orWhere(function($query) use($start, $end){
							 		$query	->where('from', '>=', $start)
											->where('from', '<', $end);
								});
							})//for repeatable
							->orWhere('repetable',1);
					})->get();

		$table = array();
		foreach($absences as $absence) {
			$datef = (new ExpressiveDate($start));
			$datet = (new ExpressiveDate($start));
			$from = (new ExpressiveDate($absence->from))->setYear($datef->getYear())->getDateTime();
			$to   = (new ExpressiveDate($absence->to))->setYear($datet->getYear())->getDateTime();
			$f = strtotime($from);
			$t = strtotime($to);
			//set things to current year
			if($absence->repetable == 1)
			{

				if(!($f <= $start && $t > $start ||
					$f >= $start && $f < $start))
					continue;
			}

			if($f == $t) continue;

			$table[] = array(
				"id"        => 'abs'.$absence->id,
				"title"     => "",
				"start"     => $from,
				"end"       => $to,
				"allDay"    => false,
				'eventType' => 'break',
			);
		}
		return Response::json($table);
	}

	public function postRegistration($microservid){
		
		$events = Input::get('event');
		$event  = json_decode($events);
		
		$date   = date('Y-m-d', strtotime($event->start)); //Monday - day 0
		$start  = date('G:i', strtotime($event->start));
		$end    = date('G:i', strtotime($event->end));
		$name   = $event->data->name;
		$mail   = $event->data->mail;

		if(	is_null(User::whereEmail($mail)->first()) ||
			!is_null(User::whereEmail($mail)->first()) &&
			User::whereEmail($mail)->first()->isTmpuser())
		{	
			if(!is_null(User::whereEmail($mail)->first()) && 
				User::whereEmail($mail)->first()->isTmpuser())
			{
				$tempuser = User::whereEmail($mail)->first();
				Reservation::where('user_id',$tempuser->id)
							->where('micservice_id',$microservid)
							->delete();
			}
			else
			{
				$tempuser     = new User;
			}
			$tempuser->email  = $mail;
			$tempuser->name   = $name;
			$tempuser->telephone = $event->data->telephone;
			$tempuser->status = -1;
			$tempuser->save();
		
			Session::put('user',$tempuser);
			Auth::login($tempuser);
			
			$r                = new Reservation;
			$r->from          = $start;
			$r->to            = $end;
			$r->micservice_id = $microservid;
			$r->date          = $date;
			$r->user_id       = $tempuser->id;
			$r->save();

			$mic      = MicroService::find($microservid);
			$category = $mic->category;
			$name     = Service::services()[$category][$mic->name];

			$data = array(
				'username'  => $tempuser->name,
				'useremail' => $tempuser->email,
				'date'      => $r->date,
				'from'      => $r->from,
				'name'      => $name,
			);

			Queue::getIron()->ssl_verifypeer = false;
			Mail::queue('emails.reservation.customer', $data, function($m) use ($data)
			{
			    $m->to(		    		
		    		$data['useremail'], 
		    		$data['username']
		    	)
		    	->subject('Successful reservation!');
			});

			Mail::queue('emails.reservation.provider', $data, function($m) use ($r)
			{
			    $m->to(
		    		$r->microservice->macroservice->email, 
		    		$r->microservice->macroservice->name
		    	)
		    	->subject('Successful reservation!');
			});

			return json_encode(array('success'=>true,'text'=>'Sucessfully saved'));
		}
		return json_encode(array('success'=>false,'text'=>'Email is already taken, please login first'));
	}


	//----------------------------------------
	//helpers
	//----------------------------------------
	protected function dayToString($i){
		$day[0] = "Monday";
		$day[1] = "Tuesday";
		$day[2] = "Wednesday";
		$day[3] = "Thursday";
		$day[4] = "Friday";
		$day[5] = "Saturday";
		$day[6] = "Sunday";
		return $day[$i];
	}
	protected function stringToDay($i){
		$day['Monday']    = 0;
		$day['Tuesday']   = 1;
		$day['Wednesday'] = 2;
		$day['Thursday']  = 3;
		$day['Friday']    = 4;
		$day['Saturday']  = 5;
		$day['Sunday']    = 6;
		return isset($day[$i])?$day[$i]: '';
	}

	protected function isDayInArray($workingHours,$day){
		
		for ($i=0; $i < count($workingHours); $i++) { 
			if($workingHours[$i]->day == $day){
				return true;
			}
		} 
		return false;
	}

	protected function timetableArray($id, $start, $from, $to){
		$array =  array(
						"id"        => "tt$id",
						"title"     => "",
						"start"     => date("Y-m-d", strtotime("$start")) . " " . $from, 
						"end"       => date("Y-m-d", strtotime("$start")) . " " . $to,
						"allDay"    => false,
						'eventType' => 'free'
					);
		return $array;
	}
}
