<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Makeover extends CI_Controller {

	/**
	 * Class Makeovers
	 *
	 * @package	Package makeovers
	 * @subpackage	makeovers
	 * @category	makeover
	 * @author	Author Fajar Dwi Mawan
	 * @link	fajar.dwi.mawan@gmail.com
	 *
	 * Sebagai kelas induk untuk setiap makeover
	 * Deklarasi semua disini untuk mengefisienkan variabel
	 */

	protected $master = null; 
	protected $raw = null;
	protected $size = null;
	protected $w = null;
	protected $h = null;
	protected $white = null;
	protected $black = null;
	protected $green = null;
	protected $blue = null;
	protected $tempimage = null;
	protected $mask = null;
	protected $master_liner = null;

    public function tes ()
    {
      //phpinfo();
      $this->session->sess_destroy();
    }

    function __construct() {
        parent::__construct();
    }

    public function set_image_raw () {
    	$this->raw = imagecreatefromjpeg($this->session->userdata('directory_file',true).$this->session->userdata('master_file',true).'_1.jpg'); 
        $this->size = explode(",",$this->session->userdata('imageSize',true));
        $this->w = $this->size[0];
        $this->h = $this->size[1];

        $this->set_color($this->raw);
    }

   	public function set_image_master ($file_name, $sess, $image) {
   		$this->raw = imagecreatefromjpeg($this->session->userdata('directory_file',true).$this->session->userdata('master_file',true).'_1.jpg');
   		if ($sess!=='0' && !empty($file_name)) {
   			  $this->master_liner = imagecreatefrompng($this->session->userdata('directory_file',true).$file_name.$this->session->userdata($sess,true).'.png');
   		}
        $this->master = imagecreatefrompng($this->session->userdata('directory_file',true).$image); 
            
        $this->w = imagesx($this->raw);
        $this->h = imagesy($this->raw);

        $this->set_color($this->raw);
   	}

   	public function set_image_liner ($file_name = null) {
        $this->raw = imagecreatefromjpeg($this->session->userdata('directory_file',true).$this->session->userdata('master_file',true).'_1.jpg'); 
        $this->master = imagecreatefrompng($this->session->userdata('directory_file',true).$file_name); 
        $this->size=explode(",",$this->session->userdata('imageSize',true));
        $this->w = $this->size[0];
        $this->h = $this->size[1];

        $this->set_color($this->master);
   	}

   	public function set_color ($raw) {
   		$this->white = imagecolorallocate($raw, 255, 255, 255);
        $this->black = imagecolorallocate($raw, 0, 0, 0);
        $this->red   = imagecolorallocate($raw, 255,   0,   0);
        $this->green = imagecolorallocate($raw,   0, 255,   0);
        $this->blue  = imagecolorallocate($raw,   0,   0, 255);
   	}

   	public function set_temp_image () {
   		$this->tempimage = imagecreatetruecolor($this->w, $this->h);
        imagecolortransparent($this->tempimage, $this->black);
        $this->mask = imagecreatetruecolor($this->w, $this->h);
   	}

    public function before_after () {
      $data = null;
      if ($this->session->userdata('NOM') !== FALSE) {
        $data['before'] = $this->session->userdata('directory_file',true).$this->session->userdata('master_file',true).'_1.jpg';
        $data['after'] = $this->session->userdata('directory_file',true).$this->session->userdata('NOM',true).'.png';
      } 
      
      $this->load->view('makeover/before_after', array('data' => $data));
    }

    public function download () {
      if ($this->session->userdata('NOM') !== FALSE) {
        $data = file_get_contents($this->session->userdata('directory_file',true).$this->session->userdata('NOM',true).'.png');
        $name = 'myPhoto-'.$this->session->userdata('NOM',true).'.png';

        force_download($name, $data);
      } else {
        echo "<script>alert('Tidak ada photo!');window.location.href = '".base_url()."';</script>";
      }
    }

    public function get_share () {
      if ($this->session->userdata('NOM') !== FALSE) {
        $str = $this->session->userdata('directory_file',true).$this->session->userdata('NOM',true);
        $result = explode('/',$str,4);
        echo  $result[3].'.png';
      } else {
        echo "default/face.jpg";
      }
    }

    public function share () {
      $file = $this->input->get('file');
      $url = 'asset/upload/makeover/'.$file;
      if (file_exists($url)) {
          echo "<img src='".base_url().$url."'>";
      }
    }

    public function error ()
    {
        set_error_handler(function($errno, $errstr, $errfile, $errline, array $errcontext) {
            if (0 === error_reporting()) {
                return false;
            } else {
              $this->session->sess_destroy();
              $this->session->set_flashdata('error', 'Terjadi kesalahan coba upload poto ulang!');
              redirect('/', 'refresh');
            }

            throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
        });
    }

}