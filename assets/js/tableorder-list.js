var controller = "tableorder";
var myInterval ;
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
        gettabledetails();
        
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

    function gettabledetails() {
        // console.log('gettabledetails');
        $.ajax({
            url: base_url +'Api/order/gettabledetails',
            method:'POST',
            data:{restaurant_id},
            dataType: 'json',
            success:function(resp){
                console.log(JSON.stringify(resp));
                if(resp.status == true){
                    LoadTables(resp.data);
                    setTimeout( function(){
                        gettabledetails();
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
        $("#tabledata").html('');
        table_data.forEach(table_s => {
            // console.log('Each Row : '+JSON.stringify(table_s));
            var table_status_val = '';
            if(table_s['ord_status'] == "BillPaid"){ 
                table_status_val = "bg-danger";  
            }else if(table_s['ord_status'] == "InCooking"){ 
                table_status_val = "bg-success"; 
            }else if(table_s['ord_status'] == "OrderTaken"){ 
                table_status_val = "bg-cyan"; 
            }else if(table_s['ord_status'] == "KitchenAccept"){ 
                table_status_val = "bg-teal"; 
            }else if(table_s['ord_status'] == "OrderReady"){ 
                table_status_val = "bg-orange"; 
            }else if(table_s['ord_status'] == "PickedUpByWaiter"){ 
                table_status_val = "bg-indigo"; 
            }else if(table_s['ord_status'] == "OrderOnTable"){ 
                table_status_val = "bg-secondary"; 
            }else if(table_s['ord_status'] == "BillRaised"){ 
                table_status_val = "bg-pink"; 
            }else{ 
                table_status_val = "bg-light";
            }
            var span_OrderOnTable = 'none';
            var span_PrintBill = 'none';
            var span_ViewOrder = 'none';
            var span_EmptyTable= 'none';
            if(table_s['ord_status'] == 'PickedUpByWaiter'){ span_OrderOnTable = "inline";}
            if(table_s['ord_status'] == 'BillPaid' || table_s['ord_status'] == 'BillRaised'){ span_PrintBill = "inline";}
            if(table_s['ord_status'] != '' && table_s['ord_status'] != 'KitchenReject'){ span_ViewOrder = "inline";}
            if(table_s['ord_status'] == 'BillPaid'){ span_EmptyTable = "inline";}

            box = ` <div class="col-lg-2 col-md-2  col-sm-6 btn" >
                            <div class="small-box hotel-tab  blank-tab ${table_status_val}">
                                <div class="inner text-center hotel-table">
                                    <span class="${table_status_val} createorder"  table_id="${table_s['table_id']}" bill_id="${table_s['bill_id']}">
                                        <div>${table_s['tablename']}</div>
                                        <div>&nbsp;</div>
                                        <div> 
                                            <span id="hours_${table_s['table_id']}" class="hours">00</span>:<span id="minutes_${table_s['table_id']}" class="minutes">00</span>:<span id="seconds_${table_s['table_id']}" class="seconds">00</span>
                                        </div>
                                    </span>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                                <span style="display:${span_OrderOnTable};" id="OrderOnTable_${table_s['table_id']}">
                                                    <a class="btn btn-app action-btn" href="javascript:void(0);" onclick="orderstatusupdateTable(${table_s['table_id']},'OrderOnTable');" title="Order On Table">
                                                    <i class="fas fa-concierge-bell"></i> 
                                                    </a>
                                                </span>
                                                <span style="display:${span_PrintBill};" id="PrintBill_${table_s['table_id']}">
                                                    <a class="btn btn-app action-btn PrintBill" data-id="${table_s['bill_id']}" href="javascript:void(0);">
                                                    <i class="fas fa-print"></i>
                                                    </a>
                                                </span>
                                                <span style="display:${span_ViewOrder};" id="ViewOrder_${table_s['table_id']}">
                                                    <a class="btn btn-app action-btn vieworder"  table_id="${table_s['table_id']}" bill_id="${table_s['bill_id']}">
                                                        <i class="far fa-eye"></i> 
                                                    </a>
                                                </span>
                                                <span style="display:${span_EmptyTable};" id="EmptyTable_${table_s['table_id']}">
                                                    <a class="btn btn-app action-btn" href="javascript:void(0);" onclick="tableEmpty(${table_s['table_id']});" >
                                                        <i class="far fa-window-close"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
        $("#tabledata").append(box);
        if(table_s['table_stime'] > 0){
            console.log(table_s['table_id']);
            console.log(table_s['table_stime']);
            var sec = table_s['table_stime'];
            secondsTimeSpanToHMS(++sec,table_s['table_id']);
            clearInterval(myInterval);
            myInterval = setInterval( function(){
                secondsTimeSpanToHMS(++sec,table_s['table_id']);
            }, 1000);
        }
        });
    }
    