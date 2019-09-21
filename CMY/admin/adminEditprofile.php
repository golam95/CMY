<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Catagory.php'; ?>

<?php 
$id = $_GET['rmsgid'];
$db = new database();
$query = "SELECT * FROM customerinfo WHERE cus_id=$id";
$getData = $db->select($query)->fetch_assoc();


if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['updateadmininfo'])) {
	
	    $admin_Name=$fm->validation($_POST['inputName']);
		$admin_Address=$fm->validation($_POST['inputAddress']);
		$admin_City=$fm->validation($_POST['inputCity']);
		$admin_Password=$fm->validation ($_POST['inputPassword']);
		
		$admin_Name=mysqli_real_escape_string($db->link,$admin_Name);
		$admin_Address=mysqli_real_escape_string($db->link,$admin_Address);
		$admin_City=mysqli_real_escape_string($db->link,$admin_City);
		$admin_Password=mysqli_real_escape_string($db->link,($admin_Password));
		$error="";
			if (empty($admin_Name)||empty($admin_Address)||empty($admin_City)) {
				$error="Field must not be Empty!!!";
			 }elseif (!filter_var($admin_Name,FILTER_SANITIZE_SPECIAL_CHARS)) {
				$error="Invalid Name!";
			 
			}else{
		        
				$query = "UPDATE customerinfo
				SET
				cus_name = '$admin_Name',
				cus_deliverylocation = '$admin_Password',
				cus_address = '$admin_Address',
				cus_country = '$admin_City'
				WHERE cus_id = $id";
				$update = $db->update($query);
				 if ($update) {  
				   $msg="Update the Admin Profile!!" ;  
				  }else {   
				  $error="Opps,Sorry Not Update Admin Profile!!" ;  
				 }  
	        }
	     }

?>

<div class="content">
       <div class="header">
	
		<div class="titleright">
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***Update Admin Profile***</h1>
		</div>
		
			<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
			
			
     </div>
	 
	 
 <div class="main-content">
            
           <div class="row">
		   
		   <div class="col-xs-8">
		       
			   <form action="" method="post">
			   
			   <div class="form-group">
	       <?php 
				if (isset($error)) {
					
					echo("<span style='color: red;margin-left:90px;font-weight:bold;'>$error</span>");
				}
				if (isset($msg)) {
					
					echo("<span style='color: green;margin-left:50px;font-weight:bold;'>$msg</span>");
				}
			  ?>
	   </div>
		 
		 <div class="form-group">
			  <label for="inputUserName">Name</label>
			  <input class="form-control" type="text" name="inputName" value="<?php echo($getData['cus_name']);?>"/>
			 </div>
	       
		   <div class="form-group">
			  <label for="inputUserName">Address</label>
			  <input class="form-control" type="text" name="inputAddress" value="<?php echo($getData['cus_address']);?>"/>
			 </div>
			 
			  <div class="form-group">
			  <label for="inputUserName">City</label>
			  <input class="form-control" type="text" name="inputCity" value="<?php echo($getData['cus_city']);?>"/>
			 </div>
			  <div class="form-group">
			  <label for="inputUserName">password</label>
			  <input class="form-control" type="password" name="inputPassword" value="<?php echo($getData['cus_deliverylocation']);?>"/>
			 </div>
			<br/>
			<div class="form-group">
                <button class="form-control"  type="submit" name="updateadmininfo" class="btn"><span class="glyphicon glyphicon-plus-sign">Update</button>
				
		  </form>
		   </div>
		    </div>
		 </div>		
		  
<?php include 'inc/footer.php';?>