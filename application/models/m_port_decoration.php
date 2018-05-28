<?php
include_once("da_port_decoration.php");
class M_port_decoration extends Da_port_decoration {
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
		$sql = "SELECT * FROM port_decoration $orderBy";
		$query = $this->port->query($sql);
		return $query->result_array()  ;
	}
	
	public function get_dec_by_id($dec_id){
		$this->port->where('dec_id', $dec_id);
		$this->port->from('port_decoration');
		$port_decoration = $this->port->get();
		return $port_decoration->result_array();
	}

} //=== end class Port_major

?>