<?php
  include '../modele/fonction_battle.php';
  include 'verif_connecter_controller.php';

  if(empty($_POST["IdPersonnage"]) || empty($_POST["IdMonstre"]) || empty($_POST["IdTerrain"])){

    //un des champs n'est pas remplis
    echo "Un des champs est vide. Tout doit être renseigné";
    header("Refresh: 3;URL=../view/form_battle.php?action=".$_GET['action']);
  }
  else {
    //Super tout les champs sont remplis

    if($_GET["action"]=="nouveau"){
      $verif = insert_new_battle($_POST);
      if($verif){
        header("Location: ../view/battle_studio.php");
      }
      else{
        echo "Une erreur est survenue lors de la création du combat";
        header("Refresh: 3;URL=../view/form_battle.php?action=".$_GET['action']);
      }
    }
    elseif ($_GET["action"]=="edition") {
      $verif = update_battle($_POST);
      if($verif){
        header("Location: ../view/battle_studio.php");
      }
      else {
        echo "Une erreur est survenue lors de la mise à jour du combat";
        header("Refresh: 3;URL=../view/form_battle.php?action=".$_GET['action']);
      }
    }
  }
?>
