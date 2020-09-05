<?php
include_once('connection.php');
$arr=array();
$arr1=array();
$id=4;
$query="SELECT * FROM demo WHERE id='$id'";
$result=mysqli_query($con,$query);
$j=0;
while($res = mysqli_fetch_assoc($result))
{
$arr[$j]= unserialize($res['name']);

 $arr1[$j]= unserialize($res['med']);

 $j=$j+1;
}
echo $j;
$str=array();
$str=json_encode ($arr);

$k=0;
for($i=0;$i<100;$i++)
{

  $k=$k+1;
  if($str[$i]=="]")
  break;

}

echo '<html>
<head>
</head>
<body>
<table>';
echo'<td>';

for($i=2;$i<$k-1;$i++)
{
  if($str[$i]==",")
  {echo'</td>
  ';
  echo'<td>';

  continue;}
  else

  echo $str[$i];



}


?>
