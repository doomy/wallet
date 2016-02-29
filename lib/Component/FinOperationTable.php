<?php

namespace Component;

class FinOperationTable extends Component {
	protected $templateFileName = 'component/fin_operation_table.twig';
	public $operations;

	public function setOperations($operations) {
		$this->operations = $operations;
	}
}

?>