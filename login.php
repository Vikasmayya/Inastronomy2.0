<?php
if (!isset($_SERVER['HTTP_REFERER'])){
    header('location:index.php');
}
include 'config.php';
if (isset($_POST['enter'])){
    session_start();
    $error = "username or password is incorrect!!";
    $logins = array('inastronomyindia@gmail.com' => 'india');
    $username = isset($_POST['UserName']) ? $_POST['UserName'] : '';
    $pass = isset($_POST['Password']) ? $_POST['Password'] : '';
    if (isset($logins[$username]) && $logins[$username] == $pass){
        $_SESSION['UserData']['UserName']=$logins[$username];
        header("location:blogupload.php");
        exit();
    } else {
        $_SESSION['error'] = $error;
        header('location: admin.php');
    }
}