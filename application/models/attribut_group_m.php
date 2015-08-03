<?php
	Class attribut_group_m extends CI_Model{
        
        function getAll(){
			$this->db->select("*");
			$this->db->from("cms_attribut_group");
            $this->db->join("cms_attribut_group_description","cms_attribut_group_description.ag_id=cms_attribut_group.ag_id");
            $this->db->where("ag_status",'active');
            $this->db->where("language_id",'1');
			
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
        
        function createNew(){
            $data = array(
               'ag_status' => 'active',
            );
            if(!$this->db->insert('cms_attribut_group', $data)){
                return $this->db->_error_message();
            }else{
                $query = $this->db->query('SELECT LAST_INSERT_ID() from cms_attribut_group');
                $row = $query->row_array();
                return $row['LAST_INSERT_ID()'];
            }
        }
        
        function getOne($id=''){
			$this->db->select("*");
			$this->db->from("cms_attribut_group ag");
            $this->db->join("cms_attribut_group_description agd","ag.ag_id=agd.ag_id");
            $this->db->join("cms_language lg","agd.language_id=lg.language_id");
			$this->db->where("ag.ag_id",$id);
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
        
        function delete($id){
            $data = array(
                'ag_status' => 'inactive'
            );
            $this->db->Where('ag_id',$id);
            if($this->db->update('cms_attribut_group', $data)){
                return true;
            }else{
                return $this->db->_error_message();
            }
        }
    }
?>