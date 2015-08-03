<?php
	Class post_m extends CI_Model{
        
        function getByType($type=''){
            $this->db->select('*');
            $this->db->from('cms_posts');
            $this->db->where('post_type',$type);
            $this->db->where('post_status',"publish");
            $hasil = $this->db->get();
            if($hasil->num_rows()>0){
                $data = $hasil->result();
            }else{
                $data = false;
            }
            
            return $data;
        }
        
        function getBy2Type($type1='',$type2=''){
            $this->db->select('*');
            $this->db->from('cms_posts');
            $this->db->where('post_type',$type1);
            $this->db->where('post_type',$type2);
            $this->db->where('post_status',"publish");
            $hasil = $this->db->get();
            if($hasil->num_rows()>0){
                $data = $hasil->result();
            }else{
                $data = false;
            }
            
            return $data;
        }
        
        function getParentByType($type=''){
            $this->db->select('*');
            $this->db->from('cms_posts');
            $this->db->where('post_type',$type);
            $this->db->where('post_parent',"0");
            $this->db->where('post_status',"publish");
            $hasil = $this->db->get();
            if($hasil->num_rows()>0){
                $data = $hasil->result();
            }else{
                $data = false;
            }
            
            return $data;
        }
        
         function getParentBy2Type($type1='',$type2=''){
            $this->db->select('*');
            $this->db->from('cms_posts');
            $this->db->where('post_type',$type1);
             $this->db->or_where('post_type',$type2);
            $this->db->where('post_parent',"0");
            $this->db->where('post_status',"publish");
            $hasil = $this->db->get();
            if($hasil->num_rows()>0){
                $data = $hasil->result();
            }else{
                $data = false;
            }
            
            return $data;
        }
        
        function getParentById($id=''){
            $this->db->select('*');
            $this->db->from('cms_posts');
            $this->db->where('ID',$id);
            $this->db->where('post_parent',"0");
            $this->db->where('post_status',"publish");
            $hasil = $this->db->get();
            if($hasil->num_rows()>0){
                $data = $hasil->result();
            }else{
                $data = false;
            }
            
            return $data;
        }
        
         function getChildByTitle($title='',$parentID=''){
            $this->db->select('*');
            $this->db->from('cms_posts');
            $this->db->where('post_title',$title);
            $this->db->where('post_parent',$parentID);
            $this->db->where('post_status',"publish");
            $hasil = $this->db->get();
            if($hasil->num_rows()>0){
                $data = $hasil->result();
            }else{
                $data = false;
            }
            
            return $data;
        }
        
        function getChildByType($type='',$parentID=''){
            $this->db->select('*');
            $this->db->from('cms_posts');
            $this->db->where('post_type',$type);
            $this->db->where('post_parent',$parentID);
            $this->db->where('post_status',"publish");
            $hasil = $this->db->get();
            if($hasil->num_rows()>0){
                $data = $hasil->result();
            }else{
                $data = false;
            }
            
            return $data;
        }
        
        function getParentIdByType($type=''){
            $this->db->select('*');
            $this->db->from('cms_posts');
            $this->db->where('post_type',$type);
            $this->db->where('post_parent',"0");
            $this->db->where('post_status',"publish");
            $hasil = $this->db->get();
            if($hasil->num_rows()>0){
                $data = $hasil->row_array();
            }else{
                $data = false;
            }
            
            return $data['ID'];
        }
        
        function insertWithimage($post_content='',$post_title='',$post_image='',$post_type=''){
            
            $data = array(
                'post_author' => $this->session->userdata("sesi_id"),
                'post_content' => $post_content,
                'post_title' => $post_title,
                'post_image' => $post_image,
                'post_date' => date("Y-m-d H:i:s"),
                'post_date_gmt' => date("Y-m-d H:i:s"),
                'post_modified_gmt' => date("Y-m-d H:i:s"),
                'post_modified' => date("Y-m-d H:i:s"),
                'post_type' => $post_type,
            );
            
			if($this->db->insert("cms_posts",$data)){
                $query = $this->db->query('SELECT LAST_INSERT_ID() from cms_posts');
                $row = $query->row_array();
                return $row['LAST_INSERT_ID()'];
            }else{
                return false;   
            }
            
        }
        
        function insertWithimageExternal($post_content='',$post_title='',$post_image='',$post_url='',$post_type=''){
            
            $data = array(
                'post_author' => $this->session->userdata("sesi_id"),
                'post_content' => $post_content,
                'post_title' => $post_title,
                'post_image' => $post_image,
                'post_date' => date("Y-m-d H:i:s"),
                'post_date_gmt' => date("Y-m-d H:i:s"),
                'post_modified_gmt' => date("Y-m-d H:i:s"),
                'post_modified' => date("Y-m-d H:i:s"),
                'post_url' => $post_url,
                'post_type' => $post_type,
            );
            
			if($this->db->insert("cms_posts",$data)){
                $query = $this->db->query('SELECT LAST_INSERT_ID() from cms_posts');
                $row = $query->row_array();
                return $row['LAST_INSERT_ID()'];
            }else{
                return false;   
            }
            
        }
        
        function insertChild($post_content='',$post_title='',$post_parent='',$post_type=''){
            
            $data = array(
                'post_author' => $this->session->userdata("sesi_id"),
                'post_content' => $post_content,
                'post_title' => $post_title,
                'post_parent' => $post_parent,
                'post_date' => date("Y-m-d H:i:s"),
                'post_date_gmt' => date("Y-m-d H:i:s"),
                'post_modified_gmt' => date("Y-m-d H:i:s"),
                'post_modified' => date("Y-m-d H:i:s"),
                'post_type' => $post_type,
            );
            
			if($this->db->insert("cms_posts",$data)){
                $query = $this->db->query('SELECT LAST_INSERT_ID() from cms_posts');
                $row = $query->row_array();
                return $row['LAST_INSERT_ID()'];
            }else{
                return false;   
            }
            
        }
                
        function update($id='',$post_content='',$post_title=''){
            if($post_content!='' && $post_title!=''){
                $data = array(
                    'post_author' => $this->session->userdata("sesi_id"),
                    'post_content' => $post_content,
                    'post_title' => $post_title,
                    'post_modified_gmt' => date("Y-m-d H:i:s"),
                    'post_modified' => date("Y-m-d H:i:s"),
                );
            }else if($post_title==''){
                $data = array(
                    'post_author' => $this->session->userdata("sesi_id"),
                    'post_content' => $post_content,
                    'post_modified_gmt' => date("Y-m-d H:i:s"),
                    'post_modified' => date("Y-m-d H:i:s"),
                );
            }
            $this->db->where("ID",$id);
			if($this->db->update("cms_posts",$data)){
                return true;   
            }else{
                return false;   
            }
        }
        
        function updateByType($post_type='',$post_content='',$post_title=''){
            if($post_content!='' && $post_title!=''){
                $data = array(
                    'post_author' => $this->session->userdata("sesi_id"),
                    'post_content' => $post_content,
                    'post_title' => $post_title,
                    'post_modified_gmt' => date("Y-m-d H:i:s"),
                    'post_modified' => date("Y-m-d H:i:s"),
                );
            }else if($post_title==''){
                $data = array(
                    'post_author' => $this->session->userdata("sesi_id"),
                    'post_content' => $post_content,
                    'post_modified_gmt' => date("Y-m-d H:i:s"),
                    'post_modified' => date("Y-m-d H:i:s"),
                );
            }
            $this->db->where("post_type",$post_type);
			if($this->db->update("cms_posts",$data)){
                return true;   
            }else{
                return false;   
            }
        }
        
        function updateTagUrl($id='',$post_content='',$post_title='',$post_tag='',$post_url=''){
            
            $data = array(
                'post_author' => $this->session->userdata("sesi_id"),
                'post_content' => $post_content,
                'post_title' => $post_title,
                'post_tag' => $post_tag,
                'post_url' => $post_url,
                'post_modified_gmt' => date("Y-m-d H:i:s"),
                'post_modified' => date("Y-m-d H:i:s"),
            );
            
            $this->db->where("ID",$id);
			if($this->db->update("cms_posts",$data)){
                return true;   
            }else{
                return false;   
            }
        }
        
        function updateExternal($id='',$post_content='',$post_title='',$post_url=''){
            if($post_content!='' && $post_title!=''){
                $data = array(
                    'post_author' => $this->session->userdata("sesi_id"),
                    'post_content' => $post_content,
                    'post_title' => $post_title,
                    'post_modified_gmt' => date("Y-m-d H:i:s"),
                    'post_modified' => date("Y-m-d H:i:s"),
                    'post_url' => $post_url,
                );
            }else if($post_title==''){
                $data = array(
                    'post_author' => $this->session->userdata("sesi_id"),
                    'post_content' => $post_content,
                    'post_modified_gmt' => date("Y-m-d H:i:s"),
                    'post_modified' => date("Y-m-d H:i:s"),
                    'post_url' => $post_url,
                );
            }
            $this->db->where("ID",$id);
			if($this->db->update("cms_posts",$data)){
                return true;   
            }else{
                return false;   
            }
        }
        
        function update_with_image($id='',$post_content='',$post_title='',$post_image=''){
            if($post_content!='' && $post_title!=''){
                $data = array(
                    'post_author' => $this->session->userdata("sesi_id"),
                    'post_content' => $post_content,
                    'post_title' => $post_title,
                    'post_image' => $post_image,
                    'post_modified_gmt' => date("Y-m-d H:i:s"),
                    'post_modified' => date("Y-m-d H:i:s"),
                );
            }else if($post_title==''){
                $data = array(
                    'post_author' => $this->session->userdata("sesi_id"),
                    'post_content' => $post_content,
                    'post_image' => $post_image,
                    'post_modified_gmt' => date("Y-m-d H:i:s"),
                    'post_modified' => date("Y-m-d H:i:s"),
                );
            }
            $this->db->where("ID",$id);
			if($this->db->update("cms_posts",$data)){
                return true;   
            }else{
                return false;   
            }
        }
        
        function update_with_imageExternal($id='',$post_content='',$post_title='',$post_image='',$post_url=''){
            if($post_content!='' && $post_title!=''){
                $data = array(
                    'post_author' => $this->session->userdata("sesi_id"),
                    'post_content' => $post_content,
                    'post_title' => $post_title,
                    'post_image' => $post_image,
                    'post_modified_gmt' => date("Y-m-d H:i:s"),
                    'post_modified' => date("Y-m-d H:i:s"),
                    'post_url' => $post_url,
                );
            }else if($post_title==''){
                $data = array(
                    'post_author' => $this->session->userdata("sesi_id"),
                    'post_content' => $post_content,
                    'post_image' => $post_image,
                    'post_modified_gmt' => date("Y-m-d H:i:s"),
                    'post_modified' => date("Y-m-d H:i:s"),
                    'post_url' => $post_url,
                );
            }
            $this->db->where("ID",$id);
			if($this->db->update("cms_posts",$data)){
                return true;   
            }else{
                return false;   
            }
        }
        
        function updateChildByTitle($id='',$post_content='',$post_title=''){
            
            $data = array(
                'post_author' => $this->session->userdata("sesi_id"),
                'post_content' => $post_content,
                'post_modified_gmt' => date("Y-m-d H:i:s"),
                'post_modified' => date("Y-m-d H:i:s"),
            );
            
            $this->db->where("post_title",$post_title);
            $this->db->where("post_parent",$id);
			if($this->db->update("cms_posts",$data)){
                return true;   
            }else{
                return false;   
            }
        }
        
        function delete($id){
            $data = array(
                'post_status' => 'delete'
            );
            $this->db->Where('ID',$id);
            if($this->db->update('cms_posts', $data)){
                return true;
            }else{
                return $this->db->_error_message();
            }   
        }
    }
?>