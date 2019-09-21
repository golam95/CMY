<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
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
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Cart.php');
 $ct=new Cart();
 $fm=new Format();
 ?>
 
  <div class="content">
        <div class="header">

<div class="titleright">
		 <h1 style="margin-bottom:38px;text-align:center;" class="page-title">***Customer Order list***</h1>
		</div>
<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:10px;border:4px solid #0570B5;" href="viewdeliveryService.php"><span class="glyphicon glyphicon-home" ></span> View Delivery Service</a>

</div>
	
  <div class="main-content">
            
           <div class="row">
		   <div class="col-xs-11">
			<div class="table-responsive">
			
              
                <div class="block">        
                   

				   <table id="datatable3" style="margin-left:40px;" class="table table-striped table-bordered table-hover" id="example">
					<thead>
						<tr>
						  <th style="text-align:center;background-color:#2769A1;color:white;">product</th>
							<th style="text-align:center;background-color:#2769A1;color:white;">quantity</th>
							<th style="text-align:center;background-color:#2769A1;color:white;">price</th>
							<th style="text-align:center;background-color:#2769A1;color:white;">Date</th>
							
							<?php if (Session::get("adminRole")=='0' || Session::get("adminRole")=='3') { ?>
							<th style="text-align:center;background-color:#2769A1;color:white;">Action</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
					<?php 
					
					$getorder=$ct->getAllProduct();
					
					if ($getorder) {
						while ($result=$getorder->fetch_assoc()) {
					 ?>
						<tr class="primary">
						
							<td  style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($result['productName']) ;?></td>
							<td  style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($result['quantity']) ;?></td>
							<td  style="color:black;text-align:center;font-weight:bold;font-size:12px;">$<?php echo($result['price']) ;?></td>
							<td  style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($fm->formatDate($result['date'])) ;?></td>
							
							<?php if (Session::get("adminRole")=='0' || Session::get("adminRole")=='3') { ?>
							<td  style="color:black;text-align:center;font-weight:bold;font-size:12px;">
							<div class="dropdown">
								  <button style="background-color:#6F9BC0;font-weight:bold;color:white;border:2px solid #2769A1;color:#FF0000;" class="btn  dropdown-toggle" type="button" data-toggle="dropdown">Action
								  <span class="caret"></span></button>
								  <ul class="dropdown-menu">
								   
								   <?php 
									if ($result['status']=='0') {?>
									  <li><a href="deliveryService.php?updatedeli=<?php echo($result['orderId']); ?>">Delivery Service</a></li>
										 <li><h5 style="color:red;font-weight:bold;">Delivery Pending</h5></li>
										   <li><a style="color:green;font-weight:bold;" href="report/dailyInvoice.php?invoiup=<?php echo($result['orderId']); ?>">Invoice</a></li>
									
								    <?php }else{ ?>
									
							     <li><h5 style="color:green;font-weight:bold;">Delivery Done</h5></li>
								 
								  </ul>
								</div> 
							</td>
							<?php } ?>

							<?php } ?>
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
