<?php    
if(isset($_COOKIE['prenom']))
{
        setcookie('prenom', '', time()-7000000, '/');
}
header("Location:../index.php");
?>