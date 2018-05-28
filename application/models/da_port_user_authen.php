<?php
include_once("port_model.php");
class Da_port_user_authen extends Port_model {
	// PK is uaut_id

	public $uaut_id;
	public $uaut_username;
	public $uaut_password;
	public $uaut_tfname;
	public $uaut_tlname;
	public $uaut_efname;
	public $uaut_elname;
	public $uaut_answer;
	public $que_id;

	function insert() {
		$options = [
		'cost' => 10
		];
		$this->uaut_password = password_hash($this->uaut_password,PASSWORD_BCRYPT,$options);
		$sql = "INSERT INTO port_user_authen (uaut_username, uaut_password, uaut_tfname, uaut_tlname, uaut_efname, uaut_elname, uaut_answer, que_id)
					VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
		$this->port->query($sql, array($this->uaut_username, $this->uaut_password, $this->uaut_tfname, $this->uaut_tlname, $this->uaut_efname, $this->uaut_elname, $this->uaut_answer, $this->que_id));
		return $this->port->insert_id();
	}

	function update() {
		$sql = "UPDATE port_user_authen SET 
					uaut_username = ?, 
					uaut_tfname = ?, 
					uaut_tlname = ?, 
					uaut_efname = ?, 
					uaut_elname = ?
				WHERE uaut_id = ? ";
		$this->port->query($sql, array($this->uaut_username, $this->uaut_tfname, $this->uaut_tlname, $this->uaut_efname, $this->uaut_elname,$this->uaut_id));
	}

	function delete($key) {
		$sql = "DELETE FROM port_user_authen WHERE uaut_id = ? ";
		$this->port->query($sql, array($key));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_user_authen WHERE uaut_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_user_authen

?>