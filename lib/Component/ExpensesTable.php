<?php

namespace Component;

class ExpensesTable extends Component {
	protected $templateFileName = 'component/expenses_table.tpl.php';
	public $expenses;

	public function setExpenses($expenses) {
		$this->expenses = $expenses;
	}
}

?>