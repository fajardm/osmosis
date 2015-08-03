<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class face
 *
 * @package	Package makeovers
 * @subpackage	makeovers
 * @category	makeover
 * @author	Author Fajar Dwi Mawan
 * @link	fajar.dwi.mawan@gmail.com
 *
 * Kelas ini berisi fungsi untuk makeover bagian muka
 * Kelas ini memiliki superclass makeover
 */

include_once (dirname(__FILE__) . "/makeover.php");

class Face extends Makeover {

	private $makeover = null;
	private $coordinate = null;
	private $adjust0_dot0_x = null;
    private $adjust0_dot0_y = null;
    private $adjust0_dot1_x = null;
    private $adjust0_dot1_y = null;
    private $adjust0_dot2_x = null;
    private $adjust0_dot2_y = null;
    private $adjust0_dot3_x = null;
    private $adjust0_dot3_y = null;

	function __construct() {
		parent::__construct();
		$this->makeover = new Makeover();
	}

    function setSession ($par0, $par1, $par2, $par3) {
         //face Data
        $this->session->set_userdata('adjust0_dot0', $par0);
        $this->session->set_userdata('adjust0_dot1', $par1);
        $this->session->set_userdata('adjust0_dot2', $par2);
        $this->session->set_userdata('adjust0_dot3', $par3);
    }

    function setCoordinate() {
        //Set Koordinat
        $this->coordinate=explode(",",$this->session->userdata('adjust0_dot0',true));
        $this->adjust0_dot0_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust0_dot0_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate=explode(",",$this->session->userdata('adjust0_dot1',true));
        $this->adjust0_dot1_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust0_dot1_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate=explode(",",$this->session->userdata('adjust0_dot2',true));
        $this->adjust0_dot2_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust0_dot2_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate=explode(",",$this->session->userdata('adjust0_dot3',true));
        $this->adjust0_dot3_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust0_dot3_y = round(substr($this->coordinate[1], 0, -2),0);
    }

	function getFace () {
            $this->makeover->set_image_raw();
            $this->makeover->set_temp_image();
            $this->setCoordinate();

            $face_01 = imagecreatefrompng(base_url().'asset/client/img/face/face_01.png');
            $face_02 = imagecreatefrompng(base_url().'asset/client/img/face/face_12.png');
            $face_03 = imagecreatefrompng(base_url().'asset/client/img/face/face_23.png');
            $face_04 = imagecreatefrompng(base_url().'asset/client/img/face/face_34.png');


            $dst_w = $this->adjust0_dot1_x-$this->adjust0_dot0_x;
            $dst_h = $this->adjust0_dot0_y-$this->adjust0_dot1_y;
            $new_01 = imagecreatetruecolor($dst_w, $dst_h);
            $src_w = imagesx($face_01);
            $src_h = imagesy($face_01);
            imagecopyresized ($new_01, $face_01 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

            $dst_w = $this->adjust0_dot2_x-$this->adjust0_dot1_x;
            $dst_h = $this->adjust0_dot2_y-$this->adjust0_dot1_y;
            $new_02 = imagecreatetruecolor($dst_w, $dst_h);
            $src_w = imagesx($face_02);
            $src_h = imagesy($face_02);
            imagecopyresized ($new_02, $face_02 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

            $dst_w = $this->adjust0_dot2_x-$this->adjust0_dot3_x;
            $dst_h = $this->adjust0_dot3_y-$this->adjust0_dot2_y;
            $new_03 = imagecreatetruecolor($dst_w, $dst_h);
            $src_w = imagesx($face_03);
            $src_h = imagesy($face_03);
            imagecopyresized ($new_03, $face_03,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

            $dst_w = $this->adjust0_dot3_x-$this->adjust0_dot0_x;
            $dst_h = $this->adjust0_dot3_y-$this->adjust0_dot0_y;
            $new_04 = imagecreatetruecolor($dst_w, $dst_h);
            $src_w = imagesx($face_04);
            $src_h = imagesy($face_04);
            imagecopyresized ($new_04, $face_04,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );


            imagecopymerge($this->makeover->tempimage, $new_01, $this->adjust0_dot0_x, $this->adjust0_dot1_y, 0, 0, imagesx($new_01), imagesy($new_01), 100);
            imagecopymerge($this->makeover->tempimage, $new_02, $this->adjust0_dot1_x, $this->adjust0_dot1_y, 0, 0, imagesx($new_02), imagesy($new_02), 100);
            imagecopymerge($this->makeover->tempimage, $new_03, $this->adjust0_dot3_x, $this->adjust0_dot2_y, 0, 0, imagesx($new_03), imagesy($new_03), 100);
            imagecopymerge($this->makeover->tempimage, $new_04, $this->adjust0_dot0_x, $this->adjust0_dot0_y, 0, 0, imagesx($new_04), imagesy($new_04), 100);

            $master_eyes = imagecreatefrompng($this->session->userdata('directory_file',true).'eyes_edited.png');
            imagecopymerge($this->makeover->tempimage, $master_eyes, 0, 0, 0, 0, $this->makeover->w, $this->makeover->h, 100);
            $master_lips = imagecreatefrompng($this->session->userdata('directory_file',true).'lips_edited.png');
            imagecopymerge($this->makeover->tempimage, $master_lips, 0, 0, 0, 0, $this->makeover->w, $this->makeover->h, 100);
          
            imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'face_edited.png');

            // Display the result
            header('Content-type: image/png');
            imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'face.png');

            $this->session->set_userdata('NOM_FACE_','0');
            imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'NOM_FACE_'.$this->session->userdata('NOM_FACE_',true).'.png');
           
            imagedestroy($this->makeover->tempimage);
    }

    function faceColor () {
        $this->makeover->error();
        if ($this->session->userdata('NOM') !== FALSE) {
                $name_path = "NOM_FACE_";
                $name_session = "NOM_FACE";
                $source_raw = "face_edited.png";
               
                $this->makeover->set_image_master(null, null, $source_raw);
                $this->makeover->set_temp_image();

                for($a=0; $a<$this->makeover->w; $a++){
                    for ($b=0; $b<$this->makeover->h; $b++) {
                        $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $a, $b));
                        if($m['red']) {
                            $rgb = imagecolorat($this->makeover->raw, $a, $b);
                            $TabColors=imagecolorsforindex ($this->makeover->raw , $rgb );
                            $color_r = floor($TabColors['red']*$this->input->post('red')/255);
                            $color_g = floor($TabColors['green']*$this->input->post('green')/255);
                            $color_b = floor($TabColors['blue']*$this->input->post('blue')/255);
                            $newcol  = imagecolorallocate($this->makeover->raw, $color_r, $color_g, $color_b);
                            imagesetpixel($this->makeover->tempimage, $a, $b, $newcol);
                        }
                    }
                }

                // Display the result
                header('Content-type: image/png');

                imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).$name_path.($this->session->userdata($name_session,true)+1).'.png');

                try {
                    if ($this->session->userdata('NOM_EYES_LINER') !== '0' && $this->session->userdata('NOM_EYES_LINER') !== FALSE) {
                        //try {
                            $master_eyes = imagecreatefrompng($this->session->userdata('directory_file',true).'NOM_EYES_LINER_'.$this->session->userdata('NOM_EYES_LINER',true).'.png');
                            imagecopymerge($this->makeover->raw, $master_eyes, 0, 0, 0, 0, $this->makeover->w, $this->makeover->h, 100);
                        // } catch (Exception $e) {
                        //     $this->session->sess_destroy();
                        //     $this->session->set_flashdata('error', 'Terjadi kesalahan coba upload poto ulang!');
                        //     redirect('/', 'refresh');
                        // }
                        
                    };
                    if ($this->session->userdata('NOM_LIPS') !== '0' && $this->session->userdata('NOM_LIPS') !== FALSE) {
                        //try {
                            $master_lips = imagecreatefrompng($this->session->userdata('directory_file',true).'NOM_LIPS_'.$this->session->userdata('NOM_LIPS',true).'.png');
                            imagecopymerge($this->makeover->raw, $master_lips, 0, 0, 0, 0, $this->makeover->w, $this->makeover->h, 100);
                        // } catch (Exception $e) {
                        //     $this->session->sess_destroy();
                        //     $this->session->set_flashdata('error', 'Terjadi kesalahan coba upload poto ulang!');
                        //     redirect('/', 'refresh');
                        // }
                        
                    };
                    if ($this->session->userdata('NOM_LIPS_LINER') !== '0' && $this->session->userdata('NOM_LIPS_LINER') !== FALSE) {
                        //try {
                            $master_lips = imagecreatefrompng($this->session->userdata('directory_file',true).'NOM_LIPS_LINER_'.$this->session->userdata('NOM_LIPS_LINER',true).'.png');
                            imagecopymerge($this->makeover->raw, $master_lips, 0, 0, 0, 0, $this->makeover->w, $this->makeover->h, 100);
                        // } catch (Exception $e) {
                        //     $this->session->sess_destroy();
                        //     $this->session->set_flashdata('error', 'Terjadi kesalahan coba upload poto ulang!');
                        //     redirect('/', 'refresh');
                        // }
                        
                    };
                    if ($this->session->userdata('NOM_CHEEKS') !== '0' && $this->session->userdata('NOM_CHEEKS') !== FALSE) {
                        //try {
                            $master_cheeks = imagecreatefrompng($this->session->userdata('directory_file',true).'NOM_CHEEKS_'.$this->session->userdata('NOM_CHEEKS', true).'.png');
                            imagecopymerge($this->makeover->raw, $master_cheeks, 0, 0, 0, 0, $this->makeover->w, $this->makeover->h, 100);
                        // } catch (Exception $e) {
                        //     $this->session->sess_destroy();
                        //     $this->session->set_flashdata('error', 'Terjadi kesalahan coba upload poto ulang!');
                        //     redirect('/', 'refresh');
                        // }
                        
                    };

                } catch (Exception $e) {
                    $this->session->sess_destroy();
                    $this->session->set_flashdata('error', 'Terjadi kesalahan coba upload poto ulang!');
                    redirect('/', 'refresh');
                }
                
                imagecopymerge($this->makeover->raw, $this->makeover->tempimage, 0, 0, 0, 0, $this->makeover->w, $this->makeover->h, $this->input->post('opacity'));
                
                imagepng($this->makeover->raw,$this->session->userdata('directory_file',true).($this->session->userdata('NOM',true)+1).'.png');

                imagedestroy($this->makeover->tempimage);
                imagedestroy($this->makeover->raw);

                $this->session->set_userdata($name_session, $this->session->userdata($name_session,true)+1);
                $this->session->set_userdata('NOM',$this->session->userdata('NOM',true)+1);
                $response = 'NOM = '.$this->session->userdata($name_session,true);
                echo $this->session->userdata('directory_file',true).$this->session->userdata('NOM',true).'.png';
        } else {
            echo false;
        }
    }

}