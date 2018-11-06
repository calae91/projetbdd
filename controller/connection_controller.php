<?php
include '../modele/fonction_users.php';
session_start();

if(empty($_POST["login"]) || empty($_POST["password"])){

  //un des champs n'est pas remplis
  echo "Un des champs est vide. Tout doit être renseigné";
  header("Refresh: 3;URL=../view/connection.php");
}
else {
  //Super tout les champs sont remplis
  $utilisateur = get_utilisateur($_POST["login"]);
  if($utilisateur!=true){
    echo "Le nom d'utilisateur n'existe pas.";
    header("Refresh: 3;URL=../view/connection.php");
  }
  else{
    if($utilisateur["password"]!=$_POST["password"]){
      echo "le mot de passe n'est pas valide, redirection automatique dans 5 seconde...";
      header("Refresh: 100; URL=../view/connection.php");
    }
    else{
      $_SESSION["login"]= $utilisateur["login"];
      $_SESSION["password"]= $utilisateur["password"];
      $_SESSION["credit"]= $utilisateur["credit"];
      header("Location: ../view/home.php");
    }
  }
}

 ?>
