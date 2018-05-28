<?php
include_once('port_model.php');
class Da_port_researcher extends Port_model {
	// PK is rer_id

	public $rer_id;
	public $rer_sequence;
	public $rer_percent;
	public $rsd_id;
	public $usr_id;
	public $res_id;
	public $rpo_id;

	function __construct(){
       parent::__construct();
	}
	
	function Da_port_researcher() {
		parent::Model();
		// $this->port = $this->load->database('portfolio_develop',TRUE);
	}

	function insert() {
		$sql = "INSERT INTO port_researcher (rer_sequence, rer_percent, usr_id, res_id, rpo_id, rsd_id)
					VALUES(?, ?, ?, ?, ?, ?)";
		$this->port->query($sql, array($this->rer_sequence, $this->rer_percent, $this->usr_id, $this->res_id, $this->rpo_id, $this->rsd_id));
	}

	function update() {
		$sql = "UPDATE port_researcher SET 
					rer_sequence = ?,
					rer_percent = ?,
					rsd_id = ?,
					usr_id = ?, 
					res_id = ?, 
					rpo_id = ? 
				WHERE rer_id = ? ";
		$this->port->query($sql, array($this->rer_sequence, $this->rer_percent, $this->rsd_id, $this->usr_id, $this->res_id, $this->rpo_id, $this->rer_id));
	}

	function delete() {
		$sql = "DELETE FROM port_researcher WHERE rer_id = ? ";
		$this->port->query($sql, array($this->rer_id));
	}

	function getByKey($key) {
		$sql = "SELECT * FROM port_researcher WHERE rer_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_researcher

?>