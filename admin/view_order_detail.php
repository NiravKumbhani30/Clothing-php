<?php
if (!isset($_GET['order_id'])) {
  header("location:view_orders.php");
}
  $order_id = $_GET['order_id'];
include('includes/header.php');
include('includes/sidebar.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"> 
     <!-- Write your code From Here -->

      <h1>
        Order Detail
        <small>Order ID: <?php echo $order_id; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="view_Orders.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Order Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">View Order Detail</h3>
              <!--Back Button -->
              <button type="button" class="btn btn-block btn-primary pull-right" style="width:150px;"><a href="view_Orders.php" style="color: white">Go Back!</a></button>
              <!--/Back Button -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Item</th>
                  <th>Item Name</th>
                  <th>Color</th>
                  <th>Size</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $sql="SELECT * FROM cart WHERE order_id = '$order_id'";
                    if($result=mysqli_query($conn,$sql)) {
                      $i = 1;
                      while($row=mysqli_fetch_assoc($result)) {
                        $query = "SELECT * FROM products WHERE id = '".$row['product_id']."'";
                        $runQuery = mysqli_query($conn, $query);
                        $product = mysqli_fetch_assoc($runQuery);
                        $product_image = $product['product_image'];
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td>
                     <a href="<?php echo $product_image; ?>" class="popupimage">
                      <?php echo "<img alt='Product Image' src='".$product_image."' class='img-circle' height='50' width='50' border-radius='50%'/>"; ?>
                    </a>
                  </td>
                  <td><?php echo $product['product_name']; ?></td>
                  <td><?php echo $row['color']; ?></td>
                  <td><?php echo $row['size']; ?></td>
                  <td><?php echo $product['product_price']; ?></td>
                  <td><?php echo $row['quantity']; ?></td>
                  <td><?php echo "RS. ".$row['quantity']*$product['product_price']; ?></td>
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
                  <th>Item</th>
                  <th>Item Name</th>
                  <th>Color</th>
                  <th>Size</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Subtotal</th>
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

<?php include('includes/footer.php'); ?>

<!--Fetch data from database inside Delete modal-->
<script type="text/javascript">
$(document).on( "click", '.delete_button',function(e) {
  var delete_id = $(this).data('delete_id');
  
  $("#delete_id").val(delete_id);

});
</script>
