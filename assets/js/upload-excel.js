$(function () {
    var progressBar = $('#progress-bar');
    var filename;
    $("#categoryForm").submit(function (event) {
        var inputFile = $('input[name=category]');
        var uploadURI = base_url+"Api/upload/category";
        toastr.remove();
        event.preventDefault();
        if(!$('#category').val()){
            toastr.error("No file selected For Category");
        }else{
            var fileToUpload = inputFile[0].files[0];
            // make sure there is file to upload
            if (fileToUpload != 'undefined') {
                $.ajax({
                    type: 'POST',
                    url: uploadURI,
                    data: new FormData($("#categoryForm")[0]),
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    complete: function(){
                        setTimeout(function(){$(".progress").fadeOut('slow');},1000);                        
                    },
                    success: function (resData) {
                        var {status,validate,msg} = resData;
                        if (validate === true) {
                            if(status  == true){
                                toastr.success(msg);
                            }else if(status == false){
                                toastr.error(msg);
                                return false;
                            }
                        }else{
                            $.each(msg, function(key, value) {
                                if(value!=''){
                                    toastr.error(value);
                                    $("#"+key).focus();
                                    return false;
                                }
                            });
                        }
                    },error: function(){
                        alert('err');
                    },
                    xhr: function () {
                        var xhr = new XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function (event) {
                            if (event.lengthComputable) {
                                var percentComplete = Math.round((event.loaded / event.total) * 100);
                                // console.log(percentComplete);
                                $('.progress').show();
                                progressBar.css({width: percentComplete + "%"});
                                progressBar.text(percentComplete + '%');
                            }
                            ;
                        }, false);
                        return xhr;
                    }
                });
            }
        }
    });


    $("#itemForm").submit(function (event) {
        var inputitemFile = $('input[name=items]');
        var uploadItemURI = base_url+"Api/upload/items";
        toastr.remove();
        event.preventDefault();
        if(!$('#items').val()){
            toastr.error("No file selected For Items");
        }else{
            var fileToUpload = inputitemFile[0].files[0];
            // make sure there is file to upload
            if (fileToUpload != 'undefined') {
                $.ajax({
                    type: 'POST',
                    url: uploadItemURI,
                    data: new FormData($("#itemForm")[0]),
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    complete: function(){
                        setTimeout(function(){$(".progress").fadeOut('slow');},1000);                        
                    },
                    success: function (resData) {
                        var {status,validate,msg} = resData;
                        if (validate === true) {
                            if(status  == true){
                                toastr.success(msg);
                            }else if(status == false){
                                toastr.error(msg);
                                return false;
                            }
                        }else{
                            $.each(msg, function(key, value) {
                                if(value!=''){
                                    toastr.error(value);
                                    $("#"+key).focus();
                                    return false;
                                }
                            });
                        }
                    },error: function(err){
                        // alert('err');
                        // alert(JSON.stringify(err));
                    },
                    xhr: function () {
                        var xhr = new XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function (event) {
                            if (event.lengthComputable) {
                                var percentComplete = Math.round((event.loaded / event.total) * 100);
                                // console.log(percentComplete);
                                $('.progress').show();
                                progressBar.css({width: percentComplete + "%"});
                                progressBar.text(percentComplete + '%');
                            }
                            ;
                        }, false);
                        return xhr;
                    }
                });
            }
        }
    });


    $("#RawmaterialForm").submit(function (event) {
        var inputitemFile = $('input[name=rawmaterials]');
        var uploadItemURI = base_url+"Api/upload/rawmaterial";
        toastr.remove();
        event.preventDefault();
        if(!$('#rawmaterials').val()){
            toastr.error("No file selected For Items");
        }else{
            var fileToUpload = inputitemFile[0].files[0];
            // make sure there is file to upload
            if (fileToUpload != 'undefined') {
                $.ajax({
                    type: 'POST',
                    url: uploadItemURI,
                    data: new FormData($("#RawmaterialForm")[0]),
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    complete: function(){
                        setTimeout(function(){$(".progress").fadeOut('slow');},1000);                        
                    },
                    success: function (resData) {
                        var {status,validate,msg} = resData;
                        if (validate === true) {
                            if(status  == true){
                                toastr.success(msg);
                            }else if(status == false){
                                toastr.error(msg);
                                return false;
                            }
                        }else{
                            $.each(msg, function(key, value) {
                                if(value!=''){
                                    toastr.error(value);
                                    $("#"+key).focus();
                                    return false;
                                }
                            });
                        }
                    },error: function(err){
                        // alert('err');
                        // alert(JSON.stringify(err));
                    },
                    xhr: function () {
                        var xhr = new XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function (event) {
                            if (event.lengthComputable) {
                                var percentComplete = Math.round((event.loaded / event.total) * 100);
                                // console.log(percentComplete);
                                $('.progress').show();
                                progressBar.css({width: percentComplete + "%"});
                                progressBar.text(percentComplete + '%');
                            }
                            ;
                        }, false);
                        return xhr;
                    }
                });
            }
        }
    });

    $('body').on('change.bs.fileinput', function (e) {
        $('.progress').hide();
        progressBar.text("0%");
        progressBar.css({width: "0%"});
    });
});

