<?php

namespace App;

use Base\Controller;
use Component\Presenter;
use Template;

class Wallet extends Controller {
	public function run() {
		$template = new Template('index.tpl.php', array());
		$presenter = new Presenter($template);
		echo $presenter->render();
	}
}