<?php
class Admin_Model extends CI_Model {
    public function __construct() {
       // parent::__construct();
	   $this->load->database();
    }
    
	public function authenticate_admin($user_name, $password) {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('admin_username', $user_name);
	$this->db->where('admin_password', $password);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }
	
	public function update_records($id,$data){
		$this->db->where('ID', $id);
		$return=$this->db->update('admin', $data);
		return $return;
	}
	public function update_settings($id,$data){
		$this->db->where('ID', $id);
		$return=$this->db->update('settings', $data);
		return $return;
	}
	
	public function get_settings($per_page, $page) 
	{
		
        $this->db->select('*');
        $this->db->from('settings');
		//$this->db->order_by($this->primary_key, "DESC"); 
		$this->db->limit($per_page, $page);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }
	public function add($data)
	{
            $return = $this->db->insert('settings', $data);
            if ((bool) $return === TRUE) {
                return $this->db->insert_id();
            } else {
                return $return;
            }   
	}	
	
	public function update($id, $data)
	{
		$this->db->where('ID', $id);
		$return=$this->db->update('settings', $data);
		return $return;
	}
    function get_all_members() {    
      $this->db->from('member');
      return $num_rows = $this->db->count_all_results();
    }
    public function get_today_registered($first_date,$second_date){
        $this->db->from('member');
        $this->db->where('dated >=', $first_date);
        $this->db->where('dated <=', $second_date);
        return $num_rows = $this->db->count_all_results();
    }
    public function get_all_verified_user(){
        $this->db->from('member');
        $this->db->where('verified_user', 1);
        return $num_rows = $this->db->count_all_results();
    }
    public function get_five_registered(){
        $Q = $this->db->query("SELECT *
                               FROM member
                               ORDER BY id DESC LIMIT 5");
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }
}
?>
