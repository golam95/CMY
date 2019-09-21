<?php 
include '../lib/Session.php';
Session::checkLogin();
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/Format.php';?>
<?php 
$db=new Database();
$fm=new Format();

 ?>
 <?php 
$role=Session::get("adminRole");
if ($role!='0') {
  
$id=Session::get("adminId");
$name=Session::get("adminName");
$page = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}"; 
$query="INSERT INTO track_visitor (userId,user_name,page) VALUES ('$id','$name',  '$page')";
$insertdata=$db->insert($query);

}
 ?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Password Recovery</title>
<link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css">
 <script type="text/javascript" src="inc/jquery.min.js"></script>
<script type="text/javascript" src="inc/bootstrap.min.js"></script>
<style>
.id{background-image: url("images/b1.jpg");}
div.relative {
	padding: 2px;
    position: relative;
     top: 30px;
     left: 400px;
    width: 600px;
    height: 400px;
    border: 3px solid #0C4778;
} 
.panel-heading a:hover{text-decoration: none;}

.form-horizontal{margin-top:70px;}
.headerinforation{padding:5px;background-color:#0C4778;}
.headerinforation h2{text-align:center;font-weight:bold;padding:3px;color:white;}
.headerinformation_two{padding:3px;background-color:#2769A1;}
.headerinformation_two h4{text-align:center;font-weight:bold;padding:3px;color:white;}
.footerinformation{padding:5px;background-color:#2769A1;margin-top:80px;}
.footerinformation p{text-align:center;font-style:italic;padding:3px;color:white;padding:5px;}
.footerinformation a{color:#FFFFFF;}
#generateReportBtn1{background-color:#2769A1;color:#FFFFFF;}
</style>

</head>
<body class="id">


<div class="headerinforation">
   <h2>Admin Panel</h2>
</div>

<div class="headerinformation_two">
   <h4>CMY Online AC shop</h4>
</div>

<div class="relative">
 <div class="row">
              <div class="col-md-12">
			  <div><h2 style="text-align:center;font-weight:bold;color:#2769A1;">Forgot Password</h2></div>
            <div class="panel-heading" style="text-align: center; font-size: 17px;color:#2769A1;">
			  
			
                <?php 
	if ($_SERVER['REQUEST_METHOD']=='POST') {
       
		$email=$fm->validation($_POST['email']);
		$email=mysqli_real_escape_string($db->link,$email);
		if(empty($email)){
			 echo("<span class='error'>Email field must not empty!</span>");
		}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		 echo("<span class='error'>Invalid email!</span>");
        }else{
		 $mailquery="select * from customerinfo where cus_email='$email' limit 1";
         $checkmail=$db->select($mailquery);
		if ($checkmail !=false) {
			while ($value=$checkmail->fetch_assoc()) {
				$userid=$value['cus_id'];
				$name=$value['cus_name'];
				$username=$value['role'];
			}
			$text=substr($email, 0,3);
			$rand=rand(10000,99999);
			$newpass="$text$rand";
			$pass=md5($newpass);
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
              include '../mailSender.php';
			  
			  
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
            </div>
            <!-- /panel-heading -->
            <div class="panel-body">
                
                <form class="form-horizontal" action="" method="post"  id="getOrderReportForm">
                  <div class="form-group">
                    <label style="color:#2769A1;" for="startDate" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email"   name="email"  class="form-control" id="startDate"  placeholder="Enter Your Valid Email" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" name="submit" id="generateReportBtn1">Send Mail</button>
                    </div>
                  </div>
                </form>
           <div class="panel-heading" style="text-align: center; font-size: 18px; ">
               <a style="color:#2769A1;" href="login.php">LogIn</a>
            </div>
			
            </div>
          
   
    </div>
    
</div>

</div>

<div class="footerinformation">
   <p>&copy; 2018 CMY Online AC Market . All rights reserved | Design by <a href="http://facebook.com">owner</a></p>
</div>

</body>
</html>
