<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="card">
        <div class="card-body">
            <form method="post" id="indent">
                <div class="panel-heading">
                    <button class="btn btn-sm pull-right btn-success saveChange" id='submit' data-form="indent" type="submit">Print Indent</button>
                </div>
                <table style="width: 100%;" id="printTable" class="table table-bordered table-striped" cellpadding="5" cellspacing="5">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Raw Material</th>
                      <th width="200px">Stock</th>
                      <th>Unit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($data) : 
                      $i = 1;?>
                      <?php 
                      foreach($data as $row) { ?> 
                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td>
                            <?php echo $row['rawmaterial'];?>
                              <input type="hidden" class="rawmaterial" name="rawmaterial[<?= $row['rawmaterial_id'];?>]" value="<?php echo $row['rawmaterial'];?>">
                          </td>
                          <td>
                              <input type="text" name="stock[<?= $row['rawmaterial_id'];?>]" value="<?php echo $row['stock'];?>" class="form-control stock" style="border:none">
                          </td>
                          <td>
                            <?php echo $row['units'];?>
                            <input type="hidden" name="unit[<?= $row['rawmaterial_id'];?>]" class="unit" value="<?php echo $row['units'];?>"></td>
                        </tr>
                        <?php $i++; }  ?>
                    <?php endif; ?>
                  </tbody>
                </table>
            </form>
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