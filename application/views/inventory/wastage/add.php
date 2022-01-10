<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Wastage</h1>
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
       
        <form action="<?php echo base_url() ?>WastageListing/add" enctype="multipart/form-data" method="post" name="addWastage" id="addWastage" class="form-horizontal">
            <div class="card-body row">          
              <div class="col-9">
                <div class="form-group">
                  <label for="inputName">Select Restaurant</label>
                            <select class="form-control custom-select" placeholder="Select Restaurant" name="restaurant_id" required>
                            <?php  foreach($restaurant as $restaurant_s) { ?>    
                            <option value="<?php echo $restaurant_s['restaurant_id']?>"><?php echo $restaurant_s['restaurant_name']?></option>
                                <?php } ?>
                            </select>
                </div>
                <!--<div class="form-group">
                  <label for="inputEmail">Select Category</label>
                  <select class="form-control custom-select" name="cat_id" required placeholder="">
                              <?php  foreach($category as $category_s) { ?>
                                <option value="<?php echo $category_s['category_id']?>"><?php echo $category_s['category']?></option>
                              <?php  } ?>              
                                </select>
                </div>-->
                <div class="form-group">
                  <label for="inputSubject">Raw Material</label>
                  <select class="form-control custom-select" name="rawmaterial_id" required placeholder="">
                              <?php  foreach($rawmaterial as $rawmaterial_s) { ?>
                                <option value="<?php echo $rawmaterial_s['rawmaterial_id']?>"><?php echo $rawmaterial_s['rawmaterial']?></option>
                              <?php  } ?>              
                                </select>
                </div>                
                <div class="form-group">
                  <label for="inputSubject">Wastage</label>
                  <input type="" id="wastage" name="wastage" class="form-control" onkeypress="return isNumber(event)" autocomplete="off" required/>
                </div>                
                <div class="form-group">
                  <label for="inputMessage">Unit</label>
                  <select class="form-control custom-select" placeholder="" name="unit" required>
                                <option value="KG">KG</option>
                                <option value="Unit">Unit</option>                                
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