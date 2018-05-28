<?php
include_once("port_model.php");
class Da_port_educationalbackground extends Port_model {
	// PK is edb_id

	public $edb_id;
	public $edb_yeargraduate;
	public $edb_tthesistopic;
	public $edb_ethesistopic;
	public $edb_no;
	public $ins_id;
	public $deg_id;
	public $edl_id;
	public $maj_id;
	public $usr_id;

	function __construct(){
       parent::__construct();
	}

	function Da_port_educationalbackground() {
		parent::Model();
		// $this->port = $this->load->database('portfolio_develop',TRUE);
	}

	function insert() {
		$sql = "INSERT INTO port_educationalbackground (edb_yeargraduate, edb_tthesistopic, edb_ethesistopic, edb_no, ins_id, deg_id, maj_id, usr_id)
					VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
		$this->port->query($sql, array($this->edb_yeargraduate, $this->edb_tthesistopic, $this->edb_ethesistopic, $this->edb_no, $this->ins_id, $this->deg_id, $this->maj_id, $this->usr_id));
	}

	function update() {
		$sql = "UPDATE port_educationalbackground SET 
					edb_yeargraduate = ?, 
					edb_tthesistopic = ?, 
					edb_ethesistopic = ?, 
					edb_no = ?, 
					ins_id = ?, 
					deg_id = ?, 
					maj_id = ?, 
					usr_id = ? 
				WHERE edb_id = ? ";
		$this->port->query($sql, array($this->edb_yeargraduate, $this->edb_tthesistopic, $this->edb_ethesistopic, $this->edb_no, $this->ins_id, $this->deg_id, $this->maj_id, $this->usr_id, $this->edb_id));
	}

	function delete() {
		$sql = "DELETE FROM port_educationalbackground WHERE edb_id = ? ";
		$this->port->query($sql, array($this->edb_id));
	}

	function getByKey() {
		$sql = "SELECT * FROM port_educationalbackground 
			LEFT JOIN port_major     ON port_major.maj_id     = port_educationalbackground.maj_id
			LEFT JOIN port_degree    ON port_degree.deg_id    = port_educationalbackground.deg_id
			LEFT JOIN port_institute ON port_institute.ins_id = port_educationalbackground.ins_id
			LEFT JOIN port_country	 ON port_country.cou_id	  = port_institute.cou_id
			LEFT JOIN port_level	 ON port_level.edl_id	  = port_degree.edl_id
			WHERE edb_id = ? ";
		$query = $this->port->query($sql, array($this->edb_id)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_educationalbackground
?>