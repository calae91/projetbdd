<html>
  <head>
    <?php include 'config.php'; ?>
    <link rel="icon" type="image/png" href="<?php echo $domaine; ?>ressources/logo.png" />
    <title>DD4-Combats</title>
  </head>
  <body>
    <div id="head">
      <?php
      include 'header.php';
      include '../modele/fonction_battle.php';
      ?>
    </div>
    <?php

      if(isset($_GET['supprimer'])){
        delete_battle($_GET['supprimer']);
      }
      include 'nav.php';
    ?>
    <div>
      <br>
      <center><h2>Combats</h2></center>
      <center>
        <table>
          <tr>
            <th>Combat n° </th>
            <th>Nom du Personnage</th>
            <th>Nom du Monstre</th>
            <th>Nom du Terrain</th>
            <th>Actions</th>


            <?php $combats= select_battle(); ?>

          </tr>
          <tr>
            <?php while ($combat = $combats->fetch()) {
              ?>
              <tr>
                <td><?php echo $combat['Id']; ?></td>
                <td><?php echo $combat['Personnage']; ?></td>
                <td><?php echo $combat['Monstre']; ?></td>
                <td><?php echo $combat['Terrain']; ?></td>

                <td>
                  <?php
                    if(empty($_SESSION["login"])){
                    echo "Vous devez être connecté pour modifier des données";
                  }
                  else {
                    if($_SESSION["credit"]>=2){ ?>
                    <a href="form_battle.php?action=edition&amp;id=<?php echo $combat['Id']; ?>">Modifier</a>
                    <?php
                    if($_SESSION["credit"]>=3){ ?>
                    <a href="battle_studio.php?supprimer=<?php echo $combat['Id']; ?>">Supprimer</a>

                    <?php
                  }}}?>
                </td>
              </tr>
              <?php
            }
            ?>
          </tr>
        </table>
        <br>
        <?php if(!empty($_SESSION['login'])){
          ?>
          <form action="form_battle.php?action=nouveau" method="post">
             <input type="submit" name="Nouveau" value="Nouveau combat"/>
          </form>
          <?php
        }?>
      </center>
    </body>
    </div>

</html>
