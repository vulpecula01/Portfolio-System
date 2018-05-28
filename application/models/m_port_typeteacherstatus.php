<?php
include_once("de_port_typeteacherstatus.php");
class M_port_typeteacherstatus extends de_port_typeteacherstatus {
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
		$sql = "SELECT * FROM port_typeteacherstatus $orderBy";
		$query = $this->port->query($sql);
		return $query->result_array();
	}

} //=== end class Port_subject

?>