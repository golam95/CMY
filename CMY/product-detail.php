	
	<?php include("inc/header.php"); ?>

	
<?php
	
	$id = $_GET['rmsgid'];
	$db = new database();
	$query = "SELECT * FROM product WHERE productId=$id";
	$getData = $db->select($query)->fetch_assoc();
	$date = date('Y-m-d');
  
	if ($_SERVER['REQUEST_METHOD']=='POST' &&isset($_POST['cart'])) {
		$size=$_POST['time'];
		$quantity=$_POST['quantity'];
		$addCart=$ct->addToCart($size,$quantity,$id);
	}
?>
	
	<style>
	.sec-relate-product{margin-top:60px;}
	
	</style>
    <!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="product.php" class="stext-109 cl8 hov-cl1 trans-04">
				product view
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
          </div>
	</div>
	

	
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
		
			<div class="row">
			
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div style="height:540px;" class="slick3 gallery-lb">
								
                               <div class="item-slick3" data-thumb="admin/<?php echo $getData['image']?>">
									<div class="wrap-pic-w pos-relative">
										<img src="admin/<?php echo $getData['image']?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="admin/<?php echo $getData['image']?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $getData['productName']?>
						</h4>

						<span class="mtext-106 cl2">
							<?php echo $getData['price']?> Tk.
						</span>

						<p class="stext-102 cl3 p-t-23">
							<?php echo $getData['body']?>
						</p>
						
						
						<form action="" method="POST">
						
						<!--  -->
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Select AC Size
								</div>

								<div class="size-204 respon6-next">
									<div >
										<select style="width:140px;" class="js-select2" name="time">
											<option ></option>
											<option> S</option>
											<option> M</option>
											<option> L</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
								
								<div class="form-group allignmentcenter">
	       <?php 
				if (isset($addCart)) {
					
					echo("<span style='color:#2769A1;margin-left:0px;margin-right:140px;font-weight:bold;'>$addCart</span>");
				}
			  ?>
	   </div>
								
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="1">
										
										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>

									<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" name="cart">
										Add to cart
									</button>
								</div>
							</div>	
						</div>
<form>
						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			
			

		</div>
		
	</section>
	
	
	


	<!-- Related Products -->
	<section class="sec-relate-product">
	<div class="container">
		<div class="p-b-45">
				<h3 style="color:#1782DC;" class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					
					
			 <?php 
				   $getPd=$pd->getAllProduct();
					if ($getPd) {
						$i=0;
						while ($result=$getPd->fetch_assoc()) {
							$i++;
					 ?>
					
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="admin/<?php echo($result['image']);?>" alt="IMG-PRODUCT">
								<a href="product-detail.php?rmsgid=<?php echo($result['productId']); ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								view product
							</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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
		</div>
		
		
		
		</div>
			
	</section>
		
	<?php include("inc/footer.php"); ?>