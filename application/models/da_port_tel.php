<?php
include_once("port_model.php");
class Da_port_tel extends Port_model {
	// PK is tel_id

	public $tel_id;
	public $tel_tlabel;
	public $tel_elabel;
	public $tel_number;
	public $usr_id;

	function insert() {
		// echo "Insert ".$this->$this->tel_number."<br/>";
		$sql = "INSERT INTO port_tel (tel_tlabel, tel_elabel, tel_number, usr_id)
					VALUES(?, ?, ?, ?)";
		$this->port->query($sql, array($this->tel_tlabel, $this->tel_elabel, $this->tel_number, $this->usr_id));
	}

	function update() {
		// echo "Update ".$this->tel_id."<br/>";
		$sql = "UPDATE port_tel SET 
					tel_tlabel = ?, 
					tel_elabel = ?, 
					tel_number = ?, 
					usr_id = ? 
				WHERE tel_id = ? ";
		$this->port->query($sql, array($this->tel_tlabel, $this->tel_elabel, $this->tel_number, $this->usr_id, $this->tel_id));
	}

	function search($key){
		$sql = "SELECT tel_id FROM port_tel WHERE tel_id = ? ";
		$query = $this->port->query($sql, array($key));
		return $this->port->affected_rows();
	}

	function delete($key) {
		$sql = "DELETE FROM port_tel WHERE tel_id = ? ";
		$this->port->query($sql, array($key));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_tel WHERE tel_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_tel

?>