<?php

   //  Session + Conexiune
session_start();
include "connect.php";

if(isset($_SESSION['nume']) && isset($_SESSION['parola'])){
}else{
header("location:../dashboard.php");
}

if(isset($_POST['submit'])) {
  $facebook = filter_var($_POST['facebook'], FILTER_SANITIZE_STRING);
  $twitter = filter_var($_POST['twitter'], FILTER_SANITIZE_STRING);
  $instagram = filter_var($_POST['instagram'], FILTER_SANITIZE_STRING);
  $youtube = filter_var($_POST['youtube'], FILTER_SANITIZE_STRING);

  $sql = "UPDATE socialmedia SET 
                  facebook = '{$facebook}',
                  twitter = '{$twitter}',
                  instagram ='{$instagram}',
                  youtube ='{$youtube}';";
    $db->query($sql);

}
//  Echo Value Socialmedia
$sql = "SELECT * FROM socialmedia";
 $result = $db->query($sql);
 
 if($result and $result->num_rows == 1){
     $media = mysqli_fetch_assoc($result);
     $facebook = $media['facebook'];
     $twitter = $media['twitter'];
     $instagram = $media['instagram'];
     $youtube = $media['youtube'];
}
$db->close();
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
      <li><i class="fas fa-home"></i><a href="dashboard.php">Home</a></li>
    <li><i class="fas fa-address-card"></i><a href="aboutus.php">About Us</a></li>
    <li><i class="fas fa-images"></i><a href="hover_card.php">Hover Cards</a></li>
    <li><i class="fab fa-blogger"></i><a href="blog.php">Blog</a></li>
    <li><i class="fas fa-map-marked-alt"></i><a href="address.php" >Address</a></li>
    <li><i class="fas fa-envelope-square"></i><a href="messages.php">Messages</a></li>
    <li><i class="fas fa-users"></i><a href="users.php">Users</a></li>
    <li><i class="fab fa-internet-explorer"></i><a href="social.php" class="active">Social Media</a></li>
    <li><i class="fas fa-plus-square"></i><a href="#">Create New Section</a></li>
  </div>

  <div class="display">
  <h2><i class="fas fa-unlink"></i> Edit social media</h2>
    <div class="addsocial">
        <form action="" method="POST">
          <i class="fab fa-facebook-square"> Facebook</i> <br>
          <input type="text" id="input_social" name="facebook" placeholder="https://www.facebook.com/" value="<?php echo $facebook ?>"><br>
          <i class="fab fa-twitter-square"> Twitter</i><br>
          <input type="text" id="input_social" name="twitter" placeholder="https://www.twitter.com" value="<?php echo $twitter ?>"><br>
          <i class="fab fa-instagram"> Instagram</i> <br>
          <input type="text" id="input_social" name="instagram" placeholder="https://www.instagram.com" value="<?php echo $instagram ?>"><br>
          <i class="fab fa-youtube-square"> Youtube</i><br>
          <input type="text" id="input_social" name="youtube" placeholder="https://www.youtube.com" value="<?php echo $youtube ?>"><br>
          <input type="submit" value="submit" name="submit">
        </form>
    </div>
    <h3>Preview ▼</h3>
    <div class="previewsocial">
      <li> <a href="<?php echo $facebook ?>"target="_blank" rel="noopener noreferrer"> <i class="fab fa-facebook-square"> Facebook</i></a></li>
      <li><a href="<?php echo $twitter ?>"target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter-square"> Twitter</i><br></a></li>  
      <li> <a href="<?php echo $instagram ?>"target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"> Instagram</i> <br></a></li>
      <li> <a href="<?php echo $youtube ?>"target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube-square"> Youtube</i><br></a></li>
    </div>
  </div>
</div>

</body>
</html>