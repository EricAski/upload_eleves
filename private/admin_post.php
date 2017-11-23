<?php 
	if(isset($_POST['delete']))
	{
		$htpwd = fopen('.htpasswd', 'w');
		fseek($htpwd, 0); // On remet le curseur au début du fichier
		fputs($htpwd, "root:root\n"); // On écrit le seul utilisateur root 
		fclose($htpwd);
	}

	if(isset($_POST['login'])&& isset($_POST['pwd'])&& $_POST['login'] !="" && $_POST['pwd'] !="")
	{
		$pwd = $_POST['pwd'];
		if(isset($_POST['crypt']))
			$pwd = crypt($pwd);
		$texte = $_POST['login'].":".$pwd."\n";
		$fp = fopen(".htpasswd", 'a');
		fwrite($fp, $texte);
	}
	header("Location: admin.php");
 ?>