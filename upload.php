<?php 

date_default_timezone_set('Asia/Hong_Kong');



// On extrait la valeur de l'ancien cookie dans "cookie_old"
$cookie_old = "";
$prenom = "";
$erreurVerif = true;

if(isset($_COOKIE['prenom']))
	$erreurVerif = false;


if(isset($_POST["submit"]) && isset($_POST["prenom"]) && isset($_POST["prenom_verif"]) && $_POST["prenom"]  != ""   && !isset($_COOKIE["prenom"])  )
{
	$prenom = strtolower($_POST["prenom"]);
	$prenom_verif = strtolower($_POST["prenom_verif"]);
	if($prenom == $prenom_verif)
	{
		
		$erreurVerif= false;
		setcookie("prenom", $prenom, time() + (86400), "/"); // Cookie prénom valable 1 jour
	}
}
?>



<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Page mise en ligne</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/centering.css" rel="stylesheet">

</head>
<body>

<div class="center_div">
	<?php
	$warning = "";
	if(isset($_POST["submit"])) 
	{
		$target_dir = "uploads/";
		$uploadOk = 1;
		if(isset($_COOKIE['prenom']))
			$prenom = $_COOKIE['prenom'];
		else
			$prenom = strtolower($_POST["prenom"]);
    // Verifie si le prénom est bien rentré
		if($prenom != "" && !$erreurVerif)  
		{
			$uploadOk = 1;
		}
		else if(!$erreurVerif)
		{
			$uploadOk = 0;
			?>  <p><strong><?php echo "Il faut preciser un prenom !"; ?></strong><br/><br/> </p><?php
		}
		else
		{
			$uploadOk = 0;
		}

	} 
	else 
	{
		$uploadOk = 0;
	}
// Verifie que le fichier a bien été précisé
	if ($_FILES["fileToUpload"]["size"] < 1) {
		?>  <P><strong><?php echo "Il faut préciser le fichier à metter en ligne. "; ?></strong><br/></p> <?php
		$uploadOk = 0;
	}
// Check file size
	if ($_FILES["fileToUpload"]["size"] > 10000000) {
		?>  <p><strong><?php echo "Ce fichier est beaucoup trop lourd. "; ?></strong><br/></p> <?php
		$uploadOk = 0;
	}
	if($erreurVerif)
		echo "<p> <strong> Les prenoms ne concordent pas </strong></p>";
// On regarde s'il y a eu un problème
	if ($uploadOk == 0) {
		?>  <h2 style="color : red"><strong><?php echo "Le fichier n'a pas été mis en ligne."; ?></strong></h2><br/> <?php
// S'il n'y a pas eu de problèmes on essaie de mettre en ligne le fichier
	} 
	else {
		if (!file_exists($target_dir . $prenom)) 
		{
			mkdir($target_dir . $prenom, 0777, true);
	    // touch($target_dir . $_POST["prenom"] . "/index.php");
			$myfile = fopen($target_dir . $prenom ."/index.php", "w") or die("Unable to open file!");
			fwrite($myfile, " ");
			fclose($myfile);
		}
		
		$texte = "Enregistrement de : ". basename( $_FILES["fileToUpload"]["name"]) . " a : ".date(' G:i:s')." par : " . $_SERVER['REMOTE_ADDR'] . "<br />";
		// On ajoute le contenu de "texte" dns le fichier index de l'utilisateur
		$data = $texte.PHP_EOL;
		$fp = fopen($target_dir . $prenom ."/index.php", 'a');
		fwrite($fp, $data);


		$current_date = date('G_i_s');
		

		$file_name =  pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_FILENAME);
		$extension_name = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
		$standard_name = $file_name."_".$current_date.".".$extension_name;
		$target_file = "uploads/" . $prenom . "/"  . $standard_name;


		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
		{
			?> 
			<strong style="color : green"> <?php echo "Le fichier : ". basename( $_FILES["fileToUpload"]["name"]). " a été mis en ligne."; ?> </strong>

			<?php
		}
		else 
		{
			echo "<p>Il y a eu une erreur technique</p>";
		}

		if (!file_exists($target_dir . "versionsfinales")) 
		{
			mkdir($target_dir ."versionsfinales", 0777, true);
		}

		$final_name = $prenom.".".$extension_name;
		$target_final = "uploads/versionsfinales/".$final_name;
		if (!copy($target_file,$target_final)) 
		{
			echo "<p>Il y a eu une erreur technique</p>";
		}
		

		
	}
	?>

	<br/><br/><br/>

	<p><a href="index.php">Retourner à la page précédente</a></p>


</div>

</body>
</html>
