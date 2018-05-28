<?php
include_once("da_port_insignia_user.php");
class M_port_insignia_user extends Da_port_insignia_user {
	//=== add your functions below

	function getAll($aOrderBy=""){
		$orderBy = "";
		if (is_array($aOrderBy)) {
			$orderBy.="ORDER BY ";
			foreach ($aOrderBy as $key => $value) {
				$orderBy.= "$key $value, ";
			}
			$orderBy = substr($orderBy, 0, strlen($orderBy)-2);
		}
		$sql = "SELECT * FROM port_insignia 
				LEFT JOIN port_decoration     ON port_decoration.dec_id     = port_insignia.dec_id
				
				$orderBy";
		$query = $this->port->query($sql);
		return $query ;
	}

	function getByUser(){
		$sql = "SELECT * FROM port_insignia 
				LEFT JOIN port_decoration     ON port_decoration.dec_id     = port_insignia.dec_id
				WHERE usr_id = ?
		 		ORDER BY sign_id DESC";
		$query = $this->port->query($sql, array($this->usr_id));
		return $query ;
	}

	function getById(){
		$sql = "SELECT * FROM port_insignia WHERE sign_id = ?";
		$query = $this->port->query($sql, array($this->sign_id));
		return $query ;
	}

} //=== end class port_insignia_user

?>