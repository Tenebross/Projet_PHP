<?php
require_once 'functions/connectDB.php';
$connect = connectDB();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/app.css">
    <link rel="stylesheet" href="assets/foundations.css">
    <link rel="stylesheet" href="assets/foundations.min.css">
    <link rel="stylesheet" href="assets/bulma.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>OccasGames</title>
</head>
<body>
<header>
    <?php include_once 'menu.php'; ?>
</header>
<div class="body">
    <div class="listJeux">
        <?php $sql_liste_jeuxvideo = "SELECT * FROM jeux_video";
        $result = mysqli_query($connect, $sql_liste_jeuxvideo);
        while ($assoc = mysqli_fetch_assoc($result)) {?>
            <div class="cadre">
            <div class="titre">
                <img src="src/SuperMarioBros1.png" alt="Super mario Bros" class="imgjeux">
                <p> <?= $assoc['nom']?></p>
            </div>
            <div class="info">
                <div class="info1">
                    <div class="vendeur"><p><?= "Vendeur : ".$assoc['possesseur'];?></p> </div>
                    <div class="console"><p><?= "Console : ".$assoc['console'];?></p></div>
                    <div class="nombre"><p><?= "Nombre de joueurs maximum : ".$assoc['nbre_joueurs_max'];?></p></div>
                    <div class="prix"><p><?= "Prix : ".$assoc['prix']." €";?></p></div>
                </div>
                <div class="info2">
                <div class="com">
                    <p>Commentaires:</p>
                </div>
                    <div class="commentaires"><p><?= "<br>".$assoc['commentaires'];?></p></div>
                </div>
            </div>
        </div>    
    <?php
    }
        
        ?>
    </div>
</div>
    
</body>
</html>