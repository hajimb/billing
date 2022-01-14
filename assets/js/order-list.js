var controller = "order";

$(function () {
    $(document).ready(function() {
        $('#mainTable').DataTable({
            "stripeClasses": []
          } );
        $("#mainGroupNav").addClass('active');
        $("#manageGroupNav").addClass('active');
    });
});

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
