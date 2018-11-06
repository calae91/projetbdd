<html>
  <head>
    <?php include 'config.php'; ?>
    <link rel="icon" type="image/png" href="<?php echo $domaine; ?>ressources/logo.png" />
    <title>DD4-Connexion</title>
  </head>
  <body>
    <div id="head">
      <?php
      include 'header.php';
      include '../modele/fonction_users.php';
      include 'nav.php';
      ?>
    </div> 
    <div>
      <center><h2>Connexion</h2></center>
      <form action="<?php echo $domaine; ?>controller/connection_controller.php" method="post">
        <table border="0" width="400" align="center">
          <tr>
            <td width="300"><b>Nom d'utilisateur :</b></td>
            <td width="300">
              <input type="text" name="login">
            </td>
          </tr>
          <tr>
            <td width="300"><b>Mot de passe :</b></td>
            <td width="300">
              <input type="password" name="password">
            </td>
          </tr>
          <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Se connecter">
          </td>
        </tr>
        </table>
      </form>
    </div>
  </body>
</html>
