<?php
include_once("da_port_researchertype.php");
class M_port_researchertype extends Da_port_researchertype {
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
		$sql = "SELECT * FROM port_researchertype $orderBy";
		$query = $this->port->query($sql);
		return $query->result_array();
	}

} //=== end class Port_researchertype

?>