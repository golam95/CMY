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

}
 ?>
<?php
$cat=new Catagory(); 
if (isset($_GET['delete'])) {
	// $id=$_GET['delete'];
	$id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['delete']);
	$delCate=$cat->delCatById($id);
}
?>



         <div class="content">
        
	 
	 
	  <div class="header">
	
		<div class="titleright">
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***View All Category List***</h1>
		</div>
		
			<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
			
				<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:10px;border:4px solid #0570B5;" href="catadd.php"><span class="glyphicon glyphicon-plus-sign" ></span> Add Category</a>
			
			
	
     </div>
      
	 <div class="main-content">
            
           <div class="row">
		   
		  
            <div class="col-xs-11">
	        		 <div class="table-responsive">
		 <table id="datatable3" style="margin-left:40px;" class="table table-striped table-bordered table-hover">
		     <thead>
		     	
			     <tr class="active">
				   <th style="text-align:center;background-color:#2769A1;color:white;">SN</th>
					<th style="text-align:center;background-color:#2769A1;color:white;">Category Name</th>
					
					<th style="width:150px;text-align:center;background-color:#2769A1;color:white;">Action</th>
				  </tr>
				  <tbody>
				  
				  <?php 
						$getCat=$cat->getAllCat();
						if ($getCat) {
							$i=0;
							while ($re=$getCat->fetch_assoc()) {
								$i++;
						 ?>
				    <tr class="primary">
				    <td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($i) ;?></td>
					 <td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($re['catName']) ;?></td>
					  
					 <td style="color:black;text-align:center;font-weight:bold;font-size:12px;">
					 
					 <?php if (Session::get("adminRole")=='0') { ?>
					 
					 <a style="padding:10px;background-color:green;border-radius:5px;text-decoration:none;color:white;" class="glyphicon glyphicon-pencil" href="catedit.php?catid=<?php echo($re['catId']) ;?>"></a>
					 <?php 
				                    if (Session::get("adminRole")=='0' || Session::get("adminRole")=='3') {
				                     ?>
					 <a onclick="return confirm('are you sure delect category!')" href="?delete=<?php echo($re['catId']) ;?>" style="padding:10px;background-color:red;border-radius:5px;text-decoration:none;color:white;" class="glyphicon glyphicon-trash"></a>
					 <?php } ?>
					
					<?php }else{ ?>
					  <b style="color:red;"> Access Denied!!!</b>
					 <?php }?>
					
					 </td>
				  </tr>
				  
				  
				  
<?php }}else{echo("catagory not found");} ?>
				  
				  </tbody>
				</thead>
		 </table>
		 
		
		 </div>
		 
		 
		 
	    </div>
   </div> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
          <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script><link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
		   
   
   <script type="text/javascript">
	$(document).ready(function() {
    $('#datatable3').DataTable();
    } );
</script>
<?php include 'inc/footer.php';?>

