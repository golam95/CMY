
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php'; ?>
<?php 
$role=Session::get("adminRole");
if ($role!='0') {
    
$id=Session::get("adminId");
$name=Session::get("adminName");
$page = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}"; 
$query="INSERT INTO track_visitor (userId,user_name,page) VALUES ('$id','$name',  '$page')";
$insertdata=$db->insert($query);
// if ($insertdata) {
//  echo "inserted";
// }else{
//  echo("not");
// }
}
 ?>
<?php
if (!isset($_GET['brandid'])||$_GET['brandid']==NULL ||$_GET['brandid']!=$_GET['brandid']) {
    echo "<script>window.location = 'brandlist.php';</script>";
}else{
    // $id=$_GET['catid'];
    $id=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['brandid']);
}
$brand=new Brand(); 
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $brandName=$_POST['brandName'];
    $updateBrand=$brand->brandUpdate($brandName,$id);
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
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***Update Sub_Category List***</h1>
		</div>
		
			<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
			<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="sub_catList.php"><span class="glyphicon glyphicon-home" ></span> Sub_CategoryList</a>
	
     </div>

	 
	 	  
 <div class="main-content">
            
           <div class="row">
		  
		   <div class="col-xs-12">
		
	  <div class="form-group allignmentcenter">
	       <?php 
				if (isset($updateBrand)) {
					echo("<span style='color: #2769A1;margin-left:90px;font-weight:bold;'>$updateBrand</span>");
				}
			  ?>
	   </div>

            <?php 
                $getBrand=$brand->getBrandById($id);
                if ($getBrand) {
                   while ($re=$getBrand->fetch_assoc()) {
                 
                 ?>
         <form action="" method="post">
	
	<div class="col-xs-12">
				
				<div class="form-group allignmentcenter">
			  <label for="inputUserName">Sub_Category Name</label>
			  <input class="form-control" type="text" name="brandName" value="<?php echo($re['brandName'])?>" />
			  
					
			 </div>
				   
		</div>
		
	<div class="form-group">
                  <label for="gender"></label>
			      <button class="form-control button_access"  type="submit" name="submit" class="btn"><span class="glyphicon glyphicon-plus-sign">Update</button>
				  
				
		  </form>
		 
		   <?php }}else{echo("Sub_catagory not found");} ?>
		  
		   </div>
		   
		   </div>
		   
        </div>		


<?php include 'inc/footer.php';?>
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 

        