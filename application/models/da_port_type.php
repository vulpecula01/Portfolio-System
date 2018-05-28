<?php
include_once('port_model.php');
class Da_port_type extends Port_model {
	// PK is rty_id

	public $rty_id;
	public $rty_etitle;
	public $rty_ttitle;

	function __construct(){
       parent::__construct();
	}
	
	function Da_port_type() {
		parent::Model();
		// $this->db = $this->load->database('portfolio_develop',TRUE);
	}

	function insert() {
		$sql = "INSERT INTO port_type (rty_etitle, rty_ttitle)
					VALUES(?, ?)";
		$this->port->query($sql, array($this->rty_etitle, $this->rty_ttitle));
	}

	function update() {
		$sql = "UPDATE port_type SET 
					rty_etitle = ?, 
					rty_ttitle = ? 
				WHERE rty_id = ? ";
		$this->port->query($sql, array($this->rty_etitle, $this->rty_ttitle, $this->rty_id));
	}

	function delete($key) {
		$sql = "DELETE FROM port_type WHERE rty_id = ? ";
		$this->port->query($sql, array($key));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_type WHERE rty_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_type

?>