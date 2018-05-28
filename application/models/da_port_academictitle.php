<?php
include_once("port_model.php");
class Da_port_academictitle extends Port_model {
	// PK is acr_id

	public $acr_id;
	public $acr_tname;
	public $acr_ename;
	public $acr_tacronym;
	public $acr_eacronym;

	function insert() {
		$sql = "INSERT INTO port_academictitle (acr_tname, acr_ename, acr_tacronym, acr_eacronym)
					VALUES(?, ?, ?, ?)";
		$this->port->query($sql, array($this->acr_tname, $this->acr_ename, $this->acr_tacronym, $this->acr_eacronym));
	}

	function update() {
		$sql = "UPDATE port_academictitle SET 
					acr_tname = ?, 
					acr_ename = ?, 
					acr_tacronym = ?, 
					acr_eacronym = ? 
				WHERE acr_id = ? ";
		$this->port->query($sql, array($this->acr_tname, $this->acr_ename, $this->acr_tacronym, $this->acr_eacronym, $this->acr_id));

	}

	function delete() {
		$sql = "DELETE FROM port_academictitle WHERE acr_id = ? ";
		$this->port->query($sql, array($this->acr_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_academictitle WHERE acr_id = ? ";
		$query = $this->port->query($sql, array($this->acr_id)) ;
		return $query->row_array() ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_academictitle

?>