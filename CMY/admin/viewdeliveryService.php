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
 <?php
 if (isset($_GET['shifted'])) {
  	$id=$_GET['shifted'];
  	$time=$_GET['time'];
  	$price=$_GET['price'];
  	$shift=$ct->productShift($id,$time,$price);
  } 

 
  ?>
  <?php 
  $sager="";
  $userid="";
                if (isset($_GET['delid'])) {
                	$delid=$_GET['delid'];
                	$delquery="delete from  deliveryserevice where deliser_id='$delid'";
                	$delquery1="delete from  cus_order where orderId='$delid'";
					$deldmsg=$db->delete($delquery);
					$deldmsg1=$db->delete($delquery1);
					
                }
				  if (isset($_GET['confirm'])) {
                	$confirm=$_GET['confirm'];
					
					 $query = "SELECT * FROM deliveryserevice WHERE deid_id ='$confirm'";
					 $msg=$db->select($query);
					  if ($msg) {
						
						while ($result=$msg->fetch_assoc()) {
						
						$sager=$result['deliser_id'] ;
						$userid=$result['userId'] ;
					}
				}
					
					
					$query = "UPDATE deliveryserevice
					SET
					role  = '1'
					WHERE deid_id = $confirm";
					
					
					$query1 = "UPDATE cus_order
					SET
					status  = '1'
					WHERE orderId = $sager";
					
					
					$query2 = "UPDATE payment
					SET
					buy_status  = '1'
					WHERE userId = $userid";
					
					
					$update = $db->update($query);
					$update1 = $db->update($query1);
					$update2 = $db->update($query2);
					
					
				 }
       ?>
	   
  <div class="content">
        <div class="header">

<div class="titleright">
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***View all delivery Service***</h1>
		
		</div>
<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="orderlist.php"><span class="glyphicon glyphicon-home" ></span> Back</a>

</div>
	
  <div class="main-content">
            
           <div class="row">
		   <div class="col-xs-11">
			<div class="table-responsive">
			
               
                <div class="block">        
                   

				   <table id="datatable3" style="margin-left:40px;" class="table table-striped table-bordered table-hover" id="example">
					<thead>
						<tr>
						  <th style="text-align:center;background-color:#2769A1;color:white;">product Name</th>
							<th style="text-align:center;background-color:#2769A1;color:white;">Service Provier Name</th>
							<th style="text-align:center;background-color:#2769A1;color:white;">Date</th>
							
							
							<?php if (Session::get("adminRole")=='0' || Session::get("adminRole")=='3') { ?>
							<th style="text-align:center;background-color:#2769A1;color:white;">Action</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
					 <?php 
				    $query = "SELECT * FROM deliveryserevice";
					$msg=$db->select($query);
					if ($msg) {
						$i=0;
						while ($result=$msg->fetch_assoc()) {
							$i++;
						
					 ?>
						<tr class="primary">
						  <td  style="color:black;text-align:center;font-weight:bold;font-size:12px;"><a href="orderlist.php"><?php echo($result['deliser_name']) ;?></a></td>
							<td  style="color:black;text-align:center;font-weight:bold;font-size:12px;"><a href="viewEmp.php"><?php echo($result['deliser_proname']) ;?></a></td>
							
                            <td  style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($fm->formatDate($result['deliser_date'])) ;?></td>
							
							<?php if (Session::get("adminRole")=='0' || Session::get("adminRole")=='3') { ?>
							<td  style="color:black;text-align:center;font-weight:bold;font-size:12px;">
							<div class="dropdown">
							
							 <?php 
									if ($result['role']=='0') {?>
							
							          <a onclick=" return confirm('Do you Want to Confirm this product!');" style="padding:7px;background-color:#FFFFFF;border-radius:5px;text-decoration:none;color:red;height:40px;margin:15px;" href="?confirm=<?php echo($result['deid_id']); ?>">Confirm</a>
									
										<?php }else{ ?>
										
										  <a onclick=" return confirm('Do you Want to Delete this Service!');" style="padding:7px;background-color:#FFFFFF;border-radius:5px;text-decoration:none;color:red;height:40px;margin:15px;" href="?delid=<?php echo($result['deliser_id']); ?>">Delete</a>
										
									<?php } ?>
		                        </div> 
							</td>
						

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
