<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_info_pinfo_interest extends Port_core {

	public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('itt_tname','Interest (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('itt_ename','Interest (EN)','trim|required|xss_clean');

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_interesttype','int');

			$this->int->itt_tname = $this->input->post('itt_tname');
			$this->int->itt_ename = $this->input->post('itt_ename');

			$this->int->insert();

			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_info_pinfo_interest");
		}else{
			$this->load->model('m_port_interesttype','int');
			$data['int'] = $this->int->getAll();
			$this->output_admin('Interest','v_info_pinfo_interest', $data);
		}
	}
	function getById()
	{
		$this->load->model('m_port_interesttype','int');
		$this->int->itt_id = $this->input->post('itt_id');
		$int = $this->int->getByKey();
		echo '
		<input type="hidden" class="form-control" id="itt_id" name="itt_id" value="'.$int['itt_id'].'"/>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">ประเภทความสนใจ (TH) <small class="error itt_tname"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="itt_tname" name="itt_tname" placeholder="กรุณากรอกข้อมูล ..." value="'.$int['itt_tname'].'">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameTH">ประเภทความสนใจ (EN) <small class="error itt_ename"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="itt_ename" name="itt_ename" placeholder="กรุณากรอกข้อมูล ..." value="'.$int['itt_ename'].'">
				</div>
			</div>
		</div><!-- /.form group -->
		';
	}

	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('itt_id','itt_id','trim|required|xss_clean');
		$this->form_validation->set_rules('itt_tname','Interest (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('itt_ename','Interest (EN)','trim|required|xss_clean');

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_interesttype','int');

			$this->int->itt_tname = $this->input->post('itt_tname');
			$this->int->itt_ename = $this->input->post('itt_ename');
			$this->int->itt_id = $this->input->post('itt_id');

			$this->int->update();


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
			$result['itt_tname'] = form_error('itt_tname');
			$result['itt_ename'] = form_error('itt_ename');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	function deleteById()
	{
		$this->load->model('m_port_interesttype','int');
		$this->int->itt_id = $this->input->post('itt_id');
		$delete = $this->int->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_info_pinfo_interest");
	}


}