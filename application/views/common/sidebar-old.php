<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url();?>dashboard" class="brand-link">
      <img src="<?php echo base_url(); ?>assets/img/abs-logo.png" alt="ABS" class="brand-image fudx-logo-sidebar" style="opacity: .8">
      <span class="brand-text font-weight-light">&nbsp;</span>
    </a>
<?php //print_r($user_permission);?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!--<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>dashboard" class="nav-link">
              <i class="fas fa-cash-register nav-icon"></i>
              <p>
              Management
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <?php if(in_array('category', $user_permission)): ?>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>category" class="nav-link">
              <i class="fas fa-cogs nav-icon"></i>
              <p>
                Category
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <?php endif; ?>
          <?php if(in_array('groups', $user_permission)): ?>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>groups" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>
                User Groups
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <?php endif; ?>
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
