<?php ob_start(); ?>
<?php include("inc/header.php"); ?>
<style>
div.relative {
	padding: 2px;
    position: relative;
     top: 30px;
     left: 400px;
    width: 600px;
    height: 400px;
    border: 3px solid #73AD21;
} 
.panel-heading a:hover{text-decoration: none;}

/*div.absolute {
    position: absolute;
    top: 80px;
    right: 0;
    width: 200px;
    height: 100px;
    border: 3px solid #73AD21;
}*/
</style>
<!--header-->
		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>ForgotPassword</span></h3>
			</div>
		</div>
	<!--banner-->

	
	
	
    <div class="content">
 <div class="login">
              <div class="main-agileits">
               <div class="form-w3agile">
              
			  <h3>Password Recovery</h3>
			  <div class="alert alert-danger" role="alert">
								
						
						
			   <?php 
	if ($_SERVER['REQUEST_METHOD']=='POST') {
       
		$email=$fm->validation($_POST['email']);
		$email=mysqli_real_escape_string($db->link,$email);
		 if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
         echo("<span class='error'>Invalid Email Address!</span>");
        }else{
		 $mailquery="select * from users where email='$email' limit 1";
         $checkmail=$db->select($mailquery);
		if ($checkmail !=false) {
			while ($value=$checkmail->fetch_assoc()) {
				$userid=$value['userId'];
				$name=$value['name'];
				$username=$value['typeofuser'];
			}
			$text=substr($email, 0,3);
			$rand=rand(10000,99999);
			$newpass="$text$rand";
			$pass=md5($newpass);
			$query="update users
                    set
                     password='$pass'
                     where userId='$userid'";
             $updated_row=$db->update($query);
             $to="$email";
             $query="select * from users where role='0' or role='2'";
             $msg=$db->select($query)->fetch_assoc();
             $from=$msg['email'];
             // $header="From:$from\n";
             // $header .= 'MIME-Version: 1.0' . "\r\n";
             // $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
             $subject="your password";
             $message="Your username is " .$username.  " and Password "  .$newpass.  " plz visit website to login.";
             // $sendmail=mail($to, $subject, $message,$header);
             /*new*/
              include 'mailSender.php';
              $mail->setFrom($from, 'BD Online Shop & Service');
              $mail->addReplyTo($from, 'BD Online Shop & Service');
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
            </div>
            <!-- /panel-heading -->
            <div class="panel-body">
                
                <form class="form-horizontal" action="" method="post"  id="getOrderReportForm">
                  <div class="form-group">
                    
					
                    <div class="col-sm-12">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <input type="email" name="email"  class="form-control" id="startDate"  placeholder="Enter Your Valid Email" />
                    </div>
					 </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <input type="submit" class="btn btn-success" name="submit" id="generateReportBtn"> 
                     
		   <div class="panel-heading" style="text-align: center; font-size: 20px;color:#C8A067; ">
               <a href="login.php">Login!</a>
                    </div>
                  </div>
                </form>
                
            </div>
            </div>
            <!-- /panel-body -->
        </div>
    </div>
    <!-- /col-dm-12 -->
</div>

</div>
 
<?php include("inc/foote.php"); ?>
 <?php ob_end_flush(); ?>