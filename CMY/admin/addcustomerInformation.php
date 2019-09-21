<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once'../classes/User.php'; ?>

<style>
.form-group{width:400px;margin-left:60px;}
.button_access{margin-left:270px;}
.allignmentcenter{margin-left:340px;}
</style>

<div class="content">
        <div class="header">
		
		<div class="titleright">
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***Add User Information***</h1>
		</div>
		
			<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:20px;border:4px solid #0570B5;" href="viewCustomerinformation.php"><span class="glyphicon glyphicon-home" ></span> View Customer</a>
		
	</div>


<?php 
	if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
    
		$name=$fm->validation($_POST['inputUserName']);
		$email=$fm->validation($_POST['inputEmail']);
		$contactno=$fm->validation($_POST['inputContactno']);
		$deliverylocation=$fm->validation($_POST['inputPasword']);
		$address=$fm->validation($_POST['inputAddress']);
		$gender=$fm->validation($_POST['inputGender']);
		$city=$fm->validation($_POST['inputCity']);
		$country=$fm->validation($_POST['inputCountry']);
		
		
		
		$name=mysqli_real_escape_string($db->link,$name);
		$email=mysqli_real_escape_string($db->link,$email);
		$contactno=mysqli_real_escape_string($db->link,$contactno);
		$deliverylocation=mysqli_real_escape_string($db->link,md5($deliverylocation));
		$address=mysqli_real_escape_string($db->link,$address);
		$gender=mysqli_real_escape_string($db->link,$gender);
		$city=mysqli_real_escape_string($db->link,$city);
		$country=mysqli_real_escape_string($db->link,$country);
		
		$date = date('Y-m-d');
		
		$error="";
	 if (empty($name)) {
	 	$error="Name field must not be empty!!";
	}elseif(empty($email)){
		 $error="Email field must not be empty!!";
	 }elseif(empty($contactno)){
		 $error="Contact field must not be empty!!";
	 }elseif(empty($deliverylocation)){
		 $error="DeliveryLocation field must not be empty!!";
	 }elseif(empty($address)){
		 $error="Address field must not be empty!!";
	 }elseif(empty($gender)){
		$error="Gender field must not be empty!!";
	 }elseif(empty($city)){
		 	$error="City field must not be empty!!";
	 }elseif(empty($country)){
			$error="Country field must not be empty!!";
	
	}elseif(!preg_match('/^\+?([0-9]{1,4})\)?[-. ]?([0-9]{10})$/', $contactno) ) {
		 
		 $error="Invalid Contact Number";
		
	 }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	 	$error="Invalid Email Address!";
	 
	 }else{
		 
		     $mailquery="select * from customerinfo where cus_email='$email' limit 1";
             $mailcheck=$db->select($mailquery);
             if ($mailcheck <> false) {
             	$error="<span class='error'>Email already exist !</span>";
             	
             }else{
				  $query = "INSERT INTO customerinfo(cus_name,cus_email,cus_contactno,cus_deliverylocation,cus_address ,cus_sex,cus_date,cus_city,cus_country,role)   
				   VALUES('$name','$email','$contactno','$deliverylocation','$address','$gender','$date','$city','$country','1')";  
				 $inserted_rows = $db->insert($query);    
				if ($inserted_rows) {  
				   $msg="Registation is done" ;  
				}else {   
				  $error="Something is wrong!!!" ;  
				 }
				 }
		}
	}


	?>
			  
			  
			  
 <div class="main-content">
            
           <div class="row">
		  
		   
		   <div class="col-xs-12">
		       
	<form action="" method="post">
	
	<div class="col-xs-12">
				   
				   
				   <div class="form-group allignmentcenter">
	       <?php 
				if (isset($error)) {
					
					echo("<span style='color:red;margin-left:90px;font-weight:bold;'>$error</span>");
				}
				if (isset($msg)) {
					
					echo("<span style='color: green;margin-left:50px;font-weight:bold;'>$msg</span>");
				}
			  ?>
	   </div>

				    <div class="form-group allignmentcenter">
			  <label for="inputUserName">Name</label>
			  <input class="form-control" type="text" name="inputUserName"/>
			 </div>
				   
				   </div>
		
	 <div class="col-md-6">

 
			 <div class="form-group">
			  <label for="inputUserName">Email</label>
			  <input class="form-control" type="text" name="inputEmail"/>
			 </div>
			 <div class="form-group">
			  <label for="inputUserName">Contact No</label>
			  <input class="form-control" type="text" name="inputContactno"/>
			 </div>
			 <div class="form-group">
			  <label for="inputUserName">Address</label>
			  <input class="form-control" type="text" name="inputAddress"/>
			 </div>
			<div class="form-group">
			  <label for="inputUserName">Gender</label>
			 <select class="form-control" name="inputGender">
			  <option>Male</option>
			  <option>Female</option>
			 </select>
           </div>
		      
	 </div>
	 
	 <div class="col-md-6">
	         
	    <div class="form-group">
			  <label for="inputUserName">City</label>
			  <input class="form-control" type="text" name="inputCity"/>
			 </div>
	  
	     <div class="form-group">
			  <label for="inputUserName">Country</label>
			  <input class="form-control" type="text" name="inputCountry"/>
			 </div>
			  <div class="form-group">
			   <label for="inputdesingation">Role</label>
			  <input class="form-control"  disabled type="text" name="inputrole" value="1"/>
			 </div>
			 
			  <div class="form-group">
				  <label for="inputdesingation">Password</label>
				   <input class="form-control"  type="password" name="inputPasword"/>
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