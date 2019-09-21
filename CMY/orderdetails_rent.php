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
    			<h2 style="text-align:center;font-weight:bold;font-size:22px;color:#1782DC;margin-bottom:30px;">Your Order details</h2>
                    <table class="table">
                            <tr>
                                <th style="color:#FFFFFF;background:#1782DC;" class="t-head head-it">No</th>
                                <th style="color:#FFFFFF;background:#1782DC;" class="t-head head-it" >Product Name</th>
                                <th style="color:#FFFFFF;background:#1782DC;" class="t-head head-it" >Image</th>
                                <th style="color:#FFFFFF;background:#1782DC;" class="t-head head-it" >Quantity</th>
                                <th style="color:#FFFFFF;background:#1782DC;" class="t-head head-it" >Total Price</th>
                                <th style="color:#FFFFFF;background:#1782DC;" class="t-head head-it" >Date</th>
                                <th style="color:#FFFFFF;background:#1782DC;" class="t-head head-it" >Status</th>
                               
                            </tr>
                            <?php 
                            $uid= Session::get("userId");
                           // echo($uid);
                             $getOrdet=$ct->getOrderProduct_rent($uid);
                             if ($getOrdet) {
                                $i=0;
                                while ($result=$getOrdet->fetch_assoc()) {
                                    $i++;
                             
                             ?>
                            <tr class="cross">
                                <td style="color:black;" class="ring-in t-data"><?php echo($i) ;?></td>
                                <td style="color:black;" class="ring-in t-data"><?php echo($result['productName']) ;?></td>
                                <td style="color:black;" class="ring-in t-data"><img style="width:80px;height:80px;" src="admin/<?php echo($result['image']); ?>" alt=""/></td>
                                <td style="color:black;" class="ring-in t-data">Tk. <?php echo($result['quantity']); ?></td>
                                
                                <td style="color:black;" class="ring-in t-data">Tk. <?php 
                                // $total=$result['price']*$result['quantity'];
                                echo($result['price']); 
                                ?></td>
                                <td style="color:black;" class="ring-in t-data"><?php echo($fm->formatDate($result['date'])) ;?></td>
                                <td style="color:black;font-weight:bold;" class="ring-in t-data">
                                <?php 
                                if ($result['status']=='0') {
                                    echo("pending");
                                }elseif ($result['status']=='1') {
                                    echo("Delivery done");
                                
                                }
                                ?>
                                    
                                </td>
                               
                            </tr>
                            
                            <?php }}else{ ?>
							
							<tr class="cross">
							    <td></td>
							    <td></td>
							    <td></td>
								<td>
								<img src="images/404.png" class="img-rounded" alt="Cinque Terre"></td>
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