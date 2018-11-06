<?php

  function insert_new_caracter($post){
    //ajoute un nouveau joueurs
    include 'bdd.php';
    $nom = $post["Nom"];

    $sql = "INSERT INTO Personnage
            VALUES (null,:Nom);";
    $req = $pdo->prepare($sql);

    //youpi ! tout un tas d'instructions pour associer les valeurs aux paramètres
    $req->bindValue('Nom', $nom, PDO::PARAM_STR);
    $req->execute();

    return $req;
  }

  function select_caracter(){
    //renvoie tous les joueurs
    include 'bdd.php';
    $req = $pdo->prepare("SELECT *  from 	Personnage;");
    $req -> execute();
    return $req;
  }

  function delete_caracter($IdPersonnage){
    //supprime un joueurs et vide en conséquence la table participants
    include 'bdd.php';
    $req = $pdo->prepare("DELETE FROM Personnage WHERE IdPersonnage = :IdPersonnage;");
    $req->bindParam('IdPersonnage', $IdPersonnage, PDO::PARAM_INT);
    return $req->execute();
  }

  function get_caracter($IdPersonnage){
    //renvoie un joueurs
    include 'bdd.php';
    $req = $pdo->prepare("SELECT * FROM Personnage WHERE IdPersonnage = :IdPersonnage;");
    $req->bindParam('IdPersonnage', $IdPersonnage, PDO::PARAM_INT);
    $req->execute();
    return $req->fetch();
  }

  function update_caracter($post){
    //met à jour un personnage
    include 'bdd.php';
    $Nom = $post["Nom"];
    $IdPersonnage = $post["id"];

    $sql = "UPDATE Personnage SET
            Nom = :Nom
            WHERE IdPersonnage= :IdPersonnage;";
    $req = $pdo->prepare($sql);

    //youpi ! tout un tas d'instructions pour associer les valeurs aux paramètres et oui encore ce commentaire
    $req->bindValue('Nom', $Nom, PDO::PARAM_STR);
    $req->bindValue('IdPersonnage', $IdPersonnage, PDO::PARAM_INT);
    return $req->execute();
  }
 ?>
