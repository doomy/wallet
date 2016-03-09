<?php

namespace Module;

use Model\TracedDateModel;

class TracedDatesModule {
	public function updateTracedDates() {
		$model = new TracedDateModel(\Environment::get_dbh()->get_mysqli_connection());

		$lastDateStr = $model->getLastDate();
		$currentDate = new \DateTime();
		$currentDateStr = $currentDate->format('Y-m-d');
		while ($lastDateStr != $currentDateStr)  {
			$lastDate = new \DateTime($lastDateStr);
			$lastDate->add(\DateInterval::createFromDateString("1 day"));
			$lastDateStr = $lastDate->format('Y-m-d');
			$model->insertDate($lastDateStr);
		}
	}
}