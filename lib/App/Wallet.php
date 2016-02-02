<?php

namespace App;

use Base\Controller;
use Component\ComponentFactory;
use Component\Form;
use Component\Input\TextInput;
use Template;

class Wallet extends Controller {
	public function run() {
		$form = ComponentFactory::getComponent(Form::class);
		$textInput = ComponentFactory::getComponent(TextInput::class);
		$form->addChild($textInput);
		$this->presenter->addChild($form);
		echo $this->presenter->render();
	}
}