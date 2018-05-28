<?php
include_once("da_port_user_status.php");
class M_port_user_status extends Da_port_user_status {
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
		$sql = "SELECT * FROM port_user_status $orderBy";
		$query = $this->port->query($sql);
		return $query ;
	}

} //=== end class Port_usre_authority

?>