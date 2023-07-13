<!DOCTYPE html>
<?php $user = current_user(); ?>
  <html lang="es">
    <head>
    <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Esta pagina es del sistema de seguridad INSEEL">
  <meta name="author" content="INSEEL">

    <title><?php if (!empty($page_title))
           echo remove_junk($page_title);
            elseif(!empty($user))
           echo ucfirst($user['correo']);
            else echo "Sistema inseel";?>
    </title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 
  </head>

<body id="page-top">
 <audio id="chatAudio" > 
<!--  <source src="alarm-clock.mp3" type="audio/mpeg">-->
        <source src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20190531135120/beep.mp3" 
        type="audio/mpeg"> 
    </audio> 

  <!-- Page Wrapper -->
  <?php  if ($session->isUserLoggedIn(true)): ?>
  <div id="wrapper">   
      <?php if($user['user_level'] === '1'): ?>
        <!-- admin menu -->
      <?php include_once('admin_menu.php');?>
      <?php elseif($user['user_level'] === '2' || $user['user_level'] === '3'): ?>
        <!-- Special user -->
      <?php include_once('special_menu.php');?>
      <?php elseif($user['user_level'] === '4'): ?>
        <!-- User menu -->
      <?php include_once('user_menu.php');?>
      <?php endif;?> 

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">

    <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Search -->
       <!--   <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
-->
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
				<?php 
				 $hub_id=$_SESSION['hub'];
				 $all_historico = find_all_historico2($hub_id);
                 $historico=count_by_id2('historico',$hub_id);				
            echo "
            <li class='nav-item dropdown no-arrow mx-1'>
              <a class='nav-link dropdown-toggle' href='#' id='alertsDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <i class='fas fa-bell fa-fw'></i>
                <!-- Counter - Alerts -->
                <span class='badge badge-danger badge-counter'>";
				if ($historico['total']>0)
				echo $historico['total']."+</span>";
				else 
				echo "</span>";
              echo"</a>
              <!-- Dropdown - Alerts -->
              <div class='dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in' aria-labelledby='alertsDropdown'>
                <h6 class='dropdown-header'>
                  Alertas
                </h6>

			  ";
			  foreach($all_historico as $a_historico):
			  echo "
                <a class='dropdown-item d-flex align-items-center' href='historico.php'>
                  <div class='mr-3'>";
				  if($a_historico['id_notificacion']==1){
$mensaje="se activo:  ".$a_historico['fecha']."  la accion:  ".$a_historico['accion'];
echo" <script type='text/javascript'>
   var audio = document.getElementById('chatAudio'); 
   audio.addEventListener('ended', showAlert);
   audio.loop=true
   audio.play() 
   
function showAlert() {
    alert('$mensaje');
}
      </script>
	<div class='icon-circle bg-danger'>
                      <i class='fas fa-exclamation-triangle text-white'></i>
					  </div>$mensaje ";
					  
				  }
				  if($a_historico['id_notificacion']==2){
                   echo"<div class='icon-circle bg-warning'>
                      <i class='fas fa-exclamation-circle text-white'></i>
					  </div>";					  					  
				  
				  }
				  if($a_historico['id_notificacion']==3){
                   echo"<div class='icon-circle bg-primary'>
                      <i class='fas fa-file-alt  text-white'></i>
					  </div>";					  					  
				  }				  
                  echo"  
                  </div>
                  <div>
                    <div class='small text-gray-500'>".$a_historico['fecha']."</div>
                    <span class='font-weight-bold'>".$a_historico['accion']."</span>
                  </div>
                </a>
            ";
           endforeach;
				?>
                <a class='dropdown-item text-center small text-gray-500' href='historico.php'>Mostrar todas las Alertas</a>
              </div>
</li>
			
            <!-- Nav Item - Messages -->
<!--            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
-->
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo remove_junk(ucfirst($user['correo'])); ?></span>
                <img class="img-profile rounded-circle" src="uploads/usuarios/<?php echo $user['image'];?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="edit_account.php">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Configuracion
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->






<?php endif;?>
<?php 
$data=count_historico($_SESSION['hub']);
$_SESSION['dato']=$data['total'];
echo"<script>
setInterval('comprobar_refresco(".$_SESSION['dato'].")', 1000);

function comprobar_refresco( texto ) {
  $.ajax({
    type: 'POST',
    url: 'comprobar_refresco.php',
	data: {texto:texto},
    success: function(resultado){
    if (resultado.indexOf('REFRESCAR') > -1) {
      location.reload();
    }
	}
  });

}
	</script>";
	

?>

  <div class="container-fluid">




