<?php

namespace Model;

use Base\Model;

class ExpensesModel extends Model {
	public function getExpenses() {
		$result = $this->mysqli->query("SELECT description, amount FROM t_expenses");
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function addExpense($expense) {
		$random_expense = rand();
		$this->mysqli->query("INSERT INTO t_expenses(description, amount) VALUES('$expense', $random_expense)");
	}
}