<?php
include_once("port_model.php");
class Da_port_researchstatus extends Port_model {
	// PK is rst_id

	public $rst_id;
	public $rst_etitle;
	public $rst_ttitle;

	function insert() {
		$sql = "INSERT INTO port_researchstatus (rst_etitle, rst_ttitle)
					VALUES(?, ?)";
		$this->port->query($sql, array($this->rst_etitle, $this->rst_ttitle));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_researchstatus SET 
					rst_etitle = ?, 
					rst_ttitle = ? 
				WHERE rst_id = ? ";
		$this->port->query($sql, array($this->rst_etitle, $this->rst_ttitle, $this->rst_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_researchstatus WHERE rst_id = ? ";
		$this->port->query($sql, array($this->rst_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_researchstatus WHERE rst_id = ? ";
		$query = $this->port->query($sql, array($this->rst_id)) ;
		return $query->row_array() ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_researchstatus

?>