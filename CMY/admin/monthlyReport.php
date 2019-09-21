<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Catagory.php'; ?>

<style>
.form-group{width:265px;margin-left:0px;height:35px;}
.form-control{height:35px;}
.firtstleft{margin-left:35px;}
.secondleft{margin-left:360px;}
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
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***Monthly Report***</h1>
	 </div>
	
		<a style="background:#2769A1;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:20px;border:4px solid #0B3E69;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
	   
	   <a style="background:#2769A1;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:20px;border:4px solid #0B3E69;" href="report/monthlypdfReport.php"><span class="glyphicon glyphicon-print" ></span> Report</a>		
				
		
	</div>
	
	 <?php
	  $firstName_user="0";
	  $firstName_order="0";
	  $firstName_product="0";
	  $firstName_employee="0";
	  $firstName_regine="0";
	  $firstName_sellprice="0";
	  

   $db = new database();
   if(isset($_POST['search'])){
	
	if(!empty($_POST['month']) && !empty($_POST['year'])){
		$Valuetosearch =$_POST['month'];
	    $Valuetosearch1 =$_POST['year'];
	    $query="select * from month_setting where (`m_month`)='$Valuetosearch' and (`m_year`)='$Valuetosearch1'";
	 $read =$db->select($query); 
	if($read){
		 while($row = $read->fetch_assoc()){
		    $firstName_user= $row['m_user'];
		    $firstName_order= $row['m_order'];
			$firstName_product= $row['m_product'];
		    $firstName_employee= $row['m_employee'];
		    $firstName_regine= $row['m_regine'];
		    $firstName_sellprice= $row['m_sellprice'];
		}
      }else {
		  
		  $error="Sorry Your search Item Not Found!!!";
	   }
		
	}else{
		 $error="Sorry,Field Must Not Empty!!!";
	}
}
?>	  
		
	
 <div class="main-content">
            
    <div class="row">	

  <div class="form-group titlefixed">
	       <?php 
				if (isset($error)) {
					
					echo("<span style='color: red;margin-left:50px;font-weight:bold;'>$error</span>");
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
			   <input class="form-control" type="text" name="totaluser" value="<?php echo $firstName_user;?>"/>
			</div>
			  <div class="form-group widthchange">
			   <input class="form-control" type="text" name="totalorder" value="<?php echo $firstName_order; ?>"/>
			</div>
			  <div class="form-group widthchange">
			   <input class="form-control" type="text" name="totalproduct" value="<?php echo $firstName_product; ?>"/>
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
			  <input class="form-control" type="text" name="totalemp" value="<?php echo $firstName_employee;?>"/>
			</div>
			<div class="form-group widthchange">
			  <input class="form-control" type="text" name="totalregine" value="<?php echo $firstName_regine;?>"/>
			</div>
			<div class="form-group widthchange">
			  <input class="form-control" type="text" name="totalsell" value="<?php echo $firstName_sellprice;?>"/>
			</div>
			
		</div>
		
		
	   
	</form>
		  
		   
		   
		   </div>
		   
		</div>		

<?php include 'inc/footer.php';?>