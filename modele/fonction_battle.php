<?php

  function insert_new_battle($post){
    //insertion d'un nouveau combat
    include 'bdd.php';
    $IdPersonnage = $post["IdPersonnage"];
    $IdMonstre = $post["IdMonstre"];
    $IdTerrain = $post["IdTerrain"];

    $sql = "INSERT INTO Combat
            VALUES (null,:IdPersonnage,:IdMonstre,:IdTerrain);";
    $req = $pdo->prepare($sql);

    $req->bindValue('IdPersonnage', $IdPersonnage, PDO::PARAM_INT);
    $req->bindValue('IdMonstre', $IdMonstre, PDO::PARAM_INT);
    $req->bindValue('IdTerrain', $IdTerrain, PDO::PARAM_INT);
    return $req->execute();
  }

  function select_battle(){
    //renvoie tous les combats
    include 'bdd.php';
    $req = $pdo->prepare("SELECT *  from vue_ensemble;");
    $req -> execute();
    return $req;
  }

  function delete_battle($idCombat){
    //supprime un combat et vide la table participant en conséquence
    include 'bdd.php';
    $req = $pdo->prepare("DELETE FROM Combat WHERE idCombat = :idCombat;");
    $req->bindParam('idCombat', $idCombat, PDO::PARAM_INT);
    $req->execute();
    return $req;
  }

  function get_battle($idCombat){
    //renvoie un combat
    include 'bdd.php';
    $req = $pdo->prepare("SELECT * FROM Combat WHERE idCombat = :idCombat;");
    $req->bindParam('idCombat', $idCombat, PDO::PARAM_INT);
    $req->execute();
    return $req->fetch();
  }

  function update_battle($post){
    include 'bdd.php';
    $idCombat = $post["idCombat"];
    $IdPersonnage = $post["IdPersonnage"];
    $IdMonstre = $post["IdMonstre"];
    $IdTerrain = $post["IdTerrain"];

    $sql = "UPDATE Combat SET
            nom = :nom,
            IdPersonnage = :IdPersonnage,
            IdMonstre = :IdMonstre,
            IdTerrain = :IdTerrain
            WHERE idCombat = :idCombat;";
    $req = $pdo->prepare($sql);

    $req->bindValue('idCombat', $idCombat, PDO::PARAM_INT);
    $req->bindValue('IdPersonnage', $IdPersonnage, PDO::PARAM_INT);
    $req->bindValue('IdMonstre', $IdMonstre, PDO::PARAM_INT);
    $req->bindValue('IdTerrain', $IdTerrain, PDO::PARAM_INT);
    return $req->execute();
  }

 ?>
