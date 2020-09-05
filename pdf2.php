<?php
require('fpdf.php');

class myPDF extends FPDF {
  function Header()
  {
      // Logo
     //$this->Image('images.jpg',10,6,30);
      // Arial bold 15
      $this->SetFont('Arial','B',15);
      // Move to the right
      $this->Cell(80);
      // Title
      $this->Cell(30,10,'INVOICE',1,0,'C');
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
    function myCell($w,$h,$x,$t){
        $height=$h/3;
        $first=$height+2;
        $second=$height+$height+$height+3;
        $len=strlen($t);
        if($len>15){
            $txt=str_split($t,15);
            $this->SetX($x);
            $this->Cell($w,$first,$txt[0],'','','');
            $this->SetX($x);
            $this->Cell($w,$second,$txt[1],'','','');
            $this->SetX($x);
            $this->Cell($w,$h,'','LTRB',0,'L',0);
        }
        else{
            $this->SetX($x);
            $this->Cell($w,$h,$t,'LTRB',0,'L',0);
        }
    }
}
// Instanciation of inherited class
$no=$_POST["no"];
$s=$_POST["s"];

$arr=array();
for($i=1;$i<=$no;$i++)
{
  $arr[$i]=$_POST['med'.$i];
    $arr1[$i]=$_POST['quanti'.$i];
      $arr2[$i]=$_POST['ppm'.$i];
        $arr3[$i]=$_POST['tm'.$i];

}

$pdf = new myPDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',16);
$pdf->Ln();

$w=45;
$h=15;
$x=$pdf->getx();
$pdf->myCell($w,$h,$x,'Medicine');
$x=$pdf->getx();
$pdf->myCell($w,$h,$x,'Quantity');
$x=$pdf->getx();
$pdf->myCell($w,$h,$x,'Price[Rs]');
$x=$pdf->getx();
$pdf->myCell($w,$h,$x,'Total[Rs]');

$pdf->Ln();
for($i=1;$i<=$no;$i++)
{
  $x=$pdf->getx();
  $pdf->myCell($w,$h,$x,$arr[$i]);
$x=$pdf->getx();
$pdf->myCell($w,$h,$x,$arr1[$i]);
$x=$pdf->getx();
$pdf->myCell($w,$h,$x,$arr2[$i]);
$x=$pdf->getx();
$pdf->myCell($w,$h,$x,$arr3[$i]);

$pdf->Ln();

}
$x=$pdf->getx();
$pdf->myCell($w,$h,$x,'------xxx------');
$x=$pdf->getx();
$pdf->myCell($w,$h,$x,'------xxx------');
$x=$pdf->getx();
$pdf->myCell($w,$h,$x,'Total Amount:-');
$x=$pdf->getx();
$pdf->myCell($w,$h,$x,$s.' Rs');

$pdf->Ln();
$pdf->Output();
?>
