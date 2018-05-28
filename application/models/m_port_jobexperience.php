<?php
include_once("da_port_jobexperience.php");
class M_port_jobexperience extends Da_port_jobexperience {
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
		$sql = "SELECT * FROM port_jobexperience $orderBy";
		$query = $this->port->query($sql);
		return $query ;
	}

	function getByUser(){
		$sql = "SELECT * FROM port_jobexperience WHERE usr_id = ? ORDER BY  jox_todate DESC, jox_fromdate DESC";
		$query = $this->port->query($sql, array($this->usr_id));
		return $query ;
	}

	function getById(){
		$sql = "SELECT * FROM port_jobexperience WHERE jox_id = ?";
		$query = $this->port->query($sql, array($this->jox_id));
		return $query ;
	}

} //=== end class Port_jobexperience
?>