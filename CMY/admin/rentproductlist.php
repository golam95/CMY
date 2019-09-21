<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once'../classes/Product.php'; ?>
<?php include_once '../helpers/Format.php'; ?>
<?php include_once '../classes/Brand.php'; ?>
<?php include_once '../classes/Catagory.php'; ?>
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
$pd=new Product(); 
$fm=new Format(); 
 ?>
 <?php
$cat=new Catagory(); 
if (isset($_GET['delpd'])) {
	// $id=$_GET['delete'];
	$id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['delpd']);
	$delPd=$pd->delPdById_rentproduct($id);
}
?>

 <div class="content">
        <div class="header">
		
	    <div class="titleright">
		 <h1 style="margin-bottom:38px;text-align:center;" class="page-title">***Rent Product Information***</h1>
		</div>
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:10px;border:4px solid #0570B5;" href="addRentproduct.php"><span class="glyphicon glyphicon-plus-sign" ></span> Add RentProduct</a>
	
     </div>
	 

<div class="main-content">
<div class="row">


	
    <div class="col-xs-11">
	     
         <div class="table-responsive">

        <div class="block"> 
       
            <table id="datatable3" style="margin-left:40px;" class="table table-striped table-bordered table-hover" id="example">
			<thead>
				<tr>
				   <th style="text-align:center;background-color:#2769A1;color:white;">Product Name</th>
					<th style="text-align:center;background-color:#2769A1;color:white;">Category</th>
					<th style="text-align:center;background-color:#2769A1;color:white;">Price</th>
					<th style="text-align:center;background-color:#2769A1;color:white;">Quantity</th>
					<th style="text-align:center;background-color:#2769A1;color:white;">Image</th>
					
					<th style="text-align:center;background-color:#2769A1;color:white;">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			$getPd=$pd->getAllRentproduct();
			if ($getPd) {
				$i=0;
				while ($result=$getPd->fetch_assoc()) {
					$i++;
		
			 ?>
				<tr class="primary">
					<td style="color:black;text-align:center;font-weight:bold;font-size:12px;width:130px;"><?php echo($result['rent_pname']); ?></td>
					<td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($result['catName']); ?></td>
					<td style="color:black;text-align:center;font-weight:bold;font-size:12px;">$<?php echo($result['rent_sellprice']); ?></td>
					<td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($result['rent_quantity']); ?></td>
					<td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><img src="<?php echo($result['rent_image']); ?>" height="40px" width="60px"/></td>
					
					<td style="color:black;text-align:center;font-weight:bold;font-size:12px;">
					
					<a style="padding:7px;background-color:green;border-radius:5px;text-decoration:none;color:white;height:40px;margin:5px;" href="updateRentproduct.php?pdid=<?php echo($result['id']) ;?>"><span class="glyphicon glyphicon-pencil"></span></a>
					
					<?php if (Session::get("adminRole")=='0') { ?>
					 <a onclick=" return confirm('Do you want to delete this item!!!');" style="padding:7px;background-color:red;border-radius:5px;text-decoration:none;color:white;height:40px;margin:5px;" href="?delpd=<?php echo($result['id']) ;?>"><span class="glyphicon glyphicon-trash"></span></a>
					<?php } ?>
					</td>
				</tr>
				<?php }} ?>
			</tbody>
		</table>

       </div>
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
