<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_admin_insignia extends Port_core {
	public function __construct()
	{ 
		parent::__construct();

			$this->load->model('m_port_insignia','sign');	
			$this->load->model('m_port_user', 'user');
			$this->load->model('m_port_position_personal', 'per');
			$this->load->model('m_port_decoration', 'dec');

	}


		public function index()
	{

		$data = '';
		$usr_id = $this->input->post('usr_id');
		$port_insignia = @$this->sign->get_by_usr_id_Desc($usr_id)[0];
		
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('sign_date_hidden','ปีที่จะได้รับ','trim');
		$this->form_validation->set_rules('usr_id','ชื่อผู้ได้รับ','trim');
		
			
		if ($this->form_validation->run() == true){

			if($port_insignia['dec_id'] == $this->input->post('dec_abb_id')){
				$this->session->set_flashdata('result', '<font color="red">ไม่สามารถเพิ่มข้อมูลได้</font>.');
				
			}else{
			
				$this->port = $this->load->database('port', TRUE);
				$this->port->trans_begin();
				$this->load->model('m_port_insignia','sign');	
				$this->load->model('m_port_user', 'user');
				$this->load->model('m_port_position_personal', 'per');
				$this->load->model('m_port_decoration', 'dec');
			
				$this->sign->sign_date = $this->input->post('sign_date');
				
				
				$this->sign->dec_id = $this->input->post('dec_abb_id');
				$this->sign->usr_id = $this->input->post('usr_id');
				
				$this->sign->insert();
				$this->sign->update_dec();
				
				
			
			}

			redirect("c_admin_insignia");
			
		}else{
			$this->load->model('m_port_insignia','sign');	
			$this->load->model('m_port_user', 'user');
			$this->load->model('m_port_position_personal', 'per');
			$this->load->model('m_port_decoration', 'dec');
			
			$data['sign'] = $this->sign->getAll();
			$data['per'] = $this->per->getAll(array('pos_name' => 'ASC'));
			$data['dec'] = $this->dec->getAll(array('dec_name' => 'DESC'));
			$data['user'] = $this->user->getAllUser()->result_array();
			
			
			

			
			$this->output_admin('insignia of Instruction','v_admin_insignia', $data);
		}
		
	}


	
function delete()
	{
		$this->load->model('m_port_insignia','sign');
		$this->sign->sign_id = $this->input->post('sign_id');
		$delete = $this->sign->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_admin_insignia");
	}



	public function get(){
		$this->load->model('m_port_insignia','sign');	
			$this->load->model('m_port_user', 'user');
			$this->load->model('m_port_position_personal', 'per');
			$this->load->model('m_port_decoration', 'dec');
		$name = $this->input->post('sign_id');
		$user = $this->user->getAll();
		$per = $this->per->getAll();
		$dec = $this->dec->getAll();
		$sign = $this->sign->go($name);
		
		
		
		
		
		foreach ($sign as $value) { 

				echo '<div class="form-group">
		<input type="hidden" class="form-coutrol" id="editId" name="sign_id" value="'.$value['sign_id'].'"/>
		
			
			
                <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="inputDec">ชื่อเครื่องราช <small class="error dec_id"></small></label>
                                    <select id="dec_id" name="dec_id"  class="form-control">
                                        <option value="">Choose</option>';
                                        foreach ($dec as $value) { 
                                            echo '<option value="'.$value['dec_id'].'"'.($edb['dec_id'] == $value['dec_id']?' selected':'').'>'.$value['dec_name'].'</option>';
                                        }
                                    echo '</select>
                                </div>
                            </div>
                        </div>
            <div class="row">
               <div class="col-xs-6">
                    <label>ปีที่ได้รับ <small class="error sign_date"></small></label>
                    <select class="form-control" name="sign_date">
                        <option value="">choose</option>';
                         for($i = date("Y")+543; $i >= (date("Y")-60) ; $i-- ){
                            echo '<option value="'.$i.'"'.($i == $sign['sign_date']?' selected':'').'>'.$i.'</option>';
                         }
                    echo '</select>
                </div>
            </div>
            
						

				</div>';				

			
		}
		
	
	
    }
		function getPositionById(){
		$this->per->posty_id = $this->input->post('posty_id');
		$result = $this->per->getByPosId();
	
			echo '<option value="">Choose</option>';
		foreach ($result as $value) { 
            echo '<option value="'.$value['pos_id'].'">'.$value['pos_name'].'</option>';
			}
		}
		function get_Probability($usr_id){
			$this->load->model('m_forecast');
			$this->load->model('m_port_decoration');
			$this->load->model('m_port_insignia');
			$this->load->model('m_port_user');
			
			$pos_id = $this->m_port_user->get_user_by_id($usr_id)[0];
			
			if($pos_id['pos_id'] == 1){
				$probability_dec_id = $this->m_forecast->generate_pos_1($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
			
			}else if($pos_id['pos_id'] == 3){
				$probability_dec_id = $this->m_forecast->generate_pos_2($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 4){
				$probability_dec_id = $this->m_forecast->generate_pos_3($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 5){
				$probability_dec_id = $this->m_forecast->generate_pos_4($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 6){
				$probability_dec_id = $this->m_forecast->generate_pos_5($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 7){
				$probability_dec_id = $this->m_forecast->generate_pos_6($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 8){
				$probability_dec_id = $this->m_forecast->generate_pos_7($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 9){
				$probability_dec_id = $this->m_forecast->generate_pos_8($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 2){
				$probability_dec_id = $this->m_forecast->generate_pos_9($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 10){
				$probability_dec_id = $this->m_forecast->generate_pos_10($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 11){
				$probability_dec_id = $this->m_forecast->generate_pos_11($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 12){
				$probability_dec_id = $this->m_forecast->generate_pos_12($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 13){
				$probability_dec_id = $this->m_forecast->generate_pos_13($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 14){
				$probability_dec_id = $this->m_forecast->generate_pos_14($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 15){
				$probability_dec_id = $this->m_forecast->generate_pos_15($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 16){
				$probability_dec_id = $this->m_forecast->generate_pos_16($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 17){
				$probability_dec_id = $this->m_forecast->generate_pos_17($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 18){
				$probability_dec_id = $this->m_forecast->generate_pos_18($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 19){
				$probability_dec_id = $this->m_forecast->generate_pos_19($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 20){
				$probability_dec_id = $this->m_forecast->generate_pos_20($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 21){
				$probability_dec_id = $this->m_forecast->generate_pos_21($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 22){
				$probability_dec_id = $this->m_forecast->generate_pos_22($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 23){
				$probability_dec_id = $this->m_forecast->generate_pos_23($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 24){
				$probability_dec_id = $this->m_forecast->generate_pos_24($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 25){
				$probability_dec_id = $this->m_forecast->generate_pos_25($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
			}else if($pos_id['pos_id'] == 26){
				$probability_dec_id = $this->m_forecast->generate_pos_26($usr_id);
				$data['probability'] = @$this->m_port_decoration->get_dec_by_id($probability_dec_id)[0];
				$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
				$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
				
				
			}
			
			$dec = @$this->m_forecast->get_dec_by_id($usr_id)[0];
			$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec['dec_id'])[0];
			$data['current_insignia']['sign_date'] = @$dec['sign_date'];
			
			if($data['probability']['pos_year']) {
				if(!@$dec['sign_date']){
					$dec['sign_date'] = $pos_id['usr_dateforwork'];
				}
					
				$data['probability']['pos_year'] = $data['probability']['pos_year'] + $dec['sign_date'];
			}
			//print_r($data);
			$data['usr_dateforwork'] = $pos_id['usr_dateforwork']+5;
			if(@$data['current_insignia']['sign_date']) {
				$data['usr_dateforwork'] = @$data['current_insignia']['sign_date']+5;				
			}			
			
			//$dec_id = @$this->m_forecast->get_dec_by_id($usr_id)[0]['dec_id'];
			//$data['current_insignia'] = @$this->m_port_decoration->get_dec_by_id($dec_id)[0];
			echo json_encode($data);
			
		}

}