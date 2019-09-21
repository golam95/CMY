<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/Catagory.php'; ?>
<?php include_once'../classes/Product.php'; ?>
<?php include_once'../classes/Brand.php'; ?>
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
$pd=new Product(); 
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])) {
    $insertProduct=$pd->rent_productInsert($_POST,$_FILES);
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
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***Add Rent Product***</h1>
		</div>
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
		
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:20px;border:4px solid #0570B5;" href="rentproductlist.php"><span class="glyphicon glyphicon-home" ></span> View RentProduct</a>
		
     </div>
	 
	 

			  
 <div class="main-content">
            
           <div class="row">
		  
		   <div class="col-xs-12">
		       
      
	  <div class="form-group allignmentcenter">
	       <?php 
				if (isset($insertProduct)) {
					
					echo("<span style='color:#2769A1;margin-left:90px;font-weight:bold;'>$insertProduct</span>");
				}
			  ?>
			  
	   </div>



		 
         <form action="" method="post" enctype="multipart/form-data">
	
	<div class="col-xs-12">
				  
				    <div class="form-group allignmentcenter">
			  <label for="inputUserName">Product Name</label>
			  <input class="form-control" type="text" name="productName"/>
			 </div>
				   
				   </div>
		
	 <div class="col-md-6">
	 
 
			 <div class="form-group">
			  <label for="inputUserName">Category</label>
			  
			   <select  class="form-control" name="catId">
                            <option>Select Category</option>
                               <?php 
                            $cat=new Catagory();
                            $getCat=$cat->getAllCat();
                            if ($getCat) {
                                while ($result=$getCat->fetch_assoc()) {  
                             ?>
                              <option value="<?php echo($result['catId']) ?>"><?php echo($result['catName']) ?></option>
                            <?php }}else{echo("Category not found");} ?>
                            
                        </select>
			  
			 </div>
			 
			 
			 
			
			 <div class="form-group">
			  <label for="inputUserName">Net Price</label>
			  <input class="form-control" type="text" name="netprice"/>
			 </div>
			<div class="form-group">
			  <label for="inputUserName">Sell Price</label>
			  <input class="form-control" type="text" name="sellprice"/>
			 </div>
			 
			 
			  <div class="form-group">
				  
<input class="form-control" type="file" name="image"/>
				</div>
			 
			 
		
	 </div>
	 
	 <div class="col-md-6">
	         
	    <div class="form-group">
			  <label for="inputUserName">Quantity</label>
			  <input class="form-control" type="text" name="quantity"/>
			 </div>
	        
	     <div class="form-group">
			  <label for="inputUserName">Select Type</label>
			 <label for="gender">Select Type</label>
				  <select class="form-control" name="type">
				   <option>Select Type</option>
                   <option value="Featured">Featured</option>
                   <option value="General">General</option>
				</select>
			 </div>
			  <div class="form-group">
			   <label for="inputdesingation">Description</label>
			
			   <textarea class="form-control rounded-0" name="body" rows="3"></textarea>
			 </div>
			 
		
			 
			 </div>
		 
			<div class="form-group">
                  <label for="gender"></label>
			      <button class="form-control button_access"  type="submit" name="submit" class="btn"><span class="glyphicon glyphicon-plus-sign">Save</button>
				
		  </form>
		  
		   </div>
		   
		   </div>
		   
        </div>		
	 
	 
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


