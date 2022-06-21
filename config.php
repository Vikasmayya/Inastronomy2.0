<?php
// Creating a database connection
$connection = mysqli_connect("localhost", "root", "", "inastronomy");
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
// Selecting a database
$db_select = mysqli_select_db($connection, "inastronomy");
if (!$db_select) {
    die("Database selection failed: " . mysqli_connect_error());
}
date_default_timezone_set('Asia/Kolkata');

function slug($title){
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
}

$keyId = 'rzp_test_9kg7UQKDpLXqJO';
$keySecret = 'nQM0U7kfpDFbq2agKHHU4lGc';
$displayCurrency = 'INR';