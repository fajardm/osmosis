<?php
	Class attribut_description_m extends CI_Model{
        
        function getAll($limit1=0, $limit2=0){
			$this->db->select("*");
			$this->db->from("cms_attribut_group");
            $this->db->join("cms_attribut_group_description","cms_attribut_group_description.ag_id=cms_attribut_group.ag_id");
            $this->db->where("ag_status",'active');
			$this->db->order_by("cms_attribut_group_description.ag_name","DESC");
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
        
        function createNew($id,$name,$lg){
            $data = array(
                'attribut_id' => $id,
                'attribut_name' => $name,
                'language_id' => $lg
            );
            if($this->db->insert('cms_attribut_description', $data)){
                return true;
            }else{
                return $this->db->_error_message();
            }
        }
        
        function getOne($id=''){
			$this->db->select("*");
			$this->db->from("cms_attribut_description");
            $this->db->join("cms_language","cms_attribut_description.language_id=cms_language.language_id");
			$this->db->where("cms_attribut_description.attribut_id",$id);
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
        
        function update($id,$name,$lg){
            $data = array(
                'attribut_name' => $name,
            );
            $this->db->Where('attribut_id',$id);
            $this->db->Where('language_id',$lg);
            if($this->db->update('cms_attribut_description', $data)){
                return true;
            }else{
                return $this->db->_error_message();
            }
        }
        
        function delete($id){
            $data = array(
                'agd_status' => 'inactive'
            );
            $this->db->Where('agd_id',$id);
            if($this->db->update('cms_attribut_group_description', $data)){
                return true;
            }else{
                return $this->db->_error_message();
            }
        }
    }
?>