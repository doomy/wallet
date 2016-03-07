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

		$lastDateStr = $model->getLastDate();
		$currentDate = new \DateTime();
		$currentDateStr = $currentDate->format('Y-m-d');
		while ($lastDateStr != $currentDateStr)  {
			$lastDate = new \DateTime($lastDateStr);
			$lastDate->add(\DateInterval::createFromDateString("1 day"));
			$lastDateStr = $lastDate->format('Y-m-d');
			$model->insertDate($lastDateStr);
		}
	}
}