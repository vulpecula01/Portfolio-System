<?php
include_once("port_model.php");
class Da_port_usre_authority extends Port_model {
	// PK is aut_id

	public $aut_id;
	public $aut_admin;
	public $aut_user;
	public $uaut_id;

	function insert() {
		$sql = "INSERT INTO port_usre_authority (aut_admin, aut_user, uaut_id)
					VALUES(?, ?, ?)";
		$this->port->query($sql, array($this->aut_admin, $this->aut_user, $this->uaut_id));
	}

	function update() {
		$sql = "UPDATE port_usre_authority SET 
					aut_admin = ?, 
					aut_user = ?
				WHERE uaut_id = ? ";
		$this->port->query($sql, array($this->aut_admin, $this->aut_user, $this->uaut_id));
	}

	function delete($key) {
		$sql = "DELETE FROM port_usre_authority WHERE aut_id = ? ";
		$this->port->query($sql, array($key));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_usre_authority WHERE aut_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_usre_authority

?>