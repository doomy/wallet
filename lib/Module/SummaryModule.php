<?php
/**
 * Created by PhpStorm.
 * User: doomy
 * Date: 9.3.16
 * Time: 8:44
 */

namespace Module;

use Component\ComponentFactory;
use Component\ContainerComponent;

class SummaryModule {
	public function getComponent() {
		$mainComponent = ComponentFactory::getComponent(ContainerComponent::class);
		$mainComponent->setTitle('Summary');
		$mainComponent->setHtmlClass('component-block');
		return $mainComponent;
	}
} 