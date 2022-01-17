var controller = "tableorder";

function secondsTimeSpanToHMS(s,id) {
    var h = Math.floor(s / 3600); //Get whole hours
    s -= h * 3600;
    var m = Math.floor(s / 60); //Get remaining minutes
    s -= m * 60;
    $("#seconds_"+id).html((s < 10 ? '0' + s : s));
    $("#minutes_"+id).html((m < 10 ? '0' + m : m));
    $("#hours_"+id).html((h < 10 ? '0' + h : h));
  }
  
$(function () {
    $(document).ready(function() {
        $("#mainGroupNav").addClass('active');
        $("#manageGroupNav").addClass('active');
    });
});

$(document).on("click", ".createorder", function(e) {
    var id = $(this).attr('table_id');
    alert(id);
    $("#main_id").val(id);
    var url = base_url+controller+"/create";
    $("#mainfrm").attr('action', url);
    $("#mainfrm").submit();
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