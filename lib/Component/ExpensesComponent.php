<?php
/**
 * Created by PhpStorm.
 * User: doomy
 * Date: 4.2.16
 * Time: 8:34
 */

namespace Component;

use Component\ExpensesTable;
use Component\Form;
use Component\Input\TextInput;
use Component\Input\Number;
use Component\Input\Checkbox;
use Component\Text as TextComponent;

class ExpensesComponent extends ContainerComponent {
	public function __construct() {
		parent::__construct();
		$this->addChild(ComponentFactory::getComponent(ExpensesTable::class));
		$this->addChild($this->getExpensesFormComponent());
		$this->addChild($this->getTotalAmountComponent());
	}

	public function populateExpensesTable($expenses) {
		$expensesTables = $this->getChildrenByClass(ExpensesTable::class);
		$expensesTable = $expensesTables[0];
		$expensesTable->setExpenses($expenses);
	}

	public function readAddedExpense() {
		$inputComponent = $this->getChildByName('add_expense');
		$description = $inputComponent->receive();
		$amountComponent = $this->getChildByName('add_expense_amount');
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
		$amountComponent->setText("Expenses total: $amount");
	}

	private function getExpensesFormComponent() {
		$form = ComponentFactory::getComponent(Form::class);
		$textInput = ComponentFactory::getComponent(TextInput::class);
		$textInput->setName("add_expense");
		$textInput->setLabel("Add an expense");
		$form->addChild($textInput);
		$amountInput = ComponentFactory::getComponent(Number::class);
		$amountInput->setName("add_expense_amount");
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