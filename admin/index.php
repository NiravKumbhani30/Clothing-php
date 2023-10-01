<?php
  include('includes/header.php');
  include('includes/sidebar.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

     <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
            $query = "SELECT * FROM orders";
            $runQuery = mysqli_query($conn, $query);
            $count = mysqli_num_rows($runQuery);
          ?>
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $count; ?></h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="view_orders.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
           <?php
            $query = "SELECT * FROM categories";
            $runQuery = mysqli_query($conn, $query);
            $count = mysqli_num_rows($runQuery);
          ?>
          <div class="small-box bg-green">
            <div class="inner">
            <h3><?php echo $count; ?></h3>
              <p>Categories</p>
            </div>
            <div class="icon">
              <i class="fa fa-table"></i>
            </div>
            <a href="view_categories.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
            <?php
              $query = "SELECT * FROM products";
              $runQuery = mysqli_query($conn, $query);
              $count = mysqli_num_rows($runQuery);
            ?>
          <div class="small-box bg-yellow">
            <div class="inner">
              
              <h3><?php echo $count; ?></h3>

              <p>Products</p>
            </div>
            <div class="icon">
              <i class="fa fa-product-hunt"></i>
            </div>
            <a href="view_products.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
            $query = "SELECT * FROM admins";
            $runQuery = mysqli_query($conn, $query);
            $count = mysqli_num_rows($runQuery);
          ?>
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $count; ?></h3>

              <p>Admins</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="view_admins.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
            $query = "SELECT * FROM users";
            $runQuery = mysqli_query($conn, $query);
            $count = mysqli_num_rows($runQuery);
          ?>
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $count; ?></h3>

              <p>Users Registrations</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
            </div>
            <a href="view_users.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php
  include('includes/footer.php');
 ?>