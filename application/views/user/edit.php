    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title"><?= $todo;?> User</h3>
            </div>
            <form role="form" method="post" name="mainfrm" id="mainfrm">
            <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="inputName">User Name</label>
                      <input type="taxt" id="username" name="username" value="<?= ($userdata['username'] ?? '');?>" class="form-control" autocomplete="off" required/>          
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="inputName">First Name</label>
                      <input type="taxt" id="firstname" name="firstname" value="<?= ($userdata['firstname'] ?? '');?>" class="form-control" autocomplete="off" required/>          
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="inputName">Last Name</label>
                     <input type="taxt" id="lastname" name="lastname" value="<?= ($userdata['lastname'] ?? '');?>" class="form-control" autocomplete="off" required/>          
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="inputName">Email</label>
                      <input type="taxt" id="email" name="email" value="<?= ($userdata['email'] ?? '');?>" class="form-control" autocomplete="off" required/>          
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="inputName">Password <span class="red-small">(only if you want to change)</span></label>
                      <input type="password" id="password" name="password" class="form-control" value = "" autocomplete="off"/>          
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="groups">Groups</label>
                      <select class="form-control" id="groups" name="groups">
                        <option value="">Select Groups</option>
                        <?php foreach ($group_data as $k => $v): ?>
                          <option <?php if(($userdata['groups'] ??'') == $v['id']) { ?> selected <?php } ?> value="<?php echo $v['id'] ?>"><?php echo $v['group_name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="inputMessage">Status</label>
                      <select class="form-control custom-select" placeholder="" name="status" required>
                        <option value="yes" <?php if(($userdata['status'] ?? 'yes') == "yes") { ?> selected <?php } ?>>Active</option>
                          <option value="no" <?php if(($userdata['status'] ?? 'yes') == "no") { ?> selected <?php } ?>>Non-Active</option>                                
                      </select>
                    </div>
                  </div>  
                  <div class="col-sm-3">
                  <?php if($session_data['groups'] == 1){ ?>
                      <div class="form-group">
                        <label for="groups">Restaurants</label>
                        <select class="form-control" id="restaurant_id" name="restaurant_id">
                          <option value="">Select Restaurants</option>
                            <?php foreach ($restaurants as $k => $v): ?>
                            <option <?php if(($userdata['restaurant_id'] ?? '') == $v['restaurant_id']){?>selected<?php }?> value="<?php echo $v['restaurant_id'] ?>"><?php echo $v['restaurant_name'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>      
                    <?php }else{ ?>
                      <input type="hidden" name="restaurant_id" id="restaurant_id" value="<?= $session_data['restaurant_id'];?>">
                    <?php } ?>
                    </div>
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
  