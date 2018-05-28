<?php
include_once("port_model.php");
class Da_port_user extends Port_model {
	// PK is usr_id

	public $usr_id;
	public $usr_tid;
	public $usr_tfname;
	public $usr_tlname;
	public $usr_efname;
	public $usr_elname;
	public $usr_tposition;
	public $usr_eposition;
	public $usr_istea;
	public $usr_isphd;
	public $usr_picpath;
	public $usr_born;
	public $usr_location;
	public $usr_dateforwork;
	public $usr_salary;
	public $usr_campus;
	public $usr_faculty;
	public $pfx_id;
	public $acr_id;
	public $dep_id;
	public $uaut_id;
	public $pos_id;

	function insert() {
		$sql = "INSERT INTO port_user (usr_tid, usr_tfname, usr_tlname, usr_efname, usr_elname, usr_tposition, usr_eposition, usr_istea, usr_isphd, usr_picpath,usr_born,usr_location, usr_campus,usr_faculty, usr_dateforwork, usr_salary, pfx_id, acr_id, dep_id, uaut_id,pos_id)
					VALUES(?,?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$this->port->query($sql, array(
			$this->usr_tid, 
			$this->usr_tfname, 
			$this->usr_tlname, 
			$this->usr_efname, 
			$this->usr_elname, 
			$this->usr_tposition, 
			$this->usr_eposition, 
			'0', 
			'0', 
			$this->usr_picpath, 
			$this->usr_born, 
			$this->usr_location, 
			$this->usr_campus,
			$this->usr_faculty,
			$this->usr_dateforwork,
			$this->usr_salary,
			$this->pfx_id, 
			$this->acr_id, 
			$this->dep_id, 
			$this->uaut_id,
			$this->pos_id));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_user SET 
					usr_tid = ?, 
					usr_tfname = ?, 
					usr_tlname = ?, 
					usr_efname = ?, 
					usr_elname = ?, 
					usr_tposition = ?, 
					usr_eposition = ?, 
					usr_isphd = ?, 
					usr_picpath = ?,
					usr_born = ?, 
					usr_location = ?, 					
					usr_campus = ?, 
					usr_faculty = ?, 
					usr_dateforwork = ?,
					usr_salary = ?,
					acr_id = ?, 
					dep_id = ?, 
					uaut_id = ?,
					pos_id = ?
				WHERE usr_id = ? ";
		$this->port->query($sql, array($this->usr_tid, $this->usr_tfname, $this->usr_tlname, $this->usr_efname, $this->usr_elname, $this->usr_tposition, $this->usr_eposition, $this->usr_isphd, $this->usr_picpath, $this->usr_born, $this->usr_location, $this->usr_campus,$this->usr_faculty, $this->usr_dateforwork, $this->usr_salary,$this->acr_id, $this->dep_id, $this->uaut_id, $this->pos_id, $this->usr_id));
		return $this->port->affected_rows();
	}

	// Update user Only name
		function update2() {
		$sql = "UPDATE port_user SET 
					usr_tfname = ?, 
					usr_tlname = ?, 
					usr_efname = ?, 
					usr_elname = ? 
				WHERE usr_id = ? ";
		$this->port->query($sql, array($this->usr_tfname, $this->usr_tlname, $this->usr_efname, $this->usr_elname, $this->usr_id));
		
		return $this->port->affected_rows();
	}

	// Update user General Information
		function update_General() {
		$sql = "UPDATE port_user SET 
					usr_tid = ?, 
					usr_tfname = ?, 
					usr_tlname = ?, 
					usr_efname = ?, 
					usr_elname = ?,
					usr_istea = ?,
					usr_isphd = ?,
					usr_born = ?, 
					usr_location = ?, 
					usr_campus = ?,
					usr_faculty = ?,
					usr_dateforwork = ?,
					usr_salary = ?,
					pfx_id = ?,
					acr_id = ?, 
					dep_id = ?,
					pos_id = ? 
				WHERE usr_id = ? ";
		$this->port->query($sql, array($this->usr_tid, $this->usr_tfname, $this->usr_tlname, $this->usr_efname, $this->usr_elname, $this->usr_istea, $this->usr_isphd, $this->usr_born, $this->usr_location, $this->usr_campus, $this->usr_faculty,  $this->usr_dateforwork,  $this->usr_salary, $this->pfx_id, $this->acr_id,$this->dep_id,$this->pos_id, $this->usr_id));
		
		return $this->port->affected_rows();
	}

	function delete($key) {
		$sql = "DELETE FROM port_user WHERE usr_id = ? ";
		$this->port->query($sql, array($key));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_user WHERE usr_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

	// function getByKey($uid) {
	// 	$sql = "SELECT * FROM port_user WHERE usr_id = ? ";
	// 	$query = $this->port->query($sql, array($key)) ;
	// 	return $query ;
	// }

} //=== end class da_port_user

?>