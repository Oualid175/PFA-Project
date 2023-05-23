<?php
session_start();
$con= mysqli_connect('localhost','root','');
mysqli_select_db($con ,'login');

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];

/*
$s= "SELECT * from `usertable` where `usermane` ='$usermane' && `password`='$password'";
$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);
if($num==1){
  header('location:home.php');}
else{
  header('location:login1.php');}
*/
  $sql= "SELECT * FROM `usertable` WHERE `username`='$username' && `password`='$password' ";
  $result = mysqli_query($con,$sql);
/*  $num=mysqli_num_rows($result);*/


  if (mysqli_num_rows($result) == 1) { // user found
    // check if user is admin or user
   $logged_in_user = mysqli_fetch_assoc($result);
   if ($logged_in_user['user_type'] == 'admin') {
        $_SESSION['success']  = "You are now logged in";
        $_SESSION['username']=$username;
        $_SESSION['email']=$email;
        header('location:admin.php');
    }

    else if ($logged_in_user['user_type'] == 'user') {
        $_SESSION['success']  = "You are now logged in";
        $_SESSION['username']=$username;
        $_SESSION['email']=$email;
        header('location:home.php');
    }

    else{
        header('location:login1.php');
    }

  }else {
      header('location:login1.php');
      array_push($errors, "Wrong username/password combination");
  }

/*
  if($num ==1){
    $_SESSION['username']=$username;
    header('location:home.php');}
  else{
    header('location:login1.php');
  }
*/


 ?>
