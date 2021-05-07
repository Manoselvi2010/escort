<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index(){
		if(!$this->session->userdata('is_admin_login')){
			redirect(base_url().'admin');
			exit;
		}
		$member_count = $this->admin_model->get_all_members();
		$first_date=date("Y-m-d 00:00:00");
		$second_date=date('Y-m-d 00:00:00', strtotime(' +1 day'));
		$today_registered_count = $this->admin_model->get_today_registered($first_date,$second_date);
		$registered_members = $this->admin_model->get_five_registered();
		
		$verified_user = $this->admin_model->get_all_verified_user();
		$data['title'] = SITE_NAME.': Dashboard';
		$data['msg'] = '';
		$data['member_count'] = $member_count;
		$data['today_registered_count'] = $today_registered_count;
		$data['verified_user'] = $verified_user;
		$data['registered_members'] = $registered_members;
		$this->load->view('admin/dashboard_view', $data);
		return;
	}
}
