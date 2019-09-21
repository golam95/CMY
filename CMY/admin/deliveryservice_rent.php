<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once'../classes/User.php'; ?>

<style>
.form-group{width:400px;margin-left:60px;}
.button_access{margin-left:270px;}
.allignmentcenter{margin-left:340px;}
</style>


<?php 
$id = $_GET['updatedeli'];
$db = new database();
$query = "SELECT * FROM cus_orderent WHERE orderId =$id";
$getData = $db->select($query)->fetch_assoc();
$date = date('Y-m-d');

if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])) {
	
	    $Order_id=$fm->validation($_POST['orderid']);
		$prodcutname=$fm->validation($_POST['productname']);
		$suppliername=$fm->validation($_POST['serviceprovider']);
		$userid=$fm->validation($_POST['userid']);
		
		
		$Order_id=mysqli_real_escape_string($db->link,$Order_id);    
		$prodcutname=mysqli_real_escape_string($db->link,$prodcutname);     
		$suppliername=mysqli_real_escape_string($db->link,$suppliername); 
		$userid=mysqli_real_escape_string($db->link,$userid); 
		$date = date('Y-m-d');    
		$error="";
		 
		
	 if (empty($Order_id)||empty($prodcutname)||empty($suppliername)||empty($userid)) {
	    $error="Field must not be empty";
	 }elseif (!filter_var($prodcutname,FILTER_SANITIZE_SPECIAL_CHARS)) {
	 	$error="Invalid Name!";
	
	}else{
		
		$mailquery="select * from rent_deliveryservice where deliser_id ='$Order_id' limit 1";
             $mailcheck=$db->select($mailquery);
             if ($mailcheck <> false) {
				 
                     $error="Sorry, The order is already pending..!!" ; 
			}else{
				
				$mailquery="select * from rent_deliveryservice where deliser_proname ='$suppliername' limit 1";
				$mailcheck=$db->select($mailquery);
				 
				if ($mailcheck <> false) {
					 
						 $error="Sorry, The Supplier is busy..!!" ; 
						 
				}else{
					
				$mailquery1="select * from deliveryserevice where deliser_proname ='$suppliername' limit 1";
				 $mailcheck1=$db->select($mailquery1);
					if ($mailcheck <> false) {
					 
						 $error="Sorry, The Supplier is busy..!!" ; 
						 
				    }else{
					
					  $query = "INSERT INTO rent_deliveryservice(deliser_id,deliser_name,deliser_proname,deliser_date,userId)   VALUES('$Order_id','$prodcutname','$suppliername','$date','$userid')"; 
					  $inserted_rows = $db->insert($query);    
					  if ($inserted_rows) {  
					   $msg="Add a New Position!!" ;  
					  }else {   
					  $error="Not Add a New Position!!" ;  
					  
					  }
						
						
					}
					
					
				}
				
			 }
		 
	     }
	  
	 } 
 ?>





<div class="content">
        <div class="header">
		
		<div class="titleright">
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***Add Delivery Service Information***</h1>
		</div>
		
			<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:20px;border:4px solid #0570B5;" href="viewrent_deliveryservice.php"><span class="glyphicon glyphicon-home" ></span> View  delivery service</a>
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="rent_orderlist.php"><span class="glyphicon glyphicon-home" ></span> RentOrderList</a>
		
		
     </div>

		  
 <div class="main-content">
            
           <div class="row">
		  
		   
		   <div class="col-xs-12">
		       
	<form action="" method="post">
	
	<div class="col-xs-12">
				   <div class="form-group allignmentcenter">
	       <?php 
				if (isset($error)) {
					echo("<span style='color: red;margin-left:90px;font-weight:bold;'>$error</span>");
				}
				if (isset($msg)) {
					echo("<span style='color: green;margin-left:50px;font-weight:bold;'>$msg</span>");
				}
			  ?>
	   </div>
	   
       <div class="col-md-6">
		  <div class="form-group">
			  <label for="inputUserName">Order Id</label>
			  <input class="form-control" type="text" name="orderid" value="<?php echo $getData['orderId']?>"/>
			  
              </div>
				   
		    </div>
		
	 <div class="col-md-6">
	 
			 <div class="form-group">
			  <label for="inputUserName">Product Name</label>
			  <input class="form-control" type="text" name="productname" value="<?php echo $getData['productName']?>"/>
			 </div>
		
	 </div>
	 
	 <div class="col-md-6">
	         
	    <div class="form-group">
		
		 <label for="inputUserName">Select Service Provider</label>
		  <select  class="form-control" name="serviceprovider">
		  
		 
		           
                               <?php 
							   
							   $query = "SELECT * FROM employeeinfo WHERE emp_designation ='External Employee'";
							   $msg=$db->select($query);
							   if ($msg) {
								$i=0;
								while ($result=$msg->fetch_assoc()) {
									$i++;
                          ?>
						  
                              <option value="<?php echo($result['emp_name']) ?>"><?php echo($result['emp_name']) ?></option>
                            <?php }}else{echo("Service Provider not found");} ?>
                            

                        </select>
		
			 </div>
	        
	     </div>
		 
		 
		  <div class="col-md-6">
		  <div class="form-group">
			  <label for="inputUserName">User Id</label>
			  <input class="form-control" type="text" name="userid" value="<?php echo $getData['userId']?>"/>
			  
              </div>
				   
		    </div>
		 
		 
		 
	<div class="form-group">
                  <label for="gender"></label>
			      <button class="form-control button_access"  type="submit" name="submit" class="btn"><span class="glyphicon glyphicon-plus-sign">Add</button>
				
		  </form>
		  
		   </div>
		   
		   </div>
		   
        </div>		
		   

<?php include 'inc/footer.php';?>