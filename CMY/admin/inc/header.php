<?php 
// include '../lib/Session.php'; 
// Session::checkSession();
 ?>
 <?php 
include_once '../lib/Session.php'; 
Session::checkSession();
include_once '../lib/Database.php';
include_once '../helpers/Format.php';
  
 
include_once'../classes/Product.php';

spl_autoload_register(function($class){
include_once"../classes/".$class.".php";
});
$db=new Database();
$fm=new Format();

$pd=new Product(); 


 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>


<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>CMY</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!-- mm -->

<!-- mm -->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
   
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>

        <script src="lib/jQuery-Knob/js/jquery.knob.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $(".knob").knob();
        });
    </script>


    <link rel="stylesheet" type="text/css" href="stylesheets/theme2.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/elements.css">
    <!-- new -->
     <link type="text/css" rel="stylesheet" href="style.css"/>
     <script src="jquery.min.js"></script>
	 
	 
	 <!-- new -->
	 
	 
	 
    
</head>
<body class="theme-blue">

    <!-- Demo page code -->

    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if(match) var color = match[1];
            if(color) {
                $('body').removeClass(function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});
            
        });
    </script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: white;
            font-size:30px;
            font-weight:bold;
            background:#2769A1;
            padding:10px;
            height:80px;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>

 
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">


    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="index.php"><span class="navbar-brand"><span class="glyphicon glyphicon-shopping-cart"></span>CMY<br/>Online AC Market</span></a>
          
         </div>
          
                        <?php 
           if (isset($_GET['action'])&&$_GET['action']=="logout") {
            Session::destroy();
           }
           ?>

        <div class="navbar-collapse collapse" style="height: 1px;">
        
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> <?php echo(Session::get('adminName')); ?>
                    <i class="fa fa-caret-down"></i>
                </a>
              <ul class="dropdown-menu">
			    <li><a href="adminEditprofile.php?rmsgid=<?php echo(Session::get('adminId'));?>">My Account</a></li>
                <li class="divider"></li>
               <li><a href="?action=logout"><span style="color:rgb(67, 111, 112);">Logout</span ></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    