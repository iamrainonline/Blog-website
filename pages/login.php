<?php
  include "../connect.php";

  if(isset($_POST['submit'])){

    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    
    if(isset($name ) && isset($password)){
    
    $sql = "SELECT * FROM login WHERE name ='{$name}'";
    $result = $db->query($sql);
    $array = $result->fetch_array();
      if($name == $array['name'] && $password == $array['password']){
            session_start();
            $_SESSION['nume'] =  $array['name'];
            $_SESSION['parola']  = $array['password'];
            header("Location:pages/../dashboard.php");
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../cssfolder/login.css">
  <style>
    #back {
      color:white;
      background-color:#AB2225;
      padding:10px;
      text-decoration:none;
      position:absolute;
      top:0;
      left:0;
      margin:10px;
      font-family:arial;
      border-radius:5px;
      text-align:center;
    }
    #back:hover{
      background-color:#A53118;
    }
  </style>
</head>
<body>
    <div class="loginbox">
    <img src="../img/avatar.png" class="avatar">
        <h1>Login Here</h1>
        <form action="" method="POST">
            <p>Username</p>
            <input type="text" name="name" placeholder="Enter Username" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="submit" name="submit" value="Login">
            <a href="#">Lost your password?</a><br>
            <a href="#">Don't have an account?</a>
            <a href="../index.php" id="back">Back</a>
        </form>
        
    </div>

</body>
</html>