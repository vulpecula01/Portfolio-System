<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_info_einfo_institute extends Port_core {

	public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('cou_id','Course Code','trim|required|xss_clean');
		$this->form_validation->set_rules('ins_tname','Institute Name (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('ins_ename','Institute Name (EN)','trim|required|xss_clean');

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_institute','ins');

			$this->ins->cou_id = $this->input->post('cou_id');
			$this->ins->ins_tname = $this->input->post('ins_tname');
			$this->ins->ins_ename = $this->input->post('ins_ename');
			$this->ins->insert();

			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_info_einfo_institute");
		}else{
			$this->load->model('m_port_country','con');
			$data['con'] = $this->con->getAll();
			$this->load->model('m_port_institute','ins');
			$data['ins'] = $this->ins->getAll();
			$this->output_admin('Subject','v_info_einfo_institute', $data);
		}
	}



	function getById()
	{
		$this->load->model('m_port_country','con');
		$con = $this->con->getAll();
		$this->load->model('m_port_institute','ins');
		$this->ins->ins_id = $this->input->post('ins_id');
		$ins = $this->ins->getByKey();
		$select = '';
		foreach ($con as $row) {
			if($ins['cou_id'] == $row['cou_id'])
				$select  = $select.'<option value="'.$row['cou_id'].'" selected>'.$row['cou_ename'].' ('.$row['cou_tname'].')</option>';
			else
				$select  = $select.'<option value="'.$row['cou_id'].'">'.$row['cou_ename'].' ('.$row['cou_tname'].')</option>';
		}
		echo '
		<input type="hidden" class="form-control" id="ins_id" name="ins_id" value="'.$ins['ins_id'].'"/>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">ชื่อสถาบัน (TH) <small class="error ins_tname"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="ins_tname" name="ins_tname" placeholder="กรุณากรอกข้อมูล ..." value="'.$ins['ins_tname'].'">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameTH">ชื่อสถาบัน (EN) <small class="error ins_ename"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="ins_ename" name="ins_ename" placeholder="กรุณากรอกข้อมูล ..." value="'.$ins['ins_ename'].'">
				</div>
			</div>
		</div><!-- /.form group -->
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-12">
				<label for="nameTH">ประเทศ <small class="error cou_id"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-file-text"></i>
					</div>
					<select name="cou_id" class="form-control" data-error="Choose Country" required>
						'.$select.'
					</select>
				</div>
			</div>
		</div>
		';
	}

	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('ins_id','ins_id','trim|required|xss_clean');
		$this->form_validation->set_rules('cou_id','Course Code','trim|required|xss_clean');
		$this->form_validation->set_rules('ins_tname','Institute Name (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('ins_ename','Institute Name (EN)','trim|required|xss_clean');
		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();

			$this->load->model('m_port_institute','ins');
			$this->ins->cou_id = $this->input->post('cou_id');
			$this->ins->ins_tname = $this->input->post('ins_tname');
			$this->ins->ins_ename = $this->input->post('ins_ename');
			$this->ins->ins_id = $this->input->post('ins_id');
			$this->ins->update();

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
			$result['cou_id'] = form_error('cou_id');
			$result['ins_tname'] = form_error('ins_tname');
			$result['ins_ename'] = form_error('ins_ename');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	function deleteById()
	{
		$this->load->model('m_port_institute','ins');
		$this->ins->ins_id = $this->input->post('ins_id');
		$delete = $this->ins->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_info_einfo_institute");
	}
}