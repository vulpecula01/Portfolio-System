<?php
include_once("port_model.php");
class Da_port_researchertype extends Port_model {
	// PK is rst_id

	public $rst_id;
	public $rst_tname;
	public $rst_ename;

	function insert() {
		$sql = "INSERT INTO port_researchertype (rst_tname, rst_ename)
					VALUES(?, ?)";
		$this->port->query($sql, array($this->rst_tname, $this->rst_ename));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_researchertype SET 
					rst_tname = ?, 
					rst_ename = ? 
				WHERE rst_id = ? ";
		$this->port->query($sql, array($this->rst_tname, $this->rst_ename, $this->rst_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_researchertype WHERE rst_id = ? ";
		$this->port->query($sql, array($this->rst_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_researchertype WHERE rst_id = ? ";
		$query = $this->port->query($sql, array($this->rst_id)) ;
		return $query->row_array();
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_researchertype

?>