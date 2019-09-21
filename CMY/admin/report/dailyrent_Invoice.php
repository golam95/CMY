<?php
require('pdf/fpdf.php');
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'shop');


$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$date = date('d/m/Y'); 
$pdf->SetFont('Arial','B',14);




$pdf->Image('logo.png',10,6);
$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor(23,130,220);

$pdf->Cell(190,5,'CUSTOMER INVOICE DETAILS',0,0,'C');

$pdf->SetTextColor(0,0,0);

$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->Cell(189	,10,'',0,1);//end of line

$pdf->Cell(130	,5,'CMY ONLINE AC SHOP',0,0);

$pdf->Cell(59	,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);


$pdf->Cell(130	,5,'[Panthapath]',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'[Dhaka, Bangladesh, 1207]',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(34	,5,$date,0,1);//end of line

$pdf->Cell(130	,5,'Phone [+12345678]',0,0);


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->Cell(189	,10,'',0,1);//end of line
//billing address
$pdf->Cell(100	,5,'Bill to',0,1);//end of line



$id = $_GET['invoiup'];
$userid="";
$name="";
$email="";
$contact="";
$address="";
$city="";
$country="";
$query=mysqli_query($con,"select * from cus_orderent WHERE orderId ='$id'");
				while($data=mysqli_fetch_array($query)){
						$userid=$data['userId'];
			}
				
$query=mysqli_query($con,"select * from customerinfo WHERE cus_id ='$userid'");
		while($data=mysqli_fetch_array($query)){
						$name=$data['cus_name'];
						$email=$data['cus_email'];
						$contact=$data['cus_contactno'];
						$address=$data['cus_address'];
						$city=$data['cus_city'];
						$country=$data['cus_country'];
			}		

	   
	
//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'Name:- '.$name,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'Customer of CFG AC ONLINE MARKET',0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'Email:- '.$email,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'Contact:- '.$contact,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'Address:- '.$address,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'City:- '.$city,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'Country:- '.$country,0,1);




//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'Description',1,0);
$pdf->Cell(25	,5,'Taxable',1,0);
$pdf->Cell(34	,5,'Amount',1,1);//end of line
$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter




$query=mysqli_query($con,"select * from cus_orderent WHERE orderId ='$id'");
		while($data=mysqli_fetch_array($query)){

$pdf->Cell(130	,5,$data['productName'],1,0);
$pdf->Cell(25	,5,'-',1,0);
$pdf->Cell(34	,5,$data['price'],1,1,'R');//end of line



//summary
$pdf->Cell(130,5,'',0,0);
$pdf->Cell(25,5,'Tax',0,0);
$pdf->Cell(7,5,'Tk',1,0);
$pdf->Cell(27,5,'10%',1,1,'R');//end of line

$pdf->Cell(130,5,'',0,0);
$pdf->Cell(25,5,'Total',0,0);
$pdf->Cell(7,5,'Tk',1,0);
$pdf->Cell(27,5,$data['price'],1,1,'R');//end of line

}



$pdf->Output();
?>
