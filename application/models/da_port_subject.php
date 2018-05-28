<?php
include_once("port_model.php");
class Da_port_subject extends Port_model {
	// PK is sub_id

	public $sub_id;
	public $sub_code;
	public $sub_tname;
	public $sub_ename;


	function insert() {
		$sql = "INSERT INTO port_subject (sub_code, sub_tname, sub_ename)
					VALUES(?, ?, ?)";
		$this->port->query($sql, array($this->sub_code, $this->sub_tname, $this->sub_ename));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_subject SET 
					sub_code = ?, 
					sub_tname = ?, 
					sub_ename = ? 
				WHERE sub_id = ? ";
		$this->port->query($sql, array($this->sub_code, $this->sub_tname, $this->sub_ename, $this->sub_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_subject WHERE sub_id = ? ";
		$this->port->query($sql, array($this->sub_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_subject WHERE sub_id = ? ";
		$query = $this->port->query($sql, array($this->sub_id)) ;
		return $query->row_array() ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_subject

?>