<?php
include_once('port_model.php');
class Da_port_research extends Port_model {
	// PK is res_id

	public $res_id;
	public $res_publicationtype;
	public $res_eproject;
	public $res_tproject;
	public $res_etitle;
	public $res_ttitle;
	public $res_edonor;
	public $res_tdonor;
	public $res_journals;
	public $res_conference;
	public $res_place;
	public $res_date;
	public $res_year;
	public $res_month;
	public $res_page;
	public $res_cluster;
	public $res_track;
	public $res_abstract;
	public $res_abstractfile;
	public $res_keyword;
	public $rlv_id;
	public $rst_id;
	public $ret_id;

	function __construct(){
       parent::__construct();
	}
	
	function Da_port_research() {
		parent::Model();
		// $this->port = $this->load->database('portfolio_develop',TRUE);
	}

	function insert() {
		$sql = "INSERT INTO port_research (res_publicationtype, res_eproject, res_tproject, res_etitle, res_ttitle, res_edonor, res_tdonor, res_journals, res_conference, res_place, res_date, res_year, res_month, res_page, res_cluster, res_track, res_abstract, res_abstractfile, res_keyword, rlv_id, rst_id, ret_id)
					VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$this->port->query($sql, array($this->res_publicationtype, $this->res_eproject, $this->res_tproject, $this->res_etitle, $this->res_ttitle, $this->res_edonor, $this->res_tdonor, $this->res_journals, $this->res_conference, $this->res_place, $this->res_date, $this->res_year, $this->res_month, $this->res_page, $this->res_cluster, $this->res_track, $this->res_abstract, $this->res_abstractfile, $this->res_keyword, $this->rlv_id, $this->rst_id, $this->ret_id));
	}

	function update() {
		$sql = "UPDATE port_research SET 
					res_publicationtype = ?, 
					res_eproject = ?, 
					res_tproject = ?, 
					res_etitle = ?, 
					res_ttitle = ?, 
					res_edonor = ?, 
					res_tdonor = ?, 
					res_journals = ?, 
					res_conference = ?, 
					res_place = ?, 
					res_date = ?, 
					res_year = ?, 
					res_month = ?, 
					res_page = ?, 
					res_cluster = ?, 
					res_track = ?, 
					res_abstract = ?, 
					res_abstractfile = ?, 
					res_keyword = ?, 
					rlv_id = ?, 
					rst_id = ?, 
					ret_id = ? 
				WHERE res_id = ? ";
		$this->port->query($sql, array($this->res_publicationtype, $this->res_eproject, $this->res_tproject, $this->res_etitle, $this->res_ttitle, $this->res_edonor, $this->res_tdonor, $this->res_journals, $this->res_conference, $this->res_place, $this->res_date, $this->res_year, $this->res_month, $this->res_page, $this->res_cluster, $this->res_track, $this->res_abstract, $this->res_abstractfile, $this->res_keyword, $this->rlv_id, $this->rst_id, $this->ret_id, $this->res_id));
	}

	function delete() {
		$sql = "DELETE FROM port_research WHERE res_id = ? ";
		$this->port->query($sql, array($this->res_id));
		return $this->port->affected_rows();
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_research WHERE res_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_research

?>