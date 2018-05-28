<?php
include_once('port_model.php');
class Da_port_position extends Port_model {
	// PK is rpo_id

	public $rpo_id;
	public $rpo_etitle;
	public $rpo_ttitle;

	function __construct(){
       parent::__construct();
	}
	
	function Da_port_position() {
		parent::Model();
		// $this->db = $this->load->database('portfolio_develop',TRUE);
	}

	function insert() {
		$sql = "INSERT INTO port_position (rpo_etitle, rpo_ttitle)
					VALUES(?, ?)";
		$this->port->query($sql, array($this->rpo_etitle, $this->rpo_ttitle));
	}

	function update() {
		$sql = "UPDATE port_position SET 
					rpo_etitle = ?, 
					rpo_ttitle = ? 
				WHERE rpo_id = ? ";
		$this->port->query($sql, array($this->rpo_etitle, $this->rpo_ttitle, $this->rpo_id));
	}

	function delete($key) {
		$sql = "DELETE FROM port_position WHERE rpo_id = ? ";
		$this->port->query($sql, array($key));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_position WHERE rpo_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_position

?>