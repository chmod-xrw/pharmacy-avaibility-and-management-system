<html>
<head>
<style>
table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
table#t01 tr:nth-child(even) {
  background-color: #eee;
}
table#t01 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01 th {
  background-color: black;
  color: white;
}
</style>
<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>

<div class="sidenav">
  <a href="pindex.php">About</a>
  <a href="pmedicine.php">Medicine</a>
  <a href="med1.html">Billing</a>
  <a href="precord.php">Customer Record</a>
  <a href="pvendor.php">Contact Vendor</a>
  <a href="ppres.php">Notification</a>
  <a href="logout.php">Logout</a>
</div>

<div class="main">
		<table id="t01">

			<tr bgcolor='#cccc'>

				<th>Medicine Name</th>
				<th>Medicine Quantity</th>
				<th>Price Per Medicine(in Rs)</th>
				<th>medicine*quantity(in Rs)</th>

			</tr>
<?php
include_once('connection.php');

$no=$_POST["no"];

$arr=array();
$arr1=array();
$arr2=array();
$mn=array();
$mid=array();
$mp=array();
$quant=array();
$price=array();
$total=array();
for($i=1;$i<=$no;$i++)
{
  $arr[$i]=$_POST['med'.$i];
  $arr1[$i]=$_POST['quan'.$i];
}

//print_r($arr1);
$arr2=$arr;
$arr=join("','",$arr);
$query="SELECT * FROM medicine WHERE mname  IN ('$arr')";
$query1="SELECT mname FROM medicine WHERE quantity<=5";
$stmt=$con->prepare("UPDATE medicine SET quantity=quantity-? WHERE mname=?");
$stmt->bind_param("is",$quantity,$medname);
$result=mysqli_query($con,$query);
$result1=mysqli_query($con,$query1);
$j=1;
if($result1)
{
  echo " Medicines With Quantity (<5)  : ";
}
while($res = mysqli_fetch_assoc($result1)) {


		echo $res['mname']." ";


  }
while($res = mysqli_fetch_assoc($result)) {


	//	echo $res['price'];
		//echo $res['mid'];
		//echo $res['mname'];
    $mp[$j]=$res['price'];
    $mid[$j]=$res['mid'];
    $mn[$j]=$res['mname'];
    $j=$j+1;
  }

for($i=1;$i<=$no;$i++)
{
  for($j=1;$j<=$no;$j++)
  {
  if($arr2[$i]==$mn[$j])
  {
    $total[$i]= $arr1[$i]*$mp[$j];
    $price[$i]=$mp[$j];
   $quantity=$arr1[$i];
    $quant[$i]= $arr1[$i];
    $medname=$mn[$i];

    $stmt->execute();

  }
}
}
$sum=0;
for($i=1;$i<=$no;$i++)
{
    $sum=$sum+$total[$i];
}
//echo $sum;
      for($p=1;$p<=$no;$p++)
      {
      echo "<tr>";
        echo "<td>".$mn[$p]."</td>";

        echo "<td>".$quant[$p]."</td>";

        echo "<td>".$price[$p]."</td>";

        echo "<td>".$total[$p]."</td>";


        echo "</tr>";

      }
        echo "<tr>";
          echo "<td ><center>"."---***---"."</center></td>";
          echo "<td><center>"."---***---"."</center></td>";
            echo "<td><center>"."GRAND TOTAL(in Rs.)"."</center></td>";

        echo "<td><bold>".$sum." Rs"."</bold></td>";
        echo "</tr>";
echo "<form action=pdf2.php method=post>";
for($i=1;$i<=$no;$i++)
{
echo "<input type=hidden name=med$i value= $mn[$i]>";
echo "<input type=hidden name=quanti$i value= $quant[$i]>";
echo "<input type=hidden name=ppm$i value= $price[$i]>";
echo "<input type=hidden name=tm$i value= $total[$i]>";
}
echo "<input type=hidden name=no value= $no>";
echo "<input type=hidden name=s value=$sum>";
echo "<tr>";

echo "</tr>";
echo "<td ><center></center></td>";
echo "<td ><center></center></td>";
echo "<td ><center></center></td>";
echo "  <td ><center><input type=submit  value=Generate bill></center></td>";
echo "</tr>";
echo "</form>";
      ?>
      </table>
      </div>
      </body>
      </html>
