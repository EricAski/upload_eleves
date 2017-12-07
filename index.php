<?php 

	date_default_timezone_set('Asia/Hong_Kong');

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Mise en ligne du fichier</title>

   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/centering.css" rel="stylesheet">

</head>
<body>

<div class = "center_div">

	<div class = "logo">
		<img src="logo.png" alt="Logo du speit" width = 25%>
	</div>

	<br/><br/>

	<?php $fichiers_dossier = scandir("fichiers");

	// On affiche le dossier des fichiers si et seulement si il y a des images à télécharger
	// "> 3" pour ne pas compter . et .. et "index.php"
	if (count($fichiers_dossier) > 3)
	{
		echo '<a href="fichiers/"> Télécharger les fichiers </a>';
	} ?>

	<br/><br/>

	<h2>Mise en ligne des fichiers</h2>


	<form action="upload.php" method="post" enctype="multipart/form-data">

	<table class = "center_table">
		<tr>
		<?php
		if(!isset($_COOKIE['prenom']))
		{
			echo '<td> <label for="prenom">Prenom : </label> </td> <td><input type="text" name="prenom" id ="prenom"> </td></tr>    <tr><td> &nbsp;&nbsp;</td></tr>      
			<tr><td><label for="prenom_verif">Vérification du prénom : </label> </td><td><input type="text" name="prenom_verif" id ="prenom_verif"> </td>';
		}
		else
		{
			echo "<td><strong> Votre prénom </strong> : </td> <td> ".$_COOKIE['prenom']."</td> ";
		}
		
		?>
		</tr>
		<tr><td> &nbsp;&nbsp;</td></tr>
	    <tr>
	    <td><label for="fileToUpload">Selectionner le fichier a envoyer : </label> </td>
	    <td><input type="file" name="fileToUpload" id="fileToUpload"> </td>
	    </tr>
		</table>
	    <br/><br/>
	    <input type="submit" value="Mettre en ligne" name="submit">
	    <?php 
		if(!isset($_COOKIE['prenom']))
			echo "<br/> <br/><p> <strong>Attention ! </strong> Vous ne pourrez plus changer de nom ultérieurement !</p>";
	    ?>
	    
	</form>

</div>

</body>
</html>
