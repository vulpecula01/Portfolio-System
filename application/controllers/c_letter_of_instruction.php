<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_letter_of_instruction extends Port_core {


	public function __construct()
	{ 
		parent::__construct();

		$this->load->model('m_port_letter','let');

		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		
	}

	public function index($uid=true)
	{
		if($uid === true) {
			$usr_id = $this->session->userdata('usr_id');			
		} else {
			$uid_encrypt = $uid;
			$uid = strtr(
                $uid,
                array(
                    '.' => '+',
                    '-' => '=',
                    '~' => '/'
                )
       		);
			$uid = 	$this->encrypt->decode($uid);		
			$usr_id = $uid;
		}

		$data = '';
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');

		$this->form_validation->set_rules('let_id','Correspondence No.','trim|required|xss_clean');
		$this->form_validation->set_rules('let_name','Subject','trim|required|xss_clean');
		$this->form_validation->set_rules('let_file','Choose file','trim|xss_clean');
		

		if($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);

			$this->let->let_id = $this->input->post('let_id');
			$this->let->let_name = $this->input->post('let_name');
			$this->let->let_file = $this->input->post('let_file');
			$this->let->user_id = $this->input->post('let_reciever');
			
			
			
			$this->let->usr_id = $usr_id;

			$this->port->trans_begin();
			$this->let->insert();

			//insert query
			if ($this->port->trans_status() == FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect('c_letter_of_instruction/index/'.$uid_encrypt);
		}else{
			
		}
			$this->let->usr_id = $usr_id;
			$this->let->let_reciever = $usr_id;
			//$data['let'] = $this->let->getById();
			$data['let'] = $this->let->getLetByUsrId();
			$data['user_id'] = $uid;

			$this->output_user('Letter of Instruction', 'v_letter_of_instruction.php', $data);

	}

        
	public function update_self(){

		
		$this->let->let_id = $this->input->post('let_id');
		$this->let->let_name = $this->input->post('let_name');
		$this->let->let_file = $this->input->post('let_file');
		$this->let->old_file = $this->input->post('old_file');
		$this->let->no_id = $this->input->post('no_id');
		$this->let->user_id = $this->input->post('edb_id');
		
		//update query
		$this->let->update();
		redirect('c_letter_of_instruction/index');
	}



	public function delete_self($uid=true){
		$this->let->no_id = $this->input->post('no_id');
		$this->let->delete();
		//delete query
		redirect('c_letter_of_instruction/index/'.$uid);
	}


	public function getFile($file){
        $this->load->helper('download');
		$file = urldecode($file);

        $data = file_get_contents("/var/app/public/file/".$file);//file position
        //echo "/home/thitaree/public_html/portfolio/application/upfile/".$file;
        //exit();
        $type = explode(".", $file);
        $name = "FileTest.".end($type);//file name
        force_download($name, $data);
    }

    public function savefile(){
		// Form validation
    	$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('let_id','Correspondence No.','trim|required|xss_clean');
		$this->form_validation->set_rules('let_name','Subject','trim|required|xss_clean');	
    	
    	
		if(!$this->form_validation->run()){
			//redirect('c_letter_of_instruction/index/'.$encpy);
			$usr_id = $this->session->userdata('usr_id');
			$this->let->usr_id = $usr_id;
			$this->let->let_reciever = $usr_id;
			//$data['let'] = $this->let->getById();
			$data['let'] = $this->let->getLetByUsrId();
			// var_dump($data);
			$data['user_id'] = $usr_id;
			$this->output_user('Letter of Instruction', 'v_letter_of_instruction.php', $data);
		} 
		else {
     
	    	$id = $this->input->post('let_id');
			$name = $this->input->post('let_name');
			$encpy = $this->input->post('encpy');

	    	$filename = $name."-".time();

			$config['upload_path'] = '/var/app/public/file/';
			$config['allowed_types'] = 'doc|docx|pdf';
			$config['max_size'] = '10240';
			$config['remove_spaces'] = TRUE;
			$config['file_name'] = $filename;
			$this->load->library("upload",$config);

			//$FileName = '';
			


			// foreach ($_FILES as $key => $value) {
	 		$uploadfile = $_FILES['uploadfile'];
			if (!empty($uploadfile['tmp_name']) && $uploadfile['size'] > 0) {

				

				if ($this->upload->do_upload('uploadfile')) {
					$file_name = explode(".", $uploadfile['name']);
					$count = count($file_name);
					$extension = $file_name[$count-1];
					$full_filename = $filename.".".$extension;

					$this->port = $this->load->database('port', TRUE);

					$this->let->let_id = $id;
					$this->let->let_name = $name;
					$this->let->let_file = $full_filename;
					$this->let->usr_id = $this->session->userdata('usr_id');

					$this->port->trans_begin();
					$this->let->insert();

					redirect('c_letter_of_instruction/index/'.$encpy);

				} else {
					
					$errors = $this->upload->display_errors();
					echo $errors;
				}
			}

			// }
		}
		
	}



	public function get($uid=true){
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
                                    name="let_id" value="'.$value['let_id'].'" placeholder="Fill your Correspondence No.">
                                </div>
                            </div>
                        </div>
               <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="inputletter">ชื่อหัวข้อ <small class="error letter_name"></small></label>
                                    <input type="text" class="form-control" id="let_name" 
                                    name="let_name" value="'.$value['let_name'].'" placeholder="Fill your Subject">
                                </div>
                            </div>
                        </div>

                 <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                  <input name="uploadfile" type="file">
                                       &nbsp;  <a href="'.site_url('c_letter_of_instruction/getFile/'.$value['let_file']).'">'.$value['let_file'].'</a>
                                  <input type="hidden" name="old_file" value="'.$value['let_file'].'"/>
                                </div>
                            </div>
                        </div>
						

				</div>';				

			
		}


		//delete query
	
	}


	










}