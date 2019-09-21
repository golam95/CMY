       <?php include("inc/header.php"); ?>
       <?php include("inc/banner.php"); ?>



	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>

					
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					
					<div style="background:#1782DC;color:#FFFFFF;" class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i style="color:#FFFFFF;" class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
					
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
<form  action="searchproduct.php" method="POST">
						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" placeholder="Search">
					
					</form>
						
						
					</div>	
				</div>

				<!-- Filter -->
			</div>

			 
			<div class="row isotope-grid">
			
			 <?php 
				   $getPd=$pd->getAllProduct();
					if ($getPd) {
						$i=0;
						while ($result=$getPd->fetch_assoc()) {
							$i++;
					 ?>
			
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
					<form action="" method="">
						<div class="block2-pic hov-img0">
						<img src="admin/<?php echo($result['image']);?>" alt="IMG-PRODUCT">
						
							<a href="product-detail.php?rmsgid=<?php echo($result['productId']); ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								view product
							</a>
						</div>
						</form>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								<?php echo($result['productName']);?>
								</a>

								<span class="stext-105 cl3">
								<?php echo($result['price']); ?> Tk
								</span>
							</div>

							
						</div>
					</div>
				</div>
				
				<?php }}else{echo("Sorry, product not found");} ?>
				
			</div>
			<!-- Load more -->
		</div>
	</section>
	
	<?php include("inc/footerservice.php"); ?>
  <?php include("inc/footer.php"); ?>
	

	