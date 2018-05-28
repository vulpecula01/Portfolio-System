<?php
include_once("port_model.php");
class Da_port_decoration extends Port_model {
	// PK is maj_id

	public $dec_id;
	public $dec_name;
	public $dec_abb;
	public $pos_year;

	function insert() {
		$sql = "INSERT INTO port_decoration (dec_name, dec_abb, pos_year)
					VALUES(?, ?, ?)";
		$this->port->query($sql, array($this->dec_name, $this->dec_abb, $this->pos_year));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_decoration SET 
					dec_name = ?, 
					dec_abb = ?,
					pos_year = ? 
				WHERE dec_id = ? ";
		$this->port->query($sql, array($this->dec_name, $this->dec_abb, $this->pos_year, $this->dec_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_decoration WHERE dec_id = ? ";
		$this->port->query($sql, array($this->dec_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_decoration WHERE dec_id = ? ";
		$query = $this->port->query($sql, array($this->dec_id)) ;
		return $query->row_array() ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_decoration

?>
