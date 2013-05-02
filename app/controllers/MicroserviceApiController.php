<?php

class MicroserviceApiController extends BaseController
{
	public function getTimetable($id)
	{

		$timetable = array();
		$lastday   = 0;
		$j         = 0;
		$i         = 0;
		
		if(Auth::user() && !Auth::user()->isProvider())
		{
			$workingHours = Cache::remember('timetable'.$id, 10, function() use ($id)
			{
			    return Whours::where('macservice_id',$id)->orderBy('day')->get();
			});
		}
		else
			$workingHours = Whours::where('macservice_id',$id)->orderBy('day')->get();

		$start = date("Y-m-d", Input::get('start')); //get start day
		$end   = date("Y-m-d", Input::get('end'));

		while(strcmp($start,$end)<=0)
		{

			$day = $this->stringToDay(date("l",strtotime("$start"))); //get from 0 to 6 what day is it
			//is not day off?
			if($this->isDayInArray($workingHours, $day))
			{

				$from = "00:00:00";
				$i=0;
				while($workingHours[$i]->day != $day){
					$i++;
				}
				while(isset($workingHours[$i]) && $workingHours[$i]->day == $day)
				{
					$timetable[] = $this->timetableArray($i,$start,$from,$workingHours[$i]->from);
					$from = $workingHours[$i]->to;
					$i++;
					$j++;
				}

				$timetable[] = $this->timetableArray($j,$start,$from,"23:59:59");

			}else{ //is day off

				$timetable[] = $this->timetableArray($i,$start,"00:00:00","23:59:59");

			}
			$start =  date("Y-m-d", strtotime("$start +1 day"));
			$j++;

		}

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
						->get();
		foreach ($r as $b) 
		{
			$date  = $b->date;
			$title = "Your reservation: \nfrom  ";
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
				'user'        => Auth::user(),
				'reservation' => $r
			);

			Queue::getIron()->ssl_verifypeer = false;
			Mail::later( 5, 'emails.reservation.provider', $data, function($m) use ($r)
			{
			    $m->to(
		    		$r->microservice->macroservice->user->email, 
		    		$r->microservice->macroservice->user->name
		    	)
		    	->subject('Successful reservation!');
			});

			Mail::queue('emails.reservation.customer', $data, function($m)
			{
			    $m->to(
		    		Auth::user()->email, 
		    		Auth::user()->name
		    	)
		    	->subject('Successful reservation!');
			});

			return json_encode(array('success'=>true,'text'=>'Sucessfull reservation'));
		}
		return json_encode(array('success'=>false,'text'=>'Unucessfully created reservation'));

	}

	public function postDeletereservation($id){
		$userid = Auth::user()->id;
		$microservid = $id;

 		$r = Reservation::where('micservice_id',$microservid)
					// ->where('id',Input::get('event')) //FIXME : je to potrebno?
					->where('user_id',$userid)
					->delete();
		if($r)			
			return json_encode(array('success'=>true,'text'=>'Sucessfully deleted'));
		else
			return json_encode(array('success'=>false,'text'=>'Unucessfully deleted, please try again'));

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
			Breakt::where('macservice_id',$id)->get();

		$timetable = array();

		$start = Input::get('start')+3600*24; //get start day
		foreach($breaks as $break) {
			$date = $start+$break->day*3600*24; // offset
			$timetable[] = array(
				"id"        => $break->id,
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
		$absences = Absence::where('macservice_id', $id)->get();
									   // from >= input('from')
									   // to <= input('to')
		$table = array();
		foreach($absences as $absence) {
			$table[] = array(
				"id"        => $absence->id,
				"title"     => "Absence -title!-",
				"start"     => $absence->from,
				"end"       => $absence->to,
				"allDay"    => false,
				'eventType' => 'break',
			);
		}
		return Response::json($table);
	}

	public function postRegistration($id){
		
		$microservid = $id;
		$events      = Input::get('event');
		$event       = json_decode($events);
		
		$date        = date('Y-m-d', strtotime($event->start)); //Monday - day 0
		$start       = date('G:i', strtotime($event->start));
		$end         = date('G:i', strtotime($event->end));
		$name        = $event->data->name;
		$mail        = $event->data->mail;

		if(is_null(User::whereEmail($mail)->first())){
			$tempuser         = new User;
			$tempuser->email  = $mail;
			$tempuser->name   = $name;
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

			$data = array(
				'user'        => Auth::user(),
				'reservation' => $r
			);
			Queue::getIron()->ssl_verifypeer = false;
			Mail::later( 5, 'emails.reservation.provider', $data, function($m) use ($r)
			{
			    $m->to(
		    		$r->microservice->macroservice->user->email, 
		    		$r->microservice->macroservice->user->name
		    	)
		    	->subject('Successful reservation!');
			});

			Mail::later( 5, 'emails.reservation.customer', $data, function($m)
			{
			    $m->to(
		    		Auth::user()->email, 
		    		Auth::user()->name
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
						"id"        => "$id",
						"title"     => "",
						"start"     => date("Y-m-d", strtotime("$start")) . " " . $from, 
						"end"       => date("Y-m-d", strtotime("$start")) . " " . $to,
						"allDay"    => false,
						'eventType' => 'free'
					);
		return $array;
	}
}
