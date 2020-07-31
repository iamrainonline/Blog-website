<?php
session_start();
if(isset($_POST['submited'])){
    
$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

	 $sql = "INSERT into `messages` SET 
            firstname ='{$firstname}',
            lastnam e='{$lastname}',
            email ='{$email}',
            phone ='{$phone}',
            message ='{$message}'";
             $db->query($sql);
   }
?>