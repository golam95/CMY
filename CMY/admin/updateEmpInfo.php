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
 
<?php 
$id = $_GET['rmsgid'];
$db = new database();
$query = "SELECT * FROM employeeinfo WHERE emp_id=$id";
$getData = $db->select($query)->fetch_assoc();
$date = date('Y-m-d');

if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['Update'])) {
	
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
		
	    $error="";
	if( $emp_Name == '' ||  $emp_Address == '' || $emp_NID == ''|| $emp_phone == ''){
		 $error ="Field must not empty!!!";
		 
	}elseif (!filter_var($emp_Name,FILTER_SANITIZE_SPECIAL_CHARS)) {
	 	$error="Invalid UserName!"; 
		
    }else if(strlen($emp_phone) < 11){
		 $error="Sorry, Invalid COntact Number";
		
	} else {
	
			$query = "UPDATE employeeinfo
		SET
		emp_name = '$emp_Name',
		emp_designation  = '$emp_Type',
		emp_address = '$emp_Address',
		emp_sex = '$emp_Gender',
		emp_nid ='$emp_NID',
		emp_contactno = '$emp_phone',
		emp_worktype = '$emp_worktype',
		emp_date = '$date'
		WHERE emp_id = $id";
		$update = $db->update($query);
		 if ($update) {  
           $msg="Update the Employee Information!!" ;  
          }else {   
          $error="Opps,Sorry Not Update Employee Information!!" ;  
         }  
	}
}else if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['rejine'])){
	   
  	   
	    $emp_Name=$fm->validation($_POST['inputUserName']);
		$emp_Type=$fm->validation($_POST['emp_type']);
		$emp_Address=$fm->validation($_POST['inputAddress']);
		$emp_Gender=$fm->validation($_POST['gender']);
		$emp_NID=$fm->validation($_POST['inputnid']);
		$emp_phone=$fm->validation($_POST['inputPhone']);
		$emp_worktype=$fm->validation($_POST['work_type']);
		
		$emp_joindate=$fm->validation($_POST['joindate']);
		
		
		
		$emp_Name=mysqli_real_escape_string($db->link,$emp_Name);
		$emp_Type=mysqli_real_escape_string($db->link,$emp_Type);
		$emp_Address=mysqli_real_escape_string($db->link,$emp_Address);
		$emp_Gender=mysqli_real_escape_string($db->link,$emp_Gender);
		$emp_NID=mysqli_real_escape_string($db->link,$emp_NID);
		$emp_phone=mysqli_real_escape_string($db->link,$emp_phone);
		$emp_worktype=mysqli_real_escape_string($db->link,$emp_worktype);
		
	    $error="";
	
	   if( $emp_Name == '' ||  $emp_Address == '' || $emp_NID == ''|| $emp_phone == ''){
		 $error ="Field must not empty!!!";
		 
	   }else{ 
	   
	     $query = "INSERT INTO rejineemp(re_name,re_degination,re_address,re_nid,re_contactno,re_dateofjoining,re_rejinedate)   
           VALUES('$emp_Name','$emp_Type','$emp_Address','$emp_NID','$emp_phone','$emp_joindate','$date')"; 
           $inserted_rows = $db->insert($query);    
         
		  $delquery="delete from employeeinfo where emp_id='$id'";
          $deldmsg=$db->delete($delquery);
                  
		 }
	}
?>


<div class="content">
        <div class="header">
		
		<div class="titleright">
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***Update Employee Information***</h1>
		</div>
		
		
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:20px;border:4px solid #0570B5;" href="viewEmp.php"><span class="glyphicon glyphicon-home" ></span> ViewEmp</a>
		
		
		
		
		
		
     </div>
		 
 <div class="main-content">
            
           <div class="row">
		    <div class="col-xs-8">
	<form action="" method="POST">
	
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
			  <input class="form-control" type="text" name="inputUserName" value="<?php echo $getData['emp_name']?>"/>
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
			  <input class="form-control"  type="text" name="inputAddress" value="<?php echo $getData['emp_address']?>"/>
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
			  <input class="form-control"  type="text" name="inputnid" value="<?php echo $getData['emp_nid']?>"/>
			 </div>
			 
			 
			 <div class="form-group">
			   <label for="inputdesingation">Contact No</label>
			  <input class="form-control"  type="text" name="inputPhone" value="<?php echo $getData['emp_contactno']?>"/>
			 </div>
			 
			 <div class="form-group">
				  <label for="sel1">WorkType</label>
				  <select class="form-control" name="work_type">
					<option>Full-Time</option>
					<option>Half-Time</option>
				</select>
				<input class="form-control"  type="hidden" name="joindate" value="<?php echo $getData['emp_date']?>"/>
				</div>
			 <br/>
			<div class="form-group">
               <button class="form-control"  type="submit" name="Update" class="btn"><span class="glyphicon glyphicon-plus-sign">Update</button>
			   
			   <button class="form-control"  type="submit" name="rejine" class="btn"><span class="glyphicon glyphicon-remove">Resignation</button>
				
		  </form>
		   
		   </div>
		   
		   </div>
		   
        </div>		
	
<?php include 'inc/footer.php';?>