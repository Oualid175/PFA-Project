<?php
  $database_name = "login";
  $con = mysqli_connect("localhost","root","",$database_name);

$id=$_POST['delete_id'];

// var_dump($id);
// die();
   
    $query3 = "DELETE FROM produit WHERE id='$id' ";

    if (mysqli_query($con, $query3)) {
        echo "<script>alert('Record deleted successfully!<br/>')</script>";
    } else {
        # Display an error message if unable to delete the record
        echo "<script>alert('Error deleting record!<br/>')</script>". $con->error;
    }
        
?>