<?php
include_once("port_model.php");
class Da_port_position_personal extends Port_model {
	// PK is maj_id

	public $pos_id;
	public $pos_name;
	public $posty_id;

	function insert() {
		$sql = "INSERT INTO port_position_personal (pos_name, posty_id)
					VALUES(?, ?)";
		$this->port->query($sql, array($this->pos_name, $this->posty_id));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_position_personal SET 
					pos_name = ?, 
					posty_id = ? 
				WHERE pos_id = ? ";
		$this->port->query($sql, array($this->pos_name, $this->posty_id, $this->pos_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_position_personal WHERE pos_id = ? ";
		$this->port->query($sql, array($this->pos_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_position_personal WHERE pos_id = ? ";
		$query = $this->port->query($sql, array($this->pos_id)) ;
		return $query->row_array() ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_position_personal

?>
