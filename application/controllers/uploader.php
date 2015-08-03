<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class uploader extends CI_Controller {
    function __construct()
	{
		parent::__construct();
	}
    
    function do_upload_image($nama_file) {
        $config = array(
            'upload_path' => 'asset/upload/images/',
            'allowed_types' => 'gif|jpg|png|pdf|MP4|Ogg|WebM|mp4',
            'overwrite' => 'false'
        );
        
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($nama_file)){
            $nama_filenya = "0";
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
            $nama_filenya =  "0";
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
}