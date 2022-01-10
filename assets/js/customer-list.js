'use strict';
var table   = '';
var apiUrl  = base_url + 'Api/customer/';
var modaltitle = 'Customer';

$('document').ready(function() {
    ShowList();
});


$('#saveRoles').click(function(e) {
    let btnid  = 'saveRoles';
    let formId = 'permissions-form';
    $.ajax({
        type: 'POST',
        url: apiUrl+'save',
        data: $('#permissions-form :input').serialize()+"&userId="+userId,
        dataType:'json',
        beforeSend: function() {
            $("#"+btnid).startLoading();
        },
        success : function(resData){
            // alert(JSON.stringify(resData));
            var {status,validate,message} = resData;
            if (validate === true) {
                if(status === true){
                    toastr.success(message);
                    $('#'+formId+' input[type=text]').val('');
                    $('#'+formId+' select').val('');
                    $("#role-details-section").html('');
                    reset(formId);
                }else if(status == false){
                    toastr.warning(message);
                    return false;
                }
            }else{
                $.each(message, function(key, value) {
                    if(value!=''){
                        toastr.error(value);
                        $("#"+formId+"input[name="+key+"]").val('');
                        $("input[name="+key+"]").focus();
                        return false;
                    }
                });
            }
        }, error: function(){
            $("#"+btnid).stopLoading();
        }, complete:function(data){
            $("#"+btnid).stopLoading();
        }
    });
});

//////////////////////////////////////////////////List////////////////////////////////////
function ShowList() {
    $.ajax({
        type: 'POST',
        url: apiUrl,
        dataType:'json',
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (resData) {
            var {status, message, data} = resData;
            if(status === true){
                createTable(data)
            }else {
                toastr.error(message);
            }
        }
    });
}

function createTable(jsonData){
    // $('#datatable tfoot th').each(function() {
    //     var title = $(this).text();
    //     if (title != 'Action' && title != ' ')
    //         $(this).html('<input type="text" class="form-control input-style" style="height:36px" placeholder="Search ' + title + '" />');
    // });
    table = $('#datatable').DataTable({
        "destroy": true,
        "searching": false,
        "data": jsonData,
        
    });
    // table.columns().every(function() {
    //     var that = this;
    //     $('input', this.footer()).on('keyup change', function() {
    //         if (that.search() !== this.value) {
    //             that
    //                 .search(this.value)
    //                 .draw();
    //         }
    //     });
    // });
}

$(document).on("click", ".getdetail" , function(e) {
    var id = $(this).data('id');
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        type    : "POST",
        url     : apiUrl+"get",
        data    : {id:id, userId:userId},
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, validate, message, data} = resData;

            if(status === true){
                var size = Object.keys(data).length;
                if(size > 0){
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#username').val(data.username);
                    $('#email').val(data.email);
                    $('#role_id').val(data.role_id);
                    changeRoles(data.role_id);
                }else{
                    toastr.error('No Data');
                }
                // $.toaster(message, 'Success', 'success');
                
            }else if(status == false){
                toastr.error(message);
                
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
});

$(document).on("click", ".delete" , function(e) { 
    var id  = $(this).data('id');
    var msg  = "Are You sure you want to delete this customer";
    showConfirmMessage(id, msg)
});

function confirmdelete(id){
    $.ajax({
        type    : "POST",
        url     : apiUrl+'delete',
        data    : {id:id},
        dataType: 'json',
        success : function(resData){
            var {status, validate, message} = resData;
            if(status === true){
                ShowList();
                Swal.fire(modaltitle+" Successfully Deleted! ", {
                    icon: "success",
                    timer: 2000,
                });
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