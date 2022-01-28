<section class="content">
  <div class="container-fluid ">
    <div class="row p-2">
<?php
$roles = GetUserRoles($session_data['groups']);
// print_r($roles);
foreach($roles as $role){ 
  if($role['parent_id'] == 0){ ?>
    <div class="col-lg-2 col-md-2  col-sm-6 ">
      <div class="small-box config-tab p-1">
        <a href="<?php echo base_url(); ?><?= $role['classname'];?>">
          <div class="inner text-center bg-lightgray">
            <div>
              <i class="<?= $role['fa_class'];?>"></i>
            </div>
            <h5><?= $role['name'];?></h5>
          </div>
        </a>
      </div>
    </div>
<?php 
  } 
}
?>
    </div>
  </div>
</section>