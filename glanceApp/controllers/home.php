<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	public function index()
	{
		$all_members_result = $this->member_model->get_all_member_front(20,0);
		$this->form_validation->set_rules('username', 'Username', 'trim|required|secure|alpha_numeric|min_length[5]|is_unique[member.username]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|secure|min_length[6]');
		$this->form_validation->set_rules('email', 'email', 'trim|required|secure|valid_email|is_unique[member.email]');
		
		/*$this->form_validation->set_rules('gender', 'Gender', 'trim|required|secure');
		$this->form_validation->set_rules('seeking_for', 'Seeking For', 'trim|required|secure');
		$this->form_validation->set_rules('birth_month', 'Birth Month', 'trim|required|secure');
		$this->form_validation->set_rules('birth_day', 'Birth Day', 'trim|required|secure');
		$this->form_validation->set_rules('birth_year', 'Birth Year', 'trim|required|secure');
		$this->form_validation->set_rules('country', 'Country', 'trim|required|secure'); */
		
		$content = $this->contact_model->getPageContent(5);
		$data['content'] = stripslashes($content->content);
		$content2= $this->contact_model->getPageContent(6);
		$data['content2'] = stripslashes($content2->content);
		
		$data['all_members_result'] = $all_members_result;
		if ($this->form_validation->run() === FALSE) {
			$data['title']= 'Welcome to the Online Dating Website';
			$this->load->view('home_view',$data);
			return;
		}
		
		$verification_code = md5($this->input->post('email').time());
		$password = md5(strip_tags($this->input->post('password')));
		
		$member_array = array(
								'username' => strip_tags($this->input->post('username')),
								'password' => $password,
								'email' => strip_tags($this->input->post('email')),
								'gender' => strip_tags($this->input->post('gender')),
								'looking_for' => strip_tags($this->input->post('seeking_for')),
								'dob' => $this->input->post('birth_year').'-'.$this->input->post('birth_month').'-'.$this->input->post('birth_day'),
								'dated' => date("Y-m-d H:i:s"),
								'verification_code' => $verification_code,
								'country' => strip_tags($this->input->post('country'))
		);


		$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
 
        $userIp=$this->input->ip_address();
     
        $secret = $this->config->item('google_secret');
   
        $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
         
        $status= json_decode($output, true);
 
        if ($status['success']) {
           
        
		$this->member_model->add_member($member_array);
		$row_email = $this->email_templates_model->get_record_by_id(9);
		$config = array();
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
	
		$this->email->initialize($config);
		$this->email->clear(TRUE);
		$this->email->from($row_email->from_email, $row_email->from_name);
		$this->email->to($this->input->post('email'));
		
		$this->email->subject($row_email->email_subject);
		$mail_message = $this->email_drafts_model->get_verification_email($row_email->email_content, $verification_code);
		$this->email->message($mail_message);					
		$this->email->send();
		redirect(base_url().'verification');
		}else{
			$data['title']= 'Welcome to the Online Dating Website';
			$this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
            $this->load->view('home_view',$data);
			return;
        }
	}
	
}