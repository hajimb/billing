<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Day End History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
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
                <div class="card-body collapse" id="collapseExample">
                  <form role="form">

                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="">From</label>
                                <input type="date" name="" class="form-control form-control-sm" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="">To</label>
                                <input type="date" name="" class="form-control form-control-sm" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="">Biller</label>
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
                            <th>Day Start by</th>
                            <th>Day Start on</th>
                            <th>Day Start Balance</th>
                            <th>Day End by</th>
                            <th width="10%">Day End on</th>
                            <th>Invoice Range</th>
                            <th>Final Total</th>
                            <th width="10%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Biller (Raivat Kitchen)</td>
                            <td>2021-03-12</td>
                            <td>1173265.00</td>
                            <td>Biller (Raivat Kitchen)</td>
                            <td>2021-03-15</td>
                            <td>2955-2975</td>
                            <td>2123265.00</td>
                            <td>
                                <span>
                                <a href=""><i class="fas fa-eye"></i></a>
                                </span> | <span>
                                <a href=""><i class="fas fa-print"></i></a>
                                </span> |
                                <span>
                                    <a href=""><i class="fas fa-file-export"></i></a>
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td>Biller (Raivat Kitchen)</td>
                            <td>2021-03-12</td>
                            <td>1173265.00</td>
                            <td>Biller (Raivat Kitchen)</td>
                            <td>2021-03-15</td>
                            <td>2955-2975</td>
                            <td>2123265.00</td>
                            <td>
                                <span>
                                <a href=""><i class="fas fa-eye"></i></a>
                                </span> | <span>
                                <a href=""><i class="fas fa-print"></i></a>
                                </span> |
                                <span>
                                    <a href=""><i class="fas fa-file-export"></i></a>
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td>Biller (Raivat Kitchen)</td>
                            <td>2021-03-12</td>
                            <td>1173265.00</td>
                            <td>Biller (Raivat Kitchen)</td>
                            <td>2021-03-15</td>
                            <td>2955-2975</td>
                            <td>2123265.00</td>
                            <td>
                                <span>
                                <a href=""><i class="fas fa-eye"></i></a>
                                </span> | <span>
                                <a href=""><i class="fas fa-print"></i></a>
                                </span> |
                                <span>
                                    <a href=""><i class="fas fa-file-export"></i></a>
                                </span>
                            </td>
                          </tr>
                        </tbody>
                      </table>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>