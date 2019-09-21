	<?php ob_start(); ?>
	<?php include("inc/header.php"); ?>


	<style>
	table.table {
    width: 100%;
    border: 1px solid #D0D0D0;
	margin-top:100px;
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
				
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				
			</span>
		</div>
	</div>

	<!-- Shoping Cart -->

	
		<div class="container">
		<div class="row">
			    	<h2 style="margin-left:500px;color:#1782DC;font-weight:bold;">  Cart Option</h2>
			    	
					 
						<table class="table">
						   <tr>
						     <th></th>
						     <th style="width:20%;"></th>
						     <th><a href="shoping-cart.php"><img src="images/h.png" class="img-rounded" alt="Cinque Terre"></a></th>
						     <th><a href="rent_cart.php"><img src="images/u.png" class="img-rounded" alt="Cinque Terre"></a></th>
						     <th style="width:20%;" ></th>
						     <th></th>
							  <th></th>
							 <th></th>
						   </tr>
						   
						   
							
							
						</table>
					 </div>
			    </div>
					<br/>
					
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						
					</div>
					
				</div>

		
	
<?php include("inc/footer.php"); ?>