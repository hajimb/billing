  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Discount Listing</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a role="button" href="<?php echo base_url() ?>discount/add_discount" class="btn btn-danger mr-2"><i class="fas fa-tag fa-2x mr-1"></i><strong>ADD Discount</strong></a>
            <a role="button" href="<?php echo base_url(); ?>dashboard" class="btn btn-outline-danger"><i class="fas fa-chevron-left mr-1"></i><strong>BACK</strong></a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="table">
                    <table class="table data-table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Discount Name</th>
                            <th>Discount</th>                                                       
                            <th colspan="2">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($discount as $discount_s) {  ?>
                          <tr>
                            <th scope="row"><?php echo 1 ?></th>
                            <td><?php echo $discount_s['discount_name']?></td>
                            <td><?php echo $discount_s['discount']?></td>                            
                            <td><a href="<?php echo base_url() ?>discount/edit/<?php echo $discount_s['discount_id'];?>" class="action"><strong>Edit</strong></a></td>
                            <td><a href="javascript:void(0);" onclick="discountdelete(<?php echo $discount_s['discount_id'];?>);" class="action"><i class="far fa-trash-alt"></i></a></td>
                          </tr>
                          <?php  }  ?> 
                        </tbody>
                      </table>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
    var url="<?php echo base_url();?>";
    function discountdelete(id){
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = url+"discount/discount_delete/"+id;
        else
          return false;
        } 
</script>