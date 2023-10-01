<?php
	if (isset($_POST['btn_search'])) {
		include('user_includes/header.php');
		$text = mysqli_real_escape_string($conn, $_POST['searchText']);
		$sql = "SELECT * FROM products WHERE product_name like '%".$text."%'";
		$runSql = mysqli_query($conn, $sql);
	}
	elseif (!isset($_POST['btn_search'])) {
		header("location:index.php");
	}
?>
  
	<div id="content-wrapper-parent" style="margin-top:100px;"> 
		<div id="content-wrapper">  
			<!-- Content -->
			<div id="content" class="clearfix">                
				<div id="breadcrumb" class="breadcrumb">
					<div itemprop="breadcrumb" class="container">
						<div class="row">
							<div class="col-md-24">
								<a href="index.php" class="homepage-link" title="Back to the frontpage">Home</a>
								<span>/</span>
								<span class="page-title">Our Products</span>
							</div>
						</div>
					</div>
				</div>
				<style type="text/css">
					#productImage
					{
						width: 100%;
						height: 200px;
					}
				</style>
                
				<section class="content">
					<div class="container">
						<div class="row"> 
							<div id="collection-content">
								<div id="page-header">
									<h1 class="page-title">Search Results</h1>
								</div>
								<div class="collection-main-content">									
									<div id="col-main" class="collection collection-page col-xs-24 col-sm-24">
										<div class="container-nav clearfix">
											<div id="options" class="container-nav clearfix">
												<ul class="list-inline text-right">
													<li class="grid_list">
													<ul class="list-inline option-set hidden-xs" data-option-key="layoutMode">
														<li data-original-title="Grid" data-option-value="fitRows" id="goGrid" class="goAction btooltip active" data-toggle="tooltip" data-placement="top" title="">
														<span></span>
														</li>
														<li data-original-title="List" data-option-value="straightDown" id="goList" class="goAction btooltip" data-toggle="tooltip" data-placement="top" title="">
														<span></span>
														</li>
													</ul>
													</li>
												</ul>
											</div>
										</div>
										<div id="sandBox-wrapper" class="group-product-item row collection-full">
											<ul id="sandBox" class="list-unstyled">
												<?php
												if (mysqli_num_rows($runSql) == '0') {
													echo "<h1>No Search Results Found!</h1>";
												}
													while ($row = mysqli_fetch_assoc($runSql)) { ?>
												<li class="element first no_full_width" data-alpha="Curabitur cursus dignis" data-price="25900">
													<ul class="row-container list-unstyled clearfix">
														<li class="row-left">
														<a href="product.php?id=<?php echo $row['id']; ?>" class="container_item">
														<?php echo "<img id='productImage' alt='Product Image' src='admin/".$row['product_image']."' class='img-responsive'/>"; ?>
														</a>
														<div class="hbw">
															<span class="hoverBorderWrapper"></span>
														</div>
														</li>
														<li class="row-right parent-fly animMix">
														<div class="product-content-left">
															<a class="title-5" href="product.php?id=<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></a>
															
														</div>
														<div class="product-content-right">
															<div class="product-price">
																<span class="price_sale"><?php echo "RS. <br><br>".$row['product_price']; ?></span>
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
												</li>
												<?php } ?>												
											</ul>
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
<div style="margin-top: 250px;">
  <?php include('user_includes/footer.php');  ?>
  </div>	
	
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