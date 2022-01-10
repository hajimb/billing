  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Raw material Listing</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
            
            <ol class="breadcrumb float-sm-right">
            <a role="button" href="<?php echo base_url() ?>RawMaterial/add_RawMaterial" class="btn btn-danger mr-2"><i class="fa fa-user mr-1"></i><strong>ADD Raw Material</strong></a>
            <a role="button" href="<?php echo base_url(); ?>inventory" class="btn btn-outline-danger"><i class="fas fa-chevron-left mr-1"></i><strong>BACK</strong></a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card search-card">
            <div class="card-title p-3" data-toggle="collapse" href="#collapseExample">
                <h4><i class="fas fa-search mr-1"></i>Search</h4>
            </div>
                <div class="card-body collapse" id="collapseExample">
                  <form role="form">

                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="">Mobile</label>
                                <input type="text" name="" class="form-control form-control-sm" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="" class="form-control form-control-sm" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="" class="form-control form-control-sm" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="">Customer Type</label>
                                <select class="form-control form-control-sm">
                                <option>All</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                <option>option 5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                        <!-- text input -->   
                </div>
                <div class="card-footer collapse" id="collapseExample">
                    <span><a href="" class="btn btn-sm btn-outline-danger ml-2" role="button">RESET</a></span>
                    <span><a href="" class="btn btn-sm btn-danger " role="button">SEARCH</a></span>
                </div>
                </form>
        </div>
        <div class="card">
            <div class="table">
                    <table class="table data-table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Raw Material</th>                            
                            <th colspan="2">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rawmaterial as $rawmaterial_s) {  ?>
                          <tr>
                            <th scope="row"></th>
                            <td><?php echo $rawmaterial_s['rawmaterial']?></td>
                            <td><a href="<?php echo base_url() ?>RawMaterial/edit/<?php echo $rawmaterial_s['rawmaterial_id'];?>" class="action"><strong>Edit</strong></a></td>
                            <td><a href="javascript:void(0);" onclick="rawdelete(<?php echo $rawmaterial_s['rawmaterial_id'];?>);" class="action"><i class="far fa-trash-alt"></i></a></td>
                          </tr>
                          <?php  } ?> 
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
    function rawdelete(id){
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = url+"RawMaterial/RawMaterial_delete/"+id;
        else
          return false;
        } 
</script>