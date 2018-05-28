<?php
include_once("port_model.php");
class Da_port_insignia_new extends Port_model {
	
	public $pn_id;
	public $pn_level;	
	public $pn_name;
	public $pn_abb;
	public $per_id;
	


	function insert() {
		$sql = "INSERT INTO port_insignia_new (pn_level, pn_name, pn_abb, per_id)
					VALUES( ?, ?, ?, ?)";
		$this->port->query($sql, array($this->pn_level, $this->pn_name, $this->pn_abb, $this->per_id));
	}


	function insert_data() {
		/*echo "model";
		die(); */
		$sql = "INSERT INTO port_insignia_new (pn_level, pn_name, pn_abb, per_id)
					VALUES(?, ?, ?, ?)";

						
						
		$this->port->query($sql, array($this->pn_level, $this->pn_name, $this->pn_abb, $this->per_id));
		return $this->port->affected_rows();
	}


	function update() {
		$sql = "UPDATE port_insignia_new SET 
					pn_level = ?, 
					pn_name = ?, 
					pn_abb = ?
					WHERE pn_id = ? ";
		$this->port->query($sql, array($this->pn_level ,$this->pn_name, $this->pn_abb, $this->pn_id));
	}

	function delete() {
		$sql = "DELETE FROM port_insignia_new WHERE pn_id = ? ";
		$this->port->query($sql, array($this->pn_id));
		return $this->port->affected_rows();
	}

	function getByKey($sign_time ,$pn_name) {
		$sql = "SELECT * FROM port_insignia_new 
		WHERE pn_id = $pn_name AND pn_abb = $pn_name";
		$query = $this->port->query($sql);
		return $query->result_array();
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_institute

?>