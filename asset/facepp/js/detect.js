/*jshint curly: true, eqeqeq: true, latedef: true, undef: true, quotmark: single,
  unused: true, browser: true, jquery: true */
/*global Rainbow:true */
(function() {
    'use strict';

    // constants
    var API_URL = 'http://apius.faceplusplus.com/';
    var API_KEY = '25ba8f4c17a8db6780f8f070948b3ec4';
    var API_SECRET = 'SjCIrPeLFbxDHSe9vJNi92W0uAZCyPev';
	var FACE_ID = '';
	var imageWidth = '';
    var imageUpload = '';
    var imageInfo='';
    var tempWidth = '';
    var tempHeight = '';
    var adjustWidth = '';
    var adjustHeight = '';

    var adjustOffsetX = '';
    var adjustOffsetY = '';

    var adjustLeftX = '';
    var adjustLeftY = '';
    
    var baseurl = 'http://localhost/osmosis/';
    //var baseurl = "http://labelbranding.com/demo/osmosis2/";
    // error messages
    var messages = {
        URL_ERROR:   'Invalid URL',
        LOAD_ERROR:  'Failed to Load',
        LOADING:     'Loading...',
        NO_FACE:     'No face detected',
        NO_CAMERA:   'No camera available'
    };

    // vendor prefix
    window.URL = window.URL || window.webkitURL;
    navigator.getUserMedia  = navigator.getUserMedia || navigator.webkitGetUserMedia ||
                              navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;


    function makeDetector(el, options) {
        var container = $(el);
        var photolist = container.find('.photolist');

        // add <img> to photolist
        var images = [];
        for (var i = 0, len = options.imgs.length; i < len; i++) {
            var img = document.createElement('img');
            img.src = options.imgs[i];
            img.width = img.height = 80;
            images.push(img);
        }
        photolist.append(images);

        // paddles
        var sliding = false;
        container.find('.left-paddle').click(function() {
            if (sliding === false) {
                sliding = true;
                photolist.css({ left: '-80px' })
                    .prepend(photolist.children('img:last-child'))
                    .animate({ left: 0 }, 200, 'linear', function() {
                        sliding = false;
                    });
            }
        });
        container.find('.right-paddle').click(function() {
            if (sliding === false) {
                sliding = true;
                photolist.animate({ left: '-80px' }, 200, 'linear', function() {
                    photolist.css({ left: 0 })
                        .append(photolist.children('img:first-child'));
                    sliding = false;
                });
            }
        });

        //var canvas = container.find('.canvas').get(0);
        //var ctx = canvas.getContext('2d');

        var width = $("#photo_canvas").width();     //before edited canvas.width,
        var height = $("#photo_canvas").height();    //before edited canvas.height;

        console.log("width : "+width);
        console.log("height : "+height);

        var currentImg = new Image();
        var totalImageCount = 0;
        var facesContainer = container.find('.faces'); // container for face boxes 

        function clearCanvas() {
            //ctx.fillStyle = '#EEE';
            //ctx.fillRect(0, 0, width, height);
        }

        /**
         * Hide button in input bar if feature not available
         */
        function hideInputButton(selector) {
            var btn = container.find(selector);
            var url = container.find('.url-field');
            url.width(btn.outerWidth(true) + url.width());
            btn.hide();
        }

        /**
         * Start loading message
         */
        function startLoading() {
            //facesContainer.addClass('loading');
            $("#loading").addClass('loading');
        }

        /**
         * Remove loading message
         */
        function stopLoading() {
            //facesContainer.removeClass('loading invalid');
            $("#loading").removeClass('loading');
        }

        var restUrl = container.find('.rest-url');

        /**
         * Show error messages or rest url
         */
        function showStatus(text) {
            //restUrl.text(text);
            console.log(text);
            alert(text+"/n Please Check Your Internet Connection");
        }

        /**
         * Draw face boxes
         *
         * imageInfo:
         * {
         *     width: <image width>
         *     height: <image height>
         *     offsetX: <image offset from canvas>
         *     offsetY: <image offset from canvas>
         *  }
         */
        function drawFaces(imageInfo, faces) {
            startLoading();

            if (faces.length === 0) {
                showStatus(messages.NO_FACE);
            } else {

                $("#adjustModal").modal();
                /* Set adjust Modal */
                $("#adjustModal").on('shown.bs.modal', function (e) {

                    $("#adjust_tab a:first").tab('show');
                    $(".adjust_img").height($("#adjust_guide0").height());

                    $(".point_wrapper").height($(".adjust_img>img").height());
                    $(".point_wrapper").width($(".adjust_img>img").width());
                    
                    tempWidth = $("#adjust_guide0").width();
                    tempHeight = $("#adjust_guide0").height();

                });

                //for (var i = faces.length - 1; i >= 0; i--) {
                    var face = faces[0];

                    // change box color based on gender
                    var rgbColor,
                        rgbaColor;

                    /* if (face.attribute.gender.value === 'Male') {
                        rgbColor = '#12BDDC';
                        rgbaColor = 'rgba(18,189,220,0.8)';
                    } else { */
                        rgbColor = '#C537D8';
                        rgbaColor = 'rgba(197,55,216,0.8)';
                    //}
					face = Object.keys(face).map(function(k) { return face[k] });
					console.log("face = "+face);
					
					var temp_face = face[1];
					console.log("temp_face = "+face[1]);
					
					var face1 = Object.keys(temp_face).map(function(k) { return temp_face[k] });
					console.log(face1[0].x);

					var pointType = ['contour_chin'];

                    // draw facial pointType
                    //ctx.fillStyle = rgbColor;

                    for (var j = face1.length - 1; j >= 0; j--) {
					
                        /*ctx.beginPath();
                        ctx.arc(imageInfo.offsetX + face1[j].x * imageInfo.width * 0.01,
                                imageInfo.offsetY + face1[j].y * imageInfo.height * 0.01,
                                imageWidth * 0.01 * 6, 0, Math.PI * 2);
                        ctx.fill(); */
						/* console.log(imageInfo.offsetX + face1[j].x * imageInfo.width * 0.01,
                                imageInfo.offsetY + face1[j].y * imageInfo.height * 0.01,
                                imageWidth * 0.01 * 6, 0, Math.PI * 2); 
						console.log(j + "=" + face1[j].x + "," + face1[j].y); */
					
                    }

                    tempWidth = 240;
                    tempHeight= 240;

                    //Face
                    var tempY = (temp_face.contour_chin.y * imageInfo.height * 0.01) - ((temp_face.nose_contour_right1.y * imageInfo.height * 0.01)-((temp_face.contour_chin.y * imageInfo.height * 0.01)-(temp_face.nose_contour_right1.y * imageInfo.height * 0.01)));
                    var tempX = (temp_face.contour_right1.x * imageInfo.width * 0.01) - (temp_face.contour_left1.x * imageInfo.width * 0.01);
                    
                    var tempScale = 1;

                    if( tempY>tempHeight || tempX>tempWidth){
                        tempScale = Math.min(tempWidth / tempY, tempHeight / tempX, 1.0);
                    }else{
                        tempScale = 1.0;
                    }

                    $("#tempScale1").text(tempScale);

                    console.log("tempY : "+tempY);
                    console.log("tempX : "+tempX);
                    console.log("tempWidth : "+tempWidth);
                    console.log("tempScale1 : "+tempScale);

                    $("#adjust0_image").html('<img src="'+imageUpload+'" width="'+(imageInfo.width*tempScale)+'" height="'+(imageInfo.height*tempScale)+'">');

                    var top0 = (temp_face.contour_left1.y * imageInfo.height * 0.01)*tempScale;
                    var left0 = (temp_face.contour_left1.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust0_dot0").css({
                        position: 'absolute',
                        top: top0,
                        left: left0,
                    });
                    $('#adjust0_dot0').drags(); 

                    var top1 = ((temp_face.nose_contour_right1.y * imageInfo.height * 0.01)-((temp_face.contour_chin.y * imageInfo.height * 0.01)-(temp_face.nose_contour_right1.y * imageInfo.height * 0.01)))*tempScale;
                    var left1 = (temp_face.nose_tip.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust0_dot1").css({
                        position: 'absolute',
                        top: top1,
                        left: left1,
                    });
                    $('#adjust0_dot1').drags(); 

                    var top2 = (temp_face.contour_right1.y * imageInfo.height * 0.01)*tempScale;
                    var left2 = (temp_face.contour_right1.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust0_dot2").css({
                        position: 'absolute',
                        top: top2,
                        left: left2,
                    });
                    $('#adjust0_dot2').drags(); 

                    var top3 = (temp_face.contour_chin.y * imageInfo.height * 0.01)*tempScale;
                    var left3 = (temp_face.contour_chin.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust0_dot3").css({
                        position: 'absolute',
                        top: top3,
                        left: left3,
                    });
                    $('#adjust0_dot3').drags(); 
                    
                    var marginTop = (tempY - tempHeight);
                    var marginLeft = (tempWidth - tempX);

                    adjustWidth = left2 - left0;
                    adjustHeight = top3 - top1;

                    adjustOffsetX = (tempWidth - adjustWidth)/2;
                    adjustOffsetY = (tempHeight - adjustHeight)/2;

                    adjustLeftX = left0 - adjustOffsetX;
                    adjustLeftY = adjustOffsetY - top1;
                    
                    if(adjustLeftY>0){
                        marginTop = -adjustLeftY;
                    }else{
                        marginTop = adjustLeftY;
                    }

                    if(adjustLeftX>0){
                        marginLeft = -adjustLeftX;
                    }else{
                        marginLeft = adjustLeftX;
                    }

                    $("#point0").css({
                        'marginTop' : marginTop,
                        'marginLeft' : marginLeft
                    });

                    $("#adjust0_image>img").css({
                        'marginTop' : marginTop,
                        'marginLeft' : marginLeft
                    });



                    /* Left Eye
                    ================================================================================ */

                    tempY = (temp_face.left_eye_bottom.y * imageInfo.height * 0.01)-(temp_face.left_eye_top.y * imageInfo.height * 0.01);
                    tempX = (temp_face.left_eye_right_corner.x * imageInfo.width * 0.01) - (temp_face.left_eye_left_corner.x * imageInfo.width * 0.01);
                    
                    if( tempY>tempHeight || tempX>tempWidth){
                        tempScale = Math.min(tempWidth / tempY, tempHeight / tempX, 1.0);
                    }else{
                        tempScale = 2;
                    }

                    $("#tempScale2").text(tempScale);

                    console.log("tempScale2 : "+tempScale);
                    
                    $("#adjust1_image").html('<img src="'+imageUpload+'" width="'+(imageInfo.width*tempScale)+'" height="'+(imageInfo.height*tempScale)+'">');

                    top0 = (temp_face.left_eye_left_corner.y * imageInfo.height * 0.01)*tempScale;
                    left0 = (temp_face.left_eye_left_corner.x * imageInfo.width * 0.01)*tempScale
                    
                    $("#adjust1_dot0").css({
                        position: 'absolute',
                        top: top0,
                        left: left0,
                    });
                    $('#adjust1_dot0').drags(); 

                    top1 = (temp_face.left_eye_upper_left_quarter.y * imageInfo.height * 0.01)*tempScale;
                    left1 = (temp_face.left_eye_upper_left_quarter.x * imageInfo.width * 0.01)*tempScale
                    
                    $("#adjust1_dot1").css({
                        position: 'absolute',
                        top: top1,
                        left: left1,
                    });
                    $('#adjust1_dot1').drags(); 

                    top2 = (temp_face.left_eye_top.y * imageInfo.height * 0.01)*tempScale;
                    left2 = (temp_face.left_eye_top.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust1_dot2").css({
                        position: 'absolute',
                        top: top2,
                        left: left2,
                    });
                    $('#adjust1_dot2').drags(); 

                    top3 = (temp_face.left_eye_upper_right_quarter.y * imageInfo.height * 0.01)*tempScale;
                    left3 = (temp_face.left_eye_upper_right_quarter.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust1_dot3").css({
                        position: 'absolute',
                        top: top3,
                        left: left3,
                    });
                    $('#adjust1_dot3').drags(); 

                    top4 = (temp_face.left_eye_right_corner.y * imageInfo.height * 0.01)*tempScale;
                    left4 = (temp_face.left_eye_right_corner.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust1_dot4").css({
                        position: 'absolute',
                        top: top4,
                        left: left4,
                    });
                    $('#adjust1_dot4').drags(); 

                    top5 = (temp_face.left_eye_lower_right_quarter.y * imageInfo.height * 0.01)*tempScale;
                    left5 = (temp_face.left_eye_lower_right_quarter.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust1_dot5").css({
                        position: 'absolute',
                        top: top5,
                        left: left5,
                    });
                    $('#adjust1_dot5').drags();

                    var top6 = (temp_face.left_eye_bottom.y * imageInfo.height * 0.01)*tempScale;
                    var left6 = (temp_face.left_eye_bottom.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust1_dot6").css({
                        position: 'absolute',
                        top: top6,
                        left: left6,
                    });
                    $('#adjust1_dot6').drags();

                    var top7 = (temp_face.left_eye_lower_left_quarter.y * imageInfo.height * 0.01)*tempScale;
                    var left7 = (temp_face.left_eye_lower_left_quarter.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust1_dot7").css({
                        position: 'absolute',
                        top: top7,
                        left: left7,
                    });
                    $('#adjust1_dot7').drags(); 
                    
                    adjustWidth = left4 - left0;
                    adjustHeight = top2 - top6;

                    adjustOffsetX = (tempWidth - adjustWidth)/2;
                    adjustOffsetY = (tempHeight - adjustHeight)/2;

                    adjustLeftX = left0 - adjustOffsetX;
                    adjustLeftY = adjustOffsetY - top2;
                    
                    if(adjustLeftY>0){
                        marginTop = -adjustLeftY;
                    }else{
                        marginTop = adjustLeftY;
                    }

                    if(adjustLeftX>0){
                        marginLeft = -adjustLeftX;
                    }else{
                        marginLeft = adjustLeftX;
                    }

                    $("#point1").css({
                        'marginTop' : marginTop,
                        'marginLeft' : marginLeft
                    });

                    $("#adjust1_image>img").css({
                        'marginTop' : marginTop,
                        'marginLeft' : marginLeft
                    });


                    /* Right Eye
                    ================================================================================ */

                    tempY = (temp_face.right_eye_bottom.y * imageInfo.height * 0.01)-(temp_face.right_eye_top.y * imageInfo.height * 0.01);
                    tempX = (temp_face.right_eye_right_corner.x * imageInfo.width * 0.01) - (temp_face.right_eye_left_corner.x * imageInfo.width * 0.01);
                    
                    if( tempY>tempHeight || tempX>tempWidth){
                        tempScale = Math.min(tempWidth / tempY, tempHeight / tempX, 1.0);
                    }else{
                        tempScale = 2;
                    }

                    $("#tempScale3").text(tempScale);
                    console.log("tempScale3 : "+tempScale);

                    $("#adjust2_image").html('<img src="'+imageUpload+'" width="'+(imageInfo.width*tempScale)+'" height="'+(imageInfo.height*tempScale)+'">');

                    top0 = (temp_face.right_eye_left_corner.y * imageInfo.height * 0.01)*tempScale;
                    left0 = (temp_face.right_eye_left_corner.x * imageInfo.width * 0.01)*tempScale
                    
                    $("#adjust2_dot0").css({
                        position: 'absolute',
                        top: top0,
                        left: left0,
                    });
                    $('#adjust2_dot0').drags(); 

                    top1 = (temp_face.right_eye_upper_left_quarter.y * imageInfo.height * 0.01)*tempScale;
                    left1 = (temp_face.right_eye_upper_left_quarter.x * imageInfo.width * 0.01)*tempScale
                    
                    $("#adjust2_dot1").css({
                        position: 'absolute',
                        top: top1,
                        left: left1,
                    });
                    $('#adjust2_dot1').drags(); 

                    top2 = (temp_face.right_eye_top.y * imageInfo.height * 0.01)*tempScale;
                    left2 = (temp_face.right_eye_top.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust2_dot2").css({
                        position: 'absolute',
                        top: top2,
                        left: left2,
                    });
                    $('#adjust2_dot2').drags(); 

                    top3 = (temp_face.right_eye_upper_right_quarter.y * imageInfo.height * 0.01)*tempScale;
                    left3 = (temp_face.right_eye_upper_right_quarter.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust2_dot3").css({
                        position: 'absolute',
                        top: top3,
                        left: left3,
                    });
                    $('#adjust2_dot3').drags(); 

                    top4 = (temp_face.right_eye_right_corner.y * imageInfo.height * 0.01)*tempScale;
                    left4 = (temp_face.right_eye_right_corner.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust2_dot4").css({
                        position: 'absolute',
                        top: top4,
                        left: left4,
                    });
                    $('#adjust2_dot4').drags(); 

                    top5 = (temp_face.right_eye_lower_right_quarter.y * imageInfo.height * 0.01)*tempScale;
                    left5 = (temp_face.right_eye_lower_right_quarter.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust2_dot5").css({
                        position: 'absolute',
                        top: top5,
                        left: left5,
                    });
                    $('#adjust2_dot5').drags();

                    top6 = (temp_face.right_eye_bottom.y * imageInfo.height * 0.01)*tempScale;
                    left6 = (temp_face.right_eye_bottom.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust2_dot6").css({
                        position: 'absolute',
                        top: top6,
                        left: left6,
                    });
                    $('#adjust2_dot6').drags();

                    top7 = (temp_face.right_eye_lower_left_quarter.y * imageInfo.height * 0.01)*tempScale;
                    left7 = (temp_face.right_eye_lower_left_quarter.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust2_dot7").css({
                        position: 'absolute',
                        top: top7,
                        left: left7,
                    });
                    $('#adjust2_dot7').drags(); 
                    
                    adjustWidth = left4 - left0;
                    adjustHeight = top3 - top6;

                    adjustOffsetX = (tempWidth - adjustWidth)/2;
                    adjustOffsetY = (tempHeight - adjustHeight)/2;

                    adjustLeftX = left0 - adjustOffsetX;
                    adjustLeftY = adjustOffsetY - top4;
                    
                    if(adjustLeftY>0){
                        marginTop = -adjustLeftY;
                    }else{
                        marginTop = adjustLeftY;
                    }

                    if(adjustLeftX>0){
                        marginLeft = -adjustLeftX;
                    }else{
                        marginLeft = adjustLeftX;
                    }

                    $("#point2").css({
                        'marginTop' : marginTop,
                        'marginLeft' : marginLeft
                    });

                    $("#adjust2_image>img").css({
                        'marginTop' : marginTop,
                        'marginLeft' : marginLeft
                    });


                    /* Left Eyebrow
                    ================================================================================ */

                    tempY = (temp_face.left_eyebrow_lower_middle.y * imageInfo.height * 0.01)-(temp_face.left_eyebrow_upper_middle.y * imageInfo.height * 0.01);
                    tempX = (temp_face.left_eyebrow_right_corner.x * imageInfo.width * 0.01) - (temp_face.left_eyebrow_left_corner.x * imageInfo.width * 0.01);
                    
                    if( tempY>tempHeight || tempX>tempWidth){
                        tempScale = Math.min(tempWidth / tempY, tempHeight / tempX, 1.0);
                    }else{
                        tempScale = 2;
                    }
                    console.log("tempScale3 : "+tempScale);

                    $("#adjust3_image").html('<img src="'+imageUpload+'" width="'+(imageInfo.width*tempScale)+'" height="'+(imageInfo.height*tempScale)+'">');

                    top0 = (temp_face.left_eyebrow_left_corner.y * imageInfo.height * 0.01)*tempScale;
                    left0 = (temp_face.left_eyebrow_left_corner.x * imageInfo.width * 0.01)*tempScale
                    
                    $("#adjust3_dot0").css({
                        position: 'absolute',
                        top: top0,
                        left: left0,
                    });
                    $('#adjust3_dot0').drags(); 

                    top1 = (temp_face.left_eyebrow_upper_middle.y * imageInfo.height * 0.01)*tempScale;
                    left1 = (temp_face.left_eyebrow_upper_middle.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust3_dot1").css({
                        position: 'absolute',
                        top: top1,
                        left: left1,
                    });
                    $('#adjust3_dot1').drags(); 

                    top2 = (temp_face.left_eyebrow_right_corner.y * imageInfo.height * 0.01)*tempScale;
                    left2 = (temp_face.left_eyebrow_right_corner.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust3_dot2").css({
                        position: 'absolute',
                        top: top2,
                        left: left2,
                    });
                    $('#adjust3_dot2').drags(); 

                    top3 = (temp_face.left_eyebrow_lower_middle.y * imageInfo.height * 0.01)*tempScale;
                    left3 = (temp_face.left_eyebrow_lower_middle.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust3_dot3").css({
                        position: 'absolute',
                        top: top3,
                        left: left3,
                    });
                    $('#adjust3_dot3').drags(); 
                    
                    adjustWidth = left2 - left0;
                    adjustHeight = top3 - top1;

                    adjustOffsetX = (tempWidth - adjustWidth)/2;
                    adjustOffsetY = (tempHeight - adjustHeight)/2;

                    adjustLeftX = left0 - adjustOffsetX;
                    adjustLeftY = adjustOffsetY - top1;
                    
                    if(adjustLeftY>0){
                        marginTop = -adjustLeftY;
                    }else{
                        marginTop = adjustLeftY;
                    }

                    if(adjustLeftX>0){
                        marginLeft = -adjustLeftX;
                    }else{
                        marginLeft = adjustLeftX;
                    }

                    $("#point3").css({
                        'marginTop' : marginTop,
                        'marginLeft' : marginLeft
                    });

                    $("#adjust3_image>img").css({
                        'marginTop' : marginTop,
                        'marginLeft' : marginLeft
                    });


                    /* Right Eyebrow
                    ================================================================================ */

                    tempY = (temp_face.right_eyebrow_lower_middle.y * imageInfo.height * 0.01)-(temp_face.right_eyebrow_upper_middle.y * imageInfo.height * 0.01);
                    tempX = (temp_face.right_eyebrow_right_corner.x * imageInfo.width * 0.01) - (temp_face.right_eyebrow_left_corner.x * imageInfo.width * 0.01);
                    
                    if( tempY>tempHeight || tempX>tempWidth){
                        tempScale = Math.min(tempWidth / tempY, tempHeight / tempX, 1.0);
                    }else{
                        tempScale = 2;
                    }
                    console.log("tempScale4 : "+tempScale);

                    $("#adjust4_image").html('<img src="'+imageUpload+'" width="'+(imageInfo.width*tempScale)+'" height="'+(imageInfo.height*tempScale)+'">');

                    top0 = (temp_face.right_eyebrow_left_corner.y * imageInfo.height * 0.01)*tempScale;
                    left0 = (temp_face.right_eyebrow_left_corner.x * imageInfo.width * 0.01)*tempScale
                    
                    $("#adjust4_dot0").css({
                        position: 'absolute',
                        top: top0,
                        left: left0,
                    });
                    $('#adjust4_dot0').drags(); 

                    top1 = (temp_face.right_eyebrow_upper_middle.y * imageInfo.height * 0.01)*tempScale;
                    left1 = (temp_face.right_eyebrow_upper_middle.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust4_dot1").css({
                        position: 'absolute',
                        top: top1,
                        left: left1,
                    });
                    $('#adjust4_dot1').drags(); 

                    top2 = (temp_face.right_eyebrow_right_corner.y * imageInfo.height * 0.01)*tempScale;
                    left2 = (temp_face.right_eyebrow_right_corner.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust4_dot2").css({
                        position: 'absolute',
                        top: top2,
                        left: left2,
                    });
                    $('#adjust4_dot2').drags(); 

                    top3 = (temp_face.right_eyebrow_lower_middle.y * imageInfo.height * 0.01)*tempScale;
                    left3 = (temp_face.right_eyebrow_lower_middle.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust4_dot3").css({
                        position: 'absolute',
                        top: top3,
                        left: left3,
                    });
                    $('#adjust4_dot3').drags(); 
                    
                    adjustWidth = left2 - left0;
                    adjustHeight = top3 - top1;

                    adjustOffsetX = (tempWidth - adjustWidth)/2;
                    adjustOffsetY = (tempHeight - adjustHeight)/2;

                    adjustLeftX = left0 - adjustOffsetX;
                    adjustLeftY = adjustOffsetY - top1;
                    
                    if(adjustLeftY>0){
                        marginTop = -adjustLeftY;
                    }else{
                        marginTop = adjustLeftY;
                    }

                    if(adjustLeftX>0){
                        marginLeft = -adjustLeftX;
                    }else{
                        marginLeft = adjustLeftX;
                    }

                    $("#point4").css({
                        'marginTop' : marginTop,
                        'marginLeft' : marginLeft
                    });

                    $("#adjust4_image>img").css({
                        'marginTop' : marginTop,
                        'marginLeft' : marginLeft
                    });


                    /* Lips
                    ================================================================================ */

                    tempY = (temp_face.right_eyebrow_lower_middle.y * imageInfo.height * 0.01)-(temp_face.right_eyebrow_upper_middle.y * imageInfo.height * 0.01);
                    tempX = (temp_face.right_eyebrow_right_corner.x * imageInfo.width * 0.01) - (temp_face.right_eyebrow_left_corner.x * imageInfo.width * 0.01);
                    
                    if( tempY>tempHeight || tempX>tempWidth){
                        tempScale = Math.min(tempWidth / tempY, tempHeight / tempX, 1.0);
                    }else{
                        tempScale = 2;
                    }

                    $("#tempScale5").text(tempScale);
                    console.log("tempScale5: "+tempScale);

                    $("#adjust5_image").html('<img src="'+imageUpload+'" width="'+(imageInfo.width*tempScale)+'" height="'+(imageInfo.height*tempScale)+'">');

                    top0 = (temp_face.mouth_left_corner.y * imageInfo.height * 0.01)*tempScale;
                    left0 = (temp_face.mouth_left_corner.x * imageInfo.width * 0.01)*tempScale
                    
                    $("#adjust5_dot0").css({
                        position: 'absolute',
                        top: top0,
                        left: left0,
                    });
                    $('#adjust5_dot0').drags(); 

                    top1 = (temp_face.mouth_upper_lip_left_contour1.y * imageInfo.height * 0.01)*tempScale;
                    left1 = (temp_face.mouth_upper_lip_left_contour1.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust5_dot1").css({
                        position: 'absolute',
                        top: top1,
                        left: left1,
                    });
                    $('#adjust5_dot1').drags(); 

                    top2 = (temp_face.mouth_upper_lip_top.y * imageInfo.height * 0.01)*tempScale;
                    left2 = (temp_face.mouth_upper_lip_top.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust5_dot2").css({
                        position: 'absolute',
                        top: top2,
                        left: left2,
                    });
                    $('#adjust5_dot2').drags(); 

                    top3 = (temp_face.mouth_upper_lip_right_contour1.y * imageInfo.height * 0.01)*tempScale;
                    left3 = (temp_face.mouth_upper_lip_right_contour1.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust5_dot3").css({
                        position: 'absolute',
                        top: top3,
                        left: left3,
                    });
                    $('#adjust5_dot3').drags(); 

                    var top4 = (temp_face.mouth_right_corner.y * imageInfo.height * 0.01)*tempScale;
                    var left4 = (temp_face.mouth_right_corner.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust5_dot4").css({
                        position: 'absolute',
                        top: top4,
                        left: left4,
                    });
                    $('#adjust5_dot4').drags(); 

                    var top5 = (temp_face.mouth_lower_lip_bottom.y * imageInfo.height * 0.01)*tempScale;
                    var left5 = (temp_face.mouth_lower_lip_bottom.x * imageInfo.width * 0.01)*tempScale;
                    $("#adjust5_dot5").css({
                        position: 'absolute',
                        top: top5,
                        left: left5,
                    });
                    $('#adjust5_dot5').drags(); 
                    
                    adjustWidth = left4 - left0;
                    adjustHeight = top5 - top1;

                    adjustOffsetX = (tempWidth - adjustWidth)/2;
                    adjustOffsetY = (tempHeight - adjustHeight)/2;

                    adjustLeftX = left0 - adjustOffsetX;
                    adjustLeftY = adjustOffsetY - top1;
                    
                    if(adjustLeftY>0){
                        marginTop = -adjustLeftY;
                    }else{
                        marginTop = adjustLeftY;
                    }

                    if(adjustLeftX>0){
                        marginLeft = -adjustLeftX;
                    }else{
                        marginLeft = adjustLeftX;
                    }

                    $("#point5").css({
                        'marginTop' : marginTop,
                        'marginLeft' : marginLeft
                    });

                    $("#adjust5_image>img").css({
                        'marginTop' : marginTop,
                        'marginLeft' : marginLeft
                    }); 

            }
            stopLoading(); 
        }

        /**
         * Start face detection.
         *
         * src <string>: image url or dataURI
         * dataURI <boolean>: whether src is a dataURI
         */
        function detect(src, dataURI) {
            if (src === currentImg.src) { // don't reload if detecting same image
                return;
            }

            var currentImageCount = ++totalImageCount;

            startLoading();
            clearCanvas();
            // remove all face boxes
            //facesContainer.children().remove();

            currentImg.onload = function() {
                var scale = Math.min(width / currentImg.width, height / currentImg.height, 1.0);
                imageInfo = {
                    width: currentImg.width * scale,
                    height: currentImg.height * scale,
                    offsetX: (width - currentImg.width * scale) / 2,
                    offsetY: (height - currentImg.height * scale) / 2
                };

                $("#photo").html('<img src="'+imageUpload+'" width="'+imageInfo.width+'" height="'+imageInfo.height+'">');
                $('#photo>img').drags(); 

                console.log("width : "+imageInfo.width);
                console.log("height : "+imageInfo.height);
                console.log("offsetX : "+imageInfo.offsetX);
                console.log("offsetY : "+imageInfo.offsetY);
                $.ajax({
                    type: "POST",
                    url: baseurl+"makeovers/siteup/setSize/",
                    data: { 
                        imageSize : imageInfo.width+","+imageInfo.height
                    }
                }).done(function(msg) {
                    console.log(msg);
                    //$("#adjustModal").modal('hide');
                    //stopLoading();
                }).fail(function() {
                    alert( "Save Adjust Error!!" );
                });

                faceppDetect({
                    img: currentImg.src,
                    type: (dataURI ? 'dataURI' : 'url'),
                    success: function(faces) {
                        if (currentImageCount === totalImageCount) {
                            // display "REST URL"
                            var url = API_URL + 'detection/detect?api_key=' + API_KEY + '&api_secret=' + API_SECRET;
                            console.log("Conecting: "+url);
                            if (!dataURI) {
                                url += '&url=' + encodeURIComponent(currentImg.src);
                            }

                            var json = JSON.stringify(faces, null, '  ');
                            var face_found;
                            try {
                                // highlight json for "Response JSON"
                                Rainbow.color(json, 'javascript', function(html) {
                                    container.find('.result').html(html);
                                });
                                face_found=true;
                            } catch (err) {
                                container.find('.result').text(json);
                                face_found=false;
                            }

                            //drawFaces(imageInfo, faces.face);
                            try{
                                FACE_ID = faces.face[0].face_id;
                                imageWidth = faces.face[0].position.width;
                                console.log(imageWidth);
    							faceppLandmark({
    								img: currentImg.src,
    								type: 'url',
    								success: function(faces2) {
    									if (currentImageCount === totalImageCount) {
    										// display "REST URL"
    										var url = API_URL + 'detection/detect?api_key=' + API_KEY + '&api_secret=' + API_SECRET + '&face_id=' + FACE_ID + '&type=83p';
    										if (!dataURI) {
    											url += '&url=' + encodeURIComponent(currentImg.src);
    										}
    										//showStatus(url);

    										var json = JSON.stringify(faces2, null, '  ');
    										try {
    											// highlight json for "Response JSON"
    											Rainbow.color(json, 'javascript', function(html) {
    												container.find('.result').html(html);
    											});
    										} catch (err) {
    											container.find('.result').text(json);
    										}

    										drawFaces(imageInfo, faces2.result);
    										//FACE_ID = faces.face[0].face_id;
    									}
    								},
    								error: function() {
    									if (currentImageCount === totalImageCount) {
    										clearCanvas();
    										stopLoading();
    										showStatus(messages.LOAD_ERROR);
    									}
    								}
    							});
                            }catch(err){
                                alert('No Face Found!!');
                            }
                        }
                    },
                    error: function() {
                        if (currentImageCount === totalImageCount) {
                            clearCanvas();
                            stopLoading();
                            showStatus(messages.LOAD_ERROR);
                        }
                    }
                });
				
            };
            currentImg.onerror = function() {
                clearCanvas();
                stopLoading();
                facesContainer.addClass('invalid');
                container.find('.result').html('');
                showStatus(messages.URL_ERROR);
            };
            currentImg.src = src;
        }

        // ==================== INPUT ======================

        // URL Input
        container.find('.url-field').
            focus(function() { $(this).select(); }).
            mouseup(function() { return false; });

        container.find('.url-form').on('submit', function() {
            detect($(this).children('.url-field').val());
            return false;
        });

        // Photolist input
        photolist.children('img').click(function() {
            var url = container.find('.url-field');
            url.val(this.src);
            detect(this.src);
        });

        // Webcam Input
        if (navigator.getUserMedia) {
            console.log("in to webcam");
            var webcam = container.find('.webcam');
            if (webcam) {
                webcam.click(function() {
                    $('#takePicture').modal('hide')
                    
                    var videoWidth = 0;
                    var videoHeight = 0;

                    $('#camera').modal();
                    $("#camera").on('shown.bs.modal', function (e) {

                        videoWidth = 1054;
                        videoHeight = 790;
                        //var cameraMarginLeft = ($(".camera-modal>video").width() - $(".camera-modal").width()) / 2
                        var cameraMarginLeft = (1054 - $(".camera-modal").width()) / 2
                        console.log("Camera Modal Video- " + $(".camera-modal>video").width());
                        console.log("Camera Modal - " + $(".camera-modal").width());
                        $(".camera-modal>video").css({
                            marginLeft : -cameraMarginLeft+"px"
                        });

                    });

                    navigator.getUserMedia({
                            video: true,
                            audio: false
                        },
                        function(localMediaStream) {
                            var video = $('.camera-modal>video').get(0);
                            var cameraModal = container.find('.camera-modal');

                            var modalClose = function() {
                                $(video).hide();
                                localMediaStream.stop();
                                //cameraModal.hide();
                                $('#camera').modal('hide');
                                //container.find('.capture').hide();
                                cameraModal.unbind('click');
                            };
                            cameraModal.click(modalClose);
                        
                            $("#closeWebcam").bind('click',function(){
                                $('#camera').modal('hide');
                                localMediaStream.stop();
                            });
                        
                            video.src = window.URL.createObjectURL(localMediaStream);
                            video.onerror = function() {
                                localMediaStream.stop();
                                modalClose();
                            };

                            $([container.find('.capture').get(0), video]).
                                show().
                                unbind('click').click(function() {
                                    startLoading();
                                    var scale = Math.min(width / videoWidth, height / videoHeight, 1);
                                    // draw video on to canvas
                                    var tmpCanvas = document.createElement('canvas');
                                    tmpCanvas.height = videoHeight * scale;
                                    tmpCanvas.width = videoWidth * scale;
                                    tmpCanvas.getContext('2d').drawImage(video, 0, 0, videoWidth * scale, videoHeight * scale);
                                    
                                    console.log("Width/videoWidth : "+width+"/"+videoWidth);
                                    console.log("height/videoHeight : "+height+"/"+videoHeight);
                                    console.log("Scale Image :"+ scale);
                                    
                                    var dataUrl = tmpCanvas.toDataURL('image/jpeg', 0.85);
                                    $.ajax({
                                      type: "POST",
                                      url: baseurl+"makeovers/siteup/ajaxUploader/",
                                      data: { 
                                         imgBase64: dataUrl
                                      }
                                    }).done(function(msg) {
                                        /* $("#photo").html('<img src="'+msg+'" style="width:50%">');
                                        $('#photo>img').drags();  */
                                        imageUpload = msg;
                                        detect(tmpCanvas.toDataURL('image/jpeg'), true);
                                        console.log(tmpCanvas.toDataURL('image/jpeg'));
                                    }).fail(function() {
                                        alert( "error" );
                                    });

                                    modalClose();
                                    return false;
                                });

                        },
                        function() {
                            $('#camera').modal('hide');
                            showStatus(messages.NO_CAMERA);
                            hideInputButton('.webcam');
                        }
                    );
                    return false;
                });
            }
        } else {
            $('#camera').modal('hide');
            //hideInputButton('.webcam');
        }

        // Upload input
        if (window.FileReader) {
            console.log("FileReader");
            container.find('.upload-file').change(function() {

                console.log("masuk ke upload file");
                if (this.files[0].size < 1048576) {
                    startLoading();
                    var reader = new FileReader();
                    reader.onload = function() {
                        $.ajaxFileUpload(
                            {
                                url: baseurl+'makeovers/siteup/ajaxUploader2',
                                secureuri:false,
                                fileElementId:'fileToUpload',
                                dataType: 'json',
                                data:{},
                                success: function (data, status)
                                {
                                    if(typeof(data.error) != 'undefined')
                                    {
                                        if(data.error != '')
                                        {
                                            alert(data.error);
                                        }else{
                                            /* $("#photo").html('<img src="'+data.msg+'" style="width:50%">');
                                            $('#photo>img').drags();  */
                                            imageUpload = data.msg;
                                            detect(reader.result, true);
                                        }
                                    }
                                },
                                error: function (data, status, e)
                                {
                                    alert(e);
                                }
                            }
                        );
                    };
                    reader.onerror = function() {
                        //stopLoading();
                        facesContainer.addClass('invalid');
                    };
                    reader.readAsDataURL(this.files[0]);
                } else {
                    alert("Ukuran poto tidak boleh lebih dari 1 Mb!");
                }
                $("#takePicture").modal("hide");
                
            });
        } else {
            hideInputButton('.upload-file-wrapper');
        }

        // initialize to first image in photlist
        clearCanvas();
        photolist.children('img:first-child').click();
    }


    // =========== utility functions ===========

    /**
     * Reference: http://stackoverflow.com/questions/4998908/convert-data-uri-to-file-then-append-to-formdata
     */
    function dataURItoBlob(dataURI) {
        var binary = atob(dataURI.split(',')[1]);
        var array = [];
        for(var i = 0; i < binary.length; i++) {
            array.push(binary.charCodeAt(i));
        }
        return new Blob([new Uint8Array(array)], { type: 'image/jpeg' });
    }

    /**
     * options:
     *     {
     *         img:     <string>   URL or Data-URI,
     *         type:    <string>   'url' or 'dataURI',
     *         success: <function> success callback,
     *         error:   <function> error callback
     *     }
     */
    function faceppDetect(options) {
        if ($.support.cors) {
            var xhr = new XMLHttpRequest();
            xhr.timeout = 60 * 1000;
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        options.success(JSON.parse(xhr.responseText));
                    } else {
                        options.error();
                    }
                }
            };

            if (options.type === 'url') {
                xhr.open('GET', API_URL + 'detection/detect?api_key=' + API_KEY + '&api_secret=' + API_SECRET + '&url=' + encodeURIComponent(options.img), true);
                xhr.send();
            } else if (options.type === 'dataURI') {
                xhr.open('POST', API_URL + 'detection/detect?api_key=' + API_KEY + '&api_secret=' + API_SECRET, true);
                var fd = new FormData();
                fd.append('img', dataURItoBlob(options.img));
                xhr.send(fd);
            } else {
                options.error();
            }
        } else { // fallback to jsonp
            if (options.type === 'url') {
                $.ajax({
                    url: API_URL + 'detection/detect',
                    data: {
                        api_key: API_KEY,
                        api_secret: API_SECRET,
                        url: options.img
                    },
                    dataType: 'jsonp',
                    success: options.success,
                    error: options.error,
                    timeout: 60 * 1000
                });
            } else {
                options.error();
            }
        }
    }
	
	function faceppLandmark(options) {
        if ($.support.cors) {
            var xhr = new XMLHttpRequest();
            xhr.timeout = 60 * 1000;
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        options.success(JSON.parse(xhr.responseText));
                    } else {
                        options.error();
                    }
                }
            };

            if (options.type === 'url') {
                console.log ("Get : "+API_URL);
                xhr.open('GET', API_URL + 'detection/landmark?api_key=' + API_KEY + '&api_secret=' + API_SECRET + '&face_id=' + FACE_ID + '&type=83p', true);
                xhr.send();
            }else {
                options.error();
            }
			
        } else { // fallback to jsonp
            if (options.type === 'url') {
                $.ajax({
                    url: API_URL + 'detection/landmark',
                    data: {
                        api_key: API_KEY,
                        api_secret: API_SECRET,
                        face_id: FACE_ID,
						type: '83p',
                    },
                    dataType: 'jsonp',
                    success: options.success,
                    error: options.error,
                    timeout: 60 * 1000
                });
            } else {
                options.error();
            }
        }
    }

    // onload function

    $(function() {
        makeDetector(document.getElementById('body'), {
            imgs: [
                
            ]
        });
    });

})();
