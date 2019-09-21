  <?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Catagory.php'; ?>
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
$cat=new Catagory(); 
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $CatName=$_POST['catname'];
    $insertCat=$cat->catInsert($CatName);
}
 ?>

             <div class="content">
			 
			   <div class="header">

<div class="titleright">
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***Add Category Information***</h1>
		</div>
<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:20px;border:4px solid #0570B5;" href="catlist.php"><span class="glyphicon glyphicon-home" ></span> View CategoryList</a>

</div>
			   
	   	 			  
 <div class="main-content">
            
           <div class="row">
		  
		   <div class="col-xs-12">
		       
      
	  <div class="form-group allignmentcenter">
	       <?php 
				if (isset($insertCat)) {
					echo("<span style='color: #2769A1;margin-left:90px;font-weight:bold;'>$insertCat</span>");
				}
			  ?>
	   </div>

            
         <form action="" method="post">
	
	   <div class="col-xs-12">
				   
			<div class="form-group allignmentcenter">
			  <label for="inputUserName">Category Name</label>
			  <input class="form-control" type="text" name="catname"/>
							
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