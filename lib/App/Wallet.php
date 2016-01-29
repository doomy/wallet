<?php

namespace App;

use Base\Controller;
use Component\Presenter;
use Component\ComponentFactory;
use Component\Form;
use Template;

class Wallet extends Controller {
	public function run() {
		$form = ComponentFactory::getComponent(Form::class);
		$presenter = ComponentFactory::getComponent(Presenter::class);
		$presenter->addChild($form);
		echo $presenter->render();
	}
}