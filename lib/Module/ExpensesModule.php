<?php
namespace Module;

use Model\ExpensesModel;
use Component\ComponentFactory;
use Component\FinOperationComponent;
use Environment;

class ExpensesModule {
	private $component;

	public function run() {
		$this->component = ComponentFactory::getComponent(FinOperationComponent::class);
		$this->component->setNecessaryFlagSupport(true);
		$this->component->setName('expensesComponent');
		$this->component->init();
		$model = $this->getModel();
		$added_expense = $this->component->readAddedOperation();
		if ($added_expense) {
			$model->addExpense($added_expense);
		}
		$this->component->populateFinOperationTable($model->getExpenses());
		$this->component->setTotalAmount($model->getExpensesSum());
		$this->component->setDailyAvg($model->getDailyAverage());
		$this->component->setTitle("Expenses");
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