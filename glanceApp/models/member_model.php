<?php
class Member_Model extends CI_Model {
    public function __construct() {
       // parent::__construct();
	   $this->load->database();
    }
    
	public function add_member($data){
  
            $return = $this->db->insert('member', $data);
            if ((bool) $return === TRUE) {
                return $this->db->insert_id();
            } else {
                return $return;
            }       
			
	}	
	
	public function update_member($id,$data){
		$this->db->where('id', $id);
		$return=$this->db->update('member', $data);
		return $return;
		
	}
	
	public function authenticate_member($user_name, $password) {
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('username', $user_name);
		$this->db->where('password', $password);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }
	
	public function authenticate_by_verification_code($vcode) {
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('verification_code', $vcode);
		$this->db->where('sts =', 'inactive');
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }
    
    public function authenticate_by_verification_code2($vcode) {
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('verification_code', $vcode);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }
	
	public function get_member_details_by_id($id){
		/*$this->db->select('member.*, FLOOR(DATEDIFF (NOW(), dob)/365) AS mAge');
        $this->db->from('member');
		$this->db->where("id", $id);
        $Q = $this->db->get();*/
		
		$Q = $this->db->query("SELECT *, FLOOR(DATEDIFF (NOW(), dob)/365) AS mAge
							   FROM member
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
	
	public function get_all_member($limit, $start){
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('member');
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
	
	public function get_all_member_front($limit, $start){
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('member');
		$this->db->where('sts','active');
		// $this->db->order_by("photo", 'DESC');
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
	
	
	public function is_username_already_exists($username){
		$this->db->select('member.username');
        $this->db->from('member');
		$this->db->where("username", $username);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	public function authenticate_member_by($field, $user_name) {
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where($field, $user_name);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }
	
	public function get_member_by_username($username){
		/*$this->db->select('*, FLOOR(DATEDIFF (NOW(), dob)/365) AS mAge');
		$this->db->from('member');
		$this->db->where("username", $username);
        $Q = $this->db->get();*/
		
		$Q = $this->db->query("SELECT *, FLOOR(DATEDIFF (NOW(), dob)/365) AS mAge
							   FROM member
							   WHERE username = '".$username."'");
		
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}

   function getMembersall($params=array())
    {   
    
    
            $fields = array(
                        'member.*',
                        'member_service.*',
                        //'vehicle.vehicle_name',
            );
                        
            $condition  = $join = $order = $limit =''; 
            
            $condition  = 1;
                        
            if(!empty($params['gender']))
            {
                $condition .= " AND member.gender = '".$params['gender']."'";
            }
            if(!empty($params['verified_user']))
            {
                $condition .= " AND member.verified_user = '".$params['verified_user']."'";
            }
            if(!empty($params['one_hour_min_price']) && !empty($params['one_hour_max_price']))
            {
                $condition .= " AND member.one_hour_apartment  between '".$params['one_hour_max_price']."' AND '".$parmas['one_hour_min_price']."'";
            }
            if(!empty($params['two_hour_min_price']) && !empty($params['two_hour_max_price']))
            {
                $condition .= " AND member.two_hours_apartment  between '".$params['two_hour_max_price']."' AND '".$parmas['two_hour_min_price']."'";
            }
            
            if(!empty($params['weight_min']) && !empty($params['weight_max']))
            {
            
                $condition .= " AND member.weight between '".$params['weight_min']."' AND '".$params['weight_max']."'";
            }
            if(($params['height_min'] !="") && ($params['height_max'] !=""))
            {
                
                $condition .= " AND member.height between '".$params['height_min']."' AND '".$params['height_max']."'";
            }
            if(!empty($params['breast_size']))
            {
                $condition .= " AND member.breast_size LIKE  '%".$params['breast_size']."%'";
            }
            if(!empty($params['hair_color']))
            {
                $condition .= " AND member.hair_color LIKE '%".$params['hair_color']."%'";
            }
            if(!empty($params['country']))
            {
                $condition .= " AND member.country LIKE '%".$params['country']."%'";
            }
            if(!empty($params['member_subservice_id']))
            {
                $condition .= " AND member_service.member_subservice_id = '".$params['member_subservice_id']."'";
                
            }
            $join="LEFT JOIN member_service ON  member_service.member_id=member.id";
            
            //$join="LEFT JOIN vehicle ON  vehicle.vehicle_id=offence.vehicle_id";      
                        
            if(!empty($params['order_by']))
            {
                $order      = " ORDER BY ".$params['order_by']." ";
            }
            else
            {
                $order      = " ORDER BY member.id DESC ";
            }
            
                $Group      = " Group BY member.id";
            
            
            //Limit
            if(!empty($params['per_page']))
            {
                $per_page   = $params['per_page'];
                if(empty($params['position']))
                {
                    $offset     = 0;
                }
                else
                {
                    $offset     = $params['position'];
                }   
            
                $limit      = "LIMIT ".$offset.",".$per_page;
            }
          
            $result = $this->db->query("SELECT ".implode(',',$fields)." FROM member ".$join." WHERE ".$condition." ".$Group."".$order." ".$limit);
            //echo $this->db->last_query();exit;
            return $result->result();
            
            
    }
    
    
    

	public function get_member_service($member_id){
        $Q = $this->db->query("SELECT *
                               FROM member_service
                               WHERE member_id = '".$member_id."' GROUP BY `member_service_id`");
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }
	public function get_profile_service(){
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
    public function get_profile_sub_service($service_id){
        $this->db->select('*');
        $this->db->from('subservice');
        $this->db->where("service_id", $service_id);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
       
        return $return;
    }
    public function get_member_city($city,$member_id){
        $Q = $this->db->query("SELECT * FROM `member` WHERE city LIKE '%".$city."%' AND  id !='".$member_id."' ORDER BY id DESC LIMIT 6");
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {

            $return = 0;
        }
        $Q->free_result();
        return $return;
    }
	public function get_member_id_by_username($username){
		$this->db->select('id');
		$this->db->from('member');
		$this->db->where("username", $username);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	public function get_member_details_by_ids_array($idArray){
		
		$ids = '';
		foreach($idArray as $id) {
			
			$ids .= $id.",";
			
		}
		
		$ids = rtrim(trim($ids),',');
		
		$Q = $this->db->query("SELECT name, gender, city, dob, photo, username, FLOOR(DATEDIFF (NOW(), dob)/365) AS mAge
							   FROM member
							   WHERE id IN (".$ids.")
							   ORDER BY name ASC");
        
		if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	public function search_member($search) {
		//$this->db->limit($limit, $start);
		
		$Q = $this->db->query("SELECT *, FLOOR(DATEDIFF (NOW(), dob)/365) AS mAge FROM `member` WHERE TRIM(CONCAT(`name`,' ',username,' ',city,country)) LIKE '%".$search."%'");
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	public function search_member_advance($lookingFor,$fields,$verified,$age_frm, $age_to, $country,$subservice_id,$one_hour_min_price,$one_hour_max_price,$two_hour_min_price,$two_hour_max_price,$weight_min,$weight_max,$height_min,$height_max,$breast_size,$hair_color) {
		//$this->db->limit($limit, $start);
		$where = '';
		$final_where='';

		if($lookingFor)
			$where.="gender = '".$lookingFor."' AND";
		if($verified)
			$where.=" verified_user = '".$verified."' AND";
		if($age_frm && $age_to)
			$where.=" age between '".$age_frm."' AND '".$age_to."' AND";

		if($one_hour_min_price && $one_hour_max_price)
			$where.=" one_hour_apartment between '".$one_hour_min_price."' AND '".$one_hour_max_price."' AND";

		   
		if($two_hour_min_price && $two_hour_max_price)
			$where.=" two_hours_apartment between '".$two_hour_min_price."' AND '".$two_hour_min_price."' AND";
		
		if($weight_min && $weight_max)
			$where.=" weight between '".$weight_min."' AND '".$weight_max."' AND";
		if($height_min && $height_max)
			$where.=" height between '".$height_min."' AND '".$height_max."' AND";
		if($breast_size)
			$where.=" breast_size LIKE '%".$breast_size."%' AND";
		if($hair_color)
			$where.=" hair_color LIKE '%".$hair_color."%' AND";
		if($country)
			$where.=" country LIKE '%".$country."%' AND";
			
		if($fields)
			$order_by .="ORDER BY ".$fields." ASC";
		$where = rtrim($where, 'AND');
		//($where!='')
		//final_where = " where sts='Active'  ".$where;
		if($subservice_id!='')
			$join="member_serive on where member.ID=member_service.member_id";

		// $Q = $this->db->query("select *  from 'member' ".$final_where."LEFTJOIN".$join.$order_by);
	
		$Q = $this->db->query("SELECT * FROM `member`");



        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	public function get_member_username_by_id($id){
		$this->db->select('username');
		$this->db->from('member');
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
		$this->db->from('member');
		$this->db->order_by("dated", 'DESC');
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	public function delete_member($id){
		$Q = $this->db->query("Delete FROM `member` WHERE id = '".$id."'");
        $return = 1;
        return $return;
		
	}
	
	public function search_member_name($search) {
		//$this->db->limit($limit, $start);
		
		$Q = $this->db->query("SELECT * FROM `member` WHERE name LIKE '%".$search."%'");
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	public function search_member_email($search) {
		//$this->db->limit($limit, $start);
		
		$Q = $this->db->query("SELECT * FROM `member` WHERE email LIKE '%".$search."%'");
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	public function search_member_location($search) {
		//$this->db->limit($limit, $start);
		
		$Q = $this->db->query("SELECT * FROM `member` WHERE TRIM(CONCAT(country,' ',city)) LIKE '%".$search."%'");
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	public function get_member_name_by_id($id){
		$Q = $this->db->query("SELECT name
							   FROM member
							   WHERE id = '".$id."'");
		
        if ($Q->num_rows > 0) {
            $row = $Q->row();
			$return = $row->name;
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	public function update_member_privacy($id,$data){
		$this->db->where('mem_id', $id);
		$return=$this->db->update('privacy_settings', $data);
		return $return;
		
	}
	
	public function add_member_privacy($data) {
		
		$return = $this->db->insert('privacy_settings', $data);
		if ((bool) $return === TRUE) {
			return $this->db->insert_id();
		} else {
			return $return;
		}  
		
	}
	
	public function delete_member_privacy($id){
		$Q = $this->db->query("Delete FROM `privacy_settings` WHERE mem_id = '".$id."'");
        $return = 1;
        return $return;
		
	}
	
	public function get_member_privacy_by_mem_id($id){
		
		$Q = $this->db->query("SELECT *
							   FROM privacy_settings
							   WHERE mem_id = '".$id."'");
		
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	
	}
	
	public function get_near_located_member($city){
		/*$this->db->select('*, FLOOR(DATEDIFF (NOW(), dob)/365) AS mAge');
		$this->db->from('member');
		$this->db->where("username", $username);
        $Q = $this->db->get();*/
		
		$Q = $this->db->query("SELECT *, FLOOR(DATEDIFF (NOW(), dob)/365) AS mAge
							   FROM member
							   WHERE LOWER(city) = '".strtolower($city)."'");
		
        if ($Q->num_rows > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}
	
	
	public function get_member_by_email($email){
		$Q = $this->db->query("SELECT verification_code FROM member WHERE email = '".$email."'");
		
        if ($Q->num_rows > 0) {
            $return = $Q->row('verification_code');
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
	}


	public function add_member_service($data){
  
            $return = $this->db->insert('member_service', $data);
            if ((bool) $return === TRUE) {
                return $this->db->insert_id();
            } else {
                return $return;
            }       
			
	}	

public function delete_member_service($id){
		$Q = $this->db->query("Delete FROM `member_service` WHERE member_id = '".$id."'");
        $return = 1;
        return $return;
		
	}


	public function is_service_already_exists($member_id,$service_id,$subservice_id){
		$this->db->select('*');
        $this->db->from('member_service');
		$this->db->where("member_id", $member_id);
		$this->db->where("member_service_id", $service_id);
		$this->db->where("member_subservice_id", $subservice_id);
        $Q = $this->db->get();
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