<?php

   //  Session + Conexiune

session_start();
include "connect.php";

if(isset($_SESSION['nume']) && isset($_SESSION['parola'])){
}else{
header("location:../dashboard.php");
}

//  insert Card's Text + photo

if(isset($_POST['submit'])){
  if(move_uploaded_file($_FILES['upload']['tmp_name'],"../img/".$_FILES['upload']['name'])){

   $card_belt = $_POST['card_belt'];
   $card_title = $_POST['card_title'];
   $card_text = $_POST['card_text'];
   $newphoto = $_FILES['upload']['name'];

   $sql = "INSERT into hover_card SET 

  card_belt = '{$card_belt}',
  card_title = '{$card_title}',
  card_text = '{$card_text}',
  card_background ='{$newphoto}'"; 

  $db->query($sql);
 }
}

//  DELETE by ID (Hover Cards)
if(isset($_GET['delete'])){
  $sql = "DELETE from `hover_card` WHERE id='$_GET[delete]'";
    if($db->query($sql)){
      header("refresh:0; url=hover_card.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../CSSFolder/home.css">
  <link rel="stylesheet" href="../CSSFolder/hover_card.css">
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
    <li><i class="fas fa-images"></i><a href="hover_card.php" class="active">Hover Cards</a></li>
    <li><i class="fab fa-blogger"></i><a href="blog.php">Blog</a></li>
    <li><i class="fas fa-map-marked-alt"></i><a href="address.php" >Address</a></li>
    <li><i class="fas fa-envelope-square"></i><a href="messages.php">Messages</a></li>
    <li><i class="fas fa-users"></i><a href="users.php">Users</a></li>
    <li><i class="fab fa-internet-explorer"></i><a href="social.php">Social Media</a></li>
    <li><i class="fas fa-plus-square"></i><a href="#">Create New Section</a></li>
  
  </div>

<div class="display">
 <form action="" method="POST" enctype="multipart/form-data">
 <div class="hovercards">

        <div class="cardnames">
          <h2>Add a new Hover Card!</h2>
          Card Belt  <br> <input  id="addres_input"   type="text" name="card_belt"><br>
          Card Title <br> <input  id="addres_input"  type="text" name="card_title"><br>
          Hover Text <br>  <textarea id="addres_input" name="card_text" id="" placeholder="Enter Text" cols="23" rows="10"></textarea><br>
        </div>

        <div class="cardphoto">
          <h2>Add a background</h2>
          <input type="hidden" name="MAX_FILE_SIZE" >
          <input name="upload" type="file" value=""><br><br>
          <input type="submit" name="submit" ><br>
        </div> 

    </div>
    </form>
      
   <h3 class="previewcardsh3"><i class="fas fa-images"></i> Cards preview </h3>



<div class="cardsdisplay">

<?php 

$sql = "SELECT * FROM `hover_card` ORDER BY `id` DESC";
$result = $db->query($sql);
while($row = mysqli_fetch_array($result)) {

echo 
  '<div class="container_showcase2">'.
    '<div class="box_showcase one" style="background:url(../img/'.$row['card_background'].'); background-position:center; background-size:cover;
      width:250px; height:300px";>'.
          '<h1>'.$row['card_belt'].'</h1>'.
          '<div class="showcase_overlay">'.
          '<span>'.$row['card_title'].'</span>'. 
          '<p>'.$row['card_text'].'</p>'.
        '</div>'. '<a href="?delete='.$row['id'].'"></i>delete</a>'.
      '</div>'.
'</div>';
}
?>
</div>










</body>
</html>