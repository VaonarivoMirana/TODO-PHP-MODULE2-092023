<?php 
require '../connexion.php';
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!-- the header section -->
    <div class="header">
          <img src="../img/sayna.png" alt="">
          <div class="right">
             <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Contact</a></li>
                  <li><a href="#">Profile</a></li>
                  <li><a href="#">About us</a></li>
             </ul>
          </div>
    </div>
    
    <?php 
        $id=$_GET['id'];
        $sql1 = "SELECT * FROM todo WHERE id=$id";
        $todos1 = $conn->prepare($sql1);
        $todos1->execute();
        $show=$todos1->fetchAll(PDO::FETCH_ASSOC);
        
    ?>
    
    <div class="main-section">

      <?php foreach($show as $tache)  :?>

        <!-- section MODIFIER -->
        <div class="add-section">

            <!-- formulaire -->
            <form action="" method="POST" autocomplete="off">
                <input type="text" 
                     name="title" 
                     placeholder="Voulez-vous modifier la tache <?=$tache['title'] ;?> ?"
                      />
              <button type="submit" name="submit">Modifier &nbsp; <span>&#43;</span></button>
            </form>
            <!-- Fin Formulaire -->
        </div>

        <?php 
          if(isset($_POST['submit'])){
              extract($_POST);
              $modify=$conn->prepare("UPDATE todo SET title='$title' WHERE id=$id");
              $modify->execute();
              header('location:../index0.php');    
          }
          
        ?>
      <?php endforeach; ?>
      <!-- Fin section MODIFIER -->
    </div>

  
    <?php
       require '../html/footer.php';

    ?>
