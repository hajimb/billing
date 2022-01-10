<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>View Customer</h1> </div>
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
        <div class="card-body">
          <div class="col-12">
            <div class="form-group row">
              <label for="name" class="col-sm-3 col-form-label">Name</label>
              <div class="col-sm-3">
                <input type="text" id="name" name="name" readonly class="form-control" value="<?= $formdata->c_name;?>" /> </div>
              <label for="email" class="col-sm-3 col-form-label">E-Mail</label>
              <div class="col-sm-3">
                <input type="email" id="email" name="email" readonly class="form-control"  value="<?= $formdata->email;?>"/> </div>
            </div>
            <div class="form-group row">
              <label for="mobile" class="col-sm-2 col-form-label">Mobile / Phone No</label>
              <div class="col-sm-2">
                <input type="text" id="mobile" name="mobile" readonly onkeypress="return isNumber(event)" class="form-control"  value="<?= $formdata->mobile;?>"/> </div>
              <label for="dob" class="col-sm-2 col-form-label">DoB</label>
              <div class="col-sm-2">
                <input type="text" id="dob" name="dob" readonly value="<?= $formdata->dob;?>" class="form-control datepicker" /> </div>
              <label for="doa" class="col-sm-2 col-form-label">DoA</label>
              <div class="col-sm-2">
                <input type="text" id="doa" name="doa" readonly value="<?= $formdata->doa;?>" class="form-control datepicker" /> </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-10">
                <textarea id="address" name="address" class="form-control" readonly rows="4"><?= $formdata->address;?></textarea>
              </div>
            </div>
            
        </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
