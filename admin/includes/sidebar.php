
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php echo "<img alt='Admin Image' src='".$row['image_path']."' class='img-circle' height='50' width='50' border-radius='50%'/>"; ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $row['admin_name']; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="view_admins.php"><i class="fa fa-users"></i> <span>View All Admins</span></a></li>
        <li><a href="view_users.php"><i class="fa fa-users"></i> <span>View All Users</span></a></li>
        <li><a href="view_categories.php"><i class="fa fa-table"></i> <span>View All Categories</span></a></li>
        <li><a href="view_products.php"><i class="fa fa-product-hunt"></i> <span>View All Products</span></a></li>
        <li><a href="view_orders.php"><i class="fa fa-shopping-cart"></i> <span>View All Orders</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
