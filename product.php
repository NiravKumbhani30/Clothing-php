<?php
	if (isset($_GET['id'])) {
		$product_id = $_GET['id'];
	}
	else
	{
		header("location:products.php");
	}
	include('user_includes/header.php');
	$query = "SELECT * FROM products WHERE id = '$product_id'";
	$runQuery = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($runQuery);
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
								<span class="page-title"><?php echo $row['product_name']; ?></span>
							</div>
						</div>
					</div>
				</div>         
				<section class="content">
					<div class="container">
						<div class="row">              
							<div id="col-main" class="product-page col-xs-24 col-sm-24 ">
								<div itemscope="" itemtype="http://schema.org/Product">
									<meta itemprop="url" content="/products/donec-condime-fermentum">
									<div id="product" class="content clearfix">      
										<h1 id="page-title" class="text-center">
											<span itemprop="name"><?php echo $row['product_name']; ?></span>
										</h1>
										<div id="product-image" class="product-image row ">     
											<div id="detail-left-column" class="hidden-xs left-coloum col-sm-6 col-sm-6 fadeInRight not-animated" data-animate="fadeInRight">
												
											</div>      
											<div class="image featured col-smd-12 col-sm-12 fadeInUp not-animated" data-animate="fadeInUp"> 
												<?php echo "<img alt='Product Image' src='admin/".$row['product_image']."'/>"; ?>
											</div>      
										</div>
										<div id="product-information" class="product-information row text-center ">        
											<div id="product-header" class="clearfix">
												<div id="product-info-left">
													<div class="description">
														<span>Product Description</span>
														<p><?php echo $row['product_description']; ?></p>
													</div>
													<div class="relative">
														<ul class="list-unstyled">
															<li class="tags">
															<span>Tags :</span>
															<a href="#">
															above-200<span>,</span>
															</a>
															<a href="#">
															black<span>,</span>
															</a>
															<a href="#">
															l<span>,</span>
															</a>
															<a href="#">
															sale-off </a>
															</li>
														</ul>
													</div>
												</div>          
												<div id="product-info-right">     
													<div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer" class="col-sm-24 group-variants">
														<meta itemprop="priceCurrency" content="USD">              
														<link itemprop="availability" href="http://schema.org/InStock">
														<form action="add_to_cart.php" method="post" class="variants" id="product-actions">
															<input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
															<div id="product-actions-1293235843" class="options clearfix">
																<style scoped>
																  label[for="product-select-option-0"] { display: none; }
																  #product-select-option-0 { display: none; }
																  #product-select-option-0 + .custom-style-select-box { display: none !important; }
																</style>																
																<div class="swatch color clearfix" data-option-index="0">
																	<label style="border: 0">Color</label>
																	<select name="color" class="form-control" style="width: 224px; max-width: 100%; margin-left: 11%;">
																		<option value="golden">golden</option>
																		<option value="red">red</option>
																		<option value="blue">blue</option>
																		<option value="purple">purple</option>
																		<option value="green">green</option>
																		<option value="white">white</option>
																	</select>
																</div>
																<div class="swatch clearfix" data-option-index="1">
																	<div class="header">
																		Size
																	</div>
																	<div data-value="small" class="swatch-element small available">
																		<input id="swatch-1-small" name="size" value="small" checked="checked" type="radio">
																		<label for="swatch-1-small">
																		small <img class="crossed-out" src="assets/images/soldout.png" alt="">
																		</label>
																	</div>
																	<div data-value="medium" class="swatch-element medium available">
																		<input id="swatch-1-medium" name="size" value="medium" type="radio">
																		<label for="swatch-1-medium">
																		medium <img class="crossed-out" src="assets/images/soldout.png" alt="">
																		</label>
																	</div>
																	<div data-value="large" class="swatch-element large available">
																		<input id="swatch-1-large" name="size" value="large" type="radio">
																		<label for="swatch-1-large">
																		large <img class="crossed-out" src="assets/images/soldout.png" alt="">
																		</label>
																	</div>
																</div>
																<div class="quantity-wrapper clearfix">
																	<label class="wrapper-title">Quantity</label>
																	<div class="wrapper">
																		<input id="quantity" name="quantity" value="1" maxlength="5" size="5" class="item-quantity" type="text">
																		<span class="qty-group">
																		<span class="qty-wrapper">
																		<span data-original-title="Increase" class="qty-up btooltip" data-toggle="tooltip" data-placement="top" title="" data-src="#quantity">
																		<i class="fa fa-caret-right"></i>
																		</span>
																		<span data-original-title="Decrease" class="qty-down btooltip" data-toggle="tooltip" data-placement="top" title="" data-src="#quantity">
																		<i class="fa fa-caret-left"></i>
																		</span>
																		</span>
																		</span>
																	</div>
																</div>
																<div id="purchase-1293235843">
																	<div class="detail-price" itemprop="price">
																		<span class="price"><?php echo "RS. ".$row['product_price']; ?></span>
																	</div>
																</div>
																<div class="others-bottom clearfix">
																	<button id="add-to-cart" class="btn btn-1" data-parent=".product-information" type="submit" name="addToCart">Add to Cart</button>
																</div>
															</div>
														</form>                                         
													</div>               
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
</body>