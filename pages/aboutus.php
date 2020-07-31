<?php

   //  Session + Conexiune
session_start();
include "connect.php";

if(isset($_SESSION['nume']) && isset($_SESSION['parola'])){
}else{
header("location:../dashboard.php");
}

// Insert new Photo
if(isset($_POST['submit'])){
 
  $newAbout = $_POST['paragraph'];
  $sql = "UPDATE aboutus SET
                      aboutus ='{$newAbout}';";
                       $db->query($sql);
}

// Insert new message
if(isset($_POST['submit'])){

    if(move_uploaded_file($_FILES['upload']['tmp_name'],"../img/".$_FILES['upload']['name'])){
      $newphoto = $_FILES['upload']['name'];
      $sql = "UPDATE aboutus SET 
                          aboutphoto ='{$newphoto}'";
     
      $db->query($sql);
    }
  }

 //  Display About Preview
$sql = "SELECT * FROM aboutus";
$result = $db->query($sql);

if($result and $result->num_rows == 1){
    $aboutus = mysqli_fetch_assoc($result);
    $abouttext = $aboutus['aboutus'];
    $aboutphoto = $aboutus['aboutphoto'];
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
    <li><i class="fas fa-address-card"></i><a href="aboutus.php" class="active">About Us</a></li>
    <li><i class="fas fa-images"></i><a href="hover_card.php">Hover Cards</a></li>
    <li><i class="fab fa-blogger"></i><a href="blog.php">Blog</a></li>
    <li><i class="fas fa-map-marked-alt"></i><a href="address.php" >Address</a></li>
    <li><i class="fas fa-envelope-square"></i><a href="messages.php">Messages</a></li>
    <li><i class="fas fa-users"></i><a href="users.php">Users</a></li>
    <li><i class="fab fa-internet-explorer"></i><a href="social.php">Social Media</a></li>
    <li><i class="fas fa-plus-square"></i><a href="#">Create New Section</a></li>
  </div>

<div class="display">
<h2><i class="fas fa-user-edit"></i> Edit About Page</h2>

<form action="" method="POST" enctype="multipart/form-data">
<div class="editor">
  
    <div class="edit1">
      <h3>Edit text</h3>
     <textarea name="paragraph" id="" cols="15" rows="5" value="">
      <?php echo $abouttext; ?>
     </textarea>
    </div>

    <div class="edit2">
      <h3>Upload new Photo</h3>
      <input type="hidden" name="MAX_FILE_SIZE" >
      <input name="upload" type="file" value="<?php echo $aboutphoto ?>"><br><br>
      <input type="submit" name="submit" ><br>
        <script>
          CKEDITOR.replace("paragraph",{height: 100});
        </script> 
    </div>
  

 
</div>
</form>
<h3>Preview ▼</h3>

    <div class="about">
      <div class="aboutus">
          <?php echo $abouttext ?>
      </div>
      <div class="aboutpic">
          <img src="../img/<?php echo $aboutphoto ?>" alt="">
      </div>
  </div>
</div>

  </body>
  </html>