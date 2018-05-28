<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_admin_pro_insignia extends Port_core {
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
		$this->load->model('m_forecast_future');
		$this->load->model('m_port_decoration');
		$this->load->model('m_port_insignia');
		$this->load->model('m_port_user');



		$data['result'] = $this->m_forecast_future->gets();
		//print_r($data);

		foreach($data['result'] as $i => $row){

			$data['redult'][$i] = $this->get_Probability($row['usr_id']);
			$data['redult'][$i]['person'] = $row;
			
		}
		

		
	
		// print_r($data['redult']);
		$this->output_admin('Insignia Probability','v_admin_pro_insignia', $data);
		
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
			
			//print_r($data);
			
			$data['info'] = @$this->m_port_insignia->get_by_usr_id_Desc($usr_id)[0];
			// echo json_encode($data);

			return @$data;
			
		}

}