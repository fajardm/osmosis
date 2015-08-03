<?php
    class uploader_m extends CI_Model {
        function __construct(){
			parent::__construct();
            $this->load->library(array('upload'));
		}
        function do_upload_image($nama_file) {
            $config = array(
                'upload_path' => 'asset/upload/images/',
                'allowed_types' => 'gif|jpg|png|pdf|MP4|Ogg|WebM|mp4',
                'overwrite' => 'false'
            );

            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload($nama_file)){
                //$nama_filenya =  $this->upload->display_errors();
                $nama_filenya =  0;
            }else{
                $data = $this->upload->data($nama_file);
                $image_data = $this->upload->data();
                $nama_filenya = $image_data['file_name'];
                $lebar_filenya = $image_data['image_width'];
                $tinggi_filenya = $image_data['image_height'];
                $config = array(
                    'source_image' => $image_data['full_path'],
                    'new_image' => './asset/upload/images/thumbs',
                    'maintain_ration' => true,
                    'width' => 150,
                    'height' => ($lebar_filenya/150)*$tinggi_filenya
                );

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
            }

            return $nama_filenya;
        }

        function do_upload_pdf($nama_file) {
            $config = array(
                'upload_path' => 'asset/upload/file/',
                'allowed_types' => 'gif|jpg|png|pdf|MP4|Ogg|WebM|mp4',
                'overwrite' => 'false'
            );
            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload($nama_file)){
                //$nama_filenya =  $this->upload->display_errors();
                $nama_filenya =  0;
            }else{
                $data = $this->upload->data($nama_file);
                $file_data = $this->upload->data();
                $nama_filenya = $file_data['file_name'];
            }
            return $nama_filenya;
        }

        function do_upload_video($nama_file) {
            $config = array(
                'upload_path' => 'asset/upload/video/',
                'allowed_types' => 'gif|jpg|png|pdf|ogg|ogv|WebM|mp4',
                'overwrite' => 'false'
            );
            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload($nama_file)){
                //$nama_filenya =  $this->upload->display_errors();
                $nama_filenya =  0;
            }else{
                $data = $this->upload->data($nama_file);
                $file_data = $this->upload->data();
                $nama_filenya = $file_data['file_name'];
            }
            return $nama_filenya;
        }
        
        function do_multi_upload($post_type='',$parent=''){
            $error ='';
            $files = $_FILES;
            $cpt = count($_FILES['files']['name']);
            
            for($i=0; $i<$cpt; $i++){
                if($files['files']['name'][$i]!=''){
                    $_FILES['files']['name']= $files['files']['name'][$i];
                    $_FILES['files']['type']= $files['files']['type'][$i];
                    $_FILES['files']['tmp_name']= $files['files']['tmp_name'][$i];
                    $_FILES['files']['error']= $files['files']['error'][$i];
                    $_FILES['files']['size']= $files['files']['size'][$i];    

                    $target_name = random_string('alnum',4) . basename($_FILES["files"]["name"]);
                    $target_dir = getcwd() . '/asset/upload/images/';
                    $target_file = $target_dir . $target_name;
                    
                    if (!move_uploaded_file($_FILES["files"]["tmp_name"], $target_file)){
                        $error ="Sorry, there was an error uploading your file.";
                    }else{
                        $nama_filenya = $target_name;
                        $type_filenya = $_FILES["files"]["type"];                    

                        if($parent!=''){
                            $data = array(
                                'post_author' => $this->session->userdata("sesi_id"),
                                'post_content' => $nama_filenya,
                                'post_title' => "Image",
                                'post_modified_gmt' => date("Y-m-d H:i:s"),
                                'post_modified' => date("Y-m-d H:i:s"),
                                'post_date' => date("Y-m-d H:i:s"),
                                'post_date_gmt' => date("Y-m-d H:i:s"),
                                'post_type' => $post_type,
                                'post_parent' => $parent,
                                'post_mime_type' => $type_filenya
                            );
                        }else{
                            $data = array(
                                'post_author' => $this->session->userdata("sesi_id"),
                                'post_content' => $nama_filenya,
                                'post_title' => "Image",
                                'post_modified_gmt' => date("Y-m-d H:i:s"),
                                'post_modified' => date("Y-m-d H:i:s"),
                                'post_date' => date("Y-m-d H:i:s"),
                                'post_date_gmt' => date("Y-m-d H:i:s"),
                                'post_type' => $post_type,
                                'post_mime_type' => $type_filenya
                            );   
                        }

                        if(!$this->db->insert('cms_posts', $data)){
                            $error='$this->db->_error_message()';
                        }
                    }
                }
            }
            
            if($error==''){
                return true;    
            }else{
                return $error;   
            }
            
        }
    }
?>