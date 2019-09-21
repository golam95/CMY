	<?php include("inc/header.php"); ?>
<?php
$login= Session::get("userlogin");
if ($login==true) {
   header("Location:index.php");
}
 ?>
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/b.png');">
		<h2 class="ltext-105 cl0 txt-center">
			Forgot password
		</h2>
	</section>	
	

<?php 
	if ($_SERVER['REQUEST_METHOD']=='POST') {
       
		$email=$fm->validation($_POST['email']);
		$email=mysqli_real_escape_string($db->link,$email);
		if(empty($email)){
			 echo("<span class='error'>Email field must not empty!</span>");
		}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		 echo("<span class='error'>Invalid email!</span>");
        }else{
		 $mailquery="select * from customerinfo where cus_email='$email' and role='1' limit 1";
         $checkmail=$db->select($mailquery);
		if ($checkmail !=false) {
			while ($value=$checkmail->fetch_assoc()) {
				$userid=$value['cus_id'];
				$name=$value['cus_name'];
				$username=$value['role'];
			}
			$text=substr($email,0,3);
			$rand=rand(10000,99999);
			$newpass="$text$rand";
			$pass=($newpass);
			$query="update customerinfo
                    set
                     cus_deliverylocation='$pass'
                     where cus_id='$userid'";
             $updated_row=$db->update($query);
			 
             $to="$email";
             $query="select * from customerinfo where role='0' or role='3'";
             $msg=$db->select($query)->fetch_assoc();
             $from=$msg['cus_email'];
            
             $subject="your password";
             $message="Your username is " .$name.  " and Password "  .$newpass.  " plz visit website to login.";
             // $sendmail=mail($to, $subject, $message,$header);
             /*new*/
              include 'mailSender.php';
			  
			  
              $mail->setFrom($from, 'Eshop Online Shop & Service');
              $mail->addReplyTo($from, 'Eshop Online Shop & Service');
              $mail->Subject = $subject;
               $mail->Body = 'Dear '.$name.','.$message.'.Thanks  you .';
                $mail->addAddress($to, $name);
                $sendmail=mail($to,$subject,$message,$from);
               if(!$mail->send()) {
                   echo("<script>alert('Message could not be sent');</script>");
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                    } else {
                      echo("<script>alert('Message has been sent');</script>");
                      echo "<script>window.location = 'login.php';</script>";
                }
			
		   }else{
			  echo("<span style='color: red;font-size: 20px;'>Email not exist!</span>");
		}
	  }
	}
	 ?>
	
	
	<!-- Content page -->
	
	<section class="bg0 p-t-104 p-b-116">
	  <div class="container">
	    <div class="row">
		<h4 style="padding:1px;color:#1782DC;font-weight:bold;font-size:37px;margin-left:520px;">Forgot Password</h4>
		
		  <form action="" method="POST">
		
		  	<div class="size-210 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="form-group">
									<div class="form-group">
										<input style="background:#E7F1F9;font-style:bold;width:440px;margin-left:354px;"placeholder="Enter valid email address" class="form-control"  type="text"name="email"/>
										</div>
										
										<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="sendemail">
							        Send
						</button>

				</div>
		</div>
		</form>
	  </div>
		
	</section>	
	
	
	<!-- Map -->

	<?php include("inc/footer.php"); ?>