<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Wastage Listing</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a role="button" href="<?php echo base_url() ?>WastageListing/add_Wastage" class="btn btn-danger mr-2"><strong>ADD WASTAGE</strong></a>
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
            <form role="form">
              <div class="card-body collapse" id="collapseExample">
                <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="start_date">Start Date
                                </label>
                                <input type="date" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="start_date">End Date
                                </label>
                                <input type="date" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                    </div>
                        <!-- text input -->   
                </div>
                <div class="card-footer collapse" id="collapseExample">
                  <span><a href="" class="btn btn-sm btn-outline-danger m-1" role="button">PRINT</a></span>
                    <span><a href="" class="btn btn-sm btn-danger m-1" role="button">SEARCH</a></span>
                    <span><a href="" class="btn btn-sm btn-outline-danger m-1" role="button">RESET</a></span>
                </div>
            </form>
        </div>
        <div class="card">
            <div class="table">
                    <table class="table data-table">
                        <thead>
                          <tr>
                            <th>Raw Material</th>
                            <th>Wastag Stock </th>
                            <th>Unit</th>
                            <th>Last Updated</th>
                            <th colspan="2">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($wastag as $wastag_s) {  ?>
                          <tr>
                            <td><?php echo $wastag_s['rawmaterial'];?></td> 
                            <td><?php echo $wastag_s['wastage'];?></td>
                            <td><?php echo $wastag_s['unit'];?></td>
                            <td><?php echo $wastag_s['modified_date'];?></td>                            
                            <td><a href="<?php echo base_url() ?>WastageListing/edit/<?php echo $wastag_s['wastage_id'];?>" class="action"><strong>Edit</strong></a></td>
                            <td><a href="javascript:void(0);" onclick="Wastagedelete(<?php echo $wastag_s['wastage_id'];?>);" class="action"><i class="far fa-trash-alt"></i></a></td>
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
    function Wastagedelete(id){
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = url+"WastageListing/Wastage_delete/"+id;
        else
          return false;
        } 
</script>