<?php
include_once('port_model.php');
class Da_port_funding extends Port_model {
	// PK is fud_id

	public $fud_id;
	public $fud_institution;
	public $fud_funding;
	public $fud_startdate;
	public $fud_enddate;
	public $res_id;

	function __construct(){
       parent::__construct();
	}
	
	function Da_port_funding() {
		parent::Model();
		// $this->db = $this->load->database('portfolio_develop',TRUE);
	}

	function insert() {
		$sql = "INSERT INTO port_funding (fud_institution, fud_funding, fud_startdate, fud_enddate, res_id)
					VALUES(?, ?, ?, ?, ?)";
		$this->port->query($sql, array($this->fud_institution, $this->fud_funding, $this->fud_startdate, $this->fud_enddate, $this->res_id));
	}

	function update() {
		$sql = "UPDATE port_funding SET 
					fud_institution = ?, 
					fud_funding = ?, 
					fud_startdate = ?, 
					fud_enddate = ?, 
					res_id = ? 
				WHERE fud_id = ? ";
		$this->port->query($sql, array($this->fud_institution, $this->fud_funding, $this->fud_startdate, $this->fud_enddate, $this->res_id, $this->fud_id));
	}

	function delete() {
		$sql = "DELETE FROM port_funding WHERE fud_id = ? ";
		$this->port->query($sql, array($this->fud_id));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_funding WHERE fud_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_funding

?>