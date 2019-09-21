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

 <script type="text/javascript">
     function printlayer(Layer){
	    var generator=window.open(",'name,");
		var layertext=document.getElementById(Layer);
		generator.document.write(layertext.innerHTML.replace("print Me"));
		generator.document.close();
		generator.print();
		generator.close();
	 }
  </script>
 
 

 <div class="content">
 <div class="header">
 
    <div class="titleright">
		 <h1 style="margin-bottom:18px;text-align:center;" class="page-title">***Yearly Graph Report***</h1>
		</div>
		<a style="background:#2769A1;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:20px;border:4px solid #0B3E69;" href="index.php"><span class="glyphicon glyphicon-home" ></span> Home</a>
		
		<a style="background:#2769A1;padding:5px;color:white;text-decoration:none;border-radius:10px;font-weight:bold;margin-left:20px;border:4px solid #0B3E69;" href="#" onclick="javascript:printlayer('java')"><span class="glyphicon glyphicon-print" ></span> Print</a>
		
	</div>
	
	<div class="main-content">
	
	 <div class="col-md-12">
	 
	     <div class="col-md-6">
		      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
             
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
					<?php 
				    $aa='<div>Brand : <b>$row["productName"]</b><br/>Total Revenue : <b></div>';
				    $query = "SELECT * FROM  year_setting";
					$msg=$db->select($query);
					$ss="";
                    $dd="";
					if ($msg) {
						while ($result=$msg->fetch_assoc()) {
							$ss=$result["y_order"];
                            $dd=$result["y_year"];
                           echo "['Year :".$dd."',".$ss."],";
						}
						 
					}
					 
					 ?>
					
                     ]);  
                var options = {  
                      title: 'Percentage of total customer order',  
                      is3D:true,  
                     // pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
		   </script>  
		   <div id="piechart" style="width:600px; height: 200px;"></div>
          
		 </div>
		 
		 <div class="col-md-6">
		   

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
             
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
					<?php 
				    $aa='<div>Brand : <b>$row["productName"]</b><br/>Total Revenue : <b>';
				    $query = "SELECT * FROM year_setting";
					$msg=$db->select($query);
					$ss="";
                    $dd="";
					if ($msg) {
						while ($result=$msg->fetch_assoc()) {
							$ss=$result["y_sellprice"];
                            $dd=$result["y_year"];
                           echo "['Year :".$dd."',".$ss."],";
						}
						 
					}
					 
					 ?>
					
                     ]);  
                var options = {  
                      title: 'Percentage of sell price of annual basis',  
                      is3D:true,  
                     // pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('pie'));  
                chart.draw(data, options);  
           }  
		   </script>  
		   <div id="pie" style="width:430px; height: 200px;"></div>
		 
		 </div>
		 
		 
		 
	 </div>
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 <div class="col-md-12">
	    	 <h3 style="text-align:center;font-style:bold;color:#2769A1;">*** Chart Report For Year ***</h3>
		 <div class="col-md-12">
		   

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
          
           google.charts.load("visualization","1", {packages:['corechart']});		   
           google.charts.setOnLoadCallback(drawChart);  
             
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
					<?php 
				    $aa='<div>Brand : <b>$row["productName"]</b><br/>Total Revenue : <b>';
				    $query = "SELECT * FROM year_setting";
					$msg=$db->select($query);
					$ss="";
                    $dd="";
					if ($msg) {
						while ($result=$msg->fetch_assoc()) {
							$ss=$result["y_year"];
                            $dd=$result["y_sellprice"];
                           echo "['Year :".$ss."',".$dd."],";
						}
						 
					}
					 
					 ?>
					
                     ]);
                   var options = {  
                      title: 'Percentage of sell price of annual basis',   
                      is3D:true,  
                     // pieHole: 0.4  
                     };  
				   var chart = new google.visualization.ColumnChart(document.getElementById('java'));  
                chart.draw(data, options);  
           }  
		   </script>  
		   <div id="java" style="width:1030px; height:400px;">
		    </div>
		 
		 </div>
	 
	 </div>

	

<?php include 'inc/footer.php';?> 
