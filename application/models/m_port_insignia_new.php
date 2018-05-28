<?php
include_once("da_port_insignia_new.php");
class M_port_insignia_new extends Da_port_insignia_new {
	//=== add your functions below

	function getAll(){

		$sql = "SELECT * FROM port_insignia_new 
		LEFT JOIN port_type_per ON port_insignia_new.per_id = port_type_per.per_id";
		
		$query = $this->port->query($sql);
		return $query->result_array();
	}



	function getById()
	{
		$sql = "SELECT * FROM port_insignia_new
		WHERE per_id = ? ";
		$query = $this->port->query($sql,  array($this->per_id));
		return $query->result_array();
	}

	function getLetByUsrId()
	{
		$sql = "SELECT * FROM port_insignia_new
		WHERE per_id = ? ";
		$query = $this->port->query($sql,  array($this->per_id, $this->let_reciever));
		return $query->result_array();
	}

	

	function getAllName(){
		$sql = "SELECT port_insignia_new.per_id, port_insignia_new.pn_id, port_insignia_new.pn_level, port_insignia_new.pn_name, port_insignia_new.pn_abb,
		port_type_per.per_type
		FROM port_insignia_new
		left JOIN port_type_per ON port_type_per.per_id = port_insignia_new.per_id;";
		$query = $this->port->query($sql);
		return $query;
	}

	function go($name){
		$sql = "SELECT * FROM  `port_insignia_new` WHERE  `per_id` = '$name'";
		
		$query = $this->port->query($sql);
		return $query->result_array();
	}
function getByPnId($aOrderBy=""){
		$orderBy = "";
		if (is_array($aOrderBy)) {
			$orderBy.="ORDER BY ";
			foreach ($aOrderBy as $key => $value) {
				$orderBy.= "$key $value, ";
			}
			$orderBy = substr($orderBy, 0, strlen($orderBy)-2);
		}
		$sql = "SELECT * FROM port_insignia_new WHERE per_id = ? $orderBy";
		$query = $this->port->query($sql, array($this->per_id));
		return $query->result_array();
	}
} //=== end class Port_type_per



