<?php include("inc/header.php"); ?>
<?php
$login= Session::get("userlogin");
if ($login==false) {
   header("Location:login.php");
}
 ?>
  <?php
     $id=Session::get("userId");
    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['Update'])) {
       
       $updateData= $ur->updateUserData($_POST,$id);
      }
  ?>
	
	<style>
	.tblone{width: 700px;margin: 0 auto;border: 2px solid #ddd;font-weight:bold;margin-bottom:20px;}
  .tblone tr td{text-align: center; border: 1px solid #D2D2D2;height:40px;}
  .tblone tr th{text-align: center; border: 1px solid #D2D2D2;height:30px;color:white;}
  .division{width: 50%;float: left;}
  .tbltwo{
    float:right;text-align:left; width=50%;border: 2px solid #ddd;margin-right: 84px;margin-top: 12px;
  }
   .tbltwo tr td{text-align:justify;padding:5px 10px;  }
   .orderbutton{margin-bottom:140px;margin-top:50px;}
    </style>
	<!-- breadcrumb -->
	

		

	 <div style="margin-bottom40px;"class="main">
	
    <div class="content">
     
    <?php 
      $id=Session::get("userId");
      $getUdata=$ur->getUserData($id);
      if ($getUdata) {
      	while ($result=$getUdata->fetch_assoc()) {
     ?>
    <form action="" method="post">
	<h3 style="margin-top:150px;margin-left:500px;margin-bottom:20px;color:#1782DC;">Update Customer Information</h3>
        <table class="tblone">
		
        <?php 
        if (isset($updateData)) {
        echo("<tr><td colspan='2'>".$updateData."</td></tr>");
      }
       ?>
      
        <tr>
            <td style="background:#1782DC;color:#FFFFFF;" width="20%">Name</td>
            
            <td><input style="color:black;margin-left:20px;" type="text" name="name" value="<?php echo($result['cus_name']); ?>"></td>
		 </tr>
        <tr>
            <td style="background:#1782DC;color:#FFFFFF;">Email</td>
            <td><input style="color:black;margin-left:20px;" type="text" name="email" value="<?php echo($result['cus_email']); ?>"></td>
        </tr>
        <tr>
            <td style="background:#1782DC;color:#FFFFFF;">Phone</td>
            <td><input style="color:black;margin-left:20px;" type="text" name="phone" value="<?php echo($result['cus_contactno']); ?>"></td>
        </tr>
        <tr>
            <td style="background:#1782DC;color:#FFFFFF;">Delivery Address</td>
            <td><input style="color:black;margin-left:20px;" type="text" name="address" value="<?php echo($result['cus_address']); ?>"></td>
        </tr>
        <tr>
            <td style="background:#1782DC;color:#FFFFFF;">City</td>
            <td><input style="color:black;margin-left:20px;" type="text" name="city" value="<?php echo($result['cus_city']); ?>"></td>
        </tr>
        <tr>
            <td style="background:#1782DC;color:#FFFFFF;">Country</td>
            <td><input style="color:black;margin-left:20px;" type="text" name="country" value="<?php echo($result['cus_country']); ?>"></td>
        </tr>
       <tr>
            <td style="background:#1782DC;color:#FFFFFF;">Action</td>
            <td><input style="padding:5px;font-weight:bold;color:#FFFFFF;background:#449D44;margin-left:20px;border-radius:5px;" type="submit" name="Update" value="Update"></td>
			
        </tr>
      </table>
    </form>
    <?php }} ?>
 		</div>
		<div class="orderbutton">
		   <a style="margin-left:580px;padding:9px;background:#1574C5;color:#FFFFFF;margin-top:10px;border-radius:5px;" href="paymentOffline.php">Payment Details</a>
		</div>
		
        
 	</div>
		
	
<?php include("inc/footer.php"); ?>