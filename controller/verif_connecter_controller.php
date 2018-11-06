<?php
session_start();
if(empty($_SESSION['login'])){
  header('Location: ../view/home.php');
  exit();
}
 ?>
