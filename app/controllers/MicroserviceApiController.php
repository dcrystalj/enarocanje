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
			$title = trans('general.from').": ";
			$title .= date('G:i',strtotime($b->from)) ." ".trans('general.to')." ";
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
				'text'    => trans('messages.cannotMakeOnPast'))
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
			Mail::send('emails.reservation.customer', $data, function($m) use ($data)
			{
			    $m->to(
		    		$data['useremail'], 
		    		$data['username']
		    	)
		    	->subject(trans('messages.successfulReservation'));
			});

			Mail::send('emails.reservation.provider', $data, function($m) use ($r)
			{
			    $m->to(
		    		$r->microservice->macroservice->email, 
		    		$r->microservice->macroservice->name
		    	)
		    	->subject(trans('messages.successfulReservation'));
			});

			return json_encode(array('success'=>true,'text'=>trans('messages.successfulReservation')));
		}
		return json_encode(array('success'=>false,'text'=>trans('messages.unsuccessfulReservation')));

	}

	public function postDeletereservation($id,$reservationid){
		$userid = Auth::user()->id;
		$microservid = $id;

 		$r = Reservation::where('id',$reservationid)
			->where('micservice_id',$microservid)
			->where('user_id',$userid)
			->delete();

		if($r)			
			return json_encode(array('success'=>true,'text'=>trans('messages.successfullyDeleted')));
		else
			return json_encode(array('success'=>false,'text'=>trans('messages.unsuccessfullyDeleted')));

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
		
		$date      = date('Y-m-d', strtotime($event->start)); //Monday - day 0
		$start     = date('G:i', strtotime($event->start));
		$end       = date('G:i', strtotime($event->end));
		$mail      = $event->data->mail;
		$name      = $event->data->name;
		$telephone = $event->data->telephone;
		
		if($telephone == "" || $mail == "")
		{
			return json_encode(array('success'=>false,'text'=>trans('messages.pleaseFill')));
		}

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
			$tempuser->telephone = $telephone;
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
			Mail::send('emails.reservation.customer', $data, function($m) use ($data)
			{
			    $m->to(		    		
		    		$data['useremail'], 
		    		$data['username']
		    	)
		    	->subject(trans('messages.successfulReservation'));
			});

			Mail::send('emails.reservation.provider', $data, function($m) use ($r)
			{
			    $m->to(
		    		$r->microservice->macroservice->email, 
		    		$r->microservice->macroservice->name
		    	)
		    	->subject(trans('messages.successfulReservation'));
			});

			return json_encode(array('success'=>true,'text'=>trans('messages.successfullySaved')));
		}
		return json_encode(array('success'=>false,'text'=>trans('messages.emailTakenPleaseLogin')));
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
	/*
	protected function dayToString($i){
		$day[0] = trans('general.monday');
		$day[1] = trans('general.tuseday')
		$day[2] = trans('general.wednesday')
		$day[3] = trans('general.thursday')
		$day[4] = trans('general.friday')
		$day[5] = trans('general.saturday')
		$day[6] = trans('general.sunday')
		return $day[$i];
	}
	protected function stringToDay($i){
		$day[trans('general.monday')]    = 0;
		$day[trans('general.tuseday')]   = 1;
		$day[trans('general.wednesday')] = 2;
		$day[trans('general.thursday')]  = 3;
		$day[trans('general.friday')]    = 4;
		$day[trans('general.saturday')]  = 5;
		$day[trans('general.sunday')]    = 6;
		return isset($day[$i])?$day[$i]: '';
	} 
	*/

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
