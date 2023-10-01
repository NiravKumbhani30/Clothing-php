<?php
include('includes/header.php');
include('includes/sidebar.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php
        if (isset($_SESSION['successmsg'])) { ?>
          <div id="message" class="alert alert-success" style="width: 30%; margin: auto; margin-top: 30px;">
            <?php
              echo $_SESSION['successmsg'];
              unset($_SESSION['successmsg']);
            ?>
          </div>
      <?php  }
        elseif (isset($_SESSION['errormsg'])) { ?>
          <div id="message" class="alert alert-danger" style="width: 30%; margin: auto; margin-top: 30px;">
            <?php
              echo $_SESSION['errormsg'];
              unset($_SESSION['errormsg']);
            ?>
          </div>
        <?php }
      ?>
      
      <h1>
        <?php
//Sending Confirmation Link to User
      if (isset($_POST['hidden1'])) {
        $OrderId = $_POST['orderid'];
        $to = $_POST['email'];
        $subject = "Your Order has been Confirmed!"; 
        $headers = "From: ihtisham467@gmail.com" . "\r\n" .
                   "CC: ihtisham467@gmail.com";
        $message = "This is Message is From 'Virtual Diamond Place'. Your Order Has Been Confirmed.<br> Click This link to view the order of your receipt <a href='http://localhost/virtual%20Diamond%20Place/view_receipt.php?order_id=".$OrderId."'></a>";
        mail($to,$subject,$message,$headers);
        $sql = "UPDATE orders SET admin_confirmation = '1' WHERE id = '$OrderId'";
        $runSql = mysqli_query($conn, $sql);

        echo "<script>setTimeout(function(){ window.location = 'view_orders.php'; }, 2000);</script>";
        ?>
          <div class="alert alert-success alert-dismissable" style="width:490px; position: relative; right: -200px;">
              <a href="" class="close" data-dismiss="alert" aria-label="close">×</a>
              <strong style="position: relative; right: -120px; font-size:16px;">Confirmation Mail Sent Successfully!</strong> 
          </div>
  <?php } ?> 
        All Orders
        <small>Orders</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="view_Orders.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Orders</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">View Orders</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Order ID</th>
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>Total</th>
                  <th>Shipping Address</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $sql="SELECT * From orders";
                    if($result=mysqli_query($conn,$sql)) {
                      $i = 1;
                      while($row=mysqli_fetch_assoc($result)) {
                        $query = "SELECT name,email FROM users WHERE id = '".$row['user_id']."'";
                        $runQuery = mysqli_query($conn, $query);
                        $userInfo = mysqli_fetch_assoc($runQuery);
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $userInfo['name']; ?></td>
                  <td><?php echo $userInfo['email']; ?></td>
                  <td><?php echo $row['total']; ?></td>
                  <td><?php echo substr($row['address'], 0, 60); ?></td>
                  <?php
                    if ($row['admin_confirmation'] == '0') {
                      ?><td style="color: red"><strong>Pending</strong></td><?php
                    }
                    else
                    {
                      ?><td style="color: green"><strong>Confirmed</strong></td><?php
                    }
                  ?>
                  <td>
                  <a href="view_order_detail.php?order_id=<?php echo $row['id']; ?>">View Detail</a> | 
                  <a href="view_receipt.php?order_id=<?php echo $row['id']; ?>">View Receipt</a> | 
                  <a href="#" data-toggle="modal" data-target="#confirmOrder" data-orderid='<?php echo $row['id'];?>'' data-email='<?php echo $userInfo['email'];?>' class="orderPending">Confirm</a> | 
                  <a  href="#" data-toggle="modal" data-target="#Delete_Product_ID" data-delete_id=<?php echo $row['id'];?> class="delete_button">Delete</a>
                  
                  </td>
                </tr>
                <?php 
                $i++;    
                    }
                  }
                  else
                 {
                echo "query not executed";
                 }
                  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Order ID</th>
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>Total</th>
                  <th>Shipping Address</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
      <!-- /.content -->
   </div>
    <!-- /.content-wrapper -->

    <!--Modal For Delete Product -->
    <div class="container">
      <div class="modal fade" id="Delete_Product_ID" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="background-color:#F5F5F5;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Delete Product</h4>
            </div>
            <div class="modal-body" style="background-color:#FFFFFF;">
              
              <!-- form start -->
              <form class="form-horizontal" action="delete_order.php" method="post">

              <input type="hidden" name="product_id" id="delete_id" value="" />

              <div class="alert"  style="background-color:#FFB6C1;">
                   <h4 style="color:#CD5C5C;">Are You Sure You Want TO Delete This Record?</h4>
              </div>
                 
            </div>
            <div class="modal-footer" style="background-color:#F5F5F5;">
              <button type="submit" name="deleteProduct" class="btn btn-danger" >Delete</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>  

          </div>
        </div>
      </div>
    </div>

    <!--Modal For Viewing Product Image -->
  <div class="modal fade modalImage" style="margin-top: 50px; margin-left: 50px;">
    <div class="modal-dialog">
      <div class="modal-content">
          <img src="" class="img-responsive" style="width: 100%; height: 500px;">
      </div>
    </div>
  </div> 
<!--/Modal For Viewing Product Image -->


    <!--Modal For Confirming User Order -->
<div class="container">
<div class="modal fade" id="confirmOrder" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#F5F5F5;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Confirm User Order</h4>
        </div>
        <div class="modal-body" style="background-color:#FFFFFF;">
          
          <!-- form start -->
          <form class="form-horizontal" action="" method="post">
              <div class="box-body">
               
              <input type="hidden" name="hidden1" value="hidden" />
              <input type="hidden" name="orderid" id="orderid" value="" />
              <input type="hidden" name="email" id="mail" value="" />

              <div class="alert"  style="background-color:#FFB6C1;">
                <h4 style="color:#CD5C5C;">Are You Sure You Want TO Send Confirmation Email?</h4>
              </div>
              
              </div>
        </div>
        <div class="modal-footer" style="background-color:#F5F5F5;">
          <button type="submit" name="submit" class="btn btn-success" >Send Email</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>  

      </div>
    </div>
  </div>
  </div>

<?php include('includes/footer.php'); ?>

<!--Fetch data from database inside Delete modal-->
<script type="text/javascript">
$(document).on( "click", '.delete_button',function(e) {
  var delete_id = $(this).data('delete_id');
  
  $("#delete_id").val(delete_id);

});
</script>
<!--Fetch data from database inside Confirm Email modal-->
<script type="text/javascript">
$(document).on( "click", '.orderPending',function(e) {

    var bookingid = $(this).data('orderid');
    var mail = $(this).data('email');

    $("#orderid").val(bookingid);
    $("#mail").val(mail);
     
});
</script>