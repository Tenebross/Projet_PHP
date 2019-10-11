<ul class="menu">
  <li><a href="page_acceuil.php">Acceuil</a></li>
  <li><a href="formulaire.php">Candidature</a></li>
  <li><a href="a_propos.php">A Propos</a></li>
</ul>

<form action="page_acceuil.php" method="post">
  <label for="identifiant">Identifiant :</label>
  <input type="text" name="identifiant" id="identifiant" placeholder="Votre identifiant">
  <label for="password"><br>Mot de passe :</label>
  <input type="text" name="password" id="password" placeholder="Votre mot de passe">
  <input type="submit" name="action" value="Confirmer">
  <br>
  <a href="createUser.php">Si vous n'êtes pas encore Inscrit</a>
  
</form>