<?php
include_once("port_model.php");
class Da_port_typeteacherstatus extends Port_model {
	// PK is tts_id

	public $tts_id;
	public $tts_name;
	


	function insert() {
		$sql = "INSERT INTO port_typeteacherstatus (tts_name)
					VALUES(?)";
		$this->port->query($sql, array($this->ts_name));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_typeteacherstatus SET 
					tts_name = ?
				WHERE tts_id = ? ";
		$this->port->query($sql, array($this->tts_name, $this->tts_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_typeteacherstatus WHERE tts_id = ? ";
		$this->port->query($sql, array($this->tts_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_typeteacherstatus WHERE tts_id = ? ";
		$query = $this->port->query($sql, array($this->tts_id)) ;
		return $query->row_array() ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_typeteacherstatus

?>