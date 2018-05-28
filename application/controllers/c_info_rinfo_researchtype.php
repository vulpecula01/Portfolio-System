<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_info_rinfo_researchtype extends Port_core {

	public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('ret_tname','Research Type (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('ret_ename','Research Type (EN)','trim|required|xss_clean');

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_researchtype','ret');

			$this->ret->ret_id = $this->input->post('ret_id');
			$this->ret->ret_tname = $this->input->post('ret_tname');
			$this->ret->ret_ename = $this->input->post('ret_ename');
			$this->ret->insert();

			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_info_rinfo_researchtype");
		}else{
			$this->load->model('m_port_researchtype','ret');
			$data['ret'] = $this->ret->getAll();
			$this->output_admin('Type of Research','v_info_rinfo_researchtype', $data);
		}
	}

	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('ret_id','ret ID','trim|required|xss_clean');
		$this->form_validation->set_rules('ret_tname','Research Type (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('ret_ename','Research Type (EN)','trim|required|xss_clean');
		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();

			$this->load->model('m_port_researchtype','ret');
			$this->ret->ret_tname = $this->input->post('ret_tname');
			$this->ret->ret_ename = $this->input->post('ret_ename');
			$this->ret->ret_id = $this->input->post('ret_id');
			$this->ret->update();

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
			$result['ret_tname'] = form_error('ret_tname');
			$result['ret_ename'] = form_error('ret_ename');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	function deleteById()
	{
		$this->load->model('m_port_researchtype','ret');
		$this->ret->ret_id = $this->input->post('ret_id');
		$delete = $this->ret->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_info_rinfo_researchtype");
	}

	function getById()
	{
		$this->load->model('m_port_researchtype','ret');
		$this->ret->ret_id = $this->input->post('ret_id');
		$ret = $this->ret->getByKey();
		echo '
		<input type="hidden" class="form-control" id="ret_id" name="ret_id" value="'.$ret['ret_id'].'"/>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">ประเภทงานวิจัย (TH) <small class="error ret_tname"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="ret_tname" name="ret_tname" placeholder="กรุณากรอกข้อมูล ..." value="'.$ret['ret_tname'].'">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameTH">ประเภทงานวิจัย (EN) <small class="error ret_ename"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="ret_ename" name="ret_ename" placeholder="กรุณากรอกข้อมูล ..." value="'.$ret['ret_ename'].'">
				</div>
			</div>
		</div><!-- /.form group -->
		';
	}
}