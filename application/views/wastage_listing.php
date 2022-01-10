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
            <a role="button" href="#" class="btn btn-danger mr-2"><strong>ADD WASTAGE</strong></a>
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
                            <th>Date</th>
                            <th>Total (<i class="fas fa-rupee-sign"></i>) 
                            </th>
                            <th>Status</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>2020-02-12</td>
                            <td>0</td>
                            <td>Saved</td>
                          </tr>
                          <tr>
                            <td>2020-02-12</td>
                            <td>0</td>
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