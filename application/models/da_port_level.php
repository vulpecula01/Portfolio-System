<?php
include_once("port_model.php");
class Da_port_level extends Port_model {
	// PK is edl_id

	public $edl_id;
	public $edl_tname;
	public $edl_ename;

	function insert() {
		$sql = "INSERT INTO port_level (edl_tname, edl_ename)
					VALUES(?, ?)";
		$this->port->query($sql, array($this->edl_tname, $this->edl_ename));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_level SET 
					edl_tname = ?, 
					edl_ename = ? 
				WHERE edl_id = ? ";
		$this->port->query($sql, array($this->edl_tname, $this->edl_ename, $this->edl_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_level WHERE edl_id = ? ";
		$this->port->query($sql, array($this->edl_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_level WHERE edl_id = ? ";
		$query = $this->port->query($sql, array($this->edl_id)) ;
		return $query->row_array() ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_level

?>