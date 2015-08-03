<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Siteup
 *
 * @package Package makeovers
 * @subpackage  makeovers
 * @category    makeover
 * @author  Author Fajar Dwi Mawan
 * @link    fajar.dwi.mawan@gmail.com
 *
 * Kelas ini berisi fungsi untuk upload image dll.
 */

//Import class
include_once (dirname(__FILE__) . "/lips.php");
include_once (dirname(__FILE__) . "/eyes.php");
include_once (dirname(__FILE__) . "/cheeks.php");
include_once (dirname(__FILE__) . "/face.php");

class Siteup extends CI_Controller {

    private $lips = null;
    private $eyes = null;
    private $cheeks = null;
    private $face = null;

	public function __construct()
	{
		parent::__construct();
        $this->load->model(array(''));
        $this->lips = new Lips();
        $this->eyes = new Eyes();
        $this->cheeks = new Cheeks();
        $this->face = new Face();
	}

	public function ajaxUploader(){
        
        $rawData = $this->input->post('imgBase64');
        $filteredData = explode(',', $rawData);
        $unencoded = base64_decode($filteredData[1]);
        $photo = imagecreatefromstring($unencoded);

        /* Set name of the photo for show in the form */
        $this->session->set_userdata('upload_'.$photo,'ant');
        
        /*set time of the upload*/
        $this->session->set_userdata('uploading_on_datetime',date('mdY_H-i-s',time()));


        $datetime_upload = $this->session->userdata('uploading_on_datetime',true);

        /* create temp dir with time and user id */
        $new_dir = 'asset/upload/makeover/user_'.$this->input->ip_address().'_on_'.$datetime_upload.'/';
        $this->session->set_userdata('directory_file',$new_dir);

        if(!is_dir($new_dir)){
            @mkdir($new_dir);
        }
        
        $nameFile =$this->input->ip_address().'_on_'.$datetime_upload;
        imagejpeg($photo,$new_dir.$nameFile.'_0.jpg',100); // <-- **Change is here**
        $this->session->set_userdata('master_file',$nameFile);
        
        echo $new_dir.$nameFile.'_0.jpg';
    }
    
    public function ajaxUploader2(){
        
        $this->session->set_userdata('uploading_on_datetime',date('mdY_H-i-s',time()));
        
        $datetime_upload = $this->session->userdata('uploading_on_datetime',true);

        $new_dir = 'asset/upload/makeover/user_'.$this->input->ip_address().'_on_'.$datetime_upload.'/';
        $this->session->set_userdata('directory_file',$new_dir);

        if(!is_dir($new_dir)){
            @mkdir($new_dir);
        }
        
        $nameFile = $new_dir.$this->input->ip_address().'_on_'.$datetime_upload.'_0.jpg';
        $this->session->set_userdata('master_file',$this->input->ip_address().'_on_'.$datetime_upload);

        $error = "";
        $msg = "";
        $fileElementName = 'fileToUpload';
        if(!empty($_FILES[$fileElementName]['error']))
        {
            switch($_FILES[$fileElementName]['error'])
            {

                case '1':
                    $error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
                    break;
                case '2':
                    $error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
                    break;
                case '3':
                    $error = 'The uploaded file was only partially uploaded';
                    break;
                case '4':
                    $error = 'No file was uploaded.';
                    break;

                case '6':
                    $error = 'Missing a temporary folder';
                    break;
                case '7':
                    $error = 'Failed to write file to disk';
                    break;
                case '8':
                    $error = 'File upload stopped by extension';
                    break;
                case '999':
                default:
                    $error = 'No error code avaiable';

            }
        }elseif(empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none'){
            $error = 'No file was uploaded..';
        }else{

            $sourcePath = $_FILES['fileToUpload']['tmp_name'];
            $targetPath = $nameFile;

            if(move_uploaded_file($sourcePath,$targetPath)){
                $msg=$targetPath;
            }
        }       
        
        echo "{";
        echo                "error: '" . $error . "',\n";
        echo                "msg: '" . $msg . "'\n";
        echo "}";

    }

    public function setSize(){
        $this->session->set_userdata('imageSize', $this->input->post('imageSize'));
        $this->session->set_userdata('NOM', "0");
    }

    public function setAdjust(){
        $size = explode(",",$this->session->userdata('imageSize',true));

        $w = $size[0];
        $h = $size[1];

        $targetPath = $this->session->userdata('directory_file',true).$this->session->userdata('master_file',true).'_0.jpg';
        $orig_image = imagecreatefromjpeg($targetPath);
        $image_info = getimagesize($targetPath); 
        $width_orig  = $image_info[0]; // current width as found in image file
        $height_orig = $image_info[1]; // current height as found in image file
        $width = $w; // new image width
        $height = $h; // new image height
        $destination_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($destination_image, $orig_image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

        // This will just copy the new image over the original at the same filePath.
        imagejpeg($destination_image, $this->session->userdata('directory_file',true).$this->session->userdata('master_file',true).'_1.jpg', 100);

        //Set data
        $this->lips->setSession(
            $this->input->post('adjust5_dot0'), 
            $this->input->post('adjust5_dot1'), 
            $this->input->post('adjust5_dot2'), 
            $this->input->post('adjust5_dot3'), 
            $this->input->post('adjust5_dot4'), 
            $this->input->post('adjust5_dot5')
            );
        $this->lips->getLips();
        $this->lips->getLipsLiner();
        
        $this->eyes->setSession(
            $this->input->post('adjust1_dot0'), 
            $this->input->post('adjust1_dot1'), 
            $this->input->post('adjust1_dot2'), 
            $this->input->post('adjust1_dot3'),
            $this->input->post('adjust1_dot4'), 
            $this->input->post('adjust1_dot5'),
            $this->input->post('adjust1_dot6'), 
            $this->input->post('adjust1_dot7'), 
            $this->input->post('adjust2_dot0'), 
            $this->input->post('adjust2_dot1'),
            $this->input->post('adjust2_dot2'), 
            $this->input->post('adjust2_dot3'),
            $this->input->post('adjust2_dot4'), 
            $this->input->post('adjust2_dot5'),
            $this->input->post('adjust2_dot6'), 
            $this->input->post('adjust2_dot7')
            );
        $this->eyes->getEyes();
        $this->eyes->getEyesSpecial();
        $this->eyes->getEyesLinerType01();
        $this->eyes->getEyesLinerType02();
        $this->eyes->getEyesLinerType03();
        $this->eyes->getEyesLinerType04();
        $this->eyes->getEyesLinerType05();
        
        $this->cheeks->setSession(
            $this->input->post('adjust0_dot0'), 
            $this->input->post('adjust0_dot1'), 
            $this->input->post('adjust0_dot2'), 
            $this->input->post('adjust0_dot3')
            );
        $this->cheeks->getCheeks();

         $this->face->setSession(
            $this->input->post('adjust0_dot0'), 
            $this->input->post('adjust0_dot1'), 
            $this->input->post('adjust0_dot2'), 
            $this->input->post('adjust0_dot3')
            );
        $this->face->getFace();

        print_r($this->session->all_userdata());
    }


}