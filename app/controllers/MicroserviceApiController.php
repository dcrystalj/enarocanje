<?php

class MicroserviceApiController extends BaseController
{
	public function getTimetable($id)
	{
		
		$id=1;
		$workingHours = Whours::where('macservice_id',$id)->orderBy('day')->get();
		$timetable = [];
		$lastday = 0;
		$j=0;
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

				while(isset($workingHours[$i]) && $workingHours[$i]->day == $day){

					$timetable[] = array(
						"id"       => "$j",
						"title"    => "",
						"start"    => date("Y-m-d", strtotime("$start")) . " " . $from, 
						"end"      => date("Y-m-d", strtotime("$start")) . " " . $workingHours[$i]->from,
						"allDay"   => false,
						'eventType' => 'free',
					);

					$from = $workingHours[$i]->to;
					$i++;
				}


				$timetable[] = array(
						"id"       => "$j",
						"title"    => "",
						"start"    => date("Y-m-d", strtotime("$start")) . " " . $from, 
						"end"      => date("Y-m-d", strtotime("$start")) . " " . "23:59:59",
						"allDay"   => false,
						'eventType' => 'free',
				);

			}else{ //is day off

				$timetable[] = array(
					"id"       => "$j",
					"title"    => "",
					"start"    => date("Y-m-d", strtotime("$start")) . " " . "00:00:00" ,
					"end"      => date("Y-m-d", strtotime("$start")) . " " . "23:59:59" ,
					"allDay"   => false,
					'eventType' => 'free',

				);

			}
			$start =  date("Y-m-d", strtotime("$start +1 day"));

		}

		return Response::json($timetable);
	}

	public function getUsertimetable($id)
	{
		$timetable =[];
		//TODO
		$micserviceid = 1;
		$userid = 35;


		$r = Reservation::where('microservice',$micserviceid)
						->where('user',$userid)
						->get();
		$j = 1000;
		foreach ($r as $b) 
		{
			$date        = $b->date;
			$title       = "Your reservation: \nfrom  " . $b->from ." to " . $b->to;

			$timetable[] = array(
					"id"	 => $b->id,
					"title"  => $title,
					"start"  => $date . " " . $b->from ,
					"end"    => $date . " " . $b->to ,
					"allDay" => false,
					'eventType' => 'reservation',
			);
			$j++;
		}

		return Response::json($timetable);
	}

	public function postReservation($id){
		$userid = 35;
		$microservid = 1;
		$events = Input::get('event');
		$event = json_decode($events);

		$date = date('Y-m-d', strtotime($event->start)); //Monday - day 0
		$start = date('G:i', strtotime($event->start));
		$end = date('G:i', strtotime($event->end));

		$r               = new Reservation;
		$r->from         = $start;
		$r->to           = $end;
		$r->microservice = $microservid;
		$r->date          = $date;
		$r->user 		 = $userid;
		$r->save();

		if($r){
			return json_encode(array('success'=>true,'text'=>'Sucessfully deleted'));
		}
	}

	public function postDeletereservation($id){
		$userid = 35;
		$microservid = 1;

 		$r = Reservation::where('microservice',$microservid)
					->where('id',Input::get('event'))
					->where('user',$userid)
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
		$timetable = [];

		foreach ($workingHours as $wh) 
		{
			$date = $start+$wh->day*3600*24; // offset
			$timetable[] = array(
				"id"	 => $wh->id,
				"title"  => "",
				"start"  => date("Y-m-d", $date) . " " . $wh->from ,
				"end"    => date("Y-m-d", $date) . " " . $wh->to ,
				"allDay" => false,
				'eventType' => 'work',
			);
		}
		return Response::json($timetable);
	}

	public function getBreaks($id) {
		
		$break = Breakt::where('macservice_id',$id)->get();
		$timetable = [];

		$start = date("Y-m-d", Input::get('start')); //get start day
		$end   = date("Y-m-d", Input::get('end'));

		while(strcmp($start,$end)<=0)
		{

			$day = $this->stringToDay(date("l",strtotime("$start"))); //get from 0 to 6 what day is it

			//are there any breaks today?
			if($this->isDayInArray($break, $day))
			{
				$i=0;
				while($break[$i]->day != $day){
					$i++;
				}
	
				while(isset($break[$i]) && $break[$i]->day == $day)
				{
					$timetable[] = array(
						"id"       => "1",
						"title"    => "",
						"start"    => date("Y-m-d", strtotime("$start")) . " " . $break[$i]->from, 
						"end"      => date("Y-m-d", strtotime("$start")) . " " . $break[$i]->to,
						"allDay"   => false,
						'eventType' => 'break',
					);
					$i++;
				}
			}
			$start =  date("Y-m-d", strtotime("$start +1 day"));
		}
		return Response::json($timetable);
	}


	//----------------------------------------
	//helpers
	//----------------------------------------
	protected function dayToString($i){
		$day[0]="Monday";
		$day[1]="Tuesday";
		$day[2]="Wednesday";
		$day[3]="Thursday";
		$day[4]="Friday";
		$day[5]="Saturday";
		$day[6]="Sunday";
		return $day[$i];
	}
	protected function stringToDay($i){
		$day['Monday'] = 0;
		$day['Tuesday'] = 1;
		$day['Wednesday'] = 2;
		$day['Thursday'] = 3;
		$day['Friday'] = 4;
		$day['Saturday'] = 5;
		$day['Sunday'] = 6;
		return isset($day[$i])?$day[$i]:'';
	}

	protected function isDayInArray($workingHours,$day){
		
		for ($i=0; $i < count($workingHours); $i++) { 
			if($workingHours[$i]->day == $day){
				return true;
			}
		} 
		return false;
	}
}
