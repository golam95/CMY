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
 <style>
.form-group{width:400px;margin-left:60px;}
.button_access{margin-left:270px;}
.allignmentcenter{margin-left:340px;}
</style>
<?php
$brand=new Brand(); 
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $barandName=$_POST['barandName'];
    $category=$_POST['category'];
    $insertBrand=$brand->brandInsert($barandName,$category);
}
 ?>
  <div class="content">
  
  
  
 <div class="header">
	
		<div class="titleright">
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***Add Sub_Category List***</h1>
		</div>
		
			<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
			<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="sub_catList.php"><span class="glyphicon glyphicon-home" ></span> Sub_CategoryList</a>
	
     </div>
	 
	 
	 			   
	   	 			  
 <div class="main-content">
            
           <div class="row">
		  
		   <div class="col-xs-12">
		       
      
	  <div class="form-group allignmentcenter">
	       <?php 
				if (isset($insertBrand)) {
					echo("<span style='color: #2769A1;margin-left:90px;font-weight:bold;'>$insertBrand</span>");
				}
			  ?>
	   </div>

            
         <form action="" method="post">
	
	   <div class="col-xs-12">
				   
			<div class="form-group allignmentcenter">
			  <label for="inputUserName">Sub_Category Name</label>
			  <input class="form-control" type="text" name="barandName"/>
			</div>
			<div class="form-group allignmentcenter">
			<label for="inputUserName">Select Category </label>
			 <select class="form-control" name="category">
			  <option>--/--</option>
                               <?php 
                            $cat=new Catagory();
                            $getCat=$cat->getAllCat();
                            if ($getCat) {
                                while ($result=$getCat->fetch_assoc()) {  
                             ?>
                              <option value="<?php echo($result['catName']) ?>"><?php echo($result['catName']) ?></option>
                            <?php }}else{echo("Category not found");} ?>
                            
                        
			</select>
			</div>
				   
		</div>
		
	<div class="form-group">
                  <label for="gender"></label>
			      <button class="form-control button_access"  type="submit" name="submit" class="btn"><span class="glyphicon glyphicon-plus-sign"> Save</button>
				  
				
		  </form>
		
		   </div>
		   
		   </div>
		   
        </div>		

<?php include 'inc/footer.php';?>
	 
	 
  
  