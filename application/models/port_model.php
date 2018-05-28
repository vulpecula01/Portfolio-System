<?php

class Port_model extends CI_Model {

	function __construct() {
		parent::__construct();
		
		$this->port = $this->load->database('port', TRUE);
	}
	
}
// include ตัวนี้
// include_once("port_model.php");
// แล้ว extends ตัวนี้
// extends Port_model

?>