<?php
include_once("port_model.php");
class Da_port_mail extends Port_model {
	// PK is mail_id

	public $mail_id;
	public $mail_name;
	public $usr_id;

	function insert() {
		// echo "Insert ".$this->mail_name."<br/>";
		// die();
		$sql = "INSERT INTO port_mail (mail_name, usr_id)
					VALUES(?, ?)";
		$this->port->query($sql, array($this->mail_name, $this->usr_id));
	}
	function search($key){
		$sql = "SELECT mail_id FROM port_mail WHERE mail_id = ? ";
		$query = $this->port->query($sql, array($key));
		return $this->port->affected_rows();
	}

	function update() {
		// echo "UPDATE ".$this->mail_id."<br/>";
		// die();
		$sql = "UPDATE port_mail SET 
					mail_name = ?, 
					usr_id = ? 
				WHERE mail_id = ? ";
		$this->port->query($sql, array($this->mail_name, $this->usr_id, $this->mail_id));
	}

	function delete($key) {
		$sql = "DELETE FROM port_mail WHERE mail_id = ? ";
		$this->port->query($sql, array($key));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_mail WHERE mail_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_mail

?>