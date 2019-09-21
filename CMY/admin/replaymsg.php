<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
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
   <style>
.form-group{width:400px;margin-left:300px;}
.button_access{margin-left:270px;}
.allignmentcenter{margin-left:340px;}
</style>
<?php
if (!isset($_GET['rmsgid']) || $_GET['rmsgid']==NULL) {
   echo("<script>window.location='inbox.php';</script>");
   // header("Location: catlist.php");
}else{
    $rmsgid=$_GET['rmsgid'];
}
 ?>
 <div class="content">
 
 <div class="header">
		<div class="titleright">
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***Reply Message***</h1>
		</div>
		
		
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="inbox.php"><span class="glyphicon glyphicon-home" ></span> View Inbox</a>
		
	</div>
        <div class="grid_10">
		
		
            <div class="box round first grid">
               
                <?php 
                 if ($_SERVER['REQUEST_METHOD']=='POST') {
                       $to=$fm->validation($_POST['toemail']);
                        $from=$fm->validation($_POST['fromemail']);
                        $subject=$fm->validation($_POST['subject']);
                        $message=$fm->validation($_POST['message']);
                        $name=$_POST['name'];
                        $to=mysqli_real_escape_string($db->link,$to);
                        $from=mysqli_real_escape_string($db->link,$from);
                        $subject=mysqli_real_escape_string($db->link,$subject);
                        $message=mysqli_real_escape_string($db->link,$message);
                        if (empty($from)||empty($subject)||empty($message)) {
                          $error="Field must not be empty!!";
						}elseif (!filter_var($from,FILTER_VALIDATE_EMAIL)) {
							
	 	                 $error="Invalid Email Address!";
						  
                       }else{
						   
                         include '../mailSender.php';
						 
                          $mail->setFrom($from, 'Eshop Online Shop & Service');
                          $mail->addReplyTo($from, 'Eshop Online Shop & Service');
                          $mail->Subject = $subject;

                         $mail->Body = 'Dear '.$name.','.$message.'.Thanks for your comment.';
                        $mail->addAddress($to, $name);
                        $sendmail=mail($to,$subject,$message,$from);
                         if(!$mail->send()) {
							  echo("<script>alert('Message could not be sent');</script>");
                            echo 'Mailer Error: ' . $mail->ErrorInfo;
                            } else {
								 echo("<script>alert('Message has been sent');</script>");
                                echo "<script>window.location = 'inbox.php';</script>";
								   
                             
                        }
                    }
                   }
                 ?>
                <div class="block"> 
				
			  <div class="form-group allignmentcenter">
				   <?php 
						if (isset($error)) {
							
							echo("<span style='color: red;margin-left:90px;font-weight:bold;'>$error</span>");
						}
						if (isset($msg)) {
							
							echo("<span style='color: green;margin-left:50px;font-weight:bold;'>$msg</span>");
						}
					  ?>
			   </div>
						
                
					
					
					 <form action="" method="post" >
				 <?php 
                    $query="select * from contact where contactid='$rmsgid'";
                    $msg=$db->select($query);
                    if ($msg) {
                       
                        while ($result=$msg->fetch_assoc()) {
                           
                        
                     ?>
			
				 
		    <div class="form-group">
			  <label for="inputUserName">To</label>
			  
			  <input type="hidden"  name="name" value="<?php echo($result['name']); ?>"/>
			
			  
			  <input class="form-control" readonly="readonly" type="text" name="toemail" value="<?php echo($result['email']); ?>"/>
			  
			 </div>
				 <div class="form-group">
			  <label for="inputUserName">From</label>
			  <input class="form-control" type="text" name="fromemail"/>
			 </div>
			 <div class="form-group">
			  <label for="inputUserName">Subject</label>
			  <input class="form-control" type="text" name="subject"/>
			 </div>
			 <div class="form-group">
			  <label for="inputUserName">Message body</label>
			  <textarea class="form-control" type="text" name="message"> </textarea>
			 </div>
				 
				 <div class="form-group">
				  <label for="inputUserName"></label>
			    <button style="width:400px;" class="form-control"  type="submit" class="btn"><span class="glyphicon glyphicon-plus-sign">Send</button>
				
				</div>
				<?php }} ?>
				</form>
					
					
					
					
					
					
					
					
					
                </div>
            </div>
        </div>
 <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>