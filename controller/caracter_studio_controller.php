<?php
  include '../modele/fonction_caracter.php';
  include 'verif_connecter_controller.php';

  if(empty($_POST["Nom"])){

    //un des champs n'est pas remplis
    echo "Un des champs est vide. Tout doit être renseigné";
    header("Refresh: 3;URL=../view/form_caracter.php?action=".$_GET['action']);
  }
  else {
    //Super tout les champs sont remplis
    if($_GET["action"]=="nouveau"){
      $verif = insert_new_caracter($_POST);
      if($verif){
        header("Location: ../view/caracter_studio.php");
      }
      else{
        echo "Une erreur est survenue lors de la création du personnage";
        header("Refresh: 3;URL=../view/form_caracter.php");
      }
    }
    elseif ($_GET["action"]=="edition") {
      $verif = update_caracter($_POST);
      if($verif){
        header("Location: ../view/caracter_studio.php");
      }
      else {
        echo "Une erreur est survenue lors de la mise à jour du personnage";
        header("Refresh: 3;URL=../view/form_caracter.php");
      }
    }
  }
?>
