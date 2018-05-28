<?php
include_once("port_model.php");
class Da_port_activity extends Port_model {
	// PK is jox_id

	public $at_id;
	public $at_name;
	public $at_ename;
	public $usr_id;
	public $at_date;

	function __construct(){
       parent::__construct();
	}
	
	function Da_port_activity() {
		parent::Model();
		// $this->port = $this->load->database('portfolio_develop',TRUE);
	}

	function insert() {
		$sql = "INSERT INTO port_activity (at_name, at_ename, at_date, usr_id)
					VALUES(?, ?, ?, ?)";
		$this->port->query($sql, array($this->at_name, $this->at_ename, $this->at_date, $this->usr_id));
	}

	function update() {
		$sql = "UPDATE port_activity SET 
					at_name = ?, 
					at_ename=?,
					at_date = ?, 
					usr_id = ? 
				WHERE at_id = ? ";
		$this->port->query($sql, array($this->at_name, $this->at_ename, $this->at_date, $this->usr_id, $this->at_id));
	}

	function delete() {
		$sql = "DELETE FROM port_activity WHERE at_id = ? ";
		$this->port->query($sql, array($this->at_id));
	}

	function getByKey() {
		$sql = "SELECT * FROM port_activity WHERE at_id = ? ";
		$query = $this->port->query($sql, array($this->at_id)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_jobexperience

?>