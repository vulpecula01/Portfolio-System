<?php
include_once("port_model.php");
class Da_port_user_status extends Port_model {
	// PK is aut_id

	public $ts_id;
	public $ts_status;
	public $uaut_id;

	function insert() {
		$sql = "INSERT INTO port_user_status (ts_status, uaut_id)
					VALUES(?, ?)";
		$this->port->query($sql, array($this->ts_status, $this->uaut_id));
	}

	function update() {
		$sql = "UPDATE port_user_status SET 
					ts_status = ?
				WHERE uaut_id = ? ";
		$this->port->query($sql, array($this->ts_status, $this->uaut_id));
	}

	function delete($key) {
		$sql = "DELETE FROM port_user_status WHERE ts_id = ? ";
		$this->port->query($sql, array($key));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_user_status WHERE ts_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_user_status

?>