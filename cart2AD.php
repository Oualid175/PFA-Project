<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:login1.php');}
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
                    'item_img' => $_POST["item_img"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],


                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="admin.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="admin.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'item_img' => $_POST["item_img"],
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
                    echo '<script>window.location="Cart2AD.php"</script>';
                }
            }
        }
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');


        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
        }

        h3{
          background-color: none;
          text-align: center;
          color: white;
          padding: 3%;
          font-size: 30px;


        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 3%;
        }
        table th{
            background-color: #efefef;
        }
    </style>
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr, en" lang="fr, en">
      <head>


        <meta charset="utf-8">

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <title>Welcome</title>
        <link rel="stylesheet" href="home-page.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      </head>
      <body>
        <nav>
          <a href="admin.php" class="logo"> <font face="ink free"><font color="#ea8c2a">O</font>nline<font color="#ea8c2a"> S</font>tore</a>
          <ul>
    <li><a class="active" href="admin.php"><font color="white">Home</font></a></li>

    <li><a href="#"><font color="white">catégorie
              <i class="fas fa-caret-down"></i></font>
            </a>
              <ul>
    <li><a href="laptopAD.php"><font color="white">Laptop</font></a></li>
    <li><a href="phoneAD.php"><font color="white">phone</font></a></li>
    <li><a href="booksAD.php"><font color="white">Books</font></a></li>
    <li><a href="#"><font color="white">Gadget</font><i class="fas fa-caret-right"></i></a>

    <font color="white"></font>
                  <ul>
    <li><a href="KeyboardAD.php"><font color="white">Keyboard</font></a></li>
    <li><a href="mouseAD.php"><font color="white">Mouse</font></a></li>
    <li><a href="headphonesAD.php"><font color="white">Headphone</font></a></li>
    <li><a href="smartwatchAD.php"><font color="white">Smart Watch</font></a></li>
    </ul>
    </li>
    </ul>
    </li>
    <li><a href="sellAD.php"><font color="white">Sell</font></a></li>
    <li><a class="active"><h4>ADMIN PAGE : hi, <?php echo $_SESSION['username']; ?></h4></a></li>
    <li>
        <a href="cart2AD.php" class="nav-item nav-link active">
            <h5 class=""><font color="white">
    <i class="fas fa-shopping-cart"></i> Cart</font></h5>
        </a>
    </li>

    <li class="box2"><a href="logout.php"> <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
           value="log out"></form></a></li>

    </ul>

    </nav>
</head>
<body>

    <div class="container" style="width: 75%">
        <?php
            $query = "SELECT * FROM produit ORDER BY id ASC ";
            $result = mysqli_query($con,$query);
            $row = mysqli_fetch_array($result);
        ?>

        <div style="clear: both"></div>

<h2><font face="ink free"><font color="#ea8c2a">S</font><font color="black">hopping</font><font color="#ea8c2a"> C</font><font color="black">art</font><font color="#ea8c2a"> D</font><font color="black">etails</font></h2>

        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
              <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <th><?php echo $value["item_name"]; ?></th>
                            <th><?php echo $value["item_quantity"]; ?></th>
                            <th>$ <?php echo $value["product_price"]; ?></th>
                            <th>
                                $ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></th>
                            <th><a href="Cart2AD.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></th>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <th colspan="3" align="right">Total</th>
                            <th align="right">$ <?php echo number_format($total,2); ?></th>
                            <th colspan="5">
                              <p style="text-align: center;"> <a href="order.php"><input type="submit" name="add" style="margin-top: -5px;" class="btn btn-success"
                               value="telecharger la facture"></a></p>
                            </th>
                        </tr>



                        <?php
                    }
                ?>

            </table>
        </div>

    </div>


</body>
</html>
