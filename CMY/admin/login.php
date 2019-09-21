<?php include '../classes/adminloging.php'; ?>
<?php
 $al=new adminloging();
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$email=$_POST['email'];
	$password=$_POST['password'];
	$type=$_POST['type'];
	$loginchk=$al->adminLogin($email,$password,$type);
}
 ?>
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
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin LogIn</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css">
 <script type="text/javascript" src="inc/jquery.min.js"></script>
<script type="text/javascript" src="inc/bootstrap.min.js"></script>
<style>
.id{background-image: url("images/b1.jpg");}
div.relative {
	
	padding: 2px;
    position: relative;
     top: 30px;
     left: 400px;
    width: 600px;
    height: 400px;
    border: 3px solid #0C4778;
} 
.panel-heading a:hover{text-decoration: none;}

.form-horizontal{margin-top:30px;}
.headerinforation{padding:5px;background-color:#0C4778;}
.headerinforation h2{text-align:center;font-weight:bold;padding:3px;color:white;}
.headerinformation_two{padding:3px;background-color:#2769A1;}
.headerinformation_two h4{text-align:center;font-weight:bold;padding:3px;color:white;}
.footerinformation{padding:5px;background-color:#2769A1;margin-top:80px;}
.footerinformation p{text-align:center;font-style:italic;padding:3px;color:white;padding:5px;}
.footerinformation a{color:#FFFFFF;}
#generateReportBtn1{background-color:#2769A1;color:#FFFFFF;}


</style>

</head>
<body class="id">


<div class="headerinforation">
   <h2>Admin Panel</h2>
</div>

<div class="headerinformation_two">
   <h4>CMY Online AC Shop</h4>
</div>



<div class="relative">
 <div class="row">
              <div class="col-md-12">
             <div><h2 style="text-align:center;font-weight:bold;color:#2769A1;">LogIn</h2></div>
            <div class="panel-heading" style="text-align: center; font-size: 17px;color:#990F02;">
                <?php 
                if (isset($loginchk)) {
                    echo($loginchk);
                }
                 ?>
            </div>
            <!-- /panel-heading -->
            <div class="panel-body">
                
                <form class="form-horizontal" action="" method="post"  id="getOrderReportForm">
                  <div class="form-group">
                    <label style="color:#2769A1;" for="startDate" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                          <input id="email" type="email" class="form-control" name="email" placeholder="Enter your email">
                        </div>
                   
				   
				   
				   
                    </div>
                  </div>
                  <div class="form-group">
                    <label style="color:#2769A1;" for="startDate" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                     <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                      <input id="password" type="password" class="form-control" name="password" placeholder="Enter your password">
                    </div>
                    
                    </div>
                  </div>
				  
				  
				  
				  <div class="form-group">
                    <label style="color:#2769A1;" for="startDate" class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">
                     <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    
					  
					   <select class="form-control" name="type">
						<option>--Select--</option>
						<option value="3">Employee</option>
						<option value="0">Admin</option>
					 </select>
					  
					</div>
                    
                    </div>
                  </div>
				  
				  
				  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" name="submit" id="generateReportBtn1"> <i class="glyphicon glyphicon-ok-sign"></i> Log In</button>
                   </div>
                  </div>
                </form>
                <div class="panel-heading" style="text-align: center; font-size: 18px; ">
               <a style="color:#2769A1;" href="forgetpass.php">Forgot Password</a>
            </div>
            </div>
       
    </div>
    <!-- /col-dm-12 -->
</div>

</div>

<div class="footerinformation">
   <p>&copy; 2018 CMY Online AC shop. All rights reserved | Design by <a href="http://facebook.com">owner</a></p>
</div>

</body>
</html>
