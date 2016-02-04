<?php

namespace App;

use Base\Controller;
use Module\ExpensesModule;

class Wallet extends Controller {
	public function run() {
		$expensesModule = new ExpensesModule();
		$this->presenter->addChild($expensesModule->getExpensesComponent());
		echo $this->presenter->render();
	}
}