<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title"><?= $todo; ?> Restaurant</h3>
        </div>
        <form role="form" method="post" name="mainfrm" id="mainfrm">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="restaurant_name">Name</label>
                  <input type="text" id="restaurant_name" name="restaurant_name" value="<?= ($userdata['restaurant_name'] ?? ''); ?>" autocomplete="off" class="form-control" required />
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="contact_no">Mobile / Phone No.</label>
                  <input type="text" id="contact_no" name="contact_no" value="<?= ($userdata['contact_no'] ?? ''); ?>" onkeypress="return isNumber(event)" autocomplete="off" class="form-control" required />
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="restaurant_address">Address</label>
                  <textarea id="restaurant_address" name="restaurant_address" autocomplete="off" class="form-control" rows="4" required><?= ($userdata['restaurant_address'] ?? ''); ?></textarea>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
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
    <!-- col-md-12 -->
  </div>
  <!-- /.row -->
</section>