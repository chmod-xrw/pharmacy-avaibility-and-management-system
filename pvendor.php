<?php
include_once('connection.php');
$query="SELECT vid,name FROM vendor";
$result=mysqli_query($con,$query);

session_start();
$_SESSION['pos']="prescription";
if(!isset($_SESSION['uname']))
{
    header("Location: index.php");
    exit;
}
else
{
	$uname=$_SESSION['uname'];
}
 if(isset($_POST)==true && empty($_POST)==false)
 {
				$chkbox = $_POST['chk'];
				$BX_NAME=$_POST['BX_NAME'];
				$BX_age=$_POST['BX_age'];
				$vid = $_POST['vname'];

        $serialized_array1=serialize($BX_NAME);
        $serialized_array2=serialize($BX_age);
        $stmt="INSERT INTO `order` (`oid`, `vid`, `pname`, `mname`, `qty`) VALUES (NULL, '$vid', '$uname', '$serialized_array1', '$serialized_array2')";
		$result=mysqli_query($con,$stmt);
		header("Location: pindex.php");
 }	
?>


<html>
    <head>
        <title>Contact Vendor</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="css/default.css"/>
		<script type="text/javascript" src="js/script.js"></script> 
    </head>
    <body>    
        <form action="pvendor" class="register" method="POST">
            <h1>Contact Vendor</h1>
			<fieldset class="row1">
                <legend>Vendor Information</legend>
                <p>
				<label>Vendor Name
                    </label>
				<?php
						echo "<select name='vname'>";
						while ($row = mysqli_fetch_array($result)) {

						echo "<option value='" . $row['vid'] ."'>" . $row['name']."</option>";
				}
				echo "</select>";
				?>
                </p>
				<div class="clear"></div>
            </fieldset>
            <fieldset class="row2">
				<legend>Medicine Details</legend>
				<p> 
					<input type="button" value="Add Medicine" onClick="addRow('dataTable')" /> 
					<input type="button" value="Remove Medicine" onClick="deleteRow('dataTable')"  /> 
					<p>(All acions apply only to entries with check marked check boxes only.)</p>
				</p>
               <table id="dataTable" class="form" border="1">
                  <tbody>
                    <tr>
                      <p>
						<td><input type="checkbox" required="required" name="chk[]" checked="checked" /></td>
						<td>
							<label>Name</label>
							<input type="text" required="required" name="BX_NAME[]">
						 </td>
						 <td>
							<label for="BX_age">Qty</label>
							<input type="text" required="required" class="small"  name="BX_age[]">
					     </td
							</p>
                    </tr>
                    </tbody>
                </table>
				<div class="clear"></div>
            </fieldset>
            <fieldset class="row3">
               <!-- <legend>Further Information</legend>
				<p>The identification details are required during journey. One of the passenger booked on the ticket should have any of the identity cards ( Passport / PAN Card / Driving License / Photo ID card issued by Central / State Govt / Student Identity Card with photograph) during the journey in original. </p>
				--><div class="clear"></div>
            </fieldset>
            <fieldset class="row4">
                <!--<legend>Terms and Mailing</legend>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>*  I accept the <a href="#">Terms and Conditions</a></label>
                </p>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>I want to receive personalized offers by your Service</label>
                </p>
				
				<div class="clear"></div>-->
            </fieldset>
			<input class="submit" type="submit" value="Confirm &raquo;" />
			<!--<a class="submit" href="http://techstream.org/Web-Development/PHP/Dynamic-Form-Processing-with-PHP"/>Back to Techstream Article</a>
			-->
			<div class="clear"></div>
        </form>
		
    </body>
	<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=9046834; 
var sc_invisible=1; 
var sc_security="ec55ba17"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="free hit
counter" href="http://statcounter.com/" target="_blank"><img
class="statcounter"
src="http://c.statcounter.com/9046834/0/ec55ba17/1/"
alt="free hit counter"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->
</html>





