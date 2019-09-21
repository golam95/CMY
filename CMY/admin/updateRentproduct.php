<?php  ob_start(); ?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
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
if (!isset($_GET['pdid'])||$_GET['pdid']==NULL ||$_GET['pdid']!=$_GET['pdid']) {
    echo "<script>window.location = 'rentproductlist.php';</script>";
}else{
    // $id=$_GET['catid'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['pdid']);
}
 
$pd=new Product(); 
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['Update'])) {
	
    $updateProduct=$pd->rent_productUpdate($_POST,$_FILES,$id);
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
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***Update Product***</h1>
		</div>
		
			<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:20px;border:4px solid #0570B5;" href="rentproductlist.php"><span class="glyphicon glyphicon-home" ></span> View Product</a>
		
     </div>

<div class="grid_10">
    <div class="box round first grid">
      
        <div class="block"> 
				   <div class="form-group allignmentcenter">
	       <?php 
				if (isset($updateProduct)) {
					
					echo("<span style='color: #2769A1;margin-left:90px;font-weight:bold;'>$updateProduct</span>");
				}
				
			  ?>
	   </div>

		 
         <?php 
         $getPd=$pd->getPdById_rentproduct($id);
         if ($getPd) {
             while ($re=$getPd->fetch_assoc()) {
            
          ?>            
         <form action="" method="post" enctype="multipart/form-data">
		 
		 <div class="col-xs-12">
				  
			<div class="form-group allignmentcenter">
			  <label for="inputUserName">Product Name</label>
			  <input class="form-control" type="text" name="productName" value="<?php echo($re['rent_pname']); ?>" />
			</div>
			
			 <div class="col-md-6">
			 
			  <div class="form-group">
			  <label for="inputUserName">Category Name</label>
			  <input class="form-control" type="text" name="productCategory" value="<?php echo($re['rent_category']); ?>" />
			</div>
			 
			
			 <div class="form-group">
			  <label for="inputUserName">Net Price</label>
			  <input class="form-control" type="text" name="netprice" value="<?php echo($re['rent_netprice']); ?>"/>
			 </div>
			<div class="form-group">
			  <label for="inputUserName">Sell Price</label>
			  <input class="form-control" type="text" name="price" value="<?php echo($re['rent_sellprice']); ?>"/>

			 </div>
			 
			 </div>
			 
			 
			
			 
			  <div class="col-md-6">
			      <div class="form-group">
			  <label for="inputUserName">Quantity</label>
			  <input class="form-control" type="text" name="quantity" value="<?php echo($re['rent_quantity']); ?>"/>
			 </div>
	        
	     <div class="form-group">
			  <label for="inputUserName">Select Type</label>
		
 
				  <select class="form-control" name="type">
                            <option>Select Type</option>
                            <?php if ($re['rent_type']==0) {?>
                            <option selected="selected" value="General">Featured</option>
                            <option value="General">General</option>
                               
                           <?php }else{ ?>
                            <option selected="selected" value="Featured">General</option>
                            <option value="Featured">Featured</option>
                            <?php } ?>
                        </select>
			 
			 </div>
			 
			  <div class="form-group">
			   <label for="inputdesingation">Description</label>
			 <textarea class="form-control rounded-0" name="body" rows="3">
			    <?php echo($re['rent_description']); ?>
			   </textarea>
			 </div>
			
			 <div class="form-group">
				<img src="<?php echo($re['rent_image']); ?>" height="100px" width="250px"/><br/>
				  <input class="form-control" type="file" name="image"/>
				</div>
			 </div>
			 
			 
			 
			 
			<div class="form-group">
                  <label for="gender"></label>
			      <button class="form-control button_access"  type="submit" name="Update" class="btn"><span class="glyphicon glyphicon-plus-sign">Update</button>
				  </div>
				  <br/>
				  
				  
				
		  </form>
			
			  
				   
            <?php }}else{echo("not retrive product");} ?>
           
        </div>
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
<?php include 'inc/footer.php';
ob_end_flush();
?>


