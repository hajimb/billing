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
                <th>Tax Name</th>
                <th>VAT</th>
                <th>SGST</th>
                <th>CGST</th>
                <th>Default</th>          
                <th><a href="<?php echo base_url('tax/create') ?>" class="btn btn-default">Add New</a></th>
              </tr>
            </thead>
            <form id="mainfrm" action="" method="post">
              <input type="hidden" id="main_id" name="main_id" value="">
            </form>
            <tbody>
              <?php if ($tax) : 
                $i = 1;?>
                <?php foreach ($tax as $k => $v) : ?>
                  <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $v['tax_name']?></td>
                    <td><?php echo $v['vat']?></td>
                    <td><?php echo $v['sgst']?></td>
                    <td><?php echo $v['cgst']?></td>
                    <td><?php if($v['is_default']== 0){ ?>NO <?php } else {?> YES<?php }?></td>
                    <td nowrap>
                      <button onClick="Edit(<?= $v['tax_id']; ?>)" class="btn btn-success"><i class="fa fa-edit"></i></button>
                      <button onClick="Delete(<?= $v['tax_id']; ?>)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                <?php endforeach ?>
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
            Are you sure You want to Delete the selected Tax ?
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