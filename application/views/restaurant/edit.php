<?php
$img_name = base_url()."assets/img/no-image-available.jpg";
if($data['photo_file'] != ''){
  $img_name = base_url()."assets/images/".$data['photo_file'];
}
?>
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title"><?= $todo; ?> Restaurant</h3>
        </div>
        <form role="form" method="post" name="mainfrm" id="mainfrm" enctype="multipart/form-data">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="company_name">Company Name</label>
                  <input type="text" id="company_name" name="company_name" value="<?= ($data['company_name'] ?? ''); ?>" autocomplete="off" class="form-control" required />
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="restaurant_name">Restaurant Name</label>
                  <input type="text" id="restaurant_name" name="restaurant_name" value="<?= ($data['restaurant_name'] ?? ''); ?>" autocomplete="off" class="form-control" required />
                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="contact_no">Mobile / Phone No.</label>
                  <input type="text" id="contact_no" name="contact_no" value="<?= ($data['contact_no'] ?? ''); ?>" onkeypress="return isNumber(event)" autocomplete="off" class="form-control" required />
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" id="email" name="email" value="<?= ($data['email'] ?? ''); ?>" autocomplete="off" class="form-control" />
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="fssai_no">FSSAI No.</label>
                  <input type="text" id="fssai_no" name="fssai_no" value="<?= ($data['fssai_no'] ?? ''); ?>" autocomplete="off" class="form-control" />
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="gstin_no">GSTIN No.</label>
                  <input type="text" id="gstin_no" name="gstin_no" value="<?= ($data['gstin_no'] ?? ''); ?>" autocomplete="off" class="form-control" />
                </div>
              </div>

              <div class="col-sm-7">
                <div class="form-group">
                  <label for="restaurant_address">Address</label>
                  <textarea id="restaurant_address" name="restaurant_address" autocomplete="off" class="form-control" rows="4" required><?= ($data['restaurant_address'] ?? ''); ?></textarea>
                </div>
              </div>
              <div class="col-sm-2 text-center">
                <label for="photo_file">Logo</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input btn-primary" id="photo_file" name="photo_file" accept="image/x-png,image/gif,image/jpeg"> <br />
                  <label class="custom-file-label" for="photo_file"></label>
                </div>
                <span style="font-size: 10px; color:red">(300px x 200px or proportionate)</span>
                <br />
                <input type="hidden" name="img_name" id="img_name" value="<?= ($data['photo_file'] ?? ''); ?>">
                <input id="reset_img" type="button" class="btn btn-warning" data-text="Reset Photo" value="Reset Photo" />
              </div>
              <div class="col-sm-3">
                <label >&nbsp;</label>
                <div style="text-align: -webkit-center;">
                    <!-- <input type="file" class="filestyle" data-btnClass="btn-primary" data-input="false" id="photo_file" name="photo_file" data-toggle="tooltip" data-placement="bottom" data-original-title="Restaurant Logo" accept="image/x-png,image/gif,image/jpeg" tabindex="8" data-text="Select Restaurant Logo"> <br /> -->
                    <img src="<?= $img_name; ?>" class="img-fluid" id="photo_name" style="max-height: 100px;" /> <br /><br />
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
<script>
  var photo_url = "<?= $img_name; ?>";
</script>