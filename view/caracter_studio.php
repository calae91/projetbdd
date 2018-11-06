<html>
  <head>
    <?php include 'config.php'; ?>
    <link rel="icon" type="image/png" href="<?php echo $domaine; ?>ressources/logo.png" />
    <title>DD4-Personnages</title>
  </head>
  <body>
    <div id="head">
      <?php
      include 'header.php';
      include '../modele/fonction_caracter.php';
      ?>
    </div>
    <?php
      if(isset($_GET['supprimer'])){
        delete_caracter($_GET['supprimer']);
      }
      include 'nav.php';
    ?>
    <div>
      <br>
      <center><h2>Personnage</h2></center>
      <center>
        <table>
          <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>description</th>
            <?php $personnages = select_caracter(); ?>
            <th>Actions</th>
          </tr>
          <tr>
            <?php while ($personnage = $personnages->fetch()) {
              ?>
              <tr>
                <td><?php echo $personnage['IdPersonnage']; ?></td>
                <td><?php echo $personnage['Nom']; ?></td>
                <td><?php echo $personnage['description']; ?></td>
                <td>
                  <?php
                    if(empty($_SESSION["login"])){
                    echo "Vous devez être connecté pour modifier des données";
                  }
                  else {
                    if($_SESSION["credit"]>=2){ ?>
                    <a href="form_caracter.php?action=edition&amp;id=<?php echo $personnage['IdPersonnage']; ?>">Modifier</a>
                    <?php
                    if($_SESSION["credit"]>=3){ ?>
                    <a href="caracter_studio.php?supprimer=<?php echo $personnage['IdPersonnage']; ?>">Supprimer</a>
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
          <form action="form_caracter.php?action=nouveau" method="post">
             <input type="submit" name="Nouveau" value="Nouveau personnage"/>
          </form>
          <?php
        }?>
      </center>
    </div>
  </body>
</html>
