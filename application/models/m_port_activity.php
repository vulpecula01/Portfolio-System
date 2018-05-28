<?php
include_once("da_port_activity.php");
class M_port_activity extends Da_port_activity {
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
		$sql = "SELECT * FROM port_activity $orderBy";
		$query = $this->port->query($sql);
		return $query ;
	}

	function getByUser(){
		$sql = "SELECT * FROM port_activity WHERE usr_id = ? ORDER BY  at_date DESC";
		$query = $this->port->query($sql, array($this->usr_id));
		return $query ;
	}

	function getById(){
		$sql = "SELECT * FROM port_activity WHERE at_id = ?";
		$query = $this->port->query($sql, array($this->at_id));
		return $query ;
	}

} //=== end class Port_jobexperience
?>