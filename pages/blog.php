<?php

   //  Session + Conexiune
session_start();
include "connect.php";

if(isset($_SESSION['nume']) && isset($_SESSION['parola'])){
}else{
header("location:../dashboard.php");
}

//  INSERT TXT blog
if(isset($_POST['submit'])) {
  $title = $_POST['title'];
  $text = $_POST['paragraph'];

  $sql = "UPDATE blog SET
                 title ='{$title}',
                 text ='". htmlspecialchars($text)."';";
                  $db->query($sql);
}

//  Display Preview Blog
$sql = "SELECT * FROM `blog`";
$result = $db->query($sql);

if($result and $result->num_rows == 1){
    $blog = mysqli_fetch_assoc($result);
    $title = $blog['title'];
    $text = $blog['text'];
    $date = $blog['date'];
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
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
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
    <li><i class="fab fa-blogger"></i><a href="blog.php" class="active">Blog</a></li>
    <li><i class="fas fa-map-marked-alt"></i><a href="address.php" >Address</a></li>
    <li><i class="fas fa-envelope-square"></i><a href="messages.php">Messages</a></li>
    <li><i class="fas fa-users"></i><a href="users.php">Users</a></li>
    <li><i class="fab fa-internet-explorer"></i><a href="social.php">Social Media</a></li>
    <li><i class="fas fa-plus-square"></i><a href="#">Create New Section</a></li>
  
  </div>
  <div class="display">

      <div class="blog">
          <form action="" method="POST">
                <h1>Update Title</h1>
                <input type="text" name="title" value="<?php echo $title ;?>" placeholder="New Title Here..."><br>
                <h1>Update the Text</h1>
                <textarea name="paragraph" value=""><?php echo $text ;?></textarea><br>
                <input type="submit" name="submit"><br>
          </form>
      </div>
      <script>
      CKEDITOR.replace("paragraph",{height: 100});
      </script> 

      <h2><i class="fab fa-blogger"></i></i> Blog Preview </h2>
      <div class="display-preview">
        <?php 
            echo '<div class="blog-2">'
                   .'<h1>'.$title .'</h1>';
                      echo htmlspecialchars_decode($text);
                      echo '<div id="date">'.'Last edited at -  '.$date.'</div>';
            echo '</div>';
         ?>
      </div>
  </div>
</div>
  
</body>
</html>