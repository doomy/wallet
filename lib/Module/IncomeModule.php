<?php

namespace Module;

use Component\ComponentFactory;
use Component\FinOperationComponent;
use Model\IncomeModel;
use Environment;

class IncomeModule {
	private $component;

	public function run() {
		$this->component = ComponentFactory::getComponent(FinOperationComponent::class);
		$this->component->setName('incomeComponent');
		$this->component->init();
		$model = $this->getModel();
		$addedIncome = $this->component->readAddedOperation();
		if ($addedIncome) {
			$model->addIncome($addedIncome);
		}
		$this->component->populateFinOperationTable($model->getIncome());
		$this->component->setTotalAmount($model->getIncomeSum());
		$this->component->setDailyAvg($model->getDailyAverage());
		$this->component->setTitle("Income");
	}

	public function getComponent() {
		return $this->component;
	}

	private function getModel() {
		$dbh = Environment::get_dbh();
		return new IncomeModel($dbh->get_mysqli_connection());
	}
}