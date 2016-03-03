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
		$necessaryCbComponent = $this->getChildByName("cbNecessary");
		$necessary = $necessaryCbComponent->receive() ? 1 : 0;
		if ($amount && $description) {
			return array(
				'description' => $description,
				'amount'	  => $amount,
				'necessary'   => $necessary
			);
		}
		return false;
	}

	public function setTotalAmount($amount) {
		$amountComponent = $this->getChildByName('totalAmount');
		$amountComponent->setText("Total: $amount");
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
		$checkboxInput = ComponentFactory::getComponent(Checkbox::class);
		$checkboxInput->setName("cbNecessary");
		$checkboxInput->setLabel("Is necessary?");
		$form->addChild($checkboxInput);
		return $form;
	}

	private function getTotalAmountComponent() {
		$textComponent = (ComponentFactory::getComponent(TextComponent::class));
		$textComponent->setName('totalAmount');
		return $textComponent;
	}
}