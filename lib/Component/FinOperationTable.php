<?php

namespace Component;

class FinOperationTable extends Component {
	protected $templateFileName = 'component/fin_operation_table.tpl.php';
	public $operations;

	public function setOperations($operations) {
		$this->operations = $operations;
	}
}

?>