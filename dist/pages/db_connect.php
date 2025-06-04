<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'Fuerteventura@2025';
$db_database = 'adminlte';
$db_port = 3306; // número, no string

/*
$db_host = '192.168.1.66';
$db_user = 'jj';
$db_pass = 'Jj@2025';
$db_database = 'adminlte';
$db_port = 3306; // número, no string
*/
/*
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_database = 'adminlte';
$db_port = 3306; // número, no string
*/

/*
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_database = 'ecommerce';
$db_port = 3306; // número, no string
*/


ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conexion =mysqli_connect($db_host, $db_user, $db_pass, $db_database);
if ($conexion->connect_errno) {
    die ("<p>Error de conexion Nº: $conexion->connect_errno - $conexion->connect_error</p>\n</body></html>");
}


if ($conexion->errno){
    die("<p>Error en la consulta - $conexion->error</p>\n</body></html>");   
}
try {
  $conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
      /*echo '<div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
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

function sanitizar($conexion, $datos){
    return mysqli_real_escape_string($conexion, htmlspecialchars(trim(strip_tags($datos)?? "")));
}
//mysqli_close($conexion);
?>
