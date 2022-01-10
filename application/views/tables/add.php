<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Table</h1>
          </div>  
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a role="button" onclick="goBack()" class="btn btn-danger"><i class="fas fa-chevron-left mr-1"></i><strong>BACK</strong></a>
            </ol>
          </div>        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
       
        <form action="<?php echo base_url() ?>Table/add" method="post" name="addtable" id="addtable" class="form-horizontal">
            <div class="card-body row">          
              <div class="col-12">
                <div class="form-group">
                  <label for="inputName">Select Restaurant</label>
                            <select class="form-control form-control-sm" placeholder="Select Restaurant" name="restaurant_id" required>
                            <?php  foreach($restaurant as $restaurant_s) { ?>    
                            <option value="<?php echo $restaurant_s['restaurant_id']?>"><?php echo $restaurant_s['restaurant_name']?></option>
                                <?php } ?>
                            </select>
                </div>                
                <div class="form-group">
                  <label for="inputSubject">Table name</label>
                  <input type="text" id="tablename" name="tablename" autocomplete="off" class="form-control" required/>
                </div>
                <div class="form-group">
                  <label for="inputSubject">Capacity</label>
                  <input type="text" id="capacity" name="capacity" autocomplete="off" onkeypress="return isNumber(event)" class="form-control" required/>
                </div>
                <div class="form-group">
                  <label for="inputMessage">Status</label>
                  <select class="form-control form-control-sm" placeholder="" name="status" required>
                                <option value="0">Available</option>
                                <option value="1">Not Available</option>                                
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

