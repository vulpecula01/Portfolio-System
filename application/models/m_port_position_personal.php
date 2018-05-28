<?php
include_once("da_port_position_personal.php");
class M_port_position_personal extends Da_port_position_personal {
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
		$sql = "SELECT * FROM port_position_personal
		$orderBy";
		$query = $this->port->query($sql);
		return $query->result_array();
	}
	
	function getByPosId($aOrderBy=""){
		$orderBy = "";
		if (is_array($aOrderBy)) {
			$orderBy.="ORDER BY ";
			foreach ($aOrderBy as $key => $value) {
				$orderBy.= "$key $value, ";
			}
			$orderBy = substr($orderBy, 0, strlen($orderBy)-2);
		}
		$sql = "SELECT * FROM port_position_personal WHERE posty_id = ? $orderBy";
		$query = $this->port->query($sql, array($this->posty_id));
		return $query->result_array();
	}

} //=== end class Port_major

?>