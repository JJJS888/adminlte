<?php
include_once "db_connect.php";

try {
  $query = "select * from clientes";
  $resultset = mysqli_query($conexion, $query);
  $row = mysqli_fetch_assoc($resultset) ;
  if (!$resultset) {
    throw new Exception(mysqli_error($conexion));
  }

  

} catch (Exception $e) {
  echo "Error al obtener la consulta: " . $e->getMessage();
} finally {
  mysqli_close($conexion); // Cierra la conexión a la base de datos
}
?>

