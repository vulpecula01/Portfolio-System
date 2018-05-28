<?php
include_once("da_port_integrating.php");
class M_port_integrating extends Da_port_integrating {
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
		$sql = "SELECT * FROM port_integrating $orderBy";
		$query = $this->port->query($sql);
		return $query ;
	}

	function getByResearchId(){
		$sql = "SELECT * FROM port_integrating AS integrat WHERE res_id = ?";
		$query = $this->port->query($sql, array($this->res_id));
		return $query ;
	}

	function deleteByResearcher(){
		$sql = "SELECT int_id FROM port_integrating WHERE `res_id` = ?;";
		$this->int_id = (isset($this->port->query($sql, array($this->res_id))->row_array()['int_id'])?$this->port->query($sql, array($this->res_id))->row_array()['int_id']:null);
		$sql = "DELETE FROM port_integratingconnect WHERE `int_id` = ?;";
		$this->port->query($sql, array($this->int_id));
		$sql = "DELETE FROM port_integrating WHERE `res_id` = ?;";
		$this->port->query($sql, array($this->res_id));
		return $this->port->affected_rows();
	}
} //=== end class Port_integrating

?>