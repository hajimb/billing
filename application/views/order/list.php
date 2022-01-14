<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Order Listing</h1>
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
    <div class="legend">
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
        <!-- <div class="card search-card">
            <div class="card-title p-3">
              <h4><i class="fas fa-search mr-1"></i>Search</h4>
            </div>
            
        </div> -->
        <div class="card">
            <!-- <div class="card-header">
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
            <div class="table card-body">
                    <table class="table data-table">
                        <thead>
                          <tr>
                            <th>Order No.</th>
                            <th>Order Type</th>
                            <th>Table</th>
                            <th>Customer Phone</th>
                            <th>Customer Name</th>
                            <th>No of Items</th>
                            <th>Amount</th>
                            <th>Discount</th>
                            <th>Total</th>
                            <!-- <th>Complete Duration</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($order as $order_d) { ?>
                            
                            <tr id="ord_<?=$order_d["Id"]?>" value<?php if($order_d["status"] == "Done"){ ?> class="table-danger" <?php }else if($order_d["status"] == "Cooking"){ ?> class="table-success"<?php }else if($order_d["status"] == "Ready"){ ?> class="table-warning"<?php } ?>>
                              <th scope="row"><?=$order_d["invoice_no"]?></th>
                              <td><?=$order_d["bill_type"]?></td>
                              <td><?=$order_d["tablename"]?></td>
                              <td><?=$order_d["mobile"]?></td>
                              <td><?=$order_d["name"]?></td>
                              <td><?=$order_d["items"]?></td>
                              <td><?=$order_d["bill_amt"]?></td>
                              <td><?=$order_d["discount_amt"]?></td>
                              <td><?=$order_d["total"]?></td>
                              <!-- <td><?=$order_d[""]?></td> -->
                              <?php if($order_d["status"] == 'BillPaid'){ ?>
                                <td>
                                  <span><a href="" id="<?=$order_d["Id"]?>" class="Order_detail_1" data-toggle="modal" data-target="#modal-default-1">View</a></span> 
                                   <!-- | <span><a href="">Reprint</a></span> -->
                              </td>
                              <?php }else{?>

                              
                              <td>
                                  <span><a href="" id="<?=$order_d["Id"]?>" class="Order_detail" data-toggle="modal" data-target="#modal-default">View</a></span> 
                                   <!-- | <span><a href="">Reprint</a></span> -->
                              </td>
                              <?php }?>
                            </tr>
                          <?php }?> 
                          <!-- <tr class="table-success">
                            <th scope="row">1</th>
                            <td>Delivery</td>
                            <td>9736845456</td>
                            <td>Dhaval</td>
                            <td>2</td>
                            <td>Used in Bill</td>
                            <td>2021-03-12</td>
                            <td>2021-03-13</td>
                            <td>3hr : 51min</td>
                            <td>
                                <span><a href="">View</a></span>  | <span><a href="">Reprint</a></span>
                            </td>
                          </tr> -->
                        </tbody>
                      </table>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  