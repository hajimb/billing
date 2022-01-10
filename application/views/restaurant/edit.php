<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Restaurant</h1>
          </div>  
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a role="button" onclick="goBack()" class="btn btn-outline-danger"><i class="fas fa-chevron-left mr-1"></i><strong>BACK</strong></a>
            </ol>
          </div>        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
       
        <form action="<?php echo base_url() ?>restaurant/update" enctype="multipart/form-data" method="post" name="addcustomer" id="addcustomer" class="form-horizontal">
            <div class="card-body row">          
              <div class="col-12">
                <div class="form-group">
                  <label for="inputName">Name</label>
                  <input type="text" id="name" name="name" value="<?php echo $formdata['data']['restaurant_name'];?>" autocomplete="off" class="form-control" required />
                </div>                
                <div class="form-group">
                  <label for="inputSubject">Mobile / Phone No.</label>
                  <input type="text" id="mobile" name="mobile" value="<?php echo $formdata['data']['contact_no'];?>" onkeypress="return isNumber(event)" autocomplete="off" class="form-control" required/>
                </div>
                <div class="form-group">
                  <label for="inputMessage">Address</label>
                  <textarea id="address" name="address" autocomplete="off" class="form-control" rows="4" required><?php echo $formdata['data']['restaurant_address'];?></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Submit">
                </div>
              </div>
            </div>
            <input type="hidden" id="id" name="id" value="<?php echo $formdata['data']['restaurant_id']; ?>"/>
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
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
    }
  </script>