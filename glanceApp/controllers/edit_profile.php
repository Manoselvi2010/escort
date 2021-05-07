<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_Profile extends CI_Controller {
	
	public function index()
	{
	
		if($this->session->userdata('username')==''){
			redirect(base_url().'user/login');
			exit;
		}
		
		$profile_row = $this->member_model->get_member_by_username($this->session->userdata('username'));
		$data['row'] = $profile_row;
		$this->form_validation->set_rules('name', 'Name', 'trim|required|secure');
		
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required|secure');
		
		$this->form_validation->set_rules('phone_number', 'Phone', 'trim|secure|numeric');
		
		$this->form_validation->set_rules('country', 'country', 'trim|secure');	
		
		$this->form_validation->set_rules('about_me', 'about_me', 'trim|secure');	
	
		if ($this->form_validation->run() === FALSE) {
			$data['title'] = SITE_NAME.': '.$this->session->userdata('name');
			$data['services'] =$this->service_model->get_all_profiles(50,0);

			$this->load->view('profile_edit',$data);
			return;
		}
		
		$member_language_array =$this->input->post('member_language');
		$member_language="";
		foreach($member_language_array as $member_lang){
		$member_language .=$member_lang;
		$member_language .=',';
		}
		$subservice_arrays =$this->input->post('subservices');
		
		$service_subserivce_arrays=array();
		foreach($subservice_arrays as $key=>$subservice_array){
			
			$service_expolde_array  				= explode('-',$subservice_array);

			$service_id								= $service_expolde_array[0];
			$subservice_id							= $service_expolde_array[1];
			$service_subserivce_arrays[$service_id][$key]  = $subservice_id;


		}	
		
		$member_array = array(
						'name' 					=> $this->input->post('name'),
						'country'				=> $this->input->post('country'),
						'sexuality' 			=> $this->input->post('sexuality'),
						'phone_number' 			=> $this->input->post('phone_number'),
						'additional_number' 	=> $this->input->post('additional_number'),
						'phone_app' 			=> $this->input->post('phone_app'),
						'age' 					=> $this->input->post('age'),
						'height' 				=> $this->input->post('height'),
						'weight' 				=> $this->input->post('weight'),
						'clothes_size' 			=> $this->input->post('clothes_size'),
						'appearance' 			=> $this->input->post('appearance'),
						'chest_waist_hips'		=> $this->input->post('chest_waist_hips'),
						'breast_size' 			=> $this->input->post('breast_size'),
						'breast_type' 			=> $this->input->post('breast_type'),
						'hair_color' 			=> $this->input->post('hair_color'),
						'eyes_color'			=> $this->input->post('eyes_color'),
						'haircut'				=> $this->input->post('haircut'),
						'smoker' 				=> $this->input->post('smoker'),
						'member_language'		=> $member_language,
						'web_site'				=> $this->input->post('web_site'),
						'about_me' 				=> $this->input->post('about_me'),
						'one_hour_apartment'	=> $this->input->post('one_hour_apartment'),
						'two_hours_apartment' 	=> $this->input->post('two_hour_apartment'),
						'night_apartment'		=> $this->input->post('night_hour_apartment'),
						'in_appartment' 		=> $this->input->post('apartment'),
						'one_hour_outcall'		=> $this->input->post('one_hour_outcall'),
						'two_hours_outcall' 	=> $this->input->post('two_hour_outcall'),
						'night_outcall'			=> $this->input->post('night_hour_outcall'),
						'in_outcall' 			=> $this->input->post('outcall'),
								
		);
		$this->member_model->delete_member_service($this->session->userdata('member_id'));

			foreach($service_subserivce_arrays as $servicekey=>$service_subserivce_array)
		{
				foreach($service_subserivce_array as $service_subserivce)
				{

				$member_service_array = array(
								'member_service_id' =>$servicekey,
								'member_subservice_id'=>$service_subserivce,
								'member_id'	=>$this->session->userdata('member_id'),
								'created_by'=>strtotime(date('Y-m-d H:i:s'))
								);

					$this->member_model->add_member_service($member_service_array);
					}
				
			


		}


		
		if (!empty($_FILES['photo']['name'])){
			
			$config['upload_path'] = realpath(APPPATH . '../glancePublic/uploads/member_images/');
			$config['allowed_types'] = 'gif|jpg|png';
			$config['overwrite'] = true;
			$config['max_size'] = 12000;
			$config['file_name'] = $this->session->userdata('member_id').time();
			$this->upload->initialize($config);
			$real_path = realpath(APPPATH . '../glancePublic/uploads/member_images/');
			
			if ($this->upload->do_upload('photo')){
				if($profile_row->photo){
					@unlink($real_path.'/'.$profile_row->photo);	
					@unlink($real_path.'/thumb_'.$profile_row->photo);	
				}
			}
			
			$image = array('upload_data' => $this->upload->data());	
			$image_name = $image['upload_data']['file_name'];
						
			//Image resizing
			$objImg = new Simple_Image();
			$small_img = 'thumb_'.$image_name;
			$objImg->load($real_path.'/'.$image_name);						
			$objImg->resizeToHeight(80);
			$objImg->save($real_path.'/'.$small_img);
			$member_array['photo']=$image_name;
			$this->session->set_userdata('photo', $image_name);
		}
		
		//vertication photos

		if (!empty($_FILES['photo_vertification']['name'])){
			
			$config['upload_path'] = realpath(APPPATH . '../glancePublic/uploads/member_vertification_images/');
			$config['allowed_types'] = 'gif|jpg|png';
			$config['overwrite'] = true;
			$config['max_size'] = 12000;
			$config['file_name'] = $this->session->userdata('member_id').time();
			$this->upload->initialize($config);
			$real_path = realpath(APPPATH . '../glancePublic/uploads/member_images/');
			
			if ($this->upload->do_upload('photo_vertification')){
				if($profile_row->photo_vertification){
					@unlink($real_path.'/'.$profile_row->photo_vertification);	
					@unlink($real_path.'/thumb_'.$profile_row->photo_vertification);	
				}
			}
			
			$image = array('upload_data' => $this->upload->data());	
			$image_name = $image['upload_data']['file_name'];
						
			//Image resizing
			$objImg = new Simple_Image();
			$small_img = 'thumb_'.$image_name;
			$objImg->load($real_path.'/'.$image_name);						
			$objImg->resizeToHeight(80);
			$objImg->save($real_path.'/'.$small_img);
			$member_array['vertification_photos']=$image_name;
			$this->session->set_userdata('vertification_photos', $image_name);
		}
		



		$this->member_model->update_member($this->session->userdata('member_id'),$member_array);

		redirect(base_url().'profile/'.$this->session->userdata('username'));
	}
		
}
