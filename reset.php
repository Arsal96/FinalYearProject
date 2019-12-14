<?php include 'controllers/authController.php' ?>

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