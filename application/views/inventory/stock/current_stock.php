  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Current Stock</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
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
                                <label for="">Raw Material</label>
                                <input type="text" name="" class="form-control form-control-sm" placeholder="Raw Material">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="form-control form-control-sm">
                                <option>option 1</option>
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
                  <span><a href="" class="btn btn-sm btn-default ml-2" role="button">RESET</a></span>
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
                            <th>Current Stock</th>
                            <th>Unit</th>
                            <th>Last Updated</th>                           
                          </tr>
                        </thead>
                        <tbody>
                        <?php  $i=1; foreach($stock as $stock_s) { ?>                          
                              <tr>
                                <th scope="row"><?php echo $i ?></th>
                                <td><?php echo $stock_s['rawmaterial'];?></td>
                                <td><?php echo $stock_s['currentstock'] - $stock_s['totalwastage']; ?></td>
                                <td><?php echo $stock_s['unit'];?></td>
                                <td><?php echo $stock_s['modified_date'];?></td>
                                </tr>                          
                        <?php  $i = $i +1; }  ?>
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
    function stockdelete(id){
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = url+"CurrentStock/Stock_delete/"+id;
        else
          return false;
        } 
</script>