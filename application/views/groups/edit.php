    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title"><?= $todo;?> Group</h3>
            </div>
            <form role="form" method="post" name="mainfrm" id="mainfrm">
            <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Group Name</label>
                      <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" value="<?php echo $data['group_name']; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                    <h4>Permissions</h4>
                  </div>
                  <div class="col-sm-10">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="checkAll" value="option1">
                      <label for="checkAll" class="custom-control-label">All</label>
                    </div>
                  </div>
                  <?php
                  $serialize_permission = explode(',',$data['permission']);
                  foreach ($modules as $module) { 
                    $checked = "";
                    if ($serialize_permission) {
                        if (in_array($module['id'], $serialize_permission)) {
                          $checked =  "checked";
                        }
                      } ?>
                    <div class="col-sm-3">
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input permission" type="checkbox" name="permission[]" <?= $checked;?> id="permission_<?= $module['classname']; ?>" value="<?= $module['id']; ?>" >
                        <label for="permission_<?= $module['classname']; ?>" class="custom-control-label"><?= $module['name']; ?></label>
                      </div>
                    </div>

                  <?php } ?>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4">
                    <input type="hidden" id="main_id" name="main_id" value="<?= $main_id; ?>">
                    <button class="btn btn-primary saveChange" id="update" type="submit" data-form="mainfrm"><i class="fa fa-save" style="display: none"></i>Save </button>
                    <button class="btn btn-warning goBack" type="button"><i class="fa fa-save" style="display: none"></i>Cancel </button>
                  </div>
                </div>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->