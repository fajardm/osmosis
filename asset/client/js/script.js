var html_w;
var html_h;
var header_w;
var header_h;
var photo_w;
var bottom_productDetail;
//var baseurl = "http://labelbranding.com/demo/osmosis2/";
var baseurl = "http://localhost/osmosis/";

function load(){
    html_h = $("html").height();
    html_w = $("html").width();
    header_h = $("#main_header").height();
    header_w = $("#main_header").width();
    photo_w = $("#photo").width();
    
    $("#makeuproom_wrapper").height(html_h-header_h);
    $("#photo_canvas").height(html_h-header_h);
    
    /* Tab Product
    ============================================== */
    //$(".tab-pane").height($("#product_on_you").height()+175);
    $(".tab-pane").height($("#product_on_you").height());
    
    /* Makeup Panel
    ============================================== */
    a = $("#product_detail").height()+15+10;    // 15 dan 10 adalah margin
    b = $("#button_section").height()+30;       // 60 adalah margin top 30 + margin bottom 30
    c = $("#myTab").height();
    makeUpPanel_h = html_h-header_h-b-c-25;
    $("#makeup_panel").height(makeUpPanel_h);
    
    bottom_productDetail = c-a-10+35;
    $("#product_detail").css("bottom",bottom_productDetail+"px");
    console.log(a+"-"+b+"-"+c+"-"+makeUpPanel_h+"-"+bottom_productDetail);
    /* Makeup blush atau product_display
    ============================================== */
    a = $(".color_opacity").height()+30+30;    // 30 adalah margin top -- 30 adalah paddding top n bottom
    x = makeUpPanel_h-a;
    $(".makeup_color").height(x);
    
    /* blush design
    ============================================== */
    a = $(".suggested").height()+80;    // 30 adalah margin top -- 30 adalah paddding top n bottom
    x = makeUpPanel_h-a;
    $(".makeup_design").height(x);
    
     /* Set adjust Modal */
    $(".adjust_img").height($("#adjust_guide0").height());
}

function zoomImage(percent){
    //scale = 1 + percent;
    $("#photo>img").css("transform","scale("+percent+")");
    $("#photo>img").css("-webkit-transform","scale("+percent+")");
}

function startLoading() {
    $("#loading").addClass('loading');
}

/**
 * Remove loading message
 */
function stopLoading() {
    $("#loading").removeClass('loading');
}

/* Dragable
================================================== */
(function($) {
    $.fn.drags = function(opt) {

        opt = $.extend({handle:"",cursor:"move"}, opt);

        if(opt.handle === "") {
            var $el = this;
        } else {
            var $el = this.find(opt.handle);
        }

        return $el.css('cursor', opt.cursor).on("mousedown", function(e) {
            if(opt.handle === "") {
                var $drag = $(this).addClass('draggable');
            } else {
                var $drag = $(this).addClass('active-handle').parent().addClass('draggable');
            }
            var z_idx = $drag.css('z-index'),
                drg_h = $drag.outerHeight(),
                drg_w = $drag.outerWidth(),
                pos_y = $drag.offset().top + drg_h - e.pageY,
                pos_x = $drag.offset().left + drg_w - e.pageX;
            $drag.css('z-index', 1000).parents().on("mousemove", function(e) {
                $('.draggable').offset({
                    top:e.pageY + pos_y - drg_h,
                    left:e.pageX + pos_x - drg_w
                }).on("mouseup", function() {
                    $(this).removeClass('draggable').css('z-index', z_idx);
                });
            });
            e.preventDefault(); // disable selection
        }).on("mouseup", function() {
            if(opt.handle === "") {
                $(this).removeClass('draggable');
            } else {
                $(this).removeClass('active-handle').parent().removeClass('draggable');
            }
        });
        
         /* Touchcsreen */
        return $el.css('cursor', opt.cursor).on("touchstart", function(e) {
            if(opt.handle === "") {
                var $drag = $(this).addClass('draggable');
            } else {
                var $drag = $(this).addClass('active-handle').parent().addClass('draggable');
            }
            var z_idx = $drag.css('z-index'),
                drg_h = $drag.outerHeight(),
                drg_w = $drag.outerWidth(),
                pos_y = $drag.offset().top + drg_h - e.pageY,
                pos_x = $drag.offset().left + drg_w - e.pageX;
            $drag.css('z-index', 1000).parents().on("touchmove", function(e) {
                $('.draggable').offset({
                    top:e.pageY + pos_y - drg_h,
                    left:e.pageX + pos_x - drg_w
                }).on("touchend", function() {
                    $(this).removeClass('draggable').css('z-index', z_idx);
                });
            });
            e.preventDefault(); // disable selection
        }).on("touchend", function() {
            if(opt.handle === "") {
                $(this).removeClass('draggable');
            } else {
                $(this).removeClass('active-handle').parent().removeClass('draggable');
            }
        });

        
    }
})(jQuery);

function changeBrush(node){
    $("#sugessted_brush_icon>img").removeClass("active");
    target = "#sugessted_brush_icon>img:nth-child("+node+")";
    $(target).addClass("active");
}

function openMakeupPanel(divID){
    if(divID=="powder_panel"){
        divNode = 1;   
    }else if(divID=="blush_panel"){
        divNode = 2;   
    }else if(divID=="eyeliner_panel"){
        divNode = 3;   
    }else if(divID=="lips_panel"){
        divNode = 4;   
    }
    
    $("#makeup_panel>div").removeClass("active");
    target = "#makeup_panel>#"+divID;
    $(target).addClass("active");
    
    $(".secondary_nav>ul>li").removeClass("active");
    target = ".secondary_nav>ul>li:nth-child("+divNode+")";
    $(target).addClass("active"); 
}

$( document ).ready(function() {
    $("#product_detail").click(function(){
        if($(this).css('bottom')!=bottom_productDetail){
            $(this).animate({'bottom':'0px'});
            $("#makeup_canvas").animate({'margin-top':bottom_productDetail+'px'});
        }
    });
    
    $("#makeuproom_wrapper").click(function(){
        $("#product_detail").animate({'bottom':(bottom_productDetail)+'px'});
        $("#makeup_canvas").animate({'margin-top':'0px'});
    });

    $("#saveAdjust").click(function(){
        $("#adjustModal").modal('hide');
    });

    $("#adjustModal").on("hidden.bs.modal", function (e) {
        var tempScale1 = $("#tempScale1").text();
        var tempScale2 = $("#tempScale2").text();
        var tempScale3 = $("#tempScale3").text();
        var tempScale5 = $("#tempScale5").text();

        var adjust0_dot0_left = parseInt($("#adjust0_dot0").css('left'))/tempScale1;
        var adjust0_dot1_left = parseInt($("#adjust0_dot1").css('left'))/tempScale1;
        var adjust0_dot2_left = parseInt($("#adjust0_dot2").css('left'))/tempScale1;
        var adjust0_dot3_left = parseInt($("#adjust0_dot3").css('left'))/tempScale1;
        var adjust0_dot0_top = parseInt($("#adjust0_dot0").css('top'))/tempScale1;
        var adjust0_dot1_top = parseInt($("#adjust0_dot1").css('top'))/tempScale1;
        var adjust0_dot2_top = parseInt($("#adjust0_dot2").css('top'))/tempScale1;
        var adjust0_dot3_top = parseInt($("#adjust0_dot3").css('top'))/tempScale1;

        var adjust1_dot0_left = parseInt($("#adjust1_dot0").css('left'))/tempScale2;
        var adjust1_dot1_left = parseInt($("#adjust1_dot1").css('left'))/tempScale2;
        var adjust1_dot2_left = parseInt($("#adjust1_dot2").css('left'))/tempScale2;
        var adjust1_dot3_left = parseInt($("#adjust1_dot3").css('left'))/tempScale2;
        var adjust1_dot4_left = parseInt($("#adjust1_dot4").css('left'))/tempScale2;
        var adjust1_dot5_left = parseInt($("#adjust1_dot5").css('left'))/tempScale2;
        var adjust1_dot6_left = parseInt($("#adjust1_dot6").css('left'))/tempScale2;
        var adjust1_dot7_left = parseInt($("#adjust1_dot7").css('left'))/tempScale2;
        var adjust1_dot0_top = parseInt($("#adjust1_dot0").css('top'))/tempScale2;
        var adjust1_dot1_top = parseInt($("#adjust1_dot1").css('top'))/tempScale2;
        var adjust1_dot2_top = parseInt($("#adjust1_dot2").css('top'))/tempScale2;
        var adjust1_dot3_top = parseInt($("#adjust1_dot3").css('top'))/tempScale2;
        var adjust1_dot4_top = parseInt($("#adjust1_dot4").css('top'))/tempScale2;
        var adjust1_dot5_top = parseInt($("#adjust1_dot5").css('top'))/tempScale2;
        var adjust1_dot6_top = parseInt($("#adjust1_dot6").css('top'))/tempScale2;
        var adjust1_dot7_top = parseInt($("#adjust1_dot7").css('top'))/tempScale2;

        var adjust2_dot0_left = parseInt($("#adjust2_dot0").css('left'))/tempScale3;
        var adjust2_dot1_left = parseInt($("#adjust2_dot1").css('left'))/tempScale3;
        var adjust2_dot2_left = parseInt($("#adjust2_dot2").css('left'))/tempScale3;
        var adjust2_dot3_left = parseInt($("#adjust2_dot3").css('left'))/tempScale3;
        var adjust2_dot4_left = parseInt($("#adjust2_dot4").css('left'))/tempScale3;
        var adjust2_dot5_left = parseInt($("#adjust2_dot5").css('left'))/tempScale3;
        var adjust2_dot6_left = parseInt($("#adjust2_dot6").css('left'))/tempScale3;
        var adjust2_dot7_left = parseInt($("#adjust2_dot7").css('left'))/tempScale3;
        var adjust2_dot0_top = parseInt($("#adjust2_dot0").css('top'))/tempScale3;
        var adjust2_dot1_top = parseInt($("#adjust2_dot1").css('top'))/tempScale3;
        var adjust2_dot2_top = parseInt($("#adjust2_dot2").css('top'))/tempScale3;
        var adjust2_dot3_top = parseInt($("#adjust2_dot3").css('top'))/tempScale3;
        var adjust2_dot4_top = parseInt($("#adjust2_dot4").css('top'))/tempScale3;
        var adjust2_dot5_top = parseInt($("#adjust2_dot5").css('top'))/tempScale3;
        var adjust2_dot6_top = parseInt($("#adjust2_dot6").css('top'))/tempScale3;
        var adjust2_dot7_top = parseInt($("#adjust2_dot7").css('top'))/tempScale3;

        var adjust5_dot0_left = parseInt($("#adjust5_dot0").css('left'))/tempScale5;
        var adjust5_dot1_left = parseInt($("#adjust5_dot1").css('left'))/tempScale5;
        var adjust5_dot2_left = parseInt($("#adjust5_dot2").css('left'))/tempScale5;
        var adjust5_dot3_left = parseInt($("#adjust5_dot3").css('left'))/tempScale5;
        var adjust5_dot4_left = parseInt($("#adjust5_dot4").css('left'))/tempScale5;
        var adjust5_dot5_left = parseInt($("#adjust5_dot5").css('left'))/tempScale5;
        var adjust5_dot0_top = parseInt($("#adjust5_dot0").css('top'))/tempScale5;
        var adjust5_dot1_top = parseInt($("#adjust5_dot1").css('top'))/tempScale5;
        var adjust5_dot2_top = parseInt($("#adjust5_dot2").css('top'))/tempScale5;
        var adjust5_dot3_top = parseInt($("#adjust5_dot3").css('top'))/tempScale5;
        var adjust5_dot4_top = parseInt($("#adjust5_dot4").css('top'))/tempScale5;
        var adjust5_dot5_top = parseInt($("#adjust5_dot5").css('top'))/tempScale5;

        $.ajax({
            type: "POST",
            url: baseurl+"makeovers/siteup/setAdjust/",
            //url: baseurl+"makeover/setAdjust/",
            data: { 
                nom : "0",
                adjust0_dot0 : adjust0_dot0_left+"px,"+adjust0_dot0_top+"px",
                adjust0_dot1 : adjust0_dot1_left+"px,"+adjust0_dot1_top+"px",
                adjust0_dot2 : adjust0_dot2_left+"px,"+adjust0_dot2_top+"px",
                adjust0_dot3 : adjust0_dot3_left+"px,"+adjust0_dot3_top+"px",

                adjust1_dot0 : adjust1_dot0_left+"px,"+adjust1_dot0_top+"px",
                adjust1_dot1 : adjust1_dot1_left+"px,"+adjust1_dot1_top+"px",
                adjust1_dot2 : adjust1_dot2_left+"px,"+adjust1_dot2_top+"px",
                adjust1_dot3 : adjust1_dot3_left+"px,"+adjust1_dot3_top+"px",
                adjust1_dot4 : adjust1_dot4_left+"px,"+adjust1_dot4_top+"px",
                adjust1_dot5 : adjust1_dot5_left+"px,"+adjust1_dot5_top+"px",
                adjust1_dot6 : adjust1_dot6_left+"px,"+adjust1_dot6_top+"px",
                adjust1_dot7 : adjust1_dot7_left+"px,"+adjust1_dot7_top+"px",

                adjust2_dot0 : adjust2_dot0_left+"px,"+adjust2_dot0_top+"px",
                adjust2_dot1 : adjust2_dot1_left+"px,"+adjust2_dot1_top+"px",
                adjust2_dot2 : adjust2_dot2_left+"px,"+adjust2_dot2_top+"px",
                adjust2_dot3 : adjust2_dot3_left+"px,"+adjust2_dot3_top+"px",
                adjust2_dot4 : adjust2_dot4_left+"px,"+adjust2_dot4_top+"px",
                adjust2_dot5 : adjust2_dot5_left+"px,"+adjust2_dot5_top+"px",
                adjust2_dot6 : adjust2_dot6_left+"px,"+adjust2_dot6_top+"px",
                adjust2_dot7 : adjust2_dot7_left+"px,"+adjust2_dot7_top+"px",

                adjust3_dot0 : $("#adjust3_dot0").css('left')+","+$("#adjust3_dot0").css('top'),
                adjust3_dot1 : $("#adjust3_dot1").css('left')+","+$("#adjust3_dot1").css('top'),
                adjust3_dot2 : $("#adjust3_dot2").css('left')+","+$("#adjust3_dot2").css('top'),
                adjust3_dot3 : $("#adjust3_dot3").css('left')+","+$("#adjust3_dot3").css('top'),

                adjust4_dot0 : $("#adjust4_dot0").css('left')+","+$("#adjust4_dot0").css('top'),
                adjust4_dot1 : $("#adjust4_dot1").css('left')+","+$("#adjust4_dot1").css('top'),
                adjust4_dot2 : $("#adjust4_dot2").css('left')+","+$("#adjust4_dot2").css('top'),
                adjust4_dot3 : $("#adjust4_dot3").css('left')+","+$("#adjust4_dot3").css('top'),

                adjust5_dot0 : adjust5_dot0_left+"px,"+adjust5_dot0_top+"px",
                adjust5_dot1 : adjust5_dot1_left+"px,"+adjust5_dot1_top+"px",
                adjust5_dot2 : adjust5_dot2_left+"px,"+adjust5_dot2_top+"px",
                adjust5_dot3 : adjust5_dot3_left+"px,"+adjust5_dot3_top+"px",
                adjust5_dot4 : adjust5_dot4_left+"px,"+adjust5_dot4_top+"px",
                adjust5_dot5 : adjust5_dot5_left+"px,"+adjust5_dot5_top+"px",

                imageSize : $("#photo>img").css('width')+","+$("#photo>img").css('height')
            },
            beforeSend: function( xhr ) {
                startLoading();
            }
        }).done(function(msg) {
            console.log(msg);
            stopLoading();
        }).fail(function() {
            alert( "Save Adjust Error!!" );
        });
    });
});