<?php include 'controllers/authController.php' ?>

<?php
// redirect user to login page if they're not logged in
if (isset($_SESSION['email'])) {
    header('location: main.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>DiagnoX.ai - Register</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
	<link rel="stylesheet" href="css/style.css">

	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fa-fonts.css">
</head>

<style>
@media screen and (min-width: 750px) {
#bars
{
  
    display:none;
}
}
</style>




<div class="splash">




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
                text-decoration: none;" class="nav-link" href="diagnose.php">
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




        <body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/logo.jpg" alt="bootstrap 4 login page">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title text-center ">Register</h4>

<!-- Display Error( if any) -->

<?php
if (count($errors) > 0): ?>
  <div class="alert alert-danger">
    <?php foreach ($errors as $error): ?>
    <li>
      <?php echo $error; ?>
    </li>
    <?php endforeach;?>
  </div>
<?php endif;?>


							<form action="register.php" method="post" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="name">Name</label>
									<input id="name" type="text" class="form-control" name="username" required autofocus>
									<div class="invalid-feedback">
										What's your name?
									</div>
								</div>

								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" required>
									<div class="invalid-feedback">
										Your email is invalid
									</div>
								</div>

                                <div class="form-group">
									<label for="email">Your Role</label>
                                    <select  class="form-control" id= "usertype" name="usertype">                                       
                                        <option value="Doctor">Doctor</option>
                                        <option value="user">User</option>
                                        </select>					
                                    <div class="invalid-feedback">
										Your your is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
									<div class="invalid-feedback">
										Password is required
									</div>
								</div>

								<div class="form-group">
									<label for="password">Confirm Password</label>
									<input id="password" type="password" class="form-control" name="passwordConf" required data-eye>
									<div class="invalid-feedback">
										Confirm Password is required
									</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
										<label for="agree" class="custom-control-label">I agree to the <a href="#">Terms and Conditions</a></label>
										<div class="invalid-feedback">
											You must agree with our Terms and Conditions
										</div>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" name="signup-btn" class="btn btn-primary btn-block">
										Register
									</button>
								</div>
								<div class="mt-4 text-center">
									Already have an account? <a href="index.html">Login</a>
								</div>
							</form>
						</div>
					</div>
					<div style="text-align: center" class="footer">
						Copyright &copy; 2019 &mdash; DiagnoX.ai 
					</div>
				</div>
			</div>
		</div>
	</section>


    <?php include_once('footer.html') ?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>