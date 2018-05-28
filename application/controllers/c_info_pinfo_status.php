<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_info_pinfo_status extends Port_core {

	public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('sst_name','Status ','trim|required|xss_clean');
		

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_typeteacherstatus','status');

			$this->status->tts_name = $this->input->post('tts_name');
			$this->status->insert();

			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_info_pinfo_status");
		}else{
			$this->load->model('m_port_typeteacherstatus','status');
			$data['status'] = $this->status->getAll();
			$this->output_admin('status','v_info_pinfo_status', $data);
		}
	}



	function getById()
	{
		$this->load->model('m_port_typeteacherstatus','status');
		$this->status->tts_id = $this->input->post('tts_id');
		$status = $this->status->getByKey();
		echo '
		<input type="hidden" class="form-control" id="tts_id" name="tts_id" value="'.$status['tts_id'].'"/>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-12">
				<label for="nameTH">Course Code <small class="error tts_name"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-file-text"></i>
					</div>
					<input type="text" class="form-control" id="tts_name" name="tts_name" placeholder="Fill Course Code" value="'.$status['tts_name'].'">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">statusject (TH) <small class="error status_tname"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="status_tname" name="status_tname" placeholder="Fill statusject name in Thai" value="'.$status['status_tname'].'">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameTH">statusject (EN) <small class="error status_ename"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="status_ename" name="status_ename" placeholder="Fill statusject name in English" value="'.$status['status_ename'].'">
				</div>
			</div>
		</div><!-- /.form group -->
		';
	}

	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('tts_id','tts_id','trim|required|xss_clean');
		$this->form_validation->set_rules('tts_name','Status','trim|required|xss_clean');
		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();

			$this->load->model('m_port_typeteacherstatus','status');
			$this->status->tts_name = $this->input->post('tts_name');
			$this->status->tts_id = $this->input->post('tts_id');
			$this->status->update();

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
			$result['tts_name'] = form_error('tts_name');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	function deleteById()
	{
		$this->load->model('m_port_typeteacherstatus','status');
		$this->status->tts_id = $this->input->post('tts_id');
		$delete = $this->status->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_info_pinfo_statusject");
	}
}