<?php 
include 'lib/Session.php'; 
Session::init();
include_once 'lib/Database.php';
include_once 'helpers/Format.php'; 

spl_autoload_register(function($class){
include_once"classes/".$class.".php";
});
$db=new Database();
$fm=new Format();
$pd=new Product();
$cat=new Catagory();
$ct=new Cart();	
$ur=new User();
 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<?php ob_start(); ?>

 <?php
    if ($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['login'])) {
     $userLog=$ur->userLogin($_POST);
    }
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main1.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header>
	

		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
				<?php 
			      if (isset($_GET['uid'])) {
			      	$userid= Session::get("userId");
			      	$deldata=$ct->delUserCart();
			      	Session::destroy();
			      }
                 ?>
			
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						<i style="font-size:15px;" class="zmdi zmdi-email"> contact us +456433454364</i>
					
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="helps.php" class="flex-c-m trans-04 p-lr-25">
							
							<i style="font-size:15px;" class="zmdi zmdi-help"> Help & FAQs</i>
						</a>
						<?php
						$login= Session::get("userlogin");
						if ($login==false) {
			           ?>

						<a href="#" class="flex-c-m trans-04 p-lr-25" data-target="#loginModal4" data-toggle="modal">
						<i style="font-size:15px;" class="zmdi zmdi-lock"> 	Login</i>
						
						</a>

						<a href="registation.php" class="flex-c-m trans-04 p-lr-25">
							
							<i style="font-size:15px;" class="zmdi zmdi-sign-in"> signup</i>
						</a>
						
						<?php }else{?>
						
						<a href="myaccount.php?updatecustomerInfo_reg=<?php echo(Session::get('userId')); ?>" class="flex-c-m trans-04 p-lr-25">
							 <i style="font-size:15px;" class="zmdi zmdi-account">  My Account</i>
							
						</a>
						
						<a href="chooseOption.php" class="flex-c-m trans-04 p-lr-25">
					
							<i style="font-size:15px;"class="zmdi zmdi-shopping-cart-plus"> Cart</i>
						</a>
						<a href="orderdetails.php" class="flex-c-m trans-04 p-lr-25">
						 <i style="font-size:15px;" class="zmdi zmdi-phone">Buy</i>
						 </a>
						 
						 <a href="orderdetails_rent.php" class="flex-c-m trans-04 p-lr-25">
						 <i style="font-size:15px;" class="zmdi zmdi-phone">Rent</i>
						 </a>
						 
						
						<a href="#" class="flex-c-m trans-04 p-lr-25">
						 <i style="font-size:15px;" class="zmdi zmdi-accounts"> Username: <?php echo(Session::get("userName")); ?></i> 
							
						</a>
						
						
						<a href="?uid=<?php echo(Session::get('userId')); ?>" class="flex-c-m trans-04 p-lr-25">
						 <i style="font-size:15px;" class="zmdi zmdi-accounts"> Logout</i> 
						</a>
					
                    <?php } ?>
	   
					</div>
				</div>
			</div>
			
			
		<!-- login code here -->	
			
			
			
	<div class="container">
      <div class="row">
	    <div class="col-xs-12">
		 
		 <div class="modal fade" data-keyboard="false" data-backdrop="static" id="loginModal4" tabindex="-1">
			    <div class="modal-dialog modal-lg">
				   <div style="height:540px;" class="modal-content">
				      <div style="background:#1782DC;" class="modal-header">
					    
						 <h4 class="modal-title">
						 </h4>
						  <button style="color:#FFFFFF;" class="close" data-dismiss="modal">&times;</button>
					   </div>
					   
					   <div class="modal-body">
					  
					         <div class="login_left">
							    <div class="custom_login">
								  
                                 <img src="images/icons/tr.png" class="img-rounded" alt="Cinque Terre" height="400" width="380">
		                        </div>
							  </div>
							  <div class="login_right">
							       <div class="custom_login">
                                     <i style="color:#1782DC;font-size:140px;margin-left:130px;" class="zmdi zmdi-accounts">
								     </i>
									  	<h4 style="font-style:bold;margin-bottom:30px;margin-left:73px;color:#1574C5;">CMY Online AC Shop</h4>
								
								
								
								<form action="" method="POST">
								 
								       
								 
										<div class="form-group">
										
										<input id="email" style="width:280px;margin-left:50px;height:43px;" class="form-control" placeholder="Your email" type="text" name="email"/>
										</div>
										<div class="form-group">
										
										<input style="width:280px;margin-left:50px;height:43px;" class="form-control" placeholder="Your password" type="password" name="password"/>
										</div>
										 <button style="width:280px;margin-left:50px;height:43px;" class="btn btn-primary" name="login">LogIn <i style="color:#FFFFFF;" class="zmdi zmdi-mall">
								     </i></button>
									 
									    <h4 style="font-size:15px;margin-top:15px;margin-left:70px;"><a href="forgotpassword.php">Forgotten account?</a> <a style="margin-left:50px;" href="registation.php">Sign Up</a></h4>
									 
									  </form>
								
								</div>
							 </div>
					  
					  </div>
					   <div class="modal-footer">
					   
						 <button class="btn btn-primary" data-dismiss="modal">Close</button>
						
					   </div>
					</div>
					
					
				 </div>
			  </div>
		 </div>
	 </div>
 </div>	
 
 
	
<?php
	$login= Session::get("userlogin");
	if ($login==true) {
	  $get_userid= Session::get('userId');
	}
	
	
	if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['service'])) {
    
		$service_category=$fm->validation($_POST['catId']);
		$service_code=$fm->validation($_POST['scode']);
		$service_contact=$fm->validation($_POST['contact']);
		$service_comment=$fm->validation($_POST['comment']);
		
		$service_category=mysqli_real_escape_string($db->link,$service_category);
		$service_code=mysqli_real_escape_string($db->link,$service_code);
		$service_contact= mysqli_real_escape_string($db->link,$service_contact);
		$service_comment= mysqli_real_escape_string($db->link,$service_comment);
		$date = date('Y-m-d');
		$error="";
	 if (empty($service_category)||empty($service_code)||empty($service_contact)||empty($service_comment)) {
		 
	 	header("Location:errorlogin.php");
		
	 }else{
		    
				  $query = "INSERT INTO service(service_category ,
					service_code,service_contact,service_problem,
					service_date,service_cusid,service_deliverydate)   
				   VALUES('$service_category','$service_code','$service_contact','$service_comment','$date','$get_userid','0')";  
				 $inserted_rows = $db->insert($query);    
				if ($inserted_rows) {  
				  	header("Location:service_success.php");
				}else {   
				 	header("Location:errorlogin.php");
				 } 	 
			 }
			}
 ?>
  
<div class="container">
   <div class="row">
	    <div class="col-xs-12">
		 <div class="modal fade" data-keyboard="false" data-backdrop="static" id="loginModal2" tabindex="-1">
			    <div class="modal-dialog">
				   <div class="modal-content">
				      <div style="background:#1F9CE8;" class="modal-header">
					    
						 <h4 style="color:#FFFFFF;margin-right:170px;" class="modal-title">
						   CMY Online AC Service 
						 </h4>
						  <button style="color:#FFFFFF;" class="close" data-dismiss="modal">&times;</button>
					   </div>
					   
					   <div class="modal-body">
					   
					     <form action="" method="POST">
						   
							 <div class="form-group">
							 <label style="margin-left:30px;" for="inputUserName">Select product Category</label>
			
							
						<select  style="background-color:#BFE3F8;width:400px;margin-left:30px;" class="form-control" name="catId">
                            <option>--/--</option>
                               <?php 
                            $cat=new Catagory();
                            $getCat=$cat->getAllCat();
                            if ($getCat) {
                                while ($result=$getCat->fetch_assoc()) {  
                             ?>
                              <option value="<?php echo($result['catId']) ?>"><?php echo($result['catName']) ?></option>
                            <?php }}else{echo("Category not found");} ?>
                            
                        </select>
							
							
						  </div>
						 
							<div class="form-group">
							<label style="margin-left:30px;" for="inputUserName">Enter product Name</label>
							<input style="background-color:#BFE3F8;width:400px;margin-left:30px;" class="form-control" type="text"  name="scode"/>
							</div>
							
							<div class="form-group">
							<label style="margin-left:30px;" for="inputUserName">Enter your contact No</label>
							<input style="background-color:#BFE3F8;width:400px;margin-left:30px;" class="form-control" type="text" name="contact"/>
							</div>
							
							<div class="form-group">
							<label style="margin-left:30px;" for="inputUserName">Enter  details product problem</label>
							<textarea style="background-color:#BFE3F8;width:400px;margin-left:30px;" class="form-control" rows="5" name="comment"></textarea>
							</div>
						
					
					   </div>
					   <div class="modal-footer">
					    <button class="btn btn-primary"  name="service">Send</button>
						 <button class="btn btn-primary" data-dismiss="modal">Close</button>
					   </div>
					   
					   </form>
					   
					   
					 </div>
				 </div>
			  </div>
			 </div>
	 </div>
</div>	
	  
	  

		<!-- login code here -->
 
 
			
		

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<img src="images/icons/1.png" alt="IMG-LOGO">
						<h4><span style="font-size:29px;color:yellow;font-style:bold;">C</span><span style="font-size:29px;color:#C8B534;font-style:bold;">M</span><span style="font-size:29px;color:yellow;font-style:bold;">Y</span><span style="font-size:17px;color:yellow;font-style:bold;"> ONLINE AC Shop </span></h4>
					</a>
					
					<!-- Menu desktop -->
					<div class="menu-desktop">
					
						<ul class="main-menu">
							<li class="active-menu">
								<a href="index.php">Home</a>
								
							</li>

							<li>
								<a href="product.php">Buy AC</a>
								
							</li>
							<li>
								<a href="rentproduct.php">Rent AC</a>
								
							</li>

							
                            <li>
								<a href="about.php">About</a>
							</li>

							<li>
								<a href="contact.php">Contact</a>
							</li>
							<?php
					 $login= Session::get("userlogin");
					if ($login==true) {?>
						
							<li>
								<a href="#" data-target="#loginModal2" data-toggle="modal">Service</a>
							</li>
							
							<li>
								<a href="viewServicedetails.php">Service Details</a>
							</li>
								<?php } ?>
						</ul>
					
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i style="color:#FFFFFF;" class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="
						<?php 
								$getData=$ct->checkCartTable();
								if ($getData) {
									$qty=session::get("qty");
								echo($qty);
								}else{
									echo("0");
								}
							?>
						
						">
							<i style="color:#FFFFFF;" class="zmdi zmdi-shopping-cart"></i>
						</div>
						
						
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="
						<?php 
								$getData=$ct->checkcartRentTable();
								if ($getData) {
									$qty=session::get("qty");
								echo($qty);
								}else{
									echo("0");
								}
							?>
						
						">
							<i style="color:#FFFFFF;" class="zmdi zmdi-bike"></i>
						</div>
						
						
                    </div>
				</nav>
				
			</div>	
		</div>
		
		
		
		

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						contact us: +5456444
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="helps.php" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>
						

						<a href="myaccount.php" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04" data-target="#loginModal4" data-toggle="modal">
							LogIn 
						</a>

						<a href="registation.php" class="flex-c-m p-lr-10 trans-04">
							Signup
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.php">Home</a>
				
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.php">Shop</a>
				</li>

				<li>
					<a href="shoping-cart.php" class="label1 rs1" data-label1="hot">Features</a>
				</li>

			

				<li>
					<a href="about.php">About</a>
				</li>

				<li>
					<a href="contact.php">Contact</a>
				</li>
			</ul>
		</div>
		<!-- Modal Search -->
		
		
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15" action="searchproduct.php" method="POST">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
					<input style="color:#FFFFFF;" type="submit" class="btn" name="submit" value="Search"/>
				</form>
			</div>
		</div>
		
	</header>
	
	
	
	

	  
	 
	
	
	
	
	
	