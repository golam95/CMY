<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php 
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		
		$emp_Name=$fm->validation($_POST['inputUserName']);
		$emp_Type=$fm->validation($_POST['emp_type']);
		$emp_Address=$fm->validation($_POST['inputAddress']);
		$emp_Gender=$fm->validation($_POST['gender']);
		$emp_NID=$fm->validation($_POST['inputnid']);
		$emp_phone=$fm->validation($_POST['inputPhone']);
		$emp_worktype=$fm->validation($_POST['work_type']);
		
		
		$emp_Name=mysqli_real_escape_string($db->link,$emp_Name);
		$emp_Type=mysqli_real_escape_string($db->link,$emp_Type);
		$emp_Address=mysqli_real_escape_string($db->link,$emp_Address);
		$emp_Gender=mysqli_real_escape_string($db->link,$emp_Gender);
		$emp_NID=mysqli_real_escape_string($db->link,$emp_NID);
		$emp_phone=mysqli_real_escape_string($db->link,$emp_phone);
		$emp_worktype=mysqli_real_escape_string($db->link,$emp_worktype);
		$date = date('Y-m-d');
        
	$error="";
		
	 if (empty($emp_Name)) {
	 	$error="Name must not be empty";
	 }elseif (!filter_var($emp_Name,FILTER_SANITIZE_SPECIAL_CHARS)) {
	 	$error="Invalid Name!";
	 } elseif (empty($emp_Address)) {
	 	$error="Address must not be Empty";
	 }elseif (empty($emp_NID)) {
	 	$error="NID must not be Empty";
	 }elseif (empty($emp_phone)) {
	 	$error="Phone must not be Empty";
	 }else if(strlen($emp_phone) < 11){
		 $error="Sorry, Invalid COntact Number";
		 
	}else{
		$query = "SELECT emp_nid FROM employeeinfo WHERE emp_nid = '$emp_NID'";
		$check_NID = $db->select($query);
		if($check_NID){
			 $error="The NID Is Already Exist!!!" ; 
		}else{
		    $query = "INSERT INTO employeeinfo(emp_name,emp_designation,emp_address,emp_sex,emp_nid,emp_contactno,emp_worktype,emp_date)   
           VALUES('$emp_Name','$emp_Type','$emp_Address','$emp_Gender','$emp_NID','$emp_phone','$emp_worktype','$date')"; 
          $inserted_rows = $db->insert($query);    
          if ($inserted_rows) {  
           $msg="Add a New Position!!" ;  
          }else {   
          $error="Not Add a New Position!!" ;  
          }
			
		}
		
	 }
	 } 
 ?>

<div class="content">
        <div class="header">
		
		
		<div class="titleright">
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***Add Employee Information***</h1>
		</div>
		
		
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:20px;border:4px solid #0570B5;" href="viewEmp.php"><span class="glyphicon glyphicon-home" ></span> ViewEmp</a>
		
		
		
		
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
			  <label for="inputUserName">UserName</label>
			  <input class="form-control" type="text" name="inputUserName"/>
			 </div>
			 
			 <div class="form-group">
				  <label for="employee">Desingation</label>
				  <select class="form-control" name="emp_type">
					<option>Internal Employee</option>
					<option>External Employee</option>
				</select>
				</div>
			 
			  <div class="form-group">
			   <label for="inputdesingation">Address</label>
			  <input class="form-control"  type="text" name="inputAddress"/>
			 </div>
			
			<div class="form-group">
				  <label for="gender">Sex</label>
				  <select class="form-control" name="gender">
					<option>Male</option>
					<option>Female</option>
				</select>
				</div>
			  <div class="form-group">
			   <label for="inputdesingation">NID</label>
			  <input class="form-control"  type="text" name="inputnid"/>
			 </div>
			 
			 
			 <div class="form-group">
			   <label for="inputdesingation">Contact No</label>
			  <input class="form-control"  type="text" name="inputPhone"/>
			 </div>
			 
			 <div class="form-group">
				  <label for="sel1">WorkType</label>
				  <select class="form-control" name="work_type">
					<option>Full-Time</option>
					<option>Half-Time</option>
				</select>
				</div>
			 <br/>
			<div class="form-group">

			    <button class="form-control"  type="submit" class="btn"><span class="glyphicon glyphicon-plus-sign">Add</button>
				
		  </form>
		   
		   </div>
		   
		   </div>
		   
        </div>		
	
<?php include 'inc/footer.php';?>