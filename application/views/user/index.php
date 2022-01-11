<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="card">
        <div class="card-body">
          <table id="mainTable" class="table table-bordered table-striped table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>User Name</th>
                    <th>Original Name</th>
                <?php if($session_data['groups'] == 1){ ?>
                    <th>Restaurant Name </th>
                <?php } ?>
                    <th>Type</th>
                    <th>Status</th>                            
                    <th><a href="<?php echo base_url('user/create') ?>" class="btn btn-default">Add New</a></th>
                </tr>
            </thead>
            <form id="mainfrm" action="" method="post">
              <input type="hidden" id="main_id" name="main_id" value="">
            </form>
            <tbody>
              <?php if ($user) : 
                $i = 1;
                foreach ($user as $k => $user_s) : ?>
                  <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $user_s['username']?></td>
                    <td><?php echo $user_s['firstname']?> <?php echo $user_s['lastname']?></td>
                    <?php if($session_data['groups'] == 1){ ?>
                        <td><?= $user_s['restaurant_name']; ?></th>
                    <?php } ?>
                    <td><?php echo $user_s['group_name']?></td>
                    <td> <?php if($user_s['status']=="yes"){ echo "Active";} else { echo "Non-Active";} ?></td>
                    <td nowrap>
                      <button onClick="Edit(<?= $user_s['id']; ?>)" class="btn btn-success"><i class="fa fa-edit"></i></button>
                      <button onClick="Delete(<?= $user_s['id']; ?>)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
<div id="myModalDelete" class="modal fade" role="dialog" data-keyboard="true" data-backdrop="static"  tabindex="-1">
  <div class="modal-dialog ">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirm Deletion</h4>
      </div>
      <div class="modal-body" style="overflow: auto;">
        <div class="main-grid">
          <div class="col-md-12 ">
            Are you sure You want to Delete the selected User ?
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