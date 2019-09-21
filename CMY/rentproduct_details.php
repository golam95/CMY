	
	<?php include("inc/header.php"); ?>

	
<?php
	
	$id = $_GET['rmsgid'];
	$db = new database();
	$query = "SELECT * FROM rent_product WHERE id=$id";
	$getData = $db->select($query)->fetch_assoc();
	$date = date('Y-m-d');
  
	
	if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['rentid'])) {
		$month=$_POST['month'];
		$size=$_POST['size'];
		$quantity=$_POST['quantity'];
		$addCart=$ct->addToCart_rentproduct($month,$size,$quantity,$id);
	}
	
	
	
?>
	
	
    <!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="rentproduct.php" class="stext-109 cl8 hov-cl1 trans-04">
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
								
                               <div class="item-slick3" data-thumb="admin/<?php echo $getData['rent_image']?>">
									<div class="wrap-pic-w pos-relative">
										<img src="admin/<?php echo $getData['rent_image']?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="admin/<?php echo $getData['rent_image']?>">
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
							<?php echo $getData['rent_pname']?>
						</h4>

						<span class="mtext-106 cl2">
							<?php echo $getData['rent_sellprice']?> Tk.<b style="color:red;margin-left:20px;">(per-month)</b>
						</span>
						

						<p class="stext-102 cl3 p-t-23">
							<?php echo $getData['rent_description']?>
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
										<select style="width:140px;" class="js-select2" name="size">
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
								<div class="size-203 flex-c-m respon6">
									Select Month
								</div>

								<div class="size-204 respon6-next">
									<div >
										<select style="width:140px;" class="js-select2" name="month">
											<option></option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>7</option>
											<option>8</option>
											<option>4</option>
											<option>9</option>
											<option>12</option>
											<option>13</option>
											<option>24</option>
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
					
					echo("<span style='color:#2769A1;margin-right:30px;font-weight:bold;'>$addCart</span>");
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

									<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" name="rentid">
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
	
	
	
		<?php include("inc/footer.php"); ?>
	