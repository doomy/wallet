<?php

namespace Model;

use Base\Model;

class ExpensesModel extends Model {
	public function getExpenses() {
		$result = $this->mysqli->query("SELECT description, amount, date_added, mandatory FROM t_expenses");
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function addExpense($expense) {
		$description = $expense['description'];
		$amount = $expense['amount'];
		$this->mysqli->query("INSERT INTO t_expenses(description, amount, date_added) VALUES('$description', $amount, NOW())");
	}

	public function getExpensesSum() {
		$result = $this->mysqli->query("SELECT SUM(amount) sumAmount FROM t_expenses");
		$obj = $result->fetch_object();
		return $obj->sumAmount;
	}

}