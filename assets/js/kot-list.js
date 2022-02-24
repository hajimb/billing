var controller = "tableorder";

$(function () {
    $(document).ready(function() {
        getkotdetails();
    });
});

$(document).on("click", ".createorder", function(e) {
    var id = $(this).attr('table_id');
    $("#main_id").val(id);

    var bill_id = $(this).attr('bill_id');
    var table_id = $(this).attr('table_id');
    $("#table_id").val(table_id);
    $("#bill_id").val(bill_id);

    var url = base_url+controller+"/create";
    $("#mainfrm").attr('action', url);
    $("#mainfrm").submit();
});

$(document).on("click", ".vieworder", function(e) {
    var bill_id = $(this).attr('bill_id');
    var table_id = $(this).attr('table_id');
    $("#table_id").val(table_id);
    $("#bill_id").val(bill_id);
    var url = base_url+controller+"/view";
    $("#mainfrm").attr('action', url);
    $("#mainfrm").submit();
});

    function getkotdetails() {
        // console.log('getkotdetails');
        $.ajax({
            url: base_url +'Api/order/getkotdetails',
            method:'POST',
            data:{restaurant_id},
            dataType: 'json',
            success:function(resp){
                console.log(JSON.stringify(resp));
                if(resp.status == true){
                    LoadTables(resp.data);
                    setTimeout( function(){
                        getkotdetails();
                    }, 5000);
                }else{
                    toastr.error(resp.message);
                }
          }
        })
        return false;
    }
    function LoadTables(table_data){
        var box = '';
        $("#kot_data").html('');
        table_data.forEach(kot_detail => {
            // console.log('Each Row : '+JSON.stringify(table_s));
            var table_status_val = '';
            if(kot_detail['status'] == "OrderTaken"){ 
                table_status_val = "bg-warning";  
            }else if(kot_detail['status'] == "InCooking"){ 
                table_status_val = "bg-danger"; 
            }else if(kot_detail['status'] == "OrderReady"){ 
                table_status_val = "bg-sucess"; 
            }

            var span_OrderTaken = 'none';
            var span_OrderReady = 'none';
            var span_InCooking = 'none';

            if(kot_detail['status'] == 'OrderTaken'){ span_OrderTaken = "inline";}
            if(kot_detail['status'] == 'OrderReady'){ span_OrderReady = "inline";}
            if(kot_detail['status'] == 'InCooking'){ span_InCooking = "inline";}
            var kot_list ='';
            items = kot_detail['items'];
            items.forEach(kot_items => {
                kot_list = kot_list + `<div class="col-md-5 col-sm-5"><span>${kot_items['item_name']}</span></div>
                <div class="col-md-1 col-sm-1 text-center"><span>${kot_items['qty']}</span></div>
                <div class="col-md-6 col-sm-6 text-right"><span>${kot_items['instruction']}</span></div>`;
            });
            box = ` <div class="col-lg-3 col-md-3  col-sm-6 ">
                        <div class="small-box hotel-tab-kot  blank-tab ">
                            <div class="inner text-left border-bottom ${table_status_val}" style="border-top-left-radius: 10px; border-top-right-radius:10px;"> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>${kot_detail['tablename']}</strong>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        Token No. <strong>${kot_detail['kot']}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="inner text-left hotel-kot">
                                <div class="row">
                                    ${kot_list}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 text-center">
                                    <span style="display:${span_OrderTaken};">
                                        <button class="btn btn-app action-btn" onclick="orderstatusupdate(${kot_detail['bill_id']},${kot_detail['table_id']},${kot_detail['Id']},'InCooking');" >
                                        <i class="fas fa-check-square"></i>
                                        </button>
                                    </span>
                                    <span style="display:${span_OrderTaken};">
                                        <button class="btn btn-app action-btn" onclick="orderstatusupdate(${kot_detail['bill_id']},${kot_detail['table_id']},${kot_detail['Id']},'KitchenReject');" >
                                        <i class="far fa-window-close"></i>
                                        </button>
                                    </span>
                                    <span style="display:${span_OrderReady};">
                                        <button class="btn btn-app action-btn" onclick="orderstatusupdate(${kot_detail['bill_id']},${kot_detail['table_id']},${kot_detail['Id']},'PickedUpByWaiter');" >
                                        <i class="fas fa-utensils"></i> 
                                        </button>
                                    </span>
                                    <span style="display:${span_InCooking};">
                                        <button class="btn btn-app action-btn" onclick="orderstatusupdate(${kot_detail['bill_id']},${kot_detail['table_id']},${kot_detail['Id']},'OrderReady');" >
                                        <i class="fas fa-concierge-bell"></i> 
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>`;
        $("#kot_data").append(box);
        // if(table_s['table_stime'] > 0){
        //     var sec = table_s['table_stime'];
        //     secondsTimeSpanToHMS(++sec,table_s['table_id']);
        //     setInterval( function(){
        //         secondsTimeSpanToHMS(++sec,table_s['table_id']);
        //     }, 1000);
        // }
        });
    }
    