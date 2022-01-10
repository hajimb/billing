

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Groups</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          
          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add Group</h3>
            </div>
            <form role="form" action="<?php base_url('groups/create') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label for="group_name">Group Name</label>
                  <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name">
                </div>
                <div class="form-group table">
                  <label for="permission">Permission</label>

                  <table class="table data-table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Restaurants</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="Restaurants" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Orders</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="Orders" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>KOT</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="KOT" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Customers</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="Customers" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Cash Flow</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="CashFlow" class="minimal"></td>
                        
                      </tr>
                      <tr>
                        <td>Expense</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="Expense" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Withdrawal</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="Withdrawal" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Inventory</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="Inventory" class="minimal"></td>
                       
                      </tr>
                      <tr>
                        <td>Table</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="Table" class="minimal"></td>
                        
                      </tr>
                      <tr>
                        <td>Item</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="Item" class="minimal"></td>
                       
                      </tr>
                      <tr>
                        <td>Item Category</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="ItemCategory" class="minimal"></td>
                       
                      </tr>
                      <tr>
                        <td>Due Payment</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="DuePayment" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Users</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="Users" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Users Groups</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="UsersGroups" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Day End</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="DayEnd" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Day End History</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="DayEndHistory" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Tax</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="Tax" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Discount</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="Discount" class="minimal"></td>
                      </tr>
                    </tbody>
                  </table>
                  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?php echo base_url('groups/') ?>" class="btn btn-warning">Back</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $("#mainGroupNav").addClass('active');
    $("#addGroupNav").addClass('active');

    $('input[type="checkbox"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });
  });
</script>

