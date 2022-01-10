<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Item</h1>
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
       
        <form action="<?php echo base_url() ?>Item/add" method="post" name="additem" id="additem" class="form-horizontal">
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
                  <label for="inputEmail">Select Category</label>
                  <select class="form-control form-control-sm" name="cat_id" required placeholder="">
                            <?php  foreach($category as $category_s) { ?>    
                            <option value="<?php echo $category_s['category_id']?>"><?php echo $category_s['category']?></option>
                                <?php } ?>
                            </select>                  
                </div>
                <div class="form-group">
                  <label for="inputSubject">Item name</label>
                  <input type="text" id="item_name" name="item_name" class="form-control" required/>
                </div>
                <div class="form-group">
                  <label for="inputSubject">Short Code</label>
                  <input type="text" id="short_code" name="short_code" class="form-control" required/>
                </div>
                <div class="form-group">
                  <label for="inputSubject">Price</label>
                  <input type="text" id="price" name="price" class="form-control" required/>
                </div>
                <div class="form-group">
                  <label for="inputSubject">Favorite</label>
                  <input type="checkbox" id="favorite" name="favorite" class="form-control" value="1"/>
                </div>
                <div class="form-group">
                  <label for="inputMessage">Stock Status</label>
                  <select class="form-control form-control-sm" placeholder="" name="stock_status" required>
                                <option value="1">Available</option>
                                <option value="0">Not Available</option>                                
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

