<?php


//  Echo the Main Page ;
$sql = "SELECT * FROM mainpage";
$result = $db->query($sql);

if($result and $result->num_rows == 1){
$title = mysqli_fetch_assoc($result);
    $image = $title['wallpaper'];
    $maintitle = $title['maintitle'];
    $subtitle = $title['subtitle'];
    $logo = $title['logo'];
}
//Echo  SOCIAL MEDIA LINKS 
$sql = "SELECT * FROM socialmedia";
$result = $db->query($sql);

if($result and $result->num_rows == 1){
$media = mysqli_fetch_assoc($result);
    $facebook = $media['facebook'];
    $twitter = $media['twitter'];
    $instagram = $media['instagram'];
    $youtube = $media['youtube'];
}
// Echo ABOUT US text + photo
$sql = "SELECT * FROM aboutus";
$result = $db->query($sql);

if($result and $result->num_rows == 1){
   $aboutus = mysqli_fetch_assoc($result);
   $abouttext = $aboutus['aboutus'];
   $aboutphoto = $aboutus['aboutphoto'];
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
// Display ADDRESSES + Numbers

$sql = "SELECT * from `addresses`";
$result = $db->query($sql);
while($row = mysqli_fetch_array($result)){
   $address =  $row['address'];
   $phone_number =  $row['phone_number'];
   $email =  $row['email'];
   $footer_text = $row['footer_text'];
}
?>