<?php
require_once('includes/load.php');
/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_hub($hub)
{
  global $db;
          $sql = $db->query("SELECT * FROM hub WHERE Numero='".$hub."' LIMIT 1");
          if($result = $db->fetch_assoc($sql)){
            return $result;
           }else{		      
            return null;
		  }
}
function find_u($username,$correo)
{
  global $db;
          $sql = $db->query("SELECT * FROM usuarios  WHERE correo='".$correo."' or username='".$username."'  LIMIT 1");
          if($result = $db->fetch_assoc($sql)){
            return $result;
           }else{		      
            return null;
		   }
}
function find_s($table) {
    global $db;
    if(tableExists($table))
	{
     return find_by_sql("SELECT * FROM ".$table);
    }
}


function find_all($table) {
   global $db;
   if(tableExists($table))
   {
     return find_by_sql("SELECT * FROM ".$table);
   }
}
function find_particiones($hub) {
   global $db;
     return find_by_sql("SELECT * FROM particiones where id_hub=".$hub);
}


function numero_historico($hub) {
   global $db;
      if($hub==0){
 	   $sql="SELECT COUNT(id)  FROM historico ";
	  }else{ 
 	   $sql="SELECT COUNT(id)  FROM historico where id_hub=".$hub;
	  }
      $result = find_by_sql($sql);
      return $result;

}
function find_all_historico($hub){
	global $db;
      $sql="SELECT hi.id,d.descripcion,u.username as usuario,h.numero as hub,hi.id_evento,hi.fecha,hi.accion,d.marca as marca,d.numero as numero,d.lazo as lazo FROM historico as hi ";
      $sql .="LEFT JOIN hub h ";
      $sql .="ON h.id=hi.id_hub ";
      $sql .="LEFT JOIN usuarios u ";
      $sql .="ON u.id=hi.id_usuario ";
      $sql .="LEFT JOIN dispositivo d ";
      $sql .="ON d.numero=hi.dispositivo  where  hi.id_hub='".$hub."' ORDER BY hi.fecha DESC LIMIT 50	";
      $result = find_by_sql($sql);
      return $result;
}

function desactiva($hub){
	global $db;
      $sql="UPDATE historico set estatus='1'";
     $sql .="where  id_hub='".$hub."'  and  estatus='0'"; 
    $result = $db->query($sql);
     return true;
}

function find_all_historico2($hub){
	global $db;
      $sql="SELECT hi.id,d.descripcion,hi.id_notificacion,u.username as usuario,h.numero as hub,hi.id_evento,hi.fecha,hi.accion,d.marca as dispositivo FROM historico as hi ";
      $sql .="LEFT JOIN hub h ";
      $sql .="ON h.id=hi.id_hub ";
      $sql .="LEFT JOIN usuarios u ";
      $sql .="ON u.id=hi.id_usuario ";
      $sql .="LEFT JOIN dispositivo d ";
      $sql .="ON d.numero=hi.dispositivo  where  hi.id_hub='".$hub."' and hi.estatus='0' ORDER BY hi.fecha ASC LIMIT 5";
      $result = find_by_sql($sql);
      return $result;
}

function count_by_id2($table,$hub){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(id) AS total FROM ".$table." where estatus='0' and id_hub=".$hub;
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}

/*--------------------------------------------------------------*/
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
 return $result_set;
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
/*--------------------------------------------------------------*/
function find_by_id($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM ".$table." WHERE id='".$id."' LIMIT 1");
          if($result = $db->fetch_assoc($sql)){
            return $result;
           }else{		      
            return null;
		  }}
}

function find_by_hub($table,$hub)
{
  global $db;
  $hub = (int)$hub;
    if(tableExists($table)){
          $sql = "SELECT * FROM ".$table." WHERE id_hub='".$hub."';";
      $result = find_by_sql($sql);
      return $result;
}
}

function find_by_hub2($table,$hub,$user)
{
  global $db;
  $hub = (int)$hub;
    if(tableExists($table)){
          $sql = "SELECT DISTINCT * FROM ".$table." as  p LEFT JOIN user_particion as up  ON up.id_particion=p.id WHERE p.id_hub='".$hub."' and up.id_user='".$user."';";
      $result = find_by_sql($sql);
      return $result;
}
}
function find_usuario_particion($hub)
{
  global $db;
  $hub = (int)$hub;
          $sql = "SELECT u.* FROM usuarios as u  
		  WHERE u.id_hub=".$hub." and u.user_level>3;";
      $result = find_by_sql($sql);
      return $result;
	
}

function particion_by_nombre($nombre)
{
  global $db;
          $sql = "SELECT p.* FROM particiones as p  
		  WHERE p.nombre='".$nombre."';";
      $result = find_by_sql($sql);
      return $result;
	
}

function find_all_dispositivos_by_hub($hub)
{
  global $db;
  $hub = (int)$hub;
          $sql = "SELECT d.*,z.nombre as zona_nombre,s.nombre,z.numero as particion FROM dispositivo as d  
			  LEFT JOIN particiones as z  ON d.id_particion=z.id 		  
			  LEFT JOIN zonas as s  ON s.id=d.zona 		  
		  WHERE z.id_hub='".$hub."' and s.nombre='Z90';";
      $result = find_by_sql($sql);
      return $result;
}
function find_all_dispositivos_by_hub2($hub)
{
  global $db;
  $hub = (int)$hub;
          $sql = "SELECT d.*,z.nombre as zona_nombre,z.numero as particion,s.nombre FROM dispositivo as d  
			  LEFT JOIN particiones as z  ON d.id_particion=z.id 		  
			  LEFT JOIN zonas as s  ON s.id=d.zona 		  
		  WHERE z.id_hub='".$hub."' and s.nombre='Z95';";
      $result = find_by_sql($sql);
      return $result;
}

/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$table;
    $sql .= " WHERE id=".$id;
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
function delete_by_user($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$table;
    $sql .= " WHERE id_particion=".$id.";";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
function update_by_id($table,$id,$valor)
{
  global $db;
  if(tableExists($table))
   {
    $sql= "UPDATE ".$table;
	$sql.= " SET estatus=".$valor;
    $sql .= " WHERE id=".$id;
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
function update_by_num($table,$id,$valor)
{
  global $db;
  if(tableExists($table))
   {
    $sql= "UPDATE ".$table;
	$sql.= " SET valor=".$valor;
    $sql .= " WHERE numero=".$id;
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}

/*--------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function count_by_id($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(id) AS total FROM ".$table;
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}
function count_particion($hub){
  global $db;
    $sql    = "SELECT COUNT(id)+1 AS total FROM particiones where id_hub='".$hub."'";
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
}


function count_historico($hub){
  global $db;
    $sql    = "SELECT COUNT(id) AS total FROM historico where id_hub='".$hub."'";
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
}


/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$table.'"');
      if($table_exit) {
        if($db->num_rows($table_exit) > 0)
              return true;
         else
              return false;
      }
  }
 /*--------------------------------------------------------------*/
 /* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
  function authenticate($username='', $password='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  ="SELECT id,username,password FROM usuarios WHERE username ='".$username."' or telefono='".$username."' or correo='".$username."' LIMIT 1";
    $result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = sha1($password);
      if($password_request === $user['password'] ){
        return $user;
      }
    }
   return false;
  }

  /*--------------------------------------------------------------*/
  /* Find current log in user by session id
  /*--------------------------------------------------------------*/
  function current_user(){
      static $current_user;
      global $db;
      if(!$current_user){
         if(isset($_SESSION['user_id'])):
             $user_id = intval($_SESSION['user_id']);
             $current_user = find_by_id('usuarios',$user_id);
        endif;
      }
    return $current_user;
  }
  /*--------------------------------------------------------------*/
  /* Find all user by
  /* Unir la tabla de usuarios a la tabla grupo de usuarios users table and user gropus table
  /*--------------------------------------------------------------*/
  function find_all_user(){
      global $db;
      $results = array();
      $sql = "SELECT u.*,h.numero as hub,";
      $sql .="g.group_name ";
      $sql .="FROM usuarios u ";
      $sql .="LEFT JOIN hub h ";
      $sql .="ON h.id=u.id_hub ";
      $sql .="LEFT JOIN user_groups g ";
      $sql .="ON g.group_level=u.user_level ORDER BY u.id ASC";
      $result = find_by_sql($sql);
      return $result;
  }
function find_all_dispositivos($hub){
      global $db;
      $results = array();
      $sql = "SELECT u.ID as id,z.nombre,z.id_hub,u.*,m.nombre as modulos,s.tipo_dato as sensor 
	          FROM dispositivo as u 
			  LEFT JOIN modulos m  ON u.modulos=m.ID 
			  LEFT JOIN zonas z    ON u.id_zonas=z.id 
			  LEFT JOIN sensor s   ON u.sensor=s.ID 
			  where z.id_hub='".$hub."'
			  ORDER BY u.ID ASC";
      $result = find_by_sql($sql);
      return $result;
		}
  function find_all_dispositivos2($zona){
      global $db;
      $results = array();
      $sql = "SELECT u.*,  u.numero as numero_sensor, m.dato as numero_modulo,z.*,m.nombre as modulos,s.nombre as zona_nombre FROM dispositivo as u 
	  LEFT JOIN modulos m ON u.modulos=m.ID 
	  LEFT JOIN particiones z ON u.id_particion=z.id 
	  LEFT JOIN zonas s ON u.zona=s.ID where z.id='".$zona."'
			  ORDER BY u.ID ASC";
      $result = find_by_sql($sql);
      return $result;
	}

  function find_all_dispositivos_full($id){
      global $db;
      $results = array();
      $sql = "SELECT u.*,u.numero as numero_sensor, h.Numero as numero_hub,m.dato as numero_modulo,z.*,z.numero as particion, m.nombre as modulos,s.nombre as zona_nombre FROM dispositivo as u 
	  LEFT JOIN modulos m ON u.modulos=m.ID 
	  LEFT JOIN particiones z ON u.id_particion=z.id 
	  LEFT JOIN hub h ON h.id=z.id_hub 
	  LEFT JOIN zonas s ON u.zona=s.ID where u.id='".$id."'
			  ORDER BY u.ID ASC";
      $result = find_by_sql($sql);
      return $result;
	}
	function regresahub($hub){
	global $db;
	$hub = (int)$hub;
          $sql = "SELECT * FROM hub WHERE id='".$hub."'";
      $result = find_by_sql($sql);
      return $result;
	}
	
  function find_all_dispositivos_full2($descripcion){
      global $db;
      $results = array();
      $sql = "SELECT u.*,u.numero as numero_sensor,h.numero as numero_hub,m.dato as numero_modulo,z.*,z.numero as particion, m.nombre as modulos,s.hexa as hexa FROM dispositivo as u 
	  LEFT JOIN modulos m ON u.modulos=m.ID 
	  LEFT JOIN particiones z ON u.id_particion=z.id 
	  LEFT JOIN hub h ON z.id_hub=h.id 
	  LEFT JOIN zonas s ON u.zona=s.ID where u.descripcion='".$descripcion."'
			  ORDER BY u.ID ASC";
      $result = find_by_sql($sql);
      return $result;
	}

  function find_particion($id){
    global $db;
    $sql = "SELECT id, numero as numero_hub FROM hub WHERE id = '".$id."' LIMIT 1 ";
    $result = find_by_sql($sql);
    return $result;
	  
  }
  /*--------------------------------------------------------------*/
  /* Function to update the last log in of a user
  /*--------------------------------------------------------------*/

 function updateLastLogIn($user_id)
	{
		global $db;
  //  $date = make_date();
//    $sql = "UPDATE usuarios SET last_login='10-10-10' WHERE id ='1' LIMIT 1";
 //   $result = $db->query($sql);
  //  return ($result && $db->affected_rows() === 1 ? true : false);
  return $result;
	}

  /*--------------------------------------------------------------*/
  /* Find all Group name
  /*--------------------------------------------------------------*/
  function find_by_groupName($val)
  {
    global $db;
    $sql = "SELECT group_name FROM user_groups WHERE group_name = '".$val."' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Find group level
  /*--------------------------------------------------------------*/
  function find_by_groupLevel($level)
  {
    global $db;
    $sql = "SELECT group_level FROM user_groups WHERE group_level = '".$level."' LIMIT 1 ";
    $result = $db->query($sql);
	
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Function for cheaking which user level has access to page
  /*--------------------------------------------------------------*/
   function page_require_level($require_level){
     global $session;
     $current_user = current_user();
     $login_level = find_by_groupLevel($current_user['user_level']);
     //if user not login
     if (!$session->isUserLoggedIn(true)){
            $session->msg('d','Por favor Iniciar sesión...');
            redirect('index.php', false);
      //if Group status Deactive
/*     }elseif($login_level['group_status'] === '0'){
           $session->msg('d','Este nivel de usuario esta inactivo!');
           redirect('home.php',false);*/
      //cheackin log in User level and Require level is Less than or equal to
     }elseif($current_user['user_level'] <= (int)$require_level){
              return true;
			  
	 }else{
            $session->msg("d", "¡Lo siento!  no tienes permiso para ver la página.".$current_user['user_level']);
            redirect('home.php', false); 
	 }
   }
?>
