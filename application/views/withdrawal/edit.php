<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Withdrawal</h1>
          </div>  
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a role="button" onclick="goBack()" class="btn btn-outline-danger"><i class="fas fa-chevron-left mr-1"></i><strong>BACK</strong></a>
            </ol>
          </div>        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
       
        <form action="<?php echo base_url() ?>Withdrawal/update" enctype="multipart/form-data" method="post" name="addstock" id="addstock" class="form-horizontal">
            <div class="card-body row">          
              <div class="col-9">
                <div class="form-group">
                  <label for="inputName">Select User</label>
                            <select class="form-control custom-select" placeholder="Select User" name="user_id" required>
                            <?php  foreach($user as $user_s) { ?>    
                            <option value="<?php echo $user_s['id']?>" <?php if($formdata['data']['user_id'] == $user_s['id']) { ?> selected <?php } ?>><?php echo $user_s['username']?></option>
                                <?php } ?>
                            </select>
                </div>
                <div class="form-group">
                  <label for="inputSubject">Withdrawal Amount</label>
                  <input type="" id="amount" name="amount" value="<?php echo $formdata['data']['amount'];?>" class="form-control" onkeypress="return isNumber(event)" autocomplete="off" required/>
                </div>
                <input type="hidden" id="id" name="id" value="<?php echo $formdata['data']['withdrawal_id']; ?>"/>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Submit">
                </div>
              </div>
            </div>
        </form>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
    }
  </script>