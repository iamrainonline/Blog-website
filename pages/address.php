<?php

   //  Session + Conexiune
session_start();
include "connect.php";

if(isset($_SESSION['nume']) && isset($_SESSION['parola'])){
}else{
header("location:../dashboard.php");
}



if(isset($_POST['submit'])) {
          
    $address = $_POST['address'];
    $phone_number =  $_POST['phone_number']; 
    $email =  $_POST['email']; 
    $footer_text = $_POST['paragraph'];

    $sql = "INSERT INTO addresses SET 
                        address = '{$address}',
                        phone_number = '{$phone_number}',
                        email = '{$email}',
                        footer_text = '{$footer_text}';";
    $db->query($sql);
}

  $sql = "SELECT * from `addresses`";
   $result = $db->query($sql);
  while($row = mysqli_fetch_array($result)){
      $address =  $row['address'];
      $phone_number =  $row['phone_number'];
      $email =  $row['email'];
      $footer_text = $row['footer_text'];
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
    <li><i class="fas fa-map-marked-alt"></i><a href="address.php" class="active">Address</a></li>
    <li><i class="fas fa-envelope-square"></i><a href="messages.php">Messages</a></li>
    <li><i class="fas fa-users"></i><a href="users.php">Users</a></li>
    <li><i class="fab fa-internet-explorer"></i><a href="social.php">Social Media</a></li>
    <li><i class="fas fa-plus-square"></i><a href="#">Create New Section</a></li>
  
  </div>

  <div class="display addresses">
        
<div class="address_edit">
      <form action="" method="POST">
          Address: <br> <input id="addres_input" type="text" name="address" value="<?= $address;?> "placeholder="Enter a new Address"><br>
          Phone Number <br> <input id="addres_input" type="text" value="<?= $phone_number;?>" name="phone_number" placeholder="Enter a Phone Number"><br>
          Email <br> <input id="addres_input" type="text" value="<?= $email;?>" name="email" placeholder="Enter a new Email"><br>
          Footer Text<br> <textarea name="paragraph" id="" cols="23" rows="10" placeholder="Enter new text"><?= $footer_text;?>
          </textarea><br>
          <input type="submit" name="submit">
      </form>
</div>


  <div class="previewAddress">
      <i class="fas fa-map-marker-alt"> Address</i>
        <?= '<p>'.$address. '</p>'; ?><br>
      <i class="fas fa-phone-volume"> Telephone</i>
        <?= '<p>'.$phone_number. '</p>'; ?><br>
      <i class="fas fa-at"> Email Address</i>
        <?= '<p>'.$email. '</p>'; ?><br>
        <i class="fas fa-info"> Footer Info</i>
        <?= '<p>'.$footer_text. '</p>'; ?>
  </div>


  </div>

  </div>
  
</body>
</html>