    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title"><?= $todo;?> Withdrawal</h3>
            </div>
            <form role="form" method="post" name="mainfrm" id="mainfrm">
            <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                    <?php if(in_array('user', $user_permission)){ ?>
                      <div class="form-group">
                        <label for="groups">User</label>
                        <select class="form-control" id="user_id" name="user_id">
                          <option value="">Select User</option>
                            <?php foreach ($users as $k => $v): ?>
                            <option <?php if(($data['user_id'] ?? '') == $v['id']){?>selected<?php }?> value="<?php echo $v['id'] ?>"><?php echo $v['username'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>      
                    <?php }else{ ?>
                        <input type="hidden" name="user_id" id="user_id" value="<?= $session_data['user_id'];?>">
                    <?php } ?>                  
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="taxt" id="amount" name="amount" value="<?= ($data['amount'] ?? '');?>" onkeypress="return isNumber(event)"  class="form-control" autocomplete="off" required/>          
                        </div>
                    </div>
                </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4">
                    <input type="hidden" id="main_id" name="main_id" value="<?= $main_id; ?>">
                    <input type="hidden" name="restaurant_id" id="restaurant_id" value="<?= $session_data['restaurant_id'];?>">
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
  