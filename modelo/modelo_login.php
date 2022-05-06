
<?php
include_once("utilidades.class.php");
class Model {
    function getlogin($user, $pass, $con)
{
// Busqueda en base de datos
if(isset($user) && isset($pass)){

    $sql="SELECT * FROM tbl_usuarios WHERE usua_login='$user' and usua_clave='$pass' ";
    $registros=$con->query($sql);
    $result=$registros->fetch_assoc();
    //$result2=$result['usuario'];

if($result['usua_login']==$user && $result['usua_clave']==$pass){
    session_start(); //Arranca la sesión del sitio
    $_SESSION["id_session"] = session_id(); //Agrega al array de sesión el ID de sesión
	$_SESSION['user'] = $result['usua_login']; //Agrega el array del usuario a la sesión para que exista en cada script del sitio
    $_SESSION['nivel'] = $result['fk_tipousua'];
    $_SESSION['id'] = $result['usua_id'];
return 'login';

}
else{
return "<script> alert('!!Usuario o Conteraseña Incorrecta¡¡'); </script>";
}
}
}// Fin Funcion login
}
?>
