<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
	
<?php	
        $countEmployee='0';
        $countCustomer='0';
        $countProduct='0';
        $countContact='0';
        $countCustomerOrder='0';
		
		$sql = "SELECT * FROM employeeinfo";
		$query = $db->select($sql);
		if($query){
        $countEmployee = $query->num_rows;
		echo $countEmployee;
		}else{
		  echo $countEmployee;
		}
		
		
		$sql = "SELECT * FROM customerinfo";
		$query = $db->select($sql);
		if($query){
        $countCustomer = $query->num_rows;
		echo $countCustomer;
		}else{
		  echo $countCustomer;
		}
		
	
		$sql = "SELECT * FROM product";
		$query = $db->select($sql);
		if($query){
        $countProduct= $query->num_rows;
		echo $countProduct;
		}else{
		  echo $countProduct;
		}
		
	
		$sql = "SELECT * FROM contact";
		$query = $db->select($sql);
		if($query){
        $countContact= $query->num_rows;
		echo $countContact;
		}else{
		  echo $countContact;
		}
		
		
		$sql = "SELECT * FROM cus_order";
		$query = $db->select($sql);
		if($query){
        $countCustomerOrder= $query->num_rows;
		echo $countCustomerOrder;
		}else{
		  echo $countCustomerOrder;
		}
		
?>


  
	
	

    <div class="content">
	
	       
      <div class="container">
		    <div class="row">
			   <div class="title_alginment">
			      <h2 style="margin-left:120px;border:17px solid #4F91C5;width:884px;"><img src="images/90.png"  alt="Cinque Terre" width="852px;"></h2>
			   </div>
			  </div>
			</div>
			
	
	     <div class="listofitem">
		   
		   
		 <div class="listofitem">
		    <div class="container">
		    <div class="row">
			
			   <div class="col-md-3">
						 <div style="height:220px;background:#4F91C5;" class="customDiv">
						    <h2>Customer Feedback</h2>
							
							<h1><?php echo $countContact; ?></h1>
						   <h3><a href="inbox.php">View Details</a></h3>
						 </div>
		               </div>
					   <div class="col-md-3">
						 <div style="height:220px;background:#4F91C5;" class="customDiv">
						    <h2>Customer Order</h2>
							
							<h1><?php echo $countCustomerOrder;?></h1>
						   <h3><a href="orderlist.php">View Details</a></h3>
						 </div>
						</div>
					   <div class="col-md-3">
						 <div style="height:220px;background:#4F91C5;" class="customDiv">
						    <h2>Stock Notification</h2>
							
							<h1>
							<?php 
							$lowstocknotification1="0";
							$lowStockSql = "SELECT * FROM product WHERE quantity <= 5";
							$lowStockQuery = $db->select($lowStockSql);
							if($lowStockQuery){
								$lowstocknotification = $lowStockQuery->num_rows;
								echo $lowstocknotification;
							}else{
								echo '0';
							}
				
		                   ?>
							</h1>
						   <h3><a href="productlist.php">View Details</a></h3>
						 </div>
		               </div>
					   
		       </div>
		  </div>
		  
		  
		  
		  
		  </div>






<div class="listofitem">
		  <div class="container">
		    <div class="row">
			   <div class="col-md-3">
						 <div style="height:220px;background:#4F91C5;" class="customDiv">
						    <h2 style="color:white;">Total Employee</h2>
							
							<h1><?php echo $countEmployee; ?></h1>
						   <h3><a href="viewEmp.php">View Details</a></h3>
						 </div>
		               </div>
					   <div class="col-md-3">
						 <div style="height:220px;background:#4F91C5;" class="customDiv">
						    <h2 style="color:white;">Total Customer</h2>
							
							<h1><?php echo $countCustomer; ?></h1>
						   <h3><a href="viewCustomerinformation.php">View Details</a></h3>
						 </div>
						</div>
					   <div class="col-md-3">
						 <div style="height:220px;background:#4F91C5;" class="customDiv">
						    <h2 style="color:white;">Total Products</h2>
							
							<h1><?php echo $countProduct; ?></h1>
						   <h3><a href="productlist.php">View Details</a></h3>
						 </div>
		               </div>
					   
		       </div>
		  </div>
		  
		  </div>		  

   

<?php include 'inc/footer.php';?>
