<?php
include_once('port_model.php');
class M_port_general_information extends Port_model {
	public $usr_id;
	public $usr_pic;

	function getUserInfo($id) {
		$sql = 'SELECT us.usr_id,us.usr_tid, us.usr_tfname,us.usr_tlname,us.usr_efname,us.usr_elname,us.usr_isphd,us.usr_born,us.usr_location,us.usr_dateforwork,us.usr_campus,us.usr_faculty,us.usr_salary,
				CONCAT(academic.acr_ename," (",academic.acr_tname,")") AS academictitle, academic.acr_id,
				CONCAT(dep.dep_ename," (",dep.dep_tname,")") AS department, dep.dep_id,
				CONCAT(pos.pos_type," (",pos.pos_name,")") AS position, pos.pos_id,
				us.usr_picpath, us.pfx_id, pfx.pfx_tname, pfx.pfx_ename, us.usr_istea
				FROM port_user AS us
				LEFT JOIN port_academictitle AS academic ON academic.acr_id = us.acr_id
				LEFT JOIN port_department AS dep ON dep.dep_id = us.dep_id
				LEFT JOIN port_prefix AS pfx ON pfx.pfx_id = us.pfx_id
				LEFT JOIN port_position_personal AS pos ON pos.pos_id = us.pos_id
				WHERE us.usr_id = ?';
		$query = $this->port->query($sql, array($id));
		return $query->row_array();
	}

	function getAllPrefix(){
		$sql = 'SELECT CONCAT(pfx_ename," (",pfx_tname,")") AS pfxname, pfx_id
				FROM port_prefix';
		$query = $this->port->query($sql);
		return $query->result_array();
	}
	

	function getAllAcademic(){
		$sql = 'SELECT CONCAT(acr_ename," (",acr_tname,")") AS arcname, acr_id
				FROM port_academictitle';
		$query = $this->port->query($sql);
		return $query->result_array();
	}

	function getAllDepartment() {
		$sql = 'SELECT CONCAT(dep_ename," (",dep_tname,")") AS department, dep_id
				FROM port_department';
		$query = $this->port->query($sql);
		return $query->result_array();
	}
	function getAllPosition() {
		$sql = 'SELECT CONCAT(pos_type," (",pos_name,")") AS position, pos_id
				FROM port_position_personal';
		$query = $this->port->query($sql);
		return $query->result_array();
	}

	function updateUserPicpath(){
		$sql = 'UPDATE port_user SET usr_picpath = ? 
				WHERE usr_id = ?';
		$query = $this->port->query($sql, array($this->usr_pic,$this->usr_id));
	}

	function getPicPath($userID){
		$query = $this->port->get_where('port_user', ['usr_id' => $userID]);
		$result = $query->row_array();
		if(!empty($result)) {
			return $result['usr_picpath'];
		} else {
			return '0.png';
		}
	}

	function getuaut_username($uid)
	{
		$query = $this->port->get_where('port_user', ['usr_id' => $uid]);
		$result = $query->row_array();

		$uautid = $result['uaut_id'];

		$query2 = $this->port->get_where('port_user_authen', ['uaut_id' => $uautid]);
		$result2 = $query2->row_array();

		if(!empty($result2)) {
			return $result2['uaut_username'];
		} else {
			return '';
		}

	}
}

?>