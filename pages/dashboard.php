<?php

   //  Session + Conexiune
session_start();
include "connect.php";

if(isset($_SESSION['nume']) && isset($_SESSION['parola'])){
}else{
header("location:../dashboard.php");
}

   // Change Title + Subtitle
if(isset($_POST['submit'])){
  $maintitle = $_POST['maintitle'];
  $subtitle = $_POST['subtitle'];
  $sql = "UPDATE mainpage SET
                maintitle ='".$maintitle."',       
                subtitle ='".$subtitle."';";    
  $db->query($sql);
  echo $db->error;
  }


   // Upload Wallpaper + Logo

if(isset($_POST['submit'])){

if(move_uploaded_file($_FILES['userfile']['tmp_name'][0],"../img/".$_FILES['userfile']['name'][0])) {
    $logo = $_FILES['userfile']['name'][0];
    $sql = "UPDATE `mainpage` SET 
                          `logo`='{$logo}'";
    $db->query($sql);
  }
  if(move_uploaded_file($_FILES['userfile']['tmp_name'][1],"../img/".$_FILES['userfile']['name'][1])) {
    $wallpaper = $_FILES['userfile']['name'][1];
    $sql = "UPDATE `mainpage` SET 
                          `wallpaper`='{$wallpaper}'";
    $db->query($sql);
  }
}


//  Display Wallpaper
$sql = "SELECT * FROM mainpage";
$result = $db->query($sql);

if($result and $result->num_rows == 1){
    $title = mysqli_fetch_assoc($result);
    $wallpaper = $title['wallpaper'];
    $maintitle = $title['maintitle'];
    $subtitle = $title['subtitle'];
    $logo = $title['logo'];
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
    <li><i class="fas fa-home"></i><a href="dashboard.php" class="active">Home</a></li>
    <li><i class="fas fa-address-card"></i><a href="aboutus.php">About Us</a></li>
    <li><i class="fas fa-images"></i><a href="hover_card.php">Hover Cards</a></li>
    <li><i class="fab fa-blogger"></i><a href="blog.php">Blog</a></li>
    <li><i class="fas fa-map-marked-alt"></i><a href="address.php" >Address</a></li>
    <li><i class="fas fa-envelope-square"></i><a href="messages.php">Messages</a></li>
    <li><i class="fas fa-users"></i><a href="users.php">Users</a></li>
    <li><i class="fab fa-internet-explorer"></i><a href="social.php">Social Media</a></li>
    <li><i class="fas fa-plus-square"></i><a href="#">Create New Section</a></li>
  
  </div>

                  
   <div class="main-page-display">
     <div class="main-page-div">
          <form action="" method="POST" enctype="multipart/form-data">
         

          <h2><i class="fas fa-text-height">‎‎‎</i>Main Title</h2>‎‎‎
          <input type="text" name="maintitle" placeholder="Title here.." value="<?php echo $maintitle; ?>">‎

          <h2><i class="fas fa-spell-check"></i>Sub Title</h2>
          <input type="text" name="subtitle" placeholder="Sub title here.." value="<?php echo $subtitle; ?>"><br>

          <h2><i class="fas fa-gem"></i>Logo</h2>
          <input name="userfile[]" type="file" value="<?php echo $logo; ?>" /><br />

          <h2><i class="fas fa-photo-video"></i>Wallpaper</h2>
          <input type="hidden" name="MAX_FILE_SIZE">
          
          <input name="userfile[]" type="file" value="<?php echo $wallpaper; ?>" /><br>
          <input type="submit" name="submit" class="sub_btn" value="Submit" />
          </form>
      </div>   
        <div class="main-page-foto">
          <img src="../img/<?php echo $wallpaper ?> " alt="">
            <div class="text-pe-poza">
              <h1><?php echo $maintitle; ?></h1>
              <h3><?php echo $subtitle; ?></h3>
            </div>
            
            <div class="preview">
              <h1><i class="fas fa-user-edit"></i>Main Page / preview </h1>
            </div>

            <div class="logo">
             <img src="../img/<?php echo $logo ?> " alt="">
            </div>
            
        </div>
   </div>  
</div>

</body>
</html>