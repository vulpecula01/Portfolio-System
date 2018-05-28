<?php
include_once("da_port_usre_authority.php");
class M_port_usre_authority extends Da_port_usre_authority {
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
		$sql = "SELECT * FROM port_usre_authority $orderBy";
		$query = $this->port->query($sql);
		return $query ;
	}

} //=== end class Port_usre_authority

?>