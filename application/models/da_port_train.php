<?php
include_once('port_model.php');
class Da_port_train extends Port_model {
	// PK is di_id

	public $tr_id;
	public $tr_tname;
	public $tr_ename;
	public $tr_tlocation;
	public $tr_elocation;
	public $tr_hour;
	public $tr_date;
	public $usr_id;

	function __construct(){
       parent::__construct();
	}
	
	function Da_port_train() {
		parent::Model();
		// $this->port = $this->load->database('portfolio_develop',TRUE);
	}

	function insert() {
		$sql = "INSERT INTO port_train (tr_tname, tr_ename, tr_tlocation, tr_elocation,tr_hour, tr_date, usr_id)
					VALUES(?, ?, ?, ?, ?, ?, ?)";
		$this->port->query($sql, array($this->tr_tname, $this->tr_ename, $this->tr_tlocation, $this->tr_elocation, $this->tr_hour, $this->tr_date, $this->usr_id));
	}

	function update() {
		$sql = "UPDATE port_train SET 
					tr_tname = ?, 
					tr_ename = ?, 
					tr_tlocation = ?, 
					tr_elocation = ?, 
					tr_hour = ?, 
					tr_date = ?, 
					usr_id = ? 
				WHERE tr_id = ? ";
		$this->port->query($sql, array($this->tr_tname, $this->tr_ename, $this->tr_tlocation, $this->tr_elocation, $this->tr_hour, $this->tr_date, $this->usr_id, $this->tr_id));
	}

	function delete() {
		$sql = "DELETE FROM port_train WHERE tr_id = ? ";
		$this->port->query($sql, array($this->tr_id));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_train WHERE tr_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_award

?>