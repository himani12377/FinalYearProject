<?php 
/* 
 * PayPal and database configuration 
 */ 
  
// PayPal configuration 
define('PAYPAL_ID', 'TheBlueGroup@business.example.com'); 
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
 
define('PAYPAL_RETURN_URL', 'http://localhost/payment-successful.html'); 
define('PAYPAL_CANCEL_URL', 'http://localhost/cancel.php'); 
define('PAYPAL_NOTIFY_URL', 'http://localhost/ipn.php'); 
define('PAYPAL_CURRENCY', 'NZD'); 
 
// Database configuration 
define('localhost', 'MySQL_Database_Host'); 
define('root', 'MySQL_Database_Username'); 
define('', 'MySQL_Database_Password'); 
define('bluegroup', 'MySQL_Database_Name'); 
 
// Change not required 
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");