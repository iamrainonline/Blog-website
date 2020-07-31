<?php
  session_start();
  if(isset($_SESSION['nume']) && isset($_SESSION['parola'])){
    $_SESSION = array();
    session_destroy();
    header("Location: ../index.php");
  }else{
    header("Location: ../index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
</html>