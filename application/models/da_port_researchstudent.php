<?php
include_once("port_model.php");
class Da_port_researchstudent extends Port_model {
	// PK is rsd_id

	public $rsd_id;
	public $rsd_efname;
	public $rsd_tfname;
	public $rsd_elname;
	public $rsd_tlname;
	function __construct() {
		parent::__construct();
	}

	function insert() {
		$sql = "INSERT INTO port_researchstudent (rsd_efname, rsd_tfname, rsd_elname, rsd_tlname)
					VALUES(?, ?, ?, ?)";
		$this->port->query($sql, array($this->rsd_efname, $this->rsd_tfname, $this->rsd_elname, $this->rsd_tlname));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_researchstudent SET 
					rsd_efname = ?, 
					rsd_tfname = ? , 
					rsd_elname = ? , 
					rsd_tlname = ? 
				WHERE rsd_id = ? ";
		$this->port->query($sql, array($this->rsd_efname, $this->rsd_tfname, $this->rsd_elname, $this->rsd_tlname, $this->rsd_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_researchstudent WHERE rsd_id = ? ";
		$this->port->query($sql, array($this->rsd_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_researchstudent WHERE rsd_id = ? ";
		$query = $this->port->query($sql, array($this->rsd_id)) ;
		return $query->row_array() ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_researchstudent

?>