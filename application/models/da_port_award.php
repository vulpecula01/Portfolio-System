<?php
include_once('port_model.php');
class Da_port_award extends Port_model {
	// PK is awd_id

	public $awd_id;
	public $awd_tname;
	public $awd_ename;
	public $awd_tinsitute;
	public $awd_einsitute;
	public $awd_date;
	public $usr_id;

	function __construct(){
       parent::__construct();
	}
	
	function Da_port_award() {
		parent::Model();
		// $this->port = $this->load->database('portfolio_develop',TRUE);
	}

	function insert() {
		$sql = "INSERT INTO port_award (awd_tname, awd_ename, awd_tinsitute, awd_einsitute, awd_date, usr_id)
					VALUES(?, ?, ?, ?, ?, ?)";
		$this->port->query($sql, array($this->awd_tname, $this->awd_ename, $this->awd_tinsitute, $this->awd_einsitute, $this->awd_date, $this->usr_id));
	}

	function update() {
		$sql = "UPDATE port_award SET 
					awd_tname = ?, 
					awd_ename = ?, 
					awd_tinsitute = ?, 
					awd_einsitute = ?, 
					awd_date = ?, 
					usr_id = ? 
				WHERE awd_id = ? ";
		$this->port->query($sql, array($this->awd_tname, $this->awd_ename, $this->awd_tinsitute, $this->awd_einsitute, $this->awd_date, $this->usr_id, $this->awd_id));
	}

	function delete() {
		$sql = "DELETE FROM port_award WHERE awd_id = ? ";
		$this->port->query($sql, array($this->awd_id));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_award WHERE awd_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_award

?>