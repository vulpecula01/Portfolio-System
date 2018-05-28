<?php
include_once("port_model.php");
class Da_port_position_type extends Port_model {
	// PK is maj_id

	public $dec_id;
	public $dec_name;
	public $dec_abb;

	function insert() {
		$sql = "INSERT INTO port_position_type (posty_name)
					VALUES(?)";
		$this->port->query($sql, array($this->posty_name));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_position_type SET 
					posty_name = ?
				WHERE posty_id = ? ";
		$this->port->query($sql, array($this->posty_name, $this->posty_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_position_type WHERE posty_id = ? ";
		$this->port->query($sql, array($this->posty_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_position_type WHERE posty_id = ? ";
		$query = $this->port->query($sql, array($this->posty_id)) ;
		return $query->row_array() ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_position_type

?>
