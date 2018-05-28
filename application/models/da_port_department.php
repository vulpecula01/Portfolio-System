<?php
include_once("port_model.php");
class Da_port_department extends Port_model {
	// PK is dep_id

	public $dep_id;
	public $dep_tname;
	public $dep_ename;
	public $res_id;

	function insert() {
		$sql = "INSERT INTO port_department (dep_tname, dep_ename, dep_id)
					VALUES(?, ?, ?)";
		$this->port->query($sql, array($this->dep_tname, $this->dep_ename, $this->dep_id));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_department SET 
					dep_tname = ?, 
					dep_ename = ? 	 
				WHERE dep_id = ? ";
		$this->port->query($sql, array($this->dep_tname, $this->dep_ename,  $this->dep_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_department WHERE dep_id = ? ";
		$this->port->query($sql, array($this->dep_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_department WHERE dep_id = ? ";
		$query = $this->port->query($sql, array($this->dep_id)) ;
		return $query->row_array() ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_department

?>