<?php
include('user_includes/header.php');
if (!isset($_SESSION['userid'])) {
	header("location:index.php");
}
$userid = $_SESSION['userid'];
$query = "SELECT * FROM users WHERE id = '$userid'";
$runQuery = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($runQuery);
?>
  
	<div id="content-wrapper-parent" style="margin-top: 100px">
		<div id="content-wrapper">  
			<!-- Content -->
			<div id="content" class="clearfix">        
				<div id="breadcrumb" class="breadcrumb">
					<div itemprop="breadcrumb" class="container">
						<div class="row">
							<div class="col-md-24">
								<a href="index.php" class="homepage-link" title="Back to the frontpage">Home</a>
								<span>/</span>
								<span class="page-title">My Account</span>
							</div>
						</div>
					</div>
				</div>              
				<section class="content">
					<div class="container">
						<div class="row">
							<div id="page-header" class="col-md-24">
								<h1 id="page-title">My Account</h1> 
							</div>
							<div class="col-sm-6 col-md-6 sidebar">
								<div class="group_sidebar">
									<div class="row sb-wrapper unpadding-top">
										<h6 class="sb-title">Account Details</h6>
										<span class="mini-line"></span>
										<ul id="customer_detail" class="list-unstyled sb-content">
											<li>
											<address class="clearfix">
											<div class="info">
												<i class="fa fa-user"></i>
												<span class="address-group">
												<span class="author"><?php echo $row['name']; ?></span>
												<span class="email"><?php echo $row['email']; ?></span>
												</span>
											</div>
											<div class="address">
												<span class="address-group">
												<span class="address1"><?php echo $row['address']; ?><span class="phone-number"></span></span>
												</span>
											</div>
											</address>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div id="col-main" class="account-page col-sm-18 col-md-18 clearfix">
								<div id="customer_orders">
									<h6 class="sb-title">Order history</h6>
									<span class="mini-line"></span>
									<div class="row wrap-table">
										<table class="table-hover">
										<thead>
										<tr>
											<th class="order_number">
												Order
											</th>
											<th class="date">
												Date
											</th>
											<th class="payment_status">
												Status
											</th>
											<th class="total">
												Total
											</th>
										</tr>
										</thead>
										<tbody>
											<?php
												$sql = "SELECT * FROM orders WHERE user_id = '$userid'";
												$runSql = mysqli_query($conn,$sql);
												while ($orders = mysqli_fetch_assoc($runSql)) {?>
										<tr class="odd ">
											<td>
												<a href="#" title=""><?php echo "#".$orders['id']; ?></a>
											</td>
											<td>
												<span class="note"><?php echo substr($orders['timestamp'], 0,10); ?></span>
											</td>
											<?php
												if ($orders['admin_confirmation'] == '1') { ?>
													<td>
														<span class="status_authorized" style="color: green"><strong>Confirmed</strong></span>
													</td>
												<?php }
												else
												{ ?>
													<td>
														<span class="status_authorized" style="color: red"><strong>Pending</strong></span>
													</td>
												<?php }
											?>
											
											<td>
												<span class="status_unfulfilled"><?php echo "RS. ".$orders['total']; ?></span>
											</td>
										</tr>
									<?php } ?>
										</tbody>
										</table>
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