    <div class="content-wrapper">
        <section class="content m-0">
            <div class="container-fluid m-0">
                <div class="row m-0">
                    <div class="col-lg-6 col-md-6 card">
                            <form role="form" method="post" name="searchForm" id="searchForm">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-lg" id="search_text" name="search_text" placeholder="Search Item Here">
                                <div class="input-group-append">
                                    <button type="button" id="searchtext" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="row card-body">
                            <div class="col-lg-3 col-md-3 ">
                                <ul class="nav nav-pills nav-sidebar flex-sidebar menu-categories ">
                                    <?php
                                    foreach ($category as $category_s) {
                                        $c = 1;
                                        echo '<li class="active"><a data-toggle="pill" class="btn bg-gray" role="button" id="' . $category_s['category_id'] . '" onclick="getitems(' . $category_s['category_id'] . ')"  href="#' . $category_s['category_id'] . '_cat">' . $category_s['category'] . '</a></li>';
                                        $c = $c + 1;
                                    }  ?>
                                </ul>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="tab-content container p-2">
                                    <div id="cat_item" class="cat_div_data tab-pane fade in"></div>
                                    <div id="search_cat" class="cat_div_data tab-pane fade in">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                <label for="inputMessage">Select Table</label>
                                                <select class="form-control custom-select" placeholder="" name="table_id" required>
                                                    <option value="0>">Select Table</option>
                                                    <?php 
                                                    foreach ($table as $table_d) { 
                                                        $selected = '';
                                                        if (isset($table_id) && $table_id == $table_d['table_id']) {
                                                            $selected = 'selected';
                                                        }
                                                        echo '<option '.$selected.' value="'.$table_d['table_id'].'">'.$table_d['tablename'].'</option>';
                                                        } 
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="dinein">
                                            <table class="table table-striped" style="min-height:100px">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Items</th>
                                                        <th scope="col">Check Items</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Instruction</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
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
                                                                    <input type="hidden" name="tax_vat" id="tax_vat" value="<?php if (isset($tax['vat'])) {
                                                                                                                                echo $tax['vat'];
                                                                                                                            } else {
                                                                                                                                echo '0';
                                                                                                                            } ?>">
                                                                    <input type="hidden" name="tax_sgst" id="tax_sgst" value="<?php if (isset($tax['sgst'])) {
                                                                                                                                    echo $tax['sgst'];
                                                                                                                                } else {
                                                                                                                                    echo '0';
                                                                                                                                } ?>">
                                                                    <input type="hidden" name="tax_cgst" id="tax_cgst" value="<?php if (isset($tax['cgst'])) {
                                                                                                                                    echo $tax['cgst'];
                                                                                                                                } else {
                                                                                                                                    echo '0';
                                                                                                                                } ?>">
                                                                    <input type="hidden" name="tax_amount" id="tax_amount" value="<?php if (isset($tax['tax_amt'])) {
                                                                                                                                        $order['tax_amt'];
                                                                                                                                    } else {
                                                                                                                                        echo '0';
                                                                                                                                    } ?>">
                                                                    <input type="hidden" name="total_amount" id="total_amount1" value="<?php if (isset($order['bill_amt'])) {
                                                                                                                                            echo $order['bill_amt'];
                                                                                                                                        } else { ?>0.00 <?php } ?>">
                                                                    <input type="hidden" name="g_total_amount" id="g_total_amount" value="<?php if (isset($order['total'])) {
                                                                                                                                                echo $order['total'];
                                                                                                                                            } else { ?>0.00 <?php } ?>">
                                                                    <input type="hidden" name="dis_per_val" id="dis_per_val" value="0">
                                                                    <input type="hidden" name="dis_fix_val" id="dis_fix_val" value="<?php if (isset($order['discount_amt'])) {
                                                                                                                                        echo $order['discount_amt'];
                                                                                                                                    } else { ?>0.00 <?php } ?>">
                                                                    <input type="hidden" name="final_dis" id="final_dis" value="<?php if (isset($order['discount_amt'])) {
                                                                                                                                    echo $order['discount_amt'];
                                                                                                                                } else { ?>0.00 <?php } ?>">
                                                                    <input type="hidden" name="total_tendered" value="0">
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
                                                    </div>
                                                </div>
                                                <div class="card pt-2 pb-2">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <button class="btn btn-sm btn-danger" id="save_kot"><strong>KOT</strong></button>
                                                        <button class="btn btn-sm btn-dark" id="kot_print"><strong>KOT & Print</strong></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>