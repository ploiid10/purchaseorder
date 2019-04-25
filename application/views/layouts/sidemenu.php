<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    <img src="<?php echo base_url()."assets"?>/images/wadys_logo.jpg" alt="Wadys Bistro Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
           <span class="brand-text font-weight-light">WADYS BISTRO</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
      <img src="<?php echo base_url().'assets/images/man.png'?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->name?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Dashboard</li>
 
          <li class="nav-item">
            <a href="<?php echo site_url('category')?>" class="nav-link">
              <i class="nav-icon fa fa-ellipsis-h"></i>
              <p>Category</p>
            </a>
          </li>
          <li class="nav-item"> 
            <a href="<?php echo site_url('menu')?>" class="nav-link">
              <i class="nav-icon fa fa-list"></i>
              <p>Menu</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?php echo site_url('user')?>" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>User</p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>
                Reports
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('reports')?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Purchasing</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('reports/inventory')?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inventory</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('purchasing')?>" class="nav-link" >
            <i class="nav-icon fa fa-shopping-cart"></i>
              <p>Purchasing</p>
          </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('ingredients')?>" class="nav-link" >
            <i class="nav-icon fa fa-linode"></i>
              <p>Ingredients</p>
          </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('purchasing/mobile')?>" class="nav-link" >
            <i class="nav-icon fa fa-mobile"></i>
              <p>Mobile Purchasing</p>
          </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('inventory')?>" class="nav-link" >
            <i class="nav-icon fa fa-cogs"></i>
              <p>Inventory</p>
          </a>
          </li>
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>