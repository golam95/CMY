<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Catagory.php'; ?>

<style>
.form-group{width:265px;margin-left:0px;height:35px;}
.form-control{height:35px;}
.firtstleft{margin-left:35px;}
.secondleft{margin-left:250px;}
.onekjamala{width:500px;margin-top:20px;height:35px;border-radius:5px;margin-left:45px;}
.singlealignment{margin-left:350px;}
.samealignment{margin-left:270px;}
.widthchange{width:220px;}
.upper_alignment{margin-left:150px;}
.bottom_alignment{margin-left:60px;}
.onlyuse_margin{margin-top:40px;margin-bottom:70px;margin-left:210px;}
.onlyuse_margin1{margin-top:20px;margin-bottom:30px;margin-left:220px;}
.titlefixed{margin-left:350px;width:500px;}

</style>
<div class="content">
 <div class="header">
 
    <div class="titleright">
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***Monthly Report Settings***</h1>
	 </div>
	
		<a style="background:#2769A1;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:20px;border:4px solid #0B3E69;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
				<a style="background:#2769A1;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:20px;border:4px solid #0B3E69;" href="viewmonthlySettings.php"><span class="glyphicon glyphicon-print" ></span> View</a>
		
	</div>
	
	 <?php
	 
	$first_query="0";
	$first_query1="0";
	$first_query2="0";
	$first_query3="0";
	$first_query4="0";
	$first_query5="0";
	$date = date('Y-m-d');
	$db = new database();
   if(isset($_POST['search'])){
	   
        $sql = "SELECT * FROM cus_order";
		$query = $db->select($sql);
		if($query){
        $first_query = $query->num_rows;
		 $first_query;
		}else{
		  $first_query;
		}
		
		
		
		$sql = "SELECT * FROM  users";
		$query = $db->select($sql);
		if($query){
        $first_query1 = $query->num_rows;
		 $first_query1;
		}else{
		   $first_query1;
		}
		
		
		
		$sql = "SELECT * FROM product";
		$query = $db->select($sql);
		if($query){
        $first_query2 = $query->num_rows;
		 $first_query2;
		}else{
		  $first_query2;
		}
		
		
		
		$sql = "SELECT * FROM employeeinfo";
		$query = $db->select($sql);
		if($query){
        $first_query3 = $query->num_rows;
		 $first_query3;
		}else{
		   $first_query3;
		}
		
		
		
		
		$sql = "SELECT * FROM rejineemp";
		$query = $db->select($sql);
		if($query){
        $first_query4 = $query->num_rows;
		 $first_query4;
		}else{
		  $first_query4;
		}
		
		
		$query="select * from cus_order";
	    $read =$db->select($query); 
	     if($read){
		 while($row = $read->fetch_assoc()){
			  $first_query5 += $row['price'];
		 }
		 
		 }
		 
		  
		
	}else{
		
		
	}	

?>	  


<?php 
	 if(isset($_POST['add'])){
		
		$month=$fm->validation($_POST['month']);
		$year=$fm->validation($_POST['year']);
		$total_user=$fm->validation($_POST['totaluser']);
		$total_order=$fm->validation($_POST['totalorder']);
		$total_product=$fm->validation($_POST['totalproduct']);
		$total_emp=$fm->validation($_POST['totalemp']);
		$total_rejine=$fm->validation($_POST['totalregine']);
		$total_sell=$fm->validation($_POST['totalsell']);
		
	    $month=mysqli_real_escape_string($db->link,$month);
		$year=mysqli_real_escape_string($db->link,$year);
		$total_user=mysqli_real_escape_string($db->link,$total_user);
		$total_order=mysqli_real_escape_string($db->link,$total_order);
		$total_product=mysqli_real_escape_string($db->link,$total_product);
		$total_emp=mysqli_real_escape_string($db->link,$total_emp);
		$total_rejine=mysqli_real_escape_string($db->link,$total_rejine);
		$total_sell=mysqli_real_escape_string($db->link,$total_sell);
		$date = date('Y-m-d');
        $error="";
		
	 if (empty($month)||empty($year)||empty($total_user)||empty($total_order)||empty($total_product)||empty($total_emp)||empty($total_rejine)||empty($total_sell)) {
	 	$error="Field must not be empty!!!";
	}else{
		
		   
			$query_month="select * from month_setting where m_month ='$month' and m_year ='$year'";
			 
             $monthCheck=$db->select($query_month);
             if ($monthCheck <> false) {
             	$error="Sorry,Record already exist!!";
             	
             }else{
				 
				  $query = "INSERT INTO month_setting(m_user,m_order,m_product,m_employee,m_sellprice,m_regine,m_month,m_year,m_date)   
				  VALUES('$total_user','$total_order','$total_product','$total_emp','$total_sell','$total_rejine','$month','$year','$date')"; 
				  $inserted_rows = $db->insert($query);    
				  if ($inserted_rows) {  
				   $msg="Record added succefully!!" ;  
				  }else {   
				  $error="Sorry,Not add a new position!!" ;  
				  }
		  
				 
			 }
		}
	 } 
 ?>

	
	
	
	

 <div class="main-content">
            
    <div class="row">	    

  <div class="form-group titlefixed">
	       <?php 
				if (isset($error)) {
					
					echo("<span style='color: red;margin-left:90px;font-weight:bold;'>$error</span>");
				}
				if (isset($msg)) {
					
					echo("<span style='color: green;margin-left:50px;font-weight:bold;'>$msg</span>");
				}
			  ?>
	   </div>
	
	 <form action="" method="post">
	    <div class="col-xs-12">
	        <div class="col-md-6">
              <div class="form-group upper_alignment">
					  <label for="sel1">Select Month</label>
					  <select class="form-control" name="month">
					    <option></option>
						<option>January</option>
						<option>February</option>
						<option>March</option>
						<option>April</option>
						<option>May</option>
						<option>June</option>
						<option>July</option>
						<option>Aguest</option>
						<option>September</option>
						<option>Octobar</option>
						<option>November</option>
						<option>December</option>
					  </select>
					</div>
			</div>
			 
			<div class="col-md-6">
				 <div class="form-group firtstleft">
				  <label for="inputUserName">Select Year</label>
				    <select class="form-control" name="year">
					    <option></option>
						<option>2018</option>
						<option>2019</option>
						<option>2020</option>
						<option>2021</option>
						<option>2022</option>
						<option>2023</option>
						<option>2024</option>
						<option>2025</option>
						<option>2026</option>
						<option>2027</option>
						<option>2028</option>
						<option>2029</option>
					  </select>
				 </div>
			 </div>
		</div>

		 <div class="col-xs-12 onlyuse_margin">
		   <div class="col-md-12">
			<div class="form-group">
			    <button style="background-color:#2769A1;border:4px solid #0B3E69;text-align:center;" class="onekjamala" type="submit"name="search"><span style="color:white;" class="glyphicon glyphicon-plus-sign"><span style="font-weight:bold;color:white;">Search</span></button>
			</div>
			</div>
		
		</div>
		

 <div class="col-xs-12">
	   
	   <div class="col-md-3">
	       <div class="form-group">
			  <label style="font-size:12px;" for="inputUserName">Total User</label>
			</div>
				<div class="form-group">
			  <label style="font-size:12px;" for="inputUserName">Total Order</label>
			</div>
			 <div class="form-group">
			  <label style="font-size:12px;" for="inputUserName">Total Product</label>
			</div>
			
			
	   </div>
	    <div class="col-md-3">
	       <div class="form-group widthchange">
			   <input class="form-control" type="text" name="totaluser" value="<?php echo $first_query1;?>"/>
			</div>
			  <div class="form-group widthchange">
			   <input class="form-control" type="text" name="totalorder" value="<?php echo $first_query; ?>"/>
			</div>
			  <div class="form-group widthchange">
			   <input class="form-control" type="text" name="totalproduct" value="<?php echo $first_query2; ?>"/>
			</div>
			 
			 
	   </div>
	   
	    <div class="col-md-3">
	       <div class="form-group">
			  <label style="font-size:12px;" for="inputUserName">Total Employee</label>
			</div>
			<div class="form-group ">
			  <label style="font-size:12px;" for="inputUserName">Total RegineEmployee</label>
			</div>
			<div class="form-group">
			  <label style="font-size:12px;" for="inputUserName">Total Sell</label>
			</div>
			
				
	</div>
		
		
	   
	    <div class="col-md-3">
	       <div class="form-group widthchange">
			  <input class="form-control" type="text" name="totalemp" value="<?php echo $first_query3;?>"/>
			</div>
			<div class="form-group widthchange">
			  <input class="form-control" type="text" name="totalregine" value="<?php echo $first_query4;?>"/>
			</div>
			<div class="form-group widthchange">
			  <input class="form-control" type="text" name="totalsell" value="<?php echo $first_query5;?>"/>
			</div>
			
		</div>
		
		 <div class="col-md-6 onlyuse_margin1">
			<div class="form-group">
			    <button style="background-color:#2769A1;border:4px solid #0B3E69;text-align:center;" class="onekjamala" type="submit" name="add"><span style="color:white;" class="glyphicon glyphicon-plus-sign"><span style="font-weight:bold;color:white;">Add</span></button>
			</div>
			</div>
	   
	</form>
		  
		   
		   
		   </div>
		   
		</div>		

<?php include 'inc/footer.php';?>