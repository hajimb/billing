<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Customer</h1> </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right"> <a role="button" onclick="goBack()" class="btn btn-outline-danger"><i class="fas fa-chevron-left mr-1"></i><strong>BACK</strong></a> </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card">
      <form method="post" id="customerData" class="form-horizontal">
        <div class="card-body">
          <div class="col-12">
            <div class="form-group row">
              <label for="name" class="col-sm-3 col-form-label">Name</label>
              <div class="col-sm-3">
                <input type="text" id="name" name="name" autocomplete="off" class="form-control" value="<?= $formdata->c_name;?>" /> </div>
              <label for="email" class="col-sm-3 col-form-label">E-Mail</label>
              <div class="col-sm-3">
                <input type="email" id="email" name="email" autocomplete="off" class="form-control"  value="<?= $formdata->email;?>"/> </div>
            </div>
            <div class="form-group row">
              <label for="mobile" class="col-sm-2 col-form-label">Mobile / Phone No</label>
              <div class="col-sm-2">
                <input type="text" id="mobile" name="mobile" autocomplete="off" onkeypress="return isNumber(event)" class="form-control"  value="<?= $formdata->mobile;?>"/> </div>
              <label for="dob" class="col-sm-2 col-form-label">DoB</label>
              <div class="col-sm-2">
                <input type="text" id="dob" name="dob" autocomplete="off" value="<?= $formdata->dob;?>" class="form-control datepicker" /> </div>
              <label for="doa" class="col-sm-2 col-form-label">DoA</label>
              <div class="col-sm-2">
                <input type="text" id="doa" name="doa" autocomplete="off" value="<?= $formdata->doa;?>" class="form-control datepicker" /> </div>
                <input type="hidden" name="id" autocomplete="off" value="<?= $formdata->customer_id;?>"/> </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-10">
                <textarea id="address" name="address" class="form-control" autocomplete="off" rows="4"><?= $formdata->address;?></textarea>
              </div>
            </div>
            <div class="form-group">
              <button class="btn btn-primary saveChange" id="update" type="submit" data-form="customerData"><i class="fa fa-save" style="display: none"></i>Update Customer </button>
              <!-- <input type="submit" class="btn btn-primary" value="Submit"> </div> -->
          </div>
        </div>
      </form>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
function isNumber(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if(charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
  return true;
}
</script>