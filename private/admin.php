
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Admin</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/centering.css" rel="stylesheet">

</head>
<body>
	<div class = center_div>
		<h1> Page d'administration</h1>
		<form action="admin_post.php" method="post" >
			<h3>Ajout d'un utilisateur</h3>
			<table class = center_table>
				<tr><td><label for="login">Login : </label></td><td>&nbsp;</td><td><input type="text" name="login" id=login></td></tr>
				<tr><td> &nbsp;&nbsp;</td></tr>
				<tr><td><label for="pwd">Mot de passe :</label></td><td>&nbsp;&nbsp;&nbsp;</td><td><input type="text" name="pwd" id=pwd></td></tr>
			</table>
			<br/>
			<label for="crypt">Crypter le mot de passe : &nbsp;&nbsp;</label><input type="checkbox" name="crypt" id="crypt">
			<br/> <br/>
			<input type="submit" value="Ajouter" name="submit">
		</form>

		<form action="admin_post.php" method="post" >
			<h3>Suppression des utilisateurs</h3>
			<p><input type="submit" value="Supprimer les utilisateurs" name="delete"> <br/> </p>
			<p> <strong>Attention ! </strong> Cette action est irréversible !</p>
		</form>

	</div>
</body>