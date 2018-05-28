<?php
include_once("da_port_integratingconnect.php");
class M_port_integratingconnect extends Da_port_integratingconnect {
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
		$sql = "SELECT * FROM port_integratingconnect $orderBy";
		$query = $this->port->query($sql);
		return $query ;
	}
	function insert_array($data){
		$this->port->insert_batch('port_integratingconnect', $data); 
	}

	function getByIntegratingId(){
		$sql = "SELECT * FROM port_integratingconnect AS connect WHERE int_id = ?";
		$query = $this->port->query($sql, array($this->int_id));
		return $query ;
	}
} //=== end class Port_integratingconnect

?>