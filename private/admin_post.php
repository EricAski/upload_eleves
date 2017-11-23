<?php 
	if(isset($_POST['login'])&& isset($_POST['pwd'])&& $_POST['login'] !="" && $_POST['pwd'] !="")
	{
		$pwd = $_POST['pwd'];
		if(isset($_POST['crypt'])
			$pwd = crypt($pwd);
		$texte = $_POST['login'].":".$pwd."\n";
		$fp = fopen(".htpasswd", 'a');
		fwrite($fp, $texte);
	}
	header("Location: admin.php");
 ?>