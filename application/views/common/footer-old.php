<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="kot_item_detail">
          <p>One fine body&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id = "print">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="modal-default-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="kot_item_detail_reprint">
          <p>One fine body&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id = "reprint">print</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <div class="modal fade" id="modal-default-2">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Applied Discount</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="kot_item_detail_reprint">
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">

                <label for="inputMessage">Select Discount</label>
                <select class="form-control custom-select" placeholder="" name="discount_select" id="discount_select" >
                <option value="0">Select Discount</option>
                  
                <?php
                if(isset($discount) && count($discount) > 0){

                  foreach($discount as $dis) { ?>
                    <option value="<?=$dis['discount_id']?>"><?=$dis['discount_name']?></option>   
                  
                  <?php }
                  }?>                            
                </select>
              </div> 
            </div>  
            <div class="col-md-8">
              <div class="form-group">

                <label for="inputMessage" class="color-grey">Or</label>
                
              </div> 
              
            </div> 
            <div class="col-md-8">
              <div class="form-group">

                <label for="inputMessage">Add discount in %</label>
                <input type="number" class="form-control" placeholder="%" name="dis_per" id="dis_per">
                
              </div> 
              
            </div>   
            <div class="col-md-8">
              <div class="form-group">

                <label for="inputMessage" class="color-grey">Or</label>
                
              </div> 
              
            </div>
            <div class="col-md-8">
              <div class="form-group">

                <label for="inputMessage">Add fix discount</label>
                <input type="number" class="form-control" placeholder="" id="dis_fix" name="dis_fix">
                
              </div> 
            </div> 
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" id = "add_discount">Add Discount</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url();?>assets/js/common.js"></script>
<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/js/pages/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url();?>assets/js/toastr.min.js"></script>
<script src="<?= base_url();?>assets/js/pages/jquery.dataTables.min.js"></script>
<script src="<?= base_url();?>assets/js/pages/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url();?>assets/js/pages/bootstrap-datepicker.min.js"></script>    <script>
    //   $(function() {
      
    //     $('.blank-tab').click(function() {
    //       window.location.href='billing.html';
    //       });
    //     }
    // );    
    </script>

</body>
</html>
<style>
   
    .dropdown-menu {
        max-height: 300px;
        overflow-y: auto;
    }
</style>

<footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://www.thefudx.com/">FUDX</a>.</strong>
    All rights reserved.
    <!-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div> -->
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/js/autocomplete.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/js/pages/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.mockjax.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-typeahead.js"></script>

<script>
  window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      })
  }
  $( function() {
 $( "#accordion" ).accordion();
  } );
  $(function() {
  
    // $('.blank-tab').click(function() {
    //   window.location.href='billing.html';
    //   });
    
    

    // $('#save_order').click(function(){
    //   $('#tendered').val('').trigger('change')
    //   $('[name="total_tendered"]').val('')
    //   //$('#manage-order').submit()
    // })
    $('#manage-order-dineein').submit(function(e){
        e.preventDefault();
        //start_load()
        // if($('#ord_id').val() == ''){
          $.ajax({
            url:'<?php echo base_url() ?>order/add',
            method:'POST',
            data:$(this).serialize(),
            dataType: 'json',
            success:function(resp){
                console.log(resp.msg)
                if(resp.status == 1){
                  print_kot(resp.data)
                  Swal.fire({
                    text: 'Order successfully saved',
                    target: 'body',
                    customClass: {
                      container: 'position-absolute'
                    },
                    toast: true,
                    position: 'bottom-right'
                  }).then((result) => {
                    
                      window.location.href="table";
                    
                  })

                    //alert_toast("Order successfully saved.",'success')
                    // if($('[name="total_tendered"]').val() > 0){
                    //     alert_toast("Data successfully saved.",'success')
                    //     setTimeout(function(){
                    //         var nw = window.open('../receipt.php?id='+resp,"_blank","width=900,height=600")
                    //         setTimeout(function(){
                    //             nw.print()
                    //             setTimeout(function(){
                    //                 nw.close()
                    //                 location.reload()
                    //             },500)
                    //         },500)
                    //     },500)
                    // }else{
                    //     alert_toast("Data successfully saved.",'success')
                    //     setTimeout(function(){
                    //         location.reload()
                    //     },500)
                    // }
                }else{
                  Swal.fire({
                    text: resp.msg,
                    target: '#custom-target',
                    customClass: {
                      container: 'position-absolute'
                    },
                    toast: true,
                    position: 'bottom-right'
                  })
                }
            }
          })
        // }else{
        //   $.ajax({
        //     url:'<?php echo base_url() ?>order/update',
        //     method:'POST',
        //     data:$(this).serialize(),
        //     dataType: 'json',
        //     success:function(resp){
        //         if(resp.status == 1){
        //           Swal.fire({
        //             text: 'Order successfully saved',
        //             target: 'body',
        //             customClass: {
        //               container: 'position-absolute'
        //             },
        //             toast: true,
        //             position: 'bottom-right'
        //           }).then((result) => {
                    
        //             window.location.href="table";
                  
        //         })
                  
                   
        //         }else{
        //           Swal.fire({
        //             text: 'Order not saved',
        //             target: '#custom-target',
        //             customClass: {
        //               container: 'position-absolute'
        //             },
        //             toast: true,
        //             position: 'bottom-right'
        //           })
        //         }
        //     }
        //   })
        // }
        
    })
    $(".kot_detail").click(function() {
      var id = $(this).attr('id');
      $.ajax({
            url:'<?php echo base_url() ?>order/getordertable',
            method:'POST',
            data:{id:id},
            dataType: 'json',
            success:function(resp){
              
              var item = resp.data;
              console.log(item)
              var html = '<div class="table card-body">';
              html += '<table class="table data-table"  id="'+item[0].bill_id+'">';
              html += '<thead>';
              html += '<tr>';
              html += '<th colspan=2>Table: '+item[0].tablename+'</th>';
              html += '</tr>';
              html += '<tr>';
              html += '<th>Item Name</th>';
              html += '<th>Qty</th>';
              // html += '<th>Status</th>';
              html += '</tr>';
              html += '</thead>';
              html += '<tbody>';
          
              $.each(item, function(k, v) {
                html += '<tr>';
                html += '<td>'+v.item_name+'</td>';
                html += '<td>'+v.qty+'</td>';
                html += '</tr>';
              });
              html += '</tbody>';
              html += '</table>';
              html += '</div>';
              html += '<div class="card-body">';
              html += '<div class="form-group">';
              html += '<label for="inputMessage">Status</label>';
              html += '<select class="form-control custom-select" placeholder="" id="kot_status" name="kot_status" required>';
              
              html += '<option ';
              if(item[0].status == "RunningKOT"){
              html += 'selected'; 
              }
              html += ' value="RunningKOT">RunningKOT</option>';
              html += '<option ';
              if(item[0].status == "Cooking"){
              html += 'selected'; 
              }
              html += ' value="Cooking">Cooking</option>';
              html += '<option ';
              if(item[0].status == "Ready"){
              html += 'selected'; 
              }
              html += ' value="Ready">Ready</option>';  
              html += '<option ';
              if(item[0].status == "Done"){
              html += 'selected'; 
              }
              html += ' value="Done">Done</option>';                           
              html += '</select>';
              html += '</div>';
              html += '</div>';
              $('#kot_item_detail').html(html)
            }
        })
    })
    $(".Order_detail").click(function() {
      var id = $(this).attr('id');
      $.ajax({
            url:'<?php echo base_url() ?>order/getordertable',
            method:'POST',
            data:{id:id},
            dataType: 'json',
            success:function(resp){
              
              var item = resp.data;
              console.log(item)
              var html = '<input type="hidden" name="bill_print_id" id="bill_print_id" value="'+item[0].bill_id+'"><div class="table card-body">';
              html += '<table class="table data-table"  id="'+item[0].Id+'">';
              html += '<thead>';
              html += '<tr>';
              html += '<th colspan=2>Table: '+item[0].tablename+'</th>';
              html += '<th colspan=2>Invoice No: '+item[0].invoice_no+'</th>';
              html += '</tr>';
              html += '<tr>';
              html += '<th>Item Name</th>';
              html += '<th>Qty</th>';
              html += '<th>Amount</th>';
              html += '<th>Price</th>';
              html += '</tr>';
              html += '</thead>';
              html += '<tbody>';
              var tot = 0;
              $.each(item, function(k, v) {
                if(k != 'bill'){
                html += '<tr>';
                html += '<td>'+v.item_name+'</td>';
                html += '<td>'+v.qty+'</td>';
                html += '<td>'+v.amount+'</td>';
                html += '<td>'+v.price+'</td>';
                html += '</tr>';
                tot = parseInt(tot) + parseInt(v.price);
                }
              });
              html += '</tbody>';
              html += '<tfoot>';
              html += '<tr>';
              html += '<th colspan=4 style="text-align:right">Total: '+tot+'</th>';
              html += '</tr>';
              html += '</tFoot>';
              html += '</table>';
              html += '</div>';
              html += '<div class="card-body">';
              html += '<div class="form-group">';
              html += '<label for="inputMessage">Payment Type</label>';
              html += '<select class="form-control custom-select" placeholder="" id="Payment_type" name="kot_status" required>';
              
              html += '<option value="Cash">Cash</option>';
              html += '<option value="Card">Card</option>';
              html += '<option value="Online">Online</option>';  
              html += '<option value="QR">QR</option>';                           
              html += '</select>';
              html += '</div>';
              html += '</div>';
              $('#kot_item_detail').html(html)
            }
        })
    })
    $(".Order_detail_1").click(function() {
      var id = $(this).attr('id');
      $.ajax({
            url:'<?php echo base_url() ?>order/getordertable',
            method:'POST',
            data:{id:id},
            dataType: 'json',
            success:function(resp){
              
              var item = resp.data;
              console.log(item)
              var html = '<input type="hidden" name="bill_print_id" id="bill_print_id" value="'+item[0].bill_id+'"><div class="table card-body">';
              html += '<table class="table data-table"  id="'+item[0].Id+'">';
              html += '<thead>';
              html += '<tr>';
              html += '<th colspan=2>Table: '+item[0].tablename+'</th>';
              html += '<th colspan=2>Invoice No: '+item[0].invoice_no+'</th>';
              html += '</tr>';
              html += '<tr>';
              html += '<th>Item Name</th>';
              html += '<th>Qty</th>';
              html += '<th>Amount</th>';
              html += '<th>Price</th>';
              html += '</tr>';
              html += '</thead>';
              html += '<tbody>';
              var tot = 0;
              $.each(item, function(k, v) {
                if(k != 'bill'){
                html += '<tr>';
                html += '<td>'+v.item_name+'</td>';
                html += '<td>'+v.qty+'</td>';
                html += '<td>'+v.amount+'</td>';
                html += '<td>'+v.price+'</td>';
                html += '</tr>';
                tot = parseInt(tot) + parseInt(v.price);
                }
              });
              html += '</tbody>';
              html += '<tfoot>';
              html += '<tr>';
              html += '<th colspan=4 style="text-align:right">Total: '+item[0].total+'</th>';
              html += '</tr>';
              html += '</tFoot>';
              html += '</table>';
              html += '</div>';
              html += '<div class="card-body">';
              html += '<div class="form-group">';
              html += '<label for="inputMessage">Payment Type: '+item[0].payment_type+'</label>';
              
              html += '</div>';
              html += '</div>';
              $('#kot_item_detail_reprint').html(html)
            }
        })
    })
    
    $('#kot_status_change').click(function(){
      //alert();
      var id = $("#kot_item_detail").children().find('table').attr('id');
      var status = $("#kot_status").val();
      $.ajax({
            url:'<?php echo base_url() ?>order/orderstatusupdate',
            method:'POST',
            data:{id:id, status:status},
            dataType: 'json',
            success:function(resp){
              if(resp.status == 1){
                window.location.replace("<?php echo base_url() ?>Kot");
              }else{

              }
            }
      })
    })
    $('#print').click(function(){
      var id = $("#bill_print_id").val();
      var status = 'Paid';
      var Payment_type = $("#Payment_type").val();
      start_load()
      var nw = window.open('<?php echo base_url() ?>receipt?id='+id,"_blank","width=900,height=600")
      setTimeout(function(){
        nw.print()
        setTimeout(function(){
          nw.close()
          end_load()
        },500)
      },500)
      
      
      $.ajax({
            url:'<?php echo base_url() ?>order/orderstatusupdate',
            method:'POST',
            data:{id:id, status:status, Payment_type:Payment_type},
            dataType: 'json',
            success:function(resp){
              if(resp.status == 1){
                window.location.replace("<?php echo base_url() ?>order/list");
              }else{

              }
            }
      })
    });
    $('#reprint').click(function(){
      var id = $("#bill_print_id").val();
      var status = 'Paid';
      var Payment_type = $("#Payment_type").val();
      start_load()
      var nw = window.open('<?php echo base_url() ?>receipt?id='+id,"_blank","width=900,height=600")
      setTimeout(function(){
        nw.print()
        setTimeout(function(){
          nw.close()
          end_load()
        },500)
      },500)
      
      
      
    });

    $('#table_status_change').click(function(){
      //alert();
      var id = $("#ord_table_id").val();
      var status = $("#ord_status").val();
      $.ajax({
            url:'<?php echo base_url() ?>order/orderstatusupdate',
            method:'POST',
            data:{id:id, status:status},
            dataType: 'json',
            success:function(resp){
              if(resp.status == 1){
                window.location.replace("<?php echo base_url() ?>table");
              }else{

              }
            }
      })
    })

    
    $(".customer_detail").click(function() {
      var id = $(this).attr('id');
      $.ajax({
            url:'<?php echo base_url() ?>customer/customerdetailbyid/'+id,
            method:'GET',
            //data:{id:id},
            dataType: 'json',
            success:function(resp){
              
              var item = resp.data;
              console.log(item)
              var html = '<div class="table card-body">';
              html += '<table class="table data-table"  id="'+item[0].customer_id+'">';
              html += '<thead>';
              html += '<tr>';
              html += '<th colspan=2>Customer : '+item[0].c_name+'</th>';
              html += '</tr>';
              html += '<tr>';
              
                html += '<tr>';
                html += '<td>Email : </td>';
                html += '<td>'+item[0].email+'</td>';                
                html += '</tr>';
                html += '<tr>';
                html += '<td>Mobile : </td>';
                html += '<td>'+item[0].mobile+'</td>';                
                html += '</tr>';
                html += '<tr>';
                html += '<td>Address : </td>';
                html += '<td>'+item[0].address+'</td>';                
                html += '</tr>';
                
              
              html += '</thead>';              
              html += '</table>';
              html += '</div>';             
              
              $('#customer_detail').html(html)
            }
        })
    })

    $("#add_discount").click(function(){
      $("#dis_per_val").val(0);
      $("#dis_fix_val").val(0);
      if($("#discount_select").val() != 0){
        console.log($("#discount_select").val());
        
        var id = $("#discount_select").val();
        $.ajax({
            url:'<?php echo base_url() ?>discount/getdiscount',
            method:'POST',
            data:{id:id},
            dataType: 'json',
            success:function(resp){
              console.log(resp.data);
              $("#dis_per_val").val(resp.data.discount);
              calc();
            }
      })
      }else if($("#dis_per").val() != ''){
        $("#dis_per_val").val($("#dis_per").val());
        calc();
      }else if($("#dis_fix").val() != ''){
        $("#dis_fix_val").val($("#dis_fix").val());
        calc();
      }
      $("#collapseTwo").removeClass('show');
    })
    // $.ajax({
    //       url:'<?php echo base_url() ?>customer/getcustomerdata',
    //       method:'get',
    //       dataType: 'json',
    //       success:function(resp){
    //         console.log(resp)
    //           var dataSource = resp;
            
    //       }
    //     });
        // $('.lookup').autocomplete({
        //     validation,
        //     filter,
        //     appendToBody: true,
        //     valueProperty: 'customer_id',
        //     openOnInput: true,
        //     nameProperty: 'c_name',
        //     valueField: '#hidden-field',
        //     dataSource: datasource()
        // });
      
  });
  function datasource(){
    $.ajax({
          url:'<?php echo base_url() ?>customer/getcustomerdata',
          method:'get',
          dataType: 'json',
          success:function(resp){
            console.log(JSON.stringify(resp))
               dataSource = resp;
               return resp;
          }
        });
  }
  function orderstatusupdate(bill_id, table_id, kot_id, status){
    //alert();
    // var id = $("#ord_table_id").val();
    // var status = $("#ord_status").val();
    $.ajax({
          url:'<?php echo base_url() ?>order/orderstatusupdatenew',
          method:'POST',
          data:{id:bill_id, status:status, kot_id:kot_id, table_id:table_id},
          dataType: 'json',
          success:function(resp){
            if(resp.status == 1){
              location.reload();
            }else{

            }
          }
    })
  }
  function billdiscountupdate(bill_id){
    var dis = $('#final_dis').val();
    var g_total = $('#g_total_amount').val();
    var tax = $('#tax_amount').val();
    $.ajax({
          url:'<?php echo base_url() ?>order/billdiscountupdate',
          method:'POST',
          data:{id:bill_id, dis:dis,g_total:g_total,tax:tax},
          dataType: 'json',
          success:function(resp){
            if(resp.status == 1){
              
            }else{

            }
          }
    })
  }
  const filter = function (input, data) {
      return data.filter(x => {
          return (!x.ignore && ~x.name.indexOf(input)) || x.name === input
      });
  };

  const validation = function (inputValue, data) {
    console.log(inputValue)
    console.log(data)
      if (inputValue) {
          let matches = data.filter(x => x.id === +this.selected.value && x.name === inputValue);
          if (!matches || !matches.length) {
//                    alert('Es wurde ein falscher Wert eingegeben!');
//                    return false;
          }
          return true;
      }
  };

  function preAppendDataItem(li, item) {
      if (item.name == 'is') {
          $(li).addClass("test")
      }
  }

  function validationMsg(input, data) {
      if (input == 'asdf') {
          alert("its asdf")
      }
  }
  function billstatusupdate(bill_id, table_id,  status){
    //alert();
    // var id = $("#ord_table_id").val();
    // var status = $("#ord_status").val();
    if(status == 'BillRaised'){
      billdiscountupdate(bill_id);
    }
    $.ajax({
          url:'<?php echo base_url() ?>order/billstatusupdate',
          method:'POST',
          data:{id:bill_id, status:status, table_id:table_id},
          dataType: 'json',
          success:function(resp){
            if(resp.status == 1){
              location.reload();
            }else{

            }
          }
    })
  }
  function billpaiedupdate(bill_id, table_id){
    //alert();
    // var id = $("#ord_table_id").val();
    billdiscountupdate(bill_id);
    var type =  $(".payment_type:checked").val();
    $.ajax({
          url:'<?php echo base_url() ?>order/billpaiedupdate',
          method:'POST',
          data:{id:bill_id, type:type, table_id:table_id},
          dataType: 'json',
          success:function(resp){
            if(resp.status == 1){
              window.location.href="table";
            }else{

            }
          }
    })
  }

  
    function orderstatusupdateTable(table_id, status){
      //alert();
      // var id = $("#ord_table_id").val();
      // var status = $("#ord_status").val();
      $.ajax({
            url:'<?php echo base_url() ?>order/orderstatusupdateTable',
            method:'POST',
            data:{status:status, table_id:table_id},
            dataType: 'json',
            success:function(resp){
              if(resp.status == 1){
                location.reload();
              }else{

              }
            }
      })
    }


    function tableEmpty(table_id){
      //alert();
      // var id = $("#ord_table_id").val();
      // var status = $("#ord_status").val();
      $.ajax({
            url:'<?php echo base_url() ?>order/tableEmpty',
            method:'POST',
            data:{table_id:table_id},
            dataType: 'json',
            success:function(resp){
              if(resp.status == 1){
                location.reload();
              }else{

              }
            }
      })
    }
    function bill_preview(id){
      billdiscountupdate(id);
      $.ajax({
            url:'<?php echo base_url() ?>order/getordertable',
            method:'POST',
            data:{id:id},
            dataType: 'json',
            success:function(resp){
              
              var item = resp.data;
              console.log(item)
              var html = '<input type="hidden" name="bill_print_id" id="bill_print_id" value="'+item[0].bill_id+'"><div class="table card-body">';
              html += '<table class="table data-table"  id="'+item[0].Id+'">';
              html += '<thead>';
              html += '<tr>';
              html += '<th colspan=2>Table: '+item[0].tablename+'</th>';
              html += '<th colspan=2>Invoice No: '+item[0].invoice_no+'</th>';
              html += '</tr>';
              html += '<tr>';
              html += '<th>Item Name</th>';
              html += '<th>Qty</th>';
              html += '<th>Amount</th>';
              html += '<th>Price</th>';
              html += '</tr>';
              html += '</thead>';
              html += '<tbody>';
              var tot = 0;
              $.each(item, function(k, v) {
                if(k != 'bill'){
                html += '<tr>';
                html += '<td>'+v.item_name+'</td>';
                html += '<td>'+v.qty+'</td>';
                html += '<td>'+v.amount+'</td>';
                html += '<td>'+v.price+'</td>';
                html += '</tr>';
                tot = parseInt(tot) + parseInt(v.price);
                }
              });
              html += '</tbody>';
              html += '<tfoot>';
              html += '<tr>';
              html += '<th colspan=4 style="text-align:right">Total: '+tot+'</th>';
              html += '</tr>';
              html += '<tr>';
              html += '<th colspan=4 style="text-align:right">Discount: '+item.bill.discount_amt+'</th>';
              html += '</tr>';
              html += '<tr>';
              html += '<th colspan=4 style="text-align:right">Grant Total: '+item.bill.total+'</th>';
              html += '</tr>';
              html += '</tFoot>';
              html += '</table>';
              html += '</div>';
              html += '<div class="card-body">';
              html += '<div class="form-group">';
              html += '<label for="inputMessage">Payment Type: '+item[0].payment_type+'</label>';
              
              html += '</div>';
              html += '</div>';
              $('#kot_item_detail_reprint').html(html)
            }
        })
    
    }
    function print_kot(id){
      start_load()
                  var nw = window.open('<?php echo base_url() ?>receipt/kotprint?id='+id,"_blank","width=900,height=600")
                  setTimeout(function(){
                    nw.print()
                    setTimeout(function(){
                      nw.close()
                      end_load()
                    },500)
                  },500)
    }
    function getorderBilltable(id){
      $.ajax({
            url:'<?php echo base_url() ?>order/getorderBilltable',
            method:'POST',
            data:{id:id},
            dataType: 'json',
            success:function(resp){
              
              var item = resp.data;
              console.log(item)
              var html = '<input type="hidden" name="bill_print_id" id="bill_print_id" value="'+item[0].bill_id+'"><div class="table card-body">';
              html += '<table class="table data-table"  id="'+item[0].Id+'">';
              html += '<thead>';
              html += '<tr>';
              html += '<th colspan=2>Table: '+item[0].tablename+'</th>';
              html += '<th colspan=2>Invoice No: '+item[0].invoice_no+'</th>';
              html += '</tr>';
              html += '<tr>';
              html += '<th>Item Name</th>';
              html += '<th>Qty</th>';
              html += '<th>Amount</th>';
              html += '<th>Price</th>';
              html += '</tr>';
              html += '</thead>';
              html += '<tbody>';
              var tot = 0;
              $.each(item, function(k, v) {
                html += '<tr>';
                html += '<td>'+v.item_name+'</td>';
                html += '<td>'+v.qty+'</td>';
                html += '<td>'+v.amount+'</td>';
                html += '<td>'+v.price+'</td>';
                html += '</tr>';
                tot = parseInt(tot) + parseInt(v.price);
              });
              html += '</tbody>';
              html += '<tfoot>';
              html += '<tr>';
              html += '<th colspan=4 style="text-align:right">Total: '+tot+'</th>';
              html += '</tr>';
              html += '</tFoot>';
              html += '</table>';
              html += '</div>';
              html += '<div class="card-body">';
              html += '<div class="form-group">';
              html += '<label for="inputMessage">Payment Type: '+item[0].payment_type+'</label>';
              
              html += '</div>';
              html += '</div>';
              $('#kot_item_detail_reprint').html(html)
            }
        })
    
    }
    
$(document).ready(function(){
  qty_func();
  calc();
})
</script>
<script>
            $(function() {
                function displayResult(item) {
                    $('.alert').show().html('You selected <strong>' + item.value + '</strong>: <strong>' + item.text + '</strong>');
                }
                $('#demo1').typeahead({
                    source: [
                        {id: 1, name: 'Toronto'},
                        {id: 2, name: 'Montreal'},
                        {id: 3, name: 'New York'},
                        {id: 4, name: 'Buffalo'},
                        {id: 5, name: 'Boston'},
                        {id: 6, name: 'Columbus'},
                        {id: 7, name: 'Dallas'},
                        {id: 8, name: 'Vancouver'},
                        {id: 9, name: 'Seattle'},
                        {id: 10, name: 'Los Angeles'}
                    ],
                    onSelect: displayResult
                });

                $('#demo2').typeahead({
                    source: [
                        {ID: 1, Name: 'Toronto'},
                        {ID: 2, Name: 'Montreal'},
                        {ID: 3, Name: 'New York'},
                        {ID: 4, Name: 'Buffalo'},
                        {ID: 5, Name: 'Boston'},
                        {ID: 6, Name: 'Columbus'},
                        {ID: 7, Name: 'Dallas'},
                        {ID: 8, Name: 'Vancouver'},
                        {ID: 9, Name: 'Seattle'},
                        {ID: 10, Name: 'Los Angeles'}
                    ],
                    displayField: 'Name',
                    valueField: 'ID',
                    onSelect: displayResult
                });

                $('#demo3').typeahead({
                    source: [
                        {id: 1, full_name: 'Toronto', first_two_letters: 'To'},
                        {id: 2, full_name: 'Montreal', first_two_letters: 'Mo'},
                        {id: 3, full_name: 'New York', first_two_letters: 'Ne'},
                        {id: 4, full_name: 'Buffalo', first_two_letters: 'Bu'},
                        {id: 5, full_name: 'Boston', first_two_letters: 'Bo'},
                        {id: 6, full_name: 'Columbus', first_two_letters: 'Co'},
                        {id: 7, full_name: 'Dallas', first_two_letters: 'Da'},
                        {id: 8, full_name: 'Vancouver', first_two_letters: 'Va'},
                        {id: 9, full_name: 'Seattle', first_two_letters: 'Se'},
                        {id: 10, full_name: 'Los Angeles', first_two_letters: 'Lo'}
                    ],
                    displayField: 'full_name',
                    onSelect: displayResult
                });

                // Mock an AJAX request
                $.mockjax({
                    url: '/cities/list',
                    response: function() {
                        this.responseText = [
                            {id: 1, name: 'Toronto'},
                            {id: 2, name: 'Montreal'},
                            {id: 3, name: 'New York'},
                            {id: 4, name: 'Buffalo'},
                            {id: 5, name: 'Boston'},
                            {id: 6, name: 'Columbus'},
                            {id: 7, name: 'Dallas'},
                            {id: 8, name: 'Vancouver'},
                            {id: 9, name: 'Seattle'},
                            {id: 10, name: 'Los Angeles'}
                        ];
                    }
                });

                $('#demo4').typeahead({
                    ajax: '/cities/list',
                    onSelect: displayResult
                });

                $('#demo5').typeahead({
                    ajax: {
                        url: '/cities/list',
                        method: 'post',
                        triggerLength: 1
                    },
                    onSelect: displayResult
                });
                $('#demo6').typeahead({
                    source: [
                        'Toronto',
                        'Montreal',
                        'New York',
                        'Buffalo',
                        'Boston',
                        'Columbus',
                        'Dallas',
                        'Vancouver',
                        'Seattle',
                        'Los Angeles'],
                    onSelect: displayResult
                });
				$('#demo7').typeahead({
                    source: [
                        'Toronto',
						'Toronto1',
						'Toronto2',
						'Toronto3',
						'Toronto4',
						'Toronto5',
						'Toronto6',
						'Toronto7',
						'Toronto8',
						'Toronto9',
						'Toronto10',
                        'Montreal',
                        'New York',
                        'Buffalo',
                        'Boston',
                        'Columbus',
                        'Dallas',
                        'Vancouver',
                        'Seattle',
                        'Los Angeles'],
					scrollBar:true,
                    onSelect: displayResult
                });
                $('#demo8').typeahead({
                    autoSelect:false,
                    source: $('#customer_data').html(),
                    displayField: 'mobile',
                    valueField: 'customer_id'
                });
            });
        </script>

<?php 

if(isset($pagename)){
    $uniqu    = uniqid();
    $dir      = realpath(dirname(__FILE__));
    $path     = realpath($dir.'/../../../').'/';
    $filename = $path."assets/js/".$pagename.".js";
    $filename1= base_url()."assets/js/".$pagename.".js?random=".$uniqu;
      if (file_exists($filename)) {
      echo '<script src="'.$filename1.'"></script>';
    }
  }
?>

</body>
</html>