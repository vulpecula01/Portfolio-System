<?php
include_once("port_model.php");
class Da_port_jobexperience extends Port_model {
	// PK is jox_id

	public $jox_id;
	public $jox_tname;
	public $jox_ename;
	public $jox_fromdate;
	public $jox_todate;
	public $usr_id;

	function __construct(){
       parent::__construct();
	}
	
	function Da_port_jobexperience() {
		parent::Model();
		// $this->port = $this->load->database('portfolio_develop',TRUE);
	}

	function insert() {
		$sql = "INSERT INTO port_jobexperience (jox_tname, jox_ename, jox_fromdate, jox_todate, usr_id)
					VALUES(?, ?, ?, ?, ?)";
		$this->port->query($sql, array($this->jox_tname, $this->jox_ename, $this->jox_fromdate, $this->jox_todate, $this->usr_id));
	}

	function update() {
		$sql = "UPDATE port_jobexperience SET 
					jox_tname = ?, 
					jox_ename = ?, 
					jox_fromdate = ?, 
					jox_todate = ?, 
					usr_id = ? 
				WHERE jox_id = ? ";
		$this->port->query($sql, array($this->jox_tname, $this->jox_ename, $this->jox_fromdate, $this->jox_todate, $this->usr_id, $this->jox_id));
	}

	function delete() {
		$sql = "DELETE FROM port_jobexperience WHERE jox_id = ? ";
		$this->port->query($sql, array($this->jox_id));
	}

	function getByKey() {
		$sql = "SELECT * FROM port_jobexperience WHERE jox_id = ? ";
		$query = $this->port->query($sql, array($this->jox_id)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_jobexperience

?>