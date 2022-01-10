<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Item Listing</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a role="button" href="<?php echo base_url() ?>Item/add_item" class="btn btn-danger mr-2"><i class="fa fa-user mr-1"></i><strong>ADD Item</strong></a>
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
        <div class="card search-card">
          <div class="card-title p-3" data-toggle="collapse" href="#collapseExample">
            <h4><i class="fas fa-search mr-1"></i>Search</h4>
            </div>
            <form role="form">
              <div class="card-body collapse" id="collapseExample">
                <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="" class="form-control form-control-sm" >
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="">Short Code</label>
                                <input type="text" name="" class="form-control form-control-sm" >
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="">Sort By</label>
                                <select class="form-control form-control-sm" placeholder="">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                <option>option 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="">Sort By</label>
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
                            <th>Name</th>
                            <th>Short Code</th>
                            <th>Price ( <i class="fas fa-rupee-sign"></i> )</th>
                            <th>Favorite</th>
                            <th>Stock Status</th>
                            <th colspan="2">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($items as $items_s) { $i = 1; ?> 
                          <tr>
                            <th scope="row"><?php echo $i;?></th>
                            <td><?php echo $items_s['item_name'];?></td>
                            <td><?php echo $items_s['short_code'];?></td>
                            <td><?php echo $items_s['price'];?></td>
                            <td><input type="checkbox" <?php if($items_s['stock_status'] == 1) {?> checked <?php } ?> value="1"></td>
                            <td>
                                <div class="form-group">
                                <select class="form-control form-control-sm" placeholder="" name="stock_status">
                                          <option value="1" <?php if($items_s['stock_status'] == 1) {?> selected <?php } ?>>Available</option>
                                          <option value="0" <?php if($items_s['stock_status'] == 0) {?> selected <?php } ?>>Not Available</option>                                
                                </select>                                    
                                </div>
                            </td>
                           
                            <td><a href="<?php echo base_url() ?>Item/edit/<?php echo $items_s['item_id'];?>" class="action"><strong>Edit</strong></a></td>
                            <td><a href="javascript:void(0);" onclick="itemdelete(<?php echo $items_s['item_id'];?>);" class="action"><i class="far fa-trash-alt"></i></a></td>
                          </tr>
                          <?php } $i = $i + 1; ?>
                         
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
    function itemdelete(id){
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = url+"Item/item_delete/"+id;
        else
          return false;
        } 
</script>