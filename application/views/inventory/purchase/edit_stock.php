<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Stock</h1>
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
       
        <form action="<?php echo base_url() ?>Purchase/update" enctype="multipart/form-data" method="post" name="addstock" id="addstock" class="form-horizontal">
            <div class="card-body row">          
              <div class="col-9">
                <div class="form-group">
                  <label for="inputName">Select Restaurant</label>
                            <select class="form-control custom-select" placeholder="Select Restaurant" name="restaurant_id" required>
                            <?php  foreach($restaurant as $restaurant_s) { ?>    
                            <option value="<?php echo $restaurant_s['restaurant_id']?>" <?php if($restaurant_s['restaurant_id'] == $formdata['data']['restaurant_id']) { ?>selected<?php } ?> ><?php echo $restaurant_s['restaurant_name']?></option>
                                <?php } ?>
                            </select>
                </div>
                <!--<div class="form-group">
                  <label for="inputEmail">Select Category</label>
                  <select class="form-control custom-select" name="cat_id" required placeholder="">
                              <?php  foreach($category as $category_s) { ?>
                                <option value="<?php echo $category_s['category_id']?>"> <?php echo $category_s['category']?></option>
                              <?php  } ?>              
                                </select>
                </div>-->
                <div class="form-group">
                  <label for="inputSubject">Raw Material</label>
                  <select class="form-control custom-select" name="rawmaterial_id" required placeholder="">
                  <?php  foreach($rawmaterial as $key => $rawmaterial_s) { ?>
                    <option value="<?php echo $key; ?>" <?php if($formdata['data']['rawmaterial_id']== $rawmaterial_s) { ?>selected<?php } ?>><?php echo $rawmaterial_s;?></option>
                  <?php  } ?>              
                  </select>
                </div>                
                <div class="form-group">
                  <label for="inputSubject">stock</label>
                  <input type="" id="stock" value="<?php echo $formdata['data']['stock'];?>" name="stock" class="form-control" onkeypress="return isNumber(event)" autocomplete="off" required/>
                </div>                
                <div class="form-group">
                  <label for="inputMessage">Unit</label>
                  <select class="form-control custom-select" placeholder="" name="unit" required>
                                <option value="KG" <?php if($formdata['data']['unit']=="KG") { ?>selected<?php } ?> >KG</option>
                                <option value="Unit" <?php if($formdata['data']['unit']=="Unit") { ?>selected<?php } ?>>Unit</option>                                
                            </select>
                </div>
                <div class="form-group">
                  <label for="inputSubject">Supplier Name</label>
                  <input type="" id="supplier_name" name="supplier_name" value="<?php echo $formdata['data']['supplier_name'];?>" class="form-control" autocomplete="off" required/>
                </div>
                <div class="form-group">
                  <label for="inputSubject">Invoice No.</label>
                  <input type="" id="invoice_no" name="invoice_no" value="<?php echo $formdata['data']['invoice_no'];?>" class="form-control"  autocomplete="off" required/>
                </div>
                <div class="form-group">
                  <label for="inputSubject">Total Amount</label>
                  <input type="" id="total_amount" name="total_amount" value="<?php echo $formdata['data']['total_amount'];?>" class="form-control" onkeypress="return isNumber(event)" autocomplete="off" required/>
                </div>
                <div class="form-group">
                  <label for="inputSubject">Paid Amount</label>
                  <input type="" id="paid_amount" name="paid_amount" value="<?php echo $formdata['data']['paid_amount'];?>" class="form-control" onkeypress="return isNumber(event)" autocomplete="off" required/>
                </div>
                <div class="form-group">
                  <label for="inputSubject">Payment Type</label>
                            <select class="form-control custom-select" placeholder="" name="payment_type" required>
                                <option value="Fully" <?php if($formdata['data']['payment_type']=="Fully") { ?>selected<?php } ?>>Fully Paid</option>
                                <option value="Partially" <?php if($formdata['data']['payment_type']=="Partially") { ?>selected<?php } ?>>Partially Paid</option>                                
                            </select>
                </div>
                <input type="hidden" id="id" name="id" value="<?php echo $formdata['data']['stock_id']; ?>"/>
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