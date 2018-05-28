<?php
include_once("da_port_research.php");
class M_port_research extends Da_port_research {
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
		$sql = "SELECT * FROM port_research $orderBy";
		$query = $this->port->query($sql);
		return $query ;
	}
	function getProjectById(){
		$sql = "SELECT * FROM port_research as research WHERE res_id = ?";
		$query = $this->port->query($sql, array($this->res_id));
		return $query;
	}

	function getAllResearch(){
		$sql = "SELECT * FROM port_research AS res 
		LEFT JOIN port_researchlevel AS lv ON `res`.`rlv_id` = `lv`.`rlv_id` 
		LEFT JOIN port_researchstatus AS status ON `res`.`rst_id` = `status`.`rst_id` 
		LEFT JOIN port_researchtype AS type ON `res`.`ret_id` = `type`.`ret_id`
		ORDER BY `res`.`res_publicationtype` ASC, `lv`.`rlv_id` ASC, `res`.`res_year` DESC";
		$query = $this->port->query($sql);
		return $query;
	}

	function getForReference(){
		$sql = "SELECT `research`.*, `lv`.*, GROUP_CONCAT(DISTINCT CONCAT(`user`.`usr_elname`,', ',LEFT(`user`.`usr_efname`,1),'.') SEPARATOR ', ') AS user_refer, 
		GROUP_CONCAT(DISTINCT CONCAT(`student`.`rsd_elname`,', ',LEFT(`student`.`rsd_efname`,1),'.') SEPARATOR ', ') AS student_refer 
		FROM port_research as research 
		LEFT JOIN port_researchlevel AS lv ON `research`.`rlv_id` = `lv`.`rlv_id` 
		LEFT JOIN port_researcher as researcher ON `research`.`res_id` = `researcher`.`res_id` 
		LEFT JOIN port_user as user ON `researcher`.`usr_id` = `user`.`usr_id` 
		LEFT JOIN port_researchstudent AS student ON `student`.`rsd_id` = `researcher`.`rsd_id` 
		GROUP BY `research`.`res_id`
		ORDER BY `research`.`res_publicationtype` ASC, `lv`.`rlv_id` ASC, `research`.`res_year` DESC";
		$query = $this->port->query($sql);
		return $query;
	}

} //=== end class Port_research

?>