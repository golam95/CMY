	<?php ob_start(); ?>
	<?php include("inc/header.php"); ?>


	<style>
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
	background: #F5F5F5;
    color:#1782DC;
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
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Rent Cart
			</span>
		</div>
	</div>
<?php 
if (isset($_GET['delPro'])) {
	$delId=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delPro']);
	$delProduct=$ct->delProductByCart_rent($delId);
}

 ?>
	
 <?php 
 $getquantity="";
 if ($_SERVER['REQUEST_METHOD']=='POST') {
    $cartId=$_POST['cartId'];
    $quantity=$_POST['quantity'];
    $productId=$_POST['productId'];
	
	
	$query="select * from rent_product where id ='$productId'";
		 $msg=$db->select($query);
		 if ($msg) {
		while ($result=$msg->fetch_assoc()) {
			 $getquantity=$result['rent_quantity'];	
		 }
		}
		
	if ($quantity<=0) {
    	$delProduct=$ct->delProductByCart($cartId);
    }else if($quantity>$getquantity){
		echo '<script language="javascript">';
		echo 'alert("Sorry Quantity Not Available")';
		echo '</script>';
	}else{
		$updateQuantity=$ct->updateCartQuantity($cartId,$quantity);
	} 
			
 }
 ?>
	
	
  <?php 
 if (!isset($_GET['id'])) {
 	echo("<meta http-equiv='refresh' content='0;URL=?id=live'/>");
 }
  ?>
		

	<!-- Shoping Cart -->

		<div class="container">
		<div class="row">
			    	<h2 style="margin-left:500px;color:#1782DC;font-weight:bold;">Your Rent Cart</h2>
			    	<?php 
			    	if (isset($updateQuantity)) {
			    		echo($updateQuantity);
			    	}
			    	if (isset($delProduct)) {
			    		echo($delProduct);
			    	}
			    	 ?>
					 
						<table class="table">
						   <tr>
						     <th></th>
						     <th></th>
						     <th></th>
						     <th></th>
						     <th></th>
						     <th></th>
							  <th></th>
							 <th><a style="padding:5px;text-decoration:none;font-weight:bold;font-size:18px;background-color:#1782DC;color:white;border-radius:5px;" href="paymentoff.php"><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i> Check Out</a></th>
						   </tr>
							<tr>
								<th class="t-head head-it">SL</th>
								<th style="width:20%;" class="t-head">Product Name</th>
								<th class="t-head head-it ">Image</th>
								<th class="t-head head-it ">Price</th>
								<th class="t-head head-it ">Quantity</th>
								<th class="t-head head-it ">Month</th>
								<th class="t-head head-it ">Total Price</th>
								<th class="t-head head-it ">Action</th>
							</tr>
							<?php 
							 $getPd=$ct->getCartProduct_rent();
							 if ($getPd) {
							 	$i=0;
							 	$sum=0;
							 	$qty=0;
							 	while ($result=$getPd->fetch_assoc()) {
							 		$i++;
							 
							 ?>
							<tr class="cross">
								<td class="ring-in t-data"><?php echo($i) ;?></td>
								<td class="ring-in t-data"><?php echo($result['productName']) ;?></td>
								<td class="ring-in t-data"><img width="100px" height="100px" src="admin/<?php echo($result['image']); ?>" alt=""/></td>
								<td class="ring-in t-data">Tk. <?php echo($result['price']); ?></td>
								<td class="ring-in t-data">
								
								<form action="" method="POST">
									    <input type="hidden" name="cartId" value="<?php echo($result['cartId']); ?>"/>
										
										<input type="hidden" name="productId" value="<?php echo($result['productId']); ?>"/>

										<?php echo($result['quantity']); ?>
										
									</form>
									
								</td>
								
								<td class="ring-in t-data">
								   <?php echo($result['month']); ?>
								</td>
								
								<td class="ring-in t-data">Tk. <?php 
								$total=($result['price']*$result['month'])*$result['quantity'];
                                echo($total); 
								?></td>
								<td class="t-data t-w3l"><a onclick="return confirm('D you want to delete?');" href="?delPro=<?php echo($result['cartId']);?>">X</a></td>
							</tr>
							<?php 
							$qty=$qty+$result['quantity'];
							$sum=$sum+$total;
							Session::set("qty",$qty);
							Session::set("sum",$sum);
							 ?>
							
							<?php }} ?>
							
						</table>
						
						<?php 
						$getData=$ct->checkcartRentTable();
								if ($getData) {
						 ?>
						<table style="margin-left:850px;text-align:left;" width="40%">
							<tr>
								<th style="color:#1782DC;">Sub Total : </th>
								<td style="font-weight:bold;">Tk.<?php echo($sum) ;?></td>
							</tr>
							<tr>
								<th style="color:#1782DC;">VAT : </th>
								<td style="font-weight:bold;">10%</td>
							</tr>
							<tr>
								<th style="color:#1782DC;">Grand Total :</th>
								<td style="font-weight:bold;">Tk.<?php 
								$vat=$sum*.1;
								$gtotal=$sum+$vat;
								echo($gtotal);
								 ?> </td>
							</tr>
					   </table>
					   <?php }else{
					   	header("Location: index.php");
					   	// echo("Cart Empty! plz shop now");
					   	} ?>
					   </div>
					 </div>
					<br/>
					
					<div class="shopping">
						<div class="shopleft">
							<a href="rentproduct.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						
					</div>
					
				</div>

		
	
<?php include("inc/footer.php"); ?>