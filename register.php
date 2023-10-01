<?php
	include('user_includes/header.php');
?>
  
	<div id="content-wrapper-parent" style="margin-top: 100px;">
		<div id="content-wrapper">  
			<!-- Content -->
			<div id="content" class="clearfix">        
				<div id="breadcrumb" class="breadcrumb">
					<div itemprop="breadcrumb" class="container">
						<div class="row">
							<div class="col-md-24">
								<a href="index.php" class="homepage-link" title="Back to the frontpage">Home</a>
								<span>/</span>
								<span class="page-title">Create Account</span>
							</div>
						</div>
					</div>
				</div>              
				<section class="content">
					<div class="container">
						<div class="row">
							<div id="page-header" class="col-md-24">
								<h1 id="page-title">Register</h1> 
							</div>
							<div id="page-header" class="col-md-24">
								<?php
							        if (isset($_SESSION['successmsg'])) { ?>
							          <div id="message" class="alert alert-success" style="width: 45%;  margin-top: 30px;">
							            <?php
							              echo $_SESSION['successmsg'];
							              unset($_SESSION['successmsg']);
							            ?>
							          </div>
							      <?php  }
							        elseif (isset($_SESSION['errormsg'])) { ?>
							          <div id="message" class="alert alert-danger" style="width: 45%;  margin-top: 30px;">
							            <?php
							              echo $_SESSION['errormsg'];
							              unset($_SESSION['errormsg']);
							            ?>
							          </div>
							        <?php }
							    ?>
							</div>
							<div id="col-main" class="col-md-24 register-page clearfix">
								<form method="post" action="registerPHP.php" id="create_customer" accept-charset="UTF-8">
									<input value="create_customer" name="form_type" type="hidden"><input name="utf8" value="✓" type="hidden">
									<ul id="register-form" class="row list-unstyled">
										<label>Your Name</label>
										<input type="text" name="name" class="form-control" placeholder="Full Name">
										<label>Your Email</label>
										<input type="text" name="email" class="form-control" placeholder="Email">
										<label>Your Address</label>
										<input type="text" name="address" class="form-control" placeholder="Address">
										<label>Your Password</label>
										<input type="password" name="password" class="form-control" placeholder="Password">
										<label>Confirm Password</label>
										<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
										<li class="unpadding-top action-last">
										<button class="btn" type="submit" name="btn_register">Create an Account</button>
										</li>
									</ul>
								</form>
							</div>   
						</div>
					</div>
				</section>        
			</div>
		</div>
	</div>

	<?php include('user_includes/footer.php');  ?>
</body>