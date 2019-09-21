<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Catagory.php'; ?>


<div class="content">
        <div class="header">
		
	
		<div class="titleright">
		 <h1 style="margin-bottom:38px;text-align:center;" class="page-title">***Resignation  Employee Information***</h1>
		</div>
		
		
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:10px;border:4px solid #0570B5;" href="viewEmp.php"><span class="glyphicon glyphicon-home" ></span> ViewEmp</a>
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:10px;border:4px solid #0570B5;" href="report/rejineempReport.php"><span class="glyphicon glyphicon-print" ></span> Print Details</a>
	
		
     </div>
	 
	 
 <div class="main-content">
            
           <div class="row">
		   
		  
            <div class="col-xs-11">
	        		 <div class="table-responsive">
	        		 	<?php 
                if (isset($_GET['delid'])) {
                	$delid=$_GET['delid'];
                	$delquery="delete from rejineemp where re_id='$delid'";
                	$deldmsg=$db->delete($delquery);
                }
                 ?>
		 <table id="datatable3" style="margin-left:40px;" class="table table-striped table-bordered table-hover">
		     <thead>
			     <tr class="active">
				   <th style="text-align:center;background-color:#2769A1;color:white;">Name</th>
					<th style="text-align:center;background-color:#2769A1;color:white;">Employee Type</th>
					 <th style="text-align:center;background-color:#2769A1;color:white;">NID</th>
					<th style="text-align:center;background-color:#2769A1;color:white;">Address</th>
					
					
					<th style="text-align:center;background-color:#2769A1;color:white;">contactNo</th>
					
				
					
					<th style="text-align:center;background-color:#2769A1;color:white;">Joining Date</th>
					
					<th style="text-align:center;background-color:#2769A1;color:white;">Resignation Date</th>
				    <th style="width:150px;text-align:center;background-color:#2769A1;color:white;">Action</th>
				  </tr>
				  <tbody>
				  <?php 
					$query="select * from rejineemp";
					$msg=$db->select($query);
					if ($msg) {
						$i=0;
						while ($result=$msg->fetch_assoc()) {
							$i++;
						
					 ?>
					 
				    <tr class="primary">
				    <td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($result['re_name']) ;?></td>
					 <td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($result['re_degination']); ?></td>
					  <td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($result['re_nid']) ;?></td>
				
					   <td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($result['re_address']) ;?></td>
					   
				
					   <td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($result['re_contactno']); ?></td>
			
					   
					<td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($fm->formatDate($result['re_dateofjoining'])); ?></td>
					
					
					<td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($fm->formatDate($result['re_rejinedate'])); ?></td>
					
					
					
					<td style="color:black;text-align:center;font-weight:bold;font-size:12px;height:40px;margin-top:10px;">
					
					 <?php if (Session::get("adminRole")=='0') { ?>
					 
					<a onclick=" return confirm('Are you sue to delete msg from the seened box!');" style="padding:7px;background-color:red;border-radius:5px;text-decoration:none;color:white;height:40px;margin:5px;" href="?delid=<?php echo($result['re_id']); ?>"><span class="glyphicon glyphicon-trash"></span></a>
					
					<?php }else{ ?>
					  <b style="color:red;"> Access Denied!!!</b>
					 <?php }?>
					
		
				</td>
					 
				  </tr>
			
				  <?php }} ?>
				  
				  </tbody>
				</thead>
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