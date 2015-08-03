<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/makeover.php");
include_once (dirname(__FILE__) . "/siteup.php");

class Eyes extends Makeover {

    private $makeover = null;
    private $coordinate = null;
    //Koordinat left eye
    private $adjust1_dot0_x = null;
    private $adjust1_dot0_y = null;
    private $adjust1_dot1_x = null;
    private $adjust1_dot1_y = null;
    private $adjust1_dot2_x = null;
    private $adjust1_dot2_y = null;
    private $adjust1_dot3_x = null;
    private $adjust1_dot3_y = null;
    private $adjust1_dot4_x = null;
    private $adjust1_dot4_y = null;
    private $adjust1_dot5_x = null;
    private $adjust1_dot5_y = null;
    private $adjust1_dot6_x = null;
    private $adjust1_dot6_y = null;
    private $adjust1_dot7_x = null;
    private $adjust1_dot7_y = null;
    //Koordinat right eye
    private $adjust2_dot0_x = null;
    private $adjust2_dot0_y = null;
    private $adjust2_dot1_x = null;
    private $adjust2_dot1_y = null;
    private $adjust2_dot2_x = null;
    private $adjust2_dot2_y = null;
    private $adjust2_dot3_x = null;
    private $adjust2_dot3_y = null;
    private $adjust2_dot4_x = null;
    private $adjust2_dot4_y = null;
    private $adjust2_dot5_x = null;
    private $adjust2_dot5_y = null;
    private $adjust2_dot6_x = null;
    private $adjust2_dot6_y = null;
    private $adjust2_dot7_x = null;
    private $adjust2_dot7_y = null;


    function __construct() {
        parent::__construct();
        $this->makeover = new Makeover();
    }

    function setSession ($par00, $par01, $par02, $par03, $par04, $par05, $par06, $par07, $par10, $par11, $par12, $par13, $par14, $par15, $par16, $par17) {
        //Left Eyes Data
        $this->session->set_userdata('adjust1_dot0', $par00);
        $this->session->set_userdata('adjust1_dot1', $par01);
        $this->session->set_userdata('adjust1_dot2', $par02);
        $this->session->set_userdata('adjust1_dot3', $par03);
        $this->session->set_userdata('adjust1_dot4', $par04);
        $this->session->set_userdata('adjust1_dot5', $par05);
        $this->session->set_userdata('adjust1_dot6', $par06);
        $this->session->set_userdata('adjust1_dot7', $par07);

        //Righ Eyes Data
        $this->session->set_userdata('adjust2_dot0', $par10);
        $this->session->set_userdata('adjust2_dot1', $par11);
        $this->session->set_userdata('adjust2_dot2', $par12);
        $this->session->set_userdata('adjust2_dot3', $par13);
        $this->session->set_userdata('adjust2_dot4', $par14);
        $this->session->set_userdata('adjust2_dot5', $par15);
        $this->session->set_userdata('adjust2_dot6', $par16);
        $this->session->set_userdata('adjust2_dot7', $par17);
    }

    function setCoordinate() {
        //Eyes Left
        $this->coordinate=explode(",",$this->session->userdata('adjust1_dot0',true));
        $this->adjust1_dot0_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust1_dot0_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate=explode(",",$this->session->userdata('adjust1_dot1',true));
        $this->adjust1_dot1_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust1_dot1_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate=explode(",",$this->session->userdata('adjust1_dot2',true));
        $this->adjust1_dot2_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust1_dot2_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate=explode(",",$this->session->userdata('adjust1_dot3',true));
        $this->adjust1_dot3_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust1_dot3_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate=explode(",",$this->session->userdata('adjust1_dot4',true));
        $this->adjust1_dot4_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust1_dot4_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate=explode(",",$this->session->userdata('adjust1_dot5',true));
        $this->adjust1_dot5_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust1_dot5_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate=explode(",",$this->session->userdata('adjust1_dot6',true));
        $this->adjust1_dot6_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust1_dot6_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate=explode(",",$this->session->userdata('adjust1_dot7',true));
        $this->adjust1_dot7_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust1_dot7_y = round(substr($this->coordinate[1], 0, -2),0);

        //Eyes Right
        $this->coordinate=explode(",",$this->session->userdata('adjust2_dot0',true));
        $this->adjust2_dot0_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust2_dot0_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate=explode(",",$this->session->userdata('adjust2_dot1',true));
        $this->adjust2_dot1_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust2_dot1_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate=explode(",",$this->session->userdata('adjust2_dot2',true));
        $this->adjust2_dot2_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust2_dot2_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate=explode(",",$this->session->userdata('adjust2_dot3',true));
        $this->adjust2_dot3_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust2_dot3_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate=explode(",",$this->session->userdata('adjust2_dot4',true));
        $this->adjust2_dot4_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust2_dot4_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate=explode(",",$this->session->userdata('adjust2_dot5',true));
        $this->adjust2_dot5_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust2_dot5_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate=explode(",",$this->session->userdata('adjust2_dot6',true));
        $this->adjust2_dot6_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust2_dot6_y = round(substr($this->coordinate[1], 0, -2),0);

        $this->coordinate=explode(",",$this->session->userdata('adjust2_dot7',true));
        $this->adjust2_dot7_x = round(substr($this->coordinate[0], 0, -2),0);
        $this->adjust2_dot7_y = round(substr($this->coordinate[1], 0, -2),0);
    }

    function getEyes(){
        $this->makeover->set_image_raw();
        $this->makeover->set_temp_image();
        $this->setCoordinate();

        //Eyes Left
        $eyes_0 = imagecreatefrompng(base_url().'asset/client/img/eyes/left/eyes_01.png');
        $eyes_1 = imagecreatefrompng(base_url().'asset/client/img/eyes/left/eyes_12.png');
        $eyes_2 = imagecreatefrompng(base_url().'asset/client/img/eyes/left/eyes_23.png');
        $eyes_3 = imagecreatefrompng(base_url().'asset/client/img/eyes/left/eyes_34.png');
        $eyes_4 = imagecreatefrompng(base_url().'asset/client/img/eyes/left/eyes_45.png');
        $eyes_5 = imagecreatefrompng(base_url().'asset/client/img/eyes/left/eyes_56.png');
        $eyes_6 = imagecreatefrompng(base_url().'asset/client/img/eyes/left/eyes_67.png');
        $eyes_7 = imagecreatefrompng(base_url().'asset/client/img/eyes/left/eyes_78.png');

        $dst_w = $this->adjust1_dot1_x-$this->adjust1_dot0_x;
        $dst_h = $this->adjust1_dot0_y-$this->adjust1_dot1_y;
        $new_0 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($eyes_0);
        $src_h = imagesy($eyes_0);
        imagecopyresized ($new_0 ,$eyes_0 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust1_dot2_x-$this->adjust1_dot1_x;
        $dst_h = $this->adjust1_dot0_y-$this->adjust1_dot2_y;
        $new_1 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($eyes_1);
        $src_h = imagesy($eyes_1);
        imagecopyresized ($new_1 ,$eyes_1 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust1_dot3_x-$this->adjust1_dot2_x;
        $dst_h = $this->adjust1_dot0_y-$this->adjust1_dot2_y;
        $new_2 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($eyes_2);
        $src_h = imagesy($eyes_2);
        imagecopyresized ($new_2 ,$eyes_2 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust1_dot4_x-$this->adjust1_dot3_x;
        $dst_h = $this->adjust1_dot0_y-$this->adjust1_dot3_y;
        $new_3 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($eyes_3);
        $src_h = imagesy($eyes_3);
        imagecopyresized ($new_3 ,$eyes_3 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust1_dot4_x-$this->adjust1_dot5_x;
        $dst_h = $this->adjust1_dot5_y-$this->adjust1_dot0_y;
        $new_4 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($eyes_4);
        $src_h = imagesy($eyes_4);
        imagecopyresized ($new_4 ,$eyes_4 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust1_dot5_x-$this->adjust1_dot6_x;
        $dst_h = $this->adjust1_dot6_y-$this->adjust1_dot0_y;
        $new_5 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($eyes_5);
        $src_h = imagesy($eyes_5);
        imagecopyresized ($new_5 ,$eyes_5 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust1_dot6_x-$this->adjust1_dot7_x;
        $dst_h = $this->adjust1_dot6_y-$this->adjust1_dot0_y;
        $new_6 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($eyes_6);
        $src_h = imagesy($eyes_6);
        imagecopyresized ($new_6 ,$eyes_6 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust1_dot7_x-$this->adjust1_dot0_x;
        $dst_h = $this->adjust1_dot7_y-$this->adjust1_dot0_y;
        $new_7 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($eyes_7);
        $src_h = imagesy($eyes_7);
        imagecopyresized ($new_7 ,$eyes_7 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        imagecopymerge($this->makeover->tempimage, $new_0, $this->adjust1_dot0_x, $this->adjust1_dot1_y, 0, 0, imagesx($new_0), imagesy($new_0), 100);
        imagecopymerge($this->makeover->tempimage, $new_1, $this->adjust1_dot1_x, $this->adjust1_dot2_y, 0, 0, imagesx($new_1), imagesy($new_1), 100);
        imagecopymerge($this->makeover->tempimage, $new_2, $this->adjust1_dot2_x, $this->adjust1_dot2_y, 0, 0, imagesx($new_2), imagesy($new_2), 100);
        imagecopymerge($this->makeover->tempimage, $new_3, $this->adjust1_dot3_x, $this->adjust1_dot3_y, 0, 0, imagesx($new_3), imagesy($new_3), 100);
        imagecopymerge($this->makeover->tempimage, $new_4, $this->adjust1_dot5_x, $this->adjust1_dot0_y, 0, 0, imagesx($new_4), imagesy($new_4), 100);
        imagecopymerge($this->makeover->tempimage, $new_5, $this->adjust1_dot6_x, $this->adjust1_dot0_y, 0, 0, imagesx($new_5), imagesy($new_5), 100);
        imagecopymerge($this->makeover->tempimage, $new_6, $this->adjust1_dot7_x, $this->adjust1_dot0_y, 0, 0, imagesx($new_6), imagesy($new_6), 100);
        imagecopymerge($this->makeover->tempimage, $new_7, $this->adjust1_dot0_x, $this->adjust1_dot0_y, 0, 0, imagesx($new_7), imagesy($new_7), 100);

        //Eyes right
        $eyes_0 = imagecreatefrompng(base_url().'asset/client/img/eyes/right/eyes_34.png');
        $eyes_1 = imagecreatefrompng(base_url().'asset/client/img/eyes/right/eyes_23.png');
        $eyes_2 = imagecreatefrompng(base_url().'asset/client/img/eyes/right/eyes_12.png');
        $eyes_3 = imagecreatefrompng(base_url().'asset/client/img/eyes/right/eyes_01.png');
        $eyes_4 = imagecreatefrompng(base_url().'asset/client/img/eyes/right/eyes_78.png');
        $eyes_5 = imagecreatefrompng(base_url().'asset/client/img/eyes/right/eyes_67.png');
        $eyes_6 = imagecreatefrompng(base_url().'asset/client/img/eyes/right/eyes_56.png');
        $eyes_7 = imagecreatefrompng(base_url().'asset/client/img/eyes/right/eyes_45.png');

        $dst_w = $this->adjust2_dot1_x-$this->adjust2_dot0_x;
        $dst_h = $this->adjust2_dot0_y-$this->adjust2_dot1_y;
        $new_0 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($eyes_0);
        $src_h = imagesy($eyes_0);
        imagecopyresized ($new_0 ,$eyes_0 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust2_dot2_x-$this->adjust2_dot1_x;
        $dst_h = $this->adjust2_dot0_y-$this->adjust2_dot2_y;
        $new_1 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($eyes_1);
        $src_h = imagesy($eyes_1);
        imagecopyresized ($new_1 ,$eyes_1 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust2_dot3_x-$this->adjust2_dot2_x;
        $dst_h = $this->adjust2_dot0_y-$this->adjust2_dot2_y;
        $new_2 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($eyes_2);
        $src_h = imagesy($eyes_2);
        imagecopyresized ($new_2 ,$eyes_2 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust2_dot4_x-$this->adjust2_dot3_x;
        $dst_h = $this->adjust2_dot0_y-$this->adjust2_dot3_y;
        $new_3 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($eyes_3);
        $src_h = imagesy($eyes_3);
        imagecopyresized ($new_3 ,$eyes_3 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust2_dot4_x-$this->adjust2_dot5_x;
        $dst_h = $this->adjust2_dot5_y-$this->adjust2_dot0_y;
        $new_4 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($eyes_4);
        $src_h = imagesy($eyes_4);
        imagecopyresized ($new_4 ,$eyes_4 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust2_dot5_x-$this->adjust2_dot6_x;
        $dst_h = $this->adjust2_dot6_y-$this->adjust2_dot0_y;
        $new_5 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($eyes_5);
        $src_h = imagesy($eyes_5);
        imagecopyresized ($new_5 ,$eyes_5 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust2_dot6_x-$this->adjust2_dot7_x;
        $dst_h = $this->adjust2_dot6_y-$this->adjust2_dot0_y;
        $new_6 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($eyes_6);
        $src_h = imagesy($eyes_6);
        imagecopyresized ($new_6 ,$eyes_6 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        $dst_w = $this->adjust2_dot7_x-$this->adjust2_dot0_x;
        $dst_h = $this->adjust2_dot7_y-$this->adjust2_dot0_y;
        $new_7 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($eyes_7);
        $src_h = imagesy($eyes_7);
        imagecopyresized ($new_7 ,$eyes_7 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        imagecopymerge($this->makeover->tempimage, $new_0, $this->adjust2_dot0_x, $this->adjust2_dot1_y, 0, 0, imagesx($new_0), imagesy($new_0), 100);
        imagecopymerge($this->makeover->tempimage, $new_1, $this->adjust2_dot1_x, $this->adjust2_dot2_y, 0, 0, imagesx($new_1), imagesy($new_1), 100);
        imagecopymerge($this->makeover->tempimage, $new_2, $this->adjust2_dot2_x, $this->adjust2_dot2_y, 0, 0, imagesx($new_2), imagesy($new_2), 100);
        imagecopymerge($this->makeover->tempimage, $new_3, $this->adjust2_dot3_x, $this->adjust2_dot3_y, 0, 0, imagesx($new_3), imagesy($new_3), 100);
        imagecopymerge($this->makeover->tempimage, $new_4, $this->adjust2_dot5_x, $this->adjust2_dot0_y, 0, 0, imagesx($new_4), imagesy($new_4), 100);
        imagecopymerge($this->makeover->tempimage, $new_5, $this->adjust2_dot6_x, $this->adjust2_dot0_y, 0, 0, imagesx($new_5), imagesy($new_5), 100);
        imagecopymerge($this->makeover->tempimage, $new_6, $this->adjust2_dot7_x, $this->adjust2_dot0_y, 0, 0, imagesx($new_6), imagesy($new_6), 100);
        imagecopymerge($this->makeover->tempimage, $new_7, $this->adjust2_dot0_x, $this->adjust2_dot0_y, 0, 0, imagesx($new_7), imagesy($new_7), 100);

        imageantialias($this->makeover->tempimage, true);
        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'eyes_edited.png');

        // Display the result
        header('Content-type: image/png');
        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'eyes.png');

        $this->session->set_userdata('NOM_EYES','0');
        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'NOM_EYES'.$this->session->userdata('NOM_EYES',true).'.png');
       
        imagedestroy($this->makeover->tempimage);
    }

    function getEyesSpecial(){
        $this->makeover->set_image_raw();
        $this->makeover->set_temp_image();
        $this->setCoordinate();

        //Eyes Left
        $eyes_01 = imagecreatefrompng(base_url().'asset/client/img/eyes/left/eyes_special.png');

        $dst_h = $this->adjust1_dot0_y-$this->adjust1_dot2_y;
        $dev = $dst_h/2;
        $dst_w = $this->adjust1_dot2_x-$this->adjust1_dot0_x+$dev;
        $new_01 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($eyes_01);
        $src_h = imagesy($eyes_01);
        imagecopyresized ($new_01 ,$eyes_01 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        imagecopymerge($this->makeover->tempimage, $new_01, $this->adjust1_dot0_x-$dev, $this->adjust1_dot1_y, 0, 0, imagesx($new_01), imagesy($new_01), 100);
    
        //Eyes Right
        $eyes_12 = imagecreatefrompng(base_url().'asset/client/img/eyes/right/eyes_special.png');

        $dst_h = $this->adjust2_dot4_y-$this->adjust2_dot3_y;
        $dev = $dst_h/2;
        $dst_w = $this->adjust2_dot4_x-$this->adjust2_dot3_x+$dev;
        $new_12 = imagecreatetruecolor($dst_w, $dst_h);
        $src_w = imagesx($eyes_12);
        $src_h = imagesy($eyes_12);
        imagecopyresized ($new_12 ,$eyes_12 ,0 ,0 ,0 ,0 , $dst_w , $dst_h , $src_w , $src_h );

        imagecopymerge($this->makeover->tempimage, $new_12, $this->adjust2_dot3_x+$dev, $this->adjust2_dot3_y, 0, 0, imagesx($new_12), imagesy($new_12), 100);
        
        $master_eyes = imagecreatefrompng($this->session->userdata('directory_file',true).'eyes_edited.png');
        imagecopymerge($this->makeover->tempimage, $master_eyes, 0, 0, 0, 0, $this->makeover->w, $this->makeover->h, 100);
        imagepng($this->makeover->tempimage, $this->session->userdata('directory_file',true).'eyes_special_edited.png');

        // Display the result
        header('Content-type: image/png');
        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'eyes_special.png');

        $this->session->set_userdata('NOM_EYES_SPECIAL','0');
        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'NOM_EYES_SPECIAL'.$this->session->userdata('NOM_EYES_SPECIAL',true).'.png');
       
        imagedestroy($this->makeover->tempimage);
    }

    function getEyesLinerType01 () {
        $this->makeover->set_image_liner('eyes_edited.png');
        $this->makeover->set_temp_image();
        $this->setCoordinate();

        //Left
        /* Eyes Liner 0-7 */
        for($x=$this->adjust1_dot0_x;$x<=$this->adjust1_dot4_x;$x++){
            $tempy_1 = true;
            for($y=max($this->adjust1_dot0_y, $this->adjust1_dot7_y, $this->adjust1_dot6_y, $this->adjust1_dot5_y, $this->adjust1_dot4_y);$y>=min($this->adjust1_dot0_y, $this->adjust1_dot7_y, $this->adjust1_dot6_y, $this->adjust1_dot6_y, $this->adjust1_dot5_y, $this->adjust1_dot4_y);$y--){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y+1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y+2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y+3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust1_dot7_x;$x<=$this->adjust1_dot6_x;$x++){
            $tempy_1 = true;
            for($y=max($this->adjust1_dot6_y, $this->adjust1_dot7_y);$y>=min($this->adjust1_dot6_y, $this->adjust1_dot7_y);$y--){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y+1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y+2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y+3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        //Right
        /* Eyes Liner 0-7 */
        for($x=$this->adjust2_dot0_x;$x<=$this->adjust2_dot4_x;$x++){
            $tempy_1 = true;
            for($y=max($this->adjust2_dot0_y, $this->adjust2_dot7_y, $this->adjust2_dot6_y, $this->adjust2_dot5_y, $this->adjust2_dot4_y);$y>=min($this->adjust2_dot0_y, $this->adjust2_dot7_y, $this->adjust2_dot6_y, $this->adjust2_dot6_y, $this->adjust2_dot5_y, $this->adjust2_dot4_y);$y--){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y+1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y+2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y+3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        imageantialias($this->makeover->tempimage, true);
        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'eyes_liner_01_area.png');

        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'eyes_line_01.png');
        $this->session->set_userdata('NOM_EYES_LINER', '0');
        $response ='NOM = '.$this->session->userdata('NOM_EYES_LINER',true);
        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'NOM_EYES_LINER_01_'.$this->session->userdata('NOM_EYES_LINER',true).'.png');

        echo $this->session->userdata('directory_file',true).'NOM_EYES_LINER_01_'.$this->session->userdata('NOM_EYES_LINER',true).'.png';
    }

    function getEyesLinerType02 () {
        $this->makeover->set_image_liner('eyes_edited.png');
        $this->makeover->set_temp_image();
        $this->setCoordinate();

        imageline($this->makeover->tempimage, $this->adjust1_dot3_x, $this->adjust1_dot3_y, $this->adjust1_dot4_x, $this->adjust1_dot4_y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
        imageline($this->makeover->tempimage, $this->adjust1_dot3_x, $this->adjust1_dot3_y, $this->adjust1_dot4_x, $this->adjust1_dot4_y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
        imageline($this->makeover->tempimage, $this->adjust1_dot3_x, $this->adjust1_dot3_y, $this->adjust1_dot4_x, $this->adjust1_dot4_y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
        
        imageline($this->makeover->tempimage, $this->adjust1_dot5_x, $this->adjust1_dot6_y, $this->adjust1_dot4_x, $this->adjust1_dot4_y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
        imageline($this->makeover->tempimage, $this->adjust1_dot5_x, $this->adjust1_dot6_y, $this->adjust1_dot4_x, $this->adjust1_dot4_y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
        imageline($this->makeover->tempimage, $this->adjust1_dot5_x, $this->adjust1_dot6_y, $this->adjust1_dot4_x, $this->adjust1_dot4_y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
        
        //Right
        imageline($this->makeover->tempimage, $this->adjust2_dot1_x, $this->adjust2_dot1_y, $this->adjust2_dot0_x, $this->adjust2_dot0_y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
        imageline($this->makeover->tempimage, $this->adjust2_dot1_x, $this->adjust2_dot1_y, $this->adjust2_dot0_x, $this->adjust2_dot0_y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
        imageline($this->makeover->tempimage, $this->adjust2_dot1_x, $this->adjust2_dot1_y, $this->adjust2_dot0_x, $this->adjust2_dot0_y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
        
        imageline($this->makeover->tempimage, $this->adjust2_dot7_x, $this->adjust2_dot6_y, $this->adjust2_dot0_x, $this->adjust2_dot0_y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
        imageline($this->makeover->tempimage, $this->adjust2_dot7_x, $this->adjust2_dot6_y, $this->adjust2_dot0_x, $this->adjust2_dot0_y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
        imageline($this->makeover->tempimage, $this->adjust2_dot7_x, $this->adjust2_dot6_y, $this->adjust2_dot0_x, $this->adjust2_dot0_y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));


        imageantialias($this->makeover->tempimage, true);
        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'eyes_liner_02_area.png');

        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'eyes_line_02.png');
        $this->session->set_userdata('NOM_EYES_LINER_02',$this->session->userdata('NOM_EYES',true)+1);
        $response ='NOM = '.$this->session->userdata('NOM_EYES_LINER_02',true);
        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'NOM_EYES_LINER_02_'.$this->session->userdata('NOM_EYES_LINER_02',true).'.png');

        echo $this->session->userdata('directory_file',true).'NOM_EYES_LINER_02_'.$this->session->userdata('NOM_EYES_LINER_02',true).'.png';
    }

    function getEyesLinerType03 () {
        $this->makeover->set_image_liner('eyes_edited.png');
        $this->makeover->set_temp_image();
        $this->setCoordinate();
        //Top
        /* Eyes Liner 0-1*/
        for($x=$this->adjust1_dot0_x; $x<=$this->adjust1_dot1_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust1_dot0_y, $this->adjust1_dot1_y);$y<=max($this->adjust1_dot0_y, $this->adjust1_dot1_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust1_dot1_x; $x<=$this->adjust1_dot2_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust1_dot1_y, $this->adjust1_dot2_y);$y<=max($this->adjust1_dot1_y, $this->adjust1_dot2_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust1_dot2_x; $x<=$this->adjust1_dot3_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust1_dot2_y, $this->adjust1_dot3_y);$y<=max($this->adjust1_dot2_y, $this->adjust1_dot3_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust1_dot3_x; $x<=$this->adjust1_dot4_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust1_dot3_y, $this->adjust1_dot4_y);$y<=max($this->adjust1_dot3_y, $this->adjust1_dot4_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        //Right
        /* Eyes Liner 0-1*/
        for($x=$this->adjust2_dot0_x; $x<=$this->adjust2_dot1_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust2_dot0_y, $this->adjust2_dot1_y);$y<=max($this->adjust2_dot0_y, $this->adjust2_dot1_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust2_dot1_x; $x<=$this->adjust2_dot2_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust2_dot1_y, $this->adjust2_dot2_y);$y<=max($this->adjust2_dot1_y, $this->adjust2_dot2_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust2_dot2_x; $x<=$this->adjust2_dot3_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust2_dot2_y, $this->adjust2_dot3_y);$y<=max($this->adjust2_dot2_y, $this->adjust2_dot3_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust2_dot3_x; $x<=$this->adjust2_dot4_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust2_dot3_y, $this->adjust2_dot4_y);$y<=max($this->adjust2_dot3_y, $this->adjust2_dot4_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        //Bottom
        //Left
        /* Eyes Liner 0-7 */
        for($x=$this->adjust1_dot0_x;$x<=$this->adjust1_dot4_x;$x++){
            $tempy_1 = true;
            for($y=max($this->adjust1_dot0_y, $this->adjust1_dot7_y, $this->adjust1_dot6_y, $this->adjust1_dot5_y, $this->adjust1_dot4_y);$y>=min($this->adjust1_dot0_y, $this->adjust1_dot7_y, $this->adjust1_dot6_y, $this->adjust1_dot6_y, $this->adjust1_dot5_y, $this->adjust1_dot4_y);$y--){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y+1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y+2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y+3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        //Right
        /* Eyes Liner 0-7 */
        for($x=$this->adjust2_dot0_x;$x<=$this->adjust2_dot4_x;$x++){
            $tempy_1 = true;
            for($y=max($this->adjust2_dot0_y, $this->adjust2_dot7_y, $this->adjust2_dot6_y, $this->adjust2_dot5_y, $this->adjust2_dot4_y);$y>=min($this->adjust2_dot0_y, $this->adjust2_dot7_y, $this->adjust2_dot6_y, $this->adjust2_dot6_y, $this->adjust2_dot5_y, $this->adjust2_dot4_y);$y--){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y+1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y+2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y+3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'eyes_liner_03_area.png');

        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'eyes_line_03.png');
        $this->session->set_userdata('NOM_EYES_LINER', '0');
        $response ='NOM = '.$this->session->userdata('NOM_EYES_LINER',true);
        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'NOM_EYES_LINER_03_'.$this->session->userdata('NOM_EYES_LINER',true).'.png');

        echo $this->session->userdata('directory_file',true).'NOM_EYES_LINER_03_'.$this->session->userdata('NOM_EYES_LINER',true).'.png';
    }

    function getEyesLinerType04 () {
        $this->makeover->set_image_liner('eyes_edited.png');
        $this->makeover->set_temp_image();
        $this->setCoordinate();

        /* Eyes Liner 0-1*/
        for($x=$this->adjust1_dot0_x; $x<=$this->adjust1_dot1_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust1_dot0_y, $this->adjust1_dot1_y);$y<=max($this->adjust1_dot0_y, $this->adjust1_dot1_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust1_dot1_x; $x<=$this->adjust1_dot2_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust1_dot1_y, $this->adjust1_dot2_y);$y<=max($this->adjust1_dot1_y, $this->adjust1_dot2_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust1_dot2_x; $x<=$this->adjust1_dot3_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust1_dot2_y, $this->adjust1_dot3_y);$y<=max($this->adjust1_dot2_y, $this->adjust1_dot3_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust1_dot3_x; $x<=$this->adjust1_dot4_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust1_dot3_y, $this->adjust1_dot4_y);$y<=max($this->adjust1_dot3_y, $this->adjust1_dot4_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        //Right
        /* Eyes Liner 0-1*/
        for($x=$this->adjust2_dot0_x; $x<=$this->adjust2_dot1_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust2_dot0_y, $this->adjust2_dot1_y);$y<=max($this->adjust2_dot0_y, $this->adjust2_dot1_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust2_dot1_x; $x<=$this->adjust2_dot2_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust2_dot1_y, $this->adjust2_dot2_y);$y<=max($this->adjust2_dot1_y, $this->adjust2_dot2_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust2_dot2_x; $x<=$this->adjust2_dot3_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust2_dot2_y, $this->adjust2_dot3_y);$y<=max($this->adjust2_dot2_y, $this->adjust2_dot3_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust2_dot3_x; $x<=$this->adjust2_dot4_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust2_dot3_y, $this->adjust2_dot4_y);$y<=max($this->adjust2_dot3_y, $this->adjust2_dot4_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'eyes_liner_04_area.png');

        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'eyes_line_04.png');
        $this->session->set_userdata('NOM_EYES_LINER', '0');
        $response ='NOM = '.$this->session->userdata('NOM_EYES_LINER',true);
        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'NOM_EYES_LINER_04_'.$this->session->userdata('NOM_EYES_LINER',true).'.png');

        echo $this->session->userdata('directory_file',true).'NOM_EYES_LINER_04_'.$this->session->userdata('NOM_EYES_LINER',true).'.png';
    }

    function getEyesLinerType05 () {
        $this->makeover->set_image_liner('eyes_special_edited.png');
        $this->makeover->set_temp_image();
        $this->setCoordinate();

        $dst_h = $this->adjust1_dot0_y-$this->adjust1_dot2_y;
        $dev = $dst_h/2;

        //Top
        /* Eyes Liner 0-1*/
        for($x=$this->adjust1_dot0_x-$dev; $x<=$this->adjust1_dot1_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust1_dot0_y, $this->adjust1_dot1_y);$y<=max($this->adjust1_dot0_y, $this->adjust1_dot1_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust1_dot1_x; $x<=$this->adjust1_dot2_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust1_dot1_y, $this->adjust1_dot2_y);$y<=max($this->adjust1_dot1_y, $this->adjust1_dot2_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust1_dot2_x; $x<=$this->adjust1_dot3_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust1_dot2_y, $this->adjust1_dot3_y);$y<=max($this->adjust1_dot2_y, $this->adjust1_dot3_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust1_dot3_x; $x<=$this->adjust1_dot4_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust1_dot3_y, $this->adjust1_dot4_y);$y<=max($this->adjust1_dot3_y, $this->adjust1_dot4_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        //Right
        /* Eyes Liner 0-1*/
        for($x=$this->adjust2_dot0_x; $x<=$this->adjust2_dot1_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust2_dot0_y, $this->adjust2_dot1_y);$y<=max($this->adjust2_dot0_y, $this->adjust2_dot1_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust2_dot1_x; $x<=$this->adjust2_dot2_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust2_dot1_y, $this->adjust2_dot2_y);$y<=max($this->adjust2_dot1_y, $this->adjust2_dot2_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust2_dot2_x; $x<=$this->adjust2_dot3_x; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust2_dot2_y, $this->adjust2_dot3_y);$y<=max($this->adjust2_dot2_y, $this->adjust2_dot3_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        for($x=$this->adjust2_dot3_x; $x<=$this->adjust2_dot4_x+$dev; $x++){
            $tempy_1 = true;
            for($y=min($this->adjust2_dot3_y, $this->adjust2_dot4_y);$y<=max($this->adjust2_dot3_y, $this->adjust2_dot4_y);$y++){
                $m = imagecolorsforindex($this->makeover->master, imagecolorat($this->makeover->master, $x, $y));
                if($m['green']) {
                    if($tempy_1){
                        $tempy_1=false;
                        imagesetpixel($this->makeover->tempimage, $x, $y, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-1, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-2, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                        imagesetpixel($this->makeover->tempimage, $x, $y-3, imagecolorallocatealpha($this->makeover->tempimage, 255, 0, 0, 0));
                    }
                    
                }
            }
        }

        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'eyes_liner_05_area.png');

        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'eyes_line_05.png');
        $this->session->set_userdata('NOM_EYES_LINER', '0');
        $response = 'NOM = '.$this->session->userdata('NOM_EYES_LINER_05',true);
        imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).'NOM_EYES_LINER_05_'.$this->session->userdata('NOM_EYES_LINER',true).'.png');

        echo $this->session->userdata('directory_file',true).'NOM_EYES_LINER_05_'.$this->session->userdata('NOM_EYES_LINER',true).'.png';
    }

    function setEyesLineColor () {
        $this->makeover->error();
        if ($this->session->userdata('NOM') !== FALSE) {
            $type = $this->input->post('type');

            $name_path = "NOM_EYES_LINER_";
            $name_session = "NOM_EYES_LINER";

            if ($type==1) {
                $source_raw = "eyes_liner_01_area.png";
            } elseif ($type==2) {
                $source_raw = "eyes_liner_02_area.png";
            } elseif ($type==3) {
                $source_raw = "eyes_liner_03_area.png";
            } elseif ($type==4) {
                $source_raw = "eyes_liner_04_area.png";
            } elseif ($type==5) {
                $source_raw = "eyes_liner_05_area.png";
            }

            $this->makeover->set_image_master(null, null, $source_raw);
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

            // Display the result
            header('Content-type: image/png');

            imagepng($this->makeover->tempimage,$this->session->userdata('directory_file',true).$name_path.($this->session->userdata($name_session,true)+1).'.png');
            
            try {
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
                if ($this->session->userdata('NOM_FACE') !== '0' && $this->session->userdata('NOM_FACE') !== FALSE) {
                    //try {
                        $master_face = imagecreatefrompng($this->session->userdata('directory_file',true).'NOM_FACE_'.$this->session->userdata('NOM_FACE', true).'.png');
                        $merge = imagecopymerge($this->makeover->raw, $master_face, 0, 0, 0, 0, $this->makeover->w, $this->makeover->h, 100);
                        
                    // } catch (Exception $e) {
                    //     $this->session->sess_destroy();
                    //     $this->session->set_flashdata('error', 'Terjadi kesalahan coba upload poto ulang!');
                    //     redirect('/', 'refresh');
                    // }
                    
                };
                if ($this->session->userdata('NOM_CHEEKS') !== '0' && $this->session->userdata('NOM_CHEEKS') !== FALSE) {
                    //try {
                        $master_cheeks = imagecreatefrompng($this->session->userdata('directory_file',true).'NOM_CHEEKS_'.$this->session->userdata('NOM_CHEEKS',true).'.png');
                        imagecopymerge($this->makeover->raw, $master_cheeks, 0, 0, 0, 0, $this->makeover->w, $this->makeover->h, 100);
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

            $this->session->set_userdata('NOM',$this->session->userdata('NOM',true)+1);

            $this->session->set_userdata($name_session,$this->session->userdata($name_session,true)+1);
            $response ='NOM = '.$this->session->userdata($name_session,true);
            echo $this->session->userdata('directory_file',true).$this->session->userdata('NOM',true).'.png';
        } else {
            echo false;
        }
    }

}