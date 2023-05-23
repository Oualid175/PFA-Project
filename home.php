<?php
session_start();


 if(!isset($_SESSION['username']) ){
   header('location:login1.php');                                             
 }
?>
<?php
    $database_name = "login";
    $con = mysqli_connect("localhost","root","",$database_name);
    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="home.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="home.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="Cart2.php"</script>';
                }
            }
        }
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr, en" lang="fr, en">
  <head>


    <meta charset="utf-8">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <title>Welcome</title>
    <link rel="stylesheet" href="home-page.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <nav>
      <a href="home.php" class="logo"> <font face="ink free"><font color="#ea8c2a">O</font>nline<font color="#ea8c2a"> S</font>tore</a>
      <ul style="margin-bottom:0 ;">
    <li><a class="active" href="home.php"><font color="white">Home</font></a></li>

    <li><a href="#"><font color="white">catégorie
          <i class="fas fa-caret-down"></i></font>
        </a>
        <ul>
<li><a href="laptop.php"><font color="white">Laptop</font></a></li>
<li><a href="phone.php"><font color="white">phone</font></a></li>
<li><a href="books.php"><font color="white">Books</font></a></li>
<li><a href="#"><font color="white">Gadget</font><i class="fas fa-caret-right"></i></a>
<font color="white"></font>
              <ul>
<li><a href="Keyboard.php"><font color="white">Keyboard</font></a></li>
<li><a href="mouse.php"><font color="white">Mouse</font></a></li>
<li><a href="headphones.php"><font color="white">Headphone</font></a></li>
<li><a href="smartwatch.php"><font color="white">Smart Watch</font></a></li>
</ul>
</li>
</ul>
</li>
<li><a href="sell.php"><font color="white">Sell</font></a></li>
<li><a class="active"><h5><font color="white"> hi, <?php  if(isset($_SESSION['username'])){ echo  ($_SESSION['username']);}else{echo("Guest");} ?></font></h5></a></li>
<li>
    <a href="cart2.php" class="nav-item nav-link active">
        <h5 class=""><font color="white">
<i class="fas fa-shopping-cart"></i> Cart</font></h5>
    </a>
</li>
<li class="box2"><a href="logout.php"> <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
       value="log out"></form></a></li>
</ul>
</nav>
     <!-- <div class="home">
        <div class="container">
            <div class="row full-screen">
                <div class="home-content">
                    <div class="block">
                        <blockquote>
                            <h1><font color="#ea8c2a">E-</font>commerce</h1>
                        </blockquote>
                        <h2>Shop With US</h2>
                        <h5>we ship over 45 million product around the world</h5>
                        <div class="button">
                            <a href="login.html">SHOP NOW</a>
                        </div>
                    </div>
                  </div>
                 <!-- <div class="image1">
                      <img src="bag.jpg" height="200px" align="right">
                  </div>
                  <div class="image3">
                    <img src="watch.jpg" height="200px" align="right">
                  </div>
                  <div class="image2">
                    <img src="shoes.jpg" height="200px" align="right">
                  </div>

            </div>

    </div>
  </div> -->
  <section>
    
  </section>
  </body>
</html>
<script>


    function ADD_Panier(id)
    {
       

        $.ajax({
            type:'post',
            url:'Add.php',
            data:{Add_id:id,username:'<?php echo $_SESSION['username'];?>'},
            success:function(data){
                
            }
        })
        
    }

</script>