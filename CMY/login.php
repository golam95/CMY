<?php include("inc/header.php"); ?>
<?php
$login= Session::get("userlogin");
if ($login==true) {
   header("Location:product.php");
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
       <h2 style="color:#1782DC;">Alert Message</h2>
      
       
       <p style="padding:5px;font-size:18px;color:red;">You must need to login before ordering...</p>
          
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