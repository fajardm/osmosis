<?php
	Class language_m extends CI_Model{
        
        function getAll($limit1=0, $limit2=0){
			$this->db->select("*");
			$this->db->from("cms_language");
            $this->db->where("language_status",'active');
			$this->db->order_by("language_id","DESC");
			if($limit1!=0){
                $this->db->limit($limit1,$limit2);       
            }else if($limit2!=0){
                $this->db->limit(0,$limit2);   
            }
			
            if($hasil = $this->db->get()){
                if($hasil->num_rows() > 0){
                    $data = $hasil->result();
                }else{
                    $data = "0";   
                }
            }else{
                $data = $this->db->_error_message(); 
            }
			$hasil->free_result();
			return $data;			
		}
    }
?>