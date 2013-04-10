<?php

class MicroserviceApiController extends BaseController
{
	public function getTimetable($id)
	{
		
		$id=1;
		$workingHours = Whours::where('macservice_id',$id)->orderBy('day')->get();
		$timetable = [];
		$from = "00:00:00";
		$lastday = 0;
		$j=0;
		foreach ($workingHours as $wh) 
		{
			while($lastday < $wh->day)
			{
				$day = $this->dayToString($lastday);
				$timetable[] = array(
					"id"	 => "$j",
					"title"  => "",
					"start"  => date("Y-m-d", strtotime("$day this week")) . " " . $from ,
					"end"    => date("Y-m-d", strtotime("$day this week")) . " " . "23:59:59" ,
					"allDay" => false,
					"editable"=> false,
				);
				$from = "00:00:00";
				$lastday ++;
				$j++;
			}
			
			$day = $this->dayToString($wh->day);
			$timetable[] = array(
				"id"	 => "$j",
				"title"  => "",
				"start"  => date("Y-m-d", strtotime("$day this week")) . " " . $from ,
				"end"    => date("Y-m-d", strtotime("$day this week")) . " " . $wh->from ,
				"allDay" => false
			);
			$from = $wh->to;
			$lastday = $wh->day;
			$j++;
		}
		
		while($lastday < 7)
		{
			$day = $this->dayToString($lastday);
			$timetable[] = array(
				"id"	 => "$j",
				"title"  => "",
				"start"  => date("Y-m-d", strtotime("$day this week")) . " " . $from ,
				"end"    => date("Y-m-d", strtotime("$day this week")) . " " . "23:59:59" ,
				"allDay" => false
			);
			$from = "00:00:00";
			$lastday ++;
			$j++;
		}

		//breaks
		$breaks = Breaks::where('macservice_id',$id)->get();
		foreach ($breaks as $b) 
		{
			$day = $this->dayToString($b->day);
			$timetable[] = array(
					"id"	 => "$j",
					"title"  => "",
					"start"  => date("Y-m-d", strtotime("$day this week")) . " " . $b->from ,
					"end"    => date("Y-m-d", strtotime("$day this week")) . " " . $b->to ,
					"allDay" => false,
					"editable"=> false,
				);
			$lastday ++;
			$j++;
		}

		return json_encode($timetable);
	}

	public function getUsertimetable($id)
	{
		$micserviceid = 1;
		$userid = 35;
		$r = Reservation::where('microservice',$micserviceid)
						->where('user',$userid)
						->get();
		$j = 100;
		foreach ($r as $b) 
		{
			$day         = $this->dayToString($b->day);
			$title       = "Your reservation: \nfrom  " . $b->from ." to " . $b->to;

			$timetable[] = array(
					"id"	 => "$j",
					"title"  => $title,
					"start"  => date("Y-m-d", strtotime("$day this week")) . " " . $b->from ,
					"end"    => date("Y-m-d", strtotime("$day this week")) . " " . $b->to ,
					"allDay" => false,
					"editable"=> false,
			);
			$j++;
		}

		return json_encode($timetable);
	}

	public function postReservation($id){

		$microservid = 1;
		$events = Input::get('event');
		$events = json_decode($events);

		$day = ((date('w', strtotime($event->start))-1 + 7*2) % 7); //Monday - day 0
		$start = date('G:i', strtotime($event->start));
		$end = date('G:i', strtotime($event->end));

		$r               = new Reservation;
		$r->from         = $start;
		$r->to           = $end;
		$r->microservice = $microserviceid;
		$r->day          = $day;
		$r->save();

	}

	public function getWorkinghours($id)
	{
		$workingHours = Whours::where('macservice_id',$id)->get();
		$timetable = [];

		foreach ($workingHours as $wh) 
		{
			$day = $this->dayToString($wh->day);
			$timetable[] = array(
				"id"	 => $wh->id,
				"title"  => "",
				"start"  => date("Y-m-d", strtotime("$day this week")) . " " . $wh->from ,
				"end"    => date("Y-m-d", strtotime("$day this week")) . " " . $wh->to ,
				"allDay" => false,
				"editable"=> true,
			);
		}
		return json_encode($timetable);
	}

	public function getBreaks($id) {
		$workingHours = Breaks::where('macservice_id',$id)->get();
		$timetable = [];

		foreach ($workingHours as $wh) 
		{
			$day = $this->dayToString($wh->day);
			$timetable[] = array(
				"id"	 => $wh->id,
				"title"  => "",
				"start"  => date("Y-m-d", strtotime("$day this week")) . " " . $wh->from ,
				"end"    => date("Y-m-d", strtotime("$day this week")) . " " . $wh->to ,
				"allDay" => false,
				"editable"=> true,
			);
		}
		return json_encode($timetable);
	}

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
}
