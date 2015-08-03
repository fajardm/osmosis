<?php
	Class attribut_m extends CI_Model{
        
        function getAll(){
			$this->db->select("*");
			$this->db->from("cms_attribut");
            $this->db->join("cms_attribut_description ad","ad.attribut_id=cms_attribut.attribut_id");
            $this->db->join("cms_attribut_group_description agd","agd.ag_id=cms_attribut.ag_id");
            $this->db->where("attribut_status",'active');
            $this->db->where("ad.language_id",'1');
            $this->db->where("agd.language_id",'1');
			
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
                'attribut_status' => 'active',
                'ag_id' => $this->input->post('attribut_group'),
            );
            if(!$this->db->insert('cms_attribut', $data)){
                return $this->db->_error_message();
            }else{
                $query = $this->db->query('SELECT LAST_INSERT_ID() from cms_attribut');
                $row = $query->row_array();
                return $row['LAST_INSERT_ID()'];
            }
        }
        
        function update(){
            $data = array(
                'ag_id' => $this->input->post('attribut_group'),
            );
            $this->db->where('attribut_id',$this->input->post('attribut_id'));
            if(!$this->db->update('cms_attribut', $data)){
                return $this->db->_error_message();
            }else{
                $query = $this->db->query('SELECT LAST_INSERT_ID() from cms_attribut');
                $row = $query->row_array();
                return $row['LAST_INSERT_ID()'];
            }
        }
        
        function delete($id){
            $data = array(
                'attribut_status' => 'inactive'
            );
            $this->db->Where('attribut_id',$id);
            if($this->db->update('cms_attribut', $data)){
                return true;
            }else{
                return $this->db->_error_message();
            }
        }
    }
?>