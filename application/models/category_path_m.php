<?php
	Class category_path_m extends CI_Model{
        
        function getAll(){
			$hasil = $this->db->query("SELECT cp.category_id as category_id, GROUP_CONCAT( cd1.category_name ORDER BY cp.level SEPARATOR  ' &gt; ' ) AS category_name, c.category_parent_id FROM cms_category_path cp LEFT JOIN cms_category c ON ( cp.category_path_id = c.category_id ) LEFT JOIN cms_category_description cd1 ON ( c.category_id = cd1.category_id ) LEFT JOIN cms_category_description cd2 ON ( cp.category_id = cd2.category_id ) WHERE cd1.language_id ='1' AND cd2.language_id ='1' GROUP BY cp.category_id ORDER BY category_name");
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
        
        function createNew($id){
            $this->db->query("DELETE FROM cms_category_path where category_id='".$id."'");
            
            $level = 0;
            
            $hasil = $this->db->query("SELECT * FROM cms_category_path WHERE category_id = '" .$this->input->post('category_parent'). "' ORDER BY `level` ASC");
            
            $data = $hasil->result();
            
            foreach ($data as $result){
                $data = array(
                    'category_id' => $id,
                    'category_path_id' => $result->category_path_id,
                    'level' => $level,
                );
                
                if(!$this->db->insert('cms_category_path', $data)){
                    return $this->db->_error_message();
                }else{
                    $level++;
                }
            }
            
            $data = array(
                'category_id' => $id,
                'category_path_id' => $id,
                'level' => $level,
            );

            if(!$this->db->insert('cms_category_path', $data)){
                return $this->db->_error_message();
            }else{
                return true;
            }
            
        }
    }
?>