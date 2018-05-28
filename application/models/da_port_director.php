<?php
include_once('port_model.php');
class Da_port_director extends Port_model {
	// PK is di_id

	public $di_id;
	public $di_tname;
	public $di_ename;
	public $di_tlocation;
	public $di_elocation;
	public $di_date;
	public $usr_id;

	function __construct(){
       parent::__construct();
	}
	
	function Da_port_director() {
		parent::Model();
		// $this->port = $this->load->database('portfolio_develop',TRUE);
	}

	function insert() {
		$sql = "INSERT INTO port_director (di_tname, di_ename, di_tlocation, di_elocation, di_date, usr_id)
					VALUES(?, ?, ?, ?, ?, ?)";
		$this->port->query($sql, array($this->di_tname, $this->di_ename, $this->di_tlocation, $this->di_elocation, $this->di_date, $this->usr_id));
	}

	function update() {
		$sql = "UPDATE port_director SET 
					di_tname = ?, 
					di_ename = ?, 
					di_tlocation = ?, 
					di_elocation = ?, 
					di_date = ?, 
					usr_id = ? 
				WHERE di_id = ? ";
		$this->port->query($sql, array($this->di_tname, $this->di_ename, $this->di_tlocation, $this->di_elocation, $this->di_date, $this->usr_id, $this->di_id));
	}

	function delete() {
		$sql = "DELETE FROM port_director WHERE di_id = ? ";
		$this->port->query($sql, array($this->di_id));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_director WHERE di_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_award

?>