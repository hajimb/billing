<!-- Main content -->
<div class="legend">
    <span class="legend-span"><i class="fas fa-circle text-white"></i>  Blank Table</span>
    <span class="legend-span"><i class="fas fa-circle text-cyan "></i>  Order Taken</span>
    <span class="legend-span"><i class="fas fa-circle text-teal"></i>  Kitchen Accept</span>
    <span class="legend-span"><i class="fas fa-circle text-green"></i> In Cooking</span>
    <span class="legend-span"><i class="fas fa-circle text-orange"></i>  Order Ready</span>
    <span class="legend-span"><i class="fas fa-circle text-indigo"></i>  Picked Up By Waiter</span>
    <span class="legend-span"><i class="fas fa-circle text-secondary"></i>  Order On Table</span>
    <span class="legend-span"><i class="fas fa-circle text-pink"></i>  Bill Raised</span>
    <span class="legend-span"><i class="fas fa-circle text-danger"></i> Bill Paid</span>
</div><?php //print_r($user_permission); ?>
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="card">
        <div class="card-body">
          <table id="mainTable" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>Sr No</th>                           
                    <th>Order No.</th>
                    <th>Order Type</th>
                    <th>Table</th>
                    <th>Customer Phone</th>
                    <th>Customer Name</th>
                    <th>No of Items</th>
                    <th>Amount</th>
                    <th>Discount</th>
                    <th>Tax</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th class="text-center"><a href="<?php echo base_url('restaurant/create') ?>" class="btn btn-default">Add New</a></th>
                </tr>
            </thead>
            <tbody>
              <?php 
              if ($data) : 
                $i = 1;
                 foreach($data as $value) {
                    $class = '';
                    if($value["status"] == "BillPaid"){ 
                        $class = 'class="table-danger"';
                    }else if($value["status"] == "Cooking"){ 
                        $class = 'class="table-success"' ;
                    }else if($value["status"] == "Ready"){ 
                        $class = 'class="table-warning"'; 
                    } 
                    ?>
                    <tr <?= $class; ?>>
                        <td><?= $i++ ;?></td>                            
                        <td><?= $value["invoice_no"]?></td>
                        <td><?= $value["bill_type"]?></td>
                        <td><?= $value["tablename"]?></td>
                        <td><?= $value["mobile"]?></td>
                        <td><?= $value["name"]?></td>
                        <td><?= $value["items"]?></td>
                        <td><?= $value["bill_amt"]?></td>
                        <td><?= $value["discount_amt"]?></td>
                        <td><?= $value["tax_amt"]?></td>
                        <td><?= $value["total"]?></td>
                        <td><?= $value["status"]?></td>
                        <td class="text-center">
                            <button onClick="View(<?= $value['Id']; ?>)" class="btn btn-warning"><i class="fa fa-eye"></i></button>
                        </td>
                    </tr>
                    <?php  }
              endif; ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- col-md-12 -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<form id="mainfrm" action="" method="post">
    <input type="hidden" id="main_id" name="main_id" value="">
</form>

<!-- Delete Modal -->
<div id="myModalDelete" class="modal fade" role="dialog" data-keyboard="true" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog ">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirm Deletion</h4>
      </div>
      <div class="modal-body" style="overflow: auto;">
        <div class="main-grid">
          <div class="col-md-12 ">
            Are you sure You want to Delete the selected Restaurant ?
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id = "confirmdelete" data-form="mainfrm">Confirm</button>
        <button type="button" class="btn btn-warning" id="cancelmenu" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>

<!-- View Modal -->
<div id="myModalView" class="modal fade" role="dialog" data-keyboard="true" data-backdrop="static" tabindex="-1"> 
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Restaurant View</h4>
      </div>
      <div class="modal-body" style="overflow: auto;">
        <div class="main-grid">
            <div class="row">
                <div class="col-md-3">Restaurant Name</div>
                <div class="col-md-9"><div class="view-data" id="res_name"></div></div>
                <div class="col-md-3">Contact No.</div>
                <div class="col-md-9"><div class="view-data" id="res_contact"></div></div>
                <div class="col-md-3">Restaurant Address</div>
                <div class="col-md-9"><div class="view-data" id="res_address"></div></div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>