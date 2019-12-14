<!DOCTYPE html>

<?php 
// Include configuration file   
require_once 'config.php'; 
require_once '../controllers/authController.php';
// redirect user to login page if they're not logged in
if (!(isset($_SESSION['email']))) {
    header('location: ../login.php');
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

<!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
<link rel="stylesheet" href="../css/fa-fonts.css">
</head>




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
    // Include configuration file  
    // require_once 'config.php'; 
    
    $payment_id = $statusMsg = ''; 
    $ordStatus = 'error'; 
 
// Check whether stripe token is not empty 
    if(!empty($_POST['stripeToken'])){ 
        
        // Retrieve stripe token, card and user info from the submitted form data 
        $token  = $_POST['stripeToken']; 
        $name = $_POST['name']; 
        $email = $_POST['email']; 
        $card_number = $_POST['card_number']; 
        $card_exp_month = $_POST['card_exp_month']; 
        $card_exp_year = $_POST['card_exp_year']; 
        $card_cvc = $_POST['card_cvc']; 
        
        // Include Stripe PHP library 
        require_once 'init.php'; 
        
        // Set API key 
        \Stripe\Stripe::setApiKey(STRIPE_API_KEY); 
        
        // Add customer to stripe 
        $customer = \Stripe\Customer::create(array( 
            'email' => $email, 
            'source'  => $token 
        )); 
        
        // Unique order ID 
        $orderID = strtoupper(str_replace('.','',uniqid('', true))); 
        
        // Convert price to cents 
        $itemPrice = ($itemPrice*100); 
        
        // Charge a credit or a debit card 
        $charge = \Stripe\Charge::create(array( 
            'customer' => $customer->id, 
            'amount'   => $itemPrice, 
            'currency' => $currency, 
            'description' => $itemName, 
            'metadata' => array( 
                'order_id' => $orderID 
            ) 
        )); 
        
        // Retrieve charge details 
        $chargeJson = $charge->jsonSerialize(); 
    
        // Check whether the charge is successful 
        if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){ 
            // Order details  
            $transactionID = $chargeJson['balance_transaction']; 
            $paidAmount = $chargeJson['amount']; 
            $paidCurrency = $chargeJson['currency']; 
            $payment_status = $chargeJson['status']; 
            
            // Include database connection file  
        // include_once 'dbConnect.php'; 
            
            // Insert tansaction data into the database 
            $sql = "INSERT INTO orders(name,email,card_number,card_exp_month,card_exp_year,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,created,modified) VALUES('".$name."','".$email."','".$card_number."','".$card_exp_month."','".$card_exp_year."','".$itemName."','".$itemNumber."','".$itemPrice."','".$currency."','".$paidAmount."','".$paidCurrency."','".$transactionID."','".$payment_status."',NOW(),NOW())"; 
            $insert = $db->query($sql); 
            $payment_id = $db->insert_id; 
            
            // If the order is successful 
            if($payment_status == 'succeeded'){ 
                $ordStatus = 'success'; 
                $statusMsg = 'Your Payment has been Successful!'; 
            }else{ 
                $statusMsg = "Your Payment has Failed!"; 
            } 
        }else{ 
            //print '<pre>';print_r($chargeJson); 
            $statusMsg = "Transaction has been failed!"; 
        } 
    }else{ 
        $statusMsg = "Error on form submission."; 
    } 
?>






<body class="splash">


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
<div class="col-md-12">
                                        


<div class="container" style="height:70vh">
    <div class="status">
        <?php if(!empty($payment_id)){ ?>
            <h1 class="<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>
			
            <h4>Payment Information</h4>
            <p><b>Reference Number:</b> <?php echo $payment_id; ?></p>
            <p><b>Transaction ID:</b> <?php echo $transactionID; ?></p>
            <p><b>Paid Amount:</b> <?php echo $paidAmount.' '.$paidCurrency; ?></p>
            <p><b>Payment Status:</b> <?php echo $payment_status; ?></p>
			
            <h4>Product Information</h4>
            <p><b>Name:</b> <?php echo $itemName; ?></p>
            <p><b>Price:</b> <?php echo $itemPrice.' '.$currency; ?></p>
        <?php }else{ ?>
            <h1 class="error" style="color:white">Your Payment has Failed</h1>
        <?php } ?>
    </div>
    <a href="../pricing.php" class="btn-link">Back to Payment Page</a>
</div>
</div>



</div>



<div >

<?php include_once('../footer.html') ?>
</div>
</body>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="../js/my-login.js"></script>

</html>