var controller  = "inventory";
var rurl        = $('#rurl').val();

$(function () {
    $(document).ready(function() {
        $('#mainTable').DataTable();
        $("#mainGroupNav").addClass('active');
        $("#manageGroupNav").addClass('active');
    });
});

function Edit(id){
    $("#main_id").val(id);
    var url = base_url+rurl+"/edit";
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
        url: base_url + "Api/"+controller+"/"+rurl+"_delete",
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
                    window.location.href = base_url+rurl;
                }, 1500);
            }
        }, error: function(){
            $("#"+btnid).stopLoading();
        }, complete:function(data){
            $("#"+btnid).stopLoading();
        }
    });
});