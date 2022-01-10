<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New User</h1>
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
       
        <form action="<?php echo base_url() ?>User/add" enctype="multipart/form-data" method="post" name="adduser" id="adduser" class="form-horizontal">
            <div class="card-body row">          
              <div class="col-9">
                <div class="form-group">
                  <label for="inputName">User Name</label>
                  <input type="taxt" id="username" name="username" class="form-control" autocomplete="off" required/>          
                </div>
                <div class="form-group">
                  <label for="inputName">First Name</label>
                  <input type="taxt" id="firstname" name="firstname" class="form-control" autocomplete="off" required/>          
                </div>
                <div class="form-group">
                  <label for="inputName">Last Name</label>
                  <input type="taxt" id="lastname" name="lastname" class="form-control" autocomplete="off" required/>          
                </div>
                <div class="form-group">
                  <label for="inputName">Email</label>
                  <input type="taxt" id="email" name="email" class="form-control" autocomplete="off" required/>          
                </div>
                <div class="form-group">
                  <label for="inputName">Password</label>
                  <input type="password" id="password" name="password" class="form-control" autocomplete="off" required/>          
                </div>       
                <!-- <div class="form-group">
                  <label for="groups">Restaurants</label>
                  <select class="form-control" id="restaurant_id" name="restaurant_id">
                    <option value="">Select Restaurants</option>
                    <?php foreach ($restaurants as $k => $v): ?>
                      <option value="<?php echo $v['restaurant_id'] ?>"><?php echo $v['restaurant_name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div> -->
                <div class="form-group">
                  <label for="groups">Groups</label>
                  <select class="form-control" id="groups" name="groups">
                    <option value="">Select Groups</option>
                    <?php foreach ($group_data as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['group_name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputMessage">Status</label>
                  <select class="form-control custom-select" placeholder="" name="status" required>
                                <option value="yes">Active</option>
                                <option value="no">Non-Active</option>                                
                            </select>
                </div>               
                
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Submit">
                </div>
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
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
    }
  </script>