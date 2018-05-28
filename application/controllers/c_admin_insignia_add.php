<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_admin_insignia_add extends Port_core {


		public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('dec_name','ชื่อเครื่องราช','trim|required|xss_clean');
		$this->form_validation->set_rules('dec_abb','ชื่อย่อ','trim|required|xss_clean');
		$this->form_validation->set_rules('pos_year','ระยะเวลที่จะได้รับ','trim|required|xss_clean');
		
		

		if ($this->form_validation->run() == true){



			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_decoration','dec');
			
	
			
		
			$this->dec->dec_name = $this->input->post('dec_name');
			$this->dec->dec_abb = $this->input->post('dec_abb');
			$this->dec->pos_year = $this->input->post('pos_year');
			
		


			$this->port->trans_begin();
			$this->dec->insert_data();


			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_admin_insignia_add");
		}else{
			$this->load->model('m_port_decoration','dec');
			$data['dec'] = $this->dec->getAll();

			
			
	
			$this->output_admin('insignia of Instruction','v_admin_insignia_add', $data);
		}
	}


	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('dec_name','ชื่อเครื่องราช','trim|required|xss_clean');
		$this->form_validation->set_rules('dec_abb','ชื่อย่อ','trim|required|xss_clean');
		$this->form_validation->set_rules('pos_year','ระยะเวลที่จะได้รับ','trim|required|xss_clean');
		
	
	
		

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->load->model('m_port_decoration','dec');
			
			
			
			$this->dec->dec_id = $this->input->post('dec_id');
			$this->dec->dec_name = $this->input->post('dec_name');
			$this->dec->dec_abb = $this->input->post('dec_abb');
			$this->dec->pos_year = $this->input->post('pos_year');
			
			
			$this->port->trans_begin();
			$this->sign->update();

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
			$result['dec_id'] = form_error('dec_id');
			$result['dec_name'] = form_error('dec_name');
			$result['dec_abb'] = form_error('dec_abb');
			$result['pos_year'] = form_error('pos_year');
			
		
			$result['message'] = 'fail';
			echo json_encode($result);
		}
		
		redirect('c_admin_insignia_add');
	}
function delete()
	{
		$this->load->model('m_port_decoration','dec');
		$this->dec->dec_id = $this->input->post('dec_id');
		$delete = $this->dec->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_admin_insignia_add");
	}



	public function get(){
		$this->load->model('m_port_decoration','dec');
		$name = $this->input->post('dec_id');
		$dec = $this->dec->go($name);
		
		
		
		
		
		foreach ($dec as $value) { 

				echo '<div class="form-group">
		<input type="hidden" class="form-coutrol" id="editId" name="dec_id" value="'.$value['dec_id'].'"/>
		
			
               <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="ชื่อเครื่องราชทาน">ชื่อเครื่องราชทาน <small class="error dec_name"></small></label>
                                    <input type="text" class="form-control" id="dec_name" 
                                    name="dec_name" value="'.$value['dec_name'].'" placeholder="ใส่ชื่อเครื่องราชทาน">
                                </div>
                            </div>
                        </div>                    
                <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="ชื่อตัวย่อ">ชื่อตัวย่อ <small class="error dec_abb"></small></label>
                                    <input type="text" class="form-control" id="dec_abb" 
                                    name="dec_abb" value="'.$value['dec_abb'].'" placeholder="ใส่ชื่อตัวย่อ">
                                </div>
                            </div>
                        </div>
            <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="ระยะเวลาที่ได้รับ">ชื่อตัวย่อ <small class="error pos_year"></small></label>
                                    <input type="text" class="form-control" id="pos_year" 
                                    name="pos_year" value="'.$value['pos_year'].'" placeholder="ใส่จำนวนปี">
                                </div>
                            </div>
                        </div>
            
						

				
						

				</div>';				

			
		}

    }


}