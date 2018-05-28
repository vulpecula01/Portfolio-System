<?php
include_once("port_model.php");
class Da_port_type_per extends Port_model {
	// PK is per_id

	public $per_id;
	public $per_type;

	function insert() {
		$sql = "INSERT INTO port_type_per (per_type)
					VALUES(?)";
		$this->port->query($sql, array($this->per_type));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_type_per SET 
					per_type = ? 
				WHERE per_id = ? ";
		$this->port->query($sql, array($this->per_type, $this->per_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_type_per WHERE per_id = ? ";
		$this->port->query($sql, array($this->per_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_type_per WHERE per_id = ? ";
		$query = $this->port->query($sql, array($this->per_id)) ;
		return $query->row_array() ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_type_per

?>