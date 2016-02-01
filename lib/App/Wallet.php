<?php

namespace App;

use Base\Controller;
use Component\ComponentFactory;
use Component\Form;
use Template;

class Wallet extends Controller {
	public function run() {
		$form = ComponentFactory::getComponent(Form::class);

		$this->presenter->addChild($form);
		echo $this->presenter->render();
	}
}