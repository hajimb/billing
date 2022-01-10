<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Purchase Listing</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a role="button" href="<?php echo base_url() ?>Purchase/add_stock" class="btn btn-danger mr-2"><strong>ADD Purchase Stock</strong></a>
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
                                <label for="">From</label>
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
                                <label for="">Status</label>
                                <select class="form-control form-control-sm">
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
                                <label for="">Start Date</label>
                                <input type="date" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="">End Date</label>
                                <input type="date" class="form-control form-control-sm">
                                
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
                            
                            <th>Invoice No.</th>
                            <th>Raw Material</th>
                            <th>Current Stock</th>
                            <th>Unit</th>                                                       
                            <th>From</th>                            
                            <th>Total ( <i class="fas fa-rupee-sign"></i> )</th>
                            <th>Payment</th>
                            <th>Paid Amount ( <i class="fas fa-rupee-sign"></i> )</th>
                            <th>Invoice Date</th>
                            <th colspan="2">Action</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($stock as $stock_s) {  ?>
                          <tr>     
                            <td><?php echo $stock_s['invoice_no'];?></td>                       
                            <td><?php echo $stock_s['rawmaterial'];?></td>
                            <td><?php echo $stock_s['stock'];?></td>
                            <td><?php echo $stock_s['unit'];?></td>
                            <td><?php echo $stock_s['supplier_name'];?></td>                            
                            <td><?php echo $stock_s['total_amount'];?></td>
                            <td><?php echo $stock_s['payment_type'];?></td>
                            <td><?php echo $stock_s['paid_amount'];?></td>
                            <td><?php echo $stock_s['purchase_date'];?></td>
                            <td><a href="<?php echo base_url() ?>Purchase/edit/<?php echo $stock_s['stock_id'];?>" class="action"><strong>Edit</strong></a></td>
                            <td><a href="javascript:void(0);" onclick="stockdelete(<?php echo $stock_s['stock_id'];?>);" class="action"><i class="far fa-trash-alt"></i></a></td>
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
    function stockdelete(id){
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = url+"Purchase/Stock_delete/"+id;
        else
          return false;
        } 
</script>