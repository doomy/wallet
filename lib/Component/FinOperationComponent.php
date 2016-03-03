<?php
/**
 * Created by PhpStorm.
 * User: doomy
 * Date: 4.2.16
 * Time: 8:34
 */

namespace Component;

use Component\Table;
use Component\Form;
use Component\Input\TextInput;
use Component\Input\Number;
use Component\Input\Checkbox;
use Component\Text as TextComponent;
use Component\Popup;

class FinOperationComponent extends ContainerComponent {
	private $supportNecessaryFlag = false;

	public function init() {
		$this->addChild(ComponentFactory::getComponent(Table::class));
        $popup = ComponentFactory::getComponent(Popup::class);
        $form = $this->getFinOperationFormComponent();
        $popup->addChild($form);
		$this->addChild($popup);
		$this->addChild($this->getTotalAmountComponent());
	}

	public function populateFinOperationTable($operations) {
		$operationTables = $this->getChildrenByClass(Table::class);
		$operationTable = $operationTables[0];
		$operationTable->setData($operations);
	}

	public function readAddedOperation() {
		$inputComponent = $this->getChildByName('add_fin_operation');
		$description = $inputComponent->receive();
		$amountComponent = $this->getChildByName('add_fin_operation_amount');
		$amount = $amountComponent->receive();
		if ($amount && $description) {
			$result = array(
				'description' => $description,
				'amount'	  => $amount
			);
			if ($this->supportNecessaryFlag) {
				$necessaryCbComponent = $this->getChildByName("cbNecessary");
				$result['necessary'] = $necessaryCbComponent->receive() ? 1 : 0;
			}

			return $result;
		}
		return false;
	}

	public function setTotalAmount($amount) {
		$amountComponent = $this->getChildByName('totalAmount');
		$amountComponent->setText("Total: $amount");
	}

	public function setNecessaryFlagSupport($support) {
		$this->supportNecessaryFlag = $support;
	}

	private function getFinOperationFormComponent() {
		$form = ComponentFactory::getComponent(Form::class);
		$textInput = ComponentFactory::getComponent(TextInput::class);
		$textInput->setName("add_fin_operation");
		$textInput->setLabel("Add operation");
		$form->addChild($textInput);
		$amountInput = ComponentFactory::getComponent(Number::class);
		$amountInput->setName("add_fin_operation_amount");
		$amountInput->setLabel("Add amount");
		$form->addChild($amountInput);
		if ($this->supportNecessaryFlag) {
			$checkboxInput = ComponentFactory::getComponent(Checkbox::class);
			$checkboxInput->setName("cbNecessary");
			$checkboxInput->setLabel("Is necessary?");
			$form->addChild($checkboxInput);
		}

		return $form;
	}

	private function getTotalAmountComponent() {
		$textComponent = (ComponentFactory::getComponent(TextComponent::class));
		$textComponent->setName('totalAmount');
		return $textComponent;
	}
}