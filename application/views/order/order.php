

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
<?php $i = 0; ?>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content m-0">
        <div class="container-fluid m-0">
          <div class="row m-0">
          <?php if(!isset($_REQUEST['view'])){?>
            <div class="col-lg-6 col-md-6 card">
              <div class="container p-2 d-flex">
                <form role="form" method="post" name="searcfrm" id="searcfrm">
                  <input type="text" class="form-control" id="search_item" placeholder="Select Item" onchange="getitemssearch();">
                </form>
              </div>


              <div class="row card-body">
                <div class="col-lg-3 col-md-3 ">
                  <ul class="nav nav-pills nav-sidebar flex-sidebar menu-categories ">
                  <?php  foreach($category as $category_s) { $c = 1; ?>
                    <li class="active"><a data-toggle="pill" class="btn bg-gray" role="button" id="<?php echo $category_s['category_id'];?>" onclick="getitems(<?=$category_s['category_id']?>)"  href="#<?=$category_s['category_id'].'_cat'?>"><?php echo $category_s['category']?></a>
                    </li>
                    <?php  } $c = $c + 1; ?> 
                    
                  </ul>
                </div>
                <div class="col-lg-9 col-md-9">
                  <div class="tab-content container p-2">
                    
                    <?php foreach($category as $category_s1) { ?>
                      <div id="<?=$category_s1['category_id'].'_cat'?>" class="cat_div_data tab-pane fade in">
                        
                        
                      </div>  
                    <?php }?>   
                    <div id="search_cat" class="cat_div_data tab-pane fade in">
                    </div>               
                  </div>
                </div>
              </div>
              <div>

              </div>

            </div>
          <?php }?>  
            <div class="col-lg-6 col-md-6 card">
              
                <div class="container  p-2">
                  <ul class="nav nav-tabs bg-gray" role="tablist">
                    <li class="nav-item order-type">
                      <a class="nav-link active" data-toggle="tab" href="#dinein">DINE IN </a>
                    </li>
                    <!-- <li class="nav-item order-type  ">
                      <a class="nav-link " data-toggle="tab" href="#delivery">DELIVERY</a>
                    </li>
                    <li class="nav-item order-type  ">
                      <a class="nav-link " data-toggle="tab" href="#pickup">PICK UP</a>
                    </li> -->
                  </ul>
                
                  <div class="inner bg-lightgray p-2">
                    <!-- <span><a href="#" class="btn active"><i class="fas fa-glass"></i></a></span>
                    <span><a href="#" class="btn"><i class="fas fa-stamp"></i></a></span> -->
                    <!-- <span><a href="#" class="btn"><i class="fas fa-user"></i></a></span> -->
                  </div>
                  <!-- <div id="accordion">
                    <div class="card ">
                      <div class="card-header">
                        <h4 class="card-title w-100">
                          <a class="btn" data-toggle="collapse" href="#collapseOne">
                          <i class="fas fa-user"></i>
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="collapse " data-parent="#accordion">
                        <div >
                          <div class="card-body row">          
                            <div class="col-6">
                              <div class="form-group mb-0">
                                <label for="inputSubject">Mobile / Phone No.</label>
                                <input type="text" id="mobile" name="mobile" onkeypress="return isNumber(event)" class="form-control " />
                                <input type="hidden" id="hidden-field"/>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group mb-0">
                                <label for="inputName">Name</label>
                                <input type="text" id="name" name="name" class="form-control"  />
                              </div>
                            </div>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                  
                  
                  </div> -->
                </div>
 <!-- <div class="col-12">
                              <div class="form-group mb-0">
                                <label for="inputEmail">E-Mail</label>
                                <input type="email" id="email" name="email"  class="form-control"  />
                              </div>
                            </div>
                            <div class="col-12">  
                              <div class="form-group mb-0">
                                <label for="inputMessage">Address</label>
                                <textarea id="address" name="address" class="form-control" autocomplete="off" rows="1"></textarea>
                              </div>
                            </div> -->
                            <!-- <div class="col-12">
                            <div class="tab-pane" id="tab-demo8">
                                <h3>Demo #8</h3>
                                <div class="well ">
                                    <input id="demo8" type="text" class="col-md-12 form-control" placeholder="Search cities..." autocomplete="off" />
                                </div>
                                
                            </div>
                                </div> -->
                <?php //print_r($order);?>
                <!-- Tab panes -->
                <div class="tab-content">
                  <div id="dinein" class="container tab-pane active"><br>
                    <form action="" id="manage-order-dineein">
                      <input type="hidden" name="order_type" value="dinein">
                      <?php if(isset($order[0]["status"]) && ($order[0]["status"] == "Ready")){ ?>
                        <input type="hidden" id="ord_table_id" value="<?=$order[0]["bill_id"]?>">
                      <div class="col-lg-6 col-md-6" style="float: left">
                        <div class="form-group">
                          <label for="inputMessage">Order Status</label>
                          <select class="form-control custom-select" placeholder="" name="ord_status" id="ord_status" required>
                          <!-- <option value="0">Select Order Status</option> -->
                            <?php //foreach($table as $table_d) { ?>
                              <!-- <option <?php if(isset($order[0]["status"])){if($order[0]["status"] == "RunningKOT"){?>selected<?php }}?> value="RunningKOT">RunningKOT</option>
                              <option <?php if(isset($order[0]["status"])){if($order[0]["status"] == "Cooking"){?>selected<?php }}?> value="Cooking">Cooking</option> -->
                              <option <?php if(isset($order[0]["status"])){if($order[0]["status"] == "Ready"){?>selected<?php }}?> value="Ready">Ready</option>
                              <option <?php if(isset($order[0]["status"])){if($order[0]["status"] == "Done"){?>selected<?php }}?> value="Done">Done</option>
                              
                            <?php //}?>                            
                          </select>
                                 
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6" style="float: right;margin-top: 29px;">
                        <div class="form-group">
                        <label for="inputMessage"></label>
                        <button class=" btn btn-danger mt-1" id="table_status_change">Change Status</button> 
                                      
                        </div>
                      </div>
                      <?php }?>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">

                            <label for="inputMessage">Select Table</label>
                            <select class="form-control custom-select" placeholder="" name="table_id" required>
                            <option value="0>">Select Table</option>
                              <?php foreach($table as $table_d) { ?>
                                <option <?php if(isset($_REQUEST["table_id"])){if($_REQUEST["table_id"] == $table_d['table_id']){?>selected<?php }}?> value="<?=$table_d['table_id']?>"><?=$table_d['tablename']?></option>   
                              <?php }?>                            
                            </select>
                          </div> 
                        </div>   
                        <!-- <div class="col-md-4">
                          <?php if(isset($order) && count($order)>0 && isset($_REQUEST['view'])){ ?>
                            <div class="form-group">

                              <label for="inputMessage">KOT</label>
                              <select class="form-control custom-select" placeholder="" name="table_id" required>
                                <?php foreach($order['kot'] as $kot) { ?>
                                  <option <?php if(isset($kot["kot"])){}?> value="<?=$kot["kot"]?>"><?=$kot["kot"]?></option>   
                                <?php }?>                            
                              </select>
                                          
                              </div>
                          <?php }  ?>
                        </div>             -->
                      </div>

                      
                      <table class="table table-striped" style="min-height:100px">
                        <thead>
                          <tr>
                            <th scope="col">Items</th>
                            <th scope="col">Check Items</th>
                            <th scope="col">Quantity</th>
                            <th class="text-right" scope="col">Amount</th>
                            <th class="text-right" scope="col">Price</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          if(isset($order)){
                            if(count($order)>0){?>
                              <input type="hidden" name="ord_id" id="ord_id" value="<?=$order['Id']?>">
                            <?php }else{ ?>
                              <input type="hidden" name="ord_id" id="ord_id" value="">
                            <?php } ?>
                          
                            <?php 
                            // print_r($_REQUEST);
                            if(isset($_REQUEST['view']) && isset($order['bill_item'])){
                              foreach($order['bill_item'] as $bill_i){
                                foreach($bill_i['kot'] as $ord1){ 
                                  // echo "<pre>";
                                  ?>
                                  <tr>
                                      <th colspan="4">KOT No. <?=$ord1['kot']?></th>
                                      <th colspan="4" class="text-right"><a class="btn btn-sm btn-danger" href="javascript:void(0);" onclick="print_kot(<?=$ord1['Id']?>,false);" title="Print KOT">
                                      <strong>Print KOT</strong></a></th>
                                  </tr>
                                  <?php
                                  foreach($ord1['kot_item'] as $ord){
                                    $i++;
                                    // print_r($ord);
                                    ?>
                                    <tr >
                                      <td><?=$i?></td>
                                      <td><?=$ord['item']['item_name']?></td>
                                      <td>
                                        <div>
                                          <!-- <div class="value-button btn-minus" id="decrease"  value="Decrease Value">-</div> -->
                                          <input type="number" name="qty[]" id="number" readonly value="<?=$ord['qty']?>">
                                          <!-- <div class="value-button btn-plus" id="increase"  value="Increase Value">+</div> -->
                                        </div>
                                        <input type="hidden" name="item_id[]" id="item_id_6" value="<?=$ord['item_id']?>">
                                        <input type="hidden" name="price[]" id="" value="<?=$ord['price']?>">
                                        <input type="hidden" name="amount[]" id="" value="<?=$ord['amount']?>">
                                      </td>
                                      <td align="right"><?=number_format($ord['amount'],2)?></td>
                                      <td align="right"><?=number_format($ord['price'],2)?></td>
                                      <td>&nbsp;
                                        <!-- <span class="btn btn-sm btn-danger btn-rem">
                                          <b><i class="fa fa-times text-white"></i></b>
                                        </span> -->
                                      </td>
                                    </tr>
                                    <?php 
                                  }
                                }
                              }
                            }
                          }
                        ?>
                        </tbody>
                      </table>

                      <div class="accordion " id="accordionExample">
                        <div class="card bg-gray">
                          <button class="btn btn-link bg-white collapsed order-acc " type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="fa fa-chevron-down"></i>
                          </button>
                          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            <div class="card-body" >
                              
                              <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 ">
                                  <a class="btn btn-sm btn-dark" href="javascript:void(0);"  title="Add Discount" data-toggle="modal" data-target="#modal-default-2"><strong>Add Discount</strong></a>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 float-right text-right">
                                  <span class=""><h4>Vat (<?=$tax['vat']?> %) <i class="fas fa-rupee-sign"></i> <b id="vat"></b></h4></span>
                                  <span class=""><h4>SGST  (<?=$tax['sgst']?> %) <i class="fas fa-rupee-sign"></i> <b id="SGST"> </b></h4></span>
                                  <span class=""><h4>CGST  (<?=$tax['cgst']?> %) <i class="fas fa-rupee-sign"></i> <b id="CGST"></b></h4></span>
                                  <input type="hidden" name="tax_vat" id="tax_vat" value="<?php if(isset($tax['vat'])){echo $tax['vat'];}else{echo '0';}?>">
                                  <input type="hidden" name="tax_sgst" id="tax_sgst" value="<?php if(isset($tax['sgst'])){echo $tax['sgst'];}else{echo '0';}?>">
                                  <input type="hidden" name="tax_cgst" id="tax_cgst" value="<?php if(isset($tax['cgst'])){echo $tax['cgst'];}else{echo '0';}?>">
                                  <input type="hidden" name="tax_amount" id="tax_amount" value="<?php if(isset($tax['tax_amt'])){$order['tax_amt'];}else{echo '0';}?>">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-header pb-0 pt-1 pl-1 pr-1 mt-1 mr-1 ml-1  " id="headingTwo">

                            <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                  <div class="col-lg-3 col-md-3 col-sm-12">
                                  <!-- <button class="btn btn-sm btn-danger"><strong>SPLIT</strong></button> -->
                                    <!-- <button class="btn btn-sm btn-danger" id="save_order"><strong>Save</strong></button> -->
                                    <!-- <button class="btn btn-sm btn-danger"><strong>SPLIT</strong></button>

                                    <button class="btn btn-sm btn-danger"><strong>ADVANCE ORDER</strong></button> -->
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12">
                                    <!-- <div class="form-check complimentary">
                                      <input class="form-check-input form-control-md" type="checkbox" value=""
                                        id="flexCheckDefault">
                                      <label class="form-check-label" for="">
                                        Complimentary
                                      </label>
                                    </div> -->
                                  </div>
                                  <div class="col-lg-6 col-md-6">
                                    <div class="form-check complimentary float-right text-right">
                                      <input type="hidden" name="total_amount" id="total_amount1" value="<?php if(isset($order['bill_amt'])){ echo $order['bill_amt'];}else{ ?>0.00 <?php }?>">
                                      <input type="hidden" name="g_total_amount" id="g_total_amount" value="<?php if(isset($order['total'])){ echo $order['total'];}else{ ?>0.00 <?php }?>">
                                      <input type="hidden" name="dis_per_val" id="dis_per_val" value="0">
                                      <input type="hidden" name="dis_fix_val" id="dis_fix_val" value="<?php if(isset($order['discount_amt'])){ echo $order['discount_amt'];}else{ ?>0.00 <?php }?>">
                                      <input type="hidden" name="final_dis" id="final_dis" value="<?php  if(isset($order['discount_amt'])){echo $order['discount_amt'];}else{ ?>0.00 <?php }?>">
                                              <input type="hidden" name="total_tendered" value="0">
                                              <span class=""><h4>Total <i class="fas fa-rupee-sign"></i> <b id="total_amount"> <?php if(isset($order['bill_amt'])){ if(count($order)>0){ echo number_format($order['bill_amt'],2); } }else{ ?>0.00 <?php }?></b></h4></span>
                                              <div id="if_dis_val" <?php if(isset($order['discount_amt'])&&(isset($_REQUEST['view']))){?>style="display:block" <?php }else{?> style="display:none" <?php }?>>
                                                <span class=""><h4>Discount <b id="discount_val"> <?php if(isset($order['discount_amt']) && ($order['discount_amt'] != 0)){?><i class="fas fa-rupee-sign"></i> <?php }?> <?php if(isset($order)){ if(count($order)>0){ echo number_format($order['discount_amt'],2); } }else{ ?>0.00 <?php }?></b></h4></span>
                                                <span class=""><h4>Grant Total <i class="fas fa-rupee-sign"></i> <b id="gtotal_amount"> <?php if(isset($order)){ if(count($order)>0){ echo number_format($order['total'],2); } }else{ ?>0.00 <?php }?></b></h4></span>
                                                
                                              </div>
                                              
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12 col-md-12 col-sm-12">
                                
                              </div>
                            </div>
                            <div class="row mt-2 bg-danger">
                              <div class="col-lg-1 col-md-1"></div>
                              <div class="col-lg-2 col-md-2">
                                <div class="form-check complimentary">
                                  <input class="form-check-input form-control-md payment_type"  name="payment_type" type="radio" value="Cash"
                                    id="flexCheckDefault4" checked>
                                  <label class="form-check-label" for="flexCheckDefault4">
                                    Cash
                                  </label>
                                </div>
                              </div>
                              <div class="col-lg-2 col-md-2">
                                <div class="form-check complimentary">
                                  <input class="form-check-input form-control-md payment_type" name="payment_type" type="radio" value="Card"
                                    id="flexCheckDefault3">
                                  <label class="form-check-label" for="flexCheckDefault3">
                                    Card
                                  </label>
                                </div>
                              </div>
                              <div class="col-lg-2 col-md-2">
                                <div class="form-check complimentary">
                                  <input class="form-check-input form-control-md payment_type" name="payment_type" type="radio" value="Online"
                                    id="flexCheckDefault2">
                                  <label class="form-check-label" for="flexCheckDefault2">
                                  Online
                                  </label>
                                </div>
                              </div>
                              <div class="col-lg-2 col-md-2">
                                <div class="form-check complimentary">
                                  <input class="form-check-input form-control-md payment_type" name="payment_type" type="radio" value="GPay"
                                    id="flexCheckDefault1">
                                  <label class="form-check-label" for="flexCheckDefault1">
                                    Gpay
                                  </label>
                                </div>
                              </div>
                              <!-- <div class="col-lg-2 col-md-2">
                                <div class="form-check complimentary">
                                  <input class="form-check-input form-control-md payment_type" type="radio" value=""
                                    id="flexCheckDefault">
                                  <label class="form-check-label" for="">
                                    Part
                                  </label>
                                </div>
                              </div> -->
                              <div class="col-lg-1 col-md-1"></div>

                            </div> 
                            
                          </div>
                          
                        </div>
                        <?php 
                        if(isset($_REQUEST['view']) && isset($order['Id']) && $i > 0){
                        ?>
                          <div class="card pt-2 pb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                            <a class="btn btn-sm btn-danger" href="javascript:void(0);" onclick="billstatusupdate(<?=$order['Id']?>,<?=$order['table_id']?>,'BillRaised');" title="Bill Raise">
                              <strong>Bill Raise</strong></a>
                              <a class="btn btn-sm btn-dark" href="javascript:void(0);" onclick="bill_preview(<?=$order['Id']?>);" title="Bill Print" data-toggle="modal" data-target="#modal-default-1"><strong>Bill Print</strong></a>
                              <!-- <button class="btn btn-sm btn-danger" id="save_kot"><strong>KOT</strong></button>
                              <button class="btn btn-sm btn-dark" id="kot_print"><strong>KOT & Print</strong></button> -->
                              <a class="btn btn-sm btn-danger float-right"" href="javascript:void(0);" onclick="billpaiedupdate(<?=$order['Id']?>,<?=$order['table_id']?>);" title="Bill pay">
                              <strong>Bill pay</strong></a>
                            </div>
                          </div>
                        <?php }else if(!isset($_REQUEST['view'])){ ?>
                          <div class="card pt-2 pb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                            
                              <!-- <button class="btn btn-sm btn-danger" id="save_order"><strong>Save</strong></button>
                              <button class="btn btn-sm btn-dark" id="save_print"><strong>Save & Print</strong></button> -->
                              <button class="btn btn-sm btn-danger" id="save_kot"><strong>KOT</strong></button>
                              <button class="btn btn-sm btn-dark" id="kot_print"><strong>KOT & Print</strong></button>
                              
                              <!-- 

                              <button class="btn btn-sm btn-danger"><strong>ADVANCE ORDER</strong></button> -->
                            </div>
                          </div>
                        <?php } ?>  
                      </div>
                    </form>



                  </div>
                  <div id="delivery" class="container tab-pane fade"><br>
                    <form action="" id="manage-order-delivery">
                        <input type="hidden" name="order_type" value="delivery">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Items</th>
                              <th scope="col">Check Items</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Price</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                        <div class="no-items">
                          <img class="img-responsive " src="dist/img/forkspoon.png" alt="">
                          <h4>No Items Selected</h4>
                          <p>Please select item from Left Menu Item</p>
                        </div>
                    </form>    
                  </div>
                  <div id="pickup" class="container tab-pane fade"><br>
                    <form action="" id="manage-order-delivery">
                      <input type="hidden" name="order_type" value="pickup">
                    </form>
                  </div>
                </div>
                
            </div>

          </div>
        </div>
    </div>
  


  

  <!-- Modal -->
  <div class="modal" id="addon" tabindex="-1" role="dialog" aria-labelledby="Addon" aria-hidden="true">
    <div class="modal-dialog modal-fade" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenteredLabel">Kaju Paneer Platter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div>
            <h4><strong>Choice Of Bread</strong></h4>
            <div class="row inner d-flex p-1">
              <div class="col-sm-3">
                <button id="add-ons " class="btn btn-sm bg-light m-1">Tawa Paratha <span id="id" class="veglogo"> 1
                  </span></button>
                <!-- <button id="add-ons " class="btn btn-sm bg-light m-1">Tawa Paratha <span id="id" class="veglogo"> 1 </span></button> -->
                <form>
                  <div class="value-button vlu-btn" id="increase"  value="Increase Value" style="width: 100px; position:absolute; background-color: #dedede;">Tawa Paratha</div>
                  <input type="number" id="number" value="0" style="position: relative; border: 1px solid #000; top: -10px;left: 90px; width: 20px; height: 20px;background: grey;"" />
                  <div class="value-button" id="decrease"  value="Decrease Value" style="padding: 0px; position: absolute; border: 1px solid #000; bottom: 1px; left: 96px; width: 20px; height: 20px; border-radius: 0; background: grey;">-</div>
                </form>
              
              </div>
              <div class="col-sm-3">
                <button id="add-ons " class="btn btn-sm bg-light m-1">Tawa Paratha</button>
              </div>
              <div class="col-sm-3">
                <button id="add-ons " class="btn btn-sm bg-light m-1">Tawa Paratha</button>
              </div>
              <div class="col-sm-3">
                <button id="add-ons " class="btn btn-sm bg-light m-1">Tawa Paratha</button>
              </div>
              <div class="col-sm-3">
                <button id="add-ons " class="btn btn-sm bg-light m-1">Tawa Paratha</button>
              </div>
              <div class="col-sm-3">
                <button id="add-ons " class="btn btn-sm bg-light m-1">Tawa Paratha</button>
              </div>
              <div class="col-sm-3">
                <button id="add-ons " class="btn btn-sm bg-light m-1">Tawa Paratha</button>
              </div>
              <div class="col-sm-3">
                <button id="add-ons " class="btn btn-sm bg-light m-1">Tawa Paratha</button>
              </div>
            </div>
          </div>
          <div>
            <h4>Choice of Drinks</h4>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
  
  <div style="display:none" id=customer_data>
<?php
print_r($customer);
?>
</div>
  
  
<script>
function getitemssearch(){

  var s_data = $('#search_item').val();
  $('.cat_div_data').removeClass('active');
  $('.cat_div_data').removeClass('show');
  url = '<?php echo base_url()."order/getItemsbysearch/" ?>';
  var html = '<div class="row p-2">';     
  $.ajax({
        method: "POST",
        url: url,
        data:{search: s_data},
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        success:function(data){
            //alert(data);
            console.log(data.items[0].cat_id)
            var item = data.items;
            
            $.each(item, function(k, v) {
              console.log(v.cat_id);

              html += '<div class="col-md-3 col-lg-3">';
              html += "<span data-json = '"+JSON.stringify(v)+"'>";
              html += '<a onclick="additem_table('+v.item_id+');" id="additem_'+v.item_id+'" class="btn bg-white items-btn" role="button" data-prod-id="'+v.item_id+'">';
              html += '<i class="far fa-dot-circle veglogo"></i> '+v.item_name;
              html += '</a>';
              html += '</span>';
              html += '</div>'
                /// do stuff
            });
            html += '</div>';
            $('#'+id+'_cat').html(html);
            //$('#'+id+'_cat').toggle();
            $('#'+id+'_cat').addClass('active');
            $('#'+id+'_cat').addClass('show');
            //data.items.forEach(element => console.log(element));
        },
        error:function (data){
            alert("failed");
        }
      });
}
function getitems(id){

    butId = $(this).attr('id');
    $('.cat_div_data').removeClass('active');
    $('.cat_div_data').removeClass('show');
    $('#'+id+'_cat').html('');
    url = '<?php echo base_url()."order/getItemsbycategory/" ?>'+id;
    var html = '<div class="row p-2">';     
    $.ajax({
          method: "GET",
          url: url,
          dataType: 'json',
          processData: false,
          contentType: false,
          success:function(data){
              //alert(data);
              console.log(data.items[0].cat_id)
              var item = data.items;
              
              $.each(item, function(k, v) {
                console.log(v.cat_id);

                html += '<div class="col-md-3 col-lg-3">';
                html += "<span data-json = '"+JSON.stringify(v)+"'>";
                html += '<a onclick="additem_table('+v.item_id+');" id="additem_'+v.item_id+'" class="btn bg-white items-btn" role="button" data-prod-id="'+v.item_id+'">';
                html += '<i class="far fa-dot-circle veglogo"></i> '+v.item_name;
                html += '</a>';
                html += '</span>';
                html += '</div>'
                  /// do stuff
              });
              html += '</div>';
              $('#'+id+'_cat').html(html);
              //$('#'+id+'_cat').toggle();
              $('#'+id+'_cat').addClass('active');
              $('#'+id+'_cat').addClass('show');
              //data.items.forEach(element => console.log(element));
          },
          error:function (data){
              alert("failed");
          }
        });
}
function additem_table(idd){
  console.log(idd)
        var data = $('#additem_'+idd).parent('span').attr('data-json')
       
            data = JSON.parse(data)
        if($('#dinein tr[data-id="'+data.item_id+'"]').length > 0){
            var tr = $('#dinein tr[data-id="'+data.item_id+'"]')
            var qty = tr.find('[name="qty[]"]').val();
                qty = parseInt(qty) + 1;
                qty = tr.find('[name="qty[]"]').val(qty).trigger('change')
                calc()
            return false;
        }
        var tr = $('<tr class="o-item"></tr>')
        tr.attr('data-id',data.item_id)
        tr.append('<td>'+data.item_id+'</td>')
        tr.append('<td>'+data.item_name+'</td>')
        tr.append('<td><div><div class="value-button btn-minus" id="decrease" value="Decrease Value">-</div><input type="number" name="qty[]" id="number" value="1" /><div class="value-button btn-plus" id="increase"  value="Increase Value">+</div></div><input type="hidden" name="item_id[]" id="item_id_'+data.item_id+'" value="'+data.item_id+'"><input type="hidden" name="price[]" id="" value="'+data.price+'"><input type="hidden" name="amount[]" id="" value="'+data.price+'"></td>')
        tr.append('<td>'+data.price+'</td>')
        tr.append('<td><span class="btn btn-sm btn-danger btn-rem"><b><i class="fa fa-times text-white"></i></b></span></td>')
        $('#dinein tbody').append(tr)
        qty_func()
        calc()
}
function qty_func(){
         $('#dinein .btn-minus').click(function(){
            var qty = $(this).siblings('input').val()
                qty = qty > 1 ? parseInt(qty) - 1 : 1;
                $(this).siblings('input').val(qty).trigger('change')
                calc()
         })
         $('#dinein .btn-plus').click(function(){
            var qty = $(this).siblings('input').val()
                qty = parseInt(qty) + 1;
                $(this).siblings('input').val(qty).trigger('change')
                calc()
         })
         $('#dinein .btn-rem').click(function(){
            $(this).closest('tr').remove()
            calc()
         })
         
}
function calc(){
         $('[name="qty[]"]').each(function(){
            $(this).change(function(){
                var tr = $(this).closest('tr');
                var qty = $(this).val();
                var price = tr.find('[name="amount[]"]').val()
                var amount = parseFloat(qty) * parseFloat(price);
                    tr.find('[name="price[]"]').val(amount)
                    tr.find('.amount').text(parseFloat(amount).toLocaleString("en-IN",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))
                
            })
         })
         var total = 0;
         $('[name="price[]"]').each(function(){
            total = parseFloat(total) + parseFloat($(this).val()) 
         })
            console.log(total)
        var tax_vat = $('#tax_vat').val();
        var vat = tax_vat/100*total;
        $('#vat').text(parseFloat(vat).toLocaleString("en-IN",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))
        var tax_cgst = $('#tax_cgst').val();
        var cgst = tax_cgst/100*total;
        $('#CGST').text(parseFloat(cgst).toLocaleString("en-IN",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))
        var tax_sgst = $('#tax_sgst').val();
        var sgst = tax_sgst/100*total;
        $('#SGST').text(parseFloat(sgst).toLocaleString("en-IN",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))
        var tax = vat + cgst + sgst;
        $('#tax_amount').val(tax);
        // total = total + tax;
        if($("#dis_per_val").val() != 0){
          $("#if_dis_val").show();
          var dis = $("#dis_per_val").val()/100;
          var dis_val = total - (total * dis);
          $('#final_dis').val(total * dis);
          $('#discount_val').text($("#dis_per_val").val()+' %');
          $('#gtotal_amount').text(parseFloat(dis_val + tax).toLocaleString("en-IN",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))
          $('[name="g_total_amount"]').val(dis_val + tax);
        }else if($("#dis_fix_val").val() != 0){
          $("#if_dis_val").show();
          var dis = $("#dis_fix_val").val();
          var dis_val = total - dis;
          $('#final_dis').val(dis);
          $('#discount_val').html('<i class="fas fa-rupee-sign"></i><b> '+parseFloat(dis).toLocaleString("en-IN",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2})+'</b>')
          // $('#discount_val').text('<i class="fas fa-rupee-sign">'+parseFloat(dis).toLocaleString("en-IN",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}));
          $('#gtotal_amount').text(parseFloat(dis_val + tax).toLocaleString("en-IN",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}));
          $('[name="g_total_amount"]').val(dis_val + tax);
          
        }else{
          $('[name="g_total_amount"]').val(total + tax);
          $('#gtotal_amount').text(parseFloat(total + tax).toLocaleString("en-IN",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}));
        }
        $('[name="total_amount"]').val(total);
        $('#total_amount').text(parseFloat(total).toLocaleString("en-IN",{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))
        
}
function cat_func(){
    $('.cat-item').click(function(){
            var id = $(this).attr('data-id')
            console.log(id)
            if(id == 'all'){
                $('.prod-item').parent().toggle(true)
            }else{
                $('.prod-item').each(function(){
                    if($(this).attr('data-category-id') == id){
                        $(this).parent().toggle(true)
                    }else{
                        $(this).parent().toggle(false)
                    }
                })
            }
    })
}


        
        

        
</script>
