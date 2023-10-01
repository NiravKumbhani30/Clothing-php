<?php
	include('config/Connection.php');
	session_start();
?>
<!doctype html>
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->

<!-- Mirrored from demo.designshopify.com/html_jewelry/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Oct 2018 06:30:56 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <link rel="canonical" href="http://demo.designshopify.com/" />
  <meta name="description" content="" />
  <title>Virtual Diamond Place</title>
  
    <link href="assets/stylesheets/font.css" rel='stylesheet' type='text/css'>
  
	<link href="assets/stylesheets/font-awesome.min.css" rel="stylesheet" type="text/css" media="all"> 
	<link href="assets/stylesheets/jquery.camera.css" rel="stylesheet" type="text/css" media="all">
	<link href="assets/stylesheets/jquery.fancybox-buttons.css" rel="stylesheet" type="text/css" media="all">
	<link href="assets/stylesheets/cs.animate.css" rel="stylesheet" type="text/css" media="all">
	<link href="assets/stylesheets/application.css" rel="stylesheet" type="text/css" media="all">
	<link href="assets/stylesheets/swatch.css" rel="stylesheet" type="text/css" media="all">
	<link href="assets/stylesheets/jquery.owl.carousel.css" rel="stylesheet" type="text/css" media="all">
	<link href="assets/stylesheets/jquery.bxslider.css" rel="stylesheet" type="text/css" media="all">
	<link href="assets/stylesheets/bootstrap.min.3x.css" rel="stylesheet" type="text/css" media="all">
	<link href="assets/stylesheets/cs.bootstrap.3x.css" rel="stylesheet" type="text/css" media="all">
	<link href="assets/stylesheets/cs.global.css" rel="stylesheet" type="text/css" media="all">
	<link href="assets/stylesheets/cs.style.css" rel="stylesheet" type="text/css" media="all">
	<link href="assets/stylesheets/cs.media.3x.css" rel="stylesheet" type="text/css" media="all">
	<link rel="stylesheet" href="admin/bower_components/font-awesome/css/font-awesome.min.css">
	
	<script src="assets/javascripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="assets/javascripts/jquery.imagesloaded.min.js" type="text/javascript"></script>
	<script src="assets/javascripts/bootstrap.min.3x.js" type="text/javascript"></script>
	<script src="assets/javascripts/jquery.easing.1.3.js" type="text/javascript"></script>
	<script src="assets/javascripts/jquery.camera.min.js" type="text/javascript"></script>	
	<script src="assets/javascripts/cookies.js" type="text/javascript"></script>
	<script src="assets/javascripts/modernizr.js" type="text/javascript"></script>  
	<script src="assets/javascripts/application.js" type="text/javascript"></script>
	<script src="assets/javascripts/jquery.owl.carousel.min.js" type="text/javascript"></script>
	<script src="assets/javascripts/jquery.bxslider.js" type="text/javascript"></script>
	<script src="assets/javascripts/skrollr.min.js" type="text/javascript"></script>
	<script src="assets/javascripts/jquery.fancybox-buttons.js" type="text/javascript"></script>
	<script src="assets/javascripts/jquery.zoom.js" type="text/javascript"></script>	
	<script src="assets/javascripts/cs.script.js" type="text/javascript"></script>
	<script src="assets/javascripts/cs.global.js" type="text/javascript"></script>
</head>

<body class="templateIndex notouch">
  
	<!-- Header -->
	<header id="top" class="clearfix">
		<!--top-->
		<div class="container">
		  <div class="top row">
			<div class="col-md-6 phone-shopping">
			  <span>PHONE SHOPING 055 xxx xxxx</span>
			</div>
			<div class="col-md-18">
			  <ul class="text-right">
				<li class="customer-links hidden-xs">
					<ul id="accounts" class="list-inline">
						<li class="my-account">
							<a href="account.php">My Account</a>
						</li>
						<?php
							if (isset($_SESSION['userid'])) {
								?>
								 <li><?php echo $_SESSION['username']; ?></li>
								 <li>/</li> 
								 <li><a href="logout.php">Logout</a></li>
								<?php
							}
							else
							{ ?>
								<li class="login">    
									<span id="loginButton" class="dropdown-toggle" data-toggle="dropdown">
										<a href="login.php">Login</a>
										<i class="sub-dropdown1"></i>
										<i class="sub-dropdown"></i>
									</span>
									<!-- Customer Account Login -->
									<div id="loginBox" class="dropdown-menu text-left">
									<form method="post" action="registerPHP.php" id="customer_login" accept-charset="UTF-8"><input type="hidden" value="customer_login" name="form_type"><input type="hidden" name="utf8" value="✓">
										<div id="bodyBox">
											<ul class="control-container customer-accounts list-unstyled">
												<li class="clearfix">
													<label for="customer_email_box" class="control-label">Email Address <span class="req">*</span></label>
													<input type="email" value="" name="email" id="customer_email_box" class="form-control" autocomplete="off">
												</li>						 
												<li class="clearfix">
													<label for="customer_password_box" class="control-label">Password <span class="req">*</span></label>
													<input type="password" value="" name="password" id="customer_password_box" class="form-control password">
												</li>						  
												<li class="clearfix">
													<input type="submit" class="action btn btn-1" name="btn_login" value="Login" style="width: 100%">
												</li>
												<li class="clearfix">
													<a class="action btn btn-1" href="register.php">Create an account</a>
												</li>
											</ul>
										</div>
									</form>
									</div>    
								</li>
								<li>/</li>   
								<li class="register">
									<a href="register.php" id="customer_register_link">Create an account</a>
								</li>
							<?php }
						?>  
					</ul>
				</li>      
				<li id="widget-social">
				  <ul class="list-inline">            
					<li><a target="_blank" href="#" class="btooltip swing" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a target="_blank" href="#" class="btooltip swing" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>                        
					<li><a target="_blank" href="#" class="btooltip swing" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a></li>           
				  </ul>
				</li>        
			  </ul>
			</div>
		  </div>
		</div>
		<!--End top-->
		<div class="line"></div>
		<!-- Navigation -->
		<div class="container">
			<div class="top-navigation">
				<ul class="list-inline">
					<li class="top-logo">
						<a id="site-title" href="index.php" title="Virtual Diamond Place">          
						<img class="img-responsive" src="assets/images/logo.png" alt="">          
						</a>
					</li>
					<li class="navigation">			
						<nav class="navbar">
							<div class="clearfix">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="sr-only">Toggle main navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									</button>
								</div>
								<div class="is-mobile visible-xs">
									<ul class="list-inline">
										<li class="is-mobile-menu">
										<div class="btn-navbar" data-toggle="collapse" data-target=".navbar-collapse">
											<span class="icon-bar-group">
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											</span>
										</div>
										</li>
										<li class="is-mobile-login">
										<div class="btn-group">
											<div class="dropdown-toggle" data-toggle="dropdown">
												<i class="fa fa-user"></i>
											</div>
											<ul class="customer dropdown-menu">
												<li class="logout">
												<a href="login.php">Login</a>
												</li>
												<li class="account last">
												<a href="register.php">Register</a>
												</li>
											</ul>
										</div>
										</li>
										<li class="is-mobile-wl">
										<a href="#"><i class="fa fa-heart"></i></a>
										</li>
										<li class="is-mobile-cart">
										<a href="#"><i class="fa fa-shopping-cart"></i></a>
										</li>
									</ul>
								</div>
								<div class="collapse navbar-collapse">
									<ul class="nav navbar-nav hoverMenuWrapper">
										<li class="nav-item active">
										<a href="index.php">
										<span>Home</span>
										</a>
										</li>
										<li class="nav-item">
										<a href="products.php">
										<span>Our Products</span>
										</a>
										</li>
										<li class="nav-item">
										<a href="categories.php">
										<span>Categories</span>
										</a>
										</li>
									</ul>
								</div>
							</div>
						</nav>
					</li>		  
					<li class="top-search hidden-xs">
						<div class="header-search">
							<a href="#">
							<span data-toggle="dropdown">
							<i class="fa fa-search"></i>
							<i class="sub-dropdown1"></i>
							<i class="sub-dropdown"></i>
							</span>
							</a>
							<form id="header-search" class="search-form dropdown-menu" action="search.php" method="post">
								<input type="hidden" name="type" value="product">
								<input type="text" name="searchText" value="" accesskey="4" autocomplete="off" placeholder="Search something...">
								<button type="submit" class="btn" name="btn_search">Search</button>
							</form>
						</div>
					</li>					
					<li class="umbrella hidden-xs">
						<div id="umbrella" class="list-inline unmargin">
							<div class="cart-link">
								<a href="cart.php" class="dropdown-toggle dropdown-link" data-toggle="dropdown">
									<i class="sub-dropdown1"></i>
									<i class="sub-dropdown"></i>
									<div class="num-items-in-cart">
										<?php
											if (isset($_SESSION['userid'])) {
												$userid = $_SESSION['userid'];
												$visitor_id = '0';
											}
											if (isset($_COOKIE['visitor_id'])) {
												$visitor_id = $_COOKIE['visitor_id'];
												$userid = '0';
											}
											else {
												$visitor_id = '0';
												$userid = '0';
											}
										$query = "SELECT * FROM cart WHERE user_id = '$visitor_id' OR user_id = '$userid' AND user_confirmation = '0'";
										$runQuery = mysqli_query($conn, $query);
										$count = mysqli_num_rows($runQuery);
										?>
										<span class="icon">
										  Cart
										  <span class="number"><?php echo $count; ?></span>
										</span>
									</div>
								</a>
							</div>
						</div>
					</li>		  		 
					<li class="mobile-search visible-xs">
						<form id="mobile-search" class="search-form" action="" method="get">
							<input type="hidden" name="type" value="product">
							<input type="text" class="" name="q" value="" accesskey="4" autocomplete="off" placeholder="Search something...">
							<button type="submit" class="search-submit" title="search"><i class="fa fa-search"></i></button>
						</form>
					</li>		  
				</ul>
			</div>
			<!--End Navigation-->
			<script>
			  function addaffix(scr){
				if($(window).innerWidth() >= 1024){
				  if(scr > $('#top').innerHeight()){
					if(!$('#top').hasClass('affix')){
					  $('#top').addClass('affix').addClass('animated');
					}
				  }
				  else{
					if($('#top').hasClass('affix')){
					  $('#top').prev().remove();
					  $('#top').removeClass('affix').removeClass('animated');
					}
				  }
				}
				else $('#top').removeClass('affix');
			  }
			  $(window).scroll(function() {
				var scrollTop = $(this).scrollTop();
				addaffix(scrollTop);
			  });
			  $( window ).resize(function() {
				var scrollTop = $(this).scrollTop();
				addaffix(scrollTop);
			  });
			</script>
		</div>
		<!-- Facebook Conversion Code for Themes -->
		<script>(function() {
		  var _fbq = window._fbq || (window._fbq = []);
		  if (!_fbq.loaded) {
			var fbds = document.createElement('script');
			fbds.async = true;
			fbds.src = '../../connect.facebook.net/en_US/fbds.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(fbds, s);
			_fbq.loaded = true;
		  }
		})();
		window._fbq = window._fbq || [];
		window._fbq.push(['track', '6016096938024', {'value':'0.00','currency':'USD'}]);
		</script>
		<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6016096938024&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" /></noscript>
    </header>