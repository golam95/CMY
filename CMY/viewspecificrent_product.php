	<?php include("inc/header.php"); ?>
	<?php include_once'classes/Product.php'; ?>
	<?php include_once 'helpers/Format.php'; ?>
	<?php include_once 'classes/Catagory.php'; ?>
	
	
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/b.png');">
		<h2 class="ltext-105 cl0 txt-center">
			Rent AC 
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			
		<div class="row">
		             
					 <div class="col-md-12">
					    <div style="float:left;" class="col-md-3">
						  <div class="categories">
							   <h3>Categories</h3>
									<ul class="tree-list-pad">
									
									  <?php 
										$query="select * from category";
										$msg=$db->select($query);
										$i=0;
										if ($msg) {
										while ($result=$msg->fetch_assoc()) {
										$i++;	
										?>
										
										<li style="border-bottom:2px solid #F5F5F5;">
										<a style="font-size:14px;margin-bottom:12px;" href="viewspecificrent_product.php?passcate=<?php echo($result['catId']);?>"><?php echo($result['catName']);?></a>
										
										</li>
		   
									
                                      <?php } } ?>
										
									</ul>
								</div>
								
							 <div class="cat-img">
									<img class="img-responsive " src="images/46.jpg" alt="">
								</div>
								
								 <div class="cat-img">
									<img class="img-responsive " src="images/47.jpg" alt="">
								</div>
						  </div>
						
						
		<div style="float:right;" class="col-md-9">
		
		<form action="" method="POST">
						   
	 <table id="datatable3" class="table">
		  <tr style="font-size:19px;">
			<th class="t-head head-it"></th>
			<th class="t-head">All Products</th>
		<th class="t-head"></th>

			<th class="t-head"></th>
		  </tr>
		 
		   
		   
			   <?php
	
					   $get="";
					   $db = new database();
					   if(isset($_GET["passcate"])) {
						 
						 $get=$_GET["passcate"]; 
								
						}
					  
					   $find="select * from rent_product where rent_category='$get'"; 
					   $msg=$db->select($find);
									if ($msg) {
									   while ($result=$msg->fetch_assoc()) {
										   
											
						?>
		   
		   <tr class="cross">
			<td class="ring-in t-data"> 
			<div class="sed">
			  <img src="admin/<?php echo($result['rent_image']);?>" alt="IMG-PRODUCT" height="130" width="80">
			</div>
				

			 </td>
			<td style="width:60%;" class="t-data">
			<p style="color:gray;"><?php echo($result['rent_pname']);?></p>
			<p style="color:gray;"><?php echo($result['rent_description']);?></p>
			<h5 style="color:gray;"><?php echo($result['rent_category']);?></h5>
				
			<h6 style="color:#0062BD;font-weight:bold;margin-top:5px;">Type:<?php echo($result['rent_type']);?></h6>
			<br/>
		
			
           </td>
			<td class="t-data">
			
			
			<h3 style="color:#F56767;font-size:17px;font-weight:bold;">৳ <?php echo($result['rent_sellprice']);?></h3>
			<input type="hidden" name="money" value="<?php echo($result['rent_sellprice']);?>">
			
			<input type="hidden" name="id" value="<?php echo($result['id']);?>">
			
			<p style="color:#F56767;font-weight:bold;">Per-month</p>
			
		
	  </td>
	  <td class="t-data t-w3l">
			<a style="background:#1782DC;" class="add-1" href="rentproduct_details.php?rmsgid=<?php echo($result['id']);?>"><span class="glyphicon glyphicon-trash" aria-hidden="true">Rent Now</span></a>
			</td>
			
		  </tr>
		  
									   <?php }}else {  ?>
		   <tr class="cross">
		  
		    <td></td>
			  
		   <td>
		   <h2>Sorry,The product is comming soon..!!!</h2>
		   </td>
		   
		   </tr>
		  
			<?php }?>
	</table>
		</form>				   
	</div>
	</div>
						          
					
		</div>
		</div>
		
	</section>	
	
	
	
	<?php include("inc/footer.php"); ?>
		