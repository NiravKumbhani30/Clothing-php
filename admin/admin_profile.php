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
        Admin Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <div style="width: 80%; margin: auto">
                  <a href="#" data-toggle="modal" data-target="#UpdatePicture">
                    <?php echo "<img src='".$row['image_path']."' class='img-responsive img-circle' width='100%'/>"; ?>
                  </a>
                  <h3 class="profile-username text-center"><?php echo $row['admin_name'];  ?></h3>

                  <p class="text-muted text-center">Admin</p>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Update Profile</a></li>
              <li><a href="#Update_password" data-toggle="tab">Change Password</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="settings">
                <form class="form-horizontal" action="admin_profilePHP.php" method="post">
                  <div class="form-group">
                    <label for="inputName"   class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" name="admin_name" class="form-control" id="inputName" value="<?php echo $row['admin_name']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" name="admin_email"  class="form-control" id="inputEmail" value="<?php echo $row['admin_email']; ?>">
                    </div>
                  </div>  
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="updateProfile" class="btn btn-success">Save Changes</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="Update_password">
              <form class="form-horizontal" action="admin_profilePHP.php" method="post">
                  
                   <div class="form-group">
                     <label for="inputName"   class="col-sm-3 control-label">Current Password</label>
 
                     <div class="col-sm-9">
                       <input type="password" name="current_password" class="form-control" id="inputName" value="" required="yes" >
                     </div>
                   </div>

                   <div class="form-group">
                     <label for="inputEmail" class="col-sm-3 control-label">New Password</label>
 
                     <div class="col-sm-9">
                       <input type="password" name="password"  class="form-control" id="inputEmail" value="" required="yes">
                     </div>
                   </div>

                   <div class="form-group">
                     <label for="inputName" class="col-sm-3 control-label">Confirm Password</label>
 
                     <div class="col-sm-9">
                       <input type="password"  name="confirm_password"  class="form-control" id="inputName" value="" required="yes">
                     </div>
                   </div>

                    <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                      <button type="submit" name="updatePassword" class="btn btn-success">Save Changes</button>
                    </div>
                  </div>
               </form>

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<!--Modal For Add Picture -->
<div class="container">
<div class="modal fade" id="UpdatePicture" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#F5F5F5;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Profile Picture</h4>
        </div>
        <div class="modal-body" style="background-color:#FFFFFF;">
          
          <!-- form start -->
          <form class="form-horizontal" action="admin_profilePHP.php" method="post" enctype="multipart/form-data">
              <div class="box-body">
            
                <div class="form-group">
                  <label class="col-sm-4 control-label">Update Your Picture</label>

                  <div class="col-sm-8">
                    <input type="file" name="imageFile" class="form-control" required="yes">
                  </div>
                </div>
              
              </div>
        </div>
        <div class="modal-footer" style="background-color:#F5F5F5;">
          <button type="submit" name="updatePicture" class="btn btn-info">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>  

      </div>
    </div>
  </div>
  </div>
  
<?php include('includes/footer.php'); ?>
