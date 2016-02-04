<?php
namespace Module;

use Model\ExpensesModel;
use Component\ComponentFactory;
use Component\ExpensesComponent;
use Environment;

class ExpensesModule {
	public function getExpensesComponent() {
		$expensesComponent = ComponentFactory::getComponent(ExpensesComponent::class);
		$model = $this->getModel();
		$added_expense = $expensesComponent->readAddedExpense();
		if ($added_expense) {
			$model->addExpense($added_expense);
		}
		$expensesComponent->populateExpensesTable($model->getExpenses());

		return $expensesComponent;
	}

	private function getModel() {
		$dbh = Environment::get_dbh();
		return new ExpensesModel($dbh->get_mysqli_connection());
	}
}

?>