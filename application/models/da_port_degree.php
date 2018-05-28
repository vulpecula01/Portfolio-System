<?php
include_once("port_model.php");
class Da_port_degree extends Port_model {
	// PK is deg_id

	public $deg_id;
	public $deg_tname;
	public $deg_ename;
	public $deg_tacronym;
	public $deg_eacronym;
	public $edl_id;


	function insert() {
		$sql = "INSERT INTO port_degree (deg_tname, deg_ename, deg_tacronym, deg_eacronym, edl_id)
		VALUES(?, ?, ?, ?, ?)";
		$this->port->query($sql, array($this->deg_tname, $this->deg_ename, $this->deg_tacronym, $this->deg_eacronym, $this->edl_id));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_degree SET 
		deg_tname = ?, 
		deg_ename = ?, 
		deg_tacronym = ?, 
		deg_eacronym = ?, 
		edl_id = ? 
		WHERE deg_id = ? ";
		$this->port->query($sql, array($this->deg_tname, $this->deg_ename, $this->deg_tacronym, $this->deg_eacronym, $this->edl_id, $this->deg_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_degree WHERE deg_id = ? ";
		$this->port->query($sql, array($this->deg_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_degree
		LEFT JOIN port_level ON port_degree.edl_id = port_level.edl_id 
		WHERE deg_id = ? ";
		$query = $this->port->query($sql, array($this->deg_id)) ;
		return $query->row_array() ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_degree

?>