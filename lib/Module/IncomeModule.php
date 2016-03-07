<?php

namespace Module;

use Component\ComponentFactory;
use Component\FinOperationComponent;

class IncomeModule {
	private $component;

	public function run() {
		$this->component = ComponentFactory::getComponent(FinOperationComponent::class);
		$this->component->setName('incomeComponent');
		$this->component->init();

		$model = array();
		$model[] = array("a" => "b");
		$this->component->populateFinOperationTable($model);
		$this->component->setTotalAmount(123);
		$this->component->setTitle("Income");
	}

	public function getComponent() {
		return $this->component;
	}
}