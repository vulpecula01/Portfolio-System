<?php
include_once("da_port_award.php");
class M_port_award extends Da_port_award {
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
		$sql = "SELECT * FROM port_award $orderBy";
		echo $sql;
		$query = $this->port->query($sql);
		return $query ;
	}

	function getByUser(){
		$sql = "SELECT * FROM port_award WHERE usr_id = ? ORDER BY 6 DESC";
		$query = $this->port->query($sql, array($this->usr_id));
		return $query ;
	}

	function getById(){
		$sql = "SELECT * FROM port_award WHERE awd_id = ?";
		$query = $this->port->query($sql, array($this->awd_id));
		return $query ;
	}

} //=== end class Port_award

?>