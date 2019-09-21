	<?php include("inc/header.php"); ?>
	<?php include_once'classes/Product.php'; ?>
	<?php include_once 'helpers/Format.php'; ?>
	<?php include_once 'classes/Catagory.php'; ?>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/b.png');">
		<h2 class="ltext-105 cl0 txt-center">
			Product 
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			
		<div class="row">
		             
					 <div class="col-md-12">
					    <div style="float:left;" class="col-md-3">
						  <div class="categories">
							   <h3>Categories</h3>
									<ul class="tree-list-pad">
										
										<?php 
										$query="select * from category";
										$msg=$db->select($query);
										$i=0;
										if ($msg) {
										while ($result=$msg->fetch_assoc()) {
										$i++;	
										?>
									
										<li style="border-bottom:2px solid #F5F5F5;">
										<a style="font-size:14px;margin-bottom:12px;" href="viewspecificproduct.php?passcate=<?php echo($result['catId']);?>"><?php echo($result['catName']);?></a>
										
										</li>
		    
                                      <?php } } ?>
										
									</ul>
								</div>
								
							 <div class="cat-img">
									<img class="img-responsive " src="images/46.jpg" alt="">
								</div>
								
								 <div class="cat-img">
									<img class="img-responsive " src="images/47.jpg" alt="">
								</div>
								
								
								
						</div>
						
						
						<div style="float:right;" class="col-md-9">
						   
						   <table class="table ">
		  <tr style="font-size:19px;">
			<th class="t-head head-it"></th>
			<th class="t-head">All Products</th>
		<th class="t-head"></th>

			<th class="t-head"></th>
		  </tr>
		
	</table>
						   
						   
						

			<div class="row isotope-grid">
			
			   <?php
	
	
					   $get="";
					   $db = new database();
					   if(isset($_GET["passcate"])) {
						 
						 $get=$_GET["passcate"]; 
								
						}
					  
					   $find="select * from product where catId='$get'"; 
					   $msg=$db->select($find);
									if ($msg) {
									   while ($result=$msg->fetch_assoc()) {
										   
											
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
									<?php echo($result['price']); ?> ৳
								</span>
							</div>

							
						</div>
					</div>
				</div>
				<?php }}else{ ?>
			
			      <div class="col-sm-10">
				      <h2 style="margin-top:15px;">Sorry,The product is comming soon..!!!</h2>
				  </div>
			
			   <?php } ?>
			</div>
             </div>
		</div>
	  </div>
		</div>
	</section>	
	
			
	
<?php include("inc/footer.php"); ?>
		
		