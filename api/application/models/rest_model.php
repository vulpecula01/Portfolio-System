<?php
include_once("port_model.php");

class Rest_model extends Port_model {

	public $userID;
	public $lang;
	function __construct() {
		parent::__construct();
	}

	function getAllUser() {
		if($this->lang == 'en') {
			$this->port->select('usr_id, usr_efname, usr_elname, usr_eposition, usr_isphd, dep_ename, usr_picpath, acr_ename, acr_eacronym, usr_istea');
			$this->port->from('port_user');
			$this->port->join('port_academictitle', 'port_user.acr_id = port_academictitle.acr_id', 'left');
			$this->port->join('port_department', 'port_user.dep_id = port_department.dep_id');
			$this->port->join('port_prefix', 'port_user.pfx_id = port_prefix.pfx_id', 'left');
			$query = $this->port->get();

			foreach ($query->result_array() as $user) {
				$this->userID = $user['usr_id'];
				$teacher['userid'] = $user['usr_id'];				

				if($user['usr_istea'] == '0') {
					if($user['usr_isphd'] == '1') {
						$teacher['full_name'] = $user['usr_efname'] . ' ' . $user['usr_elname'] . ', Ph.D.';
					} elseif ($user['usr_isphd'] == '0') {
						$teacher['full_name'] = $user['usr_efname'] . ' ' . $user['usr_elname'];
					}
				} else {
					if($user['usr_isphd'] == '1') {
						$teacher['full_name'] = $user['acr_ename'] . ' ' . $user['usr_efname'] . ' ' . $user['usr_elname'] . ', Ph.D.';
					} elseif ($user['usr_isphd'] == '0') {
						$teacher['full_name'] = $user['acr_ename'] . ' ' . $user['usr_efname'] . ' ' . $user['usr_elname'];
					}
				}

				$teacher['department'] = $user['dep_ename'];
				$teacher['position'] = $user['usr_eposition'];
				$teacher['emaillist'] = $this->getemail();
				$teacher['tellist'] = $this->getetel();
				if($user['usr_picpath'] != null) {
					$teacher['picurl'] = base_url('/index.php/getpic?image=').$user['usr_picpath'];
				} else {
					$teacher['picurl'] = base_url('/index.php/getpic?image=').'0.png';
				}
				$userList['user'][] = $teacher;
			}
		} elseif ($this->lang == 'th') {
			$this->port->select('usr_id, usr_tfname, usr_tlname, usr_tposition, usr_isphd, dep_tname, usr_picpath, acr_tname, acr_tacronym, usr_istea');
			$this->port->from('port_user');
			$this->port->join('port_academictitle', 'port_user.acr_id = port_academictitle.acr_id');
			$this->port->join('port_department', 'port_user.dep_id = port_department.dep_id');
			$query = $this->port->get();

			foreach ($query->result_array() as $user) {
				$this->userID = $user['usr_id'];
				$teacher['userid'] = $user['usr_id'];

				if($user['usr_istea'] == '1') {
					if($user['usr_isphd'] == '1') {
						$teacher['full_name'] = $user['acr_tname'] . ' ดร. ' . $user['usr_tfname'] . ' ' . $user['usr_tlname'];
					} elseif ($user['usr_isphd'] == '0') {
						$teacher['full_name'] = $user['acr_tname'] . ' ' . $user['usr_tfname'] . ' ' . $user['usr_tlname'];
					}
				} else {
					if($user['usr_isphd'] == '1') {
						$teacher['full_name'] = 'ดร. ' . $user['usr_tfname'] . ' ' . $user['usr_tlname'];
					} elseif ($user['usr_isphd'] == '0') {
						$teacher['full_name'] = $user['usr_tfname'] . ' ' . $user['usr_tlname'];
					}
				}

				$teacher['department'] = $user['dep_tname'];
				$teacher['position'] = $user['usr_tposition'];
				$teacher['emaillist'] = $this->getemail();
				$teacher['tellist'] = $this->getttel();
				if($user['usr_picpath'] != null) {
					$teacher['picurl'] = base_url('/index.php/getpic?image=').$user['usr_picpath'];
				} else {
					$teacher['picurl'] = base_url('/index.php/getpic?image=').'0.png';
				}
				$userList['user'][] = $teacher;
			}
		}
		return $userList;		
	}

	function searchUser($keyword='') {
		$keyword = urldecode($keyword);
		if($this->lang == 'en') {
			$this->port->select('usr_id, usr_efname, usr_elname, usr_eposition, usr_isphd, dep_ename, usr_picpath, acr_ename, acr_eacronym, usr_istea');
			$this->port->from('port_user');
			$this->port->join('port_academictitle', 'port_user.acr_id = port_academictitle.acr_id');
			$this->port->join('port_department', 'port_user.dep_id = port_department.dep_id');
			$this->port->like('usr_efname', $keyword, 'after');
			$this->port->or_like('usr_elname', $keyword, 'after'); 
			$this->port->or_like('usr_tfname', $keyword, 'after'); 
			$this->port->or_like('usr_tlname', $keyword, 'after'); 
			$query = $this->port->get();

			foreach ($query->result_array() as $user) {
				$this->userID = $user['usr_id'];
				$teacher['userid'] = $user['usr_id'];				

				if($user['usr_istea'] == '0') {
					if($user['usr_isphd'] == '1') {
						$teacher['full_name'] = $user['usr_efname'] . ' ' . $user['usr_elname'] . ', Ph.D.';
					} elseif ($user['usr_isphd'] == '0') {
						$teacher['full_name'] = $user['usr_efname'] . ' ' . $user['usr_elname'];
					}
				} else {
					if($user['usr_isphd'] == '1') {
						$teacher['full_name'] = $user['acr_ename'] . ' ' . $user['usr_efname'] . ' ' . $user['usr_elname'] . ', Ph.D.';
					} elseif ($user['usr_isphd'] == '0') {
						$teacher['full_name'] = $user['acr_ename'] . ' ' . $user['usr_efname'] . ' ' . $user['usr_elname'];
					}
				}

				$teacher['department'] = $user['dep_ename'];
				$teacher['position'] = $user['usr_eposition'];
				$teacher['emaillist'] = $this->getemail();
				$teacher['tellist'] = $this->getetel();
				if($user['usr_picpath'] != null) {
					$teacher['picurl'] = base_url('/index.php/getpic?image=').$user['usr_picpath'];
				} else {
					$teacher['picurl'] = base_url('/index.php/getpic?image=').'0.png';
				}
				$userList['user'][] = $teacher;
			}
		} elseif ($this->lang == 'th') {
			$this->port->select('usr_id, usr_tfname, usr_tlname, usr_tposition, usr_isphd, dep_tname, usr_picpath, acr_tname, acr_tacronym, usr_istea');
			$this->port->from('port_user');
			$this->port->join('port_academictitle', 'port_user.acr_id = port_academictitle.acr_id');
			$this->port->join('port_department', 'port_user.dep_id = port_department.dep_id');
			$this->port->like('usr_efname', $keyword, 'after');
			$this->port->or_like('usr_elname', $keyword, 'after'); 
			$this->port->or_like('usr_tfname', $keyword, 'after'); 
			$this->port->or_like('usr_tlname', $keyword, 'after');
			$query = $this->port->get();

			foreach ($query->result_array() as $user) {
				$this->userID = $user['usr_id'];
				$teacher['userid'] = $user['usr_id'];

				if($user['usr_istea'] == '1') {
					if($user['usr_isphd'] == '1') {
						$teacher['full_name'] = $user['acr_tname'] . ' ดร. ' . $user['usr_tfname'] . ' ' . $user['usr_tlname'];
					} elseif ($user['usr_isphd'] == '0') {
						$teacher['full_name'] = $user['acr_tname'] . ' ' . $user['usr_tfname'] . ' ' . $user['usr_tlname'];
					}
				} else {
					if($user['usr_isphd'] == '1') {
						$teacher['full_name'] = 'ดร. ' . $user['usr_tfname'] . ' ' . $user['usr_tlname'];
					} elseif ($user['usr_isphd'] == '0') {
						$teacher['full_name'] = $user['usr_tfname'] . ' ' . $user['usr_tlname'];
					}
				}

				$teacher['department'] = $user['dep_tname'];
				$teacher['position'] = $user['usr_tposition'];
				$teacher['emaillist'] = $this->getemail();
				$teacher['tellist'] = $this->getttel();
				if($user['usr_picpath'] != null) {
					$teacher['picurl'] = base_url('/index.php/getpic?image=').$user['usr_picpath'];
				} else {
					$teacher['picurl'] = base_url('/index.php/getpic?image=').'0.png';
				}
				$userList['user'][] = $teacher;
			}
		} 
		if(empty($userList)) {
			return null;
		} else {
			return $userList;
		}			
	}

	function generalInformation() {

		$this->port->select('usr_id, usr_tfname, usr_tlname, usr_efname, usr_elname, usr_tposition, usr_eposition, usr_isphd, usr_picpath, dep_tname, dep_ename, acr_tname, acr_ename, acr_tacronym, acr_eacronym, usr_istea');
		$this->port->from('port_user');
		$this->port->join('port_academictitle', 'port_user.acr_id = port_academictitle.acr_id');
		$this->port->join('port_department', 'port_user.dep_id = port_department.dep_id');
		$this->port->where('usr_id', $this->userID);
		$query = $this->port->get();

		$user = $query->row_array();

		if(!empty($user)) {

			if($user['usr_istea'] == '0') {
				if($user['usr_isphd'] == '1') {
					$teacher['efull_name'] = $user['usr_efname'] . ' ' . $user['usr_elname'] . ', Ph.D.';
					$teacher['tfull_name'] = 'ดร. ' . $user['usr_tfname'] . ' ' . $user['usr_tlname'];
				} elseif ($user['usr_isphd'] == '0') {
					$teacher['efull_name'] = $user['usr_efname'] . ' ' . $user['usr_elname'];
					$teacher['tfull_name'] = $user['usr_tfname'] . ' ' . $user['usr_tlname'];
				}
			} else {
				if($user['usr_isphd'] == '1') {
					$teacher['efull_name'] = $user['acr_ename'] . ' ' . $user['usr_efname'] . ' ' . $user['usr_elname'] . ', Ph.D.';
					$teacher['tfull_name'] = $user['acr_tname'] . ' ดร. ' . $user['usr_tfname'] . ' ' . $user['usr_tlname'];
				} elseif ($user['usr_isphd'] == '0') {
					$teacher['efull_name'] = $user['acr_ename'] . ' ' . $user['usr_efname'] . ' ' . $user['usr_elname'];
					$teacher['tfull_name'] = $user['acr_tname'] . ' ' . $user['usr_tfname'] . ' ' . $user['usr_tlname'];
				}
			}

			if($this->lang == 'en') {
				$teacher['department'] = $user['dep_ename'];
				$teacher['position'] = $user['usr_eposition'];
				$teacher['picurl'] = base_url('/index.php/getpic?image=').$user['usr_picpath'];
				$teacher['emaillist'] = $this->getemail();
				$teacher['tellist'] = $this->getetel();

				$gen['generalinformation'] = $teacher;

			} elseif ($this->lang == 'th') {
				$teacher['department'] = $user['dep_tname'];
				$teacher['position'] = $user['usr_tposition'];
				$teacher['picurl'] = base_url('/index.php/getpic?image=').$user['usr_picpath'];
				$teacher['emaillist'] = $this->getemail();
				$teacher['tellist'] = $this->getttel();

				$gen['generalinformation'] = $teacher;
			}
			return $gen;
		}				
	}

	function getemail() {
		$this->port->select('mail_name');
		$this->port->where('usr_id', $this->userID); 
		$query = $this->port->get('port_mail');

		foreach ($query->result_array() as $mail) {
			$email['email'] = $mail['mail_name'];
			$emails[] = $email;
		}

		if(empty($emails)) {
			return null;
		} else {
			return $emails;
		}
	}

	function getttel() {
		$this->port->select('tel_tlabel, tel_number');
		$this->port->where('usr_id', $this->userID); 
		$query = $this->port->get('port_tel');

		foreach ($query->result_array() as $tel) {
			$tell['label'] = $tel['tel_tlabel'];
			$tell['number'] = $tel['tel_number'];
			$tellist[] = $tell;
		}

		if(empty($tellist)) {
			return null;
		} else {
			return $tellist;
		}


	}

	function getetel() {
		$this->port->select('tel_elabel, tel_number');
		$this->port->where('usr_id', $this->userID); 
		$query = $this->port->get('port_tel');

		foreach ($query->result_array() as $tel) {
			$tell['label'] = $tel['tel_elabel'];
			$tell['number'] = $tel['tel_number'];
			$tellist[] = $tell;
		}

		if(empty($tellist)) {
			return null;
		} else {
			return $tellist;
		}
	}

	function educationBackground() {
		$this->port->select('edb_no, edl_tname, edl_ename, ins_tname, ins_ename, deg_tacronym, deg_eacronym, maj_tname, maj_ename, edb_yeargraduate, edb_tthesistopic, edb_ethesistopic');
		$this->port->from('port_educationalbackground');
		$this->port->join('port_degree', 'port_educationalbackground.deg_id = port_degree.deg_id');
		$this->port->join('port_level', 'port_degree.edl_id = port_level.edl_id');
		$this->port->join('port_institute', 'port_educationalbackground.ins_id = port_institute.ins_id');
		$this->port->join('port_major', 'port_educationalbackground.maj_id = port_major.maj_id');
		$this->port->where('usr_id', $this->userID);
		$this->port->order_by('edb_no', 'asc'); 
		$query = $this->port->get();
		$ebs = $query->result_array();

		if(!empty($ebs)) {
			if($this->lang == 'en') {
				foreach ($ebs as $eb) {
					$ebb['no'] = $eb['edb_no'];
					$ebb['educationlevel'] = $eb['edl_ename'];
					$ebb['institute'] = $eb['ins_ename'];
					$ebb['degree'] = $eb['deg_eacronym'];
					$ebb['major'] = $eb['maj_ename'];
					$ebb['yeargraduate'] = $eb['edb_yeargraduate'];
					$ebb['thesistopic'] = $eb['edb_ethesistopic'];

					$edg['educationalbackground'][] = $ebb;
				}

			} elseif ($this->lang == 'th') {
				foreach ($ebs as $eb) {
					$ebb['no'] = $eb['edb_no'];
					$ebb['educationlevel'] = $eb['edl_tname'];
					$ebb['institute'] = $eb['ins_tname'];
					$ebb['degree'] = $eb['deg_tacronym'];
					$ebb['major'] = $eb['maj_tname'];
					$ebb['yeargraduate'] = (int)$eb['edb_yeargraduate'] + 543;
					$ebb['thesistopic'] = $eb['edb_tthesistopic'];

					$edg['educationalbackground'][] = $ebb;
				}
			}
			return $edg;
		}
	}

	function jobsExperience() {
		$this->port->select('jox_tname, jox_ename, jox_fromdate, jox_todate, jox_id');
		$this->port->from('port_jobexperience');
		$this->port->where('usr_id', $this->userID);
		$this->port->order_by('jox_id', 'asc'); 
		$query = $this->port->get();
		$ebs = $query->result_array();

		// echo "<pre>"; var_dump($ebs); echo "</pre>"; die();
		if(!empty($ebs)) {
			if($this->lang == 'en') {
				foreach ($ebs as $eb) {
					$ebb['no'] = $eb['jox_id'];
					if($eb['jox_todate'] == '0000') {
						$ebb['date'] = $eb['jox_fromdate']. ' - Present';
					} else {
						$ebb['date'] = $eb['jox_fromdate']. ' - ' . $eb['jox_todate'];
					}

					$ebb['experience'] = $eb['jox_ename'];

					$edg['jobsExperience'][] = $ebb;
				}

			} elseif ($this->lang == 'th') {
				foreach ($ebs as $eb) {
					$ebb['no'] = $eb['jox_id'];
					if($eb['jox_todate'] == '0000') {
						$ebb['date'] = ($eb['jox_fromdate']+543) . ' - ปัจจุบัน';
					} else {
						$ebb['date'] = ($eb['jox_fromdate']+543) . ' - ' . ($eb['jox_todate']+543);
					}

					$ebb['experience'] = $eb['jox_tname'];

					$edg['jobsExperience'][] = $ebb;
				}
			}
			return $edg;
		}
	}

	function interests() {
		$this->port->select('int_tname, int_ename, itt_tname, itt_ename, port_interest.itt_id');
		$this->port->from('port_interest');
		$this->port->join('port_interesttype', 'port_interest.itt_id = port_interesttype.itt_id');
		$this->port->where('usr_id', $this->userID);
		$query = $this->port->get();
		$ints = $query->result_array();

		if(!empty($ints)) {
			if($this->lang == 'en') {
				$listinterests = array();
				foreach ($ints as $data) {
					$listinterests[$data['itt_ename']][] = $data['int_ename'];
				}

			} elseif ($this->lang == 'th') {
				$listinterests = array();
				foreach ($ints as $data) {
					$listinterests[$data['itt_tname']][] = $data['int_tname'];
				}
			}

			$thh = [];
			foreach ($listinterests as $key => $value) {
				$techs['categoty'] = $key;
				$techs['topic'] = $value;
				array_push($thh, $techs);
			}

			$listinterest['interests'] = $thh;
			return $listinterest;
		}
	}

	function taught() {
		$this->port->distinct();
		$this->port->select('port_tech.sub_id, tec_year, sub_code, sub_tname, sub_ename');
		$this->port->from('port_tech');
		$this->port->join('port_subject', 'port_tech.sub_id = port_subject.sub_id');
		$this->port->where('usr_id', $this->userID);
		$this->port->order_by('tec_year', 'desc');
		$query = $this->port->get();
		$ints = $query->result_array();

		if(!empty($ints)) {
			if($this->lang == 'en') {
				$tech = array();
				foreach ($ints as $data) {
					$tech[$data['tec_year']][] = $data['sub_code'] . ' ' . $data['sub_ename'];
				}

			} elseif ($this->lang == 'th') {
				$tech = array();
				foreach ($ints as $data) {
					$tech[$data['tec_year']+543][] = $data['sub_code'] . ' ' . $data['sub_tname'];
				}
			}

			$thh = [];
			foreach ($tech as $key => $value) {
				$techs['year'] = $key;
				$techs['subject'] = $value;
				array_push($thh, $techs);
			}

			$th['taught'] = $thh;
			return $th;
		}
	}

	function awards() {
		$this->port->select('awd_tname, awd_ename, awd_tinsitute, awd_einsitute, awd_date');
		$this->port->from('port_award');
		$this->port->where('usr_id', $this->userID);
		$this->port->order_by('awd_date', 'desc');
		$query = $this->port->get();
		$ints = $query->result_array();

		if(!empty($ints)) {
			if($this->lang == 'en') {
				$tech = array();
				foreach ($ints as $data) {
					$tech[mysql_date_to_year($data['awd_date'])][] = $data['awd_ename'] . ' From ' . $data['awd_einsitute'];
				}

			} elseif ($this->lang == 'th') {
				$tech = array();
				foreach ($ints as $data) {
					$tech[mysql_date_to_year($data['awd_date'])+543][] = $data['awd_tname'] . ' จาก ' . $data['awd_tinsitute'];
				}
			}

			$thh = [];
			foreach ($tech as $key => $value) {
				$techs['year'] = $key;
				$techs['subject'] = $value;
				array_push($thh, $techs);
			}

			$th['awards'] = $thh;
			return $th;
		}
	}

	function researches() {
		$pubs = $this->get_researchReference();
		if(empty($pubs)) {
			return null;
		}
		foreach ($pubs as $research) {
			if($research['type'] == '1') {
				$publication['publication']['Research Project'][] = ['name' => (string)$research['reference']];
			} elseif($research['type'] == '2' && $research['rlv'] == 'National') {
				$publication['publication']['National Journal'][] = ['name' => (string)$research['reference']];
			} elseif($research['type'] == '2' && $research['rlv'] == 'International') {
				$publication['publication']['International Journal'][] = ['name' => (string)$research['reference']];
			} elseif($research['type'] == '3' && $research['rlv'] == 'National') {
				$publication['publication']['National Proceeding'][] = ['name' => (string)$research['reference']];
			} elseif($research['type'] == '3' && $research['rlv'] == 'International') {
				$publication['publication']['International Proceeding'][] = ['name' => (string)$research['reference']];
			}
		}
		return $publication;
	}

	function getResearchById(){
		$sql = "SELECT `research`.*, `lv`.*, 
					(SELECT GROUP_CONCAT(DISTINCT CONCAT(`user_sub1`.`usr_elname`,', ',LEFT(`user_sub1`.`usr_efname`,1),'.')    SEPARATOR  ', ') 
					FROM port_research as research_sub1 
					LEFT JOIN port_researcher as researcher_sub1 ON `research_sub1`.`res_id` = `researcher_sub1`.`res_id`
					LEFT JOIN port_user as user_sub1 ON `researcher_sub1`.`usr_id` = `user_sub1`.`usr_id` 
					WHERE `research_sub1`.`res_id` = `research`.`res_id`
					GROUP BY `research_sub1`.`res_id`) AS user_refer, 
					(SELECT GROUP_CONCAT(DISTINCT CONCAT(`student_sub2`.`rsd_elname`,', ',LEFT(`student_sub2`.`rsd_efname`,1),'.') SEPARATOR ', ')  
					FROM port_research as research_sub2 
					LEFT JOIN port_researcher as researcher_sub2 ON `research_sub2`.`res_id` = `researcher_sub2`.`res_id`
					LEFT JOIN port_researchstudent AS student_sub2 ON `student_sub2`.`rsd_id` = `researcher_sub2`.`rsd_id` 
					WHERE `research_sub2`.`res_id` = `research`.`res_id`
					GROUP BY `research`.`res_id`) AS student_refer 
				FROM port_research as research 
				LEFT JOIN port_researchlevel AS lv ON `research`.`rlv_id` = `lv`.`rlv_id` 
				LEFT JOIN port_researcher as researcher ON `research`.`res_id` = `researcher`.`res_id`
				LEFT JOIN port_user as user ON `researcher`.`usr_id` = `user`.`usr_id` 
				LEFT JOIN port_researchstudent AS student ON `student`.`rsd_id` = `researcher`.`rsd_id` 
				WHERE `researcher`.`usr_id` = ? 
				GROUP BY `research`.`res_id`
				ORDER BY `research`.`res_publicationtype` ASC, `lv`.`rlv_id` ASC, `research`.`res_year` DESC";
		$query = $this->port->query($sql, array($this->userID));
		return $query;
	}

	function get_researchReference(){
        $data['research'] = $this->getResearchById()->result_array();

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
                    array_push($reference, array('reference' => $name.'&nbsp;'.'('.$value['res_year'].').&nbsp;<i style="font-style: italic;">'.$value['res_eproject'].'.</i>&nbsp;'.$value['res_edonor'], 'type' => $value['res_publicationtype'], 'res_id' => $value['res_id']));
                    break;
                
                case '2':
                    $pages = explode('/', $value['res_page']);
                    if(sizeof($pages) == 3){
                        $page = '<i style="font-style: italic;">'.$pages[0].'('.$pages[1].'),&nbsp;</i>'.$pages[2];
                    }else{
                        $page = $value['res_page'];
                    }
                    array_push($reference, array('reference' => $name.'&nbsp;'.'('.$value['res_year'].').&nbsp;'.$value['res_eproject'].'.&nbsp;<i style="font-style: italic;">'.$value['res_etitle'].'</i>,&nbsp;'.$page, 'type' => $value['res_publicationtype'], 'rlv' => $value['rlv_etitle'], 'res_id' => $value['res_id']));
                    break;
                
                case '3':
                    array_push($reference, array('reference' => $name.'&nbsp;"'.$value['res_eproject'].'."&nbsp;<i style="font-style: italic;">'.$value['res_etitle'].'</i>&nbsp;'.$value['res_month'].'&nbsp;('.$value['res_year'].'):&nbsp;'.$value['res_page'].'.', 'type' => $value['res_publicationtype'], 'rlv' => $value['rlv_etitle'], 'res_id' => $value['res_id']));
                    break;
                
                default:
                break;
            }
        }
        return $reference;
    }
 
}

?>