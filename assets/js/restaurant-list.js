var controller = "restaurant";

$(function () {
    $(document).ready(function() {
        $('#mainTable').DataTable();
        $("#mainGroupNav").addClass('active');
        $("#manageGroupNav").addClass('active');
    });
});

function Edit(id){
    $("#main_id").val(id);
    var url = base_url+controller+"/edit";
    $("#mainfrm").attr('action', url);
    $("#mainfrm").submit();
}

function Delete(id){
    $("#main_id").val(id);
    $("#myModalDelete").modal('show');
}

function View(id){
    toastr.remove();
    $(".btn").prop('disabled',true);    
    $.ajax({
        type: "POST",
        url: base_url + "Api/"+controller+"/view",
        data: {main_id:id},
        dataType: "json",
        beforeSend: function() {
            // $("#"+btnid).startLoading();
        },
        success: function(resData) {
            console.log("resData " + JSON.stringify(resData));
            var {status,validate,message} = resData;
            if (validate === false) {
                $.each(message, function(k, v) {
                    if (v !== "") {
                        toastr.error(v)
                        return false
                    }
                });
            } else if (status === false) {
                toastr.error(message)
            } else {
                $(".btn").prop('disabled',false);
                $("#res_name").html(message.restaurant_name);
                $("#res_contact").html(message.contact_no);
                $("#res_address").html(nl2br(message.restaurant_address));
                if(message.email != null && message.email != ''){
                    $("#res_email").html(message.email);
                    $("#div_email").show();
                }else{
                    $("#div_email").hide();
                }
                if(message.fssai_no != null && message.fssai_no != ''){
                    $("#res_fssai_no").html(message.fssai_no);
                    $("#div_fssai_no").show();
                }else{
                    $("#div_fssai_no").hide();
                }
                if(message.gstin_no != null && message.gstin_no != ''){
                    $("#res_gstin_no").html(message.gstin_no);
                    $("#div_gstin_no").show();
                }else{
                    $("#div_gstin_no").hide();
                }
                if(message.photo_file != null && message.photo_file != ''){
                    $("#photo_name").attr("src","assets/images/logo/"+message.photo_file);
                    $("#div_logo").show();
                }else{
                    $("#div_logo").hide();
                }
                if(message.qr_code != null && message.qr_code != ''){
                    $("#qr_name").attr("src","assets/images/qr/"+message.qr_code);
                    $("#div_qr").show();
                }else{
                    $("#div_qr").hide();
                }
                // $("#res_contact").html(message.contact_no);
                $("#myModalView").modal('show');
            }
        }, error: function(){
            $(".btn").prop('disabled',false);    
            // $("#"+btnid).stopLoading();
        }, complete:function(data){
            $(".btn").prop('disabled',false);    
            // $("#"+btnid).stopLoading();
        }
    });
}

$(document).on("click", "#confirmdelete", function(e) {
    e.preventDefault();
    toastr.remove();
    var btnid = $(this).attr('id');
    var formId = $(this).data('form');
    var form = $("#"+formId).serialize();
    $(".btn").prop('disabled',true);    
    $.ajax({
        type: "POST",
        url: base_url + "Api/"+controller+"/delete",
        data: form,
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
                $("#myModalDelete").modal('hide');
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

