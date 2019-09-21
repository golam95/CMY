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
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***Update Customer Service Information***</h1>
		</div>
		
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:10px;border:4px solid #0570B5;" href="viewcustomerService.php"><span class="glyphicon glyphicon-home" ></span> View Service</a>
	
     </div>



<?php 
		$id = $_GET['updatecustomerinfo'];
		$db = new database();
		$query = "SELECT * FROM service WHERE service_id =$id";
		$getData = $db->select($query)->fetch_assoc();
		$date = date('Y-m-d');

if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['Updateuserinfo'])) {
		
		$inputUserName=mysqli_real_escape_string($db->link,$_POST['check']);
		$Servicdate=mysqli_real_escape_string($db->link,$_POST['servicdate']);
		
		
		
         if ($inputUserName==""||$Servicdate=="") {
			
			$error="Field must not be Empty!!!";
		 
		}else{
			   $query = "UPDATE service
				SET
				service_role = '$inputUserName',
				service_deliverydate = '$Servicdate'
				WHERE service_id = $id";
				$update = $db->update($query);
				  if ($update) {  
				   $msg="Update the User Information!!" ;  
				  }else {   
				  $error="Opps,Sorry Not Update User Information!!" ;  
				 } 
		     }
        } 
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
	
	
		   
 
	 <div class="col-md-6">
	 
	      <div class="form-group">
			  <label for="inputUserName">Product Category</label>
			  <input class="form-control Disable" readonly type="text" name="inputEmail" value="<?php echo $getData['service_category']?>"/>
			 </div>
			 <div class="form-group">
			  <label for="inputUserName">Product Code</label>
			  <input class="form-control" type="text" name="inputContact" value="<?php echo $getData['service_code']?>"/>

			 </div>
			 <div class="form-group">
			  <label for="inputUserName">Contact No</label>
			  <input class="form-control" type="text" name="inputAddress" value="<?php echo $getData['service_contact']?>"/>
			 </div>
			<div class="form-group">
			  <label for="inputUserName">Product problems</label>
			  <input class="form-control" type="text" name="inputGender" value="<?php echo $getData['service_problem']?>"/>
			 </div>
		
	 </div>
	 
	 <div class="col-md-6">
	         
	    <div class="form-group">
			  <label for="inputUserName">Date</label>
			  <input class="form-control" type="text" name="inputCity" value="<?php echo $getData['service_date']?>"/>
			 </div>
	        
	     <div class="form-group">
			  <label for="inputUserName">Customer Id</label>
			  <input class="form-control" type="text" name="inputCountry" value="<?php echo $getData['service_cusid']?>"/>
			 </div>
			  <div class="form-group">
			   <label for="inputdesingation">Delivery Date</label>
			  <input class="form-control"   type="text" name="servicdate" value="<?php echo $getData['service_deliverydate']?>"/>
			 </div>
			  <div class="form-group">
			   <label for="inputdesingation">Check</label>
			  <input class="form-control"  type="text" name="check" value="<?php echo $getData['service_role']?>"/>

			 </div>
			 
			  
			 </div>
		 
		<div class="form-group">
                  <label for="gender"></label>
			      <button class="form-control button_access"  type="submit" name="Updateuserinfo" class="btn"><span class="glyphicon glyphicon-plus-sign">Update</button>
		</form>
		  
		   </div>
		   
		   </div>
		   
        </div>	

<?php include 'inc/footer.php';?>