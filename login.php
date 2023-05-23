<?php
session_start();

$error=array();
$con= mysqli_connect('localhost','root','');
mysqli_select_db($con ,'login');
if($conn->connect_errno){
  die('Connection failed: '.$conn->connect_error);
}

else{echo 'Connected successfully'.'<br>';} 

$username=$_POST['username'];
    if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
    exit('Username is not valid!');
    }
$password=$_POST['password'];
    if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
    exit('Password must be between 5 and 20 characters long!');

    }

$email=$_POST['email'];
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    exit('Email is not valid!');
    }

/*
    $sql= "select * from usertable where name ='$email' or username='$usermane'";
  /*  $sql= "SELECT * $email, $usermane FROM usertable";*/
  /*  $res = mysqli_query($con,$sql);
    $num=mysqli_num_rows($res);

          if ($num==1) {
                    //  - si l'adresse mail n'existe pas :
                      //       - ajout de l'enregistrement dans la base
                      echo "<h3>$email already taken";
                  }
          else{
            $num=$con->query("insert into usertable values('$usermane','$password','$email')");
            echo"<h3>welcom</h3>";
          }*/
        /*  if ($con->error) {
                  echo "L'inscription a échoué : ".$con->error;
                  }
          else {
                  echo "Votre demande a bien été envoyée à l'administrateur. <br/>Votre compte sera créé dans les plus brefs délais.";
                }*/



$sql= "SELECT * FROM `usertable` WHERE `email`='$email' && `username`='$username'";
$result = mysqli_query($con,$sql);
$num=mysqli_num_rows($result);
if($num == 1){
  echo"<h3>$email or $username already taken</h3>";
}
else{
  mysqli_query(
    $con,"insert into usertable values('$username','$email','$password','user')");
  header('location:validation1.php');
}

 ?>
