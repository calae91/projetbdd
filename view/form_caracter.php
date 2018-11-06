<html>
  <head>
    <?php include 'config.php'; ?>
    <link rel="icon" type="image/png" href="<?php echo $domaine; ?>ressources/logo.png" />
    <title>DD4-Formulaire d'un personnage</title>
  </head>
  <body>
    <div id="head">
      <?php
      include 'header.php';
      include '../modele/fonction_caracter.php';
      include 'nav.php';
      ?>
    </div>
    <?php
      $action = $_GET["action"];
      if($action=="edition")
        $personnage = get_caracter($_GET["id"]);    ?>
    <div>
      <center><h2>Personnage</h2></center>
      <form action="../controller/caracter_studio_controller.php?action=<?php echo $action; ?>" method="post">
        <table border="0" width="400" align="center">
          <tr>
            <?php if($action=="edition") {?><td width="300"><b>Id</b></td>
            <td width="300">
              <input type="<?php if($action=="nouveau") echo "hidden"; else echo "text"; ?>" name="id" value="<?php echo $_GET["id"]; ?>">
            </td>
            <?php } ?>
          </tr>
          <tr>
            <td width="200"><b>Nom :</b></td>
            <td width="300">
              <input type="text" name="Nom" value="<?php if($action=="edition") echo $personnage["Nom"]; ?>">
            </td>
          </tr>
          <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Enregistrer">
          </td>
        </tr>
        </table>
      </form>
    </div>
  </body>
</html>
