<?php
	include('user_includes/header.php');
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
								<span class="page-title">Our Categories</span>
							</div>
						</div>
					</div>
				</div>
				<style type="text/css">
					#categoryImage
					{
						width: 100%;
						height: 100%;
					}
				</style>
                
				<section class="content">
					<div class="container">
						<div class="row"> 
							<div id="collection-content">
								<div id="page-header">
									<h1 id="page-title">Our Categories</h1>
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
													$query = "SELECT * FROM categories";
													$runQuery = mysqli_query($conn, $query);
													while ($row = mysqli_fetch_assoc($runQuery)) { ?>
												<li class="element first no_full_width" data-alpha="Curabitur cursus dignis" data-price="25900">
													<ul class="row-container list-unstyled clearfix">
														<li class="row-left">
														<a href="products.php?category_id=<?php echo $row['id']; ?>" class="container_item">
														<?php echo "<img id='categoryImage' alt='Product Image' src='admin/".$row['category_image']."' class='img-responsive'/>"; ?>
														</a>
														<div class="hbw">
															<span class="hoverBorderWrapper"></span>
														</div>
														</li>
														<li class="row-right parent-fly animMix">
														<div style="margin-top: 30px;">
															<a class="title-5" href="products.php?category_id=<?php echo $row['id']; ?>" style="text-align: center;"><?php echo $row['category_name']; ?></a>
															
														</div>
														<div class="list-mode-description">
															 <?php echo $row['category_description']; ?>
														</div>
														<div class="hover-appear">
																<div class="product-ajax-qs hidden-xs hidden-sm">
																<div class="quick_shop" data-toggle="modal">
																	<a href="products.php?category_id=<?php echo $row['id']; ?>">
																	<i class="fa fa-eye" title="Quick view"></i><span class="list-mode">Quick View</span>
																	</a>
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

    <?php include('user_includes/footer.php');  ?>	
</body>