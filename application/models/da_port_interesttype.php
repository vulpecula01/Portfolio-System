<?php
include_once("port_model.php");
class Da_port_interesttype extends Port_model {
	// PK is itt_id

	public $itt_id;
	public $itt_tname;
	public $itt_ename;


	function insert() {
		$sql = "INSERT INTO port_interesttype (itt_tname, itt_ename)
					VALUES(?, ?)";
		$this->port->query($sql, array($this->itt_tname, $this->itt_ename));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_interesttype SET 
					itt_tname = ?, 
					itt_ename = ? 
				WHERE itt_id = ? ";
		$this->port->query($sql, array($this->itt_tname, $this->itt_ename, $this->itt_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_interesttype WHERE itt_id = ? ";
		$this->port->query($sql, array($this->itt_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_interesttype WHERE itt_id = ? ";
		$query = $this->port->query($sql, array($this->itt_id)) ;
		return $query->row_array() ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_interesttype

?>