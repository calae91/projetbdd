<html>
  <head>
    <?php include 'config.php'; ?>
    <link rel="icon" type="image/png" href="<?php echo $domaine; ?>ressources/logo.png" />
    <title>DD4-Création de modèles de monstres</title>
  </head>
  <body>
    <div id="head">
      <?php
        include 'header.php';
        include '../modele/fonction_pattern.php';
      ?>
      <script type="text/javascript" src="ressources/js/div_masquer.js"></script>
    </div>
    <?php
      if(isset($_GET['supprimer'])){
        delete_pattern($_GET['supprimer']);
      }
      include 'nav.php';
    ?>
    <div>
      <br>
      <center><h2>Modèles de monstres</h2></center>
      <center>
        <table>
          <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Point de vie</th>
            <th>Attaque</th>
            <th>Vitesse </th>
            <th>Actions</th>
            <?php $patterns = select_pattern(); ?>
          </tr>
          <tr>
            <?php while ($pattern = $patterns->fetch()) {
              ?>
              <tr>
                <td><?php echo $pattern['IdMonstre']; ?></td>
                <td><?php echo $pattern['Nom']; ?></td>
                <td><p title="PV"><?php echo $pattern['PV']; ?></p></td>
                <td><p title="ATK"><?php echo $pattern['ATK']; ?></p></td>
                <td><p title="VIT"><?php echo $pattern['VIT']; ?></p></td>
                <td>

                  <?php
                    if(empty($_SESSION["login"])){
                    echo "Vous devez être connecté pour modifier des données";
                  }
                  else {
                    if($_SESSION["credit"]>=2){ ?>
                    <a href="form_pattern.php?action=edition&amp;id=<?php echo $pattern['IdMonstre']; ?>">Modifier</a>
                    <?php
                    if($_SESSION["credit"]>=3){ ?>
                    <a href="pattern_studio.php?supprimer=<?php echo $pattern['IdMonstre']; ?>">Supprimer</a>
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
          <form action="form_pattern.php?action=nouveau" method="post">
             <input type="submit" name="Nouveau" value="Nouveau modèle"/>
          </form>
          <?php
        }?>
      </center>
    </div>
  </body>
</html>
