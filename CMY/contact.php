
   <?php include("inc/header.php"); ?>
   
   <?php 
	if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['contact'])) {
    
		$name=$fm->validation($_POST['name']);
		$mobile=$fm->validation($_POST['phone']);
		$email=$fm->validation($_POST['email']);
		$body=$fm->validation($_POST['msg']);
		$name=mysqli_real_escape_string($db->link,$name);
		$mobile=mysqli_real_escape_string($db->link,$mobile);
		$email=mysqli_real_escape_string($db->link,$email);
		$body=mysqli_real_escape_string($db->link,$body);
	    $error="";
	 if (empty($name)) {
	 	$error="Name field must not be empty!!";
		
	 }elseif (!filter_var($name,FILTER_SANITIZE_SPECIAL_CHARS)) {
		 $error="Invalid Name!";
	 } elseif (empty($mobile)) {
		 
	 	$error="Contact field must not be empty!!";
		
	 }elseif(!preg_match('/^\+?([0-9]{1,4})\)?[-. ]?([0-9]{10})$/', $mobile) ) {
		 
		 $error="Invalid Contact Number";
		 
	 }elseif (empty($email)) {
	 	$error="Email field must not be empty!!";
	 }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	 	$error="Invalid Email Address!";
	 }elseif (empty($body)) {
	 	$error="Message field must not be empty!!";
	 }else{
	 	 $query = "INSERT INTO contact(name,mobileNo,email,body)   
           VALUES('$name','$mobile','$email','$body')";  
        $inserted_rows = $db->insert($query);    
        if ($inserted_rows) {  
           $msg="Message send successfully" ;  
        }else {   
          $error="Message not send!!!" ;  
         }
	 }
	 } 


	?>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/b.png');">
		<h2 class="ltext-105 cl0 txt-center">
			Contact
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form action="" method="post">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Send Us A Message
						</h4>
					 <div class="form-group allignmentcenter">
						<?php 
							if (isset($error)) {
								echo("<span style='color:red;margin-left:110px;'>$error</span>");
							}
							if (isset($msg)) {
								echo("<span style='color:green;margin-left:30px;'>$msg</span>");
							}
						?>
                      </div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 size-116 p-l-62 p-r-30" type="text" name="name" placeholder="Enter your name.."/>
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON"/>
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 size-116 p-l-62 p-r-30" type="text" name="phone" placeholder="Enter your contact no">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Enter your email address">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>

						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 size-120 p-lr-28 p-tb-25" name="msg" placeholder="How Can We Help?"></textarea>
						</div>

						<button class="flex-c-m stext-101 cl0 size-1211 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="contact">
							Submit
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								Eshop Store Center 8th floor, 379 Panthapath St, Dhaka Bangladesh 
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Lets Talk
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								+1 800 1236879
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Sale Support
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								contact@example.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
	
	<?php include("inc/footer.php"); ?>