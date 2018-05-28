<?php
include_once("da_port_educationalbackground.php");
class M_port_educationalbackground extends Da_port_educationalbackground {
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
		$sql = "SELECT * FROM port_educationalbackground 
				LEFT JOIN port_major     ON port_major.maj_id     = port_educationalbackground.maj_id
				LEFT JOIN port_degree    ON port_degree.deg_id    = port_educationalbackground.deg_id
				LEFT JOIN port_institute ON port_institute.ins_id = port_educationalbackground.ins_id
				LEFT JOIN port_country	 ON port_country.cou_id	  = port_institute.cou_id
				LEFT JOIN port_level	 ON port_level.edl_id	  = port_degree.edl_id
				$orderBy";
		$query = $this->port->query($sql);
		return $query ;
	}


	function getByUser(){
		$sql = "SELECT * FROM port_educationalbackground 
				LEFT JOIN port_major     ON port_major.maj_id     = port_educationalbackground.maj_id
				LEFT JOIN port_degree    ON port_degree.deg_id    = port_educationalbackground.deg_id
				LEFT JOIN port_institute ON port_institute.ins_id = port_educationalbackground.ins_id
				LEFT JOIN port_country	 ON port_country.cou_id	  = port_institute.cou_id
				LEFT JOIN port_level	 ON port_level.edl_id	  = port_degree.edl_id
				WHERE usr_id = ?
		 		ORDER BY edb_yeargraduate DESC";
		$query = $this->port->query($sql, array($this->usr_id));
		return $query ;
	}

} //=== end class Port_educationalbackground
?>