<?php

namespace Model;

use Base\Model;

class TracedDateModel extends Model {
	public function getLastDate() {
		$result = $this->mysqli->query("SELECT MAX(traced_date) AS lastDate FROM t_traced_date");
		$row = $result->fetch_object();
		return $row->lastDate;
	}

	public function insertDate($date) {
		$sql = "INSERT INTO t_traced_date (traced_date) VALUES ('$date');";
		$this->mysqli->query($sql);
	}
}