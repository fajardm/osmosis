
<?php
	Class category_description_m extends CI_Model{
        
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
        
        function createNew($id,$lg_init,$lg){
            $data = array(
                'category_id' => $id,
                'language_id' => $lg,
                'category_name' => $this->input->post('category_name_'.$lg_init),
                'category_meta_description' => $this->input->post('category_meta_description_'.$lg_init),
                'category_meta_keyword' => $this->input->post('category_meta_keyword_'.$lg_init),
                'category_content' => $this->input->post('category_content_'.$lg_init),
            );
            if($this->db->insert('cms_category_description', $data)){
                return true;
            }else{
                return $this->db->_error_message();
            }
        }
        
        function getOne($id=''){
			$hasil= $this->db->query("SELECT * FROM `cms_category_description` cd left Join cms_category c on cd.`category_id`=c.`category_id` left Join cms_language lg on lg.`language_id`=cd.`language_id` where c.`category_id`=".$id);
            
            if($hasil->num_rows() > 0){
                $data = $hasil->result();
            }else{
                $data = "0";   
            }
            
			$hasil->free_result();
			return $data;			
		}
        
        function update($lg_init){
            $data = array(
                'category_name' => $this->input->post('category_name_'.$lg_init),
                'category_meta_description' => $this->input->post('category_meta_description_'.$lg_init),
                'category_meta_keyword' => $this->input->post('category_meta_keyword_'.$lg_init),
                'category_content' => $this->input->post('category_content_'.$lg_init),
            );
            $this->db->where("category_id",$this->input->post('category_id'));
            if($this->db->update('cms_category_description', $data)){
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