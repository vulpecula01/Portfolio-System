<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_admin_letter extends Port_core {


		public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('let_id','Correspondence No.','trim|required|xss_clean');
		$this->form_validation->set_rules('let_name','Subject','trim|required|xss_clean');
		

		if ($this->form_validation->run() == true){



			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_letter','let');
			$this->load->model('m_port_user', 'user');

			$this->let->let_id = $this->input->post('let_id');
			$this->let->let_name = $this->input->post('let_name');
			$this->let->let_reciever = $this->input->post('let_reciever');
			$this->let->let_file = $this->input->post('let_file');


			$this->port->trans_begin();
			$this->let->insert_data();


			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_admin_letter");
		}else{
			$this->load->model('m_port_letter','let');
			$this->load->model('m_port_user', 'user');
			$data['let'] = $this->let->getAll();
			$data['user'] = $this->user->getAllName()->result_array();
			
	
			$this->output_admin('Letter of Instruction','v_admin_letter', $data);
		}
	}


	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('let_id','Correspondence No.','trim|required|xss_clean');
		$this->form_validation->set_rules('let_name','Subject','trim|required|xss_clean');
		

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->load->model('m_port_letter','let');
			$this->load->model('m_port_user', 'user');
			$this->port->trans_begin();

			$this->let->let_id = $this->input->post('let_id');
			$this->let->let_name = $this->input->post('let_name');
			$this->let->let_reciever = $this->input->post('let_reciever');
			$this->let->let_file = $this->input->post('let_file');
			$this->let->old_file = $this->input->post('old_file');
			$this->let->usr_id = $this->input->post('usr_id');
			$this->let->update();

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
			$result['let_id'] = form_error('let_id');
			$result['let_name'] = form_error('let_name');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
		redirect('c_admin_letter/index');
	}


	function delete()
	{
		$this->load->model('m_port_letter','let');
		$this->let->no_id = $this->input->post('no_id');
		$delete = $this->let->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_admin_letter");
	}

	public function getFile($file){
        $this->load->helper('download');
        $file = urldecode($file);
        $data = file_get_contents("/var/app/public/file/".$file);//file position
        $type = explode(".", $file);
        $name = "FileTest.".end($type);//file name
        force_download($name, $data);
    }


	public function savefile(){


		// Set validate rule
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('let_id','Correspondence No.','trim|required|xss_clean');
		$this->form_validation->set_rules('let_name','Subject','trim|required|xss_clean');	
		$this->form_validation->set_rules('researchName','Reciever','required|xss_clean');

		
		if(!$this->form_validation->run()){
			
			$this->load->model('m_port_letter','let');
			$this->load->model('m_port_user','user');
			$data['let'] = $this->let->getAll();
			$data['user'] = $this->user->getAllName()->result_array();
			$this->output_admin('Letter of Instruction','v_admin_letter', $data);
		} 
		else {
     		
	    	$id = $this->input->post('let_id');
			$name = $this->input->post('let_name');
			$select_usr = $this->input->post('select_usr');
			$researchName = explode(",", $select_usr); //1,2,3,
			
	    	$filename = $name."-".time();

			$config['upload_path'] = '/var/app/public/file/';
			$config['allowed_types'] = 'doc|docx|pdf';
			$config['max_size'] = '10240';
			$config['remove_spaces'] = TRUE;
			$config['file_name'] = $filename;
			$this->load->library("upload",$config);

			//$FileName = '';

			foreach ($_FILES as $key => $value) {
	 
				if (!empty($value['tmp_name']) && $value['size'] > 0) {

					if ($this->upload->do_upload($key)) {
						$file_name = explode(".", $value['name']);
						$count = count($file_name);
						$extension = $file_name[$count-1];
						$full_filename = $filename.".".$extension;
						$this->load->model('m_port_letter','let');
						$this->load->model('m_port_user', 'user');
						$this->port = $this->load->database('port', TRUE);

						$loop = count($researchName)-1;
						for( $i=0; $i<$loop; $i++){

							$this->let->let_id = $id; 
							$this->let->let_name = $name; 
							$this->let->let_file = $full_filename; 
							$this->let->let_reciever = $researchName[$i];


							$this->port->trans_begin();
							$this->let->insert_data();

						} 

						redirect('c_admin_letter/index');

					} else {
						$errors = $this->upload->display_errors();
						echo $errors;
					}
				}
			}	
		}
	}



	public function get(){
		$this->load->model('m_port_letter','let');
		$this->load->model('m_port_user', 'user');
		$name = $this->input->post('no_id');
		$let = $this->let->go($name);
		
		
		
		foreach ($let as $value) { 

				echo '<div class="form-group">
		<input type="hidden" class="form-coutrol" id="editId" name="edb_id" value="'.$value['no_id'].'"/>
			 <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="inputletter">จดหมายเลขที่ <small class="error letter_id"></small></label>
                                    <input type="text" class="form-control" id="let_id" 
                                    name="let_id" value="'.$value['let_id'].'" placeholder="กรอกจดหมายเลขที่">
                                </div>
                            </div>
                        </div>
               <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="inputletter">หัวข้อเรื่อง <small class="error letter_name"></small></label>
                                    <input type="text" class="form-control" id="let_name" 
                                    name="let_name" value="'.$value['let_name'].'" placeholder="กรอกหัวข้อเรื่อง">
                                </div>
                            </div>
                        </div>                    
                <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                  <input name="let_file" type="file">
                                       &nbsp;  <a href="'.site_url('c_admin_letter/getFile/'.$value['let_file']).'">'.$value['let_file'].'</a>
                                  <input type="hidden" name="old_file" value="'.$value['let_file'].'"/>
                                </div>
                            </div>
                        </div>
						

				</div>';				

			
		}

    }


}