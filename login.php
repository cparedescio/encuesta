<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pages / Login - Encuesta </title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body>

  <main>
  <?php 
    require_once('includes/load.php');
	 if (!$session->isUserLoggedIn(false)){ echo "<script>alert('no hay sesion establecida');</script>";}
  echo display_msg($msg);
  ?>

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
                    <h5 class="card-title text-center pb-0 fs-4">Login para la encuesta </h5>
                    <p class="text-center small">Agrega tu correo y tu password </p>
                  </div>

                     <form method="post" action="auth.php" class="clearfix">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Correo</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
            <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" value="<?php if(isset($_COOKIE["login"])) { echo $_COOKIE["login"]; } ?>" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Usuario o correo o numero...">
                    </div>
                        <div class="invalid-feedback">Por favor agrega tu correo.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" id="exampleInputPassword" placeholder="Password">
                    </div>
                      <div class="invalid-feedback">Por favor agrega tu password!</div>
                    </div>
          
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Recuerdame</label>
                      </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">no tiene una cuenta ? <a href="register.php">Crear una cuenta</a></p>
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
