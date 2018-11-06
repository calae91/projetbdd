<?php
  function get_utilisateur($login){
    //renvoie un utilisateur
    include 'bdd.php';
    $req = $pdo->prepare("SELECT * FROM utilisateurs WHERE login = :login;");
    $req->bindParam('login', $login, PDO::PARAM_STR);
    $req->execute();
    return $req->fetch();
  }
 ?>
