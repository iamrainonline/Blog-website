<?php

   //  Session + Conexiune
session_start();
include "connect.php";

if(isset($_SESSION['nume']) && isset($_SESSION['parola'])){
}else{
header("location:../dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../CSSFolder/home.css">
  <script src="https://kit.fontawesome.com/e6d8468748.js" crossorigin="anonymous"></script>
</head>
<body>

  <div class="logout">
    <a href="logout.php">Logout</a>
  </div>

<div class="content" >

  <div class="pannel">
      <h1>Dashboard</h1>
      <li><i class="fas fa-home"></i><a href="dashboard.php" >Home</a></li>
    <li><i class="fas fa-address-card"></i><a href="aboutus.php">About Us</a></li>
    <li><i class="fas fa-images"></i><a href="hover_card.php">Hover Cards</a></li>
    <li><i class="fab fa-blogger"></i><a href="blog.php">Blog</a></li>
    <li><i class="fas fa-map-marked-alt"></i><a href="address.php" >Address</a></li>
    <li><i class="fas fa-envelope-square"></i><a href="messages.php">Messages</a></li>
    <li><i class="fas fa-users"></i><a href="users.php" class="active">Users</a></li>
    <li><i class="fab fa-internet-explorer"></i><a href="social.php" >Social Media</a></li>
    <li><i class="fas fa-plus-square"></i><a href="#">Create New Section</a></li>
  
  </div>
  <div class="display">
   
      

  </div>

  </div>
  
</body>
</html>