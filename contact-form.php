<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diagnose.ai - Contact</title>
    <link rel="stylesheet" href="css/contact-form-css.css">

<style>

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 102px;
}
</style>

</head>
<body>
<?php 

error_reporting(0);

?>

<div id=""> 

<?php include_once('header.php') ?>
</div>

        <div class="container">
                <div class="innerwrap">
                
                    <section class="section1 clearfix">
                        <div class="textcenter">
                            <!-- <span class="shtext">Contact Us</span> -->
                            <!-- <span class="seperator"></span> -->
                            <h1>Contact Us</h1>
                        </div>
                    </section>
                
                    <section class="section2 clearfix">
                        <div class="col2 column1 first">
                            <!-- <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div class="sec2map" style='overflow:hidden;height:550px;width:100%;'><div id='gmap_canvas' style='height:100%;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="http://freedirectorysubmissionsites.com/">free web directories</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(33.744282,72.786742),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(33.744282,72.88153973865361)});infowindow = new google.maps.InfoWindow({content:'<strong>My Location</strong><br>mumbai<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script> -->
                       
                            <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=comsats%20university%20wah&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.org">embed directions map google</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
                        </div>
                        <div class="col2 column2 last">
                            <div class="sec2innercont">
                                <div class="sec2addr">
                                    <p>Comsats University, Wah Campus, Rawalpindi, Pakistan</p>
                                    <p><span class="collig">Phone :</span>+92-123-1234567</p>
                                    <p><span class="collig">Email :</span>contact@diagnox.ai</p>
                                    <p><span class="collig">Fax :</span>+92-123-1234567</p>
                                </div>
                            </div>
                            <div class="sec2contactform">
                                <h3 class="sec2frmtitle">Want to Know More?? Drop Us a Mail</h3>


                                <?php

if($_GET['button'])

{


$fname=$_GET['fname'];
 $lname=$_GET['lname'];
$email=$_GET['email'];
 $contact_number=$_GET['contact_number'];
 $message=$_GET['message'];
    if($fname!="" && $lname!="" && $email!="" &&  $contact_number!="" &&  $message!="")
{
    
$servername = "localhost";  
$username = "root";
$password = "";
$dbname = "test";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//sql query

$sql = "INSERT INTO contact_form (fname, lname, email, contact_number,message)
VALUES ('$fname','$lname','$email','$contact_number','$message')";

if (mysqli_query($conn, $sql)) {
    echo "<h1 >"."Thank you for your corporation"."</h1";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
else
{
    echo '<h4 style="color:red">*All field are required</h4>';
}
}

header("location:contact-from.php?note=success");

?>



                                    <form action="#" method="GET" >
                                        <div class="clearfix">
                                            <input class="col2 first" type="text" placeholder="First Name" required  name="fname" pattern="[A-Za-z]{3,}" title="Please enter a corecct name" >
                                            <input class="col2 last" type="text" placeholder="Last Name" required name="lname" pattern="[A-Za-z]{3,}" title="Please enter a corecct name">
                                        </div>
                                        <div class="clearfix">
                                            <input  class="col2 first" type="Email" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"> 
                                            <input class="col2 last" type="text" required placeholder="03xxxxxxxxx" min-length="11" maxlength="11" name="contact_number" pattern="[0-9]{10,11}" title="Please enter a correct number (03001234567)">
                                        </div>
                                        <div class="clearfix">
                                            <textarea name="message" required min="5" max="300" id="" cols="30" rows="7" placeholder="Your message here..."></textarea>
                                        </div>



                                        <div class="clearfix"><input type="submit" value="Send" name="button"></div>
                                    
                                    </form>
                            </div>
        
                        </div>
                    </section>



                    <html>
                
                </div>
            </div>



 <?php include_once('footer.html') ?>
</body>
<script src="js/sticky-header.js"></script>

<script src="https://www.google.com/recaptcha/api.js?render=6LdhQ70UAAAAANllBdWneS_YJGuGqx4wP_-0MAao"></script>
<script>  
grecaptcha.ready(function() {
    grecaptcha.execute('6LdhQ70UAAAAANllBdWneS_YJGuGqx4wP_-0MAao
', {action: 'homepage'}).then(function(token) {
       ...
    });
});
</script>

</html>