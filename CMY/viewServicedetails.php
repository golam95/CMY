<?php include("inc/header.php"); ?>
<?php
$login= Session::get("userlogin");
if ($login==false) {
   header("Location:login.php");
}
 ?>
  <?php
 if (isset($_GET['conId'])) {
    $id=$_GET['conId'];
    $time=$_GET['time'];
    $price=$_GET['price'];
    $confirm=$ct->productShiftConfirm($id,$time,$price);
  }  
  ?>
	
	<style>
	.content{margin-top:130px;margin-bottom:200px;}
	table.table {
    width: 100%;
    border: 1px solid #D0D0D0;
	}
	table.table th{text-align:center;color:#1782DC;font-size:20px;font-weight:bold;}
td.t-data {
    border: 1px solid #D2D2D2;
	text-align:center;
	color:black;
    padding: 5px !important;
	vertical-align: middle !important;
	font-size: 1em !important;
}
td.t-data a{text-decoration:none;padding:5px;background-color:red;color:white;font-weight:bold;border-radius:5px;}
th.t-head {
	background: #F1F1F1;
    color: #1782DC;
    font-size: 1em !important;
    padding: 0.6em !important;
    border: 1px solid #D2D2D2 !important;
}

a.at-in {
  float: left;
}
a.at-in{
	border:1px solid #DADADA;
	padding:1em 0;
	margin-left: 11%;
}
.shopping{padding:5px;margin-bottom:60px;margin-top:5px;}
.shopleft{padding-left:100px;margin-bottom:10px;}
	</style>
	<!-- breadcrumb -->
	    <div class="content">
    	<div class="cart-items">
    		<div class="container">
    			<h2 style="text-align:center;font-weight:bold;font-size:22px;color:#1782DC;margin-bottom:30px;">Your Product Service details</h2>
                    <table class="table">
                            <tr>
							
							
			
							 <th style="color:#FFFFFF;background:#1782DC;" class="t-head head-it">ID</th>
                                <th style="color:#FFFFFF;background:#1782DC;" class="t-head head-it">Products</th>
                                <th style="color:#FFFFFF;background:#1782DC;" class="t-head head-it" >Product Code</th>
                                <th style="color:#FFFFFF;background:#1782DC;" class="t-head head-it" >Date</th>
                                <th style="color:#FFFFFF;background:#1782DC;" class="t-head head-it" >Delivery Date</th>
								 <th style="color:#FFFFFF;background:#1782DC;" class="t-head head-it"></th>
                           </tr>
							
                            <?php 
							    $login= Session::get("userlogin");
								if ($login==true) {
									  $get_userid= Session::get('userId');
								}
	
								$query="select * from service where service_cusid ='$get_userid' and service_role ='1'";
								$msg=$db->select($query);
								$i=0;
								if ($msg) {
								   while ($result=$msg->fetch_assoc()) {
									$i++;	
								?>
								
                                <tr class="cross">
                                <td style="color:black;" class="ring-in t-data"><?php echo($i) ;?></td>
								
                                <td style="color:black;" class="ring-in t-data"><?php echo($result['service_category']) ;?></td>
								
                                <td style="color:black;" class="ring-in t-data"> <?php echo($result['service_code']); ?></td>
								
                                <td style="color:black;" class="ring-in t-data"><?php 
                                // $total=$result['price']*$result['quantity'];
                                echo($result['service_date']); 
                                ?></td>
                                <td style="color:black;" class="ring-in t-data"><?php echo($fm->formatDate($result['service_deliverydate'])) ;?></td>
								 <td style="color:black;" class="ring-in t-data"><img src="images/tt.jpg" class="img-rounded" alt="Cinque Terre"></td>
							 </tr>
                            
                            <?php }}else{ ?>
							 <tr class="cross">
							    <td></td>
							    <td></td>
							    <td></td>
							    <td><img src="images/404.png" class="img-rounded" alt="Cinque Terre"></td>
							    <td></td>
							  </tr>
							
							 <?php } ?>
							
                            </table>
    		</div>
    	</div>	

                    <div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						
					</div>
            </div>  	
       
    
	
	
		
	
<?php include("inc/footer.php"); ?>