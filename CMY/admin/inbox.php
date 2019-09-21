<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Catagory.php'; ?>
<div class="content">
        <div class="header">
		<div class="titleright">
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***View All Customer Feedback***</h1>
		</div>
		
		
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
		
		
	</div>
	
	
	<?php 
	  if (isset($_GET['delid'])) {
         $delid=$_GET['delid'];
         $delquery="delete from  contact where contactid='$delid'";
         $deldmsg=$db->delete($delquery);
		}
	 ?>
	
	
	
	 
	 
 <div class="main-content">
            
           <div class="row">
		   
		   
            <div class="col-xs-11">
	        		 <div class="table-responsive">
	        		 	
		 <table id="datatable3" style="margin-left:40px;" class="table table-striped table-bordered table-hover">
		     <thead>
			     <tr class="active">
				   <th style="text-align:center;background-color:#2769A1;color:white;">Name</th>
					<th style="text-align:center;background-color:#2769A1;color:white;">Email</th>
					<th style="text-align:center;background-color:#2769A1;color:white;">Telephone</th>
					<th style="text-align:center;background-color:#2769A1;color:white;">Message</th>
					<th style="text-align:center;background-color:#2769A1;color:white;">Date</th>
				    <th style="width:150px;text-align:center;background-color:#2769A1;color:white;">Action</th>
				  </tr>
				  <tbody>
				  <?php 
					$query="select * from contact";
					$msg=$db->select($query);
					if ($msg) {
						$i=0;
						while ($result=$msg->fetch_assoc()) {
							$i++;
						
					 ?>
				  
				    <tr class="primary">
				    <td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($result['name']) ;?></td>
					 <td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($result['email']); ?></td>
					  <td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($result['mobileNo']) ;?></td>
					   <td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($result['body']); ?></td>
					<td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($fm->formatDate($result['date'])); ?></td>
					
					<td style="color:black;text-align:center;font-weight:bold;font-size:12px;height:40px;margin-top:10px;">
					
					 <a onclick=" return confirm('Do you want to delete!');" style="padding:7px;background-color:green;border-radius:5px;text-decoration:none;color:white;height:40px;margin:5px;" href="?delid=<?php echo($result['contactid']); ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
					 <a style="padding:7px;background-color:green;border-radius:5px;text-decoration:none;color:white;height:40px;margin:5px;" href="replaymsg.php?rmsgid=<?php echo($result['contactid']); ?>"><span class="glyphicon glyphicon-send"></span></a>
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