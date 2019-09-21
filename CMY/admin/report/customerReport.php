<?php
require('pdf/fpdf.php');
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'shop');

class PDF extends FPDF {
	function header(){
		$date = date('d/m/Y'); 
        $this->Image('logo.png',10,6);
		$this->SetFont('Arial','B',14);
		
		$this->SetTextColor(200,181,52);
		$this->Cell(276,5,'CMY ONLINE AC SHOP',0,0,'C');
		$this->Ln();
		
		$this->Cell(276,5,'Customer Details Information',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',12);
		$this->Cell(276,10,'Details Address of Customer Information',0,0,'C');
		$this->Ln();
		$this->SetFont('Arial','B',10);
		$this->Cell(276,10,'Create Report: '.$date,0,0,'C');
		$this->Ln(20);
		
	}
	function footer(){
		
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		
	}
	
	function headerTable(){
		$this->SetFillColor(200,181,52);
		$this->SetDrawColor(180,180,255);
		$this->SetTextColor(225,225,225);
		$this->SetFont('Times','B',12);
		$this->Cell(30,10,'Id',1,0,'C',true);
		$this->Cell(30,10,'Name',1,0,'C',true);
		$this->Cell(60,10,'Email',1,0,'C',true);
		$this->Cell(40,10,'Contact No',1,0,'C',true);
		$this->Cell(36,10,'Address',1,0,'C',true);
		$this->Cell(30,10,'City',1,0,'C',true);
		$this->Cell(50,10,'Country',1,0,'C',true);
		$this->Ln();
	}
	
	
	function viewTable($con){
		$this->SetFont('Times','',12);
		$query=mysqli_query($con,"select * from  customerinfo where role ='1'");
		while($data=mysqli_fetch_array($query)){
			   $this->SetFillColor(225,225,225);
			   $this->SetTextColor(0,0,0);
				$this->Cell(30,10,$data['cus_id'],1,0,'C',true);
				$this->Cell(30,10,$data['cus_name'],1,0,'C',true);
				$this->Cell(60,10,$data['cus_email'] ,1,0,'C',true);
				$this->Cell(40,10,$data['cus_contactno'],1,0,'C',true);
				$this->Cell(36,10,$data['cus_address'],1,0,'L',true);
				$this->Cell(30,10,$data['cus_city'],1,0,'C',true);
				$this->Cell(50,10,$data['cus_country'],1,0,'C',true);
				$this->Ln();
			}
     }
	
}
		
$pdf=new PDF();
$pdf->AliasNbPages();	
$pdf->AddPage('L','A4',0);	
$pdf->headerTable();	
$pdf->viewTable($con);	
$pdf->Output();	
		


