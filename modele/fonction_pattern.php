<?php

  function insert_new_pattern($post){
    //ajoute un modèle de monstre
    include 'bdd.php';
    $Nom = $post["Nom"];
    $PV = $post["PV"];
    $ATK = $post["ATK"];
    $VIT = $post["VIT"];

    $sql = "INSERT INTO Monstre
            VALUES (null,:Nom,:PV,:ATK,:VIT);";
    $req = $pdo->prepare($sql);

    //youpi ! tout un tas d'instructions pour associer les valeurs aux paramètres
    $req->bindValue('Nom', $Nom, PDO::PARAM_STR);
    $req->bindValue('PV', $PV, PDO::PARAM_INT);
    $req->bindValue('ATK', $ATK, PDO::PARAM_INT);
    $req->bindValue('VIT', $VIT, PDO::PARAM_INT);
    return $req->execute();
  }

  function select_pattern(){
    //renvoie tous les modèles de monstres
    include 'bdd.php';
    $req = $pdo->prepare("SELECT *  from 	Monstre ORDER BY Nom ASC;");
    $req -> execute();
    return $req;
  }

  function delete_pattern($IdMonstre){
    //supprime un modèle de monstres
    include 'bdd.php';
    $req = $pdo->prepare("DELETE FROM Monstre WHERE IdMonstre = :IdMonstre;");
    $req->bindParam('IdMonstre', $IdMonstre, PDO::PARAM_INT);
    $req->execute();
    return $req;
  }

  function get_pattern($IdMonstre){
    //renvoie un modèles de monstres
    include 'bdd.php';
    $req = $pdo->prepare("SELECT * FROM Monstre WHERE IdMonstre = :IdMonstre;");
    $req->bindParam('IdMonstre', $IdMonstre, PDO::PARAM_INT);
    $req->execute();
    return $req->fetch();
  }

  function update_pattern($post){
    //met à jour un modèles de monstres
    include 'bdd.php';
    $Nom = $post["Nom"];
    $PV = $post["PV"];
    $ATK = $post["ATK"];
    $VIT = $post["VIT"];
    $IdMonstre = $post["IdMonstre"];

    $sql = "UPDATE Monstre SET
            Nom = :Nom,
            PV = :PV,
            ATK = :ATK,
            VIT = :VIT
            WHERE IdMonstre = :IdMonstre;";
    $req = $pdo->prepare($sql);

    //youpi ! tout un tas d'instructions pour associer les valeurs aux paramètres et oui encore ce commentaire
    $req->bindValue('Nom', $Nom, PDO::PARAM_STR);
    $req->bindValue('PV', $PV, PDO::PARAM_INT);
    $req->bindValue('ATK', $ATK, PDO::PARAM_INT);
    $req->bindValue('VIT', $VIT, PDO::PARAM_INT);
    $req->bindValue('IdMonstre', $IdMonstre, PDO::PARAM_INT);
    return $req->execute();
  }

 ?>
