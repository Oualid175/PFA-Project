<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:login1.php');
}
?>
<?php
$con= mysqli_connect('localhost','root','');
mysqli_select_db($con ,'login');

      if (!empty($_POST['nomproduit']) && !empty($_POST['prixproduit']) && !empty($_POST['quantproduit'])
       && !empty($_POST['descproduit']) && !empty($_POST['catégorie']) && !empty(($_POST['catégorie']))) {
        $nomproduit =$_POST['nomproduit'];
        $imgproduit =$_POST['imgproduit'];
        // var_dump($imgproduit);
        // die();
        $prixproduit =$_POST['prixproduit'];
        $quantproduit =$_POST['quantproduit'];
        $descproduit =$_POST['descproduit'];
        $catégorie =$_POST['catégorie'];
            //echo $_POST['descproduit'].'<hr>'.$descproduit;
            //die();
            $addpro = "INSERT INTO `produit` (`nom`, `img`, `prix`, `quantite`, `description`,`categorie`)
            VALUES ('$nomproduit', '/img/$imgproduit', '$prixproduit', '$quantproduit','$descproduit','$catégorie')";
            $rq = mysqli_query($con,$addpro);
          die("<p class='alert success'>Félicitations ! Votre nouveau produit a été ajouter avec succès !</p><br>
          <center><a href='sell.php'>Ajouter un autre produit</a> - <a href='home.php'>Voir tous les produit</a></center>");
      }else{
        }
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <nav >
      <a href="" class="logo"> <font face="ink free"><font color="#ea8c2a">O</font>nline<font color="#ea8c2a"> S</font>tore</a>
      <ul>
  <li><a class="active" href="home.php"><font color="white">Home</font></a></li>

  <!--<li><a href="#"><font color="white">catégorie
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
  <li><a href="headphone.php"><font color="white">Headphone</font></a></li>
  <li><a href="smartwatch.php"><font color="white">Smart Watch</font></a></li>
  </ul>
  </li>
  </ul>
  </li>
  <li><a href="sell.php"><font color="white">Sell</font></a></li>-->
  <li><a class="active"><h5><font color="white"> hi, <?php echo  $_SESSION['username'] ; ?></font></h5></a></li>
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
    <section>
      <form class="box3" action="" method="post" color="white">
          <table>
          <tr>
            <td><font color="white" size="5px"> Nom de produit : </font></td>
            <td><input type="text" name="nomproduit" placeholder="Entrer nom de produit "></input></td>
          </tr>
          <tr>
            <td><font color="white" size="5px"> catégorie :</font></td>
            <td><input type="text" name="catégorie" placeholder="catégorie "></input></td>
          </tr>
          <tr>
            <td><font color="white" size="5px">Image de produit : </font></td>
            <td><input type="file" name="imgproduit" placeholder="Entrer url d'image de produit"></input></td>
          </tr>
          <tr>
            <td><font color="white" size="5px">Prix :  </font></td>
            <td><input type="number" name="prixproduit" placeholder="Prix MAD"></input></td>
          </tr>
          <tr>
            <td><font color="white" size="5px">quantité :  </font></td>
            <td><input type="number" step="any" name="quantproduit"placeholder="quantité" ></input></td>
          </tr>
          <tr>
            <td><font color="white" size="5px">Description : </font></td>
            <td><textarea  name="descproduit"placeholder="Description" ></textarea></td>
          </tr>
          <tr>
            <td style="padding-left: 80px"><input type="submit" name="submit" value="list item"></td>
          </tr>
        </table>
  </form>

  </section>
  <sectionn>

</sectionn>
  </body>
</html>
