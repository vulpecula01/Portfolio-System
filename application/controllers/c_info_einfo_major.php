<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_info_einfo_major extends Port_core {

	public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('maj_tname','Major (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('maj_ename','Major (EN)','trim|required|xss_clean');

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_major','maj');

			$this->maj->maj_tname = $this->input->post('maj_tname');
			$this->maj->maj_ename = $this->input->post('maj_ename');

			$this->maj->insert();

			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_info_einfo_major");
		}else{
			$this->load->model('m_port_major','maj');
			$data['maj'] = $this->maj->getAll();
			$this->output_admin('Major','v_info_einfo_major', $data);
		}
		
	}

	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('maj_id','Major ID','trim|required|xss_clean');
		$this->form_validation->set_rules('maj_tname','Major (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('maj_ename','Major (EN)','trim|required|xss_clean');
		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();

			$this->load->model('m_port_major','maj');
			$this->maj->maj_tname = $this->input->post('maj_tname');
			$this->maj->maj_ename = $this->input->post('maj_ename');
			$this->maj->maj_id = $this->input->post('maj_id');
			$this->maj->update();

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
			$result['maj_tname'] = form_error('maj_tname');
			$result['maj_ename'] = form_error('maj_ename');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	function deleteById()
	{
		$this->load->model('m_port_major','maj');
		$this->maj->maj_id = $this->input->post('maj_id');
		$delete = $this->maj->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_info_einfo_major");
	}

	function getById()
	{
		$this->load->model('m_port_major','maj');
		$this->maj->maj_id = $this->input->post('maj_id');
		$maj = $this->maj->getByKey();
		echo '
		<input type="hidden" class="form-control" id="maj_id" name="maj_id" value="'.$maj['maj_id'].'"/>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">ชื่อวิชาเอก (TH) <small class="error maj_tname"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="maj_tname" name="maj_tname" placeholder="กรุณากรอกข้อมูล ..." value="'.$maj['maj_tname'].'">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameTH">ชื่อวิชาเอก (EN) <small class="error maj_ename"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="maj_ename" name="maj_ename" placeholder="กรุณากรอกข้อมูล ..." value="'.$maj['maj_ename'].'">
				</div>
			</div>
		</div><!-- /.form group -->
		';
	}
}