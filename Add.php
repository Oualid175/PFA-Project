<?php 

$database_name = "login";
$con = mysqli_connect("localhost","root","",$database_name);


$id=$_POST['Add_id'];
$username=$_POST['username'];

$sql = "INSERT INTO panier (Product_id, Client_name ) VALUES ('$id', '$username')";
if (mysqli_query($con, $sql)) {
  echo "<script>alert('Product Add to Cart')</script>";
  
} else {
  echo 'Error: ' . mysqli_error($con);
}


?>