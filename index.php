<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Mise en ligne du fichier</title>
</head>
<body>

<a href="fichiers/"> Télécharger les fichiers </a>

<h2>Mise en ligne du code MAXIMA</h2>
<form action="upload.php" method="post" enctype="multipart/form-data">
	<label for="prenom">Prenom : </label> <input type="text" name="prenom" id ="prenom">  <br><br>
    <label for="fileToUpload">Selectionner le fichier a envoyer:</label> <input type="file" name="fileToUpload" id="fileToUpload"> <br/><br/>
    <input type="submit" value="mettre en ligne" name="submit">
</form>

</body>
</html>
