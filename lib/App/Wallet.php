<?php

namespace App;

use Base\Controller;
use Component\Presenter;
use Component\ComponentFactory;
use Template;

class Wallet extends Controller {
	public function run() {
		$presenter = ComponentFactory::getComponent(Presenter::class);
		echo $presenter->render();
	}
}