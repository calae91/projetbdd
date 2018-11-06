<html>
  <head>
    <?php include 'config.php'; ?>
    <link rel="icon" type="image/png" href="<?php echo $domaine; ?>ressources/logo.png" />
    <title>DD4-Formulaire d'un modèle</title>
  </head>
  <body>
    <div>
      <?php
      include 'header.php';
      include '../modele/fonction_pattern.php';
      include 'nav.php';
      ?>
    </div>
    <?php
      $action = $_GET["action"];
      if($action=="edition")
        $pattern = get_pattern($_GET["id"]);
    ?>
    <div id="studio_combat">
      <center><h2>Modèle de monstres</h2></center>
      <form action="<?php echo $domaine ?>controller/pattern_studio_controller.php?action=<?php echo $action; ?>" method="post">
        <table border="0" width="500" align="center">
          <tr>
            <?php if($action=="edition") {?><td width="300"><b>Id</b></td>
            <td width="300">
              <input type="<?php if($action=="nouveau") echo "hidden"; else echo "text"; ?>" name="IdMonstre" value="<?php if($action=="edition") echo $_GET["id"]; ?>">
            </td>
          </tr>
          <?php } ?>
          <tr>
            <td width="300"><b>Nom :</b></td>
            <td width="300">
              <input type="text" name="Nom" value="<?php if($action=="edition") echo $pattern["Nom"]; ?>"/>
            </td>
          </tr>
          <tr>
            <td width="300"><b>Point de Vie :</b></td>
            <td width="300">
              <input type="text" name="PV" value="<?php if($action=="edition") echo $pattern["PV"]; ?>">
            </td>
          </tr>
          <tr>
            <td width="300"><b>Attaque :</b></td>
            <td width="300">
              <input type="text" name="ATK" value="<?php if($action=="edition") echo $pattern["ATK"]; ?>">
            </td>
          </tr>
          <tr>
            <td width="300"><b>Vitesse :</b></td>
            <td width="300">
              <input type="text" name="VIT" value="<?php if($action=="edition") echo $pattern["VIT"]; ?>">
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
