<?php
  include '../modele/fonction_pattern.php';
  include 'verif_connecter_controller.php';

  if(empty($_POST["Nom"]) || empty($_POST["PV"]) || empty($_POST["ATK"]) || empty($_POST["VIT"])){

    //un des champs n'est pas remplis
    echo "Un des champs est vide ou bonus_initiative est à 0. Tout doit être renseigné";
    header("Refresh: 3;URL= ../view/form_pattern.php?action=nouveau");
  }
  else {
    //Super tout les champs sont remplis
    if($_GET["action"]=="nouveau"){
      $verif = insert_new_pattern($_POST);
      if($verif){
        header("Location: ../view/pattern_studio.php");
      }
      else{
        echo "Une erreur est survenue lors de la création du modèle";
        header("Refresh: 3;URL= ../view/form_pattern.php?action=nouveau");
      }
    }
    elseif ($_GET["action"]=="edition") {
      $verif = update_pattern($_POST);
      if($verif){
        header("Location: ../view/pattern_studio.php");
      }
      else {
        echo "Une erreur est survenue lors de la mise à jour du modèle";
        header("Refresh: 3;URL=../view/form_pattern.php?action=edition");
      }
    }
  }
?>
