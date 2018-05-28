<?php
include_once('port_model.php');
class Da_port_integrating extends Port_model {
	// PK is int_id

	public $int_id;
	public $int_datestart;
	public $int_dateend;
	public $res_id;

	function __construct(){
       parent::__construct();
	}

	function insert() {
		$sql = "INSERT INTO port_integrating (int_datestart, int_dateend, res_id)
					VALUES(?, ?, ?)";
		$this->port->query($sql, array($this->int_datestart, $this->int_dateend, $this->res_id));
	}

	function update() {
		$sql = "UPDATE port_integrating SET 
					int_datestart = ?, 
					int_dateend = ?, 
					res_id = ? 
				WHERE int_id = ? ";
		$this->port->query($sql, array($this->int_datestart, $this->int_dateend, $this->res_id, $this->int_id));
	}

	function delete($key) {
		$sql = "DELETE FROM port_integrating WHERE int_id = ? ";
		$this->port->query($sql, array($key));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_integrating WHERE int_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_integrating

?>