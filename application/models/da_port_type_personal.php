<?php
include_once("port_model.php");
class Da_port_type_personal extends Port_model {
	// PK is aut_id

	public $tp_id;
	public $tp_status;
	public $uaut_id;

	function insert() {
		$sql = "INSERT INTO port_type_personal (tp_status, uaut_id)
					VALUES(?, ?)";
		$this->user->query($sql, array($this->tp_status, $this->uaut_id));
	}

	function update() {
		$sql = "UPDATE port_type_personal SET 
					tp_status = ?
				WHERE uaut_id = ? ";
		$this->user->query($sql, array($this->tp_status, $this->uaut_id));
	}

	function delete($key) {
		$sql = "DELETE FROM port_type_personal WHERE tp_id = ? ";
		$this->user->query($sql, array($key));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_type_personal WHERE tp_id = ? ";
		$query = $this->user->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->user->insert_id();
	}

} //=== end class da_port_type_personal

?>