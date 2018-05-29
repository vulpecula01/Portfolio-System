<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class c_export extends Port_core {

	public function pdf($uid=true)
	{
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
		
		$this->load->model('m_port_export','info');
		$data['person'] = $this->info->getUserInfo($userID);
		$data['tel'] = $this->info->getUserTel($userID);
		$data['mail'] = $this->info->getUserMail($userID);
		$data['bg'] = $this->info->getEducation($userID);
		$data['job'] = $this->info->getJobExp($userID);
		$data['award'] = $this->info->getAward($userID);
		$data['itr_topic'] = $this->info->getInterest($userID,'1');
		$data['itr_maj'] = $this->info->getInterest($userID,'2');
		$data['research'] = $this->get_researchReference($userID);
		$data['activity'] = $this->info->getActivity($userID);
		$data['director'] = $this->info->getDirector($userID);
		$data['lecturer'] = $this->info->getLecturer($userID);
		$data['train'] = $this->info->getTrain($userID);
		$data['insignia'] = $this->info->getInsignia($userID);
		
  
        $this->load->model('m_port_letter','let');
		$this->load->model('m_port_export','info');
        $this->let->usr_id = $userID;
        $this->let->let_reciever = $userID; 
        $data['let'] = $this->let->getLetByUsrId();

        // var_dump($data['let']); exit();

		$this->load->view('v_export_pdf', $data);
	}

	public function get_researchReference($id){
		$this->load->model('m_port_researcher', 'researcher');
        $this->researcher->usr_id = $id;
        $data['research'] = $this->researcher->getResearchById()->result_array();

        $reference = array();

        foreach($data['research'] as $value) {
            if(is_null($value['user_refer'])){
                $name = $value['student_refer'];
            }else{
                if(is_null($value['student_refer'])){
                    $name = $value['user_refer'];
                }else{
                    $name = $value['user_refer'].', '.$value['student_refer'];
                }
            }
            switch ($value['res_publicationtype']) {
                case '1':
                    array_push($reference, array('reference' => $name.'&nbsp;'.'('.$value['res_year'].').&nbsp;<font style="font-style: italic;">'.$value['res_eproject'].'.</font>&nbsp;'.$value['res_edonor'], 'type' => $value['res_publicationtype'], 'res_id' => $value['res_id']));
                    break;
                
                case '2':
                    $pages = explode('/', $value['res_page']);
                    if(sizeof($pages) == 3){
                        $page = '<font style="font-style: italic;">'.$pages[0].'('.$pages[1].'),&nbsp;</font>'.$pages[2];
                    }else{
                        $page = $value['res_page'];
                    }
                    array_push($reference, array('reference' => $name.'&nbsp;'.'('.$value['res_year'].').&nbsp;'.$value['res_eproject'].'.&nbsp;<font style="font-style: italic;">'.$value['res_etitle'].'</font>,&nbsp;'.$page, 'type' => $value['res_publicationtype'], 'rlv' => $value['rlv_etitle'], 'res_id' => $value['res_id']));
                    break;
                
                case '3':
                    array_push($reference, array('reference' => $name.'&nbsp;"'.$value['res_eproject'].'."&nbsp;<font style="font-style: italic;">'.$value['res_etitle'].'</font>&nbsp;'.$value['res_month'].'&nbsp;('.$value['res_year'].'):&nbsp;'.$value['res_page'].'.', 'type' => $value['res_publicationtype'], 'rlv' => $value['rlv_etitle'], 'res_id' => $value['res_id']));
                    break;
                
                default:
                break;
            }
        }
        // var_dump($reference);
        return $reference;
    }

	public function word($uid=true)
	{
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
		
		$this->load->model('m_port_export','info');
		$data['person'] = $this->info->getUserInfo($userID);
		$data['tel'] = $this->info->getUserTel($userID);
		$data['mail'] = $this->info->getUserMail($userID);
		$data['bg'] = $this->info->getEducation($userID);
		$data['job'] = $this->info->getJobExp($userID);
		$data['award'] = $this->info->getAward($userID);
		$data['itr_topic'] = $this->info->getInterest($userID,'1');
		$data['itr_maj'] = $this->info->getInterest($userID,'2');
		$data['research'] = $this->get_researchReference($userID);
		$data['activity'] = $this->info->getActivity($userID);
		$data['director'] = $this->info->getDirector($userID);
		$data['lecturer'] = $this->info->getLecturer($userID);
		$data['train'] = $this->info->getTrain($userID);
		$data['insignia'] = $this->info->getInsignia($userID);
		
  
        $this->load->model('m_port_letter','let');
		$this->load->model('m_port_export','info');
        $this->let->usr_id = $userID;
        $this->let->let_reciever = $userID; 
        $data['let'] = $this->let->getLetByUsrId();

        // var_dump($data['let']); exit();

		//$this->output_user('Export Word','v_export_word', $data);
		$this->load->view('v_export_word', $data);
	}
}