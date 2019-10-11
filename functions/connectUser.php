<?php
include_once 'functions/connectDB.php';

function connectUser()
{
    $login = $_POST['identifiant'];
    $password = $_POST['password'];
    $sql="SELECT * FROM users WHERE identifiant='$login' AND password='$password";
    var_dump($sql);
    //if ($_POST['identifiant'] && $_POST['password'] === $sql)
    /*if (sizeof($_POST) > 0){
        if (isset($_POST['identifiant'])){
            $login=addslashes($_POST['identifiant']);
            $password=MD5 ($_POST['password']);

            $sql="SELECT * FROM users WHERE identifiant='$login' AND password='$password'";
            $req=mysqli_query(connectDB(),$sql);
            if(! $req) echo('Requête invalide: '.mysql_error());
            if (mysql_num_rows($req)){
                $row = mysql_fetch_object($req);
                $_SESSION['identifiant'] = $row->identifiant;
                $_SESSION['password'] = $row->password;
                $_SESSION['prenom'] = $row->prenom;

                header("Location:resultat.php");
            }else{
                echo "Login ou mot de passe invalide";
            }
        }
            else{
                    header("Location:page_acceuil.php?erreur=login");
                        echo "erreur";
                }
        
    }*/
}