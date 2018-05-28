<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_general_information extends Port_core {

	public function index($uid=true)
	{
		//echo site_url(); exit();
		// edit by Sarin
		if($uid === true) {
			$userID = $this->session->userdata('usr_id');			
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
			$userID = $uid;
		}

		//var_dump($userID); exit();

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('TID','ID','trim|required|xss_clean');
		$this->form_validation->set_rules('nameTH','Name (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('lnameTH','Lastname (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('nameENG','Name (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('lnameENG','Lastname (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('datework','year','trim|required|xss_clean');
		$this->form_validation->set_rules('Born','born','trim|required|xss_clean');
		$this->form_validation->set_rules('Location','location','trim|required|xss_clean');
		$this->form_validation->set_rules('Campus','campus','trim|required|xss_clean');
		$this->form_validation->set_rules('Faculty','faculty','trim|required|xss_clean');
		// $this->form_validation->set_rules('telnum[]','Phone Nummber','trim|required|xss_clean');
		// $this->form_validation->set_rules('mail[]','E-mail','trim|required|xss_clean');

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();

			////////////////// UPDATE General Information ////////////////////
			
			$this->load->model('da_port_user','usr');
			$this->usr->usr_tfname = $this->input->post('nameTH');
			$this->usr->usr_tlname = $this->input->post('lnameTH');

			$this->usr->usr_efname = $this->input->post('nameENG');
			// $nameErr = "";
			// if (!preg_match("/^[a-zA-Z ]*$/",$this->usr->usr_efname)) {
   //   			 $nameErr = "Only letters and white space allowed"; 
    			 	
   //  		}
			
			$this->usr->usr_elname = $this->input->post('lnameENG');
			$this->usr->usr_dateforwork = $this->input->post('datework');
			$this->usr->usr_tid = $this->input->post('TID');
			$this->usr->usr_born = $this->input->post('Born');
			$this->usr->usr_location = $this->input->post('Location');
			$this->usr->usr_campus = $this->input->post('Campus');
			$this->usr->usr_faculty = $this->input->post('Faculty');
			$this->usr->usr_salary = $this->input->post('salary');
			
			$this->usr->acr_id = $this->input->post('acrtitle');
			if ($this->usr->acr_id == '0') {
				$this->usr->acr_id = NULL;
			}

			$this->usr->pfx_id = $this->input->post('prefix');
			if ($this->usr->pfx_id == '0') {
				$this->usr->pfx_id = NULL;
			}

			if($this->input->post('usr_isphd') == 'yes'){
				$this->usr->usr_isphd = '1';
			}else{
				$this->usr->usr_isphd = '0';
			}

			if($this->input->post('usr_istea') == 'yes'){
				$this->usr->usr_istea = '1';
			}else{
				$this->usr->usr_istea = '0';
			}

			$this->usr->dep_id = $this->input->post('dep');
			$this->usr->pos_id = $this->input->post('pos');
			$this->usr->usr_id = $userID;

			$this->usr->update_General();

			//////////////////////// UPDATE Contact //////////////////////////

			$this->load->model('da_port_tel','telObj');

			////////////// TEST VARIABLE ///////////////
			// print_r($this->input->post('telID'));
			// echo "<br/>";
			// print_r($this->input->post('telnum'));
			// echo "<br/>";

			/////////////// ASSIGN VARIABLE //////////////
			$tel_id = $this->input->post('telID');
			$tel_tname = $this->input->post('ttellabel');
			$tel_ename = $this->input->post('etellabel');
			$tel_num = $this->input->post('telnum');
			$all = count($tel_num);
			
			//////////////////// FOR DELETE /////////////////
			$this->load->model('m_port_tel','telSelect');
			$this->telSelect->usr_id = $userID;
			$data = $this->telSelect->getTelID();

			$allID = count($data);

			///////////////// DELETE //////////////////////
			for ($i=0; $i < $allID; $i++) { 
				if ($data[$i]['tel_id'] != $tel_id[$i]) {
					// echo $data[$i]['tel_id'];
					$this->telObj->delete($data[$i]['tel_id']);
				}
			}

			////////////// UPDATE THEN INSERT /////////////////
			for ($i=0; $i < $all; $i++) {
				if ($this->telObj->search($tel_id[$i])) {

					$this->telObj->tel_id = $tel_id[$i];
					$this->telObj->tel_tlabel = $tel_tname[$i];
					$this->telObj->tel_elabel = $tel_ename[$i];
					$this->telObj->tel_number = $tel_num[$i];
					$this->telObj->usr_id = $userID;
					// echo "IF ".$this->telObj->tel_id."<br/>";
					$this->telObj->update();
				} else {
					$this->telObj->tel_tlabel = $tel_tname[$i];
					$this->telObj->tel_elabel = $tel_ename[$i];
					$this->telObj->tel_number = $tel_num[$i];
					$this->telObj->usr_id = $userID;
					// echo "ELSE ".$this->telObj->tel_number."<br/>";
					$this->telObj->insert();
				}
			}////////////// END UPDATE THEN INSERT /////////////////
			

			//////////////////////// UPDATE E-MAIL ///////////////////////////

			$this->load->model('da_port_mail','mailObj');

			// print_r($this->input->post('mailID'));
			// echo "<br/>";
			// print_r($this->input->post('mail'));
			// echo "<br/>";

			$mail_id = $this->input->post('mailID');
			$mail_name = $this->input->post('mail');
			$all = count($mail_name);
			// var_dump($mail_id);

			// $mailID = '';
			// $mailpost = $this->input->post('mailID');
			// if (is_array($mailpost)) {
			// 	foreach ($mailpost as $mail => $id) {
			//       //echo "Owner Name is : " . $id . "<br/>";
			//       array_push($mailID, $id);
			//     }
			// } else {
			//     $mailID = $this->input->post('mailID');
			// }

			//////////////////// FOR DELETE /////////////////
			$this->load->model('m_port_mail','mailSelect');
			$this->mailSelect->usr_id = $userID;
			$datamail = $this->mailSelect->getMailID();

			$allID = count($datamail);

			var_dump($datamail);

			///////////////// DELETE //////////////////////
			for ($i=0; $i < $allID; $i++) { 
				if ($datamail[$i]['mail_id'] != $mail_id[$i]) {
					// echo $datamail[$i]['mail_id'];
					$this->mailObj->delete($datamail[$i]['mail_id']);
				}
			}

			for ($i=0; $i < $all; $i++) { 
				
				if ($this->mailObj->search($mail_id[$i])) {
					$this->mailObj->mail_id = $mail_id[$i];
					$this->mailObj->mail_name = $mail_name[$i];
					$this->mailObj->usr_id = $userID;
					$this->mailObj->update();
				} else {
					$this->mailObj->mail_name = $mail_name[$i];
					$this->mailObj->usr_id = $userID;
					$this->mailObj->insert();
				}
			}
			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
			}else {
				$this->port->trans_commit();
			}
			redirect('c_general_information/index/'.$uid_encrypt);
		}else{
			$this->load->model('m_port_general_information','info');
			$this->load->model('m_port_export','generalinfo');
			$data['acr'] = $this->info->getAllAcademic();
			$data['dep'] = $this->info->getAllDepartment();
			$data['pos'] = $this->info->getAllPosition();
			$data['prefix'] = $this->info->getAllPrefix();
			$data['person'] = $this->info->getUserInfo($userID);
			$data['tel'] = $this->generalinfo->getUserTel($userID);
			$data['mail'] = $this->generalinfo->getUserMail($userID);
			$data['pic_path'] = $this->info->getPicPath($userID);
	
			// echo '<pre>';
			// var_dump($data); exit();
			$data['user_id'] = $uid;
			$this->output_user('General Information','v_general_information', $data);
		}
	}

	public function cropToFile($uid=''){
		$this->load->model('m_port_general_information','usr');
		$imgUrl = $_POST['imgUrl'];

		// original sizes
		$imgInitW = $_POST['imgInitW'];
		$imgInitH = $_POST['imgInitH'];
		// resized sizes
		$imgW = $_POST['imgW'];
		$imgH = $_POST['imgH'];
		// offsets
		$imgY1 = $_POST['imgY1'];
		$imgX1 = $_POST['imgX1'];
		// crop box
		$cropW = $_POST['cropW'];
		$cropH = $_POST['cropH'];
		// rotation angle
		$angle = $_POST['rotation'];

		$jpeg_quality = 300;

		$userName = $this->usr->getuaut_username($uid);
		// $userName = $this->session->userdata('uaut_username');
		$imagePath = $this->config->item('upload_profile');
		$output_filename = $imagePath.$userName;

		$what = getimagesize($imgUrl);

		switch(strtolower($what['mime']))
		{
		    case 'image/png':
		        $img_r = imagecreatefrompng($imgUrl);
				$source_image = imagecreatefrompng($imgUrl);
				$type = '.png';
		        break;
		    case 'image/jpeg':
		        $img_r = imagecreatefromjpeg($imgUrl);
				$source_image = imagecreatefromjpeg($imgUrl);
				error_log("jpg");
				$type = '.jpg';
		        break;
		    case 'image/gif':
		        $img_r = imagecreatefromgif($imgUrl);
				$source_image = imagecreatefromgif($imgUrl);
				$type = '.gif';
		        break;
		    default: die('image type not supported');
		}


		//Check write Access to Directory

		if(!is_writable(dirname($output_filename))){
			$response = array(
			    "status" => 'error',
			    "message" => 'Can`t write cropped File'
		    );	
		}else{

		    // resize the original image to size of editor
		    $resizedImage = imagecreatetruecolor($imgW, $imgH);
			imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW, $imgH, $imgInitW, $imgInitH);
		    // rotate the rezized image
		    $rotated_image = imagerotate($resizedImage, -$angle, 0);
		    // find new width & height of rotated image
		    $rotated_width = imagesx($rotated_image);
		    $rotated_height = imagesy($rotated_image);
		    // diff between rotated & original sizes
		    $dx = $rotated_width - $imgW;
		    $dy = $rotated_height - $imgH;
		    // crop rotated image to fit into original rezized rectangle
			$cropped_rotated_image = imagecreatetruecolor($imgW, $imgH);
			imagecolortransparent($cropped_rotated_image, imagecolorallocate($cropped_rotated_image, 0, 0, 0));
			imagecopyresampled($cropped_rotated_image, $rotated_image, 0, 0, $dx / 2, $dy / 2, $imgW, $imgH, $imgW, $imgH);
			// crop image into selected area
			$final_image = imagecreatetruecolor($cropW, $cropH);
			imagecolortransparent($final_image, imagecolorallocate($final_image, 0, 0, 0));
			imagecopyresampled($final_image, $cropped_rotated_image, 0, 0, $imgX1, $imgY1, $cropW, $cropH, $cropW, $cropH);
			// finally output png image
			//imagepng($final_image, $output_filename.$type, $png_quality);
			imagejpeg($final_image, $output_filename.$type, $jpeg_quality);
			$response = array(
			    "status" => 'success',
			    "url" => $output_filename.$type,
			    "picname" => $userName.$type
		    );
		    unlink($imgUrl);
		}
		print json_encode($response);

		$userID = $uid;
		$this->usr->usr_pic = $userName.$type;
		$this->usr->usr_id = $userID;
		$this->usr->updateUserPicpath();

		$this->session->set_userdata('usr_picpath',$this->usr->getPicPath($this->session->userdata('usr_id')));
	}

	public function saveToFile($uid=''){
		$imagePath = $this->config->item('upload_profile');

		$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
		$temp = explode(".", $_FILES["img"]["name"]);
		$extension = end($temp);

		
		//Check write Access to Directory

		if(!is_writable($imagePath)){
			$response = array(
				"status" => 'error',
				"message" => 'Can`t upload File; no write Access'
			);
			print json_encode($response);
			return;
		}
		
		if ( in_array($extension, $allowedExts))
		  {

		  if ($_FILES["img"]["error"] > 0)
			{
				 $response = array(
					"status" => 'error',
					"message" => 'ERROR Return Code: '.$_FILES["img"]["error"],
				);
				print json_encode($response);			
			}
		  else
			{
				
		      $filename = $_FILES["img"]["tmp_name"];
			  list($width, $height) = getimagesize( $filename );

			  move_uploaded_file($filename,  $imagePath . $_FILES["img"]["name"]);

			  $response = array(
				"status" => 'success',
				"url" => $imagePath.$_FILES["img"]["name"],
				"width" => $width,
				"height" => $height,
				"picname" => $_FILES["img"]["name"]
			  );

			}
		  }
		else
		  {
		   $response = array(
				"status" => 'error',
				"message" => 'something went wrong, most likely file is to large for upload. check upload_max_filesize, post_max_size and memory_limit in you php.ini',
			);
		  }
		  
		  print json_encode($response);
	}
}