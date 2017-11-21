<?php 
// On extrait la valeur de l'ancien cookie dans "cookie_old"
$cookie_old = "";
$prenom = "";
if(isset($_POST["submit"]) && $_POST["prenom"] != "")
{
	$prenom = strtolower($_POST["prenom"]);
	if(isset($_COOKIE["prenom"]) )
	{
		$cookie_old = $_COOKIE["prenom"];
	}
	// Cookie prénom valable 1 jour
	setcookie("prenom", $prenom, time() + (86400 * 30), "/");
}
?>



<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Page mise en ligne</title>
</head>
<body>

<?php
$warning = "";
if(isset($_POST["submit"])) 
{
	$target_dir = "uploads/";
    $uploadOk = 1;
    $prenom = strtolower($_POST["prenom"]);
    // Verifie si le prénom est bien rentré
	if($prenom != "")  
	{
	        $uploadOk = 1;
	}
	else 
	{
	        $uploadOk = 0;
	       ?>  <strong><?php echo "Il faut preciser un prenom !"; ?></strong><br/><br/> <?php
	}
	
} 
    else 
{
        $uploadOk = 0;
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
	if (!file_exists($target_dir . $prenom)) 
	{
	    mkdir($target_dir . $_POST["prenom"], 0777, true);
	    // touch($target_dir . $_POST["prenom"] . "/index.php");
	    $myfile = fopen($target_dir . $prenom ."/index.php", "w") or die("Unable to open file!");
		fwrite($myfile, " ");
		fclose($myfile);
	}
	$texte = "";
	if($cookie_old != "")
	{
		// Si le prenom a changé entre les deux uploads
		if($cookie_old != $prenom)
		{
			$warning = "WARNING";
			$texte = "WARNING : Ancien nom : " . $prenom;
		}
		else
		{
			$texte = "Ancien nom : " . $prenom;
		} 
	}
	else
	{
		$texte = "Premier enregistrement de l'utilisateur";
	}
	// On ajoute le contenu de "texte" dns le fichier index de l'utilisateur
	//$data = $texte.PHP_EOL;
	//$fp = fopen($target_dir . $prenom ."/index.php", 'a');
	//fwrite($fp, $data);
	$target_file = "uploads/" . $prenom . "/" . $warning . basename($_FILES["fileToUpload"]["name"]);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
    {
        ?> 
        <strong style="color : green"> <?php echo "Le fichier : ". basename( $_FILES["fileToUpload"]["name"]). " a été mis en ligne."; ?> </strong>

   <?php
	}
    else 
    {
        echo "Il y a eu une erreur technique";
    }
}
?>



</body>
</html>
