'use strict';
// var photo_url = base_url+'assets/img/no-image-available.jpg';
var controller = "restaurant";

$(document).on("click", ".saveChange", function(e) {
    e.preventDefault();
    toastr.remove();
    var btnid = $(this).attr('id');
    var formId = $(this).data('form');
    
    var form = $("#"+formId)[0];
    var formdata = new FormData(form);
    
    // var form = $("#"+formId).serialize();
    console.log("resData " + form);
    $.ajax({
        type: "POST",
        url: base_url + "Api/"+controller+"/save",
        data: formdata,
        mimeType  : "multipart/form-data",
        processData: false,  // Important!
        contentType: false,
        cache   : false,
        dataType: "json",
        beforeSend: function() {
            $("#"+btnid).startLoading();
        },
        success: function(resData) {
            console.log("resData " + JSON.stringify(resData));
            var {status,validate,message} = resData;
            if (validate === false) {
                $.each(message, function(k, v) {
                    if (v !== "") {
                        toastr.error(v)
                        $("#"+formId+" input[name='" + k + "']").focus();
                        return false
                    }
                });
            } else if (status === false) {
                toastr.error(message)
            } else {
                toastr.success(message)
                 window.setTimeout(function() {
                    window.location.href = base_url+controller;
                }, 1500);
            }
        }, error: function(){
            $("#"+btnid).stopLoading();
        }, complete:function(data){
            $("#"+btnid).stopLoading();
        }
    });
});

function readURL(input) {
    var inp_name = $(input).attr('data-id');
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#'+inp_name).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }else{
        // console.log('photo_url:'+photo_url);
        $('#'+inp_name).attr('src', photo_url[inp_name]);
    }
}

$(document).on('click',".reset_img",function (event) { 
    var inp_name = $(this).attr('data-id');
    var file_name = $(this).attr('data-file');
    var $el = $('#'+file_name);
    $el.wrap('<form>').closest('form').get(0).reset();
    $el.unwrap();
    $('#'+inp_name).attr('src', photo_url[inp_name]);
});

$(".fileinput").change(function(){
    readURL(this);
});