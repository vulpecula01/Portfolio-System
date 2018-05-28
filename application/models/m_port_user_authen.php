<?php
include_once("da_port_user_authen.php");
class M_port_user_authen extends Da_port_user_authen {
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
		$sql = "SELECT * FROM port_user_authen
		LEFT JOIN port_user_status ON port_user_authen.uaut_id = port_user_status.uaut_id
		LEFT JOIN port_usre_authority ON port_user_authen.uaut_id = port_usre_authority.uaut_id
		

		
		$orderBy";
		$query = $this->port->query($sql);
		return $query->result_array();
	}
	

	function getById()
	{
		$sql = "SELECT * FROM port_user_authen
		LEFT JOIN port_user_status ON port_user_authen.uaut_id = port_user_status.uaut_id
		LEFT JOIN port_usre_authority ON port_user_authen.uaut_id = port_usre_authority.uaut_id
		
		WHERE port_user_authen.uaut_id = ?";
		$query = $this->port->query($sql,array($this->uaut_id));
		return $query->row_array();
	}

	function check_login()
	{
		$sql = "SELECT * FROM port_user_authen
		LEFT JOIN port_usre_authority ON port_user_authen.uaut_id = port_usre_authority.uaut_id
		WHERE uaut_username = ?";
		$query = $this->port->query($sql,array($this->uaut_username));
		if($this->port->affected_rows())
		{
			$query = $query->row_array();
			if(password_verify($this->uaut_password,$query['uaut_password'])){
				return $query;
			}else{
				return false;
			}
		}
		else{
			return false;
		}

		//return $this->user->affected_rows();
	}
	function check_user()
	{
		$sql = "SELECT * FROM port_user_authen
		LEFT JOIN port_usre_authority ON port_user_authen.uaut_id = port_usre_authority.uaut_id
		WHERE uaut_username = ?";
		$query = $this->port->query($sql,array($this->uaut_username));
		if($this->port->affected_rows())
		{
			$query = $query->row_array();
			return $query;
		}
		else
		{
			return false;
		}
	}
	function update_user_password_by_ldap()
	{
		$options = [
		'cost' => 10
		];
		$this->uaut_password = password_hash($this->uaut_password,PASSWORD_BCRYPT,$options);
		$sql = "UPDATE port_user_authen 
		SET port_user_authen.uaut_password = ?
		WHERE port_user_authen.uaut_username = ?";
		$this->port->query($sql,array($this->uaut_password,$this->uaut_username));
	}

} //=== end class Port_user_authen

?>
