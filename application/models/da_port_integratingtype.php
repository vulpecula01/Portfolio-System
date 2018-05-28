<?php
include_once("port_model.php");
class Da_port_integratingtype extends Port_model {
	// PK is itt_id

	public $itt_id;
	public $itt_etitle;
	public $itt_ttitle;

	function insert() {
		$sql = "INSERT INTO port_integratingtype (itt_etitle, itt_ttitle)
					VALUES(?, ?)";
		$this->port->query($sql, array($this->itt_etitle, $this->itt_ttitle));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_integratingtype SET 
					itt_etitle = ?, 
					itt_ttitle = ? 
				WHERE itt_id = ? ";
		$this->port->query($sql, array($this->itt_etitle, $this->itt_ttitle, $this->itt_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_integratingtype WHERE itt_id = ? ";
		$this->port->query($sql, array($this->itt_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_integratingtype WHERE itt_id = ? ";
		$query = $this->port->query($sql, array($this->itt_id)) ;
		return $query->row_array() ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_integratingtype

?>