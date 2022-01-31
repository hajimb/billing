<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="card">
        <div class="card-body">
          <table id="mainTable" class="table table-bordered table-striped table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <?php if(in_array('user', $user_permission)){ ?>
                        <th>User Name </th>
                    <?php } ?> 
                    <th>Reason</th>
                    <th>Amount</th>
                    <th>Cash Type</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
              <?php if ($data) : 
                $i = 1;
                foreach ($data as $k => $user_s) : ?>
                  <tr>
                    <td><?php echo $i++ ?></td>
                    <?php if(in_array('user', $user_permission)){ ?>
                        <td><?= $user_s['username'] ;?></td>
                    <?php } ?> 
                    <td><?php echo $user_s['reason']?></td>
                    <td><?php echo $user_s['amount']?></td>
                    <td><?php echo $user_s['ctype']?></td>
                    <td><?php echo $user_s['cash_date']?></td>
                  </tr>
                <?php endforeach ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- col-md-12 -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
