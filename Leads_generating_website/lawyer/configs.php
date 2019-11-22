<?php 
// Product Details 
$itemName = "Leads";  
$itemNumber = "12345";  
// $itemPrice = 25;
$currency = "USD";  
 
// Authorize.Net API configuration  
// define('ANET_API_LOGIN_ID', '5PRD9uR8sppV');  
// define('ANET_TRANSACTION_KEY', '4w963zB5CJXD7k6h');  
// $ANET_ENV = 'PRODUCTION'; // or  SANDBOX
define('ANET_API_LOGIN_ID', '8M7YDk68zVP');  
define('ANET_TRANSACTION_KEY', '377c38G2Zag9ST6N');  
$ANET_ENV = 'SANDBOX'; // or PRODUCTION
  
// Database configuration  
define('DB_HOST', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', '');  
define('DB_NAME', 'leads_generate_db'); 
