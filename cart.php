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
								<a href="index-2.html" class="homepage-link" title="Back to the frontpage">Home</a>
								<span>/</span>
								<span class="page-title">Your Shopping Cart</span>
							</div>
						</div>
					</div>
				</div> 
				<?php
			        if (isset($_SESSION['successmsg'])) { ?>
			          <div id="message" class="alert alert-success" style="width: 45%; margin: auto;  margin-top: 30px;">
			            <?php
			              echo $_SESSION['successmsg'];
			              unset($_SESSION['successmsg']);
			            ?>
			          </div>
			      <?php  }
			        elseif (isset($_SESSION['errormsg'])) { ?>
			          <div id="message" class="alert alert-danger" style="width: 45%; margin: auto;  margin-top: 30px;">
			            <?php
			              echo $_SESSION['errormsg'];
			              unset($_SESSION['errormsg']);
			            ?>
			          </div>
			        <?php }
			    ?>       
                
				<section class="content">
					<div class="container">
						<div class="row">
							<div id="page-header" class="col-md-24">
								<h1 id="page-title">Shopping Cart</h1>
							</div>
							<div id="col-main" class="col-md-24 cart-page content">
									<div class="row table-cart">
										<div class="wrap-table">
											<table class="cart-items haft-border">
											<colgroup>
											<col class="checkout-image">
											<col class="checkout-info">
											<col class="checkout-price">
											<col class="checkout-quantity">
											<col class="checkout-totals">
											</colgroup>
											<thead>
											<tr class="top-labels">
												<th>
													Items
												</th>
												<th>
													Price
												</th>
												<th>
													Qty
												</th>
												<th>
													SubTotal
												</th>
												<th>
													&nbsp;
												</th>
											</tr>
											</thead>
											<tbody>
												<style type="text/css">
													#productImage
													{
														width: 100px;
														margin: auto;
														height: 80px;
													}
												</style>
												<?php
												$visitor_id = $_COOKIE['visitor_id'];
													$query = "SELECT * FROM cart where user_id = '$visitor_id' AND user_confirmation = '0'";
													$runQuery = mysqli_query($conn, $query);
													$count = mysqli_num_rows($runQuery);
													$total = 0;
													while ($row = mysqli_fetch_assoc($runQuery)) { 
														$product_id = $row['product_id'];
														$sql = "SELECT product_name, product_price, product_image FROM products WHERE id = '$product_id'";
														$runSql = mysqli_query($conn, $sql);
														$product_info = mysqli_fetch_assoc($runSql);
														?>
											<tr class="item donec-condime-fermentum">
												<td class="title text-left">
													<ul class="list-inline">
														<li class="image">
														<a href="product.html">
														<?php echo "<img id='productImage' alt='Product Image' src='admin/".$product_info['product_image']."' class='img-responsive'/>"; ?>
														</a>
														</li>
														<li class="link">
														<a href="product.html">
														<span class="title-5"><?php echo $product_info['product_name']; ?></span>
														</a>
														<br>
														<span class="variant_title"><?php echo $row['color']." / ".$row['size']; ?></span>
														<br>
														</li>
													</ul>
												</td>
												<td class="title-1">
													<?php echo "RS. ".$product_info['product_price']; ?>
												</td>
												<td class="title-1">
													<?php echo $row['quantity']; ?>
												</td>
												<td class="total title-1">
													<?php $subtotal = $product_info['product_price']*$row['quantity']; ?>
													<?php echo "RS. ".$subtotal; ?>
												</td>
												<td class="action">
													<button type="button"><i class="fa fa-times"></i>
														<a href="delete_from_cart.php?delete_id=<?php echo $row['id']; ?>">
															Remove
														</a>
													</button>
												</td>
											</tr>
										<?php
											$total = $total + $subtotal;
										 } ?>
											</tbody>
											<tfoot>
											<tr class="bottom-summary">
												<td>
													&nbsp;
												</td>
												<td>
													&nbsp;
												</td>
												<td>
													&nbsp;
												</td>
												<td class="subtotal title-1">
													<?php echo "RS. ".$total; ?>
												</td>
												<td>
													&nbsp;
												</td>
											</tr>
											</tfoot>
											</table>
										</div>
									</div>
									<form action="checkout.php" method="post" style="margin-top: -50px;">
										<input type="hidden" name="total" value="<?php echo $total; ?>">
									<div class="row">
										<div id="checkout-addnote" class="col-md-24">
											<div class="wrapper-title">
												<span class="title-5">Shipping Address</span>
											</div>
											<textarea id="note" rows="2" class="form-control" name="shippingAddress" placeholder="Enter a correct Shipping Address" required="yes"></textarea>
										</div>
									</div>
									<div class="clearfix" style="margin-bottom: 50px;">
										<div id="checkout-proceed" class="last1 text-right">
											<button class="btn" type="submit" id="checkout" name="checkout">Proceed to Checkout</button>
										</div>
									</div>
									</form> 
									<hr>
							</div>
						</div>
					</div>
				</section>        
			</div>
		</div>
	</div>

	<?php include('user_includes/footer.php');  ?>
  </body>