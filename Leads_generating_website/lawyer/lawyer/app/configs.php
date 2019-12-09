<?php 
// Product Details 
$itemName = "Leads";  
$itemNumber = "12345";  
// $itemPrice = 25;
$currency = "USD";  
 
// Authorize.Net API configuration
define('ANET_API_LOGIN_ID', '5PRD9uR8sppV');  
define('ANET_TRANSACTION_KEY', '4w963zB5CJXD7k6h');  
$ANET_ENV = 'PRODUCTION'; // or SANDBOX PRODUCTION
  
// Database configuration  

define('DB_HOST', 'localhost');  
define('DB_USERNAME', 'u728873214_lead');  
define('DB_PASSWORD', '123456');  
define('DB_NAME', 'u728873214_leads_generate');