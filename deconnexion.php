<?php    
if(isset($_COOKIE['prenom']))
{
        setcookie('prenom', '', time()-7000000, '/');
        echo "C'est bon !" ;
}
else
{
	echo "Rien a supprimer.";
}

?>