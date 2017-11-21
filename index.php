<?php 

	date_default_timezone_set('Asia/Hong_Kong');

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Mise en ligne du fichier</title>
</head>
<body>

<a href="fichiers/"> Télécharger les fichiers </a>

<h2>Mise en ligne du code MAXIMA</h2>
<form action="upload2.php" method="post" enctype="multipart/form-data">
	<?php
	if(!isset($_COOKIE['prenom']))
	{
		echo '<label for="prenom">Prenom : </label> <input type="text" name="prenom" id ="prenom">  <br><br>
		<label for="prenom_verif">Vérification du prénom : </label> <input type="text" name="prenom_verif" id ="prenom_verif">  <br><br>';
	}
	else
	{
		echo "<p> <strong> Votre prénom </strong> : ".$_COOKIE['prenom']."</p>";
	}
	
	?>
    <label for="fileToUpload">Selectionner le fichier a envoyer:</label> <input type="file" name="fileToUpload" id="fileToUpload"> <br/><br/>
    <input type="submit" value="mettre en ligne" name="submit">
    <?php 
	if(!isset($_COOKIE['prenom']))
		echo "<p> <strong>Attention ! </strong> Vous ne pourrez plus changer de nom ultérieurement !</p>";
    ?>
    
</form>

</body>
</html>
