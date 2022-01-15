<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="card">
        <div class="card-body">
          <table id="mainTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>SR No</th>
                <th>Invoice N</th>
                <th>Raw Material</th>
                <th>Current Stock</th>
                <th>Unit</th>                                                       
                <th>From</th>                            
                <th>Total ( <i class="fas fa-rupee-sign"></i> )</th>
                <th>Payment</th>
                <th>Paid Amount ( <i class="fas fa-rupee-sign"></i> )</th>
                <th>Invoice Date</th>
                <th><a href="<?php echo base_url('purchase/create') ?>" class="btn btn-default">Add New</a></th>
              </tr>
            </thead>
            <form id="mainfrm" action="" method="post">
              <input type="hidden" id="main_id" name="main_id" value="">
            </form>
            <tbody>
              <?php if ($data) : 
                $i = 1;?>
                <?php 
                foreach($data as $row) { ?> 
                  <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td><?php echo $row['invoice_no'];?></td>
                    <td><?php echo $row['rawmaterial'];?></td>
                    <td><?php echo $row['stock'];?></td>
                    <td><?php echo $row['units'];?></td>
                    <td><?php echo $row['supplier_name'];?></td>
                    <td><?php echo $row['total_amount'];?></td>
                    <td><?php echo $row['ptype'];?></td>
                    <td><?php echo $row['paid_amount'];?></td>
                    <td><?php echo $row['purchase_date'];?></td>
                    <td nowrap>
                      <button onClick="Edit(<?= $row['stock_id']; ?>)" class="btn btn-success"><i class="fa fa-edit"></i></button>
                      <button onClick="Delete(<?= $row['stock_id']; ?>)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                  <?php $i++; }  ?>
              <?php endif; ?>
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
            Are you sure You want to Delete the selected Item ?
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