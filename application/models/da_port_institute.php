<?php
include_once("port_model.php");
class Da_port_institute extends Port_model {
	// PK is ins_id

	public $ins_id;
	public $ins_tname;
	public $ins_ename;
	public $cou_id;


	function insert() {
		$sql = "INSERT INTO port_institute (ins_tname, ins_ename, cou_id)
					VALUES(?, ?, ?)";
		$this->port->query($sql, array($this->ins_tname, $this->ins_ename, $this->cou_id));
		return $this->port->affected_rows();
	}

	function update() {
		$sql = "UPDATE port_institute SET 
					ins_tname = ?, 
					ins_ename = ?, 
					cou_id = ? 
				WHERE ins_id = ? ";
		$this->port->query($sql, array($this->ins_tname, $this->ins_ename, $this->cou_id, $this->ins_id));
		return $this->port->affected_rows();
	}

	function delete() {
		$sql = "DELETE FROM port_institute WHERE ins_id = ? ";
		$this->port->query($sql, array($this->ins_id));
		return $this->port->affected_rows();
	}

	function getByKey() {
		$sql = "SELECT * FROM port_institute WHERE ins_id = ? ";
		$query = $this->port->query($sql, array($this->ins_id)) ;
		return $query->row_array() ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_institute

?>