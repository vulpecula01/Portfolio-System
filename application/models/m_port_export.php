<?php
include_once('port_model.php');
class M_port_export extends Port_model {

	function getUserInfo($id) {
		$sql = 'SELECT CONCAT(us.usr_tfname," ",us.usr_tlname) AS usrtname,
				CONCAT(us.usr_efname," ",us.usr_elname) AS usrename,
				academic.acr_tname,academic.acr_ename,
				pfx.pfx_tname, pfx.pfx_ename, us.usr_istea, us.usr_tid, us.usr_born, us.usr_location, us.usr_campus, us.usr_faculty,
				dep.dep_ename,dep.dep_tname, us.usr_picpath
				FROM port_user AS us
				LEFT JOIN port_academictitle AS academic ON academic.acr_id = us.acr_id
				LEFT JOIN port_department AS dep ON dep.dep_id = us.dep_id
				LEFT JOIN port_prefix AS pfx ON pfx.pfx_id = us.pfx_id
				WHERE us.usr_id = ?';
		$query = $this->port->query($sql, array($id));
		return $query->row_array();
	}
	function getUserTel($id){
		$sql = 'SELECT tel_id,CONCAT(tel_elabel," (",tel_tlabel,")") AS tel,tel_number
				FROM port_tel
				WHERE usr_id = ?';
		$query = $this->port->query($sql, array($id));
		return $query->result_array();
	}
	function getUserMail($id){
		$sql = 'SELECT mail_id,mail_name
				FROM port_mail
				WHERE usr_id = ?';
		$query = $this->port->query($sql, array($id));
		return $query->result_array();
	}
	function getEducation($id){
		$sql = 'SELECT edu.edb_yeargraduate,edu.edb_ethesistopic, ins.ins_ename, cou.cou_ename, deg.deg_eacronym, maj.maj_ename
				FROM port_educationalbackground AS edu
				LEFT JOIN port_institute AS ins ON ins.ins_id = edu.ins_id
				LEFT JOIN port_country AS cou ON cou.cou_id = ins.cou_id
				LEFT JOIN port_degree AS deg ON deg.deg_id = edu.deg_id
				LEFT JOIN port_major AS maj ON maj.maj_id = edu.maj_id
				WHERE usr_id = ?
				ORDER BY edu.edb_no';
		$query = $this->port->query($sql, array($id));
		return $query->result_array();
	}
	function getJobExp($id){
		$sql = 'SELECT jox_ename,jox_fromdate AS start,
				CASE
					WHEN jox_todate = DATE_FORMAT(NOW(),"%Y")
						THEN "Present"
					ELSE jox_todate 
				END AS end
				FROM port_jobexperience
				WHERE usr_id = ?
				ORDER BY jox_id';
		$query = $this->port->query($sql, array($id));
		return $query->result_array();
	}
	function getAward($id){
		$sql = 'SELECT awd_ename,awd_date,awd_einsitute 
				FROM port_award
				WHERE usr_id = ?';
		$query = $this->port->query($sql, array($id));
		return $query->result_array();
	}
	function getInterest($UsID,$ittID){
		$sql = 'SELECT int_ename
				FROM port_interest
				WHERE usr_id = ? AND itt_id = ? ';
		$query = $this->port->query($sql, array($UsID,$ittID));
		return $query->result_array();
	}
	function getActivity($id){
		$sql = 'SELECT at_name,at_ename,at_date 
				FROM port_activity
				WHERE usr_id = ?';
		$query = $this->port->query($sql, array($id));
		return $query->result_array();
	}
	function getDirector($id){
		$sql = 'SELECT di_tname,di_ename,di_elocation,di_tlocation,di_date 
				FROM port_director
				WHERE usr_id = ?';
		$query = $this->port->query($sql, array($id));
		return $query->result_array();
	}
	function getLecturer($id){
		$sql = 'SELECT lec_tname,lec_ename,lec_elocation,lec_tlocation,lec_date 
				FROM port_lecturer
				WHERE usr_id = ?';
		$query = $this->port->query($sql, array($id));
		return $query->result_array();
	}
	function getTrain($id){
		$sql = 'SELECT tr_tname,tr_ename,tr_elocation,tr_tlocation,tr_date,tr_hour
				FROM port_train
				WHERE usr_id = ?';
		$query = $this->port->query($sql, array($id));
		return $query->result_array();
	}
	function getInsignia($id){
		$sql = 'SELECT dec_name, dec_abb, sign_date 
				FROM port_insignia
				LEFT JOIN port_decoration ON port_decoration.dec_id = port_insignia.dec_id
				WHERE usr_id = ?';
		$query = $this->port->query($sql, array($id));
		return $query->result_array();
	}

}

?>