
$(document).on("click", ".saveChange", function(e) {
    e.preventDefault();
    toastr.remove();
    var btnid = $(this).attr('id');
    var formId = $(this).data('form');
    var form = $("#"+formId).serialize();
    console.log(JSON.stringify(form,null,4))
    $.ajax({
        type: "POST",
        url: base_url + "Api/item/take",
        data: form,
        dataType: "html",
        beforeSend: function() {
            $("#"+btnid).startLoading();
        },
        success: function(resData) {
            console.log(resData);
            // $('#printDiv').html(resData);
            newWin = window.open("");
            newWin.document.write(resData);
            newWin.print();
            newWin.close();
        }, error: function(){
            $("#"+btnid).stopLoading();
        }, complete:function(data){
            $("#"+btnid).stopLoading();
        }
    });
})