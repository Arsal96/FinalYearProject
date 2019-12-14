<?php include 'controllers/authController.php' ?>

<?php
// redirect user to login page if they're not logged in
if (isset($_SESSION['id'])) {
    header('location: main.php');
}


?>


<?php


// FORGOT USER
if (isset($_POST['reset-btn'])) {
    
    if (empty($_POST['password']))
     {
        $errors['password'] = 'Password required';
    }

    echo'before email';
    $email = $_REQUEST['Email'];

    if (isset($_GET['Email'])) {
        # code...
        $toke = $_GET['Email'];
        echo $toke;
    }
  
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password
    // Check if email already exists
    $sql = "UPDATE users SET password='{$password}'where token ='{$toke}";
    
    $result = mysqli_query($conn, $sql);
   
    if ($result) {
        echo'inse  success';
        header('location: ./login.php');

   }

    // if (count($errors) === 0)
    
    // {
    //      $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password

    //   // "UPDATE users SET password=? where email = '$email'";
    //     $query =  "UPDATE users SET password=? where email = ?";
    //     $stmt = $conn->prepare($query);
    //     $stmt->bind_param('ss', $password, $email);
    //     $result = $stmt->execute();

    //     if ($result) {
           
    //         $stmt->close();        
    //         header('location: ./login.php');
    //     } 
        
        else
        {
            $_SESSION['error_msg'] = "Database error: Could not register user";
        }
    // }

 
}
?>

<style>
	@media screen and (min-width: 750px) {
		#bars
		{
		
			display:none;
		}
		}
</style>

<!DOCTYPE html>
	<html lang="en">
<head>


<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>DiagnoX.ai - Reset Password</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">

	<link rel="stylesheet" href="css/style.css">

	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fa-fonts.css">


	<!-- <meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Login Page &mdash; Bootstrap 4 Login Page Snippet</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css"> -->
</head>

	<body>
		
	
<div class="splash">

<!-- Header Section -->

<nav class="navbar navbar-icon-top navbar-expand-lg">
            <a class="navbar-brand" href="main.php"
                style="font-family: Caviar Dreams; font-size: 33px; margin-top: 30px; color: rgb(231, 69, 69)">DiagnoX.ai</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <i class="fa fa-bars" id="bars" aria-hidden="true"   data-toggle="collapse" data-target="#navbarSupportedContent"></i>

            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul style="list-style-type: none;" style="list-style-type: none;" class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a style="
                text-decoration: none;" class="nav-link" href="main.php">
                            <i class="fa fa-home"></i>
                            Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a style="
                text-decoration: none;" class="nav-link" href="prediction/predict.php">
                            <i class="fa fa-plus-square">
                                <!-- <span class="badge badge-danger">11</span> -->
                            </i>
                            Try Demo
                        </a>
                    </li>

                    <li class="nav-item">
                        <a style="
                text-decoration: none;" class="nav-link" href="pricing.php">
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
              text-decoration: none;" class="nav-link" href="contact-form.php">
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
                                            text-decoration: none;" class="nav-link" href="login.php">
                                                              <i class="fa fa-sign-in">
                              
                                                              </i>';
                                            echo "Login";
                                        }
                                        else {
                                            echo '<a style="
                                            text-decoration: none; color:orange;" class="nav-link" href="logout.php">
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



<div class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center align-items-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/logo.jpg" alt="Diagnox.ai">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Forgot Password</h4>
							<form  action="reset-password.php" method="post" class="my-login-validation" novalidate="">
								

                            <div class="form-group">
									<label for="password">Password
										<a href="reset.html" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password" placeholder="Enter your Password" minlength=5 required data-eye>
								    <div class="invalid-feedback">
								    	Password is required and can't less than 5 characters
                                    </div>
                                    
                                    <div class="form-text text-muted">
                                    Make sure your password is strong and easy to remember									</div>
								</div>



								<div class="form-group m-0">
									<button type="submit" name="reset-btn" class="btn btn-primary btn-block">
										Reset Password
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2017 &mdash; Your Company 
					</div>
				</div>
			</div>
		</div>
	</section>
	
							
									</div>
				

									<div>

									
	<?php include_once('footer.html') ?>

									</body>



									<!-- SCRIPTS -->



	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>

</html>
