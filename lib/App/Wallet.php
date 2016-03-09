<?php

namespace App;

use Base\Controller;
use Module\ExpensesModule;
use Module\IncomeModule;
use Module\SummaryModule;
use Module\TracedDatesModule;

class Wallet extends Controller {
	public function run() {
		$tracedDatesModule = new TracedDatesModule();
		$tracedDatesModule->updateTracedDates();
		$summaryModule = new SummaryModule();
		$this->presenter->addChild($summaryModule->getComponent());
		$expensesModule = new ExpensesModule();
		$expensesModule->run();
		$this->presenter->addChild($expensesModule->getComponent());
		$incomeModule = new IncomeModule();
		$incomeModule->run();
		$this->presenter->addChild($incomeModule->getComponent());

		$this->presenter->addStylesheet('css/popup.css');
		echo $this->presenter->render();
	}


}