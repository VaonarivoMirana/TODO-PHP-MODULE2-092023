<?php
  include '../connexion.php';
  
  $id=$_GET['id'];
  $change=$conn->prepare("UPDATE todo SET checked=1 WHERE id=?");
  $change->execute(array($id));
  header('location:../index0.php');
?>