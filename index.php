<?php
	include('user_includes/header.php');
?>
  
    <div id="content-wrapper-parent">
        <div id="content-wrapper">  
			<!-- Main Slideshow -->
			<div class="home-slider-wrapper clearfix">
				<div class="camera_wrap" id="home-slider">
					<div data-src="assets/images/slide-image-1.jpg">
						<div class="camera_caption camera_title_1 fadeIn">
						  <a href="categories.php" style="color:#010101; font-size:18px">100% Original Products</a>
						  <p href="categories.php" style="color:#010101; font-size:38px">Peach Color Up Neck  <br/>Blouson Top</p>
						</div>
						<div class="camera_cta_1">
							<a href="categories.php" class="btn">See Collection</a>
						</div>
					</div>
					<div data-src="assets/images/slide-image-2.jpg">
						<div class="camera_caption camera_title_1 fadeIn">
						  <a href="categories.php" style="color:#010101; font-size:18px">100% Original Products</a>
						  <p href="categories.php" style="color:#010101; font-size:38px">Madame Women Black   <br/>Full sleeve</p>
						</div>
						<div class="camera_cta_1">
							<a href="categories.php" class="btn">See Collection</a>
						</div>
					</div>
				</div>
			</div> 
			<!-- Content -->
			<style type="text/css">

				.home_collections_item_inner
				{
					width: 90%;
					background: #F7F7F7;
					margin: 50px;
					margin-right: 0px;
				}
				.home_collections_item .collection-details
				{
					width: 90%;
				}
				
				#collectionImage
				{
					height: 150px;
					width: 60%;
					margin-left: 20%;
					margin-top: 30px;
					margin-bottom: 100px;
				}
			</style>
			<div id="content" class="clearfix">                       
				<section class="content">  
					<div id="col-main" class="clearfix">
						<div class="home-popular-collections">
							<div class="container">
								<div class="group_home_collections row">
									<div class="col-md-24">
										<div class="home_collections">
											<h6 class="general-title">Popular Categories</h6>
											<div class="home_collections_wrapper">												
												<div id="home_collections">
													<?php
														$query = "SELECT * FROM categories";
														$runQuery = mysqli_query($conn, $query);
														while ($row = mysqli_fetch_assoc($runQuery)) { 
													?>
														<div class="home_collections_item">
															<div class="home_collections_item_inner">
																<div class="collection-action">

																	 <a href="categories.php" title="<?php echo $row['category_name']; ?>">
																		<?php echo "<img id='collectionImage' alt='".$row['category_name']."' src='admin/".$row['category_image']."'/>"; ?>
																	</a>
																</div>
																<div class="hover-overlay">
																	<span class="col-name"><a style="font-size: 20px" href="categories.php"><?php echo $row['category_name']; ?></a></span>
																	<div class="collection-action">
																		<a href="categories.php">See Categories</a>
																	</div>
																</div>
															</div>
														</div>
													<?php } ?>
													</div>													
												</div>
											</div>
										</div>
										<script>
										  $(document).ready(function() {
											$('.collection-details').hover(
											  function() {
												$(this).parent().addClass("collection-hovered");
											  },
											  function() {
											  $(this).parent().removeClass("collection-hovered");
											  });
										  });
										</script>
									</div>
								</div>
						</div>
						<style type="text/css">
							#productImage
							{
								width: 375px;
								height: 100%;
								margin-top: 30px;
								margin-bottom: 100px;
							}
						</style>
						<div class="home-newproduct">
							<div class="container">
								<div class="group_home_products row">
									<div class="col-md-24">
										<div class="home_products">
											<h6 class="general-title">New Products</h6>
											<div class="home_products_wrapper">
												<div id="home_products">
													<?php
														$query = "SELECT * FROM products ORDER BY id DESC LIMIT 6";
														$runQuery = mysqli_query($conn, $query);
														while ($row = mysqli_fetch_assoc($runQuery)) { 
													?>
													<div class="element no_full_width col-md-8 col-sm-8 not-animated" data-animate="fadeInUp" data-delay="0">
														<ul class="row-container list-unstyled clearfix">
															<li class="row-left">
															<a href="product.php?id=<?php echo $row['id']; ?>" class="container_item">
															<?php echo "<img id='productImage' class='img-fluid' alt='".$row['product_name']."' src='admin/".$row['product_image']."'/>"; ?>
															</a>
															<div class="hbw">
																<span class="hoverBorderWrapper"></span>
															</div>
															</li>
															<li class="row-right parent-fly animMix">
															<div class="product-content-left">
																<a class="title-5" href="product.php?id=<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></a>
																<span class="spr-badge" id="spr_badge_12932382113" data-rating="0.0">
																<span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span>
																<span class="spr-badge-caption">
																No reviews </span>
																</span>
															</div>
															<div class="product-content-right">
																<div class="product-price">
																	<span class="price_sale"><?php echo "RS. ".$row['product_price']; ?></span>
																</div>
															</div>
															<div class="list-mode-description">
																 <?php echo $row['product_description']; ?>
															</div>
															<div class="hover-appear">
																<div class="product-ajax-qs hidden-xs hidden-sm">
																	<div data-href="./ajax/_product-qs.html" data-target="#quick-shop-modal" class="quick_shop view_button" data-toggle="modal" data-quick_id='<?php echo $row['id']; ?>' data-quick_image='<?php echo 'admin/'.$row['product_image']; ?>' data-quick_name='<?php echo $row['product_name']; ?>' data-quick_description='<?php echo $row['product_description']; ?>' data-quick_price='<?php echo "RS. ".$row['product_price']; ?>'>
																		<i class="fa fa-eye" title="Quick view"></i><span class="list-mode">Quick View</span>																		
																	</div>
																</div>
															</div>
															</li>
														</ul>
													</div>
													<?php } ?>                
												</div>
											</div>
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
	
	<script src="assets/javascripts/cs.global.js" type="text/javascript"></script>
 
	<div id="quick-shop-modal" class="modal in" role="dialog" aria-hidden="false" tabindex="-1" data-width="800">
		<div class="modal-backdrop in" style="height: 742px;">
		</div>
		<div class="modal-dialog rotateInDownLeft animated">
			<div class="modal-content">
				<div class="modal-header">
					<i class="close fa fa-times btooltip" data-toggle="tooltip" data-placement="top" title="" data-dismiss="modal" aria-hidden="true" data-original-title="Close"></i>
				</div>
				<div class="modal-body">
					<div class="quick-shop-modal-bg" style="display: none;">
					</div>
					<div class="row">
						<div class="col-md-12 product-image">
							<div id="quick-shop-image" class="product-image-wrapper">
								<a class="main-image">
									<img class="img-zoom img-responsive image-fly" id="quick_image" src="" alt="" style="width: 100%;" /></a>	
							</div>
						</div>
						<div class="col-md-12 product-information">
							<h1 id="quick-shop-title"><span> <a href="http://demo.designshopify.com/products/curabitur-cursus-dignis" id="quick_name"></a></span></h1>
							<div id="quick-shop-infomation" class="description">
								<div id="quick-shop-description" class="text-left">
									<p id="quick_description">
									</p>
								</div>
							</div>
							<div id="quick-shop-container">
								<form action="add_to_cart.php" method="post" class="variants" id="quick-shop-product-actions">
									<div id="quick-shop-price-container" class="detail-price">
										<span class="price_sale" id="quick_price"></span>
									</div>
									<input type="hidden" name="product_id" id="quick_id">
									<div class="quantity-wrapper clearfix">
										<label class="wrapper-title">Quantity</label>
										<div class="wrapper">
											<input type="text" id="qs-quantity" size="5" class="item-quantity" name="quantity" value="1">
											<span class="qty-group">
											<span class="qty-wrapper">
											<span class="qty-up" title="Increase" data-src="#qs-quantity">
											<i class="fa fa-plus"></i>
											</span>
											<span class="qty-down" title="Decrease" data-src="#qs-quantity">
											<i class="fa fa-minus"></i>
											</span>
											</span>
											</span>
										</div>
									</div>
									<div id="quick-shop-variants-container" class="variants-wrapper">
										<div class="selector-wrapper">
											<label for="#quick-shop-variants-1293238211-option-0">Color</label>
											<div class="wrapper">
												<select class="single-option-selector" data-option="option1" id="#quick-shop-variants-1293238211-option-0" name="color" style="z-index: 1000; position: absolute; opacity: 0; font-size: 15px;">
													<option value="golden">golden</option>
													<option value="red">red</option>
													<option value="blue">blue</option>
													<option value="purple">purple</option>
													<option value="green">green</option>
													<option value="white">white</option>
												</select>
												<button type="button" class="custom-style-select-box" style="display: block; overflow: hidden;"><span class="custom-style-select-box-inner" style="width: 264px; display: inline-block;">black</span></button><i class="fa fa-caret-down"></i>
											</div>
										</div>
										<div class="selector-wrapper">
											<label for="#quick-shop-variants-1293238211-option-1">Size</label>
											<div class="wrapper">
												<select class="single-option-selector" data-option="option2" id="#quick-shop-variants-1293238211-option-1" id="size" name="size" style="z-index: 1000; position: absolute; opacity: 0; font-size: 15px;">
													<option value="small">small</option>
													<option value="medium">medium</option>
													<option value="large">large</option>
												</select>
												<button type="button" class="custom-style-select-box" style="display: block; overflow: hidden;"><span class="custom-style-select-box-inner" style="width: 264px; display: inline-block;">small</span></button><i class="fa fa-caret-down"></i>
											</div>
										</div>
									</div>
									<div class="others-bottom">
										<input id="quick-shop-add" class="btn small" type="submit" name="addToCart" value="Add To Cart" style="opacity: 1;">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Androll-->
	<script type="text/javascript">
	adroll_adv_id = "HTF7KIWJRBHHXL46WLUDBC";
	adroll_pix_id = "IE5CHDRTR5ABXH2P6QXAVM";
	(function () {
	var oldonload = window.onload;
	window.onload = function(){
	   __adroll_loaded=true;
	   var scr = document.createElement("script");
	   var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
	   scr.setAttribute('async', 'true');
	   scr.type = "text/javascript";
	   scr.src = host + "/j/roundtrip.js";
	   ((document.getElementsByTagName('head') || [null])[0] ||
		document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
	   if(oldonload){oldonload()}};
	}());
	</script>

	<!-- Google Code -->
	<script>

	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

	  })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');



	  ga('create', 'UA-55571446-8', 'auto');

	  ga('require', 'displayfeatures');
	  
	  ga('set', 'dimension1', 'html_jewelry');
		 
	  ga('set', 'dimension2', 'html_jewelry');

	  ga('send', 'pageview');

	</script>
	<!--Fetch data from database inside View modal-->
	<script type="text/javascript">
	$(document).on( "click", '.view_button',function(e) {
	    var quick_id = $(this).data('quick_id');
	    var quick_name = $(this).data('quick_name');
	    var quick_description = $(this).data('quick_description');
	    var quick_price = $(this).data('quick_price');
	    var quick_image = $(this).data('quick_image');

	    $("#quick_id").val(quick_id);
	    $("#quick_name").text(quick_name);
	    $("#quick_description").text(quick_description);
	    $("#quick_price").text(quick_price);
	    $("#quick_image").attr("src",quick_image);

	});
	</script>
</body>