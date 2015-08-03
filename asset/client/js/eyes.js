var html_w;
var html_h;
var header_w;
var header_h;
var photo_w;
var bottom_productDetail;
//var baseurl = "http://labelbranding.com/demo/osmosis2/";
var baseurl = "http://localhost/osmosis/";

function eyeslinecolor(r,g,b,url,types){
    $.ajax({
            type: "POST",
            url: baseurl+url,
            data: { 
                red : r,
                green : g,
                blue : b,
                opacity : $("#opacity_eyeliner").val(),
                type : types
            },
            beforeSend: function( xhr ) {
                console.log("ajax eyescolor"+r+"-"+g+"-"+b+"-"+$("#opacity_eyeliner").val()+" type : "+types);
                startLoading();
            }
        }).done(function(msg) {
            console.log(msg);
            if(!msg){    // Jika session belum di set maka nilai kembali dari fungsi makeover/lips bernilai false
                stopLoading();
                alert('Upload or Take a Picture!!');
                $('#eyeliner_color .product_item').removeClass('active');
                $('#takePicture').modal();
            }else{
                $("#photo").html('<img src="'+msg+'">');
                $('#photo>img').drags();
                stopLoading();
            }
        }).fail(function() {
            alert( "Color Error!!" );
        }).always(function(){
            console.log("Eyes color error on eyeliner panel");
        });
}

function cheekscolor (r,g,b,url,types) {
    $.ajax({
            type: "POST",
            url: baseurl+url,
            data: { 
                red : r,
                green : g,
                blue : b,
                opacity : $("#opacity_eyeliner").val(),
                type : types
            },
            beforeSend: function( xhr ) {
                console.log("ajax cheekscolor "+r+"-"+g+"-"+b+"-"+$("#opacity_eyeliner").val()+" type : "+types);
                startLoading();
            }
        }).done(function(msg) {
            console.log(msg);
            if(!msg){    // Jika session belum di set maka nilai kembali dari fungsi makeover/lips bernilai false
                stopLoading();
                alert('Upload or Take a Picture!!');
                $('#blush_color .product_item').removeClass('active');
                $('#takePicture').modal();
            }else{
                $("#photo").html('<img src="'+msg+'">');
                $('#photo>img').drags();
                stopLoading();
            }
        }).fail(function() {
            alert( "Color Error!!" );
        }).always(function(){
            console.log("FBlush color error on bluchcolor panel");
        });
}

function lipscolor(r,g,b,url,types){
    $.ajax({
            type: "POST",
            url: baseurl+url,
            data: { 
                red : r,
                green : g,
                blue : b,
                opacity : $("#opacity_lips").val(),
                type : types
            },
            beforeSend: function( xhr ) {
                console.log("ajax lipscolor"+r+"-"+g+"-"+b+"-"+$("#opacity_lips").val()+" type : "+types);
                startLoading();
            }
        }).done(function(msg) {
            console.log(msg);
            if(!msg){    // Jika session belum di set maka nilai kembali dari fungsi makeover/lips bernilai false
               stopLoading();
               alert('Upload or Take a Picture!!');
               $('#lips_color .product_item').removeClass('active');
               $('#takePicture').modal();
            }else{
                $("#photo").html('<img src="'+msg+'">');
                $('#photo>img').drags();
                stopLoading();
            }
        }).fail(function() {
            alert( "Lips Color Error!!" );
        }).always(function(){
            console.log("always lipscolor");
        });
}

function facecolor(r,g,b,url,types){
    $.ajax({
            type: "POST",
            url: baseurl+url,
            data: { 
                red : r,
                green : g,
                blue : b,
                opacity : $("#opacity_eyeliner").val(),
                type : types
            },
            beforeSend: function( xhr ) {
                console.log("ajax facecolor "+r+"-"+g+"-"+b+"-"+$("#opacity_eyeliner").val()+" type : "+types);
                startLoading();
            }
        }).done(function(msg) {
            console.log(msg);
            if(!msg){    // Jika session belum di set maka nilai kembali dari fungsi makeover/lips bernilai false
               stopLoading();
               alert('Upload or Take a Picture!!');
               $('#powder_panel .product_item').removeClass('active');
               $('#takePicture').modal();
            }else{
                $("#photo").html('<img src="'+msg+'">');
                $('#photo>img').drags();
                stopLoading();
            }
        }).fail(function() {
            alert( "Face Color Error!!" );
        }).always(function(){
            console.log("always facecolor");
        });
}