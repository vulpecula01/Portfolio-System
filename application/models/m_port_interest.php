<?php
include_once("da_port_interest.php");
class M_port_interest extends Da_port_interest {
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
		$sql = "SELECT * FROM port_interest $orderBy";
		$query = $this->port->query($sql);
		return $query ;
	}

	function getByUser(){
		$sql = "SELECT * FROM port_interest 
				LEFT JOIN port_interesttype ON port_interest.itt_id = port_interesttype.itt_id 
				WHERE usr_id = ? 
				ORDER BY port_interest.itt_id DESC, int_ename DESC";
		$query = $this->port->query($sql, array($this->usr_id));
		return $query ;
	}

	function getById(){
		$sql = "SELECT * FROM port_interest WHERE usr_id = ? AND int_id = ?";
		$query = $this->port->query($sql, array($this->usr_id, $this->int_id));
		return $query ;
	}

} //=== end class Port_interest
?>