<?php

if(isset($_POST['title'])){
    require '../connexion.php';

    $title = htmlspecialchars($_POST['title']);

    if(empty($title)){
        header("Location: ../index0.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO todo (title) VALUE(?)");
        $res = $stmt->execute([$title]);

        if($res){
            header("Location: ../index0.php?mess=success"); 
        }else {
            header("Location: ../index0.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index0.php?mess=error");
}
?>