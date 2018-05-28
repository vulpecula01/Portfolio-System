<?php
include_once("da_port_researcher.php");
class M_port_researcher extends Da_port_researcher {
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
		$sql = "SELECT * FROM port_researcher $orderBy";
		$query = $this->port->query($sql);
		return $query ;
	}

	function insert_array($data){
		$this->port->insert_batch('port_researcher', $data); 
	}

	function getByResearchId(){
		$sql = "SELECT * FROM port_researcher as researcher WHERE res_id = ?";
		$query = $this->port->query($sql, array($this->res_id));
		return $query ;
	}

	function deleteByResearcher(){
		$sql = "DELETE FROM port_researcher WHERE res_id = ?;";
		$query = $this->port->query($sql, array($this->res_id));
		return $this->port->affected_rows();
	}

	function getResearchById(){
		/*$sql = "SELECT `research`.*, `lv`.*, GROUP_CONCAT(DISTINCT CONCAT(`user`.`usr_elname`,', ',LEFT(`user`.`usr_efname`,1),'.') SEPARATOR ', ') AS user_refer, 
		GROUP_CONCAT(DISTINCT CONCAT(`student`.`rsd_elname`,', ',LEFT(`student`.`rsd_efname`,1),'.') SEPARATOR ', ') AS student_refer 
		FROM port_research as research 
		LEFT JOIN port_researchlevel AS lv ON `research`.`rlv_id` = `lv`.`rlv_id` 
		LEFT JOIN port_researcher as researcher ON `research`.`res_id` = `researcher`.`res_id`
		LEFT JOIN port_researcher as researcher_select ON `research`.`res_id` = `researcher`.`res_id` 
		LEFT JOIN port_user as user ON `researcher`.`usr_id` = `user`.`usr_id` 
		LEFT JOIN port_researchstudent AS student ON `student`.`rsd_id` = `researcher`.`rsd_id` 
		WHERE `researcher_select`.`usr_id` = ? 
		GROUP BY `research`.`res_id`
		ORDER BY `research`.`res_publicationtype` ASC, `lv`.`rlv_id` ASC, `research`.`res_year` DESC";
		*/
		$sql = "SELECT `research`.*, `lv`.*, 
					(SELECT GROUP_CONCAT(DISTINCT CONCAT(`user_sub1`.`usr_elname`,', ',LEFT(`user_sub1`.`usr_efname`,1),'.')    SEPARATOR  ', ') 
					FROM port_research as research_sub1 
					LEFT JOIN port_researcher as researcher_sub1 ON `research_sub1`.`res_id` = `researcher_sub1`.`res_id`
					LEFT JOIN port_user as user_sub1 ON `researcher_sub1`.`usr_id` = `user_sub1`.`usr_id` 
					WHERE `research_sub1`.`res_id` = `research`.`res_id`
					GROUP BY `research_sub1`.`res_id`) AS user_refer, 
					(SELECT GROUP_CONCAT(DISTINCT CONCAT(`student_sub2`.`rsd_elname`,', ',LEFT(`student_sub2`.`rsd_efname`,1),'.') SEPARATOR ', ')  
					FROM port_research as research_sub2 
					LEFT JOIN port_researcher as researcher_sub2 ON `research_sub2`.`res_id` = `researcher_sub2`.`res_id`
					LEFT JOIN port_researchstudent AS student_sub2 ON `student_sub2`.`rsd_id` = `researcher_sub2`.`rsd_id` 
					WHERE `research_sub2`.`res_id` = `research`.`res_id`
					GROUP BY `research`.`res_id`) AS student_refer 
				FROM port_research as research 
				LEFT JOIN port_researchlevel AS lv ON `research`.`rlv_id` = `lv`.`rlv_id` 
				LEFT JOIN port_researcher as researcher ON `research`.`res_id` = `researcher`.`res_id`
				LEFT JOIN port_user as user ON `researcher`.`usr_id` = `user`.`usr_id` 
				LEFT JOIN port_researchstudent AS student ON `student`.`rsd_id` = `researcher`.`rsd_id` 
				WHERE `researcher`.`usr_id` = ? 
				GROUP BY `research`.`res_id`
				ORDER BY `research`.`res_publicationtype` ASC, `lv`.`rlv_id` ASC, `research`.`res_year` DESC";
		$query = $this->port->query($sql, array($this->usr_id));
		return $query;
	}
	
} //=== end class Port_researcher

?>
