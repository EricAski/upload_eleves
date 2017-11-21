<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Page mise en ligne</title>
</head>
<body>

<?php
$target_dir = "uploads/";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

// Verifie si le prénom est bien rentré
if( $_POST["prenom"] != "")  {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
       ?>  <strong><?php echo "Il faut preciser un prenom !"; ?></strong><br/><br/> <?php
    }

// Verifie que le fichier a bien été précisé
if ($_FILES["fileToUpload"]["size"] < 1) {
     ?>  <strong><?php echo "Il faut préciser le fichier à metter en ligne. "; ?></strong><br/> <?php
    $uploadOk = 0;
}


// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {
     ?>  <strong><?php echo "Ce fichier est beaucoup trop lourd. "; ?></strong><br/> <?php
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    ?>  <h2 style="color : red"><strong><?php echo "Le fichier n'a pas été mis en ligne. Vérifiez que vous avez bien rentré votre prénom et séléctionné le fichier."; ?></strong></h2><br/> <?php
// if everything is ok, try to upload file
} 
else {

	if (!file_exists($target_dir . $_POST["prenom"])) {

    mkdir($target_dir . $_POST["prenom"], 0777, true);
    // touch($target_dir . $_POST["prenom"] . "/index.php");
    $myfile = fopen($target_dir . $_POST["prenom"]."/index.php", "w") or die("Unable to open file!");
	fwrite($myfile, " ");
	fclose($myfile);
	}

	$target_file = $target_dir . $_POST["prenom"] . "/" . basename($_FILES["fileToUpload"]["name"]);


    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        ?> <strong style="color : green"><?php echo "Le fichier : ". basename( $_FILES["fileToUpload"]["name"]). " a ete mis en ligne."; ?> </strong> <?php
    } else {
        echo "Il y a eu une erreur technique";
    }
}
?>



</body>
</html>
