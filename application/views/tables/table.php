    <div class="legend">
      <!-- <button class="btn bg-gray">Move KOT / Items</button> -->
      <span class="legend-span"><i class="fas fa-circle text-white"></i>  Blank Table</span>
      <span class="legend-span"><i class="fas fa-circle text-cyan "></i>  Order Taken</span>
      <span class="legend-span"><i class="fas fa-circle text-teal"></i>  Kitchen Accept</span>
      <span class="legend-span"><i class="fas fa-circle text-green"></i> In Cooking</span>
      <span class="legend-span"><i class="fas fa-circle text-orange"></i>  Order Ready</span>
      <span class="legend-span"><i class="fas fa-circle text-indigo"></i>  Picked Up By Waiter</span>
      <span class="legend-span"><i class="fas fa-circle text-secondary"></i>  Order On Table</span>
      <span class="legend-span"><i class="fas fa-circle text-pink"></i>  Bill Raised</span>
      <span class="legend-span"><i class="fas fa-circle text-danger"></i> Bill Paid</span>
    </div>
    <?php 
    // echo "<pre>";
    // print_r($table);
    // ?>
    <!-- Main content -->
    <section class="content">
      <form id="mainfrm" name="mainfrm" method="POST">
        <input type="hidden" id="main_id" name="main_id" value="">
        <input type="hidden" id="table_id" name="table_id" value="">
        <input type="hidden" id="bill_id" name="bill_id" value="">
      </form>
      <div class="container-fluid">
        <div class="row p-2">
          <?php  
          foreach($table as $table_s) {  
            if(isset($table_s['ord_status'])){
              if($table_s['ord_status'] == "BillPaid"){ 
                $table_status_val = "bg-danger";  
              }else if($table_s['ord_status'] == "InCooking"){ 
                $table_status_val = "bg-success"; 
              }else if($table_s['ord_status'] == "OrderTaken"){ 
                $table_status_val = "bg-cyan"; 
              }else if($table_s['ord_status'] == "KitchenAccept"){ 
                $table_status_val = "bg-teal"; 
              }else if($table_s['ord_status'] == "OrderReady"){ 
                $table_status_val = "bg-orange"; 
              }else if($table_s['ord_status'] == "PickedUpByWaiter"){ 
                $table_status_val = "bg-indigo"; 
              }else if($table_s['ord_status'] == "OrderOnTable"){ 
                $table_status_val = "bg-secondary"; 
              }else if($table_s['ord_status'] == "BillRaised"){ 
                $table_status_val = "bg-pink"; 
              }else{ 
                $table_status_val = "bg-light";
              }
            }
            if (isset($table_s['table_id'])){
          ?>
            <div class="col-lg-2 col-md-2  col-sm-6 btn" >
              <!-- <a href="<?php echo base_url() ?>order?table_id=<?= $table_s['table_id']?>"> -->
                <!-- small box -->
                <div class="small-box hotel-tab  blank-tab <?=$table_status_val?>">
                  <div class="inner text-center hotel-table">
                    <span class="<?=$table_status_val?> createorder"  table_id="<?= $table_s['table_id']; ?>" bill_id="<?= $table_s['bill_id']; ?>">
                      <div><?php echo $table_s['tablename']?></div>
                      <div>&nbsp;</div>
                      <div> 
                       <?php if(isset($table_s['table_stime'])){?> 
                      <script>
                        var sec_<?=$table_s['table_id']?> = <?php echo $table_s['table_stime'];?>;
                        setInterval( function(){
                          secondsTimeSpanToHMS(++sec_<?=$table_s['table_id']?>,<?=$table_s['table_id']?>);
                        }, 1000);
                        </script>
                       <?php } ?>
                       <span id="hours_<?=$table_s['table_id']?>" class="hours">00</span>:<span id="minutes_<?=$table_s['table_id']?>" class="minutes">00</span>:<span id="seconds_<?=$table_s['table_id']?>" class="seconds">00</span>
                    </div>
                    </span>
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <?php if($table_s['ord_status'] == 'PickedUpByWaiter'){?>
                          <span>
                            <a class="btn btn-app action-btn" href="javascript:void(0);" onclick="orderstatusupdateTable(<?=$table_s['table_id']?>,'OrderOnTable');" title="Order On Table">
                              <i class="fas fa-concierge-bell"></i> 
                            </a>
                          </span>
                        <?php } ?>
                        <?php if(($table_s['ord_status'] == 'BillPaid') || ($table_s['ord_status'] == 'BillRaised')){?>
                          <span>
                            <a class="btn btn-app action-btn" href="javascript:void(0);" onclick="getorderBilltable(<?=$table_s['table_id']?>);" data-toggle="modal" data-target="#modal-default-1" >
                              <i class="fas fa-print"></i>
                            </a>
                          </span>
                          <?php }?>
                          <?php if(($table_s['ord_status'] != '')){?>
                            <span>
                              <a class="btn btn-app action-btn vieworder"  table_id="<?= $table_s['table_id']; ?>" bill_id="<?= $table_s['bill_id']; ?>">
                                <i class="far fa-eye"></i> 
                            </a>
                            </span>
                          <?php }?>
                            
                        <?php if(($table_s['ord_status'] == 'BillPaid')){?>
                        <span>
                          <a class="btn btn-app action-btn" href="javascript:void(0);" onclick="tableEmpty(<?=$table_s['table_id']?>);" >
                          <i class="far fa-window-close"></i>
                          </a>
                        </span>
                        <?php }?>
                       
                      </div>
                    </div>
                  </div>
                </div>
              <!-- </a> -->
            </div>
          
          <?php }} ?> 
          <!-- ./col -->

        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>