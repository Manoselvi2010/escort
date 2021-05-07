<?php
class Subservice_Model extends CI_Model {
    public function __construct() {
       // parent::__construct();
	   $this->load->database();
    }
   

    public function add_subservice($data){
 
            $return = $this->db->insert('subservice', $data);
            if ((bool) $return === TRUE) {
                return $this->db->insert_id();
            } else {
                return $return;
            }       
			
	}

	public function update_subservice($id,$data){
		$this->db->where('ID', $id);
		$return=$this->db->update('subservice', $data);
		return $return;
		
	}	

public function get_all_subservice($limit, $start){
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('subservice');
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

	public function get_subservice_username_by_id($id){
		$this->db->select('*');
		$this->db->from('subservice');
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


	public function get_service_id($id){
		$this->db->select('*');
		$this->db->from('subservice');
		$this->db->where("service_id", $id);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
       
        return $return;

	}
	
public function delete_subservice($id,$fields){
		$Q = $this->db->query("Delete FROM `subservice` WHERE '".$fields."'= '".$id."'");

        $return = 1;
        return $return;
		
	}


	
}
?>