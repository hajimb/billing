'use strict';
var controller = "inventory";
var rurl        = $('#rurl').val();

$(document).on("change", "#rawmaterial_id", function(e) {
    var unit = $('option:selected', this).attr('data-id');
    $("#lblunits").html(unit);
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
        url: base_url + "Api/"+controller+"/"+rurl+"_save",
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
                        $("#"+formId+" #" + k + "").focus();
                        return false
                    }
                });
            } else if (status === false) {
                toastr.error(message)
            } else {
                toastr.success(message)
                 window.setTimeout(function() {
                    window.location.href = base_url+rurl;
                }, 1500);
            }
        }, error: function(err){
            // alert(JSON.stringify(err))
            console.log(JSON.stringify(err))
            $("#"+btnid).stopLoading();
        }, complete:function(data){
            $("#"+btnid).stopLoading();
        }
    });
});

$(document).on("change", "#paid_amount, #total_amount", function (e) {
    console.log('keyup');
    var total_amount = $('#total_amount').val();
    var paid_amount = $('#paid_amount').val();
    if (parseFloat(total_amount) < parseFloat(paid_amount)) {
      toastr.error(`Paid Amount cannot be more then ${total_amount}`);
      $("#paid_amount").val("").focus();
      $("#payment_type").val(0);
    }else if(parseFloat(total_amount) == parseFloat(paid_amount)) {
        $("#payment_type").val(1);
    }else{
        $("#payment_type").val(2);
    }
  });