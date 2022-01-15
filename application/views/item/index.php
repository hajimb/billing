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
                <th>Sr No</th>
                <th>Name</th>
                <th>Short Code</th>
                <th>Price ( <i class="fas fa-rupee-sign"></i> )</th>
                <th>Favorite</th>
                <th>Stock Status</th>
                <th><a href="<?php echo base_url('item/create') ?>" class="btn btn-default">Add New</a></th>
              </tr>
            </thead>
            <form id="mainfrm" action="" method="post">
              <input type="hidden" id="main_id" name="main_id" value="">
            </form>
            <tbody>
              <?php if ($data) : 
                $i = 1;?>
                <?php  foreach($data as $items_s) { ?> 
                  <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td><?php echo $items_s['item_name'];?></td>
                    <td><?php echo $items_s['short_code'];?></td>
                    <td><?php echo $items_s['price'];?></td>
                    <td><?php if($items_s['favorite'] == 1) { echo "<span class ='badge badge-success'>Yes</span>";}else {echo "<span class ='badge badge-danger'>No</span>";} ?></td>
                    <td><?php if($items_s['stock_status'] == 1) { echo "<span class ='badge badge-success'>Yes</span>";}else {echo "<span class ='badge badge-danger'>No</span>";} ?></td>
                    <td nowrap>
                      <button onClick="Edit(<?= $items_s['item_id']; ?>)" class="btn btn-success"><i class="fa fa-edit"></i></button>
                      <button onClick="Delete(<?= $items_s['item_id']; ?>)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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