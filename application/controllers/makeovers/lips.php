<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Lips
 *
 * @package	Package makeovers
 * @subpackage	makeovers
 * @category	makeover
 * @author	Author Fajar Dwi Mawan
 * @link	fajar.dwi.mawan@gmail.com
 *
 * Kelas ini berisi fungsi untuk makeover bagian mulut
 * Kelas ini memiliki superclass makeover
 */

include_once (dirname(__FILE__) . "/makeover.php");

class Lips extends Makeover {

	private $makeover = null;
	private $coordinate = null;
    //Koordinat lips
    private $adjust5_dot0_x = null;
    private $adjust5_dot0_y = null;
    private $adjust5_dot1_x = null;
    private $adjust5_dot1_y = null;
    private $adjust5_dot2_x = null;
    private $adjust5_dot2_y = null;
    private $adjust5_dot3_x = null;
    private $adjust5_dot3_y = null;
    private $adjust5_dot4_x = null;
    private $adjust5_dot4_y = null;
    private $adjust5_dot5_x = null;
    private $adjust5_dot5_y = null;
  
	function __construct() {
		parent::__construct();
        $this->load->model(array(''));
		$this->makeover = new Makeover();
	}

    function setSession ($par0, $par1, $par2, $par3, $par4, $par5) {
         //Lips Data
        $this->session->set_userdata('adjust5_dot0', $par0);
        $this->session->set_userdata('adjust5_dot1', $par1);
        $this->session->set_userdata('adjust5_dot2', $par2);
        $this->session->set_userdata('adjust5_dot3', $par3);
        $this->session->set_userdata('adjust5_dot4', $par4);
        $this->session->set_userdata('adjust5_dot5', $par5);
    }

    function setCoordinate () {
        //Set koordinta
        $this->coordinate = explode(",",$this->session->userdata('adjust5_dot0',true));
        $this->adjust5_dot0_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust5_dot0_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate = explode(",",$this->session->userdata('adjust5_dot1',true));
        $this->adjust5_dot1_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust5_dot1_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate = explode(",",$this->session->userdata('adjust5_dot2',true));
        $this->adjust5_dot2_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust5_dot2_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate = explode(",",$this->session->userdata('adjust5_dot3',true));
        $this->adjust5_dot3_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust5_dot3_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate = explode(",",$this->session->userdata('adjust5_dot4',true));
        $this->adjust5_dot4_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust5_dot4_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate = explode(",",$this->session->userdata('adjust5_dot5',true));
        $this->adjust5_dot5_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust5_dot5_y = round(substr($this->coordinate[1], 0, -2),0);
    }

	function getLips(){
        $this->setCoordinate();
       	$this->makeover->set_image_raw();
       	$this->makeover->set_temp_image();

        $lips_01 = imagecreatefrompng(base_url().'asset/client/img/lips/lips_01.png');
        $lips_12 = imagecreatefrompng(base_url().'asset/client/img/lips/lips_12.png');
        $lips_23 = imagecreatefrompng(base_url().'asset/client/img/lips/lips_23.png');
        $lips_34 = imagecreatefrompng(base_url().'asset/client/img/lips/lips_34.png');
        $lips_45 = imagecreatefrompng(base_url().'asset/client/img/lips/lips_45.png');
        $lips_50 = imagecreatefrompng(base_url().'asset/client/img/lips/lips_50.png');

        $dst_w = $this->adjust5_dot1_x-$this->adjust5_dot0_x;
        $dst_h = $this->adjust5_dot0_y-$this->adjust5_dot1_y;
        $new_01 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($lips_01);
        $src_h = imagesy($lips_01);
        imagecopyresized ($new_01 ,$lips_01 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust5_dot2_x-$this->adjust5_dot1_x;
        $dst_h = $this->adjust5_dot2_y-$this->adjust5_dot1_y;
        $new_12 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($lips_12);
        $src_h = imagesy($lips_12);
        imagecopyresized ($new_12 ,$lips_12 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust5_dot3_x-$this->adjust5_dot2_x;
        $dst_h = $this->adjust5_dot2_y-$this->adjust5_dot3_y;
        $new_23 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($lips_23);
        $src_h = imagesy($lips_23);
        imagecopyresized ($new_23 ,$lips_23 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust5_dot4_x-$this->adjust5_dot3_x;
        $dst_h = $this->adjust5_dot4_y-$this->adjust5_dot3_y;
        $new_34 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($lips_34);
        $src_h = imagesy($lips_34);
        imagecopyresized ($new_34 ,$lips_34 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust5_dot4_x-$this->adjust5_dot5_x;
        $dst_h = $this->adjust5_dot5_y-$this->adjust5_dot4_y;
        $new_45 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($lips_45);
        $src_h = imagesy($lips_45);
        imagecopyresized ($new_45 ,$lips_45 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust5_dot5_x-$this->adjust5_dot0_x;
        $dst_h = $this->adjust5_dot5_y-$this->adjust5_dot0_y;
        $new_50 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($lips_50);
        $src_h = imagesy($lips_50);
        imagecopyresized ($new_50 ,$lips_50 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        imagecopymerge($this->makeover->tempimage, $new_01, $this->adjust5_dot0_x, $this->adjust5_dot1_y, 0, 0, imagesx($new_01), imagesy($new_01), 100);
        imagecopymerge($this->makeover->tempimage, $new_12, $this->adjust5_dot1_x, $this->adjust5_dot1_y, 0, 0, imagesx($new_12), imagesy($new_12), 100);
        imagecopymerge($this->makeover->tempimage, $new_23, $this->adjust5_dot2_x, $this->adjust5_dot3_y, 0, 0, imagesx($new_23), imagesy($new_23), 100);
        imagecopymerge($this->makeover->tempimage, $new_34, $this->adjust5_dot3_x, $this->adjust5_dot3_y, 0, 0, imagesx($new_34), imagesy($new_34), 100);
        imagecopymerge($this->makeover->tempimage, $new_45, $this->adjust5_dot5_x, $this->adjust5_dot4_y, 0, 0, imagesx($new_45), imagesy($new_45), 100);
        imagecopymerge($this->makeover->tempimage, $new_50, $this->adjust5_dot0_x, $this->adjust5_dot0_y, 0, 0, imagesx($new_50), imagesy($new_50), 100);

        for($x=$this->adjust5_dot1_x; $x<=$this->adjust5_dot3_x; $x++){
            for($y=min($this->adjust5_dot0_y, $this->adjust5_dot2_y, $this->adjust5_dot4_y);$y<=max($this->adjust5_dot0_y, $this->adjust5_dot2_y, $this->adjust5_dot4_y); $y++){
                $newcol = imagecolorallocate($this->makeover->raw, 0,255,0);
                imagesetpixel($this->makeover->tempimage, $x, $y, $newcol);
            }
        }
        
        imageantialias($this->makeover->tempimage, true);
        imagepng($this->makeover->tempimage, $this->session->userdata('directory_file',true).'lips_edited.png');

        for($x = $this->adjust5_dot0_x; $x<=$this->adjust5_dot4_x; $x++){
            for ($y=min($this->adjust5_dot0_y, $this->adjust5_dot1_y, $this->adjust5_dot2_y, $this->adjust5_dot3_y, $this->adjust5_dot4_y, $this->adjust5_dot5_y); $y <= max($this->adjust5_dot0_y, $this->adjust5_dot1_y, $this->adjust5_dot2_y, $this->adjust5_dot3_y, $this->adjust5_dot4_y, $this->adjust5_dot5_y); $y++) {
                
                $m = imagecolorsforindex($this->makeover->tempimage, imagecolorat($this->makeover->tempimage, $x, $y));
                if($m['red']) {
                    $rgb = imagecolorat($this->makeover->raw, $x, $y);
                    $TabColors=imagecolorsforindex ($this->makeover->raw , $rgb);
                    $newcol = imagecolorallocate($this->makeover->raw, $TabColors['red'], $TabColors['green'], $TabColors['blue']);
                    imagesetpixel($this->makeover->tempimage, $x, $y, $newcol);
                }

            }
        }

        // Display the result
        header('Content-type: image/png');
        imagepng($this->makeover->tempimage, $this->session->userdata('directory_file',true).'lips.png');

        $this->session->set_userdata('NOM_LIPS', '0');
        imagepng($this->makeover->tempimage, $this->session->userdata('directory_file',true).'NOM_LIPS_'.$this->session->userdata('NOM_LIPS',true).'.png');
        imagedestroy($this->makeover->tempimage);
        //echo $this->session->userdata('NOM_LIPS',true);
    }

    function setLips (){
        $type = $this->input->post('type');
        if ($type==1) {
            $this->setLipsLineColor();
        } elseif ($type==2) {
            $this->setLipsColor();
        }
    }

    function getLipsLiner(){
        if ($this->session->userdata('NOM') !== FALSE) {
            $this->makeover->set_image_liner('lips_edited.png');
            $this->makeover->set_temp_image();
            $this->setCoordinate();

            $lipsliner = imagecreatetruecolor($this->makeover->w, $this->makeover->h);
            imagecolortransparent($lipsliner, $this->makeover->black);


            /* Lips Liner 0-1 */
            for($x=$this->adjust5_dot0_x;$x<=$this->adjust5_dot1_x;$x++){
                $tempy_1 = true;
                for($y=$this->adjust5_dot1_y;$y<=$this->adjust5_dot0_y;$y++){
                    $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                    if($m['green']) {
                        if($tempy_1){
                            $tempy_1=false;
                            imagesetpixel($lipsliner, $x, $y, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                            imagesetpixel($lipsliner, $x, $y-1, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                            imagesetpixel($lipsliner, $x, $y-2, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                            imagesetpixel($lipsliner, $x, $y-3, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                        }
                        
                    }
                }
            }

            /* Lips Liner 1-2 */
            for($x=$this->adjust5_dot1_x;$x<=$this->adjust5_dot2_x;$x++){
                $tempy_1 = true;
                for($y=min($this->adjust5_dot1_y,$this->adjust5_dot2_y);$y<=max($this->adjust5_dot1_y,$this->adjust5_dot2_y);$y++){
                    $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                    if($m['green']) {
                        if($tempy_1){
                            $tempy_1=false; 
                            imagesetpixel($lipsliner, $x, $y, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                            imagesetpixel($lipsliner, $x, $y-1, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                            imagesetpixel($lipsliner, $x, $y-2, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                            imagesetpixel($lipsliner, $x, $y-3, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                        }
                        
                    }
                }
            }

            /* Lips Liner 2-3 */
            for($x=$this->adjust5_dot2_x;$x<=$this->adjust5_dot3_x;$x++){
                $tempy_1 = true;
                for($y=min($this->adjust5_dot2_y,$this->adjust5_dot3_y);$y<=max($this->adjust5_dot2_y,$this->adjust5_dot3_y);$y++){
                    $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                    if($m['green']) {
                        if($tempy_1){
                            $tempy_1=false;
                            imagesetpixel($lipsliner, $x, $y, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                            imagesetpixel($lipsliner, $x, $y-1, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                            imagesetpixel($lipsliner, $x, $y-2, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                            imagesetpixel($lipsliner, $x, $y-3, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                        }
                        
                    }
                }
            }

            /* Lips Liner 3-4 */
            for($x=$this->adjust5_dot3_x;$x<=$this->adjust5_dot4_x;$x++){
                $tempy_1 = true;
                for($y=min($this->adjust5_dot3_y,$this->adjust5_dot4_y);$y<=max($this->adjust5_dot3_y,$this->adjust5_dot4_y);$y++){
                    $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                    if($m['green']) {
                        if($tempy_1){
                            $tempy_1=false;
                            imagesetpixel($lipsliner, $x, $y, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                            imagesetpixel($lipsliner, $x, $y-1, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                            imagesetpixel($lipsliner, $x, $y-2, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                            imagesetpixel($lipsliner, $x, $y-3, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                        }
                        
                    }
                }
            }

            /* Lips Liner 4-5 */
            for($x=$this->adjust5_dot5_x;$x<=$this->adjust5_dot4_x;$x++){
                $tempy_1 = true;
                for($y=max($this->adjust5_dot5_y,$this->adjust5_dot4_y);$y>=min($this->adjust5_dot5_y,$this->adjust5_dot4_y);$y--){
                    $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                    if($m['green']) {
                        if($tempy_1){
                            $tempy_1=false;
                            imagesetpixel($lipsliner, $x, $y, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                            imagesetpixel($lipsliner, $x, $y+1, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                            imagesetpixel($lipsliner, $x, $y+2, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                            imagesetpixel($lipsliner, $x, $y+3, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                        }
                        
                    }
                }
            }

            /* Lips Liner 5-0 */
            for($x=$this->adjust5_dot0_x;$x<=$this->adjust5_dot5_x;$x++){
                $tempy_1 = true;
                for($y=max($this->adjust5_dot0_y,$this->adjust5_dot5_y);$y>=min($this->adjust5_dot0_y,$this->adjust5_dot5_y);$y--){
                    $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                    if($m['green']) {
                        if($tempy_1){
                            $tempy_1=false;
                            imagesetpixel($lipsliner, $x, $y, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                            imagesetpixel($lipsliner, $x, $y+1, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                            imagesetpixel($lipsliner, $x, $y+2, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                            imagesetpixel($lipsliner, $x, $y+3, imagecolorallocatealpha($lipsliner, 255, 0, 0, 0));
                        }
                        
                    }
                }
            }

            imagepng($lipsliner,$this->session->userdata('directory_file',true).'lips_liner_area.png');

            for($x = $this->adjust5_dot0_x-3; $x<=$this->adjust5_dot4_x+3;$x++){
                for ($y=min($this->adjust5_dot0_y,$this->adjust5_dot1_y,$this->adjust5_dot2_y,$this->adjust5_dot3_y,$this->adjust5_dot4_y,$this->adjust5_dot5_y)-3; $y <= max($this->adjust5_dot0_y,$this->adjust5_dot1_y,$this->adjust5_dot2_y,$this->adjust5_dot3_y,$this->adjust5_dot4_y,$this->adjust5_dot5_y)+3; $y++) {
                    
                    $m = imagecolorsforindex($lipsliner, imagecolorat($lipsliner, $x, $y));
                    if($m['red']) {
                        $rgb = imagecolorat($this->makeover->raw, $x, $y);
                        $TabColors=imagecolorsforindex ($this->makeover->raw, $rgb );
                        $newcol = imagecolorallocate($this->makeover->master, $TabColors['red'], $TabColors['green'], $TabColors['blue']);
                        imagesetpixel($lipsliner, $x, $y, $newcol);
                    }

                }
            }
            
            imagepng($lipsliner,$this->session->userdata('directory_file',true).'lips_line.png');
            $this->session->set_userdata('NOM_LIPS_LINER',$this->session->userdata('NOM_LIPS_LINER',true)+1);
            $response ='NOM = '.$this->session->userdata('NOM_LIPS_LINER',true);
            imagepng($lipsliner,$this->session->userdata('directory_file',true).'NOM_LIPS_LINER_'.$this->session->userdata('NOM_LIPS_LINER',true).'.png');

            echo $this->session->userdata('directory_file',true).'NOM_LIPS_LINER_'.$this->session->userdata('NOM_LIPS_LINER',true).'.png';
        } else {
            echo false;
        }
    }

    function setLipsLineColor(){
        $this->makeover->error();
        if ($this->session->userdata('NOM') !== FALSE) {
           	$this->makeover->set_image_master(null, null, 'lips_liner_area.png');
       		$this->makeover->set_temp_image();

            for($a=0; $a<$this->makeover->w; $a++){
                for ($b=0; $b<$this->makeover->h; $b++) {
                    $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $a, $b));
                    if($m['red']) {
                        $rgb = imagecolorat($this->makeover->raw, $a, $b);
                        $TabColors=imagecolorsforindex ($this->makeover->raw , $rgb );
                        $color_r=floor($TabColors['red']*$this->input->post('red')/255);
                        $color_g=floor($TabColors['green']*$this->input->post('green')/255);
                        $color_b=floor($TabColors['blue']*$this->input->post('blue')/255);
                        $newcol = imagecolorallocate($this->makeover->raw, $color_r, $color_g, $color_b);
                        imagesetpixel($this->makeover->tempimage, $a, $b, $newcol);
                    }
                }
            }

            for($a=0; $a<$this->makeover->w; $a++){
                for ($b=0; $b<$this->makeover->h; $b++) {
                    $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $a, $b));
                    if($m['red']) {
                        $rgb = imagecolorat($this->makeover->raw, $a, $b);
                        $TabColors=imagecolorsforindex ($this->makeover->raw, $rgb );
                        $color_r=floor($TabColors['red']*$this->input->post('red')/255);
                        $color_g=floor($TabColors['green']*$this->input->post('green')/255);
                        $color_b=floor($TabColors['blue']*$this->input->post('blue')/255);
                        $newcol = imagecolorallocate($this->makeover->raw, $color_r, $color_g, $color_b);
                        imagesetpixel($this->makeover->tempimage, $a, $b, $newcol);
                    }
                }
            }

            // Display the result
            header('Content-type: image/png');

            imagepng($this->makeover->tempimage, $this->session->userdata('directory_file',true).'NOM_LIPS_LINER_'.($this->session->userdata('NOM_LIPS_LINER',true)+1).'.png');
            
            try {
                if ($this->session->userdata('NOM_FACE') !== '0' && $this->session->userdata('NOM_FACE') !== FALSE) {
                    //try {
                        $master_face = imagecreatefrompng($this->session->userdata('directory_file',true).'NOM_FACE_'.$this->session->userdata('NOM_FACE', true).'.png');
                        imagecopymerge($this->makeover->raw, $master_face, 0, 0, 0, 0, $this->makeover->w, $this->makeover->h, 100);
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
                imagecopymerge($this->makeover->raw, $this->makeover->tempimage, 0, 0, 0, 0, $this->makeover->w, $this->makeover->h, $this->input->post('opacity'));
                if ($this->session->userdata('NOM_LIPS') !== '0' && $this->session->userdata('NOM_LIPS') !== FALSE) {
                    //try {
                        $master_lipss = imagecreatefrompng($this->session->userdata('directory_file',true).'NOM_LIPS_'.$this->session->userdata('NOM_LIPS',true).'.png');
                        imagecopymerge($this->makeover->raw, $master_lipss, 0, 0, 0, 0, $this->makeover->w, $this->makeover->h, 100);
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

            imageantialias($this->makeover->raw, true);
            imagepng($this->makeover->raw, $this->session->userdata('directory_file',true).($this->session->userdata('NOM',true)+1).'.png');
            imagedestroy($this->makeover->tempimage);
            imagedestroy($this->makeover->raw);

            $this->session->set_userdata('NOM',$this->session->userdata('NOM',true)+1);

            $this->session->set_userdata('NOM_LIPS_LINER',$this->session->userdata('NOM_LIPS_LINER',true)+1);
            $response ='NOM = '.$this->session->userdata('NOM_LIPS_LINER',true);
            echo $this->session->userdata('directory_file',true).$this->session->userdata('NOM',true).'.png';

        } else {
            echo false;
        }
    }

    function setLipsColor () {
        $this->makeover->error();
        if ($this->session->userdata('NOM') !== FALSE) {
            $this->makeover->set_image_master(null, null, 'lips_edited.png');
            $this->makeover->set_temp_image();

            for($a=0; $a<$this->makeover->w; $a++){
                for ($b=0; $b<$this->makeover->h; $b++) {
                    $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $a, $b));
                    if($m['green']) {
                        $rgb = imagecolorat($this->makeover->raw, $a, $b);
                        $TabColors=imagecolorsforindex ($this->makeover->raw, $rgb );
                        $color_r = floor($TabColors['red']*$this->input->post('red')/255);
                        $color_g = floor($TabColors['green']*$this->input->post('green')/255);
                        $color_b = floor($TabColors['blue']*$this->input->post('blue')/255);
                        $newcol  = imagecolorallocate($this->makeover->master, $color_r, $color_g, $color_b);
                        imagesetpixel($this->makeover->tempimage, $a, $b, $newcol);
                    }
                }
            }

            // Display the result
            header('Content-type: image/png');

            imagepng($this->makeover->tempimage, $this->session->userdata('directory_file',true).'NOM_LIPS_'.($this->session->userdata('NOM_LIPS',true)+1).'.png');
            imagecopymerge($this->makeover->raw, $this->makeover->tempimage, 0, 0, 0, 0, $this->makeover->w, $this->makeover->h, $this->input->post('opacity'));
            
            try {
                if ($this->session->userdata('NOM_FACE') !== '0' && $this->session->userdata('NOM_FACE') !== FALSE) {
                    //try {
                        $master_face = imagecreatefrompng($this->session->userdata('directory_file',true).'NOM_FACE_'.$this->session->userdata('NOM_FACE', true).'.png');
                        imagecopymerge($this->makeover->raw, $master_face, 0, 0, 0, 0, $this->makeover->w, $this->makeover->h, 100);
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
                if ($this->session->userdata('NOM_LIPS_LINER') !== '0' && $this->session->userdata('NOM_LIPS_LINER') !== FALSE) {
                    //try {
                        $master_lipss = imagecreatefrompng($this->session->userdata('directory_file',true).'NOM_LIPS_LINER_'.$this->session->userdata('NOM_LIPS_LINER',true).'.png');
                        imagecopymerge($this->makeover->raw, $master_lipss, 0, 0, 0, 0, $this->makeover->w, $this->makeover->h, 100);
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

            } catch (Exception $e) {
                $this->session->sess_destroy();
                $this->session->set_flashdata('error', 'Terjadi kesalahan coba upload poto ulang!');
                redirect('/', 'refresh');
            }
            
            imageantialias($this->makeover->raw, true);
            imagepng($this->makeover->raw, $this->session->userdata('directory_file',true).($this->session->userdata('NOM',true)+1).'.png');

            imagedestroy($this->makeover->tempimage);
            imagedestroy($this->makeover->raw);

            $this->session->set_userdata('NOM_LIPS',$this->session->userdata('NOM_LIPS',true)+1);
            $this->session->set_userdata('NOM',$this->session->userdata('NOM',true)+1);
            $response = 'NOM = '.$this->session->userdata('NOM_LIPS',true);
            echo $this->session->userdata('directory_file',true).$this->session->userdata('NOM',true).'.png';
        }else{
            echo false;
        }
    }
}