<style type="text/css">
.icon {
    padding: 0 5px;
    cursor: pointer;
}

.dflex {
    display: inline-flex
}
.dflex a {color: #000000;}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customer Listing</h1> </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right"> <a role="button" href="<?php echo base_url() ?>customer/add_customer" class="btn btn-danger mr-2"><i class="fa fa-user mr-1"></i><strong>ADD CUSTOMER</strong></a> <a role="button" href="<?php echo base_url(); ?>dashboard" class="btn btn-outline-danger"><i class="fas fa-chevron-left mr-1"></i><strong>BACK</strong></a> </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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
                                    <input type="text" name="" class="form-control form-control-sm" placeholder=""> </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="" class="form-control form-control-sm" placeholder=""> </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="" class="form-control form-control-sm" placeholder=""> </div>
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
                        <div class="card-footer collapse" id="collapseExample"> <span><a href="" class="btn btn-sm btn-outline-danger ml-2" role="button">RESET</a></span> <span><a href="" class="btn btn-sm btn-danger " role="button">SEARCH</a></span> </div>
                    </form>
                </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <div class="">
                <div class="table">
                    <table class="table table-striped table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mobile</th>
                                <th>Name</th>
                                <th>DoB</th>
                                <th>DoA</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- <tfoot>
                          <tr>
                            <th>#</th>
                            <th>Mobile</th>
                            <th>Name</th>
                            <th>DoB</th>
                            <th>DoA</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Action</th>
                          </tr>
                        </tfoot> -->
                        <tbody> </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>