<?php
include_once('connection.php');

if(!isset($_SESSION['uname']))
{
    header("Location: index.php");
    exit;
}
else
{
	$cid=$_SESSION['cid'];
	$uname=$_SESSION['uname'];
	$name=$_SESSION['name'];
	$no=$_SESSION['no'];
}
$arr=array();
if(isset($_POST['submit']))
{
	if((($_FILES["file"]["type"] == "image/gif") 
		||($_FILES["file"]["type"] == "image/jpeg") 
		|| ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 200000)) 
		{
			if($_FILES["file"]["error"]>0) 
			{ 
					echo '<script language="javascript">';
					echo 'alert("Error in uploading please try again..!")';  
					echo '</script>';
			}	 
			else 
			{ 
			
				
				$image = $_FILES['file']['tmp_name'];
				$image = addslashes(file_get_contents($image));
				$qry="insert into prescription (cid,name,contact,pic) values ('$cid','$name','$no','$image')";
				$result=mysqli_query($con,$qry);
				$qry1="insert into record (cid,name,contact,pic) values ('$cid','$name','$no','$image')";
				$result1=mysqli_query($con,$qry1);
				if($result)
				{
					echo '<script language="javascript">';
					echo 'alert("Image Uploaded Succesfully")';  
					echo '</script>';
				}
				
			}
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Invalid file or too large")';  
			echo '</script>';
		}
		
		
		
}
?>
<html lang="en">

<head>

    <title>Health - Medical Website Template</title>
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
    <!--

Template 2098 Health

http://www.tooplate.com/view/2098-health

-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Tooplate">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="ph1/css/bootstrap.min.css">
    <link rel="stylesheet" href="ph1/css/font-awesome.min.css">
    <link rel="stylesheet" href="ph1/css/animate.css">
    <link rel="stylesheet" href="ph1/css/owl.carousel.css">
    <link rel="stylesheet" href="ph1/css/owl.theme.default.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="ph1/css/tooplate-style.css">

</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- PRE LOADER -->
    <section class="preloader">
        <div class="spinner">

            <span class="spinner-rotate"></span>

        </div>
    </section>

    <!-- HEADER -->
    <header>
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-5">
                    <p>Welcome to MABS</p>
                </div>

                <div class="col-md-8 col-sm-7 text-align-right">
                    <span class="phone-icon"><i class="fa fa-phone"></i> +91 9898123567</span>
                    <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 9:00 AM - 11:00 PM (Mon-Sat)</span>
                    <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="#">medicalshop@gmail.com</a></span>
                </div>

            </div>
        </div>
    </header>

    <!-- MENU -->
    <section class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>

                <!-- lOGO TEXT HERE -->
                <a href="index.html" class="navbar-brand"><i class="fa fa-m-square"></i>MEDICINE AVAILIBILITY AND BILLING SYSTEM</a>
				
            </div>

            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#top" class="smoothScroll">Home</a></li>
                    <li><a href="#about" class="smoothScroll">Previous Records</a></li>
                    <li><a href="#google-map" class="smoothScroll">Contact</a></li>
                    <li class="appointment-btn"><a href="#appointment">Upload Prescription</a></li>
					<li  class="appointment-btn"><b><a href="logout.php">Log Out</a></b></li>
                </ul>
            </div>

        </div>
    </section>

    <!-- HOME -->
    <section id="home" class="slider" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">

                <div class="owl-carousel owl-theme">
                    <div class="item item-first">
                        <div class="caption">
                            <div class="col-md-offset-1 col-md-10">
                                <h3>Let's make your life Easier</h3>
                                <h1>Healthy Living</h1>
                                <a href="#team" class="section-btn btn btn-default smoothScroll">Any Medicines Available</a>
                            </div>
                        </div>
                    </div>

                    <div class="item item-second">
                        <div class="caption">
                            <div class="col-md-offset-1 col-md-10">
                                <h3></h3>
                                <h1>New Lifestyle</h1>
                                <a href="#about" class="section-btn btn btn-default btn-gray smoothScroll">More About Us</a>
                            </div>
                        </div>
                    </div>

                    
                </div>

            </div>
        </div>
    </section>

    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                    <div class="about-info">
                        <h2 class="wow fadeInUp" data-wow-delay="0.6s">Your Records on <i class="fa fa--square"></i>MABS</h2>
                        <div class="wow fadeInUp" data-wow-delay="0.8s">
                            <table width='80%' border='0' id="t01">
		
			<tr bgcolor='#cccc'>
			
				<th>cid</th>
				<th>Prescription</th>
			
			</tr>
			
			<?php
				
					$query="SELECT * FROM record WHERE cid='$cid'";
					$result=mysqli_query($con,$query);
			
					while($res = mysqli_fetch_array($result))
					{
						echo "<tr>";
						echo "<td>".$res['cid']."</td>";
						echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $res['pic'] ).'"/></td>';
						echo "</tr>";	
					}
				?>
							
		
							</table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

   

  
    <!-- MAKE AN APPOINTMENT -->
    <section id="appointment" data-stellar-background-ratio="3">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                    <img src="ph1/images/Procare-Logo.jpg" class="img-responsive" alt="">
                </div>

                <div class="col-md-6 col-sm-6">
                    <!-- CONTACT FORM HERE -->
                    <form id="appointment-form" role="form" method="post" action="#" enctype="multipart/form-data">

                        <!-- SECTION TITLE -->
                        <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                            <h2>Upload Prescription</h2>
                        </div>

                        <div class="wow fadeInUp" data-wow-delay="0.8s">
                            <div class="col-md-6 col-sm-6">
                                <label for="name">Prescription</label>
                                <input type="file" class="form-control" id="file" name="file" placeholder="Full Name"><b style="color:red;">image must be in .jpg/.jpeg/.gif/.png format & size must be < 2MB</b>
                            </div>

                          
                                <button type="submit" class="form-control" id="cf-submit" name="submit">Submit Button</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- GOOGLE MAP -->
    <section id="google-map">
        <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29477.26657147634!2d72.92813459999999!3d22.5544686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xab364c66fd4834c!2sBirla+Vishvakarma+Mahavidyalaya!5e0!3m2!1sen!2sin!4v1551331605310" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>   
 </section>

    <!-- FOOTER -->
    <footer data-stellar-background-ratio="5">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-4">
                    <div class="footer-thumb">
                        <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
                        <p>ADDRESS</p>

                        <div class="contact-info">
                            <p><i class="fa fa-phone"></i> +91 9898123456</p>
                            <p><i class="fa fa-envelope-o"></i> <a href="#">info@company.com</a></p>
                        </div>
                    </div>
                </div>

                

                <div class="col-md-4 col-sm-4">
                    <div class="footer-thumb">
                        <div class="opening-hours">
                            <h4 class="wow fadeInUp" data-wow-delay="0.4s">Opening Hours</h4>
                            <p>Monday - Friday <span>06:00 AM - 10:00 PM</span></p>
                            <p>Saturday <span>09:00 AM - 08:00 PM</span></p>
                            <p>Sunday <span>Closed</span></p>
                        </div>

                        <ul class="social-icon">
                            <li>
                                <a href="https://www.facebook.com/tooplate" class="fa fa-facebook-square" attr="facebook icon"></a>
                            </li>
                            <li>
                                <a href="#" class="fa fa-twitter"></a>
                            </li>
                            <li>
                                <a href="#" class="fa fa-instagram"></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 border-top">
                    <div class="col-md-4 col-sm-6">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2019 </p>
                        </div>
                    </div>
                    
                    <div class="col-md-2 col-sm-2 text-align-center">
                        <div class="angle-up-btn">
                            <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="ph1/js/jquery.js"></script>
    <script src="ph1/js/bootstrap.min.js"></script>
    <script src="ph1/js/jquery.sticky.js"></script>
    <script src="ph1/js/jquery.stellar.min.js"></script>
    <script src="ph1/js/wow.min.js"></script>
    <script src="ph1/js/smoothscroll.js"></script>
    <script src="ph1/js/owl.carousel.min.js"></script>
    <script src="ph1/js/custom.js"></script>

</body>

</html>