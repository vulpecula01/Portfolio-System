<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('port.php');
class c_research extends Port_core {

	function __construct(){
       parent::__construct();

        $this->load->model('m_port_funding', 'fund');
        $this->load->model('m_port_integrating', 'integrating');
        $this->load->model('m_port_integratingconnect', 'intconnect');
        $this->load->model('m_port_integratingtype', 'inttype');//Base
        $this->load->model('m_port_researchertype', 'position');//base
        $this->load->model('m_port_research', 'research');
        $this->load->model('m_port_researchlevel', 'reslevel');//base
        $this->load->model('m_port_researchstatus', 'resstatus');//base
        $this->load->model('m_port_researcher', 'researcher');
        $this->load->model('m_port_researchtype', 'type');
        $this->load->model('m_port_user', 'user');
        $this->load->model('m_port_researchstudent', 'student');

	}

	public function index($uid=true)
	{
        // edit by Sarin
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
            $uid =  $this->encrypt->decode($uid);       
            $usr_id = $uid;
        }

		$data['user'] = $this->user->getAllName()->result_array();
		$data['student'] = $this->student->getAll();
		$data['inttype'] = $this->inttype->getAll();
		$data['position'] = $this->position->getAll();
		$data['reslevel'] = $this->reslevel->getAll();
		$data['resstatus'] = $this->resstatus->getAll();
        $data['type'] = $this->type->getAll();
		$data['research'] = $this->get_researchReference($this->session->userdata('usr_id'));
        $data['user_id'] = $uid;

        //echo '<pre>'; var_dump($this->session->userdata('usr_id')); var_dump($data['research']); exit();
	//print_r($data);
		$this->output_user('Research', 'v_research', $data);
	}

    // Edit By Sarin for use in admin page
    public function index_admin()
    {
        $data['user'] = $this->user->getAllName()->result_array();
        $data['student'] = $this->student->getAll();
        $data['inttype'] = $this->inttype->getAll();
        $data['position'] = $this->position->getAll();
        $data['reslevel'] = $this->reslevel->getAll();
        $data['resstatus'] = $this->resstatus->getAll();
        $data['type'] = $this->type->getAll();
        $data['research'] = $this->get_researchReference($this->session->userdata('usr_id'));
		
		
        $this->output_admin('Research', 'v_research', $data);
    }

    // public function referenceForm(){
    //     $reference = $this->get_researchReference($this->input->post('usr_id'));
    //     return $reference;
    // }

    // public function setDate($date = ''){
    //     $output = '';
    //     $date = '16/04/2015 - 16/04/2015';
    //     $dateByDay = explode(' - ', $date);
    //     if(sizeof($dateByDay)==2){
    //         $start = explode('/', $dateByDay[0]);
    //         $end = explode('/', $dateByDay[1]);
    //     }
    //     if($start[2] == $end[2]){

    //     }else{

    //     }
    //     echo $output;
    //     return $output;
    // }
    public function get_researchReference($id){
        $this->researcher->usr_id = $id;
        $data['research'] = $this->researcher->getResearchById()->result_array();
        //var_dump($data['research']);

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
        return $reference;
    }


    //download file => if file not null
    public function getFile($file){
        $this->load->helper('download');
        $data = file_get_contents("/var/www/upload/portfolio/abstract/".$file);//file position
        $type = explode(".", $file);

        $name = "Abstract.".end($type);//file name

        force_download($name, $data);
    }

	public function get_projectById(){
        $res_id = $this->input->post('res_id');
        $user = $this->user->getAllName()->result_array();
        $student = $this->student->getAll();
        $position = $this->position->getAll();
        $resstatus = $this->resstatus->getAll();
        $inttype = $this->inttype->getAll();
        $type = $this->type->getAll();

        $this->research->res_id = $this->researcher->res_id = $this->fund->res_id = $this->integrating->res_id = $res_id;
        $research = $this->research->getProjectById()->row_array();
        $researcher = $this->researcher->getByResearchId()->result_array();
        $fund = $this->fund->getByResearchId()->result_array();
        $integrating = $this->integrating->getByResearchId()->row_array();
        $this->intconnect->int_id = (isset($integrating['int_id'])?$integrating['int_id']:null);
        $connect = $this->intconnect->getByIntegratingId()->result_array();
		echo '<div class="form-group">
                <div class="row">
                    <input type="hidden" name="res_id" value="'.$research['res_id'].'"/>
                    <div class="col-xs-6">
                        <label>ชื่อโครงการวิจัย (EN) <small class="error projectTitleEn ePJ"></small></label>
                        <input type="text" class="form-control" name="projectTitleEn" placeholder="Enter ..." value="'.$research['res_eproject'].'"/>
                    </div>
                    <div class="col-xs-6">
                        <label>ชื่อโครงการวิจัย (TH) <small class="error projectTitleTh ePJ"></small></label>
                        <input type="text" class="form-control" name="projectTitleTh" placeholder="Enter ..." value="'.$research['res_tproject'].'"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label>โครงการ / ผู้บริจาค (EN) <small class="error donorEn ePJ"></small></label>
                        <input type="text" class="form-control" name="donorEn" placeholder="Enter ..." value="'.$research['res_edonor'].'"/>
                    </div>
                    <div class="col-xs-6">
                        <label>โครงการ / ผู้บริจาค (TH) <small class="error donorTh ePJ"></small></label>
                        <input type="text" class="form-control" name="donorTh" placeholder="Enter ..." value="'.$research['res_tdonor'].'"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <label>ปีของทุนวิจัย <small class="error yearFund ePJ"></small></label>
                        <input type="text" class="form-control" name="yearFund" placeholder="2015" value="'.$research['res_year'].'"/>
                    </div>
                    <div class="col-xs-4">
                        <label>ประเภทของการวิจัย <small class="error type ePJ"></small></label>
                        <select class="form-control" name="type">
                            <option value="">Chooes</option>';
                                foreach ($type as $value) {
                                    echo '<option value="'.$value['ret_id'].'"'.($value['ret_id'] == $research['ret_id']?' selected':'').'>'.$value['ret_ename'].'&nbsp;('.$value['ret_tname'].')</option>';
                                }
                        echo '</select>
                    </div>
                    <div class="col-xs-5">
                        <label>สถานะ <small class="error status ePJ"></small></label>
                        <select class="form-control" name="status">
                            <option value="">Chooes</option>';
                            	foreach ($resstatus as $value) {
                                    echo '<option value="'.$value['rst_id'].'"'.($value['rst_id'] == $research['rst_id']?' selected':'').'>'.$value['rst_etitle'].'&nbsp;('.$value['rst_ttitle'].')</option>';
                                }
                        echo '</select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label>บทคัดย่อ <small class="error abstract ePJ"></small></label>
                        <textarea class="form-control" name="abstract" rows="3" placeholder="Enter ...">'.$research['res_abstract'].'</textarea>
                    </div>
                    <div class="col-xs-12">
                        <input name="file" type="file">
                        <label>ไฟล์โครงการวิจัย&nbsp;</label>&nbsp;<a href="'.site_url('c_research/getFile/'.$research['res_abstractfile']).'">'.$research['res_abstractfile'].'</a>
                        <input type="hidden" name="oldfile" value="'.$research['res_abstractfile'].'"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label>คำหลัก <small class="error key ePJ"></small></label><br>
                        <input type="text" class="form-control tagsinput" name="key" data-role="tagsinput" value="'.$research['res_keyword'].'"/>
                    </div>
                </div>
                <hr/>
                <div class="row">';
                $mem = 0;
                if($researcher != null){
                    foreach ($researcher as $key => $val) {
                        if($key == 0){
                            echo '<div class="emem1-res'.$mem.'">
                                <div class="col-xs-4">
                                    <input type="hidden" name="rer_id['.$key.']" value="'.$val['rer_id'].'"/>
                                    <label>ประเภทของนักวิจัย</label>
                                    <select class="form-control" name="researchType['.$key.']">
                                        <option value="">Chooes</option>';
                                        foreach ($position as $value) {
                                            echo '<option value="'.$value['rst_id'].'"'.($value['rst_id'] == $val['rst_id'] ? ' selected':'').'>'.$value['rst_ename'].'&nbsp;('.$value['rst_tname'].')</option>';
                                        }
                                    echo '</select>
                                </div>
                                <div class="col-xs-5">
                                    <label>ชื่อ</label>
                                    <select class="form-control" name="researchName['.$key.']">
                                        <option value="">Chooes</option>';
                                        echo '<optgroup label="Personnel">';
                                        foreach ($user as $usr) {
                                            echo '<option value="u#'.$usr['usr_id'].'"'.($usr['usr_id'] == $val['usr_id'] ? ' selected':'').'>'.$usr['usr_efname'].'&nbsp;'.$usr['usr_elname'].'&nbsp;('.$usr['usr_tfname'].'&nbsp;'.$usr['usr_tlname'].')</option>';
                                        }
                                        echo '</optgroup>';
                                        echo '<optgroup label="Other">';
                                        foreach ($student as $stu) {
                                            echo '<option value="s#'.$stu['rsd_id'].'"'.($stu['rsd_id'] == $val['rsd_id'] ? ' selected':'').'>'.$stu['rsd_efname'].'&nbsp;'.$stu['rsd_elname'].'&nbsp;('.$stu['rsd_tfname'].'&nbsp;'.$stu['rsd_tlname'].')</option>';
                                        }
                                        echo '</optgroup>';
                                    echo '</select>
                                </div>
                                <div class="col-xs-2">
                                    <label>เปอร์เซ็นต์</label>
                                    <input type="text" class="form-control" name="researchPercent['.$key.']" placeholder="100" value="'.$val['rer_percent'].'"/>
                                </div>
                                <div class="col-xs-1" style="padding-top:25px;">
                                    <button class="btn btn-primary" id="eadd1_mem"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>';
                        }else{
                            echo '<div class="emem1-res'.$mem.'">
                                <div class="col-xs-4">
                                    <input type="hidden" name="rer_id['.$key.']" value="'.$val['rer_id'].'"/>
                                    <select class="form-control" name="researchType['.$key.']">
                                        <option value="">Chooes</option>';
                                        foreach ($position as $value) {
                                            echo '<option value="'.$value['rst_id'].'"'.($value['rst_id'] == $val['rst_id'] ? ' selected':'').'>'.$value['rst_ename'].'&nbsp;('.$value['rst_tname'].')</option>';
                                        }
                                    echo '</select>
                                </div>
                                <div class="col-xs-5">
                                    <select class="form-control" name="researchName['.$key.']">
                                        <option value="">Chooes</option>';
                                        echo '<optgroup label="Personnel">';
                                        foreach ($user as $value) {
                                            echo '<option value="u#'.$value['usr_id'].'"'.($value['usr_id'] == $val['usr_id'] ? ' selected':'').'>'.$value['usr_efname'].'&nbsp;'.$value['usr_elname'].'&nbsp;('.$value['usr_tfname'].'&nbsp;'.$value['usr_tlname'].')</option>';
                                        }
                                        echo '</optgroup>';
                                        echo '<optgroup label="Other">';
                                        foreach ($student as $value) {
                                            echo '<option value="s#'.$value['rsd_id'].'"'.($value['rsd_id'] == $val['rsd_id'] ? ' selected':'').'>'.$value['rsd_efname'].'&nbsp;'.$value['rsd_elname'].'&nbsp;('.$value['rsd_tfname'].'&nbsp;'.$value['rsd_tlname'].')</option>';
                                        }
                                        echo '</optgroup>';
                                    echo '</select>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" class="form-control" name="researchPercent['.$key.']" placeholder="100" value="'.$val['rer_percent'].'"/>
                                </div>
                                <div class="col-xs-1">
                                    <button class="btn bg-red edel_mem1" value="'.$mem.'" key="'.$val['rer_id'].'" onclick="return false"><i class="fa fa-close"></i></button>
                                </div>
                            </div>';
                        }
                        $mem++;
                    }
                }else{
                    echo '<div class="emem1-res0">
                                <div class="col-xs-4">
                                    <label>ประเภทผู้วิจัย</label>
                                    <select class="form-control" name="researchType[0]">
                                        <option value="">Chooes</option>';
                                        foreach ($position as $value) {
                                            echo '<option value="'.$value['rst_id'].'">'.$value['rst_ename'].'&nbsp;('.$value['rst_tname'].')</option>';
                                        }
                                    echo '</select>
                                </div>
                                <div class="col-xs-5">
                                    <label>ชื่อผู้วิจัย</label>
                                    <select class="form-control" name="researchName[0]">
                                        <option value="">Chooes</option>';
                                        echo '<optgroup label="Personnel">';
                                        foreach ($user as $value) {
                                            echo '<option value="u#'.$value['usr_id'].'">'.$value['usr_efname'].'&nbsp;'.$value['usr_elname'].'&nbsp;('.$value['usr_tfname'].'&nbsp;'.$value['usr_tlname'].')</option>';
                                        }
                                        echo '</optgroup>';
                                        echo '<optgroup label="Other">';
                                        foreach ($student as $value) {
                                            echo '<option value="s#'.$value['rsd_id'].'">'.$value['rsd_efname'].'&nbsp;'.$value['rsd_elname'].'&nbsp;('.$value['rsd_tfname'].'&nbsp;'.$value['rsd_tlname'].')</option>';
                                        }
                                        echo '</optgroup>';
                                    echo '</select>
                                </div>
                                <div class="col-xs-2">
                                    <label>เปอร์เซ็นต์</label>
                                    <input type="text" class="form-control" name="researchPercent[0]" placeholder="100" />
                                </div>
                                <div class="col-xs-1" style="padding-top:25px;">
                                    <button class="btn btn-primary" id="eadd1_mem"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>';
                    $mem++;
                }
                echo '<input type="hidden" value="'.($mem-1).'" id="researcherCount"/>
                <input type="hidden" mame="researcherDelete" id="researcherDelete"/>
                </div>
                <hr/>
                <div class="row">';
                $amo = 0;
                if($fund != null){
                    foreach ($fund as $key => $value) {
                        if($key == 0){
                            echo '<div class="efun-res'.$amo.'">
                                <div class="col-xs-5">
                                    <label>สถาบัน</label>
                                    <input type="text" class="form-control" name="fundInstitution['.$key.']" placeholder="Enter ..." value="'.$value['fud_institution'].'"/>
                                </div>
                                <div class="col-xs-2">
                                    <label>เงินทุน</label>
                                    <input type="text" class="form-control" name="fundFunding['.$key.']" placeholder="Enter ..." value="'.$value['fud_funding'].'"/>
                                </div>
                                <div class="col-xs-4">
                                    <label>วันที่ได้รับทุน</label>
                                    <input type="text" class="form-control pull-right dateRange" name="fundDate['.$key.']" placeholder="DD/MM/YYYY - DD/MM/YYYY" value="'.DateTime::createFromFormat('Y-m-d', $value['fud_startdate'])->format('d/m/Y').' - '.DateTime::createFromFormat('Y-m-d', $value['fud_enddate'])->format('d/m/Y').'"/>
                                </div>
                                <div class="col-xs-1" style="padding-top:25px;">
                                    <button class="btn btn-primary" id="eadd_fun"><i class="fa fa-plus"></i></button>
                                    <input type="hidden" name="fud_id['.$key.']" value="'.$value['fud_id'].'"/>
                                </div>
                            </div>';
                        }else{
                            echo '<div class="efun-res'.$key.'">
                                <div class="col-xs-5">
                                    <input type="text" class="form-control" name="fundInstitution['.$key.']" placeholder="Enter ..." value="'.$value['fud_institution'].'"/>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" class="form-control" name="fundFunding['.$key.']" placeholder="Enter ..." value="'.$value['fud_funding'].'"/>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control pull-right dateRange" name="fundDate['.$key.']" placeholder="DD/MM/YYYY - DD/MM/YYYY" value="'.DateTime::createFromFormat('Y-m-d', $value['fud_startdate'])->format('d/m/Y').' - '.DateTime::createFromFormat('Y-m-d', $value['fud_enddate'])->format('d/m/Y').'"/>
                                </div>
                                <div class="col-xs-1">
                                    <button class="btn bg-red edel_fun" value="'.$amo.'" key="'.$value['fud_id'].'" onclick="return false"><i class="fa fa-close"></i></button>
                                    <input type="hidden" name="fud_id['.$key.']" value="'.$value['fud_id'].'"/>
                                </div>
                            </div>';
                        }
                        $amo++;
                    }
                }else{
                    echo '<div class="efun-res0">
                                <div class="col-xs-5">
                                    <label>สถาบัน</label>
                                    <input type="text" class="form-control" name="fundInstitution[0]" placeholder="Enter ..."/>
                                </div>
                                <div class="col-xs-2">
                                    <label>เงินทุน</label>
                                    <input type="text" class="form-control" name="fundFunding[0]" placeholder="Enter ..."/>
                                </div>
                                <div class="col-xs-4">
                                    <label>วันที่ได้รับเงินทุน</label>
                                    <input type="text" class="form-control pull-right dateRange" name="fundDate[0]" placeholder="DD/MM/YYYY - DD/MM/YYYY"/>
                                </div>
                                <div class="col-xs-1" style="padding-top:25px;">
                                    <button class="btn btn-primary" id="eadd_fun"><i class="fa fa-plus"></i></button>
                                    <input type="hidden" name="fud_id[0]"/>
                                </div>
                            </div>';
                }
                echo '<input type="hidden" value="'.($amo-1).'" id="fundCount"/>
                <input type="hidden" mame="fundDelete" id="fundDelete"/>
                </div>
                <hr/>
                <div class="row">';
                $int = 0;
                if($connect != null){
                    foreach ($connect as $key => $val) {
                        if($key == 0){
                            echo '<div class="eint-res'.$int.'">
                                    <div class="col-xs-4">
                                    <input type="hidden" name="int_id" value="'.$integrating['int_id'].'"/>
                                        <label>วันที่ประสานงาน</label>
                                        <input type="text" class="form-control dateRange" name="intDate" placeholder="DD/MM/YYYY - DD/MM/YYYY"/ value="'.DateTime::createFromFormat('Y-m-d', $integrating['int_datestart'])->format('d/m/Y').' - '.DateTime::createFromFormat('Y-m-d', $integrating['int_dateend'])->format('d/m/Y').'">
                                    </div>
                                    <div class="col-xs-7">
                                    <input type="hidden" name="inc_id['.$key.']" value="'.$val['inc_id'].'"/>
                                        <label>การประสานงาน</label>
                                        <select class="form-control" name="intIntegrating['.$key.']">
                                            <option value="">Chooes</option>';
                                            foreach ($inttype as $value) {
                                                echo '<option value="'.$value['itt_id'].'" '.($val['itt_id'] == $value['itt_id'] ? 'selected':'').'>'.$value['itt_etitle'].'&nbsp;('.$value['itt_ttitle'].')</option>';
                                            }
                                        echo '</select>
                                    </div>
                                    <div class="col-xs-1" style="padding-top:25px;">
                                        <button class="btn btn-primary" id="eadd_int"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>';
                        }else{
                            echo '<div class="eint-res'.$int.'">
                                    <div class="col-xs-4">
                                    </div>
                                    <div class="col-xs-7">
                                    <input type="hidden" name="inc_id['.$key.']" value="'.$val['inc_id'].'"/>
                                        <select class="form-control" name="intIntegrating['.$key.']">
                                            <option value="">Chooes</option>';
                                            foreach ($inttype as $value) {
                                                echo '<option value="'.$value['itt_id'].'" '.($val['itt_id'] == $value['itt_id'] ? 'selected':'').'>'.$value['itt_etitle'].'&nbsp;('.$value['itt_ttitle'].')</option>';
                                            }
                                        echo '</select>
                                    </div>
                                    <div class="col-xs-1">
                                        <button class="btn bg-red edel_int" value="'.$int.'" key="'.$val['inc_id'].'" onclick="return false"><i class="fa fa-close"></i></button>
                                    </div>
                                </div>';
                        }
                        $int++;
                    }
                }else{
                    echo '<div class="eint-res0">
                                    <div class="col-xs-4">
                                        <label>วันที่ประสานงาน</label>
                                        <input type="text" class="form-control dateRange" name="intDate" placeholder="DD/MM/YYYY - DD/MM/YYYY"/>
                                    </div>
                                    <div class="col-xs-7">'.
                                    // <input type="hidden" name="inc_id[0]" value="'.$val['inc_id'].'"/>
                                        '<label>การประสานงาน</label>
                                        <select class="form-control" name="intIntegrating[0]">
                                            <option value="">Chooes</option>';
                                            foreach ($inttype as $value) {
                                                echo '<option value="'.$value['itt_id'].'">'.$value['itt_etitle'].'&nbsp;('.$value['itt_ttitle'].')</option>';
                                            }
                                        echo '</select>
                                    </div>
                                    <div class="col-xs-1" style="padding-top:25px;">
                                        <button class="btn btn-primary" id="eadd_int"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>';
                }
                    echo '<input type="hidden" value="'.($int-1).'" id="integratingCount"/>
                <input type="hidden" mame="integratingDelete" id="integratingDelete"/>
                </div>
            </div>';
	}

	public function get_journalById(){
        $res_id = $this->input->post('res_id');
        $user = $this->user->getAllName()->result_array();
        $student = $this->student->getAll();
        $position = $this->position->getAll();
        $reslevel = $this->reslevel->getAll();
        $this->research->res_id = $this->researcher->res_id = $res_id;
        $research = $this->research->getProjectById()->row_array();
        $researcher = $this->researcher->getByResearchId()->result_array();
        echo '<div class="form-group">
                <div class="row">
                    <input type="hidden" name="res_id" value="'.$research['res_id'].'"/>
                    <div class="col-xs-6">
                        <label>ชื่องานวิจัย (EN) <small class="error projectEn eJN"></small></label>
                        <input type="text" class="form-control" name="titleEn" placeholder="Enter ..." value="'.$research['res_etitle'].'"/>
                    </div>
                    <div class="col-xs-6">
                        <label>ชื่องานวิจัย (TH) <small class="error projectTh eJN"></small></label>
                        <input type="text" class="form-control" name="titleTh" placeholder="Enter ..." value="'.$research['res_ttitle'].'"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label>ชื่อโครงการวิจัย (EN) <small class="error projectTitleEn eJN"></small></label>
                        <input type="text" class="form-control" name="projectEn" placeholder="Enter ..." value="'.$research['res_eproject'].'"/>
                    </div>
                    <div class="col-xs-6">
                        <label>ชื่อโครงการวิจัย (TH) <small class="error projectTitleTh eJN"></small></label>
                        <input type="text" class="form-control" name="projectTh" placeholder="Enter ..." value="'.$research['res_tproject'].'"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label>ชื่อวารสาร <small class="error journal eJN"></small></label>
                        <input type="text" class="form-control" name="journal" placeholder="Enter ..." value="'.$research['res_journals'].'"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <label>ปีที่เผยแพร่ <small class="error year eJN"></small></label>
                        <input type="text" class="form-control" name="year" placeholder="2015" value="'.$research['res_year'].'"/>
                    </div>
                    <div class="col-xs-4">
                        <label>เดือนที่เผยแพร่ <small class="error month eJN"></small></label>
                        <input type="text" class="form-control" name="month" placeholder="2" value="'.$research['res_month'].'"/>
                    </div>
                    <div class="col-xs-5">
                        <label>Year/Vol./Pages <small class="error page eJN"></small></label>
                        <input type="text" class="form-control"  name="page" placeholder="2009/2/2-4" value="'.$research['res_page'].'"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label>กลุ่มวิจัย <small class="error cluster eJN"></small></label>
                        <input type="text" class="form-control" name="cluster" placeholder="Informatics" value="'.$research['res_cluster'].'"/>
                    </div>
                    <div class="col-xs-6">
                        <label>ติดตามการวิจัย <small class="error track eJN"></small></label>
                        <input type="text" class="form-control" name="track" placeholder="Software Engineering" value="'.$research['res_track'].'"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label>การวิจัยระดับ <small class="error level eJN"></small></label>
                            <select class="form-control" name="level">
                                <option value="">Chooes</option>';
                                foreach ($reslevel as $value) {
                                    echo '<option value="'.$value['rlv_id'].'"'.($research['rlv_id'] == $value['rlv_id']?' selected':'').'>'.$value['rlv_etitle'].'&nbsp;('.$value['rlv_ttitle'].')</option>';
                                }
                            echo'</select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label>สิ่งที่แนบ</label><br>
                        <input name="file" type="file">
                        <label>Current file&nbsp;</label>&nbsp;<a href="'.site_url('c_research/getFile/'.$research['res_abstractfile']).'">'.$research['res_abstractfile'].'</a>
                        <input type="hidden" name="oldfile" value="'.$research['res_abstractfile'].'"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label>คำหลัก <small class="error key eJN"></small></label><br>
                        <input type="text" class="form-control tagsinput" name="key" data-role="tagsinput" value="'.$research['res_keyword'].'"/>
                    </div>
                </div>
                <hr/>
                <div class="row">';
                $mem = 0;
                if($researcher != null){
                    foreach ($researcher as $key => $val) {
                        if($key == 0){
                            echo '<div class="emem2-res'.$mem.'">
                                <input type="hidden" name="rer_id['.$key.']" value="'.$val['rer_id'].'"/>
                                <div class="col-xs-9">
                                    <label>ชื่อนักวิจัย</label>
                                    <select class="form-control" name="researchName['.$key.']">
                                        <option value="">Chooes</option>';
                                        echo '<optgroup label="Personnel">';
                                        foreach ($user as $value) {
                                            echo '<option value="u#'.$value['usr_id'].'"'.($value['usr_id'] == $val['usr_id'] ? ' selected':'').'>'.$value['usr_efname'].'&nbsp;'.$value['usr_elname'].'&nbsp;('.$value['usr_tfname'].'&nbsp;'.$value['usr_tlname'].')</option>';
                                        }
                                        echo '</optgroup>';
                                        echo '<optgroup label="Other">';
                                        foreach ($student as $value) {
                                            echo '<option value="s#'.$value['rsd_id'].'"'.($value['rsd_id'] == $val['rsd_id'] ? ' selected':'').'>'.$value['rsd_efname'].'&nbsp;'.$value['rsd_elname'].'&nbsp;('.$value['rsd_tfname'].'&nbsp;'.$value['rsd_tlname'].')</option>';
                                        }
                                        echo '</optgroup>';
                                    echo '</select>
                                </div>
                                <div class="col-xs-2">
                                    <label>ลำดับ</label>
                                    <input type="text" class="form-control" name="researchSequence['.$key.']" placeholder="1" value="'.$val['rer_sequence'].'"/>
                                </div>
                                <div class="col-xs-1" style="padding-top:25px;">
                                    <button class="btn btn-primary" id="eadd2_mem"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>';
                        }else{
                            echo '<div class="emem2-res'.$mem.'">
                                <input type="hidden" name="rer_id['.$key.']" value="'.$val['rer_id'].'"/>
                                <div class="col-xs-9">
                                    <select class="form-control" name="researchName['.$key.']">
                                        <option value="">Chooes</option>';
                                        echo '<optgroup label="Personnel">';
                                        foreach ($user as $value) {
                                            echo '<option value="u#'.$value['usr_id'].'"'.($value['usr_id'] == $val['usr_id'] ? ' selected':'').'>'.$value['usr_efname'].'&nbsp;'.$value['usr_elname'].'&nbsp;('.$value['usr_tfname'].'&nbsp;'.$value['usr_tlname'].')</option>';
                                        }
                                        echo '</optgroup>';
                                        echo '<optgroup label="Other">';
                                        foreach ($student as $value) {
                                            echo '<option value="s#'.$value['rsd_id'].'"'.($value['rsd_id'] == $val['rsd_id'] ? ' selected':'').'>'.$value['rsd_efname'].'&nbsp;'.$value['rsd_elname'].'&nbsp;('.$value['rsd_tfname'].'&nbsp;'.$value['rsd_tlname'].')</option>';
                                        }
                                        echo '</optgroup>';
                                    echo '</select>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" class="form-control" name="researchSequence['.$key.']" placeholder="1" value="'.$val['rer_sequence'].'"/>
                                </div>
                                <div class="col-xs-1">
                                    <button class="btn bg-red edel_mem2" value="'.$mem.'" key="'.$val['rer_id'].'" onclick="return false"><i class="fa fa-close"></i></button>
                                </div>
                            </div>';
                        }
                        $mem++;
                    }
                }else{
                    echo '<div class="emem2-res0">
                                <div class="col-xs-9">
                                    <label>ชื่อนักวิจัย</label>
                                    <select class="form-control" name="researchName[0]">
                                        <option value="">Chooes</option>';
                                        echo '<optgroup label="Personnel">';
                                        foreach ($user as $value) {
                                            echo '<option value="u#'.$value['usr_id'].'">'.$value['usr_efname'].'&nbsp;'.$value['usr_elname'].'&nbsp;('.$value['usr_tfname'].'&nbsp;'.$value['usr_tlname'].')</option>';
                                        }
                                        echo '</optgroup>';
                                        echo '<optgroup label="Other">';
                                        foreach ($student as $value) {
                                            echo '<option value="s#'.$value['rsd_id'].'">'.$value['rsd_efname'].'&nbsp;'.$value['rsd_elname'].'&nbsp;('.$value['rsd_tfname'].'&nbsp;'.$value['rsd_tlname'].')</option>';
                                        }
                                        echo '</optgroup>';
                                    echo '</select>
                                </div>
                                <div class="col-xs-2">
                                    <label>ลำดับ</label>
                                    <input type="text" class="form-control" name="researchSequence[0]" placeholder="1" />
                                </div>
                                <div class="col-xs-1" style="padding-top:25px;">
                                    <button class="btn btn-primary" id="eadd2_mem"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>';
                        $mem++;
                }
                echo '<input type="hidden" value="'.($mem-1).'" id="researcherCount"/>
                <input type="hidden" mame="researcherDelete" id="researcherDelete"/>
                </div>
            </div>';
	}

	public function get_proceedingById(){
        $res_id = $this->input->post('res_id');
        $user = $this->user->getAllName()->result_array();
        $student = $this->student->getAll();
        $position = $this->position->getAll();
        $reslevel = $this->reslevel->getAll();
        $this->research->res_id = $this->researcher->res_id = $res_id;
        $research = $this->research->getProjectById()->row_array();
        $researcher = $this->researcher->getByResearchId()->result_array();
        echo '<div class="form-group">
                <div class="row">
                    <input type="hidden" name="res_id" value="'.$research['res_id'].'"/>
                    <div class="col-xs-6">
                        <label>ชื่องานวิจัย (EN) <small class="error projectEn ePC"></small></label>
                        <input type="text" class="form-control" name="titleEn" placeholder="Enter ..." value="'.$research['res_etitle'].'"/>
                    </div>
                    <div class="col-xs-6">
                        <label>ชื่องานวิจัย (TH) <small class="error projectTh ePC"></small></label>
                        <input type="text" class="form-control" name="titleTh" placeholder="Enter ..." value="'.$research['res_ttitle'].'"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label>ชื่อโครงการวิจัย (EN) <small class="error projectTitleEn ePC"></small></label>
                        <input type="text" class="form-control" name="projectEn" placeholder="Enter ..." value="'.$research['res_eproject'].'"/>
                    </div>
                    <div class="col-xs-6">
                        <label>ชื่อโครงการวิจัย (TH) <small class="error projectTitleTh ePC"></small></label>
                        <input type="text" class="form-control" name="projectTh" placeholder="Enter ..." value="'.$research['res_tproject'].'"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label>ชื่อการประชุม <small class="error conference ePC"></small></label>
                        <input type="text" class="form-control" name="conference" placeholder="Enter ..." value="'.$research['res_conference'].'"/>
                    </div>
                    <div class="col-xs-6">
                        <label>Date <small class="error date ePC"></small></label>
                        <input type="text" class="form-control dateRange" name="date" placeholder="DD/MM/YYYY - DD/MM/YYYY" value="'.$research['res_date'].'"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <label>ปีที่เผยแพร่ <small class="error year ePC"></small></label>
                        <input type="text" class="form-control" name="year" placeholder="2015" value="'.$research['res_year'].'"/>
                    </div>
                    <div class="col-xs-4">
                        <label>เดือนที่เผยแพร่ <small class="error month ePC"></small></label>
                        <input type="text" class="form-control" name="month" placeholder="2" value="'.$research['res_month'].'"/>
                    </div>
                    <div class="col-xs-5">
                        <label>หน้า <small class="error page ePC"></small></label>
                        <input type="text" class="form-control" name="page" placeholder="(3-5)" value="'.$research['res_page'].'"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label>กลุ่มวิจัย <small class="error cluster ePC"></small></label>
                        <input type="text" class="form-control" name="cluster" placeholder="Informatics" value="'.$research['res_cluster'].'"/>
                    </div>
                    <div class="col-xs-6">
                        <label>ติดตามการวิจัย<small class="error track ePC"></small></label>
                        <input type="text" class="form-control" name="track" placeholder="Software Engineering" value="'.$research['res_track'].'"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label>ระดับการวิจัย <small class="error level ePC"></small></label>
                            <select class="form-control" name="level">
                                <option value="">Chooes</option>';
                                foreach ($reslevel as $value) {
                                    echo '<option value="'.$value['rlv_id'].'"'.($research['rlv_id'] == $value['rlv_id']?' selected':'').'>'.$value['rlv_etitle'].'&nbsp;('.$value['rlv_ttitle'].')</option>';
                                }
                            echo'</select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label>สิ่งที่แนบ</label><br>
                        <input name="file" type="file">
                        <label>Current file&nbsp;</label>&nbsp;<a href="'.site_url('c_research/getFile/'.$research['res_abstractfile']).'">'.$research['res_abstractfile'].'</a>
                        <input type="hidden" name="oldfile" value="'.$research['res_abstractfile'].'"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label>คำหลัก <small class="error key ePC"></small></label><br>
                        <input type="text" class="form-control tagsinput" name="key" data-role="tagsinput" value="'.$research['res_keyword'].'"/>
                    </div>
                </div>
                <hr/>
                <div class="row">';
                $mem = 0;
                if($researcher != null){
                    foreach ($researcher as $key => $val) {
                        if($key == 0){
                            echo '<div class="emem3-res'.$mem.'">
                                <input type="hidden" name="rer_id['.$key.']" value="'.$val['rer_id'].'"/>
                                <div class="col-xs-9">
                                    <label>ชื่อนักวิจัย</label>
                                    <select class="form-control" name="researchName['.$key.']">
                                        <option value="">Chooes</option>';
                                        echo '<optgroup label="Personnel">';
                                        foreach ($user as $value) {
                                            echo '<option value="u#'.$value['usr_id'].'"'.($value['usr_id'] == $val['usr_id'] ? ' selected':'').'>'.$value['usr_efname'].'&nbsp;'.$value['usr_elname'].'&nbsp;('.$value['usr_tfname'].'&nbsp;'.$value['usr_tlname'].')</option>';
                                        }
                                        echo '</optgroup>';
                                        echo '<optgroup label="Other">';
                                        foreach ($student as $value) {
                                            echo '<option value="s#'.$value['rsd_id'].'"'.($value['rsd_id'] == $val['rsd_id'] ? ' selected':'').'>'.$value['rsd_efname'].'&nbsp;'.$value['rsd_elname'].'&nbsp;('.$value['rsd_tfname'].'&nbsp;'.$value['rsd_tlname'].')</option>';
                                        }
                                        echo '</optgroup>';
                                    echo '</select>
                                </div>
                                <div class="col-xs-2">
                                    <label>ลำดับ</label>
                                    <input type="text" class="form-control" name="researchSequence['.$key.']" placeholder="1" value="'.$val['rer_sequence'].'"/>
                                </div>
                                <div class="col-xs-1" style="padding-top:25px;">
                                    <button class="btn btn-primary" id="eadd3_mem"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>';
                        }else{
                            echo '<div class="emem3-res'.$mem.'">
                                <input type="hidden" name="rer_id['.$key.']" value="'.$val['rer_id'].'"/>
                                <div class="col-xs-9">
                                    <select class="form-control" name="researchName['.$key.']">
                                        <option value="">Chooes</option>';
                                        echo '<optgroup label="Personnel">';
                                        foreach ($user as $value) {
                                            echo '<option value="u#'.$value['usr_id'].'"'.($value['usr_id'] == $val['usr_id'] ? ' selected':'').'>'.$value['usr_efname'].'&nbsp;'.$value['usr_elname'].'&nbsp;('.$value['usr_tfname'].'&nbsp;'.$value['usr_tlname'].')</option>';
                                        }
                                        echo '</optgroup>';
                                        echo '<optgroup label="Other">';
                                        foreach ($student as $value) {
                                            echo '<option value="s#'.$value['rsd_id'].'"'.($value['rsd_id'] == $val['rsd_id'] ? ' selected':'').'>'.$value['rsd_efname'].'&nbsp;'.$value['rsd_elname'].'&nbsp;('.$value['rsd_tfname'].'&nbsp;'.$value['rsd_tlname'].')</option>';
                                        }
                                        echo '</optgroup>';
                                    echo '</select>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" class="form-control" name="researchSequence['.$key.']" placeholder="1" value="'.$val['rer_sequence'].'"/>
                                </div>
                                <div class="col-xs-1">
                                    <button class="btn bg-red edel_mem3" value="'.$mem.'" key="'.$val['rer_id'].'" onclick="return false"><i class="fa fa-close"></i></button>
                                </div>
                            </div>';
                        }
                        $mem++;
                    }
                }else{
                    echo '<div class="emem3-res0">
                                <div class="col-xs-9">
                                    <label>ชื่อนักวิจัย</label>
                                    <select class="form-control" name="researchName[0]">
                                        <option value="">Chooes</option>';
                                        echo '<optgroup label="Personnel">';
                                        foreach ($user as $value) {
                                            echo '<option value="u#'.$value['usr_id'].'">'.$value['usr_efname'].'&nbsp;'.$value['usr_elname'].'&nbsp;('.$value['usr_tfname'].'&nbsp;'.$value['usr_tlname'].')</option>';
                                        }
                                        echo '</optgroup>';
                                        echo '<optgroup label="Other">';
                                        foreach ($student as $value) {
                                            echo '<option value="s#'.$value['rsd_id'].'">'.$value['rsd_efname'].'&nbsp;'.$value['rsd_elname'].'&nbsp;('.$value['rsd_tfname'].'&nbsp;'.$value['rsd_tlname'].')</option>';
                                        }
                                        echo '</optgroup>';
                                    echo '</select>
                                </div>
                                <div class="col-xs-2">
                                    <label>ลำดับ</label>
                                    <input type="text" class="form-control" name="researchPercent[0]" placeholder="100" />
                                </div>
                                <div class="col-xs-1" style="padding-top:25px;">
                                    <button class="btn btn-primary" id="eadd3_mem"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>';
                }
                echo '<input type="hidden" value="'.($mem-1).'" id="researcher3Count"/>
                <input type="hidden" mame="researcherDelete" id="researcher3Delete"/>
                </div>
            </div>';
	}

// insert

	public function insert_project_validate(){

		$usr_id = $this->session->userdata('usr_id');
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');

		$this->form_validation->set_rules('projectTitleEn','Project Title','trim|required|xss_clean');
		$this->form_validation->set_rules('projectTitleTh','Project Title','trim|required|xss_clean');
		$this->form_validation->set_rules('donorEn','Donor','trim|required|xss_clean');
		$this->form_validation->set_rules('donorTh','Donor','trim|required|xss_clean');
		$this->form_validation->set_rules('yearFund','Year of fund','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
		$this->form_validation->set_rules('abstract','Abstract','trim|xss_clean');
		$this->form_validation->set_rules('key','Key','trim|xss_clean');
		$this->form_validation->set_rules('status','Status','trim|alpha_numeric|required|xss_clean');
		$this->form_validation->set_rules('type','Type','trim|alpha_numeric|required|xss_clean');

		if($this->form_validation->run() == true){

			$result['message'] = 'success';
			echo json_encode($result);
		}else{

			$result['projectTitleEn'] = form_error('projectTitleEn');
			$result['projectTitleTh'] = form_error('projectTitleTh');
			$result['donorEn'] = form_error('donorEn');
			$result['donorTh'] = form_error('donorTh');
			$result['yearFund'] = form_error('yearFund');
			$result['abstract'] = form_error('abstract');
			$result['key'] = form_error('key');
			$result['status'] = form_error('errstatus');
			$result['type'] = form_error('errtype');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}
    public function insert_project(){
        $this->port = $this->load->database('port', TRUE);
        $this->research->res_publicationtype = '1';
        $this->research->res_eproject = $this->input->post('projectTitleEn');
        $this->research->res_tproject = $this->input->post('projectTitleTh');
        $this->research->res_edonor = $this->input->post('donorEn');
        $this->research->res_tdonor = $this->input->post('donorTh');
        $this->research->res_year = $this->input->post('yearFund');
        $this->research->res_abstract = $this->input->post('abstract');
        $this->research->res_abstractfile = $this->input->post('file');
        $this->research->res_keyword = $this->input->post('key');
        $this->research->rst_id = $this->input->post('status');
        $this->research->ret_id = $this->input->post('type');

        $this->port->trans_begin();

        $path = $this->config->item('uploads_dir')."abstract";
        $config['file_name'] = $this->input->post('file');
        $config['upload_path'] =  $path;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file'))
        {
            $upload_data = $this->upload->data(); 
            $this->research->res_abstractfile = $upload_data['file_name'];
            echo $upload_data['file_name'];
        }
        else {
            $this->research->res_abstractfile = null;
            echo $this->upload->display_errors();
        }

        $this->research->insert();

        $res_id = $this->research->last_insert_id();

        //Researcher
        if($this->input->post('researchType')[0]!=""){
            $researchers = array();
            foreach ($this->input->post('researchType') as $key => $value) {
                $researcherId = explode('#', $this->input->post('researchName')[$key]);
                $researcher = array(
                    'rpo_id' => $this->input->post('researchType')[$key],
                    'res_id' => $res_id,
                    'usr_id' => ($researcherId[0] == 'u'?$researcherId[1]:null),
                    'rsd_id' => ($researcherId[0] == 's'?$researcherId[1]:null),
                    'rer_percent' => $this->input->post('researchPercent')[$key]);
                array_push($researchers, $researcher);
            }
            $this->researcher->insert_array($researchers);
        }
        //Funding
        if($this->input->post('fundInstitution')[0]!=""){
            $findings = array();
            foreach ($this->input->post('fundInstitution') as $key => $value) {
                $date = explode(' - ', $this->input->post('fundDate')[$key]);
                $start = DateTime::createFromFormat('d/m/Y', $date[0]);
                $end = DateTime::createFromFormat('d/m/Y', $date[1]);
                $finding = array(
                    'fud_institution' => $this->input->post('fundInstitution')[$key],
                    'fud_funding' => $this->input->post('fundFunding')[$key],
                    'fud_startdate' => (isset($start)?$start->format('Y-m-d'):''),
                    'fud_enddate' => (isset($end)?$end->format('Y-m-d'):''),
                    'res_id' => $res_id);   
                array_push($findings, $finding);
            }
            $this->fund->insert_array($findings);
        }
        //integrating
        if($this->input->post('intDate')!=""){
            $integratings = array();
            $date = explode(' - ', $this->input->post('intDate'));
            $start = DateTime::createFromFormat('d/m/Y', $date[0]);
            $end = DateTime::createFromFormat('d/m/Y', $date[1]);
            $this->integrating->int_datestart = (isset($start)?$start->format('Y-m-d'):'');
            $this->integrating->int_dateend = (isset($end)?$end->format('Y-m-d'):'');
            $this->integrating->res_id = $res_id;
            $this->integrating->insert();
            $int_id = $this->integrating->last_insert_id();
            foreach ($this->input->post('intIntegrating') as $key => $value) {
                $integrating = array(
                'itt_id' => $this->input->post('intIntegrating')[$key],
                'int_id' => $int_id);
                array_push($integratings, $integrating);
            }
            $this->intconnect->insert_array($integratings);
        }

        if ($this->port->trans_status() == FALSE) {
            $this->port->trans_rollback();
            $this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
        }else {
            $this->port->trans_commit();
            $this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
        }
        if($this->session->userdata('menuadmin')) {
            redirect('c_research/index_admin');
        } else {
            redirect('c_research');
        }
    }

	public function insert_journal_validate(){
		$usr_id = $this->session->userdata('usr_id');
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
   

		$this->form_validation->set_rules('projectEn','Project','trim|required|xss_clean');
		$this->form_validation->set_rules('projectTh','Project','trim|required|xss_clean');
		$this->form_validation->set_rules('titleEn','Project Title','trim|required|xss_clean');
		$this->form_validation->set_rules('titleTh','Project Title','trim|required|xss_clean');
		$this->form_validation->set_rules('journal','Journal','trim|required|xss_clean');
		$this->form_validation->set_rules('year','Year of publish','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
		$this->form_validation->set_rules('month','Month of publish ','trim|required|is_natural_no_zero|xss_clean');
		$this->form_validation->set_rules('page','Year/Vol./Pages','trim|required|xss_clean');
		$this->form_validation->set_rules('cluster','Cluster ','trim|alpha_numeric|required|xss_clean');
		$this->form_validation->set_rules('track','Track','trim|required|xss_clean');
		$this->form_validation->set_rules('level','Level','trim|alpha_numeric|required|xss_clean');
		$this->form_validation->set_rules('key','Key','trim|xss_clean');

		if($this->form_validation->run() == true){

			$result['message'] = 'success';
			echo json_encode($result);
		}else{

			$result['projectEn'] = form_error('projectEn');
			$result['projectTh'] = form_error('projectTh');
			$result['titleEn'] = form_error('titleEn');
			$result['titleTh'] = form_error('titleTh');
			$result['journal'] = form_error('journal');
			$result['year'] = form_error('year');
			$result['month'] = form_error('month');
			$result['page'] = form_error('page');
			$result['cluster'] = form_error('cluster');
			$result['track'] = form_error('track');
			$result['level'] = form_error('level');
			$result['errkey'] = form_error('key');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}
    public function insert_journal(){

        $this->port = $this->load->database('port', TRUE);

        $this->research->res_publicationtype = '2';
        $this->research->res_eproject = $this->input->post('projectEn');
        $this->research->res_tproject = $this->input->post('projectTh');
        $this->research->res_etitle = $this->input->post('titleEn');
        $this->research->res_ttitle = $this->input->post('titleTh');
        $this->research->res_journals = $this->input->post('journal');
        $this->research->res_year = $this->input->post('year');
        $this->research->res_month = $this->input->post('month');
        $this->research->res_page = $this->input->post('page');
        $this->research->res_cluster = $this->input->post('cluster');
        $this->research->res_track = $this->input->post('track');
        $this->research->rlv_id = $this->input->post('level');
        $this->research->res_keyword = $this->input->post('key');
        $this->port->trans_begin();

        $path = $this->config->item('uploads_dir')."abstract";
        $config['file_name'] = $this->input->post('file');
        $config['upload_path'] =  $path;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file'))
        {
            $upload_data = $this->upload->data(); 
            $this->research->res_abstractfile = $upload_data['file_name'];
            echo $upload_data['file_name'];
        }
        else {
            $this->research->res_abstractfile = null;
            echo $this->upload->display_errors();
        }
        $this->research->insert();
        $res_id = $this->research->last_insert_id();

        //Researcher
        $researchers = array();
        if($this->input->post('researchName')[0]!=""){
            $researchers = array();
            foreach ($this->input->post('researchName') as $key => $value) {
                $researcherId = explode('#', $this->input->post('researchName')[$key]);
                $researcher = array(
                    'res_id' => $res_id,
                    'usr_id' => ($researcherId[0] == 'u'?$researcherId[1]:null),
                    'rsd_id' => ($researcherId[0] == 's'?$researcherId[1]:null),
                    'rer_sequence' => $this->input->post('researchSequence')[$key]);
                array_push($researchers, $researcher);
            }
            $this->researcher->insert_array($researchers);
        }
        if ($this->port->trans_status() == FALSE) {
            $this->port->trans_rollback();
            $this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
        }else {
            $this->port->trans_commit();
            $this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
        }
        if($this->session->userdata('menuadmin')) {
            redirect('c_research/index_admin');
        } else {
            redirect('c_research');
        }
    }

	public function insert_proceeding_validate(){
		$usr_id = $this->session->userdata('usr_id');
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');

        $this->form_validation->set_rules('projectEn','Project','trim|required|xss_clean');
        $this->form_validation->set_rules('projectTh','Project','trim|required|xss_clean');
        $this->form_validation->set_rules('titleEn','Project Title','trim|required|xss_clean');
        $this->form_validation->set_rules('titleTh','Project Title','trim|required|xss_clean');
        $this->form_validation->set_rules('conference','Conference','trim|required|xss_clean');
        // $this->form_validation->set_rules('place','Place','trim|required|xss_clean');
        $this->form_validation->set_rules('date','Date','trim|required|xss_clean');
        $this->form_validation->set_rules('year','Year of publish','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
        $this->form_validation->set_rules('month','Month of publish ','trim|required|is_natural_no_zero|xss_clean');
        $this->form_validation->set_rules('page','Year/Vol./Pages','trim|required|xss_clean');
        $this->form_validation->set_rules('cluster','Cluster ','trim|alpha_numeric|xss_clean');
        $this->form_validation->set_rules('track','Track','trim|xss_clean');
        $this->form_validation->set_rules('level','Level','trim|alpha_numeric|required|xss_clean');
        $this->form_validation->set_rules('key','Key','trim|xss_clean');

        if($this->form_validation->run() == true){

            $result['message'] = 'success';
            echo json_encode($result);
        }else{
            $result['projectEn'] = form_error('projectEn');
            $result['projectTh'] = form_error('projectTh');
            $result['titleEn'] = form_error('titleEn');
            $result['titleTh'] = form_error('titleTh');
            $result['conference'] = form_error('conference');
            $result['place'] = form_error('place');
            $result['date'] = form_error('date');
            $result['year'] = form_error('year');
            $result['month'] = form_error('month');
            $result['page'] = form_error('page');
            $result['cluster'] = form_error('cluster');
            $result['track'] = form_error('track');
            $result['level'] = form_error('level');
            $result['errkey'] = form_error('key');
            $result['message'] = 'fail';
            echo json_encode($result);
        }
	}
    public function insert_proceeding(){
        $this->research->res_publicationtype = '3';
        $this->research->res_eproject = $this->input->post('projectEn');
        $this->research->res_tproject = $this->input->post('projectTh');
        $this->research->res_etitle = $this->input->post('titleEn');
        $this->research->res_ttitle = $this->input->post('titleTh');
        $this->research->res_conference = $this->input->post('conference');
        // $this->research->res_place = $this->input->post('place');
        $this->research->res_date = $this->input->post('date');
        $this->research->res_year = $this->input->post('year');
        $this->research->res_month = $this->input->post('month');
        $this->research->res_page = $this->input->post('page');
        $this->research->res_cluster = $this->input->post('cluster');
        $this->research->res_track = $this->input->post('track');
        $this->research->rlv_id = $this->input->post('level');
        $this->research->res_keyword = $this->input->post('key');
        $this->port = $this->load->database('port', TRUE);
        $this->port->trans_begin();

        $path = $this->config->item('uploads_dir')."abstract";
        $config['file_name'] = $this->input->post('file');
        $config['upload_path'] =  $path;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file'))
        {
            $upload_data = $this->upload->data(); 
            $this->research->res_abstractfile = $upload_data['file_name'];
            echo $upload_data['file_name'];
        }
        else {
            $this->research->res_abstractfile = null;
            echo $this->upload->display_errors();
        }
        $this->research->insert();
        $res_id = $this->research->last_insert_id();

        //Researcher
        $researchers = array();
        if($this->input->post('researchName')[0]!=""){
            $researchers = array();
            foreach ($this->input->post('researchName') as $key => $value) {
                $researcherId = explode('#', $this->input->post('researchName')[$key]);
                $researcher = array(
                    'res_id' => $res_id,
                    'usr_id' => ($researcherId[0] == 'u'?$researcherId[1]:null),
                    'rsd_id' => ($researcherId[0] == 's'?$researcherId[1]:null),
                    'rer_sequence' => $this->input->post('researchSequence')[$key]);
                array_push($researchers, $researcher);
            }
            $this->researcher->insert_array($researchers);
        }

        if ($this->port->trans_status() == FALSE) {
            $this->port->trans_rollback();
            $this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
        }else {
            $this->port->trans_commit();
            $this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
        }
        if($this->session->userdata('menuadmin')) {
            redirect('c_research/index_admin');
        } else {
            redirect('c_research');
        }
    }

    //UPDATE


    public function update_project_validate(){

        $usr_id = $this->session->userdata('usr_id');
        $this->form_validation->set_error_delimiters('<font color="red">','</font>');

        $this->form_validation->set_rules('projectTitleEn','Project Title','trim|required|xss_clean');
        $this->form_validation->set_rules('projectTitleTh','Project Title','trim|required|xss_clean');
        $this->form_validation->set_rules('donorEn','Donor','trim|required|xss_clean');
        $this->form_validation->set_rules('donorTh','Donor','trim|required|xss_clean');
        $this->form_validation->set_rules('yearFund','Year of fund','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
        $this->form_validation->set_rules('abstract','Abstract','trim|xss_clean');
        $this->form_validation->set_rules('key','Key','trim|xss_clean');
        $this->form_validation->set_rules('status','Status','trim|alpha_numeric|required|xss_clean');
        $this->form_validation->set_rules('type','Type','trim|alpha_numeric|required|xss_clean');

        if($this->form_validation->run() == true){
            $result['message'] = 'success';
            echo json_encode($result);
        }else{

            $result['projectTitleEn'] = form_error('projectTitleEn');
            $result['projectTitleTh'] = form_error('projectTitleTh');
            $result['donorEn'] = form_error('donorEn');
            $result['donorTh'] = form_error('donorTh');
            $result['yearFund'] = form_error('yearFund');
            $result['abstract'] = form_error('abstract');
            $result['key'] = form_error('key');
            $result['errstatus'] = form_error('status');
            $result['errtype'] = form_error('type');
            $result['message'] = 'fail';
            echo json_encode($result);
        }
    }

    public function update_project(){
            $this->port = $this->load->database('port', TRUE);
            $this->research->res_publicationtype = '1';
            $this->research->res_eproject = $this->input->post('projectTitleEn');
            $this->research->res_tproject = $this->input->post('projectTitleTh');
            $this->research->res_edonor = $this->input->post('donorEn');
            $this->research->res_tdonor = $this->input->post('donorTh');
            $this->research->res_year = $this->input->post('yearFund');
            $this->research->res_abstract = $this->input->post('abstract');
            $this->research->res_abstractfile = $this->input->post('file');
            $this->research->res_keyword = $this->input->post('key');
            $this->research->rst_id = $this->input->post('status');
            $this->research->ret_id = $this->input->post('type');
            $this->research->res_id = $this->input->post('res_id');

            $this->port->trans_begin();
            $path = $this->config->item('uploads_dir')."abstract";
            $config['file_name'] = $this->input->post('file');
            $config['upload_path'] =  $path;
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('file'))
            {
                $upload_data = $this->upload->data(); 
                $this->research->res_abstractfile = $upload_data['file_name'];
                echo $upload_data['file_name'];
            }
            else {
                $this->research->res_abstractfile = $this->input->post('oldfile');
                echo $this->upload->display_errors();
            }
            $this->research->update();
            $res_id = $this->input->post('res_id');

            //Researcher
            if($this->input->post('researchType')[0]!=""){
                // $researchers = array();
                foreach ($this->input->post('researchType') as $key => $value) {
                    $researcherId = explode('#', $this->input->post('researchName')[$key]);
                    // echo ($researcherId[0] == 's'?$researcherId[1]:null);
                        $this->researcher->rpo_id = $this->input->post('researchType')[$key];
                        $this->researcher->res_id = $res_id;
                        $this->researcher->usr_id = ($researcherId[0] == 'u'?$researcherId[1]:null);
                        $this->researcher->rsd_id = ($researcherId[0] == 's'?$researcherId[1]:null);
                        $this->researcher->rer_id = (isset($this->input->post('rer_id')[$key])?$this->input->post('rer_id')[$key]:null);
                        $this->researcher->rer_percent = $this->input->post('researchPercent')[$key];
                        // echo $this->researcher->rsd_id."asf"; die();
                        if($this->researcher->rer_id == null){
                            $this->researcher->insert();
                        }else{
                            $this->researcher->update();
                        }
                }
            }
            //Funding
            if($this->input->post('fundInstitution')[0]!=""){
                // $findings = array();
                foreach ($this->input->post('fundInstitution') as $key => $value) {
                    $date = explode(' - ', $this->input->post('fundDate')[$key]);
                    $start = DateTime::createFromFormat('d/m/Y', $date[0]);
                    $end = DateTime::createFromFormat('d/m/Y', $date[1]);
                    // $finding = array(
                        $this->fund->fud_institution = $this->input->post('fundInstitution')[$key];
                        $this->fund->fud_funding = $this->input->post('fundFunding')[$key];
                        $this->fund->fud_startdate = (isset($start)?$start->format('Y-m-d'):'');
                        $this->fund->fud_enddate = (isset($end)?$end->format('Y-m-d'):'');
                        $this->fund->res_id = $res_id;
                        $this->fund->fud_id = (isset($this->input->post('fud_id')[$key])?$this->input->post('fud_id')[$key]:null);
                        if($this->fund->fud_id == null){
                            $this->fund->insert();
                        }else{
                            $this->fund->update();
                        }
                    // array_push($findings, $finding);
                }
            }
            //integrating
            if($this->input->post('intDate')!=""){
                // $integratings = array();
                $date = explode(' - ', $this->input->post('intDate'));
                $start = DateTime::createFromFormat('d/m/Y', $date[0]);
                $end = DateTime::createFromFormat('d/m/Y', $date[1]);
                $this->integrating->int_datestart = (isset($start)?$start->format('Y-m-d'):'');
                $this->integrating->int_dateend = (isset($end)?$end->format('Y-m-d'):'');
                $this->integrating->res_id = $res_id;
                $this->integrating->int_id = $this->input->post('int_id');
                if($this->integrating->int_id == null){
                    $this->integrating->insert();
                    $this->integrating->int_id = $this->integrating->last_insert_id();
                }else{
                    $this->integrating->update();
                }
                foreach ($this->input->post('intIntegrating') as $key => $value) {
                    // $integrating = array(
                    $this->intconnect->itt_id = $this->input->post('intIntegrating')[$key];
                    $this->intconnect->inc_id = (isset($this->input->post('inc_id')[$key])?$this->input->post('inc_id')[$key]:null);
                    $this->intconnect->int_id = $this->integrating->int_id;
                    // array_push($integratings, $integrating);
                    if($this->intconnect->inc_id == null){
                        $this->intconnect->insert();
                    }else{
                        $this->intconnect->update();
                    }
                }
            }

            if ($this->port->trans_status() == FALSE) {
                $this->port->trans_rollback();
                $this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
            }else {
                $this->port->trans_commit();
                $this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Update!</p>');
            }

            if($this->session->userdata('menuadmin')) {
                redirect('c_research/index_admin');
            } else {
                redirect('c_research');
            }
    }

    public function update_journal_validate(){

        $usr_id = $this->session->userdata('usr_id');
        $this->form_validation->set_error_delimiters('<font color="red">','</font>');

        $this->form_validation->set_rules('projectEn','Project','trim|required|xss_clean');
        $this->form_validation->set_rules('projectTh','Project','trim|required|xss_clean');
        $this->form_validation->set_rules('titleEn','Project Title','trim|required|xss_clean');
        $this->form_validation->set_rules('titleTh','Project Title','trim|required|xss_clean');
        $this->form_validation->set_rules('journal','Journal','trim|required|xss_clean');
        $this->form_validation->set_rules('year','Year of publish','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
        $this->form_validation->set_rules('month','Month of publish ','trim|required|is_natural_no_zero|xss_clean');
        $this->form_validation->set_rules('page','Year/Vol./Pages','trim|required|xss_clean');
        $this->form_validation->set_rules('cluster','Cluster ','trim|alpha_numeric|required|xss_clean');
        $this->form_validation->set_rules('track','Track','trim|alpha_numeric|required|xss_clean');
        $this->form_validation->set_rules('level','Level','trim|alpha_numeric|required|xss_clean');
        $this->form_validation->set_rules('key','Key','trim|xss_clean');

        if($this->form_validation->run() == true){

            $result['message'] = 'success';
            echo json_encode($result);
        }else{

            $result['projectEn'] = form_error('projectEn');
            $result['projectTh'] = form_error('projectTh');
            $result['titleEn'] = form_error('titleEn');
            $result['titleTh'] = form_error('titleTh');
            $result['journal'] = form_error('journal');
            $result['year'] = form_error('year');
            $result['month'] = form_error('month');
            $result['page'] = form_error('page');
            $result['cluster'] = form_error('cluster');
            $result['track'] = form_error('track');
            $result['level'] = form_error('level');
            $result['errkey'] = form_error('key');
            $result['message'] = 'fail';
            echo json_encode($result);
        }
    }
    public function update_journal(){

        $usr_id = $this->session->userdata('usr_id');
        $this->port = $this->load->database('port', TRUE);

        $this->research->res_publicationtype = '2';
        $this->research->res_eproject = $this->input->post('projectEn');
        $this->research->res_tproject = $this->input->post('projectTh');
        $this->research->res_etitle = $this->input->post('titleEn');
        $this->research->res_ttitle = $this->input->post('titleTh');
        $this->research->res_journals = $this->input->post('journal');
        $this->research->res_year = $this->input->post('year');
        $this->research->res_month = $this->input->post('month');
        $this->research->res_page = $this->input->post('page');
        $this->research->res_cluster = $this->input->post('cluster');
        $this->research->res_track = $this->input->post('track');
        $this->research->rlv_id = $this->input->post('level');
        $this->research->res_keyword = $this->input->post('key');
        $this->research->res_id = $this->input->post('res_id');
            
        $this->port->trans_begin();

        $path = $this->config->item('uploads_dir')."abstract";
        $config['file_name'] = $this->input->post('file');
        $config['upload_path'] =  $path;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file'))
        {
            $upload_data = $this->upload->data(); 
            $this->research->res_abstractfile = $upload_data['file_name'];
            echo $upload_data['file_name'];
        }
        else {
            $this->research->res_abstractfile = $this->input->post('oldfile');
            echo $this->upload->display_errors();
        }

        $this->research->update();
        $res_id = $this->input->post('res_id');

        //Researcher
        if($this->input->post('researchName')[0]!=""){
            $researchers = array();
            foreach ($this->input->post('researchName') as $key => $value) {
                $researcherId = explode('#', $this->input->post('researchName')[$key]);
                    $this->researcher->res_id = $res_id;
                    $this->researcher->usr_id = ($researcherId[0] == 'u'?$researcherId[1]:null);
                    $this->researcher->rsd_id = ($researcherId[0] == 's'?$researcherId[1]:null);
                    $this->researcher->rer_id = (isset($this->input->post('rer_id')[$key])?$this->input->post('rer_id')[$key]:null);
                    $this->researcher->rer_sequence = $this->input->post('researchSequence')[$key];
                    if($this->researcher->rer_id == null){
                        $this->researcher->insert();
                    }else{
                        $this->researcher->update();
                    }
            }
        }
        if ($this->port->trans_status() == FALSE) {
            $this->port->trans_rollback();
            $this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
        }else {
            $this->port->trans_commit();
            $this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Update!</p>');
        }
        if($this->session->userdata('menuadmin')) {
            redirect('c_research/index_admin');
        } else {
            redirect('c_research');
        }
    }

    public function update_proceeding_validate(){
        $usr_id = $this->session->userdata('usr_id');
        $this->form_validation->set_error_delimiters('<font color="red">','</font>');

        $this->form_validation->set_rules('projectEn','Project','trim|required|xss_clean');
        $this->form_validation->set_rules('projectTh','Project','trim|required|xss_clean');
        $this->form_validation->set_rules('titleEn','Project Title','trim|required|xss_clean');
        $this->form_validation->set_rules('titleTh','Project Title','trim|required|xss_clean');
        $this->form_validation->set_rules('conference','Conference','trim|required|xss_clean');
        // $this->form_validation->set_rules('place','Place','trim|required|xss_clean');
        $this->form_validation->set_rules('date','Date','trim|required|xss_clean');
        $this->form_validation->set_rules('year','Year of publish','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
        $this->form_validation->set_rules('month','Month of publish ','trim|required|is_natural_no_zero|xss_clean');
        $this->form_validation->set_rules('page','Year/Vol./Pages','trim|required|xss_clean');
        $this->form_validation->set_rules('cluster','Cluster ','trim|alpha_numeric|xss_clean');
        $this->form_validation->set_rules('track','Track','trim|xss_clean');
        $this->form_validation->set_rules('level','Level','trim|alpha_numeric|required|xss_clean');
        $this->form_validation->set_rules('key','Key','trim|xss_clean');

        if($this->form_validation->run() == true){

            $result['message'] = 'success';
            echo json_encode($result);
        }else{
            $result['projectEn'] = form_error('projectEn');
            $result['projectTh'] = form_error('projectTh');
            $result['titleEn'] = form_error('titleEn');
            $result['titleTh'] = form_error('titleTh');
            $result['conference'] = form_error('conference');
            $result['place'] = form_error('place');
            $result['date'] = form_error('date');
            $result['year'] = form_error('year');
            $result['month'] = form_error('month');
            $result['page'] = form_error('page');
            $result['cluster'] = form_error('cluster');
            $result['track'] = form_error('track');
            $result['level'] = form_error('level');
            $result['errkey'] = form_error('key');
            $result['message'] = 'fail';
            echo json_encode($result);
        }
    }
    public function update_proceeding(){
        $usr_id = $this->session->userdata('usr_id');

        $this->research->res_publicationtype = '3';
        $this->research->res_eproject = $this->input->post('projectEn');
        $this->research->res_tproject = $this->input->post('projectTh');
        $this->research->res_etitle = $this->input->post('titleEn');
        $this->research->res_ttitle = $this->input->post('titleTh');
        $this->research->res_conference = $this->input->post('conference');
        $this->research->res_place = $this->input->post('place');
        $this->research->res_date = $this->input->post('date');
        $this->research->res_year = $this->input->post('year');
        $this->research->res_month = $this->input->post('month');
        $this->research->res_page = $this->input->post('page');
        $this->research->res_cluster = $this->input->post('cluster');
        $this->research->res_track = $this->input->post('track');
        $this->research->rlv_id = $this->input->post('level');
        $this->research->res_keyword = $this->input->post('key');
        $this->research->res_id = $this->input->post('res_id');
        $this->port = $this->load->database('port', TRUE);
        
        $this->port->trans_begin();

        $path = $this->config->item('uploads_dir')."abstract";
        $config['file_name'] = $this->input->post('file');
        $config['upload_path'] =  $path;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file'))
        {
            $upload_data = $this->upload->data(); 
            $this->research->res_abstractfile = $upload_data['file_name'];
            echo $upload_data['file_name'];
        }
        else {
            $this->research->res_abstractfile = $this->input->post('oldfile');
            echo $this->upload->display_errors();
        }
        $this->research->update();
        $res_id = $this->input->post('res_id');

        //Researcher
        if($this->input->post('researchName')[0]!=""){
            $researchers = array();
            foreach ($this->input->post('researchName') as $key => $value) {
                $researcherId = explode('#', $this->input->post('researchName')[$key]);
                    $this->researcher->res_id = $res_id;
                    $this->researcher->usr_id = ($researcherId[0] == 'u'?$researcherId[1]:null);
                    $this->researcher->rsd_id = ($researcherId[0] == 's'?$researcherId[1]:null);
                    $this->researcher->rer_id = $this->input->post('rer_id')[$key];
                    $this->researcher->rer_sequence = $this->input->post('researchSequence')[$key];
                    if($this->researcher->rer_id == null){
                        $this->researcher->insert();
                    }else{
                        $this->researcher->update();
                    }
            }
        }

        if ($this->port->trans_status() == FALSE) {
            $this->port->trans_rollback();
            $this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
        }else {
            $this->port->trans_commit();
            $this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Update!</p>');
        }
        if($this->session->userdata('menuadmin')) {
            redirect('c_research/index_admin');
        } else {
            redirect('c_research');
        }
    }
    //delete
    public function delete_research_self(){

        $this->research->res_id = $this->researcher->res_id = $this->fund->res_id = $this->integrating->res_id = $this->intconnect->res_id = $this->input->post('res_id');

        $this->researcher->deleteByResearcher();
        $this->fund->deleteByResearcher();
        $this->integrating->deleteByResearcher();
        // $this->intconnect->deleteByResearcher();
        $this->research->delete();

        if($this->session->userdata('menuadmin')) {
            redirect('c_research/index_admin');
        } else {
            redirect('c_research');
        }
    }

    //option
    public function delete_researcher(){
        $this->researcher->rer_id = $this->input->post('rer_id');

        $this->researcher->delete();
    }
    public function delete_fund(){
        $this->fund->fud_id = $this->input->post('fud_id');

        $this->fund->delete();
    }
    public function delete_intconnect(){
        $this->intconnect->inc_id = $this->input->post('inc_id');

        $this->intconnect->delete();
    }

    //researcher
    public function get_other_researcher(){
        $data = $this->student->getAll();
        $i = 1;

        echo '<table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width:10%;">No.</th>
                    <th style="width:40%;">Name (EN)</th>
                    <th style="width:40%;">Name (TH)</th>
                    <th style="width:10%;text-align:center;">Option</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($data as $row):
            echo '<tr>
                <td>'.$i.'</td>
                <td>'.$row['rsd_efname'].'&nbsp;'.$row['rsd_elname'].'</td>
                <td>'.$row['rsd_tfname'].'&nbsp;'.$row['rsd_tlname'].'</td>
                <td align="center">
                    <a type="button" class="edt-other close pull-center" 
                    style="float:none !important;" data="'.$row['rsd_id'].'">
                    <i class="fa fa-edit"></i>
                    </a>
                    <a type="button" class="del-other close pull-center" data-toggle="modal" data-target="#del-other" aria-hidden="true"
                    style="float:none !important;" data="'.$row['rsd_id'].'">
                    <i class="fa fa-trash-o"></i>
                    </a>
                </td>
            </tr>';
            $i++;
        endforeach;
            echo '</tbody>
        </table>';
    }

    public function otherResearcher_validate(){
        $this->form_validation->set_error_delimiters('<font color="red">','</font>');

        $this->form_validation->set_rules('ename','English name','trim|alpha|required|xss_clean');
        $this->form_validation->set_rules('elastName','English last name','trim|alpha|required|xss_clean');
        $this->form_validation->set_rules('tname','Thai name','trim|required|xss_clean');
        $this->form_validation->set_rules('tlastName','Thai last name','trim|required|xss_clean');

        if($this->form_validation->run() == true){
            
            $result['message'] = 'success';
            echo json_encode($result);
        }else{
            $result['message'] = 'fail';
            $result['ename'] = form_error('ename');
            $result['elastname'] = form_error('elastName');
            $result['tname'] = form_error('tname');
            $result['tlastname'] = form_error('tlastName');
            echo json_encode($result);
        }
    }

    public function get_other_researcher_byId(){
        $this->student->rsd_id = $this->input->post('id');
        $data = $this->student->getByKey();
        $result['ename'] = $data['rsd_efname'];
        $result['elastname'] = $data['rsd_elname'];
        $result['tname'] = $data['rsd_tfname'];
        $result['tlastname'] = $data['rsd_tlname'];
        echo json_encode($result);
    }

    public function insert_otherResearcher(){
        $this->student->rsd_efname = $this->input->post('ename');
        $this->student->rsd_elname = $this->input->post('elastName');
        $this->student->rsd_tfname = $this->input->post('tname');
        $this->student->rsd_tlname = $this->input->post('tlastName');
        $this->student->insert();
        if($this->session->userdata('menuadmin')) {
            redirect('c_research/index_admin');
        } else {
            redirect('c_research');
        }
    }
    public function update_otherResearcher(){
        $this->student->rsd_id = $this->input->post('id');
        $this->student->rsd_efname = $this->input->post('ename');
        $this->student->rsd_elname = $this->input->post('elastName');
        $this->student->rsd_tfname = $this->input->post('tname');
        $this->student->rsd_tlname = $this->input->post('tlastName');
        $this->student->update();
        if($this->session->userdata('menuadmin')) {
            redirect('c_research/index_admin');
        } else {
            redirect('c_research');
        }
    }

    public function delete_otherResearcher(){
        $this->student->rsd_id = $this->input->post('rsd_id');

        $this->student->delete();
        if($this->session->userdata('menuadmin')) {
            redirect('c_research/index_admin');
        } else {
            redirect('c_research');
        }
    }

}