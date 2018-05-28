<?php
include_once("da_port_insignia.php");
class M_port_insignia extends Da_port_insignia {
	//=== add your functions below

	function getAll(){

		$sql = "SELECT * FROM port_insignia 
		LEFT JOIN port_user ON port_insignia.usr_id = port_user.usr_id
		LEFT JOIN port_decoration ON port_insignia.dec_id = port_decoration.dec_id
		LEFT JOIN port_position_personal ON port_user.pos_id = port_position_personal.pos_id";
		
		
		
		$query = $this->port->query($sql);
		return $query->result_array();
	}
	function get_by_usr_id_Desc($usr_id){

		$sql = "SELECT u.* FROM port_insignia AS u
		LEFT JOIN port_user AS y ON u.usr_id = y.usr_id
		LEFT JOIN port_decoration AS o ON u.dec_id = o.dec_id WHERE u.usr_id = '".$usr_id."'
		ORDER BY u.sign_id DESC";
		
		
		
		
		$query = $this->port->query($sql);
		return $query->result_array();
	}
	

	function getById()
	{
		$sql = "SELECT * FROM port_insignia
		WHERE usr_id = ? ";
		$query = $this->port->query($sql,  array($this->usr_id));
		return $query->result_array();
	}
	function getDecById($dec_id)
	{
		$sql = "SELECT * FROM port_insignia
		WHERE dec_id = ? ";
		$query = $this->port->query($sql,  array($this->dec_id));
		return $query->result_array();
	}

	function getLetByUsrId()
	{
		$sql = "SELECT * FROM port_insignia
		WHERE usr_id = ? ";
		$query = $this->port->query($sql,  array($this->usr_id, $this->let_reciever));
		return $query->result_array();
	}
	function getDecByUserId($usr_id)
	{
		$sql = "SELECT * FROM port_insignia
		WHERE usr_id = ? ";
		$query = $this->port->query($sql,  array($usr_id));
		return $query->result_array();
	}


	function go($name){
		$sql = "SELECT * FROM  `port_insignia` WHERE  `sign_id` = '$name'";
		
		$query = $this->port->query($sql);
		return $query->result_array();
	}
function getByKey() {
		$sql = "SELECT * FROM port_insignia 
		LEFT JOIN port_position_personal ON port_insignia.pos_id = port_position_personal.pos_id
		LEFT JOIN port_decoration ON port_insignia.dec_id = port_decoration.dec_id
			WHERE sign_id = ? ";
		$query = $this->port->query($sql, array($this->sign_id)) ;
		return $query ;
	}
}


