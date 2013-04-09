<?php

class MicroserviceApiController extends BaseController
{
	public function getTimetable($i)
	{
		
		$i=4;
		$workingHours = Whours::where('macservice_id',1)->orderBy('day')->get();
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
