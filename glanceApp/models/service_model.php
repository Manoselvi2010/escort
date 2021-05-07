<?php
class Service_Model extends CI_Model {
    public function __construct() {
       // parent::__construct();
	   $this->load->database();
    }
    
	public function add_service($data){
 
            $return = $this->db->insert('service', $data);
            if ((bool) $return === TRUE) {
                return $this->db->insert_id();
            } else {
                return $return;
            }       
			
	}	
	
	public function update_service($id,$data){
		$this->db->where('id', $id);
		$return=$this->db->update('service', $data);
		return $return;
		
	}
	
	
	public function get_service_details_by_id($id){
		/*$this->db->select('service.*, FLOOR(DATEDIFF (NOW(), dob)/365) AS mAge');
        $this->db->from('service');
		$this->db->where("id", $id);
        $Q = $this->db->get();*/
		
		$Q = $this->db->query("SELECT *, FLOOR(DATEDIFF (NOW(), dob)/365) AS mAge
							   FROM service
							   WHERE id = '".mysqli_real_escape_string($id)."'");
		
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	public function record_count($tablename,$where=''){
	
		if($where!='')
			$this->db->where($where);
		$this->db->from($tablename);
		return $this->db->count_all_results();
	}
	
	public function record_count_new($tablename,$where=''){
		$sql = "SELECT COUNT(*) AS totalrec FROM $tablename $where";
		$Q = $this->db->query($sql);
        return $Q->row('totalrec');

	}
	
	public function get_all_service($limit, $start){
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('service');
		$this->db->order_by("id", 'DESC');
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	
	
	
	public function get_service_username_by_id($id){
		$this->db->select('*');
		$this->db->from('service');
		$this->db->where("id", $id);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
       
        return $return;

	}
	
	public function get_all_profiles(){
		$this->db->select('*');
		$this->db->from('service');
		$this->db->order_by('service_order', 'ASC');
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	public function delete_service($id){
		$Q = $this->db->query("Delete FROM `service` WHERE id = '".$id."'");
		$x = $this->db->query("Delete FROM `subservice` WHERE service_id = '".$id."'");
        $return = 1;
        return $return;
		
	}
	
	
	
}
?>