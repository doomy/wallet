<?php

namespace Model;

use Base\Model;

class ExpensesModel extends Model {
	public function getExpenses() {
		$result = $this->mysqli->query("SELECT description, amount, date_added, mandatory FROM t_expenses LIMIT 15");
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function addExpense($expense) {
		$description = $expense['description'];
		$amount = $expense['amount'];
		$necessary = $expense['necessary'];
		$this->mysqli->query("INSERT INTO t_expenses(description, amount, date_added, mandatory) VALUES('$description', $amount, NOW(), $necessary)");
	}

	public function getExpensesSum() {
		$result = $this->mysqli->query("SELECT SUM(amount) sumAmount FROM t_expenses");
		$obj = $result->fetch_object();
		return $obj->sumAmount;
	}

}