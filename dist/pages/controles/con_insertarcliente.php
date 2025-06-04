
  <?php
include_once "db_connect.php";

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
if (isset($_REQUEST["guardar"])){
  try{
    $nombre = sanitizar($conexion, $_REQUEST ['nombre']);
    $apellido = sanitizar ($conexion, $_REQUEST ['apellido']);
    $email = sanitizar ($conexion, $_REQUEST ['email']);
    $clave = sanitizar ($conexion, $_REQUEST ['password']);
    $dni = sanitizar ($conexion, $_REQUEST ['dni']);
    $direccion = sanitizar( $conexion, $_REQUEST ['direccion']);
  
  $query= "INSERT INTO clientes (nombre, apellido, email, clave, dni, direccion) values (?,?,?, SHA2(?,256),?,?)";
  $stmt = $conexion->prepare($query);
  $stmt->bind_param("ssssss", $nombre, $apellido, $email, $clave, $dni, $direccion);
  $stmt->execute();

  echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=clientes&mensaje=Cliente creado exitosamente" />';
  }
  catch (mysqli_sql_exception $e) {
    echo '<div class="alert alert-danger float_right" role" alert">
    <strong>Atecion! No se ha creado el cliente: ' .  $e->getMessage() . '</strong> </div>';
  
  }
}

?>