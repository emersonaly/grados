<?php
	session_start(); //Se arranca la sesión o continúa la misma
	if (!(array_key_exists("id_session", $_SESSION)) || ($_SESSION["id_session"]!=session_id())) //Verifica si esas claves de array existen en SESSION
	{
		echo "<h1>No ha iniciado sesión...</h1><br>";
		}
	else
	{

require_once("../modelo/producto.class.php");
require_once("../modelo/marca.class.php");
require_once("../modelo/categoria.class.php");
require_once("../modelo/cliente.class.php");
require_once("../modelo/usuario.class.php");
require_once("../modelo/ingreso.class.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">


    <title>Grado'S Shopping</title>

    <!-- Custom fonts for this template-->
    <link href="../zocal/lib/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <link href="../zocal/Templateadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../zocal/Templateadmin2/css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="../zocal/Templateadmin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="../zocal/lib/select2/dist/css/select2.min.css" rel="stylesheet"/>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Se Carga El menu  -->
        <?php    include 'header.php'; ?>   


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php  echo "Bienvenido: ".$_SESSION['user']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../zocal/Templateadmin2/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    
    <?php

    switch (@$_GET['page'])
             {
        //producto
        case "producto": include("producto/listar_producto.php"); break;
        case "agregarproduc": include("producto/agregar_producto.php"); break;
        case "editar_produc": include("producto/editar_producto.php"); break;
        //marca
        case "marca": include("marca/listar_marca.php"); break;
        case "agregarmarca": include("marca/agregar_marca.php"); break;
        case "editar_marca": include("marca/editar_marca.php"); break;
        //categoria
        case "categoria": include("categoria/listar_catego.php"); break;
        case "agregarcat": include("categoria/agregar_catego.php"); break;
        case "editar_catego": include("categoria/editar_catego.php"); break;
        //cliente
        case "cliente": include("cliente/listar_cliente.php"); break;
        case "agregarclie": include("cliente/agregar_cliente.php"); break;
        case "editar_clie": include("cliente/editar_cliente.php"); break;
        //transacción
        case "factura": include("transacciones/agregar_factura.php"); break;
        case "listafactu": include("transacciones/lista_factura.php"); break;

        // trnsac compras
        case "compra": include("transacciones/agregar_compra.php"); break;
        case "listacomp": include("transacciones/lista_compra.php"); break;
        //Usuario
        case "usuario": include("usuario/listar_usuarios.php"); break;
        case "agregarusua": include("usuario/agregar_usuario.php"); break;
        case "editar_usua": include("usuario/editar_usuario.php"); break;

  	 default: include("default.php");

    }  
    ?>

                    

                            <!-- Approach -->
                            <!-- <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                </div>
                                <div class="card-body">
                                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                        CSS bloat and poor page performance. Custom CSS classes are used to create
                                        custom components and custom utility classes.</p>
                                    <p class="mb-0">Before working with this theme, you should become familiar with the
                                        Bootstrap framework, especially the utility classes.</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div> -->
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿List@ para salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login/logout.php">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../zocal/Templateadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="../zocal/Templateadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../zocal/Templateadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../zocal/Templateadmin2/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
    <script src="../zocal/Templateadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../zocal/Templateadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../zocal/lib/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="../zocal/Templateadmin2/js/demo/datatables-demo.js"></script>
        <script src="../zocal/lib/popper.min.js"></script>
        <script src="../zocal/lib/libreria.js"></script>
        <script src="../zocal/lib/select2/dist/js/select2.min.js"></script>
</body>

</html>
<?php } ?>