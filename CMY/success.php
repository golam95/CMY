<?php include("inc/header.php"); ?>
<?php
$login= Session::get("userlogin");
if ($login==false) {
   header("Location:login.php");
}
 ?>
 <?php
if (!isset($_GET['smid'])||$_GET['smid']==NULL ||$_GET['smid']!=$_GET['smid']) {
    echo "<script>window.location = '404.php';</script>";
}else{
    // $id=$_GET['catid'];
    $smid=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['smid']);
     $orderId=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['orderId']);
    //echo( $orderId);
}
?>
	
	<style>
	.success{width: 500px;min-height: 200px;text-align: center;border: 1px solid #ddd;margin: 0 auto; padding: 50px;}
    .success h2{
        border-bottom: 1px solid #ddd;
        margin-bottom: 40px;
        padding-bottom: 1px;
    }
    .success p{
      line-height: 25px;
	  color:black;
    }
	.shopping{margin-left:550px;}
	
	   
	</style>
	<!-- breadcrumb -->
	

	<div style="margin-top:120px;margin-bottom:150px;" class="main">
	
	
					
    <div class="content">
       <div class="section group">
       <div class="success">
       <h2 style="color:#1782DC;">Success</h2>
      
       <?php
        
		$price=0;
       //$uid= Session::get("userId");
       $amount=$ct->payableAmount($smid,$orderId);
      //print_r($amount);
       if ($amount) {
       
          while ($result=$amount->fetch_assoc()) {
           $price=$result['price'];
		 
		}
        } 
        ?>
       <p>Total payable amount(including vat) : Tk.
       <?php 
      // echo($sum."<br>");
      
       echo($price);
        ?>
       </p>
        <p>Thank you for parchasing.Receive your order succseefully.we will contact you as soon as possible with delivery details.Check your mail..</p>
          
       </div>

      
          </div>
   
   
   
   
   
              <div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						
					</div>
   
 		
 	</div>
	
	</div>
	
		
	
<?php include("inc/footer.php"); ?>