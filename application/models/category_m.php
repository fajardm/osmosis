<?php
	Class category_m extends CI_Model{
        
        function getAll(){
			$hasil = $this->db->query("SELECT cp.category_id as category_id, GROUP_CONCAT( cd1.category_name ORDER BY cp.level SEPARATOR  ' &gt; ' ) AS category_name, c.category_parent_id, c.category_status FROM cms_category_path cp LEFT JOIN cms_category c ON ( cp.category_path_id = c.category_id ) LEFT JOIN cms_category_description cd1 ON ( c.category_id = cd1.category_id ) LEFT JOIN cms_category_description cd2 ON ( cp.category_id = cd2.category_id ) WHERE cd1.language_id ='1' AND cd2.language_id ='1' and c.category_status='active' GROUP BY cp.category_id ORDER BY category_name");
            if($hasil){
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
                'category_parent_id' => $this->input->post('category_parent'),
                'category_added' => date("Y-m-d H:i:s"),
                'category_modified' => date("Y-m-d H:i:s"),
                'category_status' => 'active'
            );
            if(!$this->db->insert('cms_category', $data)){
                return $this->db->_error_message();
            }else{
                $query = $this->db->query('SELECT LAST_INSERT_ID() from cms_category');
                $row = $query->row_array();
                return $row['LAST_INSERT_ID()'];
            }
        }
        
        function update(){
            $data = array(
                'category_parent_id' => $this->input->post('category_parent'),
                'category_modified' => date("Y-m-d H:i:s"),
            );
            $this->db->where("category_id",$this->input->post('category_id'));
            if(!$this->db->update('cms_category', $data)){
                return $this->db->_error_message();
            }else{
                return true;
            }   
        }
        
        function delete($id){
            $data = array(
                'category_status' => 'inactive',
                'category_modified' => date("Y-m-d H:i:s"),
            );
            $this->db->where("category_id",$id);
            if(!$this->db->update('cms_category', $data)){
                return $this->db->_error_message();
            }else{
                return true;
            }   
        }

    }
?>