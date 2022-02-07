<?php  
//echo "<pre>";
//print_r($order); 
// ec)ho (isset($order['vat_amt']) ? $order['vat_amt'] : '0');
?>
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
                                            <div class="card-header pb-0 pt-1 pl-1 pr-1 mt-1 mr-1 ml-1  " id="headingTwo">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                                        <a class="btn btn-sm btn-dark" href="javascript:void(0);" title="Add Discount" data-toggle="modal" data-target="#modal-default-2"><strong>Add Discount</strong></a>
                                                       
                                                                
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