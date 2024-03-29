<?php
if(!isset($reslt)){ $reslt=0; }else{ echo $reslt; }
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Grado´s Shopping</title>

    <!-- Custom fonts for this template-->
    <link href="zocal/Templateadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="zocal/Templateadmin2/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                            <div class="p-5"></div>
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido</h1>
                                    </div>
                                    <hr>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="user" id="user" class="form-control form-control-user"
                                            id="username" aria-describedby="emailHelp"
                                                placeholder="Introduzca Nombre de Usuario..." onblur="soloMayusculas('user')" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pass" class="form-control form-control-user"
                                            id="password" placeholder="Contraseña" required>
                                        </div>
                                        <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block"><span>Iniciar Session</span></button>
                                        
                                      </form>
                                        <hr>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="zocal/Templateadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="zocal/Templateadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="zocal/Templateadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="zocal/Templateadmin2/js/sb-admin-2.min.js"></script>
    <script src="zocal/lib/libreria.js"></script>

</body>

</html>