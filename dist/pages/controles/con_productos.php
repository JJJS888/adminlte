
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
        </div>';
  exit;
}

try {
  $query = "SELECT id, nombre, descripcion, precio, existencias, imagen FROM productos";
  $resultset = mysqli_query($conexion, $query);
} catch (mysqli_sql_exception $e) {
  echo '<div class="alert alert-danger">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
  exit;
}

// Función que podrías definir para mostrar mensajes
/*
if (function_exists('mostrarAlertaMensaje')) {
mostrarAlertaMensaje();
} */

?>