<?php
include_once("da_port_user.php");
class M_port_user extends Da_port_user {
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
		$sql = "SELECT * FROM port_user $orderBy";
		$query = $this->port->query($sql);
		return $query ;
	}
	function getAllUser(){

		$sql = "SELECT * FROM port_user 
		LEFT JOIN port_position_personal ON port_user.pos_id = port_position_personal.pos_id";
		
		
		
		$query = $this->port->query($sql);
		return $query;
	}
	function getById()
	{
		$sql = "SELECT * FROM port_user
		WHERE uaut_id = ?";
		$query = $this->port->query($sql,array($this->uaut_id));
		return $query->row_array();
	}

	function getAllName(){
		$sql = "SELECT usr_id,usr_tid, usr_tfname, usr_tlname, usr_efname, usr_elname,usr_born,usr_location, usr_dateforwork,usr_salary, usr_campus, usr_faculty FROM port_user ;";
		$query = $this->port->query($sql);
		return $query;
	}
	function get_user_by_id($usr_id)
	{
		$this->db->where('usr_id', $usr_id);
		$this->db->from('port_user');
		$query = $this->db->get();
		return $query->result_array();
	}
	

} //=== end class Port_user