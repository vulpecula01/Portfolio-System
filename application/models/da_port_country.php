<?php
include_once("port_model.php");
class Da_port_country extends Port_model {
	// PK is cou_id

	public $cou_id;
	public $cou_tname;
	public $cou_ename;

	function insert() {
		$sql = "INSERT INTO port_country (cou_tname, cou_ename)
					VALUES(?, ?)";
		$this->port->query($sql, array($this->cou_tname, $this->cou_ename));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_country SET 
					cou_tname = ?, 
					cou_ename = ? 
				WHERE cou_id = ? ";
		$this->port->query($sql, array($this->cou_tname, $this->cou_ename, $this->cou_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_country WHERE cou_id = ? ";
		$this->port->query($sql, array($this->cou_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_country WHERE cou_id = ? ";
		$query = $this->port->query($sql, array($this->cou_id)) ;
		return $query->row_array();
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_country

?>