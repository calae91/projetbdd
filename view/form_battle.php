<html>
  <head>
    <?php include 'config.php'; ?>
    <link rel="icon" type="image/png" href="<?php echo $domaine; ?>ressources/logo.png" />
    <title>DD4-Formulaire d'un Combat</title>
  </head>
  <body>
    <div id="head">
      <?php
      include 'header.php';
      include '../modele/fonction_battle.php';
      include 'nav.php';
      ?>
    </div>
    <?php
      $action = $_GET["action"];
      if($action=="edition")
        $combat = get_battle($_GET["id"]);
    ?>
    <div>
      <center><h2>Combat</h2></center>
      <form action="<?php echo $domaine; ?>controller/battle_studio_controller.php?action=<?php echo $action; ?>" method="post">
        <table border="0" width="400" align="center">
          <tr>
            <?php if($action=="edition") {?><td width="300"><b>Id</b></td>
            <td width="300">
              <input type="<?php if($action=="nouveau") echo "hidden"; else echo "text"; ?>" name="idCombat" value="<?php if($action=="edition") echo $_GET["id"]; ?>">
            </td>
          </tr>
          <?php } ?>
          <tr>
            <td width="300"><b>Personnage :</b></td>
            <td width="300">
              <input type="text" name="IdPersonnage" value="<?php if($action=="edition") echo $combat["IdPersonnage"]; ?>">
            </td>
          </tr>
          <tr>
            <td width="300"><b>Monstre :</b></td>
            <td width="300">
              <input type="text" name="IdMonstre" value="<?php if($action=="edition") echo $combat["IdMonstre"]; ?>">
            </td>
          </tr>
          <tr>
            <td width="300"><b>Terrain :</b></td>
            <td width="300">
              <input type="text" name="IdTerrain" value="<?php if($action=="edition") echo $combat["IdTerrain"]; ?>">
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
