<?php
include_once("port_model.php");
class Da_port_major extends Port_model {
	// PK is maj_id

	public $maj_id;
	public $maj_tname;
	public $maj_ename;

	function insert() {
		$sql = "INSERT INTO port_major (maj_tname, maj_ename)
					VALUES(?, ?)";
		$this->port->query($sql, array($this->maj_tname, $this->maj_ename));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_major SET 
					maj_tname = ?, 
					maj_ename = ? 
				WHERE maj_id = ? ";
		$this->port->query($sql, array($this->maj_tname, $this->maj_ename, $this->maj_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_major WHERE maj_id = ? ";
		$this->port->query($sql, array($this->maj_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_major WHERE maj_id = ? ";
		$query = $this->port->query($sql, array($this->maj_id)) ;
		return $query->row_array() ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_major

?>
