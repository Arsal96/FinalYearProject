<?php 
// Include configuration file   
require_once 'config.php'; 
require_once '../controllers/authController.php';
// redirect user to login page if they're not logged in
if (!(isset($_SESSION['email']))) {
    header('location: ../login.php');
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout -Diagnox.ai</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

<!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
<link rel="stylesheet" href="../css/fa-fonts.css">



<style>
@media screen and (min-width: 750px) {
    #bars
    {
    
        display:none;
    }

    #logo
    {
        font-size:20px;
        
    }
}
</style>


<?php

$itemName = $_POST['itemName']; 
$itemNumber = $_POST['itemNumber']; 
$itemPrice = $_POST['itemPrice']; 


?>


</head>





<body class="splash">

<!-- HEADER -->

<nav class="navbar navbar-icon-top navbar-expand-lg">
            <a class="navbar-brand" id="logo"  href="main.php"
                style="font-family: Caviar Dreams;  font-size: 33px; margin-top: 30px; color: rgb(231, 69, 69)">DiagnoX.ai</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <i class="fa fa-bars" id="bars" aria-hidden="true"   data-toggle="collapse" data-target="#navbarSupportedContent"></i>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul style="list-style-type: none;" style="list-style-type: none;" class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a style="
                text-decoration: none;" class="nav-link" href="../main.php">
                            <i class="fa fa-home"></i>
                            Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a style="
                text-decoration: none;" class="nav-link" href="../diagnose.php">
                            <i class="fa fa-plus-square">
                                <!-- <span class="badge badge-danger">11</span> -->
                            </i>
                            Try Demo
                        </a>
                    </li>
                    <li class="nav-item">
                        <a style="
                text-decoration: none;" class="nav-link" href="../pricing.php">
                            <i class="fa fa-usd">
                                <!-- <span class="badge badge-danger">11</span> -->
                            </i>
                            Pricing
                        </a>
                    </li>


                    <li class="nav-item dropdown">
                        <a style="
              text-decoration: none;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-building">
                                <!-- <span class="badge badge-primary">11</span> -->
                            </i>
                            Company
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a style="
                text-decoration: none; margin-bottom: 15px" class="dropdown-item" href="#">About US</a>
                            <div class="dropdown-divider"></div>
                            <a style="
                text-decoration: none;" class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a style="
              text-decoration: none;" class="nav-link" href="../contact-form.php">
                            <i class="fa fa-envelope">
                                <span class="badge badge-danger">11</span>
                            </i>
                            Contact
                        </a>
                    </li>
                    <!-- <li class="nav-item">
              <a style="
              text-decoration: none;" class="nav-link disabled" href="#">
                <i class="fa fa-envelope-o">
                  <span class="badge badge-warning">11</span>
                </i>
                Disabled
              </a>
            </li> -->
                    <!-- <li class="nav-item dropdown">
              <a style="
              text-decoration: none;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-envelope-o">
                  <span class="badge badge-primary">11</span>
                </i>
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a style="
                text-decoration: none;" class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li> -->
                </ul>
                <div class="header-right">
                <ul style="list-style-type: none;" class="navbar-nav">
                                <li class="nav-item">
                                   

                                <?php if(isset($_SESSION['email'])==null)
                                        {
                                            echo '<a style="
                                            text-decoration: none;" class="nav-link" href="../login.php">
                                                              <i class="fa fa-sign-in">
                              
                                                              </i>';
                                            echo "Login";
                                        }
                                        else {
                                            echo '<a style="
                                            text-decoration: none; color:orange;" class="nav-link" href="../logout.php">
                                                              <i class="fa fa-sign-out">
                              
                                                              </i>';

                                            echo 'Logout';
                                            echo "<br>";
                                            if(isset($_SESSION['email'])) echo $_SESSION['email'];

                                        }
                                        ?>
                            </a>
                        </li>

                        <li class="nav-item">
                                <?php if(isset($_SESSION['email'])==null)
                                        {
                                           echo' <a style="
                      text-decoration: none;" class="nav-link" href="register.php">
                                        <i class="fa fa-user-plus">
                                        </i>
                                        Register
                                    </a>';
                                        }
                                        ?>
                                    
                                </li>


                    </ul>


                </div>
                <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form> -->
            </div>
        </nav>






<!-- CHECKOUT FORM -->

<div class="row">
<div class="panel container col-md-4 col-md-offset-4 col-sm-4 col-xs-12" >
    <div class="panel-heading text-center" >
    <h2 style="color:green"> CHECKOUT SUCSCRIPTION</h2>
        <!-- <h3 class="panel-title" class="h4 mb-4">Charge: <?php echo 'PKR '.$itemPrice; ?> </h3> -->
		
        <!-- Product Info -->
        <p class="h4 mb-4" style="color:green"><b style="color:black">Item Name:</b> <?php echo $itemName; ?></p>
        <p class="h4 mb-4" style="color:red"><b>Price:</b> <?php echo 'PKR '.$itemPrice.' '.$currency; ?></p>
    </div>
    <div class="panel-body">
        <!-- Display errors returned by createToken -->
        <div class="payment-status"></div>
		
        <!-- Payment form -->
        <form action="payment.php" class="text-center border border-light p-5" method="POST" id="paymentFrm">
            <div class="form-group">
                <label>NAME</label>
                <input class="form-control col-md" type="text" name="name" id="name" placeholder="Enter name" required="" autofocus="">
            </div>
            <div class="form-group">
                <label>EMAIL</label>
                <input class="form-control mb-4" type="email" name="email" id="email" placeholder="Enter email" required="">
            </div>
            <div class="form-group">
                <label>CARD NUMBER</label>
                <input class="form-control mb-4" type="text" name="card_number" id="card_number" placeholder="1234 1234 1234 1234" autocomplete="off" required="">
            </div>
            <div class="row">
                <div class="left">
                    <div class="form-group">
                        <label>EXPIRY DATE</label>
                        <div class="col-1">
                            <input class="form-control mb-4" type="text" name="card_exp_month" id="card_exp_month" placeholder="MM" required="">
                        </div>
                        <div class="col-2">
                            <input class="form-control mb-4" type="text" name="card_exp_year" id="card_exp_year" placeholder="YYYY" required="">
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="form-group">
                        <label>CVC CODE</label>
                        <input  class="form-control mb-4" type="text" name="card_cvc" id="card_cvc" placeholder="CVC" autocomplete="off" required="">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info btn-block" id="payBtn">Submit Payment</button>
        </form>
    </div>
</div>
</div>

<div>

</div>

<?php include_once('../footer.html') ?>

</body>


<!-- Stripe JavaScript library -->
<script src="https://js.stripe.com/v2/"></script>
<!-- jQuery is used only for this example; it isn't required to use Stripe -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>




<script>
// Set your publishable key
Stripe.setPublishableKey('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

// Callback to handle the response from stripe
function stripeResponseHandler(status, response) {
if (response.error) {
    // Enable the submit button
    $('#payBtn').removeAttr("disabled");
    // Display the errors on the form
    $(".payment-status").html('<p  style="color:red">'+response.error.message+'</p>');
} else {
    var form$ = $("#paymentFrm");
    // Get token id
    var token = response.id;
    // Insert the token into the form
    form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
    // Submit form to the server
    form$.get(0).submit();
}
}

$(document).ready(function() {
// On form submit
$("#paymentFrm").submit(function() {
    // Disable the submit button to prevent repeated clicks
    $('#payBtn').attr("disabled", "disabled");
    
    // Create single-use token to charge the user
    Stripe.createToken({
        number: $('#card_number').val(),
        exp_month: $('#card_exp_month').val(),
        exp_year: $('#card_exp_year').val(),
        cvc: $('#card_cvc').val()
    }, stripeResponseHandler);
    
    // Submit from callback
    return false;
});
});
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="../js/my-login.js"></script>



</html>