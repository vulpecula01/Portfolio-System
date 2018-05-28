<?php
include_once("da_port_degree.php");
class M_port_degree extends Da_port_degree {
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
		$sql = "SELECT * FROM port_degree
		LEFT JOIN port_level ON port_degree.edl_id = port_level.edl_id 
		$orderBy";
		$query = $this->port->query($sql);
		return $query->result_array();
	}

	function getByEdlId($aOrderBy=""){
		$orderBy = "";
		if (is_array($aOrderBy)) {
			$orderBy.="ORDER BY ";
			foreach ($aOrderBy as $key => $value) {
				$orderBy.= "$key $value, ";
			}
			$orderBy = substr($orderBy, 0, strlen($orderBy)-2);
		}
		$sql = "SELECT * FROM port_degree WHERE edl_id = ? $orderBy";
		$query = $this->port->query($sql, array($this->edl_id));
		return $query->result_array();
	}

} //=== end class Port_degree

?>