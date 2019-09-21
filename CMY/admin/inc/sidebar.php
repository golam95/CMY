<?php
include_once '../lib/Session.php'; 
Session::checkSession(); 
 ?>
 <div class="sidebar-nav">
    <ul>
    <li><a href="#" data-target=".dashboard-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-dashboard"></i> Dashboard<i class="fa fa-collapse"></i></a></li>
    <li><ul class="dashboard-menu nav nav-list collapse in">
            <li><a href="index.php"><span class="fa fa-caret-right"></span>Home</a></li>
            
    </ul></li>
	
	<li><a href="#" data-target=".notification-menu" class="nav-header collapsed" data-toggle="collapse"><i class="glyphicon glyphicon-user"></i> User Management<span class="label label-info">*</span></a></li>
        <li><ul class="notification-menu nav nav-list collapse">
            <li ><a href="viewUserDetails.php"><span class="fa fa-caret-right"></span>View All User</a></li>
            
    </ul></li>
	

	
  <li><a href="#" data-target=".employee-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i> Employee Information<i class="fa fa-collapse"></i></a></li>
        <li><ul class="employee-menu nav nav-list collapse">
            <li ><a href="viewEmp.php"><span class="fa fa-caret-right"></span> View Employee</a></li>
	 </ul></li>
	
	
	<li><a href="#" data-target=".rejine-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i>Resignation Employee<i class="fa fa-collapse"></i></a></li>
        <li><ul class="rejine-menu nav nav-list collapse">
            <li ><a href="rejineEmp.php"><span class="fa fa-caret-right"></span>View Resignation Employee</a></li>
    </ul></li>
	
	

	 <li><a href="#" data-target=".customer-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i> Customer Information<i class="fa fa-collapse"></i></a></li>
        <li><ul class="customer-menu nav nav-list collapse">
            <li ><a href="viewCustomerinformation.php"><span class="fa fa-caret-right"></span> Customer Details</a></li>
		</ul></li>
		
		
		 <li><a href="#" data-target=".customer-menuservice" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i> Customer Service<i class="fa fa-collapse"></i></a></li>
        <li><ul class="customer-menuservice nav nav-list collapse">
            <li ><a href="viewcustomerService.php"><span class="fa fa-caret-right"></span> Customer Service Details</a></li>
		</ul></li>
		
		
		
	
	
	 <li><a href="#" data-target=".product-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i>Product Details<i class="fa fa-collapse"></i></a></li>
	 
	 <li><ul class="product-menu nav nav-list collapse">
            <li ><a href="productlist.php"><span class="fa fa-caret-right"></span>View Products</a></li>
          
         
     </ul></li>
	 
	 
	
	  <li><a href="#" data-target=".productr-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i>Rent Product Details<i class="fa fa-collapse"></i></a></li>
	 
	 <li><ul class="productr-menu nav nav-list collapse">
            <li ><a href="rentproductlist.php"><span class="fa fa-caret-right"></span>View Rent Products</a></li>
     </ul></li>
	 
	
	 <li><a href="#" data-target=".category-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i>Category Details<i class="fa fa-collapse"></i></a></li>
        <li><ul class="category-menu nav nav-list collapse">
            <li ><a href="catlist.php"><span class="fa fa-caret-right"></span>View Catagory</a></li>
    </ul></li>
	 
	 
	
	 <li><a href="#" data-target=".order-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i>Order Details<i class="fa fa-collapse"></i></a></li>
        <li><ul class="order-menu nav nav-list collapse">
            <li ><a href="orderlist.php"><span class="fa fa-caret-right"></span>sale Order Details</a></li>
			 
			  <li ><a href="rent_orderlist.php"><span class="fa fa-caret-right"></span>Rent Order Details</a></li>
            
     </ul></li>
	 
	 
	  <?php if (Session::get("adminRole")=='0') { ?>
					
	 
	 
	  <li><a href="#" data-target=".order-menupayments" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i>Payments<i class="fa fa-collapse"></i></a></li>
        <li><ul class="order-menupayments nav nav-list collapse">
            <li ><a href="buy_payment.php"><span class="fa fa-caret-right"></span>Buy AC</a></li>
			<li ><a href="rent_payment.php"><span class="fa fa-caret-right"></span>Rent AC</a></li>
     </ul></li>
	 
	 
	 
	 <li><a href="#" data-target=".settings-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i>Settings<i class="fa fa-collapse"></i></a></li>
        <li><ul class="settings-menu nav nav-list collapse">
		 <li ><a href="monthlySetting.php"><span class="fa fa-caret-right"></span>Add Report Settings(Monthly)</a></li>
            <li ><a href="yearlySetting.php"><span class="fa fa-caret-right"></span>Add Report Settings(Yearly)</a></li>
    </ul></li>
	
	 <li><a href="#" data-target=".track-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i>Track<i class="fa fa-collapse"></i></a></li>
        <li><ul class="track-menu nav nav-list collapse">
            <li ><a href="history.php"><span class="fa fa-caret-right"></span>History</a></li>
    </ul></li>
	
	 <li><a href="#" data-target=".database-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i>Database Backup<i class="fa fa-collapse"></i></a></li>
        <li><ul class="database-menu nav nav-list collapse">
            <li ><a href="backupdatabase/backup.php"><span class="fa fa-caret-right"></span>Backup</a></li>
			<li ><a href="viewbackup.php"><span class="fa fa-caret-right"></span>View Backup</a></li>
    </ul></li>
	
	
	
	
	<li><a href="#" data-target=".report-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i>Report<i class="fa fa-collapse"></i></a></li>
        <li><ul class="report-menu nav nav-list collapse">
		    <li ><a href="monthlyReport.php"><span class="fa fa-caret-right"></span>Monthly Report</a></li>
            <li ><a href="yearlyReport.php"><span class="fa fa-caret-right"></span>Yearly Report</a></li>
    </ul></li>
	
	
	<li><a href="#" data-target=".report-menu6" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i>Graph Report<i class="fa fa-collapse"></i></a></li>
        <li><ul class="report-menu6 nav nav-list collapse">
		    <li ><a href="monthlygraphReport.php"><span class="fa fa-caret-right"></span>Monthly Report(Graph)</a></li>
            <li ><a href="yearlygraphReport.php"><span class="fa fa-caret-right"></span>Yearly Report(Graph)</a></li>
    </ul></li>
	
	  <?php } ?>
	
	
	<li><a href="#" data-target=".help-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i>Help<i class="fa fa-collapse"></i></a></li>
        <li><ul class="help-menu nav nav-list collapse">
            <li ><a href="help.php"><span class="fa fa-caret-right"></span>Help</a></li>
    </ul></li>
	

   </div>
