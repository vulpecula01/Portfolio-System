<?php
include_once("da_port_funding.php");
class M_port_funding extends Da_port_funding {
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
		$sql = "SELECT * FROM port_funding $orderBy";
		$query = $this->port->query($sql);
		return $query ;
	}
	function insert_array($data){
		$this->port->insert_batch('port_funding', $data); 
	}

	function getByResearchId(){
		$sql = "SELECT * FROM port_funding as fund WHERE res_id = ?";
		$query = $this->port->query($sql, array($this->res_id));
		return $query ;
	}

	function deleteByResearcher(){
		$sql = "DELETE FROM port_funding WHERE res_id = ?;";
		$query = $this->port->query($sql, array($this->res_id));
		return $this->port->affected_rows();
	}

} //=== end class Port_funding

?>