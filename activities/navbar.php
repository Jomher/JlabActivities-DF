                <!--Navbar green>
                <nav class="navbar navbar-toggleable-md navbar-dark purple-gradient fixed-top">
                    <div class="container">
                        <a class="navbar-brand" href="index.php">
                            <IMG SRC="JLAB.ico" align='center' width="16%"><strong> JLab C.R.M.</strong>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav3" aria-controls="navbarNav3" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav3">
                            <ul class="navbar-nav ml-auto">
                                <a class="nav-link waves-effect waves-light" href="index.php?p=perfil"><i class="fa fa-gear"></i> Cambiar Contraseña</a>
                                <a class="nav-link waves-effect waves-light" href="index.php?p=clientes"><i class="fa fa-users"></i> Clientes</a>
                            </ul>    
                            <ul class="navbar-nav ml-auto">
                            <a class="nav-link waves-effect waves-light" href="salir.php"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>
                          <!--li class="nav-item dropdown btn-group">
                    <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Cerrar Sesión</a>
                    <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item" href="empresas.php">Seleccionar Empresa</a>
          				<a class="dropdown-item" href="salir.php">Salir</a>
                    </div>
                </li>
                            </ul>
                        </div>
                    </div>
                </nav-->


                <!--Navbar-->
<nav class="navbar navbar-toggleable-md navbar-dark purple-gradient fixed-top">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="index.php">
  <IMG SRC="JLAB.ico" width="39">
  <!-- <strong>  JLab </strong> -->
  </a>

  <!-- Collapse button -->
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Principal
          <span class="sr-only">(current)</span>
        </a>
      </li>

      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Actividades</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="index.php?p=cal">Actividades Pendientes</a>
          <a class="dropdown-item" href="index.php?p=cal2">Actividades Finalizadas</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Clientes y Sucursales</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="index.php?p=JLAB_FrmClientes">Agregar Clientes</a>
          <a class="dropdown-item" href="index.php?p=listadoclientes">Listado de Clientes</a>
          <a class="dropdown-item" href="index.php?p=JLAB_FrmSucursales">Agregar Sucursal o Tienda</a>
          <a class="dropdown-item" href="index.php?p=listadosucursales">Listado de Sucursales</a>
          <!-- <a class="dropdown-item" href="index.php?p=registrar">Agregar Cliente</a> -->
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Trabajadores</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="index.php?p=listadotrabajador">Listado Trabajadores</a>
          <a class="dropdown-item" href="index.php?p=trabajador">Agregar Trabajador</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Estados</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="index.php?p=listadoestados">Listado Estados</a>
          <a class="dropdown-item" href="index.php?p=mantenimientoestado">Agregar Estado</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Vehiculos</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="index.php?p=listadovehiculos">Listado Vehículos</a>
          <a class="dropdown-item" href="index.php?p=Vehiculos">Agregar Vehículos</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Reportes</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="index.php?p=reporteDFCuentas">Reporte Cuentas</a>
          <a class="dropdown-item" href="index.php?p=reporteDFAct">Reportes Actividades</a>
        </div>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">JER</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="index.php?p=JER_FormInforme">Crear Informes</a>
          <a class="dropdown-item" href="index.php?p=JER_FormRubros">Crear Rubros</a>
          <a class="dropdown-item" href="index.php?p=JER_FormCuentasRubros">Crear Cuentas Rubros</a>
 
        </div>
      </li> -->


    </ul>
    <!-- Links -->

    <ul class="navbar-nav ml-auto">
    <a class="nav-link waves-effect waves-light" href="index.php?p=perfil"><i class="fa fa-gear"></i> Cambiar Contraseña</a>
    <a class="nav-link waves-effect waves-light" href="salir.php"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>
    </ul>
  
  </div>
  <!-- Collapsible content -->

</nav>