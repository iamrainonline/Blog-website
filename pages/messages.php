<?php
session_start();
include "connect.php";

  if(isset($_SESSION['nume']) && isset($_SESSION['parola'])){
  }else{
  header("location:../index.php");
  }

if(isset($_GET['delete'])){
  $sql = "DELETE from `messages` WHERE id='$_GET[delete]'";
    if($db->query($sql)){
      header("refresh:0; url=messages.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../CSSFolder/home.css">
  <script src="https://kit.fontawesome.com/e6d8468748.js" crossorigin="anonymous"></script>
</head>
<body>

  <div class="logout">
    <a href="logout.php">Logout</a>
  </div>

<div class="content">
  <div class="pannel">
    <h1>Dashboard</h1>
    <li><i class="fas fa-home"></i><a href="dashboard.php">Home</a></li>
    <li><i class="fas fa-address-card"></i><a href="aboutus.php">About Us</a></li>
    <li><i class="fas fa-images"></i><a href="hover_card.php">Hover Cards</a></li>
    <li><i class="fab fa-blogger"></i><a href="blog.php">Blog</a></li>
    <li><i class="fas fa-map-marked-alt"></i><a href="address.php" >Address</a></li>
    <li><i class="fas fa-envelope-square"></i><a href="messages.php" class="active">Messages</a></li>
    <li><i class="fas fa-users"></i><a href="users.php">Users</a></li>
    <li><i class="fab fa-internet-explorer"></i><a href="social.php">Social Media</a></li>
    <li><i class="fas fa-plus-square"></i><a href="#">Create New Section</a></li>
    
  </div>

  <div class="display">
    <i class="far fa-comment-dots"> Messages </i> 

      <?php
      $sql = "SELECT * FROM `messages` ORDER BY `id` DESC";
      $result = $db->query($sql);
      while($row = mysqli_fetch_array($result)){

            echo "<div class=' splitbox'>".

            '<div class="delete"><a href="?delete='.$row['id'].'"></i>delete</a></div>';
                    
            echo "<div class='text-left1'>".
                      "<p><i class='fas fa-id-card'></i> Name - </p>".
                      "<p><i class='fas fa-phone-square'></i> Phone - </p>".
                      "<p><i class='fas fa-envelope-square'></i> Email - </p>".
                      "<p> <i class='far fa-calendar-alt'></i> Date - </p>".
                      "<p><i class='fas fa-envelope'></i> Message ▼ </p>".
                  "</div>".

                    "<div class='text-left2'>".
                        "<p>".$row['firstname']." ".$row['lastname']."</p>".
                        "<p>".$row['phone']."</p>".
                        "<p>".$row['email']."</p>".
                        "<p>".$row['date']."</p>".
                    "</div>".
                    
                    "<div class='message_message'>".
                      $row['message'].
                    "</div>".

               "</div>";

             
           }
      ?>
          
    
  </div>
</div>
</body>
</html>