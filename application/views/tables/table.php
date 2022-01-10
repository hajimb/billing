  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Table View</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <?php if(in_array('Restaurants', $user_permission)): ?>
              <a role="button" href="<?php echo base_url() ?>Table/add_table" class="btn btn-danger mr-2" > <strong>+ ADD TABLE</strong> </a>
              <?php endif; ?>
              <a role="button" href="<?php echo base_url(); ?>dashboard" class="btn btn-outline-danger"> <strong> < BACK</strong> </a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     
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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div style="display:none">
        <?php print_r($table);?>
        </div>
        <div class="row p-2">
        <script>
                        //var sec = 120;
    
    // setInterval( function(){
    //     $(".seconds").html(pad(++sec%60));
    //     $(".minutes").html(pad(parseInt(sec/60,10)));
    // }, 1000);
                        </script>
        <?php  foreach($table as $table_s) {  
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
          
            <div class="col-lg-2 col-md-2  col-sm-6 ">
              <a href="<?php echo base_url() ?>order?table_id=<?= $table_s['table_id']?>">
                <!-- small box -->
                <div class="small-box hotel-tab  blank-tab <?=$table_status_val?>">
                  <div class="inner text-center hotel-table">
                    <div class="<?=$table_status_val?>"> 
                      <span><?php echo $table_s['tablename']?></span>
                    </div>
                    <div> <span>&nbsp;</span></div>
                    <div class="<?=$table_status_val?>"> 
                      <span>
                       <?php if(isset($table_s['table_stime'])){?> 
                      <script>
                        var sec_<?=$table_s['table_id']?> = <?php echo $table_s['table_stime'];?>;
                        setInterval( function(){
                          secondsTimeSpanToHMS(++sec_<?=$table_s['table_id']?>,<?=$table_s['table_id']?>);
                        }, 1000);
                        </script>
                       <?php } ?>
                       <span id="hours_<?=$table_s['table_id']?>" class="hours">00</span>:<span id="minutes_<?=$table_s['table_id']?>" class="minutes">00</span>:<span id="seconds_<?=$table_s['table_id']?>" class="seconds">00</span></span></div>
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <!-- <span>
                          <a class="btn btn-app action-btn" href="<?php echo base_url() ?>table/edit/<?php echo $table_s['table_id'];?>">
                            <i class="far fa-eye"></i> 
                          </a>
                        </span> -->
                        <!-- <span>
                          <a class="btn btn-app action-btn" href="<?php echo base_url() ?>table/edit/<?php echo $table_s['table_id'];?>">
                            <i class="far fa-pencil"></i> 
                          </a>
                        </span>
                        <span>
                          <a class="btn btn-app action-btn" href="javascript:void(0);" onclick="tabledelete(<?php echo $table_s['table_id'];?>);">
                            <i class="far fa-trash-alt"></i> 
                          </a>
                        </span> -->
                        
                        <?php if($table_s['ord_status'] == 'PickedUpByWaiter'){?>
                          <span>
                            <a class="btn btn-app action-btn" href="javascript:void(0);" onclick="orderstatusupdateTable(<?=$table_s['table_id']?>,'OrderOnTable');" title="Order On Table">
                              <i class="fas fa-concierge-bell"></i> 
                            </a>
                          </span>
                        <?php } ?>
                        <?php if(($table_s['ord_status'] == 'BillPaid')||($table_s['ord_status'] == 'BillRaised')){?>
                          <span>
                            <a class="btn btn-app action-btn" href="javascript:void(0);" onclick="getorderBilltable(<?=$table_s['table_id']?>);" data-toggle="modal" data-target="#modal-default-1" >
                              <i class="fas fa-print"></i>
                            </a>
                          </span>
                          <?php }?>
                          <?php if(($table_s['ord_status'] != '')){?>
                            <span>
                              <a class="btn btn-app action-btn" href="<?php echo base_url() ?>order?table_id=<?php echo $table_s['table_id'];?>&view=view">
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
              </a>
            </div>
          
          <?php }} ?> 
          <!-- ./col -->

        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
         
      
    </section>
    <!-- /.content -->
  </div>
  <script type="text/javascript">
    function secondsTimeSpanToHMS(s,id) {
      var h = Math.floor(s / 3600); //Get whole hours
      s -= h * 3600;
      var m = Math.floor(s / 60); //Get remaining minutes
      s -= m * 60;
      $("#seconds_"+id).html((s < 10 ? '0' + s : s));
      $("#minutes_"+id).html((m < 10 ? '0' + m : m));
      $("#hours_"+id).html((h < 10 ? '0' + h : h));
// 
      // return h + ":" + (m < 10 ? '0' + m : m) + ":" + (s < 10 ? '0' + s : s); //zero padding on minutes and seconds
    }
    // var url="<?php echo base_url();?>";
    // function tabledelete(id){
    //    var r=confirm("Do you want to delete this?")
    //     if (r==true)
    //       window.location = url+"table/table_delete/"+id;
    //     else
    //       return false;
    //     } 
    </script>