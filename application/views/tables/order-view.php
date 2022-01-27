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
                        <form action="" id="manage-order-dineein">
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
                                                <th class="text-right" scope="col">Amount</th>
                                                <th class="text-right" scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        if(isset($order['bill_item'])){
                                            foreach($order['bill_item'] as $bill_i){
                                                    foreach($bill_i['kot'] as $ord1){ ?>
                                                    <tr>
                                                        <th colspan="4">KOT No. <?=$ord1['kot']?></th>
                                                        <th colspan="4" class="text-right"><a class="btn btn-sm btn-danger" href="javascript:void(0);" onclick="print_kot(<?=$ord1['Id']?>);" title="Print KOT">
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
                                                            <input type="number" name="qty[]" class="number" readonly value="<?=$ord['qty']?>">
                                                            <!-- <div class="value-button btn-plus" id="increase"  value="Increase Value">+</div> -->
                                                            </div>
                                                            <input type="hidden" name="item_id[]" id="item_id_6" value="<?=$ord['item_id']?>">
                                                            <input type="hidden" name="price[]" id="" value="<?=$ord['price']?>">
                                                            <input type="hidden" name="amount[]" id="" value="<?=$ord['amount']?>">
                                                        </td>
                                                        <td class="text-right"><?=number_format($ord['amount'],2)?></td>
                                                        <td class="text-right"><?=number_format($ord['price'],2)?></td>
                                                        </tr>
                                                    <?php 
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
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-12 ">
                                                            <a class="btn btn-sm btn-dark" href="javascript:void(0);" title="Add Discount" data-toggle="modal" data-target="#modal-default-2"><strong>Add Discount</strong></a>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12 float-right text-right">
                                                            <span class="">
                                                                <h4>Vat (<?= $tax['vat'] ?> %) <i class="fas fa-rupee-sign"></i> <b id="vat"></b></h4>
                                                            </span>
                                                            <span class="">
                                                                <h4>SGST (<?= $tax['sgst'] ?> %) <i class="fas fa-rupee-sign"></i> <b id="SGST"> </b></h4>
                                                            </span>
                                                            <span class="">
                                                                <h4>CGST (<?= $tax['cgst'] ?> %) <i class="fas fa-rupee-sign"></i> <b id="CGST"></b></h4>
                                                            </span>
                                                            <input type="hidden" name="tax_vat" id="tax_vat" value="<?= ($tax['vat'] ? $tax['vat'] : '0');?>">
                                                            <input type="hidden" name="tax_sgst" id="tax_sgst" value="<?= ($tax['sgst'] ? $tax['sgst'] : '0');?>">
                                                            <input type="hidden" name="tax_cgst" id="tax_cgst" value="<?= ($tax['cgst'] ? $tax['cgst'] : '0');?>">
                                                            <input type="hidden" name="tax_amount" id="tax_amount" value="<?= ($order['tax_amt'] ? $order['tax_amt'] : '0');?>">
                                                            <input type="hidden" name="total_amount" id="total_amount1" value="<?= ($order['bill_amt'] ? $order['bill_amt'] : '0.00'); ?>">
                                                            <input type="hidden" name="g_total_amount" id="g_total_amount" value="<?= ($order['total'] ? $order['total'] : '0.00'); ?>">
                                                            <input type="hidden" name="dis_per_val" id="dis_per_val" value="0">
                                                            <input type="hidden" name="dis_fix_val" id="dis_fix_val" value="<?= ($order['discount_amt'] ? $order['discount_amt'] : '0.00' ); ?>">
                                                            <input type="hidden" name="final_dis" id="final_dis" value="<?= ($order['discount_amt'] ? $order['discount_amt'] : '0.00');?>">
                                                            <input type="hidden" name="total_tendered" value="0">
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
                                                                <h4>Total <i class="fas fa-rupee-sign"></i> <b id="total_amount"> <?php if (isset($order['bill_amt'])) {
                                                                                                                                            if (count($order) > 0) {
                                                                                                                                                echo number_format($order['bill_amt'], 2);
                                                                                                                                            }
                                                                                                                                        } else { ?>0.00 <?php } ?></b></h4>
                                                            </span>
                                                            <div id="if_dis_val">
                                                                <span class="">
                                                                    <h4>Discount <b id="discount_val"> <?php if (isset($order['discount_amt']) && ($order['discount_amt'] != 0)) { ?><i class="fas fa-rupee-sign"></i> <?php } ?> <?php if (isset($order)) {
                                                                                                                                                                                                                                            if (count($order) > 0) {
                                                                                                                                                                                                                                                echo number_format($order['discount_amt'], 2);
                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                        } else { ?>0.00 <?php } ?></b></h4>
                                                                </span>
                                                                <span class="">
                                                                    <h4>Grant Total <i class="fas fa-rupee-sign"></i> <b id="gtotal_amount"> <?php if (isset($order)) {
                                                                                                                                                        if (count($order) > 0) {
                                                                                                                                                            echo number_format($order['total'], 2);
                                                                                                                                                        }
                                                                                                                                                    } else { ?>0.00 <?php } ?></b></h4>
                                                                </span>
                                                            </div>
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
                                                        <input class="form-check-input form-control-md payment_type" name="payment_type" type="radio" value="GPay"
                                                            id="flexCheckDefault1">
                                                        <label class="form-check-label" for="flexCheckDefault1">
                                                            Gpay
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
                                                <a class="btn btn-sm btn-danger" href="javascript:void(0);" onclick="billstatusupdate(<?=$order['Id']?>,<?=$order['table_id']?>,'BillRaised');" title="Bill Raise">
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