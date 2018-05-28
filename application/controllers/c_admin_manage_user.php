<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_admin_manage_user extends Port_core {

	public function index()
	{
		$data = '';
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');

		$this->form_validation->set_rules('uaut_username','Username (EN)','trim|required|alpha_numeric|min_length[4]|max_length[20]|is_unique[port_user_authen.uaut_username]|xss_clean');
		$this->form_validation->set_rules('uaut_password','Password','trim|required|min_length[4]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('uaut_password2','Re-Password','trim|required|min_length[4]|max_length[20]|matches[uaut_password]|xss_clean');
		$this->form_validation->set_rules('uaut_tfname','First Name (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('uaut_tlname','Last Name (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('uaut_efname','First Name (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('uaut_elname','Last Name (EN)','trim|required|xss_clean');

		if ($this->form_validation->run() == true){
			
			$this->port = $this->load->database('port', TRUE);

			
			$this->port->trans_begin();
			$this->load->model('m_port_user_authen','uaut');
			$this->load->model('m_port_user','puser');
			$this->load->model('m_port_usre_authority','aut');
			$this->load->model('m_port_user_status','status');
			// Insert User login		
			$this->uaut->uaut_username = $this->input->post('uaut_username');
			$this->uaut->uaut_password = $this->input->post('uaut_password');
			$this->uaut->uaut_tfname = $this->input->post('uaut_tfname');
			$this->uaut->uaut_tlname = $this->input->post('uaut_tlname');
			$this->uaut->uaut_efname = $this->input->post('uaut_efname');
			$this->uaut->uaut_elname = $this->input->post('uaut_elname');
			
			$insert_id = $this->uaut->insert();
			/*-----------------------------------------------------------------------------*/
			// Insert สิทธิ์
			$aut_authority = $this->input->post('aut_authority');
			$this->aut->aut_admin = 'N';
			$this->aut->aut_user = 'N';
			if($aut_authority == 'user')
			{
				$this->aut->aut_user = 'Y';
			}
			else if($aut_authority == 'admin')
			{
				$this->aut->aut_admin = 'Y';
			}
			else
			{
				$this->aut->aut_admin = 'Y';
				$this->aut->aut_user = 'Y';
			}
			$this->aut->uaut_id = $insert_id;
			
			$this->aut->Insert();
			/*..............*/
			$status_teacherStatus = $this->input->post('status_teacherStatus');
			$this->status->ts_status = 'T';
			$this->status->ts_status = 'L';
			$this->status->ts_status = 'R';
			if($status_teacherStatus == 'teach')
			{
				$this->status->ts_status = 'T';
			}
			else if($status_teacherStatus == 'learn')
			{
				$this->status->ts_status = 'L';
			}
			else if($status_teacherStatus == 'resign')
			{
				$this->status->ts_status = 'R';
			}
			
			$this->status->uaut_id = $insert_id;
			
			$this->status->Insert();
			/*-----------------------------------------------------------------------------*/
			// Insert User Infomation
			$this->puser->usr_tfname = $this->uaut->uaut_tfname;
			$this->puser->usr_tlname = $this->uaut->uaut_tlname;
			$this->puser->usr_efname = $this->uaut->uaut_efname;
			$this->puser->usr_elname = $this->uaut->uaut_elname;
			$this->puser->uaut_id = $insert_id;

			$this->puser->insert();
			/*-----------------------------------------------------------------------------*/

			if ($this->port->trans_status() == FALSE) {
				
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_admin_manage_user");
		}else{
			$this->load->model('m_port_user_authen','uaut');
			$data['user'] = $this->uaut->getAll("port_user_authen.uaut_username");
			
			$this->output_admin('User Management','v_manage_personal', $data);
		}
	}
	public function edit()
	{
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');

		$this->form_validation->set_rules('uaut_username','Username (EN)','trim|required|alpha_numeric|min_length[4]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('uaut_tfname','First Name (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('uaut_tlname','Last Name (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('uaut_efname','First Name (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('uaut_elname','Last Name (EN)','trim|required|xss_clean');
		if ($this->form_validation->run() == true){
			
			
			$this->port = $this->load->database('port', TRUE);
			
			$this->port->trans_begin();
			$this->load->model('m_port_user_authen','uaut');
			$this->load->model('m_port_user','puser');
			$this->load->model('m_port_usre_authority','aut');
			$this->load->model('m_port_user_status','status');
			// Update User Login
			$this->uaut->uaut_username = $this->input->post('uaut_username');
			$this->uaut->uaut_tfname = $this->input->post('uaut_tfname');
			$this->uaut->uaut_tlname = $this->input->post('uaut_tlname');
			$this->uaut->uaut_efname = $this->input->post('uaut_efname');
			$this->uaut->uaut_elname = $this->input->post('uaut_elname');
			$this->uaut->uaut_id = $this->input->post('uaut_id');

			$this->uaut->update();
			/*-----------------------------------------------------------------------------*/
			// update สิทธิ์
			$aut_authority = $this->input->post('aut_authority');
			$this->aut->aut_admin = 'N';
			$this->aut->aut_user = 'N';
			if($aut_authority == 'user')
			{
				$this->aut->aut_user = 'Y';
			}
			else if($aut_authority == 'admin')
			{
				$this->aut->aut_admin = 'Y';
			}
			else
			{
				$this->aut->aut_admin = 'Y';
				$this->aut->aut_user = 'Y';
			}
			$this->aut->uaut_id = $this->input->post('uaut_id');
			
			$this->aut->update();
			
			/*----------update status-------------------------------------------------------------------*/
			$status_teacherStatus = $this->input->post('status_teacherStatus');
			$this->status->ts_status = 'T';
			$this->status->ts_status = 'L';
			$this->status->ts_status = 'R';
			if($status_teacherStatus == 'teach')
			{
				$this->status->ts_status = 'T';
			}
			else if($status_teacherStatus == 'learn')
			{
				$this->status->ts_status = 'L';
			}
			else if($status_teacherStatus == 'resign')
			{
				$this->status->ts_status = 'R';
			}
			
			$this->status->uaut_id = $this->input->post('uaut_id');
			
			$this->status->update();

			// Update User Infomation
			$this->puser->usr_tfname = $this->uaut->uaut_tfname;
			$this->puser->usr_tlname = $this->uaut->uaut_tlname;
			$this->puser->usr_efname = $this->uaut->uaut_efname;
			$this->puser->usr_elname = $this->uaut->uaut_elname;
			$this->puser->usr_id = $this->uaut->uaut_id;

			// Update user Only name
			$this->puser->update2();

			if ($this->port->trans_status() == FALSE) {
				
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to update data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Update!</p>');
			}

			$result['message'] = 'success';
			echo json_encode($result);
		}
		else
		{
			$result['uaut_username'] = form_error('uaut_username');
			$result['uaut_tfname'] = form_error('uaut_tfname');
			$result['uaut_tlname'] = form_error('uaut_tlname');
			$result['uaut_efname'] = form_error('uaut_efname');
			$result['uaut_elname'] = form_error('uaut_elname');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	public function getById()
	{
		$this->load->model('m_port_user_authen','uaut');
		$this->uaut->uaut_id = $this->input->post('uaut_id');
		$user = $this->uaut->getById();

		echo '
		<input type="hidden" class="form-control" id="uaut_id" name="uaut_id" value="'.$user['uaut_id'].'"/>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-12">
				<label for="nameTH">ชื่อผู้ใช้งานระบบ (EN) <small class="error uaut_username"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-user"></i>
					</div>
					<input type="text" class="form-control" id="uaut_username"  name="uaut_username" value="'.$user['uaut_username'].'" placeholder="ผู้ใช้งานระบบเป็นภาษาอังกฤษ">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">สิทธิ์การใช้งาน</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-user"></i>
					</div>
					<select name="aut_authority" class="form-control" data-error="Choose authority" required>
						<option value="user"'.((($user['aut_user'] == 'Y') && ($user['aut_admin'] == 'N')) ? 'selected' : '').'> User (สิทธิ์ผู้ใช้งานทั่วไป) </option>
						<option value="admin"'.((($user['aut_user'] == 'N') && ($user['aut_admin'] == 'Y')) ? 'selected' : '').'> Admin (สิทธิ์ผู้ดูแลระบบ) </option>
						<option value="all"'.((($user['aut_user'] == 'Y') && ($user['aut_admin'] == 'Y')) ? 'selected' : '').'> User & Admin (สิทธิ์ผู้ใช้งานทั่วไปและผู้ดูแลระบบ) </option>
					</select>
				</div>
			</div>
		</div><!-- /.form group -->
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameENG">ชื่อ (TH) <small class="error uaut_tfname"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-user"></i>
					</div>
					<input type="text" class="form-control" id="uaut_tfname" name="uaut_tfname" value="'.$user['uaut_tfname'].'"  placeholder="กรอกชื่อเป็นภาษาอังกฤษ">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameENG">นามสกุล(TH) <small class="error uaut_tlname"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-user"></i>
					</div>
					<input type="text" class="form-control" id="uaut_tlname" name="uaut_tlname" value="'.$user['uaut_tlname'].'"  placeholder="กรอกนามสกุลเป็นภาษาอังกฤษ">
				</div>
			</div>

		</div>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameENG">ชื่อ (EN) <small class="error uaut_efname"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-user"></i>
					</div>
					<input type="text" class="form-control" id="uaut_efname" name="uaut_efname" value="'.$user['uaut_efname'].'"  placeholder="กรอกชื่อเป็นภาษาไทย">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameENG">นามสกุล (EN) <small class="error uaut_elname"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-user"></i>
					</div>
					<input type="text" class="form-control" id="uaut_elname" name="uaut_elname" value="'.$user['uaut_elname'].'"  placeholder="กรอกนามสกุลเป็นภาษาไทย">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">สถานะผู้ใช้งาน</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-user"></i>
					</div>
					<select name="status_teacherStatus" class="form-control" data-error="Choose TeacherStatus" required>
						<option value="teach"'.(($user['ts_status'] == 'T') ? 'selected' : '').'> กำลังสอน </option>
						<option value="learn"'.(($user['ts_status'] == 'L') ? 'selected' : '').'> ลาพักไปศึกษาต่อ </option>
						<option value="resign"'.(($user['ts_status'] == 'R') ? 'selected' : '').'> ลาออก </option>
					</select>
				</div>
			</div>
		</div><!-- /.form group -->
		</div>
		';

	}
}