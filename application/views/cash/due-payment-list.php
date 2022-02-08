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
                <th>From</th>                            
                <th>Total ( <i class="fas fa-rupee-sign"></i> )</th>
                <th>Payment</th>
                <th>Paid Amount ( <i class="fas fa-rupee-sign"></i> )</th>
                <th>Remaining Amount ( <i class="fas fa-rupee-sign"></i> )</th>
                <th>Invoice Date</th>
                <th>
                    <!-- <a href="<?php echo base_url('purchase/create') ?>" class="btn btn-default">Add New</a> -->
                </th>
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
                    <td><?php echo $row['stock'].' '.$row['units'];?></td>
                    <td><?php echo $row['supplier_name'];?></td>
                    <td><?php echo $row['total_amount'];?></td>
                    <td><?php echo $row['ptype'];?></td>
                    <td><?php echo $row['paid_amount'];?></td>
                    <td><?php echo $row['total_amount'] - $row['paid_amount'];?></td>
                    <td><?php echo $row['invoice_date'];?></td>
                    <td nowrap>
                        <button class="btn btn-success getdetail" data-id="<?= $row['id']; ?>">Pay Now</button>
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
<div id="payNowModal" class="modal fade" role="dialog" data-keyboard="true" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog ">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pay Due Payment</h4>
      </div>
      <div class="modal-body" style="overflow: auto;">
        <div class="main-grid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                      <label>Total Payment</label>
                    </div>
                </div>
                <div class="col-sm-8">
                    <span id="totalPayment"></span>
                </div>
            </div>

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Previous Paid</label>
                </div>
              </div>
              <div class="col-sm-8">
                  <span id="previouspaid"></span>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Amount to be pay</label>
                </div>
              </div>
              <div class="col-sm-8">
                  <input type="text" id="paid_amount" name="paid_amount" class="form-control" required/>          
                  <input type="hidden" id="ramount" name="ramount"/>          
                  <input type="hidden" id="stock_master_id" name="stock_master_id"/>          
                  <input type="hidden" name="restaurant_id" id="restaurant_id" value="<?= $restaurant_id;?>"/>          
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id = "paynow" data-id="mainfrm">Paynow</button>
        <button type="button" class="btn btn-warning" id="cancelmenu" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>