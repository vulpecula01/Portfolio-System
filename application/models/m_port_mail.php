<?php
include_once("da_port_mail.php");
class M_port_mail extends Da_port_mail {
	//=== add your functions below

	public $usr_id;

	function getAll($aOrderBy=""){
		$orderBy = "";
		if (is_array($aOrderBy)) {
			$orderBy.="ORDER BY ";
			foreach ($aOrderBy as $key => $value) {
				$orderBy.= "$key $value, ";
			}
			$orderBy = substr($orderBy, 0, strlen($orderBy)-2);
		}
		$sql = "SELECT * FROM port_mail $orderBy";
		$query = $this->port->query($sql);
		return $query ;
	}

	function getMailID(){
		$sql = "SELECT mail_id FROM port_mail WHERE usr_id = ?";
		$query = $this->port->query($sql,array($this->usr_id));
		return $query->result_array();
	}

} //=== end class Port_mail

?>