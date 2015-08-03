<html>
    <head>
        <!-- <title>OSM</title> -->
        <meta content="" name="description">
        <meta content="" name="keywords">
        <meta content="index, nofollow" name="robots">
        <meta content="7 days" name="revisit-after">
        <meta content="general" name="rating">
        <meta content="id" name="geo.country">
        <meta content="Indonesia" name="geo.placename">
        <meta content="Label Ideas &amp; Co." name="author">
        <meta content="all" name="Slurp">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

        <link rel="icon" type="image/png" href="<?php echo base_url() . 'asset/client/'; ?>img/favicon.png">

        <!-- Font -->
        <link href="<?php echo base_url() . 'asset/client/'; ?>fonts/DinMediumAlternate/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'asset/client/'; ?>fonts/din/styles.css" rel="stylesheet" type="text/css">        
        <link href="<?php echo base_url() . 'asset/client/'; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'asset/client/'; ?>css/queryLoader.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'asset/client/'; ?>css/style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'asset/client/'; ?>css/template.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'asset/client/'; ?>plugin/mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">        
        <link href="<?php echo base_url() . 'asset/client/'; ?>plugin/socialMedia/slide-social-buttons.css" rel="stylesheet" type="text/css"> 

        <script src="<?php echo base_url() . 'asset/client/'; ?>js/jquery.1.10.2.min.js?dev=<?php echo rand(10, 100); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'asset/client/'; ?>js/bootstrap.min.js?dev=<?php echo rand(10, 100); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'asset/client/'; ?>js/script.js?dev=<?php echo rand(10, 100); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'asset/client/'; ?>js/eyes.js?dev=<?php echo rand(10, 100); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'asset/client/'; ?>js/jquery.queryloader2.js?dev=<?php echo rand(10, 100); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'asset/client/'; ?>plugin/mCustomScrollbar/jquery.mCustomScrollbar.js?dev=<?php echo rand(10, 100); ?>"></script>
        <script src="<?php echo base_url() . 'asset/client/'; ?>js/ajaxfileupload.js?dev=<?php echo rand(10, 100); ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("body").queryLoader2({
                    barColor: "#b09847",
                    backgroundColor: "#ffffff",
                    percentage: true,
                    barHeight: 10,
                    minimumTime: 1000,
                    onLoadComplete: load()
                });
            });
        </script>
    </head>
    <body id="body">
        <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        <header id="main_header">
            <div id="primary_nav">
                <ul>
                    <li class="active">Start Makeup</li>
                    <li>What's New</li>
                    <li>Product</li>
                    <li>Makeup Tips</li>
                </ul>
            </div>
            <div class="secondary_nav">
                <ul>
                    <li onclick="openMakeupPanel('powder_panel')" class="active">Face</li>
                    <li onclick="openMakeupPanel('blush_panel')">Cheeks</li>
                    <li onclick="openMakeupPanel('eyeliner_panel')">Eyes</li>
                    <li onclick="openMakeupPanel('lips_panel')">Lips</li>
                </ul>
            </div>
        </header>
        <div id="makeuproom_wrapper">
            <div id="photo_canvas" class="col-sm-5">
                <header id="header_photo">
                    <div id="addLayer">
                        <img src="<?php echo base_url() . 'asset/client/'; ?>img/icon_add.png" class="icon" onclick="$('#takePicture').modal();">
                    </div>
                    <div id="back">
                        <img src="<?php echo base_url() . 'asset/client/'; ?>img/icon_back.png" class="icon">
                    </div>
                    <div id="addLayer">
                        <img src="<?php echo base_url() . 'asset/client/'; ?>img/icon_forward.png" class="icon">
                    </div>

                </header>
                <div id="photo">
                    <img src="<?php echo base_url() . 'asset/client/'; ?>img/face.jpg" style="width:100%">
                </div>
                <div id="zoom_wrapper">
                    <input type=range min="1" max="3" value="1" id="zoom" step="0.001" oninput="zoomImage($('#zoom').val())">
                    <!-- <input type=range min="0" max="100" value="0" id="zoom" step="0.01" onchange="console.log($('#zoom').val()+'%')"> -->
                </div>
                <div id="loading2"></div>
                <footer id="footer_photo">
                    <div id="saveFile">
                        <span><img src="<?php echo base_url() . 'asset/client/'; ?>img/icon_save.png" class="icon"></span><button id="save" onClick="parent.location='<?php echo base_url() . 'makeovers/makeover/download'; ?>'">Save File</button>
                    </div>

                    <div id="share" data-toggle="modal" data-target="#mediumModal">
                        <span><img src="<?php echo base_url() . 'asset/client/'; ?>img/icon_share.png" class="icon"></span><button id="save">Share</button>
                    </div>

                    <div id="beforeAfter" class="gotomodal" href="<?php echo base_url().'makeovers/makeover/before_after' ?>">
                        <span><img src="<?php echo base_url() . 'asset/client/'; ?>img/icon_before_after.png" class="icon"></span><button id="save">Before | After</button>
                    </div>
                </footer>
            </div>
            <div id="makeup_canvas" class="col-sm-7">
                <div class="col-sm-12" id="makeup_panel">
                    <div id="powder_panel" class="active">
                        <div class="col-sm-6">
                            <!-- Start Face -->

                            <div class="row col-sm-12 makeup_color active" id="powder_color">
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Powder</h4>
                                    <p>Please select color and other options</p>
                                </div>
                                <div class="col-sm-12 col-xs-12">

                                    <div class="col-xs-12 col-sm-6 no_padding product_item active"  type="1" onclick="$('#ccream_color .product_item').removeClass('active');$(this).addClass('active');facecolor(242, 211, 165, 'makeovers/face/facecolor/', $(this).attr('type'));">
                                        <div class="product">
                                            <div class="increment_number">
                                                01
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/powder/powder/powder_02.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Powder 1
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#ccream_color .product_item').removeClass('active');$(this).addClass('active');facecolor(245, 205, 153, 'makeovers/face/facecolor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                02
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/powder/powder/powder_02.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Powder 2
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#ccream_color .product_item').removeClass('active');$(this).addClass('active');facecolor(239, 192, 140, 'makeovers/face/facecolor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                03
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/powder/powder/powder_03.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Powder 3
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#ccream_color .product_item').removeClass('active');$(this).addClass('active');facecolor(244, 211, 158, 'makeovers/face/facecolor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                04
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/powder/powder/powder_04.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Powder 4
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- End of #powder_color -->

                            <div class="row col-sm-12 makeup_color" id="ccream_color" hidden>
                                <div class="col-sm-12 col-xs-12">
                                    <h4>CCream</h4>
                                    <p>Please select color and other options</p>
                                </div>
                                <div class="col-sm-12 col-xs-12">

                                    <div class="col-xs-12 col-sm-6 no_padding product_item active"  type="1" onclick="$('#ccream_color .product_item').removeClass('active');$(this).addClass('active');facecolor(224, 184, 125, 'makeovers/face/facecolor/', $(this).attr('type'));">
                                        <div class="product">
                                            <div class="increment_number">
                                                01
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/powder/ccream/cream_02.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                CCream 1
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#ccream_color .product_item').removeClass('active');$(this).addClass('active');facecolor(229, 169, 93, 'makeovers/face/facecolor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                02
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/powder/ccream/cream_02.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                CCream 2
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#ccream_color .product_item').removeClass('active');$(this).addClass('active');facecolor(231, 172, 207, 'makeovers/face/facecolor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                03
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/powder/ccream/cream_03.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                CCream 3
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#ccream_color .product_item').removeClass('active');$(this).addClass('active');facecolor(231, 159, 999, 'makeovers/face/facecolor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                04
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/powder/ccream/cream_04.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                CCream 4
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End of #powder_color -->

                            <div class="row col-sm-12 makeup_color" id="concealer_color" hidden>
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Concealer</h4>
                                    <p>Please select color and other options</p>
                                </div>
                                <div class="col-sm-12 col-xs-12">

                                    <div class="col-xs-12 col-sm-6 no_padding product_item active"  type="1" onclick="$('#concealer .product_item').removeClass('active');$(this).addClass('active');facecolor(239, 217, 186, 'makeovers/face/facecolor/', $(this).attr('type'));">
                                        <div class="product">
                                            <div class="increment_number">
                                                01
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/powder/concealer/concealer_02.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Pink Pearl
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#concealer .product_item').removeClass('active');$(this).addClass('active');facecolor(234, 199, 157, 'makeovers/face/facecolor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                02
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/powder/concealer/concealer_02.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Summer Rose
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#concealer .product_item').removeClass('active');$(this).addClass('active');facecolor(222, 179, 145, 'makeovers/face/facecolor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                03
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/powder/concealer/concealer_02.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Nude Bliss
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#concealer .product_item').removeClass('active');$(this).addClass('active');facecolor(206, 160, 127, 'makeovers/face/facecolor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                04
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/powder/concealer/concealer_02.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Spring Crush
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- End of #powder_color -->

                            <div class="row col-sm-12 color_opacity" id="color_opacity_blush">
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Color Opacity</h4>
                                    <p>Please select color and other options</p>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <input type=range min="40" max="100" value="70" value="70" id="opacity_eyeliner" class="opacity" step="1">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row col-sm-12 makeup_design" id="powder_design">
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Powder Design</h4>
                                    <p>Please select color and other options</p>
                                </div>
                                <div class="col-sm-12 col-xs-12">

                                    <div class="col-xs-12 col-sm-6 no_padding design_item active" onclick="$('#powder_panel .design_item').removeClass('active');$(this).addClass('active'); $('#powder_color').css('display','block'); $('#ccream_color').css('display','none'); $('#concealer_color').css('display','none'); $('#powder_panel #powder_color .product_item').attr('type', '1');">
                                        <div class="product">
                                            <div class="increment_number">
                                                01
                                            </div>
                                            <div class="col-xs-12">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/powder/powder/powder_01.png" class="width">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding design_item" onclick="$('#powder_panel .design_item').removeClass('active');$(this).addClass('active'); $('#powder_color').css('display','none'); $('#ccream_color').css('display','block'); $('#concealer_color').css('display','none'); $('#powder_panel #ccream_color .product_item').attr('type', '2');">
                                        <div class="product">
                                            <div class="increment_number">
                                                02
                                            </div>
                                            <div class="col-xs-12">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/powder/ccream/cream_01.png" class="width">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding design_item" onclick="$('#powder_panel .design_item').removeClass('active');$(this).addClass('active'); $('#powder_color').css('display','none'); $('#ccream_color').css('display','none'); $('#concealer_color').css('display','block'); $('#powder_panel #concealer_color .product_item').attr('type', '3');">
                                        <div class="product">
                                            <div class="increment_number">
                                                03
                                            </div>
                                            <div class="col-xs-12">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/powder/concealer/concealer_01.png" class="width">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- End of #blush_design -->

                            <div class="row col-sm-12 suggested" id="sugessted_brush">
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Suggested brush</h4>
                                    <p>Please select color and other options</p>
                                </div>
                                <div class="col-sm-12 col-xs-12" id="sugessted_brush_icon">
                                    <img src="<?php echo base_url() . 'asset/client/'; ?>img/brush3.png" class="suggested_brush active" onclick="changeBrush(1)">
                                    <img src="<?php echo base_url() . 'asset/client/'; ?>img/brush2.png" class="suggested_brush" onclick="changeBrush(2)">
                                </div>
                            </div>
                        </div>
                    </div>  <!-- #powder_panel -->

                    <div id="blush_panel">
                        <div class="col-sm-6">
                            <!-- Start Cheeks -->

                            <div class="row col-sm-12 makeup_color" id="blush_color">
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Blush</h4>
                                    <p>Please select color and other options</p>
                                </div>
                                <div class="col-sm-12 col-xs-12">

                                    <div class="col-xs-12 col-sm-6 no_padding product_item active"  type="1" onclick="$('#blush_panel .product_item').removeClass('active');$(this).addClass('active');cheekscolor(231, 172, 207, 'makeovers/cheeks/cheekscolor/', $(this).attr('type'));">
                                        <div class="product">
                                            <div class="increment_number">
                                                01
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/blush1.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Pink Pearl
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#blush_panel .product_item').removeClass('active');$(this).addClass('active');cheekscolor(231, 172, 207, 'makeovers/cheeks/cheekscolor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                02
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/blush2.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Summer Rose
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#blush_panel .product_item').removeClass('active');$(this).addClass('active');cheekscolor(231, 172, 207, 'makeovers/cheeks/cheekscolor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                03
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/blush3.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Nude Bliss
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#blush_panel .product_item').removeClass('active');$(this).addClass('active');cheekscolor(231, 172, 207, 'makeovers/cheeks/cheekscolor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                04
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/blush4.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Spring Crush
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#blush_panel .product_item').removeClass('active');$(this).addClass('active');cheekscolor(231, 172, 207, 'makeovers/cheeks/cheekscolor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                05
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/blush1.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Pink Pearl
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#blush_panel .product_item').removeClass('active');$(this).addClass('active');cheekscolor(231, 172, 207, 'makeovers/cheeks/cheekscolor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                06
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/blush2.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Summer Rose
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#blush_panel .product_item').removeClass('active');$(this).addClass('active');cheekscolor(231, 172, 207, 'makeovers/cheeks/cheekscolor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                07
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/blush3.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Nude Bliss
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#blush_panel .product_item').removeClass('active');$(this).addClass('active');cheekscolor(231, 172, 207, 'makeovers/cheeks/cheekscolor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                08
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/blush4.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Spring Crush
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- End of #blush_color -->

                            <div class="row col-sm-12 color_opacity" id="color_opacity_blush">
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Color Opacity</h4>
                                    <p>Please select color and other options</p>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <input type=range min="40" max="100" value="70" value="70" id="opacity_eyeliner" class="opacity" step="1">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row col-sm-12 makeup_design" id="blush_design">
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Blush Design</h4>
                                    <p>Please select color and other options</p>
                                </div>
                                <div class="col-sm-12 col-xs-12">

                                    <div class="col-xs-12 col-sm-6 no_padding design_item" onclick="$('#blush_panel .design_item').removeClass('active');$(this).addClass('active');$('#blush_panel #blush_color .product_item').attr('type', '1');">
                                        <div class="product">
                                            <div class="increment_number">
                                                01
                                            </div>
                                            <div class="col-xs-12">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/blush_design1.jpg" class="width">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding design_item" onclick="$('#blush_panel .design_item').removeClass('active');$(this).addClass('active');$('#blush_panel #blush_color .product_item').attr('type', '2');">
                                        <div class="product">
                                            <div class="increment_number">
                                                02
                                            </div>
                                            <div class="col-xs-12">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/blush_design2.jpg" class="width">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding design_item" onclick="$('#blush_panel .design_item').removeClass('active');$(this).addClass('active');$('#blush_panel #blush_color .product_item').attr('type', '3');">
                                        <div class="product">
                                            <div class="increment_number">
                                                03
                                            </div>
                                            <div class="col-xs-12">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/blush_design3.jpg" class="width">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding design_item" onclick="$('#blush_panel .design_item').removeClass('active');$(this).addClass('active');$('#blush_panel #blush_color .product_item').attr('type', '4');">
                                        <div class="product">
                                            <div class="increment_number">
                                                04
                                            </div>
                                            <div class="col-xs-12">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/blush_design4.jpg" class="width">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding design_item" onclick="$('#blush_panel .design_item').removeClass('active');$(this).addClass('active');$('#blush_panel #blush_color .product_item').attr('type', '5');">
                                        <div class="product">
                                            <div class="increment_number">
                                                05
                                            </div>
                                            <div class="col-xs-12">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/blush_design1.jpg" class="width">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- End of #blush_design -->

                            <div class="row col-sm-12 suggested" id="sugessted_brush">
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Suggested brush</h4>
                                    <p>Please select color and other options</p>
                                </div>
                                <div class="col-sm-12 col-xs-12" id="sugessted_brush_icon">
                                    <img src="<?php echo base_url() . 'asset/client/'; ?>img/brush3.png" class="suggested_brush active" onclick="changeBrush(1)">
                                    <img src="<?php echo base_url() . 'asset/client/'; ?>img/brush2.png" class="suggested_brush" onclick="changeBrush(2)">
                                </div>
                            </div>
                        </div>
                    </div>  <!-- #blush_panel -->

                    <div id="eyeliner_panel">
                        <div class="col-sm-6">
                            <div class="row col-sm-12 makeup_color" id="eyeliner_color">
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Eye Liner</h4>
                                    <p>Please select color and other options</p>
                                </div>
                                <div class="col-sm-12 col-xs-12">

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#eyeliner_panel .product_item').removeClass('active');$(this).addClass('active');eyeslinecolor(19, 19, 19, 'makeovers/eyes/setEyesLineColor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                01
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/eye_liner1.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Black Pencil
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#eyeliner_panel .product_item').removeClass('active');
                                            $(this).addClass('active');
                                            eyeslinecolor(91, 91, 91, 'makeovers/eyes/setEyesLineColor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                02
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/eye_liner2.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Summer Rose
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#eyeliner_panel .product_item').removeClass('active');
                                            $(this).addClass('active');
                                            eyeslinecolor(49, 9, 12, 'makeovers/eyes/setEyesLineColor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                03
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/eye_liner3.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Nude Bliss
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#eyeliner_panel .product_item').removeClass('active');
                                            $(this).addClass('active');
                                            eyeslinecolor(20, 34, 98, 'makeovers/eyes/setEyesLineColor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                04
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/eye_liner4.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Spring Crush
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#eyeliner_panel .product_item').removeClass('active');
                                            $(this).addClass('active');
                                            eyeslinecolor(48, 8, 12, 'makeovers/eyes/setEyesLineColor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                05
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/eye_liner5.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Pink Pearl
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#eyeliner_panel .product_item').removeClass('active');
                                            $(this).addClass('active');
                                            eyeslinecolor(55, 55, 55, 'makeovers/eyes/setEyesLineColor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                06
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/eye_liner6.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Summer Rose
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#eyeliner_panel .product_item').removeClass('active'); $(this).addClass('active'); eyeslinecolor(19, 19, 19, 'makeovers/eyes/eyeslinecolor/', 1)">
                                        <div class="product">
                                            <div class="increment_number">
                                                07
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/eye_liner1.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Nude Bliss
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#eyeliner_panel .product_item').removeClass('active');
                                            $(this).addClass('active');
                                            eyeslinecolor(91, 91, 91, 'makeovers/eyes/eyeslinecolor/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                08
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/eye_liner2.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Spring Crush
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- End of #blush_color -->

                            <div class="row col-sm-12 color_opacity" id="color_opacity_eyeliner">
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Color Opacity</h4>
                                    <p>Please select color and other options</p>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <input type=range min="0" max="1" id="opacity_eyeliner" class="opacity" step="0.01">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row col-sm-12 makeup_design" id="eyeliner_design">
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Eye Liner Design</h4>
                                    <p>Please select color and other options</p>
                                </div>
                                <div class="col-sm-12 col-xs-12">

                                    <div class="col-xs-12 col-sm-6 no_padding design_item active" onclick="$('#eyeliner_panel .design_item').removeClass('active');$(this).addClass('active');$('#eyeliner_panel #eyeliner_color .product_item').attr('type', '1');">
                                        <div class="product">
                                            <div class="increment_number">
                                                01
                                            </div>
                                            <div class="col-xs-12">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/eye_design1.png" class="width">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding design_item" onclick="$('#eyeliner_panel .design_item').removeClass('active');$(this).addClass('active');$('#eyeliner_panel #eyeliner_color .product_item').attr('type', '2');">
                                        <div class="product">
                                            <div class="increment_number">
                                                02
                                            </div>
                                            <div class="col-xs-12">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/eye_design2.png" class="width" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding design_item" onclick="$('#eyeliner_panel .design_item').removeClass('active');$(this).addClass('active');$('#eyeliner_panel #eyeliner_color .product_item').attr('type', '3');">
                                        <div class="product">
                                            <div class="increment_number">
                                                03
                                            </div>
                                            <div class="col-xs-12">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/eye_design3.png" class="width" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding design_item" onclick="$('#eyeliner_panel .design_item').removeClass('active');$(this).addClass('active');$('#eyeliner_panel #eyeliner_color .product_item').attr('type', '4');">
                                        <div class="product">
                                            <div class="increment_number">
                                                04
                                            </div>
                                            <div class="col-xs-12">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/eye_design4.png" class="width" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding design_item" onclick="$('#eyeliner_panel .design_item').removeClass('active');$(this).addClass('active');$('#eyeliner_panel #eyeliner_color .product_item').attr('type', '5');">
                                        <div class="product">
                                            <div class="increment_number">
                                                05
                                            </div>
                                            <div class="col-xs-12">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/eye_design5.png" class="width">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- End of #blush_design -->

                            <div class="row col-sm-12 suggested" id="sugessted_eyeliner">
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Suggested Eye Liner</h4>
                                    <p>Please select color and other options</p>
                                </div>
                                <div class="col-sm-12 col-xs-12" id="sugessted_brush_icon">
                                    <img src="<?php echo base_url() . 'asset/client/'; ?>img/brush3.png" class="suggested_brush active" onclick="changeBrush(1)">
                                    <img src="<?php echo base_url() . 'asset/client/'; ?>img/brush2.png" class="suggested_brush" onclick="changeBrush(2)">
                                </div>
                            </div>
                        </div>
                    </div>  <!-- #eyeliner_panel -->

                    <!--- #lips_panel -->
                    <div id="lips_panel">
                        <div class="col-sm-6">
                            <div class="row col-sm-12 makeup_color" id="lips_color">
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Lips Color</h4>
                                    <p>Please select color and other options</p>
                                </div>
                                <div class="col-sm-12 col-xs-12">

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#lips_color .product_item').removeClass('active');
                                            $(this).addClass('active');
                                            lipscolor(163, 108, 105, 'makeovers/lips/setLips/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                01
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/lips_color1.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Skinny dip
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#lips_color .product_item').removeClass('active');
                                            $(this).addClass('active');
                                            lipscolor(184, 113, 121, 'makeovers/lips/setLips/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                02
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/lips_color2.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Sassy
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#lips_color .product_item').removeClass('active');
                                            $(this).addClass('active');
                                            lipscolor(223, 87, 93, 'makeovers/lips/setLips/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                03
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/lips_color3.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Show Stopper
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#lips_color .product_item').removeClass('active');
                                            $(this).addClass('active');
                                            lipscolor(180, 113, 121, 'makeovers/lips/setLips/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                04
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/lips_color3.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                First Kiss
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#lips_color .product_item').removeClass('active');
                                            $(this).addClass('active');
                                            lipscolor(141, 79, 90, 'makeovers/lips/setLips/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                05
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/lips_color3.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Forget Me Not
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#lips_color .product_item').removeClass('active');
                                            $(this).addClass('active');
                                            lipscolor(165, 76, 78, 'makeovers/lips/setLips/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                06
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/lips_color3.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Vintage
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#lips_color .product_item').removeClass('active');
                                            $(this).addClass('active');
                                            lipscolor(115, 69, 71, 'makeovers/lips/setLips/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                07
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/lips_color3.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Brazilian nut
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding product_item" type="1" onclick="$('#lips_color .product_item').removeClass('active');
                                            $(this).addClass('active');
                                            lipscolor(209, 55, 93, 'makeovers/lips/setLips/', $(this).attr('type'))">
                                        <div class="product">
                                            <div class="increment_number">
                                                08
                                            </div>
                                            <div class="product_image">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/lips_color3.png" class="width">
                                            </div>
                                            <div class="product_name">
                                                Passion
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- End of #Lips_color -->

                            <div class="row col-sm-12 color_opacity" id="color_opacity">
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Color Opacity</h4>
                                    <p>Please select color and other options</p>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <input type=range min="40" max="100" value="70" id="opacity_lips" onchange="$('#lips_color .active').click()" class="opacity" step="1">
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="row col-sm-12 makeup_design" id="lips_design">
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Lips Design</h4>
                                    <p>Please select color and other options</p>
                                </div>
                                <div class="col-sm-12 col-xs-12">

                                    <div class="col-xs-12 col-sm-6 no_padding design_item active" onclick="$('#lips_panel .design_item').removeClass('active');$(this).addClass('active');$('#lips_panel #lips_color .product_item').attr('type', '1');">
                                        <div class="product">
                                            <div class="increment_number">
                                                01
                                            </div>
                                            <div class="col-xs-12">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/lips_design1.png" class="width">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 no_padding design_item" onclick="$('#lips_panel .design_item').removeClass('active');$(this).addClass('active');$('#lips_panel #lips_color .product_item').attr('type', '2');">
                                        <div class="product">
                                            <div class="increment_number">
                                                02
                                            </div>
                                            <div class="col-xs-12">
                                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/lips_design2.png" class="width">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- End of #blush_design -->

                            <!-- <div class="row col-sm-12 suggested" id="sugessted_eyeliner">
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Suggested Lips Color</h4>
                                    <p>Please select color and other options</p>
                                </div>
                                <div class="col-sm-12 col-xs-12" id="sugessted_brush_icon">
                                    <img src="<?php echo base_url() . 'asset/client/'; ?>img/brush3.png" class="suggested_brush active" onclick="changeBrush(1)">
                                    <img src="<?php echo base_url() . 'asset/client/'; ?>img/brush2.png" class="suggested_brush" onclick="changeBrush(2)">
                                </div>
                            </div> -->
                        </div>
                    </div>  <!-- #lips_panel -->

                </div>      <!-- #makeup_panel -->
                <div id="button_section" class="col-xs-12">
                    <div class="col-sm-6">
                        <div id="fullMakeUp">
                            <span><img src="<?php echo base_url() . 'asset/client/'; ?>img/icon_full_make_up.png" class="icon"></span><button id="save">Full Make Up</button>
                        </div>
                    </div>
                </div>
            </div>      <!-- #makeup_canvas -->
        </div> <!--  #makeuproom_wrapper -->
        <div class="col-sm-12" id="product_detail">
            <ul class="nav nav-tabs" role="tablist" id="myTab">
                <li role="presentation"><a href="<?php echo base_url() . 'asset/client/'; ?>#product_history" aria-controls="home" role="tab" data-toggle="tab">Product History</a></li>
                <li role="presentation" class="active"><a href="<?php echo base_url() . 'asset/client/'; ?>#product_on_you" aria-controls="profile" role="tab" data-toggle="tab">Products On You</a></li>
                <li role="presentation"><a href="<?php echo base_url() . 'asset/client/'; ?>#product_review" aria-controls="messages" role="tab" data-toggle="tab">Product Review</a></li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane" id="product_history">
                    <div class="col-xs-12">

                        <div class="col-sm-4">
                            <div class="cart_product_image">
                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/product1.png">
                            </div>
                            <div class="cart_product_detail">
                                <div class="col-sm-12 col-xs-12">
                                    <p>
                                        Base Shade : Autumn
                                    </p>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <span class="addCart">
                                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="addCartLink">Add to cart</a>
                                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="deleteFromCart">X</a>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="cart_product_image">
                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/product2.png">
                            </div>
                            <div class="cart_product_detail">
                                <div class="col-sm-12 col-xs-12">
                                    <p>
                                        Lip Definer
                                    </p>
                                    <p>
                                        Shade : Crimson
                                    </p>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <span class="addCart">
                                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="addCartLink">Add to cart</a>
                                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="deleteFromCart">X</a>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="cart_product_image">
                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/product3.png">
                            </div>
                            <div class="cart_product_detail">
                                <div class="col-sm-12 col-xs-12">
                                    <p>
                                        Bcol-sm-12 gel
                                    </p>
                                    <p>
                                        Shade : Brunette
                                    </p>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <span class="addCart">
                                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="addCartLink">Add to cart</a>
                                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="deleteFromCart">X</a>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div role="tabpanel" class="tab-pane active" id="product_on_you">
                    <div class="col-xs-12">

                        <div class="col-sm-4">
                            <div class="cart_product_image">
                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/product1.png">
                            </div>
                            <div class="cart_product_detail">
                                <div class="col-sm-12 col-xs-12">
                                    <p>
                                        Base Shade : Autumn
                                    </p>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <span class="addCart">
                                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="addCartLink">Add to cart</a>
                                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="deleteFromCart">X</a>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="cart_product_image">
                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/product2.png">
                            </div>
                            <div class="cart_product_detail">
                                <div class="col-sm-12 col-xs-12">
                                    <p>
                                        Lip Definer
                                    </p>
                                    <p>
                                        Shade : Crimson
                                    </p>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <span class="addCart">
                                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="addCartLink">Add to cart</a>
                                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="deleteFromCart">X</a>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="cart_product_image">
                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/product3.png">
                            </div>
                            <div class="cart_product_detail">
                                <div class="col-sm-12 col-xs-12">
                                    <p>
                                        Bcol-sm-12 gel
                                    </p>
                                    <p>
                                        Shade : Brunette
                                    </p>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <span class="addCart">
                                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="addCartLink">Add to cart</a>
                                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="deleteFromCart">X</a>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-12" style="text-align:center;margin-top:50px;">
                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="seeAllLink">
                            See All
                        </a>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="product_review">
                    <div class="col-xs-12">

                        <div class="col-sm-4">
                            <div class="cart_product_image">
                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/product1.png">
                            </div>
                            <div class="cart_product_detail">
                                <div class="col-sm-12 col-xs-12">
                                    <p>
                                        Base Shade : Autumn
                                    </p>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <span class="addCart">
                                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="addCartLink">Add to cart</a>
                                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="deleteFromCart">X</a>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="cart_product_image">
                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/product2.png">
                            </div>
                            <div class="cart_product_detail">
                                <div class="col-sm-12 col-xs-12">
                                    <p>
                                        Lip Definer
                                    </p>
                                    <p>
                                        Shade : Crimson
                                    </p>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <span class="addCart">
                                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="addCartLink">Add to cart</a>
                                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="deleteFromCart">X</a>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="cart_product_image">
                                <img src="<?php echo base_url() . 'asset/client/'; ?>img/product3.png">
                            </div>
                            <div class="cart_product_detail">
                                <div class="col-sm-12 col-xs-12">
                                    <p>
                                        Bcol-sm-12 gel
                                    </p>
                                    <p>
                                        Shade : Brunette
                                    </p>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <span class="addCart">
                                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="addCartLink">Add to cart</a>
                                        <a href="<?php echo base_url() . 'asset/client/'; ?>#" class="deleteFromCart">X</a>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>      <!-- #product_detail -->

        <!-- Modal Take a Picture -->
        <div class="modal fade" id="takePicture" tabindex="-1" role="dialog" aria-labelledby="takePictureLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-6 upload-file-wrapper">
                            <button type="button" class="btn btn-primary col-xs-12" data-dismiss="modal">Upload</button>
                            <!-- <form action="<?php base_url() . 'makeover/ajaxUpload2' ?>" method="post" id="form_upload" enctype="multipart/form-data"> -->
                            <input type="file" name="fileToUpload" class="upload-file" id="fileToUpload" style="position:absolute;opacity:0;" accept="image/*" />
                            <!-- </form> -->
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary col-xs-12 webcam">Take a Picture</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Camera -->
        <div class="modal fade" id="camera" tabindex="-1" role="dialog" aria-labelledby="takePictureLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeWebcam"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="camera-modal">
                            <video autoplay width="1054" height="790"></video>
                            <a class="btn capture btn-primary" href="#">Capture</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Adjust -->
        <div class="modal fade" id="adjustModal" tabindex="-1" role="dialog" aria-labelledby="takePictureLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeWebcam"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>
                    <div class="modal-body">
                        <div role="tabpanel">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist" id="adjust_tab">
                                <li role="presentation" class="active"><a href="#face" aria-controls="face" role="tab" data-toggle="tab">Face</a></li>
                                <li role="presentation"><a href="#left_eye" aria-controls="left_eye" role="tab" data-toggle="tab">Left Eye</a></li>
                                <li role="presentation"><a href="#right_eye" aria-controls="right_eye" role="tab" data-toggle="tab">Right Eye</a></li>
                                <li role="presentation"><a href="#left_eyebrow" aria-controls="left_eyebrow" role="tab" data-toggle="tab">Left Eyebrow</a></li>
                                <li role="presentation"><a href="#right_eyebrow" aria-controls="right_eyebrow" role="tab" data-toggle="tab">Right Eyebrow</a></li>
                                <li role="presentation"><a href="#lips" aria-controls="lips" role="tab" data-toggle="tab">Lips</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane active" id="face">
                                    <div id="adjust_guide0" class="col-sm-6">
                                        <img src="<?php echo base_url() . 'asset/client/img/adjust_guide/face.png'; ?>" id="face_guide">
                                    </div>
                                    <div id="adjust_point0" class="col-sm-6">
                                        <div id="adjust0_image" class="adjust_img">
                                            <img src="<?php echo base_url() . 'asset/client/img/face_none.jpg'; ?>" id="adjust0_image0">
                                        </div>
                                        <div id="point0" class="point_wrapper">
                                            <div id="tempScale1" style="display:none"></div>
                                            <div id="adjust0_dot0"></div>
                                            <div id="adjust0_dot1"></div>
                                            <div id="adjust0_dot2"></div>
                                            <div id="adjust0_dot3"></div>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="left_eye">
                                    <div id="adjust_guide1" class="col-sm-6">
                                        <img src="<?php echo base_url() . 'asset/client/img/adjust_guide/left_eye.png'; ?>" id="left_eye_guide">
                                    </div>
                                    <div id="adjust_point1" class="col-sm-6">
                                        <div id="adjust1_image" class="adjust_img">
                                            <img src="<?php echo base_url() . 'asset/client/img/face_none.jpg'; ?>" id="adjust1_image0">
                                        </div>
                                        <div id="point1" class="point_wrapper">
                                            <div id="tempScale2" style="display:none"></div>
                                            <div id="adjust1_dot0"></div>
                                            <div id="adjust1_dot1" style="display:none"></div>
                                            <div id="adjust1_dot2"></div>
                                            <div id="adjust1_dot3" style="display:none"></div>
                                            <div id="adjust1_dot4"></div>
                                            <div id="adjust1_dot5" style="display:none"></div>
                                            <div id="adjust1_dot6"></div>
                                            <div id="adjust1_dot7" style="display:none"></div>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="right_eye">
                                    <div id="adjust_guide2" class="col-sm-6">
                                        <img src="<?php echo base_url() . 'asset/client/img/adjust_guide/right_eye.png'; ?>" id="right_eye_guide">
                                    </div>
                                    <div id="adjust_point2" class="col-sm-6">
                                        <div id="adjust2_image" class="adjust_img">
                                            <img src="<?php echo base_url() . 'asset/client/img/face_none.jpg'; ?>" id="adjust2_image0">
                                        </div>
                                        <div id="point2" class="point_wrapper">
                                            <div id="tempScale3" style="display:none"></div>
                                            <div id="adjust2_dot0"></div>
                                            <div id="adjust2_dot1" style="display:none"></div>
                                            <div id="adjust2_dot2"></div>
                                            <div id="adjust2_dot3" style="display:none"></div>
                                            <div id="adjust2_dot4"></div>
                                            <div id="adjust2_dot5" style="display:none"></div>
                                            <div id="adjust2_dot6"></div>
                                            <div id="adjust2_dot7" style="display:none"></div>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="left_eyebrow">
                                    <div id="adjust_guide3" class="col-sm-6">
                                        <img src="<?php echo base_url() . 'asset/client/img/adjust_guide/left_eyebrow.png'; ?>" id="left_eyebrow_guide">
                                    </div>
                                    <div id="adjust_point3" class="col-sm-6">
                                        <div id="adjust3_image" class="adjust_img">
                                            <img src="<?php echo base_url() . 'asset/client/img/face_none.jpg'; ?>" id="adjust3_image0">
                                        </div>
                                        <div id="point3" class="point_wrapper">
                                            <div id="adjust3_dot0"></div>
                                            <div id="adjust3_dot1"></div>
                                            <div id="adjust3_dot2"></div>
                                            <div id="adjust3_dot3"></div>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="right_eyebrow">
                                    <div id="adjust_guide4" class="col-sm-6">
                                        <img src="<?php echo base_url() . 'asset/client/img/adjust_guide/right_eyebrow.png'; ?>" id="right_eyebrow_guide">
                                    </div>
                                    <div id="adjust_point4" class="col-sm-6">
                                        <div id="adjust4_image" class="adjust_img">
                                            <img src="<?php echo base_url() . 'asset/client/img/face_none.jpg'; ?>" id="adjust4_image0">
                                        </div>
                                        <div id="point4" class="point_wrapper">
                                            <div id="adjust4_dot0"></div>
                                            <div id="adjust4_dot1"></div>
                                            <div id="adjust4_dot2"></div>
                                            <div id="adjust4_dot3"></div>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="lips">
                                    <div id="adjust_guide5" class="col-sm-6">
                                        <img src="<?php echo base_url() . 'asset/client/img/adjust_guide/lips.png'; ?>" id="lips_guide">
                                    </div>
                                    <div id="adjust_point5" class="col-sm-6">
                                        <div id="adjust5_image" class="adjust_img">
                                            <img src="<?php echo base_url() . 'asset/client/img/face_none.jpg'; ?>" id="adjust5_image0">
                                        </div>
                                        <div id="point5" class="point_wrapper">
                                            <div id="tempScale5" style="display:none"></div>
                                            <div id="adjust5_dot0"></div>
                                            <div id="adjust5_dot1"></div>
                                            <div id="adjust5_dot2"></div>
                                            <div id="adjust5_dot3"></div>
                                            <div id="adjust5_dot4"></div>
                                            <div id="adjust5_dot5"></div>
                                        </div>

                                    </div>
                                </div>
                                
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div id="saveAdjust" class="btn capture btn-primary">Save</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Block Section -->
        <div id="landscape"></div>
        <div id="notsupport"></div>

        <!-- Loading Section -->
        <div id="loading"></div>

        <!-- Javascript Area -->
        <script>
            if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/Android/i))) {

                url = 'js/jquery.event.ue.js';
                $.getScript(url);

                url = 'js/jquery.udraggable.js';
                $.getScript(url, function () {
                    $('#photo>img').udraggable();
                });

                console.log("mobile");
            } else {

                $('#photo>img').drags();

            }
        </script>
        <script>
            $(function () {
                $('#myTab a:nth-child(2)').tab('show')
            });

            (function ($) {
                $(window).load(function () {

                    $(".makeup_color").mCustomScrollbar({
                        theme: "minimal-dark",
                        autoHideScrollbar: false
                    });

                    $(".makeup_design").mCustomScrollbar({
                        theme: "minimal-dark",
                        autoHideScrollbar: false
                    });

                });
            })(jQuery);

            //Post modal
            function launchModal (url, idmodal, idbutton) {
              $.get(url,
                function (data) {
                    $(idmodal).html(data);
                    $(idbutton).trigger('click');
                    return false;
                });
            }
            $(".gotomodal").click(function(){
                var url = $(this).attr('href');
                launchModal(url, "#result", "#bigmodal");
            });
        </script>
        <!-- Google+ JS -->
        <script>
          (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
          })();
        </script>
        <!-- Twitter JS -->
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

        <script src="<?php echo base_url() . 'asset/facepp/vendor/rainbow/rainbow.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'asset/facepp/js/detect.js?' . rand(10, 100); ?>" type="text/javascript"></script>
        
        <button id="bigmodal" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg" style="display:none">Large modal</button>

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index:1000000000">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="result"></div>
            </div>
          </div>
        </div>

        <?php 
        $cek = $this->session->flashdata('error');
        if (!empty($cek)) { ?>
            <div class="modal fade" id="alertError" tabindex="-1" role="dialog" style="z-index:1000000000">
                <div class="modal-dialog">
                  <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        <?php $this->session->flashdata('error'); ?>
                    </div>
                  </div>
                </div>
            </div>
        <?php } ?>
        

        <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:1000000000">
          <div class="modal-dialog">
              <div class="modal-body">
                <?php if ($this->session->userdata('NOM') !== FALSE) {
                    $str = $this->session->userdata('directory_file',true).$this->session->userdata('NOM',true);
                    $result = explode('/',$str,4);
                    $result = base_url().'makeovers/makeover/share?file='.$result[3].'.png';
                } else {
                    $result = base_url().'makeovers/makeover/share/default/face.jpg';
                } ?>
                    <center>
                    <!-- Facebook -->
                    <div class="slide-social">
                        <div class="button">
                            <div class="fb-share-button" data-href="<?php echo $result ?>" data-layout="button_count"></div>
                        </div>
                        <div class="facebook icon text-center">
                            <i class="icon-facebook"></i>
                        </div>
                        <div class="facebook slide"><p>share</p></div>
                    </div>
                    <!-- Twitter -->
                    <div class="slide-social">
                        <div class="button">
                            <!-- FYI: Add your Twitter username to data-via -->
                            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $result ?>" data-text="Slide Social Buttons are a fun way to display your social media buttons" data-via="osmosis">tweet</a>
                        </div>
                        <div class="twitter icon">
                            <i class="icon-twitter"></i>
                        </div>
                        <div class="twitter slide"><p>tweet</p></div>
                    </div>
                    <!-- Google+ -->
                    <div class="slide-social">
                        <div class="button">
                            <div class="g-plusone" data-size="medium"></div>
                        </div>
                        <div class="google-plus icon">
                            <i class="icon-google-plus"></i>
                        </div>
                        <div class="google-plus slide"><p>+1</p></div>
                    </div>
                    </center>   
              </div>
            </div>
          </div>
        </div>

    </body>

</html>
