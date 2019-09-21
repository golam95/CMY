	
<?php include("inc/header.php"); ?>
	
<?php
$login= Session::get("userlogin");
if ($login==true) {
   header("Location:index.php");
}
 ?>
	
	<?php 
	if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['registation'])) {
    
		$name=$fm->validation($_POST['name']);
		$email=$fm->validation($_POST['email']);
		$contactno=$fm->validation($_POST['mobile']);
		$deliverylocation=$fm->validation($_POST['delivery']);
		$address=$fm->validation($_POST['address']);
		$gender=$fm->validation($_POST['gender']);
		$city=$fm->validation($_POST['city']);
		$country=$fm->validation($_POST['country']);
		
		$name=mysqli_real_escape_string($db->link,$name);
		$email=mysqli_real_escape_string($db->link,$email);
		$contactno=mysqli_real_escape_string($db->link,$contactno);
		$deliverylocation=mysqli_real_escape_string($db->link,$deliverylocation);
		$address=mysqli_real_escape_string($db->link,$address);
		$gender=mysqli_real_escape_string($db->link,$gender);
		$city=mysqli_real_escape_string($db->link,$city);
		$country=mysqli_real_escape_string($db->link,$country);
		$date = date('Y-m-d');
		
		$error="";
	 if (empty($name)) {
	 	$error="Name field must not be empty!!";
	}elseif(empty($email)){
		 $error="Email field must not be empty!!";
	}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	 	$error="Invalid Email Address!";
	 }elseif(empty($contactno)){
		 $error="Contact field must not be empty!!";
	 }elseif(empty($deliverylocation)){
		 $error="DeliveryLocation field must not be empty!!";
	 }elseif(empty($address)){
		 $error="Address field must not be empty!!";
	 }elseif(empty($gender)){
		$error="Gender field must not be empty!!";
		
	 }elseif(empty($city)){
		 	$error="City field must not be empty!!";
	 }elseif(empty($country)){
			$error="Country field must not be empty!!";
	}elseif(!preg_match('/^\+?([0-9]{1,4})\)?[-. ]?([0-9]{10})$/', $contactno) ) {
		 
		 $error="Invalid Contact Number";
		
	 }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	 	$error="Invalid Email Address!";
	 
	 }else{
		 
		     $mailquery="select * from customerinfo where cus_email='$email' limit 1";
             $mailcheck=$db->select($mailquery);
             if ($mailcheck <> false) {
             	$error="<span class='error'>Email already exist !</span>";
             	
             }else{
				  $query = "INSERT INTO customerinfo(cus_name,cus_email,cus_contactno,cus_deliverylocation,cus_address ,cus_sex,cus_date,cus_city,cus_country)   
				   VALUES('$name','$email','$contactno','$deliverylocation','$address','$gender','$date','$city','$country')";  
				 $inserted_rows = $db->insert($query);    
				if ($inserted_rows) {  
				   $msg="Registation is done" ;  
				}else {   
				  $error="Something is wrong!!!" ;  
				 }
				 
				 
			 }
		
	 }
	}


	?>
	
	
    <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/b.png');">
		<h2 class="ltext-105 cl0 txt-center">
			Registation
		</h2>
	</section>	

	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
	
		<div class="container">
		<i style="color:#1782DC;font-size:140px;margin-left:500px;" class="zmdi zmdi-accounts">
								     </i>
		<h4 style="padding:1px;color:#1782DC;font-weight:bold;font-size:37px;margin-left:420px;">Register Now</h4>
		
		 <div style="margin-top:10px;" class="form-group allignmentcenter">
						<?php 
							if (isset($error)) {
								echo("<span style='color:red;margin-left:470px;'>$error</span>");
							}
							if (isset($msg)) {
								echo("<span style='color:green;margin-left:30px;'>$msg</span>");
							}
						?>
                 </div>
		
			<div class="flex-w flex-tr">
			
				<div class="size-210 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					
					<form action="" method="post">
					      
										<div class="form-group">
										<label for="inputUserName">UserName</label>
										<input style="background:#E7F1F9;font-style:bold;width:470px;" class="form-control" type="text" name="name"/>
										</div>
										<div class="form-group">
										<label for="inputUserName">Email</label>
										<input style="background:#E7F1F9;font-style:bold;width:470px;" class="form-control" type="text" name="email"/>
										</div>
										<div class="form-group">
										
										<label for="inputUserName">Contact No</label>
										<input style="background:#E7F1F9;font-style:bold;width:470px;" class="form-control"  type="text" name="mobile"/>
										</div>
										<div class="form-group">
										
										<label for="inputUserName">Country</label>
										<input style="background:#E7F1F9;font-style:bold;width:470px;" class="form-control"  type="text" name="country"/>
										</div>
										
						
						
					
				</div>

				<div class="size-210 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					
										<div class="form-group">
										
										<label for="inputUserName">Password</label>
										<input style="background:#E7F1F9;font-style:bold;width:440px;" class="form-control"  type="password" name="delivery"/>
										</div>
										<div class="form-group">
										
										<label for="inputUserName">Customer Address</label>
										<input style="background:#E7F1F9;font-style:bold;width:440px;" class="form-control"  type="text" name="address"/>
										</div>
										<div class="form-group">
										
										<label for="inputUserName">Select Gender</label>
										
										<select style="background:#E7F1F9;font-style:bold;width:440px;" class="form-control" name="gender">
										<option>--Select--</option>
										<option>Male</option>
										<option>Female</option>
										</select>
										</div>
										<div class="form-group">
										
										<label for="inputUserName">City</label>
										<input style="background:#E7F1F9;font-style:bold;width:440px;" class="form-control"  type="text" name="city"/>
										</div>

					
					
				</div>
				<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="registation">
							Submit
						</button>
</form>
			</div>
		</div>
	</section>	
	
	
	<!-- Map -->
	
<?php include("inc/footer.php"); ?>