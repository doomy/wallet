<?php

namespace App;

use Base\Controller;
use Module\ExpensesModule;

class Wallet extends Controller {
	public function run() {
		$expensesModule = new ExpensesModule();
		$expensesModule->run();
		$this->presenter->addChild($expensesModule->getComponent());
		echo $this->presenter->render();
	}
}