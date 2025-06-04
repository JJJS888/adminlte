

 
  <?php
include_once "db_connect.php";


// Mostrar errores de PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


try {
  $conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
   /* echo '<div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
            <div>Conexion correcta a la base de datos.</div>
            <a href="#" class="text-dark" data-dismiss="alert" aria-label="Cerrar" style="font-size: 1.5rem; text-decoration: none;">&times;</a>
          </div>';*/
} catch (mysqli_sql_exception $e) {
    echo '<div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
            <div>No se ha podido conectar a la base de datos: ' . $e->getMessage() . '</div>
            <a href="#" class="text-dark" data-dismiss="alert" aria-label="Cerrar" style="font-size: 1.5rem; text-decoration: none;">&times;</a>
            </button>
          </div>';
}
/*
try {
  $query = "SELECT id, nombre, email, clave, tipo FROM usuarios";
  $resultset = mysqli_query($conexion, $query);
} catch (mysqli_sql_exception $e) {
  die("Error en la consulta: " . $e->getMessage());
}

try {
    $query = "SELECT id, nombre, email, clave, tipo FROM usuarios";
    $resultset = mysqli_query($conexion, $query);
} 
   
catch (mysqli_sql_exception $e) {
  echo '<div class="alert alert-danger">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
  exit;
} */

if (isset($_REQUEST["guardar"])){
  try{
   /* $id = sanitizar ($conexion, $_REQUEST ['id']);*/
    $nombre = sanitizar($conexion, $_REQUEST ['nombre']);
    $email = sanitizar($conexion, $_REQUEST ['email']);
    $clave = sanitizar($conexion, $_REQUEST ['password']);
    $tipo = sanitizar($conexion, $_REQUEST ['tipo']);
  
  $query= "INSERT INTO usuarios ( nombre, email, clave, tipo) values (?,?, SHA2(?,256),?)";
  $stmt = $conexion->prepare($query);
  $stmt->bind_param("ssss", $nombre, $email, $clave, $tipo);
  $stmt->execute();
  echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=usuarios&mensaje=Usuario creado exitosamente" />';

  //echo '<meta http-equi="refresh" content="0; url=index.php? modulo=usuarios&mensaje= El usuario se a creado con exito"/>';
  }
  catch (mysqli_sql_exception $e) {
    echo '<div class="alert alert-danger float_right" role" alert">
    <strong>Atecion! No se ha creado el usuario: ' .  $e->getMessage() . '</strong> </div>';
  
  }
}

?>