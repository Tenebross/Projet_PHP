<?php
/* Indique le bon format des entêtes (par défaut apache risque de les envoyer au standard ISO-8859-1) */
header('Content-type: text/html; charset=UTF-8');

/* Création d'une fonction - utilisée dans la récupération des variables - qui teste la configuration get_magic_quotes_gpc du serveur.
Si oui, supprime avec la fonction stripslashes les antislashes "\" insérés dans les chaines de caractère des variables gpc (GET, POST, COOKIE) */
function Verif_magicquotes ($chaine) 
{
if (get_magic_quotes_gpc()) $chaine = stripslashes($chaine);

return $chaine;
} 

/* Initialisation du message de réponse */
$message = null;


/* Si le formulaire est envoyé */
if (isset($_POST['pseudo'])) 
{

    /* Récupération des variables issues du formulaire
    Teste l'existence les données post en vérifiant qu'elles existent, qu'elles sont non vides et non composées uniquement d'espaces.
    (Ce dernier point est facultatif et l'on pourrait se passer d'utiliser la fonction trim())
    En cas de succès, on applique notre fonction Verif_magicquotes pour (éventuellement) nettoyer la variable */
    $pseudo = (isset($_POST['pseudo']) && trim($_POST['pseudo']) != '')? Verif_magicquotes($_POST['pseudo']) : null;
    $pass = (isset($_POST['pass']) && trim($_POST['pass']) != '')? Verif_magicquotes($_POST['pass']) : null;
    

    /* Si $pseudo et $pass différents de null */
    if(isset($pseudo,$pass)) 
    {
         /* Connexion au serveur : dans cet exemple, en local sur le serveur d'évaluation
         A MODIFIER avec vos valeurs */
         $hostname = "localhost";
         $database = "nom_de_votre_base";
         $username = "root";
         $password = "";
    
         $connection = mysql_connect($hostname, $username, $password) or die(mysql_error());

         /* Connexion à la base */
         mysql_select_db($database, $connection);
    
         /* Indique à mySql de travailler en UTF-8 (par défaut mySql risque de travailler au standard ISO-8859-1) */
         mysql_query("SET NAMES 'utf8'");
    
         /* Préparation des données pour les requêtes à l'aide de la fonction mysql_real_escape_string */
         $nom = mysql_real_escape_string($pseudo);
         $password = mysql_real_escape_string($pass);
    
    
         /* Requête pour récupérer les enregistrements répondant à la clause : 
         champ du pseudo et champ du mdp de la table = pseudo et mdp postés dans le formulaire*/
        $requete = "SELECT * FROM membres WHERE pseudo = '".$nom."' AND pass = '".$password."'";  
    
         /* Exécution de la requête */
         $req_exec = mysql_query($requete) or die(mysql_error());
    
         /* Création du tableau associatif du résultat */
         $resultat = mysql_fetch_assoc($req_exec); 

         /* Les valeurs (si elles existent) sont retournées dans le tableau $resultat;  */
         if (isset($resultat['pseudo'],$resultat['pass']))  
               {
                 /* Démarre la session et enregistre le pseudo dans la variable de session $_SESSION['login']
                 qui donne au visiteur la possibilité de visiter les pages protégées.  */
                 session_start();
                 $_SESSION['login'] = $pseudo;
            
                 /* A MODIFIER Remplacer le '#' par l'adresse de votre page de destination, sinon ce lien indique la page actuelle. */
                 $message = 'Bonjour '.htmlspecialchars($_SESSION['login']).' <a href = "#">Cliquez ici pour vous connecter</a>';
                }
                else
                {   /* Le pseudo ou le mot de passe sont incorrect */
                $message = 'Le pseudo ou le mot de passe sont incorrect';
                } 

    }
    else 
    {  /* au moins un des deux champs "pseudo" ou "mot de passe" n'a pas été rempli */
    $message = 'Les champs Pseudo et Mot de passe doivent être remplis.';
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Formulaire de connexion</title>
<style type="text/css">
<!--
body, p, h1,form, input {
margin:0;
padding:0;
}
body {
background-color:#FFFFFF
}
#connexion {
width:380px;
background:#FFFFFF;
margin:20px auto;
font-family: Arial, Helvetica, sans-serif;
font-size:1em;
border:2px solid #333333;
}
#connexion h1 {
text-align:center;
font-size:1.2em;
background:#333333;
padding-bottom:5px;
margin-bottom:15px;
color:#FFFFFF;
letter-spacing:0.05em;
}
#connexion p {
padding-top:15px;
padding-right:50px;
text-align:right;
}
#connexion input {
margin-left:30px;
width:150px;
}
#connexion #valider {
width:155px;
font-size:0.8em;
}
#connexion #message {
height:27px;
font-size:0.7em;
font-weight:bold;
text-align:center;
padding:10px 0 0 0;
}
-->
</style>
</head>
<body>
<div id = "connexion">
    <form action = "#" method="post">
    <h1>Connexion</h1>
    <p><label for = "pseudo">Pseudo : </label><input type="text" name="pseudo" id="pseudo" /></p>
    <p><label for = "pass">Mot de passe : </label><input type="password" name="pass" id="pass" /></p>
    <p><input type="submit" value="Envoyer" id = "valider" /></p>
    </form>
    <p id = "message"><?php if(isset($message)) echo $message ?></p>
</div>
</body>
</html>