<?php
include_once("da_port_type_personal.php");
class M_port_type_personal extends Da_port_type_personal {
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
		$sql = "SELECT * FROM port_type_personal $orderBy";
		$query = $this->user->query($sql);
		return $query ;
	}

} //=== end class Port_usre_authority

?>