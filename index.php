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

<?php $fichiers_dossier = scandir("fichiers");

// On affiche le dossier des fichiers si et seulement si il y a des images à télécharger
// "> 3" pour ne pas compter . et .. et "index.php"
if (count($fichiers_dossier) > 3)
{
	echo '<a href="fichiers/"> Télécharger les fichiers </a>';
} ?>

<h2>Mise en ligne des fichiers</h2>
<form action="upload.php" method="post" enctype="multipart/form-data">
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
