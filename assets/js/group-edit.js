'use strict';
$(function () {
    $(document).ready(function() {
        $("#mainGroupNav").addClass('active');
        $("#manageGroupNav").addClass('active');
        $('input[type="checkbox"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass   : 'iradio_minimal-blue'
        });
      });
});

$("#checkAll").click(function () {
    $('.permission').prop('checked', this.checked);
});
$(".permission").change(function(){
    if (! $(this).is('checked')) {
        $('#checkAll').prop('checked', false);
    }       
});
$(document).on("click", ".saveChange", function(e) {
    e.preventDefault();
    toastr.remove();
    var btnid = $(this).attr('id');
    var formId = $(this).data('form');
    var form = $("#"+formId).serialize();
    console.log("resData " + form);
    $.ajax({
        type: "POST",
        url: base_url + "Api/groups/save",
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
                toastr.success(message)
                 window.setTimeout(function() {
                    window.location.href = base_url+'groups';
                }, 1500);
            }
        }, error: function(){
            $("#"+btnid).stopLoading();
        }, complete:function(data){
            $("#"+btnid).stopLoading();
        }
    });
});

