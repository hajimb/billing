<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">

          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid ">
          <!-- Small boxes (Stat box) -->
          <div class="row p-2">
          <?php if(in_array('restaurant', $user_permission)): ?>
          <div class="col-lg-2 col-md-2  col-sm-6 ">
              <!-- small box -->
              <div class="small-box config-tab p-1">
                <a href="<?php echo base_url(); ?>Restaurant">
                  <div class="inner text-center bg-lightgray">
                    <div>
                      <i class="fas fa-utensils fa-2x"></i>
                    </div>
                    <h5>Restaurants</h5>
                  </div>
                </a>
              </div>
            </div>
            <?php endif; ?>
            <?php if(in_array('order', $user_permission)): ?>
            <div class="col-lg-2 col-md-2  col-sm-6 ">
              <!-- small box -->
              <div class="small-box config-tab p-1">
                <a href="<?php echo base_url(); ?>tableorder">
                  <div class="inner text-center bg-lightgray">
                    <div>
                      <i class="fas fa-clipboard fa-2x"></i>
                    </div>
                    <h5>Orders</h5>
                  </div>
                </a>
              </div>
            </div>
            <?php endif; ?>
            <!-- ./col -->
            <?php if(in_array('kot', $user_permission)): ?>
            <div class="col-lg-2 col-md-2  col-sm-6">
              <!-- small box -->
              <div class="small-box config-tab p-1">
                <a href="<?php echo base_url(); ?>Kot">
                  <div class="inner text-center bg-lightgray">
                    <div>
                      <i class="fas fa-receipt fa-2x"></i>
                    </div>
                    <h5>KOT</h5>
                  </div>
                </a>
              </div>
            </div>
            <?php endif; ?>
            <?php if(in_array('customer', $user_permission)): ?>
            <div class="col-lg-2 col-md-2  col-sm-6">
              <!-- small box -->
              <div class="small-box config-tab p-1">
                <a href="<?php echo base_url(); ?>customer">
                  <div class="inner text-center bg-lightgray">
                    <div>
                      <i class="fas fa-users fa-2x"></i>
                    </div>
                    <h5>Customers</h5>
                  </div>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <?php endif; ?>
            <?php if(in_array('cashflow', $user_permission)): ?>
            <!-- ./col -->
            <div class="col-lg-2 col-md-2  col-sm-6">
              <!-- small box -->
              <div class="small-box config-tab ">
                <div class="small-box config-tab p-1">
                  <a href="<?php echo base_url(); ?>CashFlow">
                    <div class="inner text-center bg-lightgray">
                      <div>
                        <i class="fas fa-money-bill-wave-alt fa-2x"></i>
                      </div>
                      <h5>Cash Flow</h5>
                    </div>
                  </a>
                </div>

              </div>
            </div>
            <?php endif; ?>
            <?php if(in_array('expense', $user_permission)): ?>
            <div class="col-lg-2 col-md-2  col-sm-6">
              <!-- small box -->
              <div class="small-box config-tab p-1">
                <a href="<?php echo base_url(); ?>Expense">
                  <div class="inner text-center bg-lightgray">
                    <div>
                      <i class="fas fa-clipboard-list fa-2x"></i>
                    </div>
                    <h5>Expense</h5>
                  </div>
                </a>
              </div>
            </div>
            <?php endif; ?>
            <?php if(in_array('withdrawal', $user_permission)): ?>
            <div class="col-lg-2 col-md-2  col-sm-6">
              <!-- small box -->
              <div class="small-box config-tab p-1">
                <a href="<?php echo base_url(); ?>Withdrawal">
                  <div class="inner text-center bg-lightgray">
                    <div>
                      <i class="fas fa-clipboard-list fa-2x"></i>
                    </div>
                    <h5>Withdrawal</h5>
                  </div>
                </a>
              </div>
            </div>
            <?php endif; ?>
            <?php if(in_array('inventory', $user_permission)): ?>
            <div class="col-lg-2 col-md-2  col-sm-6">
              <!-- small box -->
              <div class="small-box config-tab p-1">
                <a href="<?php echo base_url(); ?>inventory">
                  <div class="inner text-center bg-lightgray">
                    <div>
                      <i class="fas fa-clipboard-list fa-2x"></i>
                    </div>
                    <h5>Inventory</h5>
                  </div>
                </a>
              </div>
            </div>
            <?php endif; ?>
            <?php if(in_array('table', $user_permission)): ?>
            <div class="col-lg-2 col-md-2  col-sm-6">
              <!-- small box -->
              <div class="small-box config-tab p-1">
                <a href="<?php echo base_url(); ?>table">
                  <div class="inner text-center bg-lightgray">
                    <div>
                      <i class="fas fa-clipboard-list fa-2x"></i>
                    </div>
                    <h5>Table</h5>
                  </div>
                </a>
              </div>
            </div>
            <?php endif; ?>
            <?php if(in_array('item', $user_permission)): ?>
             <div class="col-lg-2 col-md-2  col-sm-6">
              <!-- small box -->
              <div class="small-box config-tab p-1">
                <a href="<?php echo base_url(); ?>Item">
                  <div class="inner text-center bg-lightgray">
                    <div>
                      <i class="fas fa-th-large fa-2x"></i>
                    </div>
                    <h5>Item</h5>
                  </div>
                </a>
              </div>
            </div>
            <?php endif; ?>
            <?php if(in_array('duepayment', $user_permission)): ?>
            <div class="col-lg-2 col-md-2  col-sm-6">
              <!-- small box -->
              <div class="small-box config-tab p-1">

                <a href="<?php echo base_url(); ?>DuePayment">
                  <div class="inner text-center bg-lightgray">
                    <div>
                      <i class="fas fa-file-invoice-dollar fa-2x"></i>
                    </div>
                    <h5>Due Payment</h5>
                  </div>
                </a>
              </div>
            </div>
           <!-- <div class="col-lg-2 col-md-2  col-sm-6">              
              <div class="small-box config-tab p-1">
                <a href="<?php echo base_url(); ?>">
                  <div class="inner text-center bg-lightgray">
                    <div>
                      <i class="fas fa-language fa-2x"></i>
                    </div>
                    <h5>Language Profiles</h5>
                  </div>
                </a>
              </div>
            </div>-->
            <?php endif; ?>
            <?php if(in_array('user', $user_permission)): ?>
            <div class="col-lg-2 col-md-2  col-sm-6">
              <!-- small box -->
              <div class="small-box config-tab">
                <div class="small-box config-tab p-1">
                  <a href="<?php echo base_url(); ?>User">
                    <div class="inner text-center bg-lightgray">
                      <div>
                        <i class="far fa-id-card fa-2x"></i>
                      </div>
                      <h5>User Profile</h5>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php if(in_array('dayend', $user_permission)): ?>
            <div class="col-lg-2 col-md-2  col-sm-6">
              <!-- small box -->
              <div class="small-box config-tab">
                <div class="small-box config-tab p-1">
                  <a href="<?php echo base_url(); ?>DayEnd">
                    <div class="inner text-center bg-lightgray">
                      <div>
                        <i class="fas fa-calendar-day fa-2x"></i>
                      </div>
                      <h5>Day End</h5>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php if(in_array('dayendhistory', $user_permission)): ?>
            <div class="col-lg-2 col-md-2  col-sm-6">
              <!-- small box -->
              <div class="small-box config-tab">
                <div class="small-box config-tab p-1">
                  <a href="<?php echo base_url(); ?>DayEndHistory">
                    <div class="inner text-center bg-lightgray">
                      <div>
                        <i class="fas fa-calendar-week fa-2x"></i>
                      </div>
                      <h5>Day End History</h5>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        <div class="container-fluid ">
          <h5>
            Set the configuration for your restaurant.
          </h5>
          <hr>
          <div class="row p-2">
            <!-- <div class="col-lg-2 col-md-2  col-sm-6 ">
              <div class="small-box config-tab p-1">
                <a href="">
                  <div class="inner text-center bg-lightgray">
                    <div>
                      <i class="fab fa-elementor fa-2x"></i>
                    </div>
                    <h5>Menu</h5>
                  </div>
                </a>
              </div>
            </div> -->
            <!-- ./col -->
            <!-- <div class="col-lg-2 col-md-2  col-sm-6">
              <div class="small-box config-tab p-1">
                <a href="">
                  <div class="inner text-center bg-lightgray">
                    <div>
                      <i class="fas fa-print fa-2x"></i>
                    </div>
                    <h5>Bill / KOT Print</h5>
                  </div>
                </a>
              </div>

            </div> -->
            <?php if(in_array('tax', $user_permission)): ?>
            <div class="col-lg-2 col-md-2  col-sm-6">
              <!-- small box -->
              <div class="small-box config-tab p-1">
                <a href="<?php echo base_url(); ?>tax">
                  <div class="inner text-center bg-lightgray">
                    <div>
                      <i class="fas fa-donate fa-2x"></i>
                    </div>
                    <h5>Tax</h5>
                  </div>
                </a>
              </div>
            </div>
            <?php endif; ?>
            <?php if(in_array('discount', $user_permission)): ?>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-2 col-md-2  col-sm-6">
              <!-- small box -->
              <div class="small-box config-tab p-1">
                <a href="<?php echo base_url(); ?>discount">
                  <div class="inner text-center bg-lightgray">
                    <div>
                      <i class="fas fa-tag fa-2x"></i>
                    </div>
                    <h5>Discount</h5>
                  </div>
                </a>
              </div>
            </div>
            <?php endif; ?>
            <!-- <div class="col-lg-2 col-md-2  col-sm-6">
              <div class="small-box config-tab p-1">
                <a href="">
                  <div class="inner text-center bg-lightgray">
                    <div>
                      <i class="fas fa-desktop fa-2x"></i>
                    </div>
                    <h5>Billing Screen</h5>
                  </div>
                </a>
              </div>
            </div> -->
            <!-- <div class="col-lg-2 col-md-2  col-sm-6">
              <div class="small-box config-tab p-1">
                <a href="">
                  <div class="inner text-center bg-lightgray">
                    <div>
                      <i class="fas fa-tools fa-2x"></i>
                    </div>
                    <h5>Settings</h5>
                  </div>
                </a>
              </div>
            </div> -->
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>