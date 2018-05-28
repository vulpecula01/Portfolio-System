<?php
include_once('port_model.php');
class Da_port_insignia_user extends Port_model {
	// PK is sign_id

	public $sign_id;
	public $sign_date;
	public $pos_id;
	public $dec_id;
	public $usr_id;

	function __construct(){
       parent::__construct();
	}
	
	function Da_port_insignia() {
		parent::Model();
		// $this->port = $this->load->database('portfolio_develop',TRUE);
	}



	function getByKey($key) {
		$sql = "SELECT * FROM port_insignia 
			LEFT JOIN port_decoration     ON port_decoration.dec_id     = port_insignia.dec_id
			WHERE sign_id = ? ";
		$query = $this->port->query($sql, array($key)) ;
		return $query ;
	}

	function last_insert_id(){
		return $this->port->insert_id();
	}

} //=== end class da_port_insignia

?>