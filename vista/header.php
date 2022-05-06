<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-shopping-bag"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Grado´s <sup></sup>Shopping</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Menu</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!--Inicio Menu -->
    <?php if ($_SESSION['nivel'] == 1) { ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-truck-loading"></i>
                <span>Productos</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header ">Gestion Productos</h6>
                    <a class="collapse-item" href="inicio.php?page=producto">Lista Productos</a>
                    <a class="collapse-item" href="inicio.php?page=agregarproduc">Agregar Producto</a>
                    <hr class="divider">
                    <h6 class="collapse-header text-success">Gestion Marcas</h6>
                    <a class="collapse-item" href="inicio.php?page=marca">Lista Marcas</a>
                    <a class="collapse-item" href="inicio.php?page=agregarmarca">Agregar Marca</a>
                    <hr class="divider">
                    <h6 class="collapse-header text-info">Gestion Categorias</h6>
                    <a class="collapse-item" href="inicio.php?page=categoria">Lista Categorias</a>
                    <a class="collapse-item" href="inicio.php?page=agregarcat">Agregar Categoria</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTre" aria-expanded="true" aria-controls="collapseTre">
                <i class="fas fa-fw fa-users"></i>
                <span>Clientes</span>
            </a>
            <div id="collapseTre" class="collapse" aria-labelledby="headingTre" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header"></h6>
                    <a class="collapse-item" href="inicio.php?page=cliente">Lista Clientes</a>
                    <a class="collapse-item" href="inicio.php?page=agregarclie">Agregar Cliente</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                <i class="fas fas fa-cog"></i>
                <span>Transacciónes</span>
            </a>
            <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <h6 class="collapse-header text-success">Gestion Facturas</h6>
                    <a class="collapse-item" href="inicio.php?page=factura">Factura</a>
                    <a class="collapse-item" href="inicio.php?page=listafactu">Lista de Facturas</a>
                    <h6 class="collapse-header text-info">Gestion Compras</h6>
                    <a class="collapse-item" href="inicio.php?page=compra">Compra</a>
                    <a class="collapse-item" href="inicio.php?page=listacomp">Lista de Compras</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                <i class="fas fa-fw fa-user"></i>
                <span>Usuarios</span>
            </a>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFFour" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header"></h6>
                    <a class="collapse-item" href="inicio.php?page=usuario">Lista Usuarios</a>
                    <a class="collapse-item" href="inicio.php?page=agregarusua">Agregar Usuario</a>
                </div>
            </div>
        </li>
    <?php }
    if ($_SESSION['nivel'] == 2) { ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-truck-loading"></i>
                <span>Productos</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header ">Gestion Productos</h6>
                    <a class="collapse-item" href="inicio.php?page=producto">Lista Productos</a>
                    <a class="collapse-item" href="inicio.php?page=agregarproduc">Agregar Producto</a>
                    <hr class="divider">
                    <h6 class="collapse-header text-success">Gestion Marcas</h6>
                    <a class="collapse-item" href="inicio.php?page=marca">Lista Marcas</a>
                    <a class="collapse-item" href="inicio.php?page=agregarmarca">Agregar Marca</a>
                    <hr class="divider">
                    <h6 class="collapse-header text-info">Gestion Categorias</h6>
                    <a class="collapse-item" href="inicio.php?page=categoria">Lista Categorias</a>
                    <a class="collapse-item" href="inicio.php?page=agregarcat">Agregar Categoria</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTre" aria-expanded="true" aria-controls="collapseTre">
                <i class="fas fa-fw fa-users"></i>
                <span>Clientes</span>
            </a>
            <div id="collapseTre" class="collapse" aria-labelledby="headingTre" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header"></h6>
                    <a class="collapse-item" href="inicio.php?page=cliente">Lista Clientes</a>
                    <a class="collapse-item" href="inicio.php?page=agregarclie">Agregar Cliente</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                <i class="fas fas fa-cog"></i>
                <span>Transacciónes</span>
            </a>
            <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header text-success">Gestion Facturas</h6>
                    <a class="collapse-item" href="inicio.php?page=factura">Factura</a>
                    <a class="collapse-item" href="inicio.php?page=listafactu">Lista de Facturas</a>
                    <h6 class="collapse-header text-info">Gestion Compras</h6>
                    <a class="collapse-item" href="inicio.php?page=compra">Compra</a>
                    <a class="collapse-item" href="inicio.php?page=listacomp">Lista de Compras</a>
                </div>
            </div>
        </li>
    <?php }
    if ($_SESSION['nivel'] == 3) { ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                <i class="fas fas fa-cog"></i>
                <span>Transacciónes</span>
            </a>
            <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header text-success">Gestion Facturas</h6>
                    <a class="collapse-item" href="inicio.php?page=factura">Factura</a>
                    <a class="collapse-item" href="inicio.php?page=listafactu">Lista de Facturas</a>
                    <h6 class="collapse-header text-info">Gestion Compras</h6>
                </div>
            </div>
        </li>
    <?php } ?>
    <!-- Fin menu -->
    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Cerras Session</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!--Fin Menu  -->
<!-- End of Sidebar -->
<script>
    // console.log(url_actual,url_facturacion)
    //  var url_actual = location.href;
    // if (url_actual=='http://localhost/grados/vista/inicio.php?page=listafactu') {
    //     alert(url_actual);

    //     var url_facturacion = 'http://localhost/grados/vista/inicio.php?page=listafactu';
    //     console.log(url_actual,url_facturacion)
    //     if(url_actual != url_facturacion){

    //         alert('desea salir sin guardar?');

    //     }
    // }
</script>