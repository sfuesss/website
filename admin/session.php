<?php
   include '../functions.php';
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select User from admin where User = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['User'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>