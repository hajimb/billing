<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Category</h1>
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
       
        <form action="<?php echo base_url() ?>category/update" enctype="multipart/form-data" method="post" name="editcategory" id="editcategory" class="form-horizontal">
            <div class="card-body row">          
              <div class="col-12">
                <div class="form-group">
                  <label for="inputName">Category</label>
                  <input type="text" id="category" name="category" value="<?php echo $formdata['data']['category'];?>" autocomplete="off" class="form-control" required />
                </div>                
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Submit">
                </div>
              </div>
            </div>
            <input type="hidden" id="id" name="id" value="<?php echo $formdata['data']['category_id']; ?>"/>
        </form>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->