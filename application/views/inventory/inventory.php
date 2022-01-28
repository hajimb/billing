 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">

                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Inventory Management</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <a role="button" href="#" class="btn ml-2" ><i class="fas fa-sync-alt"></i> </a>
                                <a role="button" href="#" class="btn ml-2 btn-danger"> <strong>FOOD READY</strong> </a>
                                <a role="button" href="#" class="btn ml-2 btn-danger"> <strong>DISPATCH</strong> </a>
                                <a role="button" href="#" class="btn ml-2 btn-danger"> <strong>DELIVERY</strong> </a> -->
                                <a role="button" href="<?php echo base_url(); ?>dashboard" class="btn btn-outline-danger"> <strong> < BACK</strong> </a>
                              </ol>
                        </div>
                        <!-- /.col -->
                    </div><!-- /.row -->

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid ">
                    <!-- Small boxes (Stat box) -->
                    <div class="row p-2">
                        <div class="col-lg-2 col-md-2  col-sm-6 ">
                            <div class="small-box config-tab ">
                                <a href="<?php echo base_url(); ?>currentstock">
                                    <div class="inner text-center bg-lightgray">
                                        <h5>Current Stock</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-2 col-md-2  col-sm-6">
                            <!-- small box -->
                            <div class="small-box config-tab ">
                                <a href="<?php echo base_url(); ?>stockreport">
                                    <div class="inner text-center bg-lightgray">
                                        <h5>Stock Report</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2  col-sm-6">
                            <!-- small box -->
                            <div class="small-box config-tab ">
                                <a href="<?php echo base_url(); ?>wastagelisting">
                                    <div class="inner text-center bg-lightgray">
                                        <h5>Wastage</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <!-- ./col -->
                        <div class="col-lg-2 col-md-2  col-sm-6">
                            <!-- small box -->
                            <div class="small-box config-tab ">
                                <a href="">
                                    <div class="inner text-center bg-lightgray">
                                        <h5>Convert Raw Material</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2  col-sm-6">
                            <!-- small box -->
                            <div class="small-box config-tab">
                                <a href="">
                                    <div class="inner text-center bg-lightgray">
                                        <h5>Indent Management</h5>
                                    </div>
                            </div>
                        </div>
                    
                        <div class="col-lg-2 col-md-2  col-sm-6">
                            <!-- small box -->
                            <div class="small-box config-tab">
                                <a href="<?php echo base_url(); ?>purchase">
                                    <div class="inner text-center bg-lightgray">
                                        <h5>Purchase Management</h5>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2  col-sm-6">
                            <!-- small box -->
                            <div class="small-box config-tab ">
                                <a href="<?php echo base_url(); ?>rawmaterial">
                                    <div class="inner text-center bg-lightgray">
                                        <h5>Raw Material Management</h5>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2  col-sm-6">
                            <!-- small box -->
                            <div class="small-box config-tab ">
                                <a href="<?php echo base_url(); ?>rawmaterial-used">
                                    <div class="inner text-center bg-lightgray">
                                        <h5>Raw Material Used</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <!-- ./col -->
                    </div>
                <!-- /.row -->
                <!-- /.row (main row) -->
        </div>

        </section>
        <!-- /.content -->
    </div>