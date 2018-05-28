<?php
include_once('port_model.php');
class Da_port_tech extends Port_model {
	// PK is tec_id

	public $tec_id;
	public $usr_id;
	public $sub_id;
	public $tec_year;
	public $tec_semester;

	function __construct(){
       parent::__construct();
	}
	
	function Da_port_tech() {
		parent::Model();
		// $this->port = $this->load->database('portfolio_develop',TRUE);
	}

	function insert() {
		$sql = "INSERT INTO port_tech (usr_id, sub_id, tec_year, tec_semester)
					VALUES(?, ?, ?, ?)";
		$this->port->query($sql, array($this->usr_id, $this->sub_id, $this->tec_year, $this->tec_semester));
	}

	function update() {
		$sql = "UPDATE port_tech SET 
					usr_id = ?, 
					sub_id = ?, 
					tec_year = ?, 
					tec_semester = ? 
				WHERE tec_id = ? ";
		$this->port->query($sql, array($this->usr_id, $this->sub_id, $this->tec_year, $this->tec_semester, $this->tec_id));
	}

	function delete() {
		$sql = "DELETE FROM port_tech WHERE tec_id = ? ";
		$this->port->query($sql, array($this->tec_id));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_tech WHERE tec_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_tech

?>