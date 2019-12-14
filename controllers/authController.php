

<?php
// add this file so that we can use email funcationalitties
require_once 'sendEmails.php';
session_start();
$username = "";
$email = "";
$errors = [];


//db connection parameters
$conn = new mysqli('localhost', 'root', '', 'test');

// SIGN UP USER
if (isset($_POST['signup-btn'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username required';
    }
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    if (isset($_POST['password']) && $_POST['password'] !== $_POST['passwordConf']) {
        $errors['passwordConf'] = 'The two passwords do not match';
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $type = $_POST['usertype'];
    $token = bin2hex(random_bytes(50)); // generate unique token
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    
        $errors['email'] = "Email already exists";
    }

    if (count($errors) === 0) {
        $query = "INSERT INTO users SET username=?, email=?, token=?, password=?, user_type=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssss', $username, $email, $token, $password, $type);
        $result = $stmt->execute();

        if ($result) {
            $user_id = $stmt->insert_id;
            $stmt->close();

            // TO DO: send verification email to user
            sendVerificationEmail($email, $token);
            // $_SESSION['id'] = $user_id;
            // $_SESSION['username'] = $username;
            // $_SESSION['email'] = $email;
            // $_SESSION['verified'] = false;
            // $_SESSION['message'] = 'You are logged in!';
            // $_SESSION['type'] = 'alert-success';
            header('location: ./login.php');
        } else {
            $_SESSION['error_msg'] = "Database error: Could not register user";
        }
    }
}

// LOGIN
if (isset($_POST['login-btn'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username or email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (count($errors) === 0) 
    {
        $query = "SELECT * FROM users WHERE email=? OR email=? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        

        if ($stmt->execute()) {
            
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) { 
                 // if password matches 

                 
                $stmt->close();

if ($user['verified'] == 0) {
   
    
    echo '<div class="text-center">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <h4><i class="icon fa fa-check"></i>You need to verify your email to login!</h4>
    </div>';

}


// FORGOT USER
if (isset($_POST['forgot-btn'])) {
    echo'forgot';
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email required';
    }


    $email = $_POST['email'];
  

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
   
        sendVerificationEmail($email, $token);
        header('location: ./login.php');

    }

    // if (count($errors) === 0) {
    //     $query = "INSERT INTO users SET username=?, email=?, token=?, password=?, user_type=?";
    //     $stmt = $conn->prepare($query);
    //     $stmt->bind_param('sssss', $username, $email, $token, $password, $type);
    //     $result = $stmt->execute();

    //     if ($result) {
    //         $user_id = $stmt->insert_id;
    //         $stmt->close();

    //         // TO DO: send verification email to user
    //         sendVerificationEmail($email, $token);
           
    //         header('location: ./login.php');
    //     } else {
    //         $_SESSION['error_msg'] = "Database error: Could not register user";
    //     }
    // }


}



else {
  
                echo "login verified success";
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['verified'] = $user['verified'];
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = $user['user_type'];

                if ($_SESSION['type'] =='Doctor') {
                    header('location: ./admin/mypatients.php');

                    exit(0);
                }
                else {
                    header('location: ./main.php');
                                echo "login success";
                                exit(0);
                    
                }
            }
               
            } 

            else
             { // if password does not match
                
                $errors['login_fail'] = "Wrong username / password";
                // header('location: ../login.php');
                // echo "login failed";
            }
        } 
        else
         {
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";
        }
    }
}