<?php
if (!isset($_SERVER['HTTP_REFERER'])){
    header('location:index.php');
}
session_start();
if (isset($_SESSION['UserData']['UserName'])){
    session_destroy();
    header('location:admin.php');
}