	
	<?php include("inc/header.php"); ?>
		<?php
$login= Session::get("userlogin");
if ($login==false) {
   header("Location:login.php");
}
 ?>
	
	<style>
	.payment{width: 1000px;min-height: 200px;text-align: center;border: 1px solid #ddd;margin: 0 auto; padding: 50px;margin-left:90px;}
 .payment h2{
        border-bottom: 1px solid #ddd;
        margin-bottom: 40px;
        padding-bottom: 20px;
		color:#1782DC;
		margin-bottom:30px;
		font-weight:bold;
	
    }
.payment a{
	 margin-left:10px;
     background: #1782DC none repeat scroll 0 0;
     border-radius: 10px;
     color: white;
     font-size: 20px;
	 padding:10px;
	 border:6px solid #0C4B71;

    }
	.back{
        width: 150px;margin: 10px auto;padding-bottom: 4px;text-align: center;display: block;border: 1px dotted #333; border-radius: 10px;margin-top:30px;background-color:#1782DC;font-weight:bold;padding:5px;
		
    }
	.back a{color:white;text-decoration:none;margin-left:20px;}
	</style>
	<!-- breadcrumb -->
	
<?php 
	if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
    
		$transaction=$fm->validation($_POST['transaction']);
		$contact=$fm->validation($_POST['contact']);
		
		$transaction=mysqli_real_escape_string($db->link,$transaction);
		$contact=mysqli_real_escape_string($db->link,$contact);
		$date = date('Y-m-d');
		
	
		 if (empty($transaction)||empty($contact)) {
			header("Location: errorlogin.php");
		}elseif(!preg_match('/^\+?([0-9]{1,4})\)?[-. ]?([0-9]{10})$/', $contact) ) {
				header("Location: errorlogin.php");
		 }else{
		         $query = "INSERT INTO customerinfo(cus_name,cus_email,cus_contactno,cus_deliverylocation,cus_address ,cus_sex,cus_date,cus_city,cus_country,role)   
				   VALUES('$name','$email','$contactno','$deliverylocation','$address','$gender','$date','$city','$country','1')";  
				 $inserted_rows = $db->insert($query);    
				if ($inserted_rows) {  
				   $msg="Registation is done" ;  
				}else {   
				  $error="Something is wrong!!!" ;  
				 }
			}
	}


	?>
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		
		<div class="container">
		<div class="row">
			    	
			  <div class="back">
           <a href="shoping-cart.php"><i class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i> Back To Cart</a><br/>
       </div>   	
		<div class="section group">
       <div class="payment">
       <h2>Choose payment option</h2>
	   	
          
		    <a href="#" class="flex-c-m trans-04 p-lr-25" data-target="#loginModal6" data-toggle="modal"><i class="glyphicon glyphicon-phone-alt" aria-hidden="true"></i> Bykash payment   <span style="font-weight:bold;color:#FFFFFF;padding-left:20px;">   (+8801718512673)</span></a><br/>
      
			 <a href="rentpaymentOffline.php" class="flex-c-m trans-04 p-lr-25"><i class="glyphicon glyphicon-phone-alt" aria-hidden="true"></i> Offline Order</a><br/>
			 
			  <a href="#" class="flex-c-m trans-04 p-lr-25"><i class="glyphicon glyphicon-phone-alt" aria-hidden="true"></i> Paypal   <span style="font-weight:bold;color:#FFFFFF;padding-left:20px;"> </span></a><br/>
          
       </div>	
      
      </div>
	 
	  
<div class="container">
   <div class="row">
	    <div class="col-xs-12">
		 <div class="modal fade" data-keyboard="false" data-backdrop="static" id="loginModal6" tabindex="-1">
			    <div class="modal-dialog">
				   <div class="modal-content">
				      <div style="background:#1F9CE8;" class="modal-header">
					     <button style="color:#FFFFFF;" class="close" data-dismiss="modal">&times;</button>
						 <h4 style="color:#FFFFFF;margin-right:170px;" class="modal-title">
						   Bykash payment
						 </h4>
					   </div>
					   <div class="modal-body">
					     <form action="" method="POST">
						    <div class="form-group">
							<label style="margin-left:30px;" for="inputUserName">Enter your bkash contact number</label>
							<input style="background-color:#BFE3F8;width:400px;margin-left:30px;" class="form-control" type="text" name="contact"/>
							</div>
							<div class="form-group">
							
							<label style="margin-left:30px;" for="inputUserName">Enter your transaction id</label>
							<input style="background-color:#BFE3F8;width:400px;margin-left:30px;" class="form-control" type="text" name="transaction"/>
							</div>
						  </form>
					   </div>
					   <div class="modal-footer">
					    <button class="btn btn-primary" name="send">Send</button>
						 <button class="btn btn-primary" data-dismiss="modal">Close</button>
					   </div>
					 </div>
				 </div>
			  </div>
			 </div>
	 </div>
</div>	
	  </div>
					</div>
					<br/>
					
					<div class="shopping">
			        </div>
			</div>
	</form>
		
	
<?php include("inc/footer.php"); ?>
<?php ob_end_flush(); ?>