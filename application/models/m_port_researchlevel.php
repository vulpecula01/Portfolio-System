<?php
include_once("da_port_researchlevel.php");
class M_port_researchlevel extends Da_port_researchlevel {
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
		$sql = "SELECT * FROM port_researchlevel $orderBy";
		$query = $this->port->query($sql);
		return $query->result_array() ;
	}

} //=== end class Port_researchlevel

?>