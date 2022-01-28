<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="card">
        <div class="card-body">
          <table id="mainTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Sr No</th>
                <th>Raw Material</th>
                <th>Stock</th>
                <th>Unit</th>
              </tr>
            </thead>
            <form id="mainfrm" action="" method="post">
              <input type="hidden" id="main_id" name="main_id" value="">
            </form>
            <tbody>
              <?php if ($data) : 
                $i = 1;?>
                <?php 
                foreach($data as $row) { ?> 
                  <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td><?php echo $row['rawmaterial'];?></td>
                    <td><?php echo $row['stock'];?></td>
                    <td><?php echo $row['units'];?></td>
                  </tr>
                  <?php $i++; }  ?>
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