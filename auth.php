<?php include_once('includes/load.php'); ?>
<?php
$req_fields = array('username','password' );
validate_fields($req_fields);
$username = remove_junk($_POST['username']);
$password = remove_junk($_POST['password']);


if(empty($errors)){
  $user_id = authenticate($username, $password);
   
   
  if($user_id){
	  print("el valor es:".$user_id['id']);
    //create session with id
    $session->login($user_id);
    //Update Sign in time
     updateLastLogIn($user_id);
	 $session->activa();
	 if($_POST['remember']){
		 setcookie( "login", $username, time()+(60*60*24*30) );
		 setcookie( "password", $password, time()+(60*60*24*30) );
		 
		 
	 }
     $session->msg("s", "Bienvenido al sistema.");	  
     redirect('index.php',false);
		 

  //  $session->msg("d", "ok.");
  //  redirect('Login.php',false);

  } else { 
//   $session->msg("d", "Nombre de usuario y/o contraseña incorrecto.");
 print("error usuario ".$username." pass ".$password);
    redirect('login.php',false);
  }

} else {
	//print("eerror ".$error);
   $session->msg("d", $errors);
   redirect('login.php',false);
}

?>
