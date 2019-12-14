
<?php include 'controllers/authController.php'; ?>

<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['email'])) {
      //  header('location: login.php');
}

if(isset($_SESSION['type']) && ($_SESSION['type']=="Doctor")) {
 
header('Location: admin/Add_Patients.html');

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DiagnoX.ai</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    
</head>
<body>
    

<?php
//  include('header.html');
include('cube-box-div.php');


?>
<!--  type-write effect  -->




<div class="row">


<div class="col-lg-12">
<div class="flex-container" style="background-color:black">

  <h1 style="margin-top:0px; color:red; padding:2vw">
          <a style="text-decoration:none; color:red;font-size:2vw;" class="typewrite" data-period="2000" data-type='[ "Join Other Doctors and professional to diagnose Pneumonia in Realtime", "Industry Leading Performance in Pakistan..."]'>
            <!-- <span class="wrap"></span> -->
          </a>
        </h1>
      </div> 
      
      </div>
  <!-- <div class="col-md-2"></div> -->

</div>

<hr/>

<div class="row">

    <div class="col-md-6 border-primary text-center" >

    <figure class="figure">

    <img class="img-responsive figure-img img-fluid" style="width:auto; width:auto"  src="img/img1.jpg" alt="" >
    <figcaption class="figure-caption">Source: https://en.wikipedia.org/wiki/Pneumonia</figcaption>
</figure>
    </div>

<div class="col-md-6 col-lg-6 text-center" style="padding-top:10vh">

<h3 style="color:red">Pneumonia is killing us!</h3>
<hr>
<b class="lead"> Pneumonia accounts for over 15% of all deaths of children under 5 years old internationally. In 2015, 920,000 children under the age of 5 died from the disease.
 In the United States, pneumonia accounts for over 500,000 visits to emergency departments  and over 50,000 deaths in 2015 ,
 keeping the ailment on the list of top 10 causes of death in the country. </b>
 <cite title="Source Title" href="https://www.who.int/news-room/fact-sheets/detail/pneumonia">World Health Organization </cite>

<br><br>
 <p>*If you are interested in the basic anatomy you can see in a chest radiograph besides the lungs you can view this
    <a href="https://youtu.be/uo7ho8ZW2YY">5 minutes video by QuickMedic</a>.</p>
 

</div>

</div>


<div class="container">


<div class="row">

<div class="col-md-12">
<img src="img/doctorx-ray.jpg" alt="" class="img-responsive" style="width:auto; width:auto; min-height:100%;
    min-width:100%;" >
</div>
</div>
</div>


<!-- <div class="footer-small-screen"> -->
<?php
// echo '<br><br><br><br><br>';
// echo '<br><br><br><br><br>';
// echo '<br><br><br><br><br>';
// echo '<br><br><br><br><br>';

?>
<!-- </div> -->
<?php


// echo '<br><br><br><br><br>';


// <!-- Display messages -->
if (isset($_SESSION['message'])): ?>
<div class="alert <?php echo $_SESSION['type'] ?>">
  <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    unset($_SESSION['type']);
  ?>
</div>
<?php endif;?>


 <!-- <?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?> -->
<!-- <a href="logout.php" style="color: red">Logout</a> -->


<?php if (!isset($_SESSION['verified'])): ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    You need to verify your email address!
    Sign into your email account and click
    on the verification link we just emailed you
    at
    <strong><?php echo $_SESSION['email']; ?></strong>
  </div>
<?php else: ?>
  <!-- <button class="btn btn-lg btn-primary btn-block">I'm verified!!!</button> -->
<?php endif;



include('footer.html');

?>


</body>
<script src="js/type-write.js"></script>

<style>

 @media screen and (min-width: 992px) {

  .footer-small-screen{
    display:none
  }

 }
</style>

</html>

