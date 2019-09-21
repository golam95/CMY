<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Catagory.php'; ?>


<div class="content">
        <div class="header">
		
	
  <div class="titleright">
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***Download Your Project Sql File***</h1>
		</div>
		<a style="background:#6F9BC0;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:40px;border:4px solid #0570B5;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
		
   </div>
		
	
	 
 <div class="main-content">
            
           <div class="row">
		   
		   
			<div class="col-xs-11">
	        		 <div class="table-responsive">
	        		 	<?php 
                if (isset($_GET['delid'])) {
                	$delid=$_GET['delid'];
                	$delquery="delete from db_backup where db_id ='$delid'";
					$deldmsg=$db->delete($delquery);
                }
                 ?>
		 <table style="margin-left:40px;" class="table table-striped table-bordered table-hover">
		     <thead>
			     <tr class="active">
				   <th style="text-align:center;background-color:#2769A1;color:white;">Database Name</th>
					<th style="text-align:center;background-color:#2769A1;color:white;">Db Name</th>
					<th style="text-align:center;background-color:#2769A1;color:white;">Date</th>
					<th style="width:150px;text-align:center;background-color:#2769A1;color:white;">Action</th>
				  </tr>
				  <tbody>
				  <?php 
					$query="select * from db_backup";
					$msg=$db->select($query);
					if ($msg) {
						$i=0;
						while ($result=$msg->fetch_assoc()) {
							$i++;
						
					 ?>
					
				    <tr class="primary">
				    <td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($result['db_name']) ;?></td>
					
					 <td style="color:black;text-align:center;font-weight:bold;font-size:12px;">
					
					<a href="backupdatabase/<?php echo($result['db_description']);?>" download="backupdatabase/<?php echo($result['db_description']);?>">
					<h5 style="font-style:bold;color:red;">Download</h5>
					</a>
					</td>
					 
					  <td style="color:black;text-align:center;font-weight:bold;font-size:12px;"><?php echo($result['db_date']) ;?></td>
				
					<td style="color:black;text-align:center;font-weight:bold;font-size:12px;height:40px;margin-top:10px;">
					
					<a onclick=" return confirm('Are you sue to delete msg from the seened box!');" style="padding:7px;background-color:red;border-radius:5px;text-decoration:none;color:white;height:40px;margin:5px;" href="viewbackup.php?delid=<?php echo($result['db_id']); ?>"><span class="glyphicon glyphicon-trash"></span></a>
					
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










<?php include 'inc/footer.php';?>