<?php
include_once('port_model.php');
class Da_port_integratingconnect extends Port_model {
	// PK is inc_id

	public $inc_id;
	public $int_id;
	public $itt_id;

	function __construct(){
       parent::__construct();
	}
	
	function Da_port_integratingconnect() {
		parent::Model();
		// $this->db = $this->load->database('portfolio_develop',TRUE);
	}

	function insert() {
		$sql = "INSERT INTO port_integratingconnect (int_id, itt_id)
					VALUES(?, ?)";
		$this->port->query($sql, array($this->int_id, $this->itt_id));
	}

	function update() {
		$sql = "UPDATE port_integratingconnect SET 
					int_id = ?, 
					itt_id = ? 
				WHERE inc_id = ? ";
		$this->port->query($sql, array($this->int_id, $this->itt_id, $this->inc_id));
	}

	function delete() {
		$sql = "DELETE FROM port_integratingconnect WHERE inc_id = ? ";
		$this->port->query($sql, array($this->inc_id));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_integratingconnect WHERE inc_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_integratingconnect

?>