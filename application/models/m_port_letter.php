<?php
include_once("da_port_letter.php");
class M_port_letter extends Da_port_letter {
	//=== add your functions below

	function getAll(){

		$sql = "SELECT * FROM port_letter LEFT JOIN port_user ON port_letter.let_reciever=port_user.usr_id;";
		$query = $this->port->query($sql);
		return $query->result_array();
	}



	function getById()
	{
		$sql = "SELECT * FROM port_letter
		WHERE usr_id = ? ";
		$query = $this->port->query($sql,  array($this->usr_id));
		return $query->result_array();
	}

	function getLetByUsrId()
	{
		$sql = "SELECT * FROM port_letter
		WHERE usr_id = ? 
		OR let_reciever = ? ";
		$query = $this->port->query($sql,  array($this->usr_id, $this->let_reciever));
		return $query->result_array();
	}

	

	function getAllName(){
		$sql = "SELECT port_letter.usr_id, port_letter.let_id, port_letter.let_name, 
		port_user.usr_tfname, port_user.tlaname, port_letter.let_file
		FROM port_letter
		LEFT JOIN
		RIGHT JOIN JOIN port_user ON port_user.usr_id = port_letter.usr_id;";
		$query = $this->port->query($sql);
		return $query;
	}

	function go($name){
		$sql = "SELECT * FROM  `port_letter` WHERE  `no_id` = '$name'";
		
		$query = $this->port->query($sql);
		return $query->result_array();
	}

}


