<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php 
$role=Session::get("adminRole");
if ($role!='0') {
$id=Session::get("adminId");
$name=Session::get("adminName");
$page = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}"; 
$query="INSERT INTO track_visitor (userId,user_name,page) VALUES ('$id','$name','$page')";
$insertdata=$db->insert($query);

}
 ?>
<style>
.form-group{width:400px;margin-left:60px;}
.button_access{margin-left:270px;}
.allignmentcenter{margin-left:340px;}
</style>

<div class="content">
        <div class="header">
		 
	
		<div class="titleright">
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">*** Customer Details***</h1>
		</div>
		
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:10px;border:4px solid #0570B5;" href="viewcustomerService.php"><span class="glyphicon glyphicon-home" ></span>Customer Service</a>
		
		
     </div>



<?php 
		$id = $_GET['updatecustomerinfo'];
		$db = new database();
		$query = "SELECT * FROM customerinfo WHERE cus_id =$id";
		$getData = $db->select($query)->fetch_assoc();
		$date = date('Y-m-d');

 ?>
			  
		  
 <div class="main-content">
            
           <div class="row">
		   <div class="col-xs-12">
	 <form action="" method="post">
	
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
	
	<div class="col-xs-12">
			<div class="form-group allignmentcenter">
			  <label for="inputUserName">Name</label>
			  <input class="form-control" type="text" name="inputUserName" value="<?php echo $getData['cus_name']?>"/>
			 </div>
				   
				   </div>
		   
 
	 <div class="col-md-6">
	 
	      <div class="form-group">
			  <label for="inputUserName">Email</label>
			  <input class="form-control Disable" readonly type="text" name="inputEmail" value="<?php echo $getData['cus_email']?>"/>
			 </div>
			 <div class="form-group">
			  <label for="inputUserName">Contact No</label>
			  <input class="form-control" type="text" name="inputContact" value="<?php echo $getData['cus_contactno']?>"/>
			 </div>
			 <div class="form-group">
			  <label for="inputUserName">Address</label>
			  <input class="form-control" type="text" name="inputAddress" value="<?php echo $getData['cus_address']?>"/>
			 </div>
			<div class="form-group">
			  <label for="inputUserName">Gender</label>
			  <input class="form-control" type="text" name="inputGender" value="<?php echo $getData['cus_sex']?>"/>
			 </div>
		
	 </div>
	 
	 <div class="col-md-6">
	         
	    <div class="form-group">
			  <label for="inputUserName">City</label>
			  <input class="form-control" type="text" name="inputCity" value="<?php echo $getData['cus_city']?>"/>
			 </div>
	        
	     <div class="form-group">
			  <label for="inputUserName">Country</label>
			  <input class="form-control" type="text" name="inputCountry" value="<?php echo $getData['cus_country']?>"/>
			 </div>
			  <div class="form-group">
			   <label for="inputdesingation">Role</label>
			  <input class="form-control"   type="text" name="inputRole" value="<?php echo $getData['role']?>"/>
			 </div>
			  <div class="form-group">
			   <label for="inputdesingation">Password</label>
			  <input class="form-control"  type="password" name="inputPasword" value="<?php echo $getData['cus_deliverylocation']?>"/>
			 </div>
			 
			  
			 </div>
		 
		<div class="form-group">
                  <label for="gender"></label>
			    
		</form>
		  
		   </div>
		   
		   </div>
		   
        </div>	

<?php include 'inc/footer.php';?>