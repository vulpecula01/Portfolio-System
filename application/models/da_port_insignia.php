<?php
include_once("port_model.php");
class Da_port_insignia extends Port_model {
	
	public $sign_id;
	public $sign_date;	
	public $usr_id;
	public $dec_id;
	


	function insert() {
		$sql = "INSERT INTO port_insignia ( sign_date, dec_id, usr_id)
					VALUES( ?, ?, ?)";
		$this->port->query($sql, array($this->sign_date, $this->dec_id, $this->usr_id));

		$sql = "UPDATE port_user SET 
					dec_id = ?
				WHERE usr_id = ?";
		$this->port->query($sql, array($this->dec_id, $this->usr_id));
	}


	function insert_data() {
		/*echo "model";
		die(); */
		$sql = "INSERT INTO port_insignia ( sign_date, dec_id, usr_id)
					VALUES(?, ?, ?)";

						
						
		$this->port->query($sql, array($this->sign_date, $this->dec_id, $this->usr_id));
		return $this->port->affected_rows();
	}


	function update() {
		$sql = "UPDATE port_insignia SET 
					sign_date = ?,
					dec_id = ?,
					usr_id = ?
				WHERE sign_id = ? ";
		$this->port->query($sql, array($this->sign_date, $this->dec_id, $this->usr_id , $this->sign_id));
	}

	function delete() {
		$sql = "DELETE FROM port_insignia WHERE sign_id = ? ";
		$this->port->query($sql, array($this->sign_id));
		return $this->port->affected_rows();
	}

	

	function last_insert_id(){
		return $this->port->insert_id();
	}

	function update_dec() {
		$sql = "UPDATE port_user SET 
					dec_id = ?
				WHERE usr_id = ?";
		$this->port->query($sql, array($this->dec_id, $this->usr_id));
	}

} //=== end class da_port_institute


?>