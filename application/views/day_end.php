<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">

          <div class="row mb-2">
            <div class="col-sm-5">
              <h3 class="m-0">Day End Summary </h3>
            </div><!-- /.col -->
            <div class="col-sm-2"><span><strong> <?php echo date("Y-m-d H:i:s");?></strong></span></div>
            <div class="col-sm-5">
              <ol class="breadcrumb float-sm-right">
                <a role="button" href="#" onclick="<?php header("Refresh:60");?>" class="btn"><i class="fas fa-sync-alt"></i> </a>
                <!-- <a role="button" onclick="goBack()" class="btn btn-outline-secondary"> <strong>
                    < Back</strong> </a>
                <a role="button" href="#" class="btn btn-outline-secondary"> <strong> Next ></strong> </a>
                -->
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <hr>
          <!--Accordion wrapper-->
          <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
            <!-- Accordion card -->
            <div class="card">
              <!-- Card header -->
              <div class="card-header" role="tab" id="headingOne1">
                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                  aria-controls="collapseOne1">
                  <h5 class="mb-0">
                    Orders Summary <i class="fas fa-plus rotate-icon" style="float: right"></i>
                  </h5>
                </a>
              </div>
              <!-- Card body -->
              <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                data-parent="#accordionEx">
                <div class="card-body">
                  <table class="table table-bordered" style="margin: 0;">
                    <tbody>
                      <tr>
                        <th class="table-danger">Total Orders</th>
                        <th class="table-danger">Total Amout</th>
                        <th class="table-danger">Total Tax</th>
                        <th class="table-danger">Total Discount</th>
                        <th class="table-danger">Final Amount Of The Day</th>
                      </tr>
                      <tr>                        
                      <?php foreach($dayend as $dayend_d) { ?>
                        <td><?=$dayend_d["totalorders"]?></td>
                        <td><?=$dayend_d["totalamount"]?></td>
                        <td><?=$dayend_d["totaldiscount"]?></td>
                        <td><?=$dayend_d["totaltax"]?></td>
                        <td><?=$dayend_d["totalamount"] - ($dayend_d["totaldiscount"] + $dayend_d["totaltax"])?></td>
                      <?php } ?>  
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
            <!-- Accordion card 
            <div class="card">
              
              <div class="card-header" role="tab" id="headingTwo2">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                  aria-expanded="false" aria-controls="collapseTwo2">
                  <h5 class="mb-0">
                    Cancelled Order <i class="fas fa-plus rotate-icon" style="float: right"></i>
                  </h5>
                </a>
              </div>              
              <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                data-parent="#accordionEx">
                <div class="card-body">
                  <table class="table table-bordered" style="margin: 0;">
                    <tbody>
                      <tr>
                        <th class="table-danger">Delivery</th>
                        <th class="table-danger">Dine In</th>
                        <th class="table-danger">Pick up</th>
                        <th class="table-danger">Online</th>
                      </tr>
                      <tr>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td>0.00</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
            
            <div class="card">
             
              <div class="card-header" role="tab" id="headingThree3">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
                  aria-expanded="false" aria-controls="collapseTwo2">
                  <h5 class="mb-0">
                    Online Order <i class="fas fa-plus rotate-icon" style="float: right"></i>
                  </h5>
                </a>
              </div>
              
              <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
                data-parent="#accordionEx">
                <div class="card-body">
                  <table class="table table-bordered" style="margin: 0;">
                    <tbody>
                      <tr>
                        <th class="table-danger">Delivery</th>
                        <th class="table-danger">Dine In</th>
                        <th class="table-danger">Pick up</th>
                        <th class="table-danger">Online</th>
                      </tr>
                      <tr>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td>0.00</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
            
            <div class="card">
              
              <div class="card-header" role="tab" id="headingFour4">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseFour4"
                  aria-expanded="false" aria-controls="collapseTwo2">
                  <h5 class="mb-0">
                    Order Payment Details<i class="fas fa-plus rotate-icon" style="float: right"></i>
                  </h5>
                </a>
              </div>
              
              <div id="collapseFour4" class="collapse" role="tabpanel" aria-labelledby="headingFour4"
                data-parent="#accordionEx">
                <div class="card-body">
                  <table class="table table-bordered" style="margin: 0;">
                    <tbody>
                      <tr>
                        <th class="table-danger">Delivery</th>
                        <th class="table-danger">Dine In</th>
                        <th class="table-danger">Pick up</th>
                        <th class="table-danger">Online</th>
                      </tr>
                      <tr>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td>0.00</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
            
            <div class="card">
              
              <div class="card-header" role="tab" id="headingFive5">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseFive5"
                  aria-expanded="false" aria-controls="collapseTwo2">
                  <h5 class="mb-0">
                    Payment Information<i class="fas fa-plus rotate-icon" style="float: right"></i>
                  </h5>
                </a>
              </div>
              
              <div id="collapseFive5" class="collapse" role="tabpanel" aria-labelledby="headingFive5"
                data-parent="#accordionEx">
                <div class="card-body">
                  <table class="table table-bordered" style="margin: 0;">
                    <tbody>
                      <tr>
                        <th class="table-danger">Delivery</th>
                        <th class="table-danger">Dine In</th>
                        <th class="table-danger">Pick up</th>
                        <th class="table-danger">Online</th>
                      </tr>
                      <tr>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td>0.00</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            -->
          </div>
          
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>