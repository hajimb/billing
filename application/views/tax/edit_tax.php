<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit New Tax</h1>
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
       
        <form action="<?php echo base_url() ?>tax/update" enctype="multipart/form-data" method="post" name="addtax" id="addtax" class="form-horizontal">
            <div class="card-body row">          
              <div class="col-12">
                <div class="form-group">
                  <label for="inputName">Tax Name</label>
                  <input type="text" id="tax" name="tax_name" value="<?php echo $formdata['data']['tax_name'];?>" autocomplete="off" class="form-control" required />
                </div> 
                <div class="form-group">
                <label for="inputName">VAT</label>
                  <input type="text" id="vat" name="vat" value="<?php echo $formdata['data']['vat'];?>" autocomplete="off" class="form-control" required />
                </div>
                <div class="form-group">
                  <label for="inputName">SGST</label>
                  <input type="text" id="sgst" name="sgst" value="<?php echo $formdata['data']['sgst'];?>" autocomplete="off" class="form-control" required />
                </div>
                <div class="form-group">
                  <label for="inputName">CGST</label>
                  <input type="text" id="cgst" name="cgst" value="<?php echo $formdata['data']['cgst'];?>" autocomplete="off" class="form-control" required />
                </div>
                <div class="form-group">
                  <label for="inputName">Default</label>
                  <input type="checkbox" <?php if($formdata['data']['is_default'] == 1) {?> checked <?php } ?> value="1">
                </div>               
                <input type="hidden" id="id" name="id" value="<?php echo $formdata['data']['tax_id']; ?>"/>
								
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