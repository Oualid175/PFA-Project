<?php 

$database_name = "login";
$con = mysqli_connect("localhost","root","",$database_name);


$id=$_POST['Add_id'];
$Name=$_POST['Name'];
$username=$_POST['username'];


$sql = "INSERT INTO commendes (product_id,product_name, user_name ) VALUES ('$id','$Name', '$username')";
if (mysqli_query($con, $sql)) {



$query3 = "DELETE FROM panier";

  if (mysqli_query($con, $query3)) {
  } else {
      # Display an error message if unable to delete the record
      echo "<script>alert('Error emptying record!<br/>')</script>". $con->error;
  }
} else {
  echo 'Error: ' . mysqli_error($con);
}
header('location:fakehome.php');

?>