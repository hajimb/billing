<?php 
// echo "<br>table_id:".$table_id;
// echo "<br>bill_id:".$bill_id;
// echo "<pre>";
// print_r($order); 
?>
<?php $i = 0; ?>
<?php //echo "<pre>"; print_r($order);?>
<div class="content-wrapper">
    <section class="content m-0">
        <div class="container-fluid m-0">
          <div class="row m-0">
            <div class="col-lg-6 col-md-6 card">
                <div class="container  p-2">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-warning active">
                            <input type="radio" name="options" id="option_a1" autocomplete="off" checked> Dine In
                        </label>
                        <label class="btn btn-warning">
                            <input type="radio" name="options" id="option_a2" autocomplete="off"> Delivery
                        </label>
                        <label class="btn btn-warning">
                            <input type="radio" name="options" id="option_a3" autocomplete="off"> Pick up
                        </label>
                        <label class="btn btn-warning">
                            <input type="radio" name="options" id="option_a4" autocomplete="off"> Online
                        </label>
                    </div>
                <div class="tab-content">
                    <div id="dinein" class="container tab-pane active"><br>
                        <form role="form" method="post" name="mainfrm" id="mainfrm">      
                        <!-- <form action="" id="manage-order-dineein"> -->
                            <input type="hidden" name="order_type" value="dinein">
                            <?php  if(isset($order) && count($order)>0){?>
                            <input type="hidden" name="ord_id" id="ord_id" value="<?=$order['Id']?>">
                            <?php }else{ ?>
                            <input type="hidden" name="ord_id" id="ord_id" value="">
                            <?php } ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?= $table[0]['tablename']; ?></label>
                                    </div>
                                </div>  
                                <div class="col-md-12" id="dinein">
                                    <table class="table table-striped" style="min-height:100px">
                                        <thead>
                                            <tr>
                                                <th scope="col">Items</th>
                                                <th scope="col">Check Items</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Instruction</th>
                                                <th class="text-right" scope="col">Amount</th>
                                                <th class="text-right" scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        if(isset($order['bill_item'])){
                                            foreach($order['bill_item'] as $bill_i){
                                                foreach($bill_i['kot'] as $ord1){ 
                                                    if(count($ord1['kot_item'])>0){ ?>
                                                        <tr>
                                                            <th colspan="4">KOT No. <?=$ord1['kot']?></th>
                                                            <th colspan="4" class="text-right"><a class="btn btn-sm btn-danger" href="javascript:void(0);" onclick="print_kot(<?=$ord1['Id']?>,false);" title="Print KOT">
                                                            <strong>Print KOT</strong></a></th>
                                                        </tr>
                                                        <?php
                                                        foreach($ord1['kot_item'] as $ord){
                                                            $i++;
                                                            ?>
                                                            <tr >
                                                            <td><?=$i?></td>
                                                            <td><?=$ord['item']['item_name']?></td>
                                                            <td>
                                                                <div>
                                                                <!-- <div class="value-button btn-minus" id="decrease"  value="Decrease Value">-</div> -->
                                                                <input type="number" name="qty1[]" class="number" readonly value="<?=$ord['qty']?>">
                                                                <!-- <div class="value-button btn-plus" id="increase"  value="Increase Value">+</div> -->
                                                                </div>
                                                                <input type="hidden" name="item_id[]" id="item_id_6" value="<?=$ord['item_id']?>">
                                                                <input type="hidden" name="price[]" id="" value="<?=$ord['price']?>">
                                                                <input type="hidden" name="amount[]" id="" value="<?=$ord['amount']?>">
                                                            </td>
                                                            <td><?= $ord['instruction'];?></td>
                                                            <td class="text-right"><?=number_format($ord['amount'],2)?></td>
                                                            <td class="text-right"><?=number_format($ord['price'],2)?></td>
                                                            </tr>
                                                        <?php 
                                                        }
                                                    }
                                                }
                                            }
                                        } ?>
                                        </tbody>
                                    </table>
                                    <div class="accordion " id="accordionExample">
                                        <div class="card bg-gray">
                                            <button class="btn btn-link bg-white collapsed order-acc " type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <i class="fa fa-chevron-down"></i>
                                            </button>
                                            <div class="card-header pb-0 pt-1 pl-1 pr-1 mt-1 mr-1 ml-1  " id="headingTwo">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                                    <?php if($order['status'] != 'BillRaised' && $order['status'] != 'BillPaid'){ ?>
                                                        <a class="btn btn-sm btn-dark" href="javascript:void(0);" title="Add Discount" data-toggle="modal" data-target="#modal-default-2"><strong>Add Discount</strong></a>
                                                    <?php } ?>           
                                                        <input type="hidden" name="tax_id" id="tax_id" value="<?= (isset($tax['tax_id']) ? $tax['tax_id'] : '0');?>">
                                                        <input type="hidden" name="vat_percent" id="vat_percent" value="<?= (isset($tax['vat']) ? $tax['vat'] : '0');?>">
                                                        <input type="hidden" name="sgst_percent" id="sgst_percent" value="<?= (isset($tax['sgst']) ? $tax['sgst'] : '0');?>">
                                                        <input type="hidden" name="cgst_percent" id="cgst_percent" value="<?= (isset($tax['cgst']) ? $tax['cgst'] : '0');?>">
                                                        
                                                        <input type="hidden" name="vat_amt" id="vat_amt" value="<?= (isset($order['vat_amt']) ? $order['vat_amt'] : '0');?>">
                                                        <input type="hidden" name="sgst_amt" id="sgst_amt" value="<?= (isset($order['sgst_amt']) ? $order['sgst_amt'] : '0');?>">
                                                        <input type="hidden" name="cgst_amt" id="cgst_amt" value="<?= (isset($order['cgst_amt']) ? $order['cgst_amt'] : '0');?>">

                                                        <input type="hidden" name="tax_amt" id="tax_amt" value="<?= (isset($order['tax_amt']) ? $order['tax_amt'] : '0');?>">

                                                        <input type="hidden" name="sub_total" id="sub_total" value="<?= (isset($order['sub_total']) ? $order['sub_total'] : '0.00'); ?>">
                                                        <input type="hidden" name="total" id="total" value="<?= (isset($order['total']) ? $order['total'] : '0.00'); ?>">
                                                        
                                                        <input type="hidden" name="discount_id" id="discount_id" value="<?= (isset($order['discount_id']) ? $order['discount_id'] : '0'); ?>">
                                                        <input type="hidden" name="discount_percent" id="discount_percent" value="<?= (isset($order['discount_percent']) ? $order['discount_percent'] : '0'); ?>">
                                                        <input type="hidden" name="discount_amt" id="discount_amt" value="<?= (isset($order['discount_amt']) ? $order['discount_amt'] : '0'); ?>">
                                                        
                                                        <input type="hidden" name="grand_total" id="grand_total" value="<?= (isset($order['grand_total']) ? $order['grand_total'] : '0.00'); ?>">
                                                        <input type="hidden" name="dis_per_val" id="dis_per_val" value="<?= (isset($order['discount_percent']) ? $order['discount_percent'] : '0'); ?>">
                                                        <input type="hidden" name="dis_fix_val" id="dis_fix_val" value="<?= (isset($order['discount_amt']) ? $order['discount_amt'] : '0'); ?>">
                                                        <input type="hidden" name="totalitem"   id="totalitem" value="<?= (isset($order['items']) ? $order['items'] : '0'); ?>">
                                                        <input type="hidden" name="prev_sub_total" id="prev_sub_total" value="<?= (isset($order['sub_total']) ? $order['sub_total'] : '0.00'); ?>">
                                                        <input type="hidden" name="prev_totalitem"   id="prev_totalitem" value="<?= (isset($order['items']) ? $order['items'] : '0'); ?>">
                                                        <input type="hidden" name="status" id="status" value="">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-check complimentary float-right text-right">
                                                            <span class="">
                                                                <h4>Sub Total <i class="fas fa-rupee-sign"></i> <b id="span_sub_total"></b></h4>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-12 ">
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-check complimentary float-right text-right">
                                                                <span class="">
                                                                    <h4>Vat (<span id="span_vat_percent"></span> %) <i class="fas fa-rupee-sign"></i> <b id="span_vat_amt"></b></h4>
                                                                </span>
                                                                <span class="">
                                                                    <h4>SGST (<span id="span_sgst_percent"></span> %) <i class="fas fa-rupee-sign"></i> <b id="span_sgst_amt"> </b></h4>
                                                                </span>
                                                                <span class="">
                                                                    <h4>CGST (<span id="span_cgst_percent"></span> %) <i class="fas fa-rupee-sign"></i> <b id="span_cgst_amt"></b></h4>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-header pb-0 pt-1 pl-1 pr-1 mt-1 mr-1 ml-1  " id="headingTwo">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-check complimentary float-right text-right">
                                                            <span class="">
                                                                <h4>Total <i class="fas fa-rupee-sign"></i> <b id="span_total"></b></h4>
                                                            </span>
                                                            <span class="">
                                                                <h4>Discount <span id="span_discount_percent" style="display:none;"></span> <i class="fas fa-rupee-sign"></i> <b id="span_discount_amt"></b></h4>
                                                            </span>
                                                            <span class="">
                                                                <h4>Grant Total <i class="fas fa-rupee-sign"></i> <b id="span_grand_total"></b></h4>
                                                            </span>
                                                        </div>
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
                                                        <input class="form-check-input form-control-md payment_type" name="payment_type" type="radio" value="UPI"
                                                            id="flexCheckDefault1">
                                                        <label class="form-check-label" for="flexCheckDefault1">
                                                            UPI
                                                        </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1 col-md-1"></div>
                                                </div> 
                                            </div>
                                        </div>
                                        <?php 
                                        if(isset($order['Id']) && $i > 0){
                                        ?>
                                        <div class="card pt-2 pb-2">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                            <?php if($order['status'] != 'BillRaised' && $order['status'] != 'BillPaid'){ ?>
                                                <a class="btn btn-sm btn-danger" href="javascript:void(0);" onclick="RaiseBill(<?=$order['Id']?>,<?=$order['table_id']?>,'BillRaised');" title="Bill Raise">
                                                <strong>Bill Raise</strong></a>
                                            <?php } ?>
                                            <a class="btn btn-sm btn-dark" href="javascript:void(0);" onclick="bill_preview(<?=$order['Id']?>);" title="Bill Print" data-toggle="modal" data-target="#modal-default-1"><strong>Bill Print</strong></a>
                                            <!-- <button class="btn btn-sm btn-danger" id="save_kot"><strong>KOT</strong></button>
                                            <button class="btn btn-sm btn-dark" id="kot_print"><strong>KOT & Print</strong></button> -->
                                            <?php if($order['status'] != 'BillPaid'){ ?>
                                                <a class="btn btn-sm btn-danger float-right"" href="javascript:void(0);" onclick="billpaiedupdate(<?=$order['Id']?>,<?=$order['table_id']?>);" title="Bill pay">
                                                <strong>Bill pay</strong></a>
                                            <?php } ?>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>