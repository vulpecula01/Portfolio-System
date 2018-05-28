<?php
include_once("port_model.php");
class Da_port_researchtype extends Port_model {
	// PK is ret_id

	public $ret_id;
	public $ret_tname;
	public $ret_ename;

	function insert() {
		$sql = "INSERT INTO port_researchtype (ret_tname, ret_ename)
					VALUES(?, ?)";
		$this->port->query($sql, array($this->ret_tname, $this->ret_ename));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_researchtype SET 
					ret_tname = ?, 
					ret_ename = ? 
				WHERE ret_id = ? ";
		$this->port->query($sql, array($this->ret_tname, $this->ret_ename, $this->ret_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_researchtype WHERE ret_id = ? ";
		$this->port->query($sql, array($this->ret_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_researchtype WHERE ret_id = ? ";
		$query = $this->port->query($sql, array($this->ret_id)) ;
		return $query->row_array()  ;

	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_researchtype

?>