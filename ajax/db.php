<?php

// Database configuration 
/*$dbHost     = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "greenriver-wcs"; 
 
// Create database connection 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
// Check connection
if ($db->connect_error) {
   die("Connection failed: " . $db->connect_error);
}*/


/*Add at the begining of the file*/

$connectstr_dbhost = '';
$connectstr_dbname = '';
$connectstr_dbusername = '';
$connectstr_dbpassword = '';

foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }
    
    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

$dbHost     = $connectstr_dbhost; 
$dbUsername = $connectstr_dbusername; 
$dbPassword = $connectstr_dbpassword; 
$dbName     = $connectstr_dbname; 
 
// Create database connection 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
// Check connection
if ($db->connect_error) {
   die("Connection failed: " . $db->connect_error);
}
