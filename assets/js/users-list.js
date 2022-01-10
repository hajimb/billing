var modaltitle = "User";
$(document).on("click", ".delete" , function(e) { 
    var id  = $(this).data('id');
    var msg  = "You want to delete this user";
    showConfirmMessage(id,msg)
});

function confirmdelete(id){
    $.ajax({
        type    : "POST",
        url     : base_url+'/Api/user/delete',
        data    : {id},
        dataType: 'json',
        success : function(resData){
            var {status, validate, message} = resData;
            if(status === true){
                Swal.fire(modaltitle+" Successfully Deleted! ", {
                    icon: "success",
                    timer: 2000,
                });
                 window.setTimeout(function() {
                    location.reload();
                }, 1500);
            }else if(status === false){
                Swal.fire(message, {
                    icon: "danger",
                    timer: 2000,
                });
                return false;
            }
        },error: function(){}
   });
}