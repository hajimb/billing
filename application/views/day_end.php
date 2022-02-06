<?php
$dayendtime = ($dayend['dayendtime'] ?? '');
if($dayendtime != ''){
  $current_date = new DateTime();
  $new_date = new DateTime($dayendtime);
  $new_date->modify('+20 hours');

  $btndisabled = '';
  $btntitle = 'Generate Day End Report';
  if ($current_date > $new_date) {
  }else{
    $btntitle = 'Day End Report can be Generated after '.$new_date->format('Y-m-d H:i:s');
    $btndisabled = "disabled";
}
}
?>
<div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <form role="form" method="post" name="mainfrm" id="mainfrm">
              <input type="hidden" name="restaurant_id" id="restaurant_id" value="<?= $session_data['restaurant_id'];?>">
              <input type="hidden" name="dayendtime" id="dayendtime" value="<?= ($dayend['dayendtime'] ?? '');?>">
            </form>
            <?php if(isset($dayend) == 0) { ?>
              <div class="col-md-12 text-center">
                <button class="btn btn-lg btn-danger" id="generate_day_end">Generate Day End Report</button>
              </div>
              <?php }else{ ?>
                <div class="col-md-4"><h4 class="m-0">Day End Summary</h4></div>
                <div class="col-md-4 text-center">
                  <h4 class="m-0"><?= $dayend['dayendtime'];?></h4>
                  <h5 class="m-0"> (Invoice Range :<?= $dayend['order_bill_range'];?> )</h5>
                </div>
                <div class="col-md-4 text-right">
                <button class="btn btn-lg btn-danger" <?=$btndisabled; ?> title="<?= $btntitle; ?>" id="generate_day_end">Generate Day End Report</button>
                </div>
              <?php }?>
          </div>
        </div>
      </div>
      <?php if(isset($dayend) > 0) { ?>
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
                  <div class="row">
                    <div class="col-md-4">
                      <h5>Success Orders</h5> 
                    </div>
                    <div class="col-md-4 text-center">
                      No Of Orders (#) : <?= intval($dayend['dinein_success_order_count']) + intval($dayend['delivery_success_order_count']) +intval($dayend['pickup_success_order_count'])+intval($dayend['online_success_order_count']) ;?>
                    </div>
                    <div class="col-md-4 text-right">
                      Total (<i class="fas fa-rupee-sign"></i>) <?= floatval($dayend['dinein_success_order_amount']) + floatval($dayend['delivery_success_order_amount']) +floatval($dayend['pickup_success_order_amount'])+floatval($dayend['online_success_order_amount']);?>  <i class="fas fa-plus rotate-icon" style="float: right ;margin-left:10px;"></i>
                    </div>
                  </div>
                </a>
              </div>
              <!-- Card body -->
              <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                data-parent="#accordionEx">
                <div class="card-body">
                  <table class="table table-bordered" style="margin: 0;">
                    <tbody>
                      <tr class="table-danger">
                        <th>Dine In <span style="float:right"># (<?= $dayend['dinein_success_order_count'];?>)</th>
                        <th>Delivery <span style="float:right"># (<?= $dayend['delivery_success_order_count'];?>)</th>
                        <th>Pick up <span style="float:right"># (<?= $dayend['pickup_success_order_count'];?>)</th>
                        <th>Online <span style="float:right"># (<?= $dayend['online_success_order_count'];?>)</th>
                      </tr>
                      <tr>
                        <td class="text-center"><?= $dayend['dinein_success_order_amount'];?></td>
                        <td class="text-center"><?= $dayend['delivery_success_order_amount'];?></td>
                        <td class="text-center"><?= $dayend['pickup_success_order_amount'];?></td>
                        <td class="text-center"><?= $dayend['online_success_order_amount'];?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
            <!-- Accordion card -->
            <div class="card">
              <!-- Card header -->
              <div class="card-header" role="tab" id="headingTwo2">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                  aria-expanded="false" aria-controls="collapseTwo2">
                  <div class="row">
                    <div class="col-md-4">
                      <h5>Cancelled Order</h5> 
                    </div>
                    <div class="col-md-4 text-center">
                      No Of Orders (#) : <?= intval($dayend['dinein_cancel_order_count']) + intval($dayend['delivery_cancel_order_count']) +intval($dayend['pickup_cancel_order_count'])+intval($dayend['online_cancel_order_count']) ;?>
                    </div>
                    <div class="col-md-4 text-right">
                      Total (<i class="fas fa-rupee-sign"></i>) <?= floatval($dayend['dinein_cancel_order_amount']) + floatval($dayend['delivery_cancel_order_amount']) +floatval($dayend['pickup_cancel_order_amount'])+floatval($dayend['online_cancel_order_amount']);?>  <i class="fas fa-plus rotate-icon" style="float: right ;margin-left:10px;"></i>
                    </div>
                  </div>
                </a>
              </div>
              <!-- Card body -->
              <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                data-parent="#accordionEx">
                <div class="card-body">
                  <table class="table table-bordered" style="margin: 0;">
                   <tbody>
                    <tr class="table-danger">
                        <th>Dine In <span style="float:right"># (<?= $dayend['dinein_cancel_order_count'];?>)</th>
                        <th>Delivery <span style="float:right"># (<?= $dayend['delivery_cancel_order_count'];?>)</th>
                        <th>Pick up <span style="float:right"># (<?= $dayend['pickup_cancel_order_count'];?>)</th>
                        <th>Online <span style="float:right"># (<?= $dayend['online_cancel_order_count'];?>)</th>
                      </tr>
                      <tr>
                        <td class="text-center"><?= $dayend['dinein_cancel_order_amount'];?></td>
                        <td class="text-center"><?= $dayend['delivery_cancel_order_amount'];?></td>
                        <td class="text-center"><?= $dayend['pickup_cancel_order_amount'];?></td>
                        <td class="text-center"><?= $dayend['online_cancel_order_amount'];?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
            <!-- Accordion card -->
            <div class="card">
              <!-- Card header -->
              <div class="card-header" role="tab" id="headingThree3">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
                  aria-expanded="false" aria-controls="collapseTwo2">
                  <div class="row">
                    <div class="col-md-4">
                      <h5>Complimentary Order</h5> 
                    </div>
                    <div class="col-md-4 text-center">
                      No Of Orders (#) : <?= intval($dayend['dinein_complimentary_order_count']) + intval($dayend['delivery_complimentary_order_count']) +intval($dayend['pickup_complimentary_order_count'])+intval($dayend['online_complimentary_order_count']) ;?>
                    </div>
                    <div class="col-md-4 text-right">
                      Total (<i class="fas fa-rupee-sign"></i>) <?= floatval($dayend['dinein_complimentary_order_amount']) + floatval($dayend['delivery_complimentary_order_amount']) +floatval($dayend['pickup_complimentary_order_amount'])+floatval($dayend['online_complimentary_order_amount']);?>  <i class="fas fa-plus rotate-icon" style="float: right ;margin-left:10px;"></i>
                    </div>
                  </div>
                </a>
              </div>
              <!-- Card body -->
              <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
                data-parent="#accordionEx">
                <div class="card-body">
                  <table class="table table-bordered" style="margin: 0;">
                  <tbody>
                    <tr class="table-danger">
                        <th>Dine In <span style="float:right"># (<?= $dayend['dinein_complimentary_order_count'];?>)</th>
                        <th>Delivery <span style="float:right"># (<?= $dayend['delivery_complimentary_order_count'];?>)</th>
                        <th>Pick up <span style="float:right"># (<?= $dayend['pickup_complimentary_order_count'];?>)</th>
                        <th>Online <span style="float:right"># (<?= $dayend['online_complimentary_order_count'];?>)</th>
                      </tr>
                      <tr>
                        <td class="text-center"><?= $dayend['dinein_complimentary_order_amount'];?></td>
                        <td class="text-center"><?= $dayend['delivery_complimentary_order_amount'];?></td>
                        <td class="text-center"><?= $dayend['pickup_complimentary_order_amount'];?></td>
                        <td class="text-center"><?= $dayend['online_complimentary_order_amount'];?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
            <!-- Accordion card -->
            <div class="card">
              <!-- Card header -->
              <div class="card-header" role="tab" id="headingFour4">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseFour4"
                  aria-expanded="false" aria-controls="collapseTwo2">
                  <div class="row">
                    <div class="col-md-6">
                      <h5>Order Payment Details</h5> 
                    </div>
                    <div class="col-md-6 text-right">
                      Total (<i class="fas fa-rupee-sign"></i>) <?= round($dayend["order_final_amount"],2) ?> <i class="fas fa-plus rotate-icon" style="float: right ;margin-left:10px;"></i>
                    </div>
                  </div>
                </a>
              </div>
              <!-- Card body -->
              <div id="collapseFour4" class="collapse" role="tabpanel" aria-labelledby="headingFour4"
                data-parent="#accordionEx">
                <div class="card-body">
                  <table class="table table-bordered" style="margin: 0;">
                    <tbody>
                        <tr class="table-danger">
                          <th class="text-center">Total Orders</th>
                          <th class="text-center">Total Amout</th>
                          <th class="text-center">Total Tax</th>
                          <th class="text-center">Total Discount</th>
                          <th class="text-center">Final Amount Of The Day</th>
                        </tr>
                        <tr>                        
                          <td class="text-center"><?= $dayend["order_total_count"] ?></td>
                          <td class="text-center"><?= round($dayend["order_total_amount"],2) ?></td>
                          <td class="text-center"><?= round($dayend["order_tax"],2) ?></td>
                          <td class="text-center"><?= round($dayend["order_discount"],2) ?></td>
                          <td class="text-center"><?= round(($dayend["order_final_amount"]),2)?></td>
                        </tr>
                      </tbody>
                  </table>
                </div>
              </div>

            </div>
            <!-- Accordion card -->
            <div class="card">
              <!-- Card header -->
              <div class="card-header" role="tab" id="headingFive5">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseFive5"
                  aria-expanded="false" aria-controls="collapseTwo2">
                  <div class="row">
                    <div class="col-md-6">
                      <h5>Payment Information</h5> 
                    </div>
                    <div class="col-md-6 text-right">
                      Total (<i class="fas fa-rupee-sign"></i>) <?= round($dayend["order_final_amount"],2) ?> <i class="fas fa-plus rotate-icon" style="float: right ;margin-left:10px;"></i>
                    </div>
                  </div>
                </a>
              </div>
              <!-- Card body -->
              <div id="collapseFive5" class="collapse" role="tabpanel" aria-labelledby="headingFive5"
                data-parent="#accordionEx">
                <div class="card-body">
                  <table class="table table-bordered" style="margin: 0;">
                    <tbody>
                      <tr class="table-danger">
                        <th class="text-center">Cash</th>
                        <th class="text-center">Card</th>
                        <th class="text-center">Online</th>
                        <th class="text-center">UPI</th>
                      </tr>
                      <tr>
                        <td class="text-center"><?= round($dayend["payment_cash"],2) ?></td>
                        <td class="text-center"><?= round($dayend["payment_card"],2) ?></td>
                        <td class="text-center"><?= round($dayend["payment_online"],2) ?></td>
                        <td class="text-center"><?= round($dayend["payment_upi"],2) ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- Accordion wrapper -->
        </div><!-- /.container-fluid -->
      </section>
      <?php }?>
    </div>


<!-- Delete Modal -->
<div id="myModalDelete" class="modal fade" role="dialog" data-keyboard="true" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog ">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirmation</h4>
      </div>
      <div class="modal-body" style="overflow: auto;">
        <div class="main-grid">
          <div class="col-md-12 text-center">
            Are you sure You want to <b>Generate Day End Report</b> ?
            <br />
            <br />
            <span style="color:red;"><b>Note:</b> Once Day End Report is Generated, the New Entries will go to the Next Day.</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id = "confirmdelete" data-form="mainfrm">Confirm</button>
        <button type="button" class="btn btn-warning" id="cancelmenu" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>