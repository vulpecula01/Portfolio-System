<?php
include_once('port_model.php');
class Da_port_director_admin extends Port_model {
	// PK is di_id

	public $di_id;
	public $di_tname;
	public $di_ename;
	public $di_tlocation;
	public $di_elocation;
	public $di_date;
	public $usr_id;


	function insert() {
		$sql = "INSERT INTO port_director (di_tname, di_ename, di_tlocation, di_elocation, di_date)
					VALUES(?, ?, ?, ?, ?)";
		$this->port->query($sql, array($this->di_tname, $this->di_ename, $this->di_tlocation, $this->di_elocation, $this->di_date));
		return $this->port->affected_rows();
	}
	function insert_data() {
		/*echo "model";
		die(); */
		$sql = "INSERT INTO port_director (di_tname, di_ename, di_tlocation, di_elocation, di_date)
					VALUES(?, ?, ?, ?, ?)";

						
						
		$this->port->query($sql, array($this->di_tname, $this->di_ename, $this->di_tlocation, $this->di_elocation, $this->di_date));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_director SET 
					di_id = '$this->di_id', 
					di_ename = '$this->di_ename', 
					di_tname = '$this->di_tname',
					di_date = '$this->di_date',
					di_tlocation = '$this->di_tlocation',
					di_elocation = '$this->di_elocation'
				WHERE di_id = '$this->user_id' ";
		$$this->port->query($sql);
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_director WHERE di_id = ? ";
		$this->port->query($sql, array($this->di_id));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_director WHERE di_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_award

?>