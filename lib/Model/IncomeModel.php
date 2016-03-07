<?php

namespace Model;

use Base\Model;

class IncomeModel extends Model {
	public function getIncome() {
		$result = $this->mysqli->query("SELECT description, amount, date_added FROM t_income ORDER BY id DESC LIMIT 15");
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function addIncome($income) {
		$description = $income['description'];
		$amount = $income['amount'];
		$this->mysqli->query("INSERT INTO t_income(description, amount, date_added) VALUES('$description', $amount, NOW())");
	}

	public function getIncomeSum() {
		$result = $this->mysqli->query("SELECT SUM(amount) sumAmount FROM t_income");
		$obj = $result->fetch_object();
		return $obj->sumAmount;
	}

	public function getDailyAverage() {
		$result = $this->mysqli->query("
			SELECT AVG(daily_amount) avgDailyAmount FROM (
				SELECT DATE(date_added) added_date, SUM(amount) daily_amount FROM t_income GROUP BY added_date
			) avg_select;");
		$obj = $result->fetch_object();
		return $obj->avgDailyAmount;
	}
}