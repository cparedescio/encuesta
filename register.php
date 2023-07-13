<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registro</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
<?php
  $page_title = 'Registro de  usuarios';
  require_once('includes/load.php');
?>
<?php 
  if(isset($_POST['add_user'])){
$existe=find_u($_POST['username'],$_POST['correo']);
if($existe!=null){
     $session->msg('d', 'Ya existe un usuario con ese correo o nombre');
      redirect('register.php',false);	
  }
   $req_fields = array('username','password','correo','telefono' );
   validate_fields($req_fields);
if ($db->escape($_POST['password2'])!=$db->escape($_POST['password'])){
     $session->msg('d', 'los password no son iguales');
      redirect('register.php',false);	
}else{
   if(empty($errors)){
       $username   = remove_junk($db->escape($_POST['username']));
       $correo   = remove_junk($db->escape($_POST['correo']));
       $telefono   = remove_junk($db->escape($_POST['telefono']));
       $password   = remove_junk($db->escape($_POST['password']));
       $password = sha1($password);
        $query = "INSERT INTO usuarios (";
        $query .="username,correo,telefono,password";
        $query .=") VALUES ('";
        $query .="'{$username}','{$correo}','{$telefono}', '{$password}'";
        $query .=")";
         
 if($db->query($query)){
          //sucess
          $session->msg('s'," Cuenta de usuario ha sido creada favor de autentificar su correo");
          redirect('login.php', false);
} else {
          //failed
          $session->msg('d',' No se pudo crear la cuenta.');
          redirect('register.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('register.php',false);
   }
  }
  }
?>
  <?php 
  echo display_msg($msg); ?>
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Encuesta</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                <h1 class="h4 text-gray-900 mb-4">Crear cuenta!</h1>
                    <p class="text-center small">Por favor agrega tus datos</p>
                  </div>

               <form method="post" action="register.php">
                    <div class="col-12">
                      <label for="yourName" class="form-label">tu Nombre</label>
                    <input type="text" name="username" class="form-control form-control-user" id="exampleFirstName" placeholder="Nombre Completo">
                      <div class="invalid-feedback">Por favor,Agrega tu nombre</div>
                    </div>
                    <div class="col-12">
                      <label for="yourtelefono" class="form-label">tu telefono</label>
                    <input type="text" name="telefono" class="form-control form-control-user" id="exampleLastName" placeholder="Telefono">
                      <div class="invalid-feedback">Por favor,Agrega tu telefono</div>
                    </div>




                    <div class="col-12">
                      <label for="yourEmail" class="form-label">tu Email</label>
                  <input type="email"  name="correo" class="form-control form-control-user" id="exampleInputEmail" placeholder="Correo">
                      <div class="invalid-feedback">Por favor,Agrega tu  Direccion de Email !</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nombre de Usuario</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Por favor, elige un nombre de usuario.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                      <div class="invalid-feedback">Por favor, Agrega tu password!</div>
                    </div>
                    <div class="col-12">
                    <input type="password" name="password2" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repetir Password">
                      <div class="invalid-feedback">Verifica tu password</div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Enviar</label>
                    </div>
 

                    <div class="col-12">
             <button type="submit" name="add_user" class="btn btn-primary btn-user btn-block">Registrar Cuenta</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Ya tengo una cuenta ? <a href="Login.php">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
