<?php
session_start();
include('config.php');
if(isset($_POST['email']) && isset($_POST['name'])){
    $amt = $_POST['email'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $paper_id = $_POST['paper_id'];
    $payment_status="pending";
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($connection,"insert into payment(name,email,payment_status,added_on,paper_id,contact) values('$name','$amt','$payment_status','$added_on','$paper_id','$contact')");
    $_SESSION['OID']=mysqli_insert_id($connection);
}
if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($connection,"update payment set payment_status='complete',payment_id='$payment_id' where id='".$_SESSION['OID']."'");
}