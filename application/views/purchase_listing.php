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
            <a role="button" href="<?php echo base_url() ?>CurrentStock/add_currentstock" class="btn btn-danger mr-2"><strong>ADD Purchase Stock</strong></a>
            <a role="button" onclick="goBack()" class="btn btn-outline-danger"><i class="fas fa-chevron-left mr-1"></i><strong>BACK</strong></a>
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
                            <th>#</th>
                            <th>From</th>
                            <th>Invoice No.</th>
                            <th>Total ( <i class="fas fa-rupee-sign"></i> )</th>
                            <th>Payment</th>
                            <th>Paid Amount ( <i class="fas fa-rupee-sign"></i> )</th>
                            <th>Invoice Date</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Ankur [Supplier]</td>
                            <td>POI4865</td>
                            <td>49580</td>
                            <td>Paid</td>
                            <td>
                                49500
                            </td>
                           
                            <td>2020-02-19</td>
                            <td>Saved</td>
                          </tr>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mayur [Supplier]</td>
                            <td>POI465</td>
                            <td>9580</td>
                            <td>Paid</td>
                            <td>
                                9580
                            </td>
                           
                            <td>2020-02-19</td>
                            <td>Saved</td>
                          </tr>
                         
                        </tbody>
                      </table>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>