<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Searchfriend extends CI_Controller {

	public function index()
	{
		$form_get_argument =$this->input->get('search');
		$subservices	   =$this->input->get('subservices'); 
		$countrys	   	   =$this->input->get('country'); 

			
			
		if(isset($countrys))
		{
			$country=$countrys;
		}	
		if(isset($subservices))
		{
			$subservice_id=$subservices;
		}
		if($form_get_argument =='new')
		{
			$fields="created_by";
		}

		if($form_get_argument =='verified')
		{
			$verified="1";
		}

		if($form_get_argument =='male')
		{
			$lookingFor="male";
		}
		if($form_get_argument =='female')
		{
			$lookingFor="female";
		}
		if($form_get_argument =='Transsexual')
		{
			$lookingFor="Transsexual";
		}
		
		
		//$this->form_validation->set_rules('search', 'Search', 'trim|required|secure');
		
		//if ($this->form_validation->run() === FALSE) {
			if(!empty($this->input->post())){
				

			$lookingFor  	             = $this->input->post('gender');
			$age_frm	 	             = $this->input->post('age_frm');
			$age_to 	 	 			 = $this->input->post('age_to');
			$one_hour_min_price	 	 	 = $this->input->post('one_hour_min_price');
			$one_hour_max_price 	 	 = $this->input->post('one_hour_max_price');
			$two_hour_min_price	 	 	 = $this->input->post('two_hour_min_price');
			$two_hour_max_price 	 	 = $this->input->post('two_hour_max_price');
			$weight_min 	 			 = $this->input->post('weight_min');
			$weight_max 	 			 = $this->input->post('weight_max');
			$height_min 	 			 = $this->input->post('height_min');
			$height_max 	 			 = $this->input->post('height_max');
			$breast_size 	 			 = $this->input->post('breast_size');
			$hair_color	 	 			 = $this->input->post('hair_color');
			$country 	 	 			 = $this->input->post('country');
			$subservice_id				 = $subservice_id;
			$params						 = array('order_by'				=>"",
												 'verified_user'		=> $verified,
												 'gender'				=> $lookingFor,
												 'member_subservice_id' => $subservice_id,
												 'one_hour_max_price'	=> $one_hour_max_price,
												 'one_hour_min_price' 	=> $one_hour_min_price,
												 'two_hour_max_price'	=> $two_hour_max_price,
												 'two_hour_min_price' 	=> $two_hour_min_price,
												 'weight_min'			=> $weight_min,
												 'weight_max'			=> $weight_max,
												 'height_min'			=> $height_min,
												 'height_max'			=> $height_max,
												 'breast_size'			=> $breast_size,
												 'hair_color'			=> $hair_color,
												 'country'				=> $country,
												 'subservice_id'		=> $subservice_id
												 );
			$search_row = $this->member_model->getMembersall($params);
			
			$data['lookingFor']	= (!empty($this->input->post('lookingFor')))?$this->input->post('lookingFor'):"";
			$data['one_hour_min_price']	= (!empty($this->input->post('one_hour_min_price')))?$this->input->post('one_hour_min_price'):"";
			$data['one_hour_max_price']	= (!empty($this->input->post('one_hour_max_price')))?$this->input->post('one_hour_max_price'):"";
			$data['two_hour_min_price']	= (!empty($this->input->post('two_hour_min_price')))?$this->input->post('two_hour_min_price'):"";
			$data['two_hour_max_price']	= (!empty($this->input->post('two_hour_max_price')))?$this->input->post('two_hour_max_price'):"";

			$data['postdata']   = $this->input->post();
			$data['search_row'] = $search_row;
			$data['country']	= $country;
			$data['fields']		= $form_get_argument;
			$data['subservice_id'] =$subservices;
			$data['services']	=$this->service_model->get_all_profiles(50,0);
			$data['title'] = 'Search Profiles';

			$this->load->view('search_profile_view',$data);
			return;
			
		}
			if(!empty($this->input->get()))
			{
			$age_frm	 	             = "";
			$age_to 	 	 			 = "";
			$one_hour_min_price	 	 	 = "";
			$one_hour_max_price 	 	 = "";
			$two_hour_min_price	 	 	 = "";
			$two_hour_max_price 	 	 = "";
			$weight_min 	 			 = "";
			$weight_max 	 			 = "";
			$height_min 	 			 = "";
			$height_max 	 			 = "";
			$breast_size 	 			 = "";
			$hair_color	 	 			 = "";
			$country 	 	 			 = $country;

			$params						 = array('order_by'=>"",'verified_user'=>$verified,'gender'=>$lookingFor,
												'member_subservice_id'=>$subservice_id,'country'=>$country);
			$search_row 				 = $this->member_model->getMembersall($params);
			
			// echo $this->db->last_query();exit;
			$data['search_row'] = $search_row;

			}


			
			$data['fields']		= $form_get_argument;
			$data['subservice_id'] =$subservices;
			$data['country']	= $country;
			$data['services']	=$this->service_model->get_all_profiles(50,0);
			$data['title'] = 'Search Profiles';

			$this->load->view('search_profile_view',$data);
			return;
		//}
		
	}
}
