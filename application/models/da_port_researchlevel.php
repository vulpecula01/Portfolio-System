<?php
include_once("port_model.php");
class Da_port_researchlevel extends Port_model {
	// PK is rlv_id

	public $rlv_id;
	public $rlv_etitle;
	public $rlv_ttitle;

	function insert() {
		$sql = "INSERT INTO port_researchlevel (rlv_etitle, rlv_ttitle)
					VALUES(?, ?)";
		$this->port->query($sql, array($this->rlv_etitle, $this->rlv_ttitle));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_researchlevel SET 
					rlv_etitle = ?, 
					rlv_ttitle = ? 
				WHERE rlv_id = ? ";
		$this->port->query($sql, array($this->rlv_etitle, $this->rlv_ttitle, $this->rlv_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_researchlevel WHERE rlv_id = ? ";
		$this->port->query($sql, array($this->rlv_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_researchlevel WHERE rlv_id = ? ";
		$query = $this->port->query($sql, array($this->rlv_id)) ;
		return $query->row_array()  ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_researchlevel

?>