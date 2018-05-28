<?php
include_once("port_model.php");
class Da_port_interest extends Port_model {
	// PK is int_id

	public $int_id;
	public $int_tname;
	public $int_ename;
	public $itt_id;
	public $usr_id;

	function __construct(){
       parent::__construct();
	}
	
	function Da_port_interest() {
		parent::Model();
		// $this->port = $this->load->database('portfolio_develop',TRUE);
	}

	function insert() {
		$sql = "INSERT INTO port_interest (int_tname, int_ename, itt_id, usr_id)
					VALUES(?, ?, ?, ?)";
		$this->port->query($sql, array($this->int_tname, $this->int_ename, $this->itt_id, $this->usr_id));
	}

	function update() {
		$sql = "UPDATE port_interest SET 
					int_tname = ?, 
					int_ename = ?, 
					itt_id = ?, 
					usr_id = ? 
				WHERE int_id = ? ";
		$this->port->query($sql, array($this->int_tname, $this->int_ename, $this->itt_id, $this->usr_id, $this->int_id));
	}

	function delete() {
		$sql = "DELETE FROM port_interest WHERE int_id = ? ";
		$this->port->query($sql, array($this->int_id));
	}

	function getByKey() {
		$sql = "SELECT * FROM port_interest WHERE int_id = ? ";
		$query = $this->port->query($sql, array($this->int_id)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_interest

?>