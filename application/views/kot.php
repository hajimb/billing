<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">KOT Listing</h1>
            <div class="legend">
      <!-- <button class="btn bg-gray">Move KOT / Items</button> -->
      <span class="legend-span"><i class="fas fa-circle text-yellow"></i>  New order</span>
      <span class="legend-span"><i class="fas fa-circle text-danger "></i>  In Cooking</span>
      <span class="legend-span"><i class="fas fa-circle text-green"></i> Order Ready</span>
    </div>
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
   <?php
  // echo "<pre>Order : ";
  // print_r($order);
  // echo "<hr> Order New : ";
  // print_r($order_new);


   ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
        <!-- <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-5 col-md-5"></div>
                    <div class=" col-lg-7 col-md-7">
                        <div class="legend">
                          <span class="legend-span"><i class="fas fa-circle white-dot"></i>Used in Bill</span>
                          <span class="legend-span"><i class="fas fa-circle green-dot"></i> Active</span>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row p-2">
            <?php 
        // echo "<pre>";
        // print_r($order);
        // echo "</pre>";
          foreach($order_new as $order_dd) {
          ?>
          
            <div class="col-lg-3 col-md-3  col-sm-6 ">
              <!-- <a href="<?php echo base_url() ?>order?table_id=<?= $table_s['table_id']?>"> -->
                <!-- small box -->
                <div class="small-box hotel-tab-kot  blank-tab ">
                  <div class="inner text-left border-bottom bg-warning" style="border-top-left-radius: 10px; border-top-right-radius:10px;"> 
                      <div class="row">
                        <div class="col-md-6">
                          <strong><span><?php echo $order_dd['tablename']?></span></strong>
                  
                        </div>
                      </div>
                    </div>
                  <div class="inner text-left hotel-kot">
                    
                    <?php
                      // $query = $this->db->query("select * from bill_head b where b.table_id = '".$table_s['table_id']."' and b.is_active = 1 order by Id DESC ");
                      // $result = $query->result_array();
                      // print_r($result);
                    ?>
                    <div class="row">
                      <div class="col-md-12  border-bottom">
                      <div class="row">
                    <div class="col-md-5 col-sm-5"> <strong><span>Token No:</span></strong></div>
                    <div class="col-md-3 col-sm-3 text-left "> <strong><?= $order_dd['kot']?></strong></div>
                    </div></div>
                    <!-- <div class="col-md-9 col-sm-9"> <strong><span>#<?= $order_dd['kot']?></span></strong></div>
                    <div class="col-md-3 col-sm-3 text-right"> <strong><span class="text-right">Qty</span></strong></div> -->
                    
                      
                    <?php foreach($order_dd['ord'] as $ord){?>
                      <div class="col-md-4 col-sm-4"><span><?= $ord['item_name']?></span></div>
                      <div class="col-md-2 col-sm-2 text-center"><span><?= $ord['qty']?></span></div>
                      <div class="col-md-6 col-sm-6 text-right"><span><?= $ord['instruction']?></span></div>
                    <?php }?>
                    </div>
                    <div> <span>&nbsp;<?php //echo $table_s['diff']?></span></div>
                    
                  </div>
                  <div class="row">
                  <div class="col-md-12 col-sm-12 text-center">
                    <!-- <span>
                      <a class="btn btn-app action-btn" href="<?php echo base_url() ?>table/edit/<?php echo $table_s['table_id'];?>">
                        <i class="far fa-eye"></i> 
                      </a>
                    </span> -->
                    <span>
                      <button class="btn btn-app action-btn" onclick="orderstatusupdate(<?=$order_dd['bill_id']?>,<?=$order_dd['table_id']?>,<?=$order_dd['Id']?>,'InCooking');" >
                      <i class="fas fa-check-square"></i>
                    </button>
                    </span>
                    <span>
                      <button class="btn btn-app action-btn" onclick="orderstatusupdate(<?=$order_dd['bill_id']?>,<?=$order_dd['table_id']?>,<?=$order_dd['Id']?>,'KitchenReject');" >
                      <i class="far fa-window-close"></i>
                      </button>
                    </span>
                  </div>
                </div>
                </div>
                
              <!-- </a> -->
            </div>
          
          <?php } ?> 
        <?php 
        // echo "<pre>";
        // print_r($order);
        // echo "</pre>";
          foreach($order as $order_d) {
            if($order_d['status'] == 'OrderReady'){
          ?>
          
            <div class="col-lg-3 col-md-3  col-sm-6 ">
              <!-- <a href="<?php echo base_url() ?>order?table_id=<?= $table_s['table_id']?>"> -->
                <!-- small box -->
                <div class="small-box hotel-tab-kot  blank-tab ">
                <div class="inner text-left border-bottom bg-success" style="border-top-left-radius: 10px; border-top-right-radius:10px;"> <div class="row">
                        <div class="col-md-6">
                          <strong><span><?php echo $order_d['tablename']?></span></strong>
                  
                        </div>
                      </div></div>
                  <div class="inner text-left hotel-kot">
                    
                    <?php
                      // $query = $this->db->query("select * from bill_head b where b.table_id = '".$table_s['table_id']."' and b.is_active = 1 order by Id DESC ");
                      // $result = $query->result_array();
                      // print_r($result);
                    ?>
                    <div class="row">
                    <div class="col-md-12  border-bottom">
                      <div class="row">
                    <div class="col-md-5 col-sm-5"> <strong><span>Token No:</span></strong></div>
                    <div class="col-md-3 col-sm-3 text-left "> <strong><?= $order_d['kot']?></strong></div>
                    </div></div>
                    
                      
                    <?php foreach($order_d['ord'] as $ord){?>
                      <div class="col-md-4 col-sm-4"><span><?= $ord['item_name']?></span></div>
                      <div class="col-md-2 col-sm-2 text-center"><span><?= $ord['qty']?></span></div>
                      <div class="col-md-6 col-sm-6 text-right"><span><?= $ord['instruction']?></span></div>

                    <?php }?>
                    </div>
                    <div> <span>&nbsp;<?php //echo $table_s['diff']?></span></div>
                    
                  </div>
                  <div class="row">
                      <div class="col-md-12 col-sm-12 text-center">
                        <!-- <span>
                          <a class="btn btn-app action-btn" href="<?php echo base_url() ?>table/edit/<?php //echo $table_s['table_id'];?>">
                            <i class="far fa-eye"></i> 
                          </a>
                        </span> -->
                        <span>
                        <button class="btn btn-app action-btn" onclick="orderstatusupdate(<?=$order_d['bill_id']?>,<?=$order_d['table_id']?>,<?=$order_d['Id']?>,'PickedUpByWaiter');" >
                          <i class="fas fa-utensils"></i> 
                          </button>
                        </span>
                        
                      </div>
                    </div>
                </div>
              <!-- </a> -->
            </div>
          
          <?php }} ?> 
          <?php 
        // echo "<pre>";
        // print_r($order);
        // echo "</pre>";
          foreach($order as $order_d) {
            if($order_d['status'] == 'InCooking'){
          ?>
          
            <div class="col-lg-3 col-md-3  col-sm-6 ">
              <!-- <a href="<?php echo base_url() ?>order?table_id=<?= $table_s['table_id']?>"> -->
                <!-- small box -->
                <div class="small-box hotel-tab-kot  blank-tab ">
                <div class="inner text-left border-bottom bg-danger" style="border-top-left-radius: 10px; border-top-right-radius:10px;"><div class="row">
                        <div class="col-md-6">
                          <strong><span><?php echo $order_d['tablename']?></span></strong>
                  
                        </div>
                      </div></div>
                  <div class="inner text-left hotel-kot">
                    
                    <?php
                      // $query = $this->db->query("select * from bill_head b where b.table_id = '".$table_s['table_id']."' and b.is_active = 1 order by Id DESC ");
                      // $result = $query->result_array();
                      // print_r($result);
                    ?>
                    <div class="row">
                    <div class="col-md-12  border-bottom">
                      <div class="row">
                    <div class="col-md-5 col-sm-5"> <strong><span>Token No:</span></strong></div>
                    <div class="col-md-3 col-sm-3 text-left "> <strong><?= $order_d['kot']?></strong></div>
                    </div></div>
                    
                      
                    <?php foreach($order_d['ord'] as $ord){?>
                      <div class="col-md-4 col-sm-4"><span><?= $ord['item_name']?></span></div>
                      <div class="col-md-2 col-sm-2 text-center"><span><?= $ord['qty']?></span></div>
                      <div class="col-md-6 col-sm-6 text-right"><span><?= $ord['instruction']?></span></div>
                    <?php }?>
                    </div>
                    <div> <span>&nbsp;<?php //echo $table_s['diff']?></span></div>
                    
                  </div>
                  <div class="row">
                      <div class="col-md-12 col-sm-12 text-center">
                        <!-- <span>
                          <a class="btn btn-app action-btn" href="<?php echo base_url() ?>table/edit/<?php //echo $table_s['table_id'];?>">
                            <i class="far fa-eye"></i> 
                          </a>
                        </span> -->
                        
                        <span>
                        <button class="btn btn-app action-btn" onclick="orderstatusupdate(<?=$order_d['bill_id']?>,<?=$order_d['table_id']?>,<?=$order_d['Id']?>,'OrderReady');" >
                          <i class="fas fa-concierge-bell"></i> 
                          </button>
                        </span>
                        
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
            
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="kot_item_detail">
          <p>One fine body&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id = "kot_status_change">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>