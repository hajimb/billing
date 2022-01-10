 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Expense Listing</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
                <a role="button" href="<?php echo base_url(); ?>Expense/add_expense" class="btn btn-danger mr-2"> <strong>  Add Expense</strong> </a>
                <a role="button" href="<?php echo base_url(); ?>dashboard" class="btn btn-outline-danger"> <strong> < BACK</strong> </a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">        
        <div class="card">
            <div class="table">
                    <table class="table data-table">
                        <thead>
                          <tr>
                            <th>User Name</th>
                            <th>Expense</th>
                            <th>Expense Amount</th>
                            <th>Expense Date</th>
                            <th colspan="2">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($expense as $expense_s) {  ?>
                          <tr>
                            <td><?php echo $expense_s['username']?></td>
                            <td><?php echo $expense_s['expense']?></td>
                            <td><?php echo $expense_s['amount']?></td>
                            <td><?php echo $expense_s['created_date']?></td>
                            <td><a href="<?php echo base_url() ?>Expense/edit/<?php echo $expense_s['expense_id'];?>" class="action"><strong>Edit</strong></a></td>
                            <td><a href="javascript:void(0);" onclick="wdelete(<?php echo $expense_s['expense_id'];?>);" class="action"><i class="far fa-trash-alt"></i></a></td>
                          </tr>
                          <?php  }  ?> 
                        </tbody>
                      </table>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
    var url="<?php echo base_url();?>";
    function wdelete(id){
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = url+"Expense/Expense_delete/"+id;
        else
          return false;
        } 
</script>