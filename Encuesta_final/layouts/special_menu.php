<?php 
$hub=count_by_id('hub');
$backup=count_by_id('backup');
$usuario=count_by_id('usuarios');
$zonas=count_by_id('zonas');
$modulos=count_by_id('modulos');
$dispositivos=count_by_id('dispositivo');
$mensajes=count_by_id('mensajes');
$historico=count_by_id('historico');
?>
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-shield-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sistema - INSEEL </div>
      </a>
      <hr class="sidebar-divider my-0">

      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
      </li>
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Administracion
      </div>
      <li class="nav-item active">
        <a class="nav-link" href="Registro_hub.php">
          <i class="fas fa-fw fa-charging-station"></i>
          <span>hubs </span><span class="badge badge-light"><?php echo $hub['total']; ?></span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="Registro_hub.php" data-toggle="collapse" data-target="#collapsehub" aria-expanded="true" aria-controls="collapsehub">
          <i class="fas fa-fw fa-cog"></i>
          <span>Respaldo </span><span class="badge badge-light"><?php echo $backup['total']; ?></span>
        </a>

        <div id="collapsehub" class="collapse" aria-labelledby="headinghub" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Respaldo:</h6>
            <a class="collapse-item" href="Backup.php">Backup</a>
            <a class="collapse-item" href="Respaldo.php">Respaldo</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">

 <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseuser" aria-expanded="true" aria-controls="collapseuser">
          <i class="fas fa-fw fa-user"></i>
          <span>Usuarios </span><span class="badge badge-light"><?php echo $usuario['total']; ?></span>
        </a>

        <div id="collapseuser" class="collapse" aria-labelledby="headinguser" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Usuarios:</h6>
            <a class="collapse-item" href="add_user.php">Agregar nuevo </a>
            <a class="collapse-item" href="select_hub.php?bandera=usuario">Modificar o eliminiar</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
 <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesensor" aria-expanded="true" aria-controls="collapsesensor">
          <i class="fas fa-fw fa-concierge-bell"></i>
          <span>Zonas </span><span class="badge badge-light"><?php echo $zonas['total']; ?></span>
        </a>

        <div id="collapsesensor" class="collapse" aria-labelledby="headingsensor" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Zonas:</h6>
            <a class="collapse-item" href="add_zonas.php">Agregar Nuevo</a>
            <a class="collapse-item" href="zonas.php">Modificar o eliminiar</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">

 <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsemodulo" aria-expanded="true" aria-controls="collapsemodulo">
          <i class="fas fa-fw fa-microchip"></i>
          <span>Modulos </span><span class="badge badge-light"><?php echo $modulos['total']; ?></span>
        </a>

        <div id="collapsemodulo" class="collapse" aria-labelledby="headingmodulo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Modulos:</h6>
            <a class="collapse-item" href="add_modulos.php">Agregar Nuevo</a>
            <a class="collapse-item" href="modulos.php">Modificar o eliminiar</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">

 
 <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedis" aria-expanded="true" aria-controls="collapsedis">
          <i class="fas fa-fw fa-plug"></i>
          <span>Dispositivos </span><span class="badge badge-light"><?php echo $dispositivos['total']; ?></span>
        </a>

        <div id="collapsedis" class="collapse" aria-labelledby="headingdis" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Dispositivos:</h6>
            <a class="collapse-item" href="add_dispositivos.php">Agregar Nuevo</a>
            <a class="collapse-item" href="select_hub.php?bandera=dispositivo">Modificar o eliminiar</a>
            <a class="collapse-item" href="ver.php">Dashbord</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="mensajes.php">
          <i class="fas fa-fw fa-inbox"></i>
          <span>Mensajes</span><span class="badge badge-light"><?php echo $mensajes['total'];?></span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="select_hub.php?bandera=historico">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Historico</span><span class="badge badge-light"><?php echo $historico['total']; ?></span></a>
      </li>


      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>




