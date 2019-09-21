<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Catagory.php'; ?>

<style>
.form-group{width:265px;margin-left:0px;height:35px;}
.form-control{height:35px;}
.firtstleft{margin-left:235px;width:500px;}
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
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***Yearly Report***</h1>
		</div>
		<a style="background:#2769A1;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:20px;border:4px solid #0B3E69;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
		
		<a style="background:#2769A1;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:20px;border:4px solid #0B3E69;" href="report/yearlypdfReport.php"><span class="glyphicon glyphicon-home"></span> Report</a>
		
	</div>
	
	 <?php
	 
	$firstName1="0";
	$firstName2="0";
	$db = new database();
	
   if(isset($_POST['search'])){
	
	if(!empty($_POST['year'])){
		$Valuetosearch =$_POST['year'];
	    $query="select * from year_setting where (`y_year`)='$Valuetosearch'";
		$read =$db->select($query); 
	   if($read){
		 while($row = $read->fetch_assoc()){
			$firstName1=$row['y_sellprice'];
		    $firstName2=$row['y_order'];
			
          }
    }else{
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

		 <div class="col-xs-12 onlyuse_margin">
		 
		 
	        <div class="col-md-12">
			<div class="form-group">
			    <button style="background-color:#2769A1;border:4px solid #0B3E69;text-align:center;" class="onekjamala" type="submit" name="search"><span style="color:white;" class="glyphicon glyphicon-plus-sign"><span style="font-weight:bold;color:white;">Search</span></button>
			</div>
			</div>
		</div>
		

 <div class="col-xs-12">
	   
	   <div class="col-md-3">
	       <div class="form-group">
			  <label style="font-size:12px;" for="inputUserName">Total Customer Order</label>
			</div>
				
			
			
			
	   </div>
	    <div class="col-md-3">
	       <div class="form-group widthchange">
			   <input class="form-control" type="text" name="totalorder" value="<?php echo $firstName2;?>"/>
			</div>
		</div>
	   
	    <div class="col-md-3">
	       <div class="form-group">
			  <label style="font-size:12px;" for="inputUserName">Total Sell Price</label>
			</div>
		</div>
		<div class="col-md-3">
	       <div class="form-group widthchange">
			  <input class="form-control" type="text" name="totalsellprice" value="<?php echo $firstName1;?>"/>
			</div>
		</div>
		
		 
	   
	</form>
		  
		   
		   
		   </div>
		   
		</div>		

<?php include 'inc/footer.php';?>