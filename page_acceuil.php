<?php
require_once 'functions/connectDB.php';
$connect = connectDB();
$message = null;

var_dump($_POST['identifiant']);

if ($_POST['identifiant'] && $_POST['password']) {
    $sql_connexion_DB = "SELECT 'identifiant', 'password' FROM 'users' ";
    $result_connexion_DB = mysqli_query($connect, $sql_connexion_DB);
    echo $result_connexion_DB;
}else {
    echo "error";
}

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
    <?php include_once 'menu.php';
        include_once 'connexion.php'; 
        if ($_POST['identifiant'] && $_POST['password']) {
            $sql_connexion_DB = "SELECT 'identifiant', 'password' FROM 'users' ";
            $result_connexion_DB = mysqli_query($connect, $sql_connexion_DB);
            while ($assoc = mysqli_fetch_assoc($result)){
                echo $value;
            }
        }
        else {
            echo "error";
        }
        ?>
</header>
<div class="body">
    <form action="" method="post">
        <select type="submit" name="tri" id="tri" onChange="this.form.submit();">
            <option value="">Choisir tri</option>
            <option value="prix">Prix</option>
            <option value="possesseur">Propriétaire</option>
            <option value="console">Console</option>
            <option value="nbre_joueurs_max">Nombre de joueur max</option>
        </select>
    </form>
    <div class="listJeux">
        <?php 
        
            if (empty($_POST['tri'])) {
                $sql_liste_jeuxvideo = "SELECT * FROM jeux_video";
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
            }
            if ($_POST['tri'] === "prix") {
                $sql_liste_jeuxvideo = "SELECT * FROM jeux_video ORDER BY prix";
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
            }
            if ($_POST['tri'] === "possesseur") {
                $sql_liste_jeuxvideo = "SELECT * FROM jeux_video ORDER BY possesseur";
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
                }
                if ($_POST['tri'] === "console") {
                    $sql_liste_jeuxvideo = "SELECT * FROM jeux_video ORDER BY console";
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
                }
                if ($_POST['tri'] === "nbre_joueurs_max") {
                    $sql_liste_jeuxvideo = "SELECT * FROM jeux_video ORDER BY nbre_joueurs_max";
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
                }?>
    
    
    </div>

</div>
    
</body>
</html>