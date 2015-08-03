<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class cheeks
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

class Cheeks extends Makeover {

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
         //cheeks Data
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

	function getCheeks () {
        $cheekss = array(
            array(base_url().'asset/client/img/cheeks/left/cheeks_01.png', base_url().'asset/client/img/cheeks/right/cheeks_01.png'),
            array(base_url().'asset/client/img/cheeks/left/cheeks_02.png', base_url().'asset/client/img/cheeks/right/cheeks_02.png'),
            array(base_url().'asset/client/img/cheeks/left/cheeks_02.png', base_url().'asset/client/img/cheeks/right/cheeks_02.png'),
            array(base_url().'asset/client/img/cheeks/left/cheeks_04.png', base_url().'asset/client/img/cheeks/right/cheeks_04.png'),
            array(base_url().'asset/client/img/cheeks/left/cheeks_02.png', base_url().'asset/client/img/cheeks/right/cheeks_02.png')
            );

        for ($i=1; $i <= 5 ; $i++) { 
            $this->makeover->set_image_raw();
            $this->makeover->set_temp_image();
            $this->setCoordinate();

            $cheeks_01 = imagecreatefrompng($cheekss[$i-1][0]);
            $cheeks_02 = imagecreatefrompng($cheekss[$i-1][1]);

            $dst_w = $this->adjust0_dot3_x-$this->adjust0_dot0_x;
            $dst_h = $this->adjust0_dot3_y-$this->adjust0_dot0_y;
            $new_01 = imagecreatetruecolor($dst_w, $dst_h);
            $src_w = imagesx($cheeks_01);
            $src_h = imagesy($cheeks_01);
            imagecopyresized ($new_01, $cheeks_01 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

            $dst_w = $this->adjust0_dot2_x-$this->adjust0_dot3_x;
            $dst_h = $this->adjust0_dot3_y-$this->adjust0_dot2_y;
            $new_02 = imagecreatetruecolor($dst_w, $dst_h);
            $src_w = imagesx($cheeks_02);
            $src_h = imagesy($cheeks_02);
            imagecopyresized ($new_02, $cheeks_02 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

            imagecopymerge($this->makeover->tempimage, $new_01, $this->adjust0_dot0_x, $this->adjust0_dot0_y, 0, 0, imagesx($new_01), imagesy($new_01), 100);
            imagecopymerge($this->makeover->tempimage, $new_02, $this->adjust0_dot3_x, $this->adjust0_dot2_y, 0, 0, imagesx($new_02), imagesy($new_02), 100);
          
            imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'cheeks_'.$i.'_edited.png');

            // Display the result
            header('Content-type: image/png');
            imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'cheeks_'.$i.'.png');

            $this->session->set_userdata('NOM_CHEEKS_','0');
            imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'NOM_CHEEKS_'.$i.'_'.$this->session->userdata('NOM_CHEEKS_',true).'.png');
           
            imagedestroy($this->makeover->tempimage);
        }
    }

    function cheeksColor () {
        $this->makeover->error();
        if ($this->session->userdata('NOM') !== FALSE) {
            //Cek type
            $type = $this->input->post('type');
            if ($type==1 || $type==2 || $type==3 || $type==4 || $type==5) {

                $name_path = "NOM_CHEEKS_";
                $name_session = "NOM_CHEEKS";

                if ($type==1) {
                    $source_raw = "cheeks_1_edited.png";
                } elseif ($type==2) {
                    $source_raw = "cheeks_2_edited.png";
                } elseif ($type==3) {
                    $source_raw = "cheeks_3_edited.png";
                } elseif ($type==4) {
                    $source_raw = "cheeks_4_edited.png";
                } elseif ($type==5) {
                    $source_raw = "cheeks_5_edited.png";
                }

                $this->makeover->set_image_master(null, null, $source_raw);
                $this->makeover->set_temp_image();

                for($a=0; $a<$this->makeover->w; $a++){
                    for ($b=0; $b<$this->makeover->h; $b++) {
                        $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $a, $b));
                        if($m['green']) {
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
                    if ($this->session->userdata('NOM_LIPS') !== '0' && $this->session->userdata('NOM_LIPS') !== FALSE) {
                       //try {
                            $master_lips = imagecreatefrompng($this->session->userdata('directory_file',true).'NOM_LIPS_'.$this->session->userdata('NOM_LIPS',true).'.png');
                            imagecopymerge($this->makeover->raw, $master_lips, 0, 0, 0, 0, $this->makeover->w, $this->makeover->h, 100);
                       // } catch (Exception $e) {
                       //      $this->session->sess_destroy();
                       //      $this->session->set_flashdata('error', 'Terjadi kesalahan coba upload poto ulang!');
                       //      redirect('/', 'refresh');
                       // }
                    };
                    if ($this->session->userdata('NOM_FACE') !== '0' && $this->session->userdata('NOM_FACE') !== FALSE) {
                        //try {
                            $master_cheeks = imagecreatefrompng($this->session->userdata('directory_file',true).'NOM_FACE_'.$this->session->userdata('NOM_FACE', true).'.png');
                            imagecopymerge($this->makeover->raw, $master_cheeks, 0, 0, 0, 0, $this->makeover->w, $this->makeover->h, 100);
                        // } catch (Exception $e) {
                        //     $this->session->sess_destroy();
                        //     $this->session->set_flashdata('error', 'Terjadi kesalahan coba upload poto ulang!');
                        //     redirect('/', 'refresh');
                        // }
                        
                    };
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
            }  
        } else {
            echo false;
        }
    }

}