<?php
include_once("da_port_tech.php");
class M_port_tech extends Da_port_tech {
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
		$sql = "SELECT * FROM port_tech $orderBy";
		$query = $this->port->query($sql);
		return $query ;
	}

	function getAllWithSubjectByUser(){
		$sql = "SELECT `teach`.*, `subject`.`sub_code`, `subject`.`sub_ename`, `subject`.`sub_tname` FROM port_tech AS teach LEFT JOIN port_subject AS subject ON `teach`.`sub_id` = `subject`.`sub_id` WHERE `teach`.`usr_id` = ? ORDER BY `teach`.`tec_year` DESC;";
		$query = $this->port->query($sql, array($this->usr_id));
		return $query ;
	}

	function getById(){
		$sql = "SELECT * FROM port_tech WHERE `tec_id` = ?;";
		$query = $this->port->query($sql, array($this->tec_id));
		return $query ;
	}

	function getAllWithSubject(){
		$sql = "SELECT teach.*, `subject`.`sub_code`, `subject`.`sub_ename`, `subject`.`sub_tname` FROM port_tech AS teach LEFT JOIN port_subject AS subject ON `teach`.`sub_id` = `subject`.`sub_id`";
		$query = $this->port->query($sql);
		return $query ;
	}

} //=== end class Port_tech

?>