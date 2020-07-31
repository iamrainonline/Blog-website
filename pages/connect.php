<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "page_2020";

$db = new mysqli($host,$username,$password,$database);
  if($db->connect_error){
    //  echo "<p class='db_conn'>Cannot connecte</p>";
  }else{
    //  echo "<p class='db_conn'>Connected</p>";
  }
?>