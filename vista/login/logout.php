<?php 
    session_start();
    session_unset();
    // Borra todas las variables de sesión 
$_SESSION = array();
print_r($_COOKIE);
// Borra la cookie que almacena la sesión 
if(isset($_COOKIE[session_name()]))
{
	setcookie(session_name(), '', time() - 42000, '/');
}
if(isset($_COOKIE['PHPSESSID']))
{ 
	setcookie("PHPSESSID",'',time());
}
// Finalmente, destruye la sesión
    session_destroy();

    header("location:../../index.php");
?>