<?php
include_once("port_model.php");
class Da_port_letter_admin extends Port_model {
	
	public $no_id;
	public $usr_id;
	public $let_id;
	public $let_name;
	public $let_file;
	public $let_reciever;
	public $old_file;


	function insert() {
		$sql = "INSERT INTO port_letter (usr_id, let_id, let_name, let_file, let_reciever)
					VALUES(?, ?, ?, ?, ?)";
		$this->port->query($sql, array($this->usr_id, $this->let_id, $this->let_name, $this->let_file, $this->usr_id));
		return $this->port->affected_rows();
	}


	function insert_data() {
		/*echo "model";
		die(); */
		$sql = "INSERT INTO port_letter (let_id, let_name, let_reciever, let_file)
					VALUES(?, ?, ?, ?)";

						
						
		$this->port->query($sql, array($this->let_id, $this->let_name, $this->let_reciever, $this->let_file));
		return $this->port->affected_rows();
	}


	function update() {

		if($this->let_file==""){
				$sql = "UPDATE port_letter SET 
					let_id = '$this->let_id', 
					let_name = '$this->let_name', 
					let_file = '$this->old_file'
				WHERE no_id = '$this->user_id' ";
		}else{
					$sql = "UPDATE port_letter SET 
					let_id = '$this->let_id', 
					let_name = '$this->let_name', 
					let_file = '$this->let_file'
				WHERE no_id = '$this->user_id' ";
		}
	
		$this->port->query($sql);
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_letter WHERE no_id = ? ";
		$this->port->query($sql, array($this->no_id));
		return $this->port->affected_rows();
	}

	function getByKey($usr_id ,$let_id) {
		$sql = "SELECT * FROM port_letter 
		WHERE usr_id = $usr_id AND let_id = $let_id";
		$query = $this->port->query($sql);
		return $query->result_array();
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_institute

?>