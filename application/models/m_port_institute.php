<?php
include_once("da_port_institute.php");
class M_port_institute extends Da_port_institute {
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
		$sql = "SELECT * FROM port_institute 
		LEFT JOIN port_country ON port_institute.cou_id = port_country.cou_id
		$orderBy";
		$query = $this->port->query($sql);
		return $query->result_array()  ;
	}

	function getByCouId($aOrderBy=""){
		$orderBy = "";
		if (is_array($aOrderBy)) {
			$orderBy.="ORDER BY ";
			foreach ($aOrderBy as $key => $value) {
				$orderBy.= "$key $value, ";
			}
			$orderBy = substr($orderBy, 0, strlen($orderBy)-2);
		}
		$sql = "SELECT * FROM port_institute WHERE cou_id = ? $orderBy";
		$query = $this->port->query($sql, array($this->cou_id));
		return $query->result_array();
	}

} //=== end class Port_institute

?>