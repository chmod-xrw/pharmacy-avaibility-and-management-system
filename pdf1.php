<?php
require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
  //  $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'BILL',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$no=$_POST["no"];

$arr=array();
for($i=1;$i<=$no;$i++)
{
  $arr[$i]=$_POST['med'.$i];
    $arr1[$i]=$_POST['quanti'.$i];
      $arr2[$i]=$_POST['ppm'.$i];
        $arr3[$i]=$_POST['tm'.$i];

}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=$no;$i++)
{
    $pdf->Cell(30,10,$arr[$i],1,1);

    $pdf->SetX(40);

    $pdf->Cell(30,10,$arr1[$i],1,1);
    $pdf->Cell(30,10,$arr2[$i],1,1);
    $pdf->Cell(30,10,$arr3[$i],1,1);
}
$pdf->Output();
?>
