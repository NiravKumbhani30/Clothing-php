<?php
include('config/Connection.php');
  if (!isset($_GET['order_id'])) {
    header("location:view_orders.php");
  }
  $order_id = $_GET['order_id'];
  $query = "SELECT * FROM orders WHERE id = '$order_id'";
  $runQuery = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($runQuery);
  $userid = $row['user_id'];
  $shippingAddress = $row['address'];
  $total = $row['total'];
  $order_date = substr($row['timestamp'], 0,10);
  $user = "SELECT * FROM users WHERE id = '$userid'";
  $runUser = mysqli_query($conn, $user);
  $userinfo = mysqli_fetch_assoc($runUser);
  $name = $userinfo['name'];
  $email = $userinfo['email'];

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Virtual Diamond Place</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="admin/dist/css/skins/skin-blue.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini" style="width: 100%;">
  <!-- Content Wrapper. Contains page content -->
  <div class="" onload="window.print();" style="background: lightgray">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="width: 80%; margin:auto;">
      <h1>
        Order
        <small>View Receipt</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="view_orders.php"><i class="fa fa-dashboard"></i> Order</a></li>
        <li class="active">Receipt</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container">

      <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Diamond Virtual Place
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Diamond Virtual Place</strong><br>
            Rawalpindi<br>
            Phone: (051) xxx-xxxx<br>
            Email: info@diamond-virtual-place.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?php echo $name; ?></strong><br>
            <?php echo $shippingAddress; ?><br>
            Email: <?php echo $email; ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice</b><br>
          <br>
          <b>Order ID:</b> <?php echo "#".$order_id; ?><br>
          <b>Order Date:</b> <?php echo $order_date; ?><br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Item</th>
              <th>Color</th>
              <th>Size</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $sql = "SELECT * FROM cart WHERE order_id = '$order_id'";
                $runsql = mysqli_query($conn,$sql);
                $i = 1;
                while ($row = mysqli_fetch_assoc($runsql)) {
                  $product_id = $row['product_id'];
                  $product = "SELECT * FROM products WHERE id = '$product_id'";
                  $runproduct = mysqli_query($conn,$product);
                  $productInfo = mysqli_fetch_assoc($runproduct);
                  $product_name = $productInfo['product_name'];
                  $price = $productInfo['product_price'];
                
              ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $product_name; ?></td>
              <td><?php echo $row['color']; ?></td>
              <td><?php echo $row['size']; ?></td>
              <td><?php echo $price; ?></td>
              <td><?php echo $row['quantity']; ?></td>
              <td><?php echo $row['quantity']*$price; ?></td>
            </tr>
            <?php
            $i++;
              }
            ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <h4 style="color: green;"><strong>Cash on Delivery</strong></h4>

          
        </div>
        <!-- /.col -->
        <div class="col-xs-6">

          <div class="table-responsive">
            <table class="table">
              <tbody>
              <tr>
                <th>Total:</th>
                <td><?php echo "RS. ".$total; ?></td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a id="printBtn" onClick="printdiv('invoice');" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        </div>
      </div>
    </section>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <script type="text/javascript">
  
  function printdiv(printpage)
  {
    var x = document.getElementById('printBtn');
    // x.style.display = none;
  // var headstr = "<html><head><title></title></head><body>";
  // var footstr = "</body>";
  // var newstr = document.all.item(printpage).innerHTML;
  // var oldstr = document.body.innerHTML;
  // document.body.innerHTML = headstr+newstr+footstr;
  window.print();
  // document.body.innerHTML = oldstr;
  // return false;
  }
  </script>