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
        All Products
        <small>products</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="view_products.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Products</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">View Products</h3>
              <!--Add New Product Button -->
              <button type="button" data-toggle="modal" data-target="#Add_Product_ID" class="btn btn-block btn-primary pull-right" style="width:150px;">Add New Product</button>
              <!--/Add New Product Button -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Product Image</th>
                  <th>Product Name</th>
                  <th>Product Category</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $sql="SELECT * From products";
                    if($result=mysqli_query($conn,$sql)) {
                      $i = 1;
                      while($row=mysqli_fetch_assoc($result)) {
                        $query = "SELECT category_name FROM categories WHERE id = '".$row['category_id']."'";
                        $runQuery = mysqli_query($conn, $query);
                        $category = mysqli_fetch_assoc($runQuery);
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td>
                    <a href="<?php echo $row['product_image']; ?>" class="popupimage">
                      <?php echo "<img alt='Product Image' src='".$row['product_image']."' class='img-circle' height='50' width='50' border-radius='50%'/>"; ?>
                    </a>
                  </td>
                  <td><?php echo $row['product_name']; ?></td>
                  <td><?php echo $category['category_name']; ?></td>
                  <td><?php echo $row['product_price']; ?></td>
                  <td><?php echo substr($row['product_description'], 0, 60).'...'; ?></td>
                  <td>
                  <a href="#" data-toggle="modal" data-target="#Edit_Product_ID" data-edit_id='<?php echo $row['id'];?>'' data-edit_name='<?php echo $row['product_name'];?>' data-edit_category='<?php echo $row['category_id'];?>' data-edit_description='<?php echo $row['product_description'];?>' data-edit_price='<?php echo $row['product_price'];?>' data-edit_image='<?php echo $row['product_image'];?>' class="btn btn-social-icon btn-bitbucket edit_button" style="background-color:#4db6ac;border-color:#4db6ac;"><i class="fa fa-fw fa-edit"></i></a>

                  <a  href="#" data-toggle="modal" data-target="#Delete_Product_ID" data-delete_id=<?php echo $row['id'];?> class="btn btn-social-icon btn-danger delete_button" style="background-color:#e64a19;border-color:#e64a19;"><i class="fa fa-fw fa-close"></i></a>
                  
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
                  <th>Product Image</th>
                  <th>Product Name</th>
                  <th>Product Category</th>
                  <th>Price</th>
                  <th>Description</th>
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

    <!--Modal For Add New Product -->
    <div class="container">
      <div class="modal fade" id="Add_Product_ID" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="background-color:#F5F5F5;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add New Product</h4>
            </div>
            <div class="modal-body" style="background-color:#FFFFFF;">
              
              <!-- form start -->
              <form class="form-horizontal" action="view_products_PHP.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                   
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Product Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="product_name" class="form-control" placeholder="Product Name" required="yes">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Product Category</label>
                      <div class="col-sm-9">
                        <select name="category_id" class="form-control" required="yes">
                          <option value="">Select a Category</option>
                          <?php
                            $sql = "SELECT id, category_name FROM categories";
                            $runSql = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($runSql)) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                          <?php  }
                          ?>
                        </select>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Product Description</label>

                    <div class="col-sm-9">
                      <textarea name="product_description" class="form-control" placeholder="Give a little description of the Product" rows="4"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Product Price (In Rs.)</label>

                    <div class="col-sm-9">
                      <input type="number" name="product_price" class="form-control" required="yes" placeholder="Product Price in Rupees">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Add a Cover Image of The Product</label>

                    <div class="col-sm-9">
                      <input type="file" name="imageFile" class="form-control" required="yes">
                    </div>
                  </div>
                  
                  </div>
            </div>
            <div class="modal-footer" style="background-color:#F5F5F5;">
              <button type="submit" name="addProduct" class="btn btn-info">Submit</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>  

          </div>
        </div>
      </div>
    </div>
      
    <!--/Modal For Add New Product -->

    <!--Modal For Edit Product -->
    <div class="container">
      <div class="modal fade" id="Edit_Product_ID" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="background-color:#F5F5F5;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Product</h4>
            </div>
            <div class="modal-body" style="background-color:#FFFFFF;">
              
              <!-- form start -->
              <form class="form-horizontal" action="view_products_PHP.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                   
                   <input type="hidden" name="product_id" id="edit_id">
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Product Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="product_name" class="form-control" id="edit_name" required="yes">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Product Category</label>
                      <div class="col-sm-9">
                        <select name="category_id" class="form-control" id="edit_category" required="yes">
                          <option value="">Select a Category</option>
                          <?php
                            $sql = "SELECT id, category_name FROM categories";
                            $runSql = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($runSql)) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                          <?php  }
                          ?>
                        </select>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Product Description</label>

                    <div class="col-sm-9">
                      <textarea name="product_description" class="form-control" id="edit_description" rows="4"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Product Price (In Rs.)</label>

                    <div class="col-sm-9">
                      <input type="number" name="product_price" class="form-control" id="edit_price" required="yes">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Image</label>

                    <div class="col-sm-9">
                      <input type="file" name="imageFile" class="form-control">
                      <?php echo '<img src="" style="width:50px;height:50px; border-radius:25px;" id="edit_image">'?>
                    </div>
                  </div>
                  
                  </div>
            </div>
            <div class="modal-footer" style="background-color:#F5F5F5;">
              <button type="submit" name="editProduct" class="btn btn-info">Submit</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>  

          </div>
        </div>
      </div>
    </div>
      
    <!--/Modal For Edit Product -->
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
              <form class="form-horizontal" action="view_products_PHP.php" method="post">

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
 <!--Fetch data from database inside Edit modal-->
<script type="text/javascript">
$(document).on( "click", '.edit_button',function(e) {

    var edit_id = $(this).data('edit_id');
    var edit_name = $(this).data('edit_name');
    var edit_category = $(this).data('edit_category');
    var edit_description = $(this).data('edit_description');
    var edit_price = $(this).data('edit_price');
    var edit_image = $(this).data('edit_image');
    $("#edit_id").val(edit_id);
    $("#edit_name").val(edit_name);
    $("#edit_category").val(edit_category);
    $("#edit_description").val(edit_description);
    $("#edit_price").val(edit_price);
    document.getElementById('edit_image').src=edit_image;
});
</script>

<!--Fetch data from database inside Delete modal-->
<script type="text/javascript">
$(document).on( "click", '.delete_button',function(e) {
  var delete_id = $(this).data('delete_id');
  
  $("#delete_id").val(delete_id);

});
</script>
<script type="text/javascript">
    $(document).ready(function(){
    $('.popupimage').click(function(event){
      event.preventDefault();
      $('.modalImage img').attr('src', $(this).attr('href'));
      $('.modalImage').modal('show');
    });
  });
</script>