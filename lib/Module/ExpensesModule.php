<?php
namespace Module;

use Model\ExpensesModel;
use Component\ComponentFactory;
use Component\ExpensesComponent;
use Environment;

class ExpensesModule {
	private $component;

	public function run() {
		$this->component = ComponentFactory::getComponent(ExpensesComponent::class);
		$model = $this->getModel();
		$added_expense = $this->component->readAddedExpense();
		if ($added_expense) {
			$model->addExpense($added_expense);
		}
		$this->component->populateExpensesTable($model->getExpenses());
		$this->component->setTotalAmount($model->getExpensesSum());
	}

	public function getComponent() {
		return $this->component;
	}

	private function getModel() {
		$dbh = Environment::get_dbh();
		return new ExpensesModel($dbh->get_mysqli_connection());
	}
}

?>