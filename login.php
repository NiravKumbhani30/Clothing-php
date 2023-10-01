<?php
	include('user_includes/header.php');
	if (isset($_SESSION['userid'])) {
		header("location:index.php");
	}
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
								<span class="page-title">Login</span>
							</div>
						</div>
					</div>
				</div>              
				<section class="content">
					<div class="container">
						<div class="row">
							<div id="page-header" class="col-md-24">
								<h1 id="page-title">Login</h1> 
							</div>
							<div id="col-main" class="col-md-24 register-page clearfix">
								<div class="row checkout-form">
									<div class="col-md-12 row-left">
										<!-- Customer Account Login -->
										<div id="customer-login">
											<div class="checkout-title">
												<span class="general-title">Customer Login</span>
											</div>
												<input type="hidden" value="customer_login" name="form_type"><input type="hidden" name="utf8" value="✓">
												<?php
											        if (isset($_SESSION['successmsg'])) { ?>
											          <div class="col-md-21 login-alert">
														<div class="alert alert-success">
															<button type="button" class="close btooltip" data-toggle="tooltip" data-placement="top" title="" data-dismiss="alert" data-original-title="Close">×</button>
															<div class="errors">
																<ul>
																	<li><?php 
																		echo $_SESSION['successmsg'];
																		unset($_SESSION['successmsg']);
																	 ?></li>
																</ul>
															</div>
														</div>
													</div>
											      <?php  }
											        elseif (isset($_SESSION['errormsg'])) { ?>
											          <div class="col-md-21 login-alert">
														<div class="alert alert-danger">
															<button type="button" class="close btooltip" data-toggle="tooltip" data-placement="top" title="" data-dismiss="alert" data-original-title="Close">×</button>
															<div class="errors">
																<ul>
																	<li><?php 
																		echo $_SESSION['errormsg'];
																		unset($_SESSION['errormsg']);
																	 ?></li>
																</ul>
															</div>
														</div>
													</div>
											        <?php }
											    ?>
											    <form method="post" action="registerPHP.php" id="customer_login" accept-charset="UTF-8">
												<ul id="login-form" class="list-unstyled">
													<li class="clearfix"></li>
													<li id="login_email" class="col-md-21">
													<label class="control-label" for="customer_email">Email Address <span class="req">*</span></label>
													<input type="email" value="" name="email" id="customer_email" class="form-control">
													</li>
													<li class="clearfix"></li>
													<li id="login_password" class="col-md-21">
													<label class="control-label" for="customer_password">Password <span class="req">*</span></label>
													<input type="password" value="" name="password" id="customer_password" class="form-control password">
													</li>
													<li class="col-md-21 unpadding-top">
													<ul class="login-wrapper list-unstyled">
														<li>
														<button class="btn" type="submit" name="btn_login">Login</button>
														</li>
														<li>
														or <a class="return" href="index.php">Return to store</a>
														</li>
													</ul>
													</li>
												</ul>
											</form>
										</div>
										
									</div>
								</div>
							</div>   
						</div>
					</div>
				</section>        
			</div>
		</div>
	</div>

	<?php include('user_includes/footer.php');  ?>
</body>