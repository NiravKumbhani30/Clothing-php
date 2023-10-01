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
        Admins Accounts
        <small>admins</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Awaiting Accounts</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">View Admins</h3>
              <!--Add New Admin Button -->
              <button type="button" data-toggle="modal" data-target="#Add_Admin_ID" class="btn btn-block btn-primary pull-right" style="width:150px;">Add New Admin</button>
              <!--/Add New Admin Button -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Account Creation Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $sql="SELECT * From admins";
                    if($result=mysqli_query($conn,$sql)) {
                      $i = 1;
                      while($row=mysqli_fetch_assoc($result)) {
                        $date= new DateTime($row['timestamp']) ;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td>
                    <a href="<?php echo $row['image_path']; ?>" class="popupimage">
                      <?php echo "<img alt='Admin Image' src='".$row['image_path']."' class='img-circle' height='50' width='50' border-radius='50%'/>"; ?>
                    </a>
                  </td>
                  <td><?php echo $row['admin_name']; ?></td>
                  <td><?php echo $row['admin_email']; ?></td>
                  <td><?php echo $date->format('Y-m-d');?></td>
                  <td>
                  <a href="#" data-toggle="modal" data-target="#Edit_Admin_ID" data-edit_id='<?php echo $row['id'];?>'' data-edit_name='<?php echo $row['admin_name'];?>' data-edit_email='<?php echo $row['admin_email'];?>' data-edit_image='<?php echo $row['image_path'];?>' class="btn btn-social-icon btn-bitbucket edit_button" style="background-color:#4db6ac;border-color:#4db6ac;"><i class="fa fa-fw fa-edit"></i></a>

                  <a  href="#" data-toggle="modal" data-target="#Delete_Admin_ID" data-delete_id=<?php echo $row['id'];?> class="btn btn-social-icon btn-danger delete_button" style="background-color:#e64a19;border-color:#e64a19;"><i class="fa fa-fw fa-close"></i></a>
                  
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
                  <th>Image</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Account Creation Date</th>
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

    <!--Modal For Add New Admin -->
    <div class="container">
      <div class="modal fade" id="Add_Admin_ID" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="background-color:#F5F5F5;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add New Admin</h4>
            </div>
            <div class="modal-body" style="background-color:#FFFFFF;">
              
              <!-- form start -->
              <form class="form-horizontal" action="view_admins_PHP.php" method="post">
                  <div class="box-body">
                   
                  <input type="hidden" name="addAdmin" value="hidden" />                  

                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="admin_name" class="form-control" placeholder="Admin Name" required="yes">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" name="email" class="form-control" placeholder="Admin Email" required="yes">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" name="password" class="form-control" placeholder="Password" required="yes">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Confirm Password</label>

                    <div class="col-sm-9">
                      <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required="yes">
                    </div>
                  </div>
                  
                  </div>
            </div>
            <div class="modal-footer" style="background-color:#F5F5F5;">
              <button type="submit" name="addAdmin" class="btn btn-info">Submit</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>  

          </div>
        </div>
      </div>
    </div>
      
    <!--/Modal For Add New Admin -->

    <!--Modal For Edit user -->
    <div class="container">
      <div class="modal fade" id="Edit_Admin_ID" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="background-color:#F5F5F5;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Admin</h4>
            </div>
            <div class="modal-body" style="background-color:#FFFFFF;">
              
              <!-- form start -->
              <form class="form-horizontal" action="view_admins_PHP.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                   
                   <input type="hidden" name="admin_id" id="edit_id">
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="admin_name" class="form-control" id="edit_name" required="yes">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" name="email" class="form-control" id="edit_email" required="yes">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" name="password" class="form-control" placeholder="Password" required="yes">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Confirm Password</label>

                    <div class="col-sm-9">
                      <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required="yes">
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
              <button type="submit" name="editAdmin" class="btn btn-info">Submit</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>  

          </div>
        </div>
      </div>
    </div>
      
    <!--/Modal For Edit user -->
    <!--Modal For Delete user -->
    <div class="container">
      <div class="modal fade" id="Delete_Admin_ID" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="background-color:#F5F5F5;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Delete Admin Account</h4>
            </div>
            <div class="modal-body" style="background-color:#FFFFFF;">
              
              <!-- form start -->
              <form class="form-horizontal" action="view_admins_PHP.php" method="post">

              <input type="hidden" name="admin_id" id="delete_id" value="" />

              <div class="alert"  style="background-color:#FFB6C1;">
                   <h4 style="color:#CD5C5C;">Are You Sure You Want TO Delete This Record?</h4>
              </div>
                 
            </div>
            <div class="modal-footer" style="background-color:#F5F5F5;">
              <button type="submit" name="deleteAdmin" class="btn btn-danger" >Delete</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>  

          </div>
        </div>
      </div>
    </div>

    <!--Modal For Viewing Admin Image -->
  <div class="modal fade modalImage" style="margin-top: 50px; margin-left: 50px;">
    <div class="modal-dialog">
      <div class="modal-content">
          <img src="" class="img-responsive" style="width: 100%; height: 500px;">
      </div>
    </div>
  </div> 
<!--/Modal For Viewing Admin Image -->

<?php include('includes/footer.php'); ?>
 <!--Fetch data from database inside Edit modal-->
<script type="text/javascript">
$(document).on( "click", '.edit_button',function(e) {

    var edit_id = $(this).data('edit_id');
    var edit_name = $(this).data('edit_name');
    var edit_email = $(this).data('edit_email');
    var edit_image = $(this).data('edit_image');
    $("#edit_id").val(edit_id);
    $("#edit_name").val(edit_name);
    $("#edit_email").val(edit_email);
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