<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_info_einfo_type extends Port_core {

	public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('per_type','type_per (TH)','trim|required|xss_clean');
		

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_type_per','per');

			$this->per->per_type = $this->input->post('per_type');
			

			$this->per->insert();

			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_info_einfo_type");
		}else{
			$this->load->model('m_port_type_per','per');
			$data['per'] = $this->per->getAll();
			$this->output_admin('Type','v_info_einfo_type', $data);
		}
		
	}

	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('per_id','Department ID','trim|required|xss_clean');
		$this->form_validation->set_rules('per_type','type_per (TH)','trim|required|xss_clean');
	
		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();

			$this->load->model('m_port_type_per','per');
			$this->per->per_type = $this->input->post('per_type');
			$this->per->per_id = $this->input->post('per_id');
			$this->per->update();

			if ($this->port->trans_status() == FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to update data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is update!</p>');
			}

			$result['message'] = 'success';
			echo json_encode($result);
		}
		else
		{
			$result['per_type'] = form_error('per_type');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	function deleteById()
	{
		$this->load->model('m_port_type_per','per');
		$this->per->per_id = $this->input->post('per_id');
		$delete = $this->per->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_info_einfo_type");
	}

	function getById()
	{
		$this->load->model('m_port_type_per','per');
		$this->per->per_id = $this->input->post('per_id');
		$per = $this->per->getByKey();
		echo '
		<input type="hidden" class="form-pertrol" id="per_id" name="per_id" value="'.$per['per_id'].'"/>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">type_per (TH) <small class="error per_type"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-pertrol" id="per_type" name="per_type" placeholder="Fill type_per in Thai" value="'.$per['per_type'].'">
				</div>
			</div>
		</div><!-- /.form group -->
		';
	}
}