<html>
  <div id="menu">
    <ul>
      <li><a class="without_deco" href="home.php"><h3>Accueil</h3></a></li>
      <li><a class="without_deco" href="caracter_studio.php"><h3>Personnages</h3></a></li>
      <li><a class="without_deco" href="pattern_studio.php"><h3>Modèles de monstres</h3></a></li>
      <li><a class="without_deco" href="battle_studio.php"><h3>Créer un combat</h3></a></li>
      <?php if(empty($_SESSION["login"])) {
         echo "<li><a class='without_deco' href='connection.php'><h3>Se connecter</h3></a></li>";
       } else
         echo "<li><a class='without_deco' href='../controller/deconnection_controller.php'><h3>Déconnexion</h3></a></li>";
         echo "<p id='welcome'>Welcome :" . $_SESSION['login'] . "</p>";
        ?>
    </ul>
  </div>
</html>
