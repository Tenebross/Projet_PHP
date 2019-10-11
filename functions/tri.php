<?php 

function triListe(){?>
    
    <?php 
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
<?php
}?>