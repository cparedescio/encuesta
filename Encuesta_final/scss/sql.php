<?php
require_once('includes/load.php');
/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_hub($hub)
{
  global $db;
          $sql = $db->query("SELECT * FROM hub WHERE Numero='{$db->escape($hub)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql)){
            return $result;
           }else{		      
            return null;
		  }
}
function find_u($username,$correo)
{
  global $db;
          $sql = $db->query("SELECT * FROM usuarios  WHERE correo='{$db->escape($correo)}' or username='{$db->escape($username)}'  LIMIT 1");
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
     return find_by_sql("SELECT * FROM ".$db->escape($table));
    }
}


function find_all($table) {
   global $db;
   if(tableExists($table))
   {
     return find_by_sql("SELECT * FROM ".$db->escape($table));
   }
}

function numero_historico($hub) {
   global $db;
      $sql="SELECT hi.id,u.username as usuario,h.numero as hub,hi.id_evento,hi.fecha,hi.accion,d.marca as dispositivo FROM historico as hi ";
      $sql .="LEFT JOIN hub h ";
      $sql .="ON h.id=hi.id_hub ";
      $sql .="LEFT JOIN usuarios u ";
      $sql .="ON u.id=hi.id_usuario ";
      $sql .="LEFT JOIN dispositivo d ";
      $sql .="ON d.id=hi.id_dispositivo  where h.id='{$db->escape($hub)}' ORDER BY hi.fecha ASC";
      $result = find_by_sql($sql);
      return $result;
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
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql)){
            return $result;
           }else{		      
            return null;
		  }}
}

/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE id=". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
function update_by_id($table,$id,$valor)
{
  global $db;
  if(tableExists($table))
   {
    $sql= "UPDATE ".$db->escape($table);
	$sql.= " SET estatus=".$db->escape($valor);
    $sql .= " WHERE id=". $db->escape($id);
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
    $sql    = "SELECT COUNT(id) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}
/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
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
    $sql  = "SELECT id,username,id_hub,password,user_level FROM usuarios WHERE username ='".$username."' or telefono='".$username."' or correo='".$username."' LIMIT 1";
    $result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = $password;
      if($password_request === $user['password'] ){
        return $user;
      }
    }
   return false;
  }
  /*--------------------------------------------------------------*/
  /* Login with the data provided in $_POST,
  /* coming from the login_v2.php form.
  /* If you used this method then remove authenticate function.
 /*--------------------------------------------------------------*/
   function authenticate_v2($username='', $password='') {
     global $db;
     $username = $db->escape($username);
     $password = $db->escape($password);
    $sql  = "SELECT id,username,id_hub,password,user_level FROM usuarios WHERE username ='".$username."' or telefono='".$username."' or correo='".$username."' LIMIT 1";
     $result = $db->query($sql);
     if($db->num_rows($result)){
       $user = $db->fetch_assoc($result);
       $password_request = $password;
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
      $sql = "SELECT u.id,u.correo,u.telefono,u.username,u.user_level,h.numero as hub, u.status,u.last_login,";
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
      $sql = "SELECT u.ID as id,z.nombre,z.id_hub,u.marca,u.numero,m.nombre as modulos,s.tipo_dato as sensor,u.color,u.trama,u.estatus as estatus,u.last_estatus 
	          FROM dispositivo as u 
			  LEFT JOIN modulos m  ON u.modulos=m.ID 
			  LEFT JOIN zonas z    ON u.id_zonas=z.id 
			  LEFT JOIN sensor s   ON u.sensor=s.ID 
			  where z.id_hub='{$db->escape($hub)}'
			  ORDER BY u.ID ASC";
      $result = find_by_sql($sql);
      return $result;
		}
  function find_all_dispositivos2(){
      global $db;
      $results = array();
      $sql = "SELECT u.ID as id,z.nombre,z.id_hub,u.marca,u.numero,m.nombre as modulos,s.tipo_dato as sensor,u.color,u.trama,u.estatus as estatus,u.last_estatus 
	          FROM dispositivo as u 
			  LEFT JOIN modulos m  ON u.modulos=m.ID 
			  LEFT JOIN zonas z    ON u.id_zonas=z.id 
			  LEFT JOIN sensor s   ON u.sensor=s.ID 
			  ORDER BY u.ID ASC";
      $result = find_by_sql($sql);
      return $result;
	}

  /*--------------------------------------------------------------*/
  /* Function to update the last log in of a user
  /*--------------------------------------------------------------*/

 function updateLastLogIn($user_id)
	{
		global $db;
    $date = make_date();
    $sql = "UPDATE usuarios SET last_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
	}

  /*--------------------------------------------------------------*/
  /* Find all Group name
  /*--------------------------------------------------------------*/
  function find_by_groupName($val)
  {
    global $db;
    $sql = "SELECT group_name FROM user_groups WHERE group_name = '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Find group level
  /*--------------------------------------------------------------*/
  function find_by_groupLevel($level)
  {
    global $db;
    $sql = "SELECT group_level FROM user_groups WHERE group_level = '{$db->escape($level)}' LIMIT 1 ";
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
     if (!$session->isUserLoggedIn(true)):
            $session->msg('d','Por favor Iniciar sesión...');
            redirect('index.php', false);
      //if Group status Deactive
     elseif($login_level['group_status'] === '0'):
           $session->msg('d','Este nivel de usaurio esta inactivo!');
           redirect('home.php',false);
      //cheackin log in User level and Require level is Less than or equal to
     elseif($current_user['user_level'] <= (int)$require_level):
              return true;
      else:
            $session->msg("d", "¡Lo siento!  no tienes permiso para ver la página.");
            redirect('home.php', false);
        endif;
   }
?>
