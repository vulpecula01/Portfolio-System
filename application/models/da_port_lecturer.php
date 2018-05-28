<?php
include_once('port_model.php');
class Da_port_lecturer extends Port_model {
	// PK is lec_id

	public $lec_id;
	public $lec_tname;
	public $lec_ename;
	public $lec_tlocation;
	public $lec_elocation;
	public $lec_date;
	public $usr_id;

	function __construct(){
       parent::__construct();
	}
	
	function Da_port_lecturer() {
		parent::Model();
		// $this->port = $this->load->database('portfolio_develop',TRUE);
	}

	function insert() {
		$sql = "INSERT INTO port_lecturer (lec_tname, lec_ename, lec_tlocation, lec_elocation, lec_date, usr_id)
					VALUES(?, ?, ?, ?, ?, ?)";
		$this->port->query($sql, array($this->lec_tname, $this->lec_ename, $this->lec_tlocation, $this->lec_elocation, $this->lec_date, $this->usr_id));
	}

	function update() {
		$sql = "UPDATE port_lecturer SET 
					lec_tname = ?, 
					lec_ename = ?, 
					lec_tlocation = ?, 
					lec_elocation = ?, 
					lec_date = ?, 
					usr_id = ? 
				WHERE lec_id = ? ";
		$this->port->query($sql, array($this->lec_tname, $this->lec_ename, $this->lec_tlocation, $this->lec_elocation, $this->lec_date, $this->usr_id, $this->lec_id));
	}

	function delete() {
		$sql = "DELETE FROM port_lecturer WHERE lec_id = ? ";
		$this->port->query($sql, array($this->lec_id));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_lecturer WHERE lec_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_lecturer

?>