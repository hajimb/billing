<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url();?>dashboard" class="brand-link">
      <img src="<?php echo base_url(); ?>assets/img/abs-logo.png" alt="ABS" class="brand-image fudx-logo-sidebar" style="opacity: .8">
      <span class="brand-text font-weight-light">&nbsp;</span>
    </a>
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>dashboard" class="nav-link">
              <i class="fas fa-cash-register nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
<?php
$roles = GetUserRoles($session_data['groups']);
foreach($roles as $role){ 
  if($role['parent_id'] == 0){ ?>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?><?= $role['classname'];?>" class="nav-link">
              <i class="<?= $role['fa_class'];?> nav-icon"></i>
              <p><?= $role['name'];?></p>
            </a>
          </li>

<?php
  }
}
?>          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>login/logout" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
