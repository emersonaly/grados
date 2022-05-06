
<?php
include_once("modelo/modelo_login.php");
class Controller {
public $model;
public function __construct()
    {
        $this->model = new Model();
    }
public function invoke()
{
    if (isset($_POST['submit']) ) {
    $login = new Utilidades();
    $con = $login->conexion();
    $reslt = $this->model->getlogin($_REQUEST['user'],$_REQUEST['pass'],$con); // it call the getlogin() function of model class and store the return value of this function into the reslt variable.
    if($reslt == 'login')
    {
        header('Location:vista/inicio.php'); //Redirige hasta este archivo
    }else
    {
    include 'vista/login/login.php';
    }
}else
    {
    include 'vista/login/login.php';
    }


}//Fin Funcion
}
?>
