<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_info_pinfo_subject extends Port_core {

	public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('sub_code','Course Code','trim|required|xss_clean');
		$this->form_validation->set_rules('sub_tname','Subject (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('sub_ename','Subject (EN)','trim|required|xss_clean');

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_subject','sub');

			$this->sub->sub_code = $this->input->post('sub_code');
			$this->sub->sub_tname = $this->input->post('sub_tname');
			$this->sub->sub_ename = $this->input->post('sub_ename');
			$this->sub->insert();

			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_info_pinfo_subject");
		}else{
			$this->load->model('m_port_subject','sub');
			$data['sub'] = $this->sub->getAll();
			$this->output_admin('Subject','v_info_pinfo_subject', $data);
		}
	}



	function getById()
	{
		$this->load->model('m_port_subject','sub');
		$this->sub->sub_id = $this->input->post('sub_id');
		$sub = $this->sub->getByKey();
		echo '
		<input type="hidden" class="form-control" id="sub_id" name="sub_id" value="'.$sub['sub_id'].'"/>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-12">
				<label for="nameTH">รหัสวิชา <small class="error sub_code"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-file-text"></i>
					</div>
					<input type="text" class="form-control" id="sub_code" name="sub_code" placeholder="กรุณากรอกข้อมูล ..." value="'.$sub['sub_code'].'">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">ชื่อรายวิชา (TH) <small class="error sub_tname"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="sub_tname" name="sub_tname" placeholder="กรุณากรอกข้อมูล ..." value="'.$sub['sub_tname'].'">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameTH">ชื่อรายวิชา (EN) <small class="error sub_ename"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="sub_ename" name="sub_ename" placeholder="กรุณากรอกข้อมูล ..." value="'.$sub['sub_ename'].'">
				</div>
			</div>
		</div><!-- /.form group -->
		';
	}

	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('sub_id','sub_id','trim|required|xss_clean');
		$this->form_validation->set_rules('sub_code','Course Code','trim|required|xss_clean');
		$this->form_validation->set_rules('sub_tname','Subject (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('sub_ename','Subject (EN)','trim|required|xss_clean');
		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();

			$this->load->model('m_port_subject','sub');
			$this->sub->sub_code = $this->input->post('sub_code');
			$this->sub->sub_tname = $this->input->post('sub_tname');
			$this->sub->sub_ename = $this->input->post('sub_ename');
			$this->sub->sub_id = $this->input->post('sub_id');
			$this->sub->update();

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
			$result['sub_code'] = form_error('sub_code');
			$result['sub_tname'] = form_error('sub_tname');
			$result['sub_ename'] = form_error('sub_ename');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	function deleteById()
	{
		$this->load->model('m_port_subject','sub');
		$this->sub->sub_id = $this->input->post('sub_id');
		$delete = $this->sub->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_info_pinfo_subject");
	}
}