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
                    <th>Name</th>
                    <th>Address</th>
                    <th>Mobile</th>                                       
                    <th><a href="<?php echo base_url('restaurant/create') ?>" class="btn btn-default">Add New</a></th>
                </tr>
            </thead>
            <tbody>
              <?php 
              if ($data) : 
                $i = 1;
                 foreach($data as $value) {?>
                    <tr>
                      <th scope="row"><?= $i++ ;?></th>                            
                      <td><?php echo $value['restaurant_name']?></td>
                      <td><?php echo $value['restaurant_address']?></td>
                      <td><?php echo $value['contact_no']?></td>
                      <!-- <td><a href=""><i class="fas fa-eye"></i></a></td> -->
                      <td nowrap>
                        <button onClick="View(<?= $value['restaurant_id']; ?>)" class="btn btn-warning"><i class="fa fa-eye"></i></button>
                        <button onClick="Edit(<?= $value['restaurant_id']; ?>)" class="btn btn-success"><i class="fa fa-edit"></i></button>
                        <button onClick="Delete(<?= $value['restaurant_id']; ?>)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </td>
                      <!-- <td><a href="<?php echo base_url() ?>restaurant/edit/<?php echo $value['restaurant_id'];?>"" class="action"><strong>Edit</strong></a></td>
                      <td><a href="javascript:void(0);" onclick="restaurdelete(<?php echo $value['restaurant_id'];?>);" class="action"><i class="far fa-trash-alt"></i></a></td> -->
                    </tr>
                    <?php  }
              endif; ?>
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
<form id="mainfrm" action="" method="post">
    <input type="hidden" id="main_id" name="main_id" value="">
</form>

<!-- Delete Modal -->
<div id="myModalDelete" class="modal fade" role="dialog" data-keyboard="true" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog ">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirm Deletion</h4>
      </div>
      <div class="modal-body" style="overflow: auto;">
        <div class="main-grid">
          <div class="col-md-12 ">
            Are you sure You want to Delete the selected Restaurant ?
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id = "confirmdelete" data-form="mainfrm">Confirm</button>
        <button type="button" class="btn btn-warning" id="cancelmenu" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>

<!-- View Modal -->
<div id="myModalView" class="modal fade" role="dialog" data-keyboard="true" data-backdrop="static" tabindex="-1"> 
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Restaurant View</h4>
      </div>
      <div class="modal-body" style="overflow: auto;">
        <div class="main-grid">
            <div class="row">
              <div class="col-md-3">Restaurant Name</div>
              <div class="col-md-9"><div class="view-data" id="res_name"></div></div>
            </div>
            <div class="row">
              <div class="col-md-3">Restaurant Address</div>
              <div class="col-md-9"><div class="view-data" id="res_address"></div></div>
            </div>
            <div class="row">
              <div class="col-md-3">Contact No.</div>
              <div class="col-md-9"><div class="view-data" id="res_contact"></div></div>
            </div>
            <div class="row" id="div_email">
              <div class="col-md-3">Email</div>
              <div class="col-md-9"><div class="view-data" id="res_email"></div></div>
            </div>
            <div class="row" id="div_fssai_no">
              <div class="col-md-3">FSSAI No.</div>
              <div class="col-md-9"><div class="view-data" id="res_fssai_no"></div></div>
            </div>
            <div class="row" id="div_gstin_no">
              <div class="col-md-3">GSTIN No.</div>
              <div class="col-md-9"><div class="view-data" id="res_gstin_no"></div></div>
            </div>
            <div class="row">
              
              <div class="col-md-6"  id="div_logo">
                <div class="col-md-6">Logo</div>
                <div class="col-md-6"><img src="" class="img-fluid" id="photo_name" style="max-height: 100px;" /> </div>
              </div>
              <div class="col-md-6"  id="div_qr">
                <div class="col-md-6">QR Code</div>
                <div class="col-md-6"><img src="" class="img-fluid" id="qr_name" style="max-height: 100px;" /> </div>
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>