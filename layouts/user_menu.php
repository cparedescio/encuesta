<?php 
$dispositivos=count_by_id('dispositivo');
$particiones=count_by_id('particiones');
$historico=count_by_id('historico');
$usuario=count_by_id('usuarios');

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
          <span>hub </span></a>
      </li>
 <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseuser" aria-expanded="true" aria-controls="collapseuser">
          <i class="fas fa-fw fa-user"></i>
          <span>Usuarios </span><span class="badge badge-light"><?php echo $usuario['total']; ?></span>
        </a>

        <div id="collapseuser" class="collapse" aria-labelledby="headinguser" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Usuarios:</h6>
            <a class="collapse-item" href="add_user.php">Agregar nuevo </a>
            <a class="collapse-item" href="users.php">Modificar o eliminiar</a>
          </div>
        </div>
      </li>

<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepar" aria-expanded="true" aria-controls="collapsepar">
          <i class="fas fa-fw fa-plug"></i>
          <span>Particiones </span><span class="badge badge-light"><?php echo $particiones['total']; ?></span>
        </a>

        <div id="collapsepar" class="collapse" aria-labelledby="headingdis" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Particiones:</h6>
            <a class="collapse-item" href="add_particiones.php">Agregar Nueva Particion</a>
            <a class="collapse-item" href="dispositivos.php">Modificar o eliminiar</a>
          </div>
        </div>
      </li>

 <?php if ($particiones['total']>0){
	 echo"
 
 <li class='nav-item'>
        <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapsedis' aria-expanded='true' aria-controls='collapsedis'>
          <i class='fas fa-fw fa-plug'></i>
          <span>Dispositivos </span><span class='badge badge-light'>".$dispositivos['total']."</span>
        </a>

        <div id='collapsedis' class='collapse' aria-labelledby='headingdis' data-parent='#accordionSidebar'>
          <div class='bg-white py-2 collapse-inner rounded'>
            <h6 class='collapse-header'>Dispositivos:</h6>
            <a class='collapse-item' href='add_dispositivos.php'>Agregar Nuevo</a>
            <a class='collapse-item' href='dispositivos.php'>Modificar o eliminiar</a>
            <a class='collapse-item' href='ver.php'>Dashbord</a>
          </div>
        </div>
      </li> ";
 }
	  ?>

      <li class="nav-item active">
        <a class="nav-link" href="historico.php">
          <i class="fas fa-clipboard-list"></i>
          <span>Historico</span><span class="badge badge-light"><?php echo $historico['total']; ?></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="chat.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Chat</span></a>
      </li>


      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>


