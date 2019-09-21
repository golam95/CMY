	
	<?php include("inc/header.php"); ?>
	
	<?php
	$login= Session::get("userlogin");
	if ($login!=true) {
	   header("Location:index.php");
	}
 ?>
	

   <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/b.png');">
		<h2 class="ltext-105 cl0 txt-center">
			Registation
		</h2>
	</section>	
	
	
	
<?php 
		$id = $_GET['updatecustomerInfo_reg'];
		$db = new database();
		$query = "SELECT * FROM customerinfo WHERE cus_id =$id";
		$getData = $db->select($query)->fetch_assoc();
		$date = date('Y-m-d');
		

if ($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['updatere'])) {
		
		$name=mysqli_real_escape_string($db->link,$_POST['name']);
		$email=mysqli_real_escape_string($db->link,$_POST['email']);
		$contact=mysqli_real_escape_string($db->link,$_POST['contact']);
		$password=mysqli_real_escape_string($db->link,$_POST['password']);
		$address=mysqli_real_escape_string($db->link,$_POST['address']);
		$gender=mysqli_real_escape_string($db->link,$_POST['gender']);
		$city=mysqli_real_escape_string($db->link,$_POST['city']);
		$country=mysqli_real_escape_string($db->link,($_POST['country']));
		
		if ($name==""||$email==""||$contact==""||$password==""||$address==""||$gender==""||$city==""||$country=="") {
			
			$error="Field must not be Empty!!!";
		
		}else{
			
				$query = "UPDATE customerinfo
				SET
				cus_name = '$name',
				cus_email = '$email',
				cus_contactno = '$contact',
				cus_deliverylocation = '$password',
				cus_address ='$address',
				cus_sex ='$gender',
				cus_city ='$city',
				cus_country ='$country'
				WHERE cus_id = $id";
				$update = $db->update($query);
				  if ($update) {  
				   $msg="Update the Customer Information!!" ;  
				  }else {   
				  $error="Opps,Sorry Not Update Customer Information!!" ;  
				 } 
		   }
      } 
 ?>
	
	
	
	
	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
	
		<div class="container">
		
		<h4 style="padding:1px;color:#1782DC;font-weight:bold;font-size:37px;margin-left:420px;"> Update Information</h4>
			<div class="flex-w flex-tr">
			
				<div class="size-210 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					
					<form action="" method="post">
					
				<div class="form-group allignmentcenter">
					   <?php 
							if (isset($error)) {
								
								echo("<span style='color: red;margin-left:0px;font-weight:bold;'>$error</span>");
							}
							if (isset($msg)) {
								
								echo("<span style='color: green;margin-left:0px;font-weight:bold;'>$msg</span>");
							}
						  ?>
				   </div>
					      
										<div class="form-group">
										<label for="inputUserName">UserName</label>
										<input style="background:#E7F1F9;font-style:bold;width:470px;" class="form-control"  type="text" name="name" value="<?php echo $getData['cus_name']?>"/>
										</div>
										<div class="form-group">
										<label for="inputUserName">Email</label>
										<input style="background:#E7F1F9;font-style:bold;width:470px;" class="form-control"  type="text" name="email" value="<?php echo $getData['cus_email']?>" />
										</div>
										<div class="form-group">
										
										<label for="inputUserName">Contact No</label>
										<input style="background:#E7F1F9;font-style:bold;width:470px;" class="form-control"  type="text" name="contact" value="<?php echo $getData['cus_contactno']?>"/>
										
 
										</div>
										<div class="form-group">
										
										<label for="inputUserName">Country</label>
										<input style="background:#E7F1F9;font-style:bold;width:470px;" class="form-control" type="text" name="country" value="<?php echo $getData['cus_country']?>"/>
										</div>
										
						
						
					
				</div>

				<div class="size-210 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="form-group">
										
										<label for="inputUserName">New Password</label>
										<input style="background:#E7F1F9;font-style:bold;width:440px;" class="form-control"  type="password" name="password" value="<?php echo $getData['cus_deliverylocation']?>"/>
										</div>
										<div class="form-group">
										
										<label for="inputUserName">Customer Address</label>
										<input style="background:#E7F1F9;font-style:bold;width:440px;" class="form-control"  type="text" name="address" value="<?php echo $getData['cus_address']?>"/>
										

										</div>
										<div class="form-group">
										
										<label for="inputUserName">Gender</label>
										
										
										<select style="background:#E7F1F9;font-style:bold;width:440px;" class="form-control" name="gender">
										<option>--Select--</option>
										<option>Male</option>
										<option>Female</option>
										</select>
										
										</div>
										
										
										
										
										<div class="form-group">
										
										<label for="inputUserName">City</label>
										<input style="background:#E7F1F9;font-style:bold;width:440px;" class="form-control" type="text" name="city" value="<?php echo $getData['cus_city']?>"/>
										</div>

 
					
					
				</div>
				<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="updatere">
							Update
						</button>
</form>
			</div>
		</div>
	</section>	
	
	
	<!-- Map -->
	

	<?php include("inc/footer.php"); ?>