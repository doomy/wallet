<?php

namespace App;

use Base\Controller;
use Module\ExpensesModule;
use Module\IncomeModule;
use Model\TracedDateModel;

class Wallet extends Controller {
	public function run() {
		$this->updateTracedDates();
		$expensesModule = new ExpensesModule();
		$expensesModule->run();
		$this->presenter->addChild($expensesModule->getComponent());
		$incomeModule = new IncomeModule();
		$incomeModule->run();
		$this->presenter->addChild($incomeModule->getComponent());
		$this->presenter->addStylesheet('css/popup.css');
		echo $this->presenter->render();
	}

	private function updateTracedDates() {
		$model = new TracedDateModel(\Environment::get_dbh()->get_mysqli_connection());
		do {
			$lastDate = $model->getLastDate();
			$currentDate = new \DateTime();
			if ($currentDate->format('Y-m-d') != $lastDate) {
				$currentDate->add();
				var_dump($currentDate->format('Y-m-d'));
			}

			die;

		} while (1 == 2);
	}
}