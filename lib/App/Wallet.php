<?php

namespace App;

use Base\Controller;
use Module\ExpensesModule;

class Wallet extends Controller {
	public function run() {
		$expensesModule = new ExpensesModule();
		$expensesModule->run();
		$this->presenter->addChild($expensesModule->getComponent());
		$this->presenter->addStylesheet('css/popup.css');
		echo $this->presenter->render();
	}
}