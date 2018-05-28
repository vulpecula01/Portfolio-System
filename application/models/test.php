<?php
class test extends CI_model {
	public function gets_insignia()
	{
		$this->db->from('port_insignia')
		$query = $this->db->get();
		return $query->result_array();
	}

}
?>