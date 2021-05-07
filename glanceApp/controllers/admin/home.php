<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
	
		$data['title'] = SITE_NAME.': Login';
		$data['msg'] = '';
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|secure');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|secure');
		
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/home_view', $data);
			return;
		}
		
		$password = md5($this->input->post('password'));
		
		$userRow = $this->admin_model->authenticate_admin($this->input->post('username'), $password);

		if(!$userRow){
			$data['msg'] = 'Wrong username or password provided';
			$this->load->view('admin/home_view', $data);
			return;
		}
			
		$admin_data = array(
				'admin_id' => $userRow->id,
				 'admin_name' => $userRow->admin_name,
				 'is_admin_login' => TRUE);
		$this->session->set_userdata($admin_data);
		
		redirect(base_url().'admin/dashboard','');		
	}	
		
	public function logout() {
						
		$user_data = array(
		 'admin_id' => '',
		 'admin_name' => '',
		 'is_admin_login' => FALSE);
		  
		$this->session->set_userdata($user_data);
		$this->session->unset_userdata($user_data);
		redirect(base_url(), 'refresh'); 
	}
	
	public function setting() {
		
	
	if(!$this->session->userdata('is_admin_login')){
			redirect(base_url().'admin');
			exit;
		}
		

		$setting_details = $this->admin_model->get_settings(50, 0);
		
		$data['setting_details']= $setting_details;
		$data['title'] = SITE_NAME.': Settings';
		$this->load->view('admin/settings', $data);
		return;
	
	}
	
	public function update_settings() {
	
	if(!$this->session->userdata('is_admin_login')){
			redirect(base_url().'admin');
			exit;
		}
		
		$google_api = $this->input->post('google_api');
		$setting_id = $this->input->post('setting_id');
		
		$data_array = array('google_api' => $google_api);
		$this->admin_model->update_settings($setting_id, $data_array);
		$this->session->set_flashdata('msg', 'Updated Successfully.');
		
		redirect(base_url()."admin/home/setting");
		
	
	}
	
	public function update_pass() {
		
		if(!$this->session->userdata('is_admin_login')){
			redirect(base_url().'admin');
			exit;
		}
		$data['msg']='';
		$this->form_validation->set_rules('change_password', 'password', 'trim|required|secure|min_length[5]');
		$this->form_validation->set_rules('confirm_password', 'confirm password', 'trim|required|secure|matches[change_password]');

		if ($this->form_validation->run() === FALSE) 
		{
			$this->load->view('admin/edit_admin_view', $data);
			return;
		}
		
		$password = md5($this->input->post('change_password'));
		$data_array = array('admin_password' => $password);
		$this->admin_model->update_records($this->session->userdata('admin_id'), $data_array);
		$this->session->set_flashdata('msg', 'Updated Successfully.');
		redirect(base_url()."admin/home/update_pass");
	}
	
	//service code
	public function service() {
		

		if(!$this->session->userdata('is_admin_login')){
			redirect(base_url().'admin');
			exit;
		}
		
		$service_details = $this->service_model->get_all_service(50, 0);
		
		$data['service_details']= $service_details;
		$data['title'] = SITE_NAME.': Service';
		$this->load->view('admin/service', $data);
		return;
		
		
	}
	public function add_service() {
	
		if(!$this->session->userdata('is_admin_login')){
			redirect(base_url().'admin');
			exit;
		}
		if(!empty($this->input->post()))
		{
		$service_array = array(
								'service' 		=> $this->input->post('service'),
								'service_order' => $this->input->post('service_order'),
								'status' 		=> $this->input->post('status'),
								'created_by'	=> strtotime(date('Y-m-d H:i:s'))
								);
		
		
		$this->service_model->add_service($service_array);
		$this->session->set_flashdata('msg', 'add service Successfully.');
		redirect(base_url()."admin/home/add_service");
		}		
		
		
		$data['title'] = SITE_NAME.': AddService';
		$this->load->view('admin/add_service', $data);
		return;
	}
	
	public function edit_service($id) {
	
		if(!$this->session->userdata('is_admin_login')){
			redirect(base_url().'admin');
			exit;
		}
		
		
		$service_array=$this->service_model->get_service_username_by_id($id);

		$data['service_array']	=$service_array;
		$data['title'] = SITE_NAME.': EditService';

		$this->load->view('admin/edit_service', $data);
		return;
	}
	
	public function upadate_service() {
	
		if(!$this->session->userdata('is_admin_login')){
			redirect(base_url().'admin');
			exit;
		}

	if(!empty($this->input->post()))
		{
		$service_id =$this->input->post('service_id');

		$service_array = array(
								'service' => $this->input->post('service'),
								'service_order' => $this->input->post('service_order'),
								'status' => $this->input->post('status'),
								'created_by' => strtotime(date('Y-m-d H:i:s'))
								);
		
		
		$this->service_model->update_service($service_id,$service_array);
		$this->session->set_flashdata('msg', 'update service Successfully.');
		redirect(base_url()."admin/home/service");
		}		

		
		}
		public function delete_service($id) {
	
		if(!$this->session->userdata('is_admin_login')){
			redirect(base_url().'admin');
			exit;
		}
		
		$subservice="service_id";
		$this->subservice_model->delete_subservice($id,$subservice);
		$this->service_model->delete_service($id);
		$this->session->set_flashdata('msg', 'Delete service Successfully.');
		redirect(base_url()."admin/home/service");

}






//subservice code subservice
	public function subservice() {
        
	if(!$this->session->userdata('is_admin_login')){
			redirect(base_url().'admin');
			exit;
		}
		
		$subservice_details = $this->subservice_model->get_all_subservice(50, 0);
		
		$data['subservice_details']= $subservice_details;
		$data['title'] = SITE_NAME.': Subservice';
		$this->load->view('admin/subservice', $data);
		return;	
		
	}
	

	public function add_subservice() {
	
		if(!$this->session->userdata('is_admin_login')){
			redirect(base_url().'admin');
			exit;
		}
		if(!empty($this->input->post()))
		{
		$subservice_array = array(
								
								'service_id' => $this->input->post('service_id'),
								'subservice' => $this->input->post('subservice'),
								'created_by' => strtotime(date('Y-m-d H:i:s'))
								);
		
		
		$this->subservice_model->add_subservice($subservice_array);
		$this->session->set_flashdata('msg', 'add subservice Successfully.');
		redirect(base_url()."admin/home/subservice");
		}		
		$service =$this->service_model->get_all_service(50, 0);
		$data['services'] =$service;
		$data['title'] = SITE_NAME.': Addsubservice';
		$this->load->view('admin/add_subservice', $data);
		return;
	}	



	public function edit_subservice($id) {
	
		if(!$this->session->userdata('is_admin_login')){
			redirect(base_url().'admin');
			exit;
		}
			
		$subservice_array=$this->subservice_model->get_subservice_username_by_id($id);
		$service =$this->service_model->get_all_service(50, 0);
		$data['services'] =$service;
		$data['subservice_array']	=$subservice_array;
		$data['title'] = SITE_NAME.': EditSubservice';

		$this->load->view('admin/edit_Subservice', $data);
		return;
		
		
	}

public function upadate_subservice() {
	
		if(!$this->session->userdata('is_admin_login')){
			redirect(base_url().'admin');
			exit;
		}

if(!empty($this->input->post()))
		{
		$subservice_id =$this->input->post('subservice_id');

		$subservice_array = array(
								'service_id' => $this->input->post('service_id'),
								'subservice' => $this->input->post('subservice'),
								'created_by' => strtotime(date('Y-m-d H:i:s'))
								);
		
		
		$this->subservice_model->update_subservice($subservice_id,$subservice_array);
		$this->session->set_flashdata('msg', 'update service Successfully.');
		redirect(base_url()."admin/home/subservice");
		}		

		
		}



public function delete_subservice($id) {
	
		if(!$this->session->userdata('is_admin_login')){
			redirect(base_url().'admin');
			exit;
		}
		$subservice_id="id";
		$this->subservice_model->delete_subservice($id,$subservice_id);
		$this->session->set_flashdata('msg', 'Delete subservice Successfully.');
		redirect(base_url()."admin/home/subservice");

}




	
}
