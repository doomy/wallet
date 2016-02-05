<?php

namespace Model;

use Base\Model;

class ExpensesModel extends Model {
	public function getExpenses() {
		$result = $this->mysqli->query("SELECT description, amount, date_added FROM t_expenses");
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function addExpense($expense) {
		$description = $expense['description'];
		$amount = $expense['amount'];
		$this->mysqli->query("INSERT INTO t_expenses(description, amount, date_added) VALUES('$description', $amount, NOW())");
	}
}