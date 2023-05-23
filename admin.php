<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['email'])){
  header('location:login1.php');
  include ('sell.php');
}
?>
<?php
    $database_name = "login";
    $con = mysqli_connect("localhost","root","",$database_name);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
      <ul style="margin-bottom:0 ;">
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
<li hidden>
    <a href="cart2AD.php" class="nav-item nav-link active">
        <h5 class=""><font color="white">
<i class="fas fa-shopping-cart"></i> Cart</font></h5>
    </a>
</li>

<li class="box2"><a href="logout.php"> <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
       value="log out"></form></a></li>

</ul>

</nav>
      <!--<div class="home">
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
  </div>-->
  <section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <div class="container" style="width: 75%">

        <?php
            $query = "SELECT * FROM produit ORDER BY RAND() ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div  class="col-md-3">
 
                        <div id="div<?php echo $row['id']; ?>" class="product">
                            <form method="post" action="Cart2AD.php?action=add&id=<?php echo $row["id"]; ?>">

                                <img src="<?php echo $row["img"]; ?>" class="img-responsive" id="img_prd">
                                <h3 class="text-info"><?php echo $row["nom"]; ?></h3>
                                <!-- <h5 class="text-info"><?php echo $row["description"]; ?></h5> -->
                                <textarea disabled  class="text-info" cols="30"   rows="1" style="resize: none;background-color:transparent; border-color: transparent ; text-align: center;"><?php echo $row["description"]; ?></textarea><!-- //overflow-y: hidden; --> 
                                <h4 class="text-danger"><?php echo $row["prix"]; ?></h4>
                                <input type="text" name="quantity" class="form-control" value="1" style="text-align:center ;">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["nom"]; ?>">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["description"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["prix"]; ?>">
                                 <!-- <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart"> -->
                                <!-- <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="delete product"> -->

                            </form>
                                <button name='delete' id="btn_mod_sup" onclick="deleteAjax(<?php echo $row['id']; ?>)" style="margin-top: 5px;"
                                 class="btn btn-success">delete product</button>
                        </div>
                        
                    </div>
                    <?php
                }
            }
        ?>
      </div>
  </section>
  </body>
</html>
<script>
    function deleteAjax(id)
    {
        if (confirm('Are you sure you wanna delete this feedback ??')) {
            $.ajax({
                type:'post',
                url:'Delete.php',
                data:{delete_id:id},
                success:function(data){
                    $('#div'+id).hide('slow')
                }
            })
        }
    }
    
</script>