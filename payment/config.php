<?php 
// Product Details 
// Minimum amount is $0.50 US 
// $itemName = "Standard Package"; 
// $itemNumber = "STD-001"; 
// $itemPrice = 1500; 
$currency = "PKR"; 
 

// Stripe API configuration  
define('STRIPE_API_KEY', 'sk_test_GmahnbkXgFl62SXaTLhIFDqF00lIt0WuYE'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_LAzlmIdAN1vPrMffTO4dtW8T00YHCzaSgD'); 
  
// Database configuration  
define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'test');


// Connect with the database  
$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);  
  
// Display error if failed to connect  
if ($db->connect_errno) {  
    printf("Connect failed: %s\n", $db->connect_error);  
    exit();
    
}