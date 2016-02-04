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

class ExpensesComponent extends ContainerComponent {
	public function __construct() {
		parent::__construct();
		$this->addChild(ComponentFactory::getComponent(ExpensesTable::class));
		$this->addChild($this->getExpensesFormComponent());
	}

	public function populateExpensesTable($expenses) {
		$expensesTables = $this->getChildrenByClass(ExpensesTable::class);
		$expensesTable = $expensesTables[0];
		$expensesTable->setExpenses($expenses);
	}

	public function readAddedExpense() {
		$inputComponent = $this->getChildByName('add_expense');
		return $inputComponent->receive();
	}

	private function getExpensesFormComponent() {
		$form = ComponentFactory::getComponent(Form::class);
		$textInput = ComponentFactory::getComponent(TextInput::class);
		$textInput->setName("add_expense");
		$textInput->setLabel("Add an expense");
		$form->addChild($textInput);
		return $form;
	}

} 