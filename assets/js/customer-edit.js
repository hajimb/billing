'use strict';
var controller = "customer";
$(function () {
    $('.datepickers').datepicker({
        clearBtn: true,
        format: "yyyy-mm-dd"
    });
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
        url: base_url + "Api/"+controller+"/save",
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


function isNumber(evt) {
    toastr.remove()
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if(charCode > 31 && (charCode < 48 || charCode > 57)) {
        toastr.error("Only Numbers Allowed")
        $("#mobile").val('').focus();
        return false;
    }
  }