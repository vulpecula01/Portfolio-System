<?php
include_once("da_port_lecturer.php");
class M_port_lecturer extends Da_port_lecturer {
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
		$sql = "SELECT * FROM port_lecturer $orderBy";
		echo $sql;
		$query = $this->port->query($sql);
		return $query ;
	}

	function getByUser(){
		$sql = "SELECT * FROM port_lecturer WHERE usr_id = ? ORDER BY 6 DESC";
		$query = $this->port->query($sql, array($this->usr_id));
		return $query ;
	}

	function getById(){
		$sql = "SELECT * FROM port_lecturer WHERE lec_id = ?";
		$query = $this->port->query($sql, array($this->lec_id));
		return $query ;
	}

} //=== end class port_lecturer

?>