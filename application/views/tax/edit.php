    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title"><?= $todo;?> Tax</h3>
            </div>
            <form role="form" method="post" name="mainfrm" id="mainfrm">
            <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                        <label for="inputName">Tax Name</label>
                        <input type="taxt" id="tax_name" name="tax_name" value="<?= ($data['tax_name'] ?? '');?>" class="form-control" autocomplete="off" required/>          
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                        <label for="inputName">VAT</label>
                        <input type="taxt" id="vat" name="vat" value="<?= ($data['vat'] ?? '');?>" class="form-control" autocomplete="off" required/>          
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                        <label for="inputName">SGST</label>
                        <input type="taxt" id="sgst" name="sgst" value="<?= ($data['sgst'] ?? '');?>" class="form-control" autocomplete="off" required/>          
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                        <label for="inputName">CGST</label>
                        <input type="taxt" id="cgst" name="cgst" value="<?= ($data['cgst'] ?? '');?>" class="form-control" autocomplete="off" required/>          
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="inputName">&nbsp;</label>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input permission" type="checkbox" name="is_default" <?php if(($data['is_default'] ?? '') == 1) {?> checked <?php } ?> id="is_default" value="1" >
                                <label for="is_default" class="custom-control-label">Default</label>
                            </div>
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
    <!-- /.content -->