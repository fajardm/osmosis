<?php
	Class user_m extends CI_Model{
        
        function ceklogin(){
            $this->db->select('*');
            $this->db->from('cms_users');
            $this->db->where('user_email',$this->input->post('email'));
            $this->db->where('user_pass',md5($this->input->post('password')));
            $hasil = $this->db->get();
            if($hasil->num_rows()>0){
                $data = $hasil->row_array();
            }else{
                $data = false;
            }
            
            return $data;
        }
    }
?>