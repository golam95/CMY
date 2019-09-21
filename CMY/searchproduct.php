<?php include("inc/header.php"); ?>

<?php 
	if (!isset($_POST['search'])||$_POST['search']==NULL) {
		header("Location: 404.php");
	}else{
		$searchid=$_POST['search'];
		
	}
 ?>
	
		
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/b.png');">
		<h2 class="ltext-105 cl0 txt-center">
			Search Product
		</h2>
	</section>	

	
	<!-- Product -->
	
	<div style="margin-bottom:140px;" class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
			  
			</div>
			
			<div class="row isotope-grid">
			
      
	  
	          <?php 
				
				   $getFpd=$pd-> searchProduct($searchid);
				   if ($getFpd) {
				   while ($result=$getFpd->fetch_assoc()) {
				   
			   ?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
					<form action="" method="">
						<div class="block2-pic hov-img0">
						<img src="admin/<?php echo($result['type']);?>" alt="IMG-PRODUCT">
						
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
				
				<?php }}else{
                header("Location: 404.php");

				} ?>
				
				
			
              </div>
			  
			 
			<!-- Load more -->
			
		</div>
	</div>
	<?php include("inc/footer.php"); ?>