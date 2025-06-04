
  <?php

// Mostrar errores de PHP

ini_set('display_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

include_once "db_connect.php";

$id = sanitizar($conexion, $_REQUEST ['id']);

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
if (isset($_REQUEST["actualizar"])){
  
  try {
    $id = intval( $_REQUEST ['id']);
    $nombre = sanitizar($conexion, $_REQUEST ['nombre']);
    $apellido = sanitizar ($conexion, $_REQUEST ['apellido']);
    $email = sanitizar ($conexion, $_REQUEST ['email']);
    $nueva_clave = sanitizar ($conexion, $_REQUEST ['password']);
    $dni = sanitizar ($conexion, $_REQUEST ['dni']);
    $direccion = sanitizar( $conexion, $_REQUEST ['direccion']);

  $clave_actual_query = "SELECT clave FROM clientes WHERE id = ?";
  $stmt_actual = $conexion->prepare($clave_actual_query);
  $stmt_actual->bind_param("i", $id);
  $stmt_actual->execute();
  $resultado=  $stmt_actual->get_result();
  $row = $resultado->fetch_assoc();
  $clave_actual = $row ['clave'] ?? '';
  
  if(!empty ($nueva_clave) && $clave_actual !== hash('sha256', $nueva_clave)){
  $query= "UPDATE clientes SET nombre = ?, apellido = ?, email = ?, clave = SHA2(?, 256), dni = ?, direccion = ? WHERE id = ? ";
 
  $stmt_actual = $conexion->prepare ($query);
  $stmt->bind_param("ssssssi", $nombre, $apellido, $email, $nueva_clave, $dni, $direccion, $id);

  }else{
    $query= "UPDATE clientes SET nombre = ?, apellido = ?, email = ?,  dni = ?, direccion = ? WHERE id = ?";
    $stmt = $conexion->prepare ($query);
    $stmt->bind_param("sssssi", $nombre, $apellido, $email, $dni, $direccion, $id);
  }
  if (isset($_REQUEST["actualizar"])){
    
      if ($stmt->execute()){
        if ($stmt->affected_rows > 0){
          echo '<script>window.location.href="index.php?modulo=clientes&mensaje=Cliente actualizado con exito"</script>';
        }else {
          echo '<script>window.location.href="index.php?modulo=clientes&mensaje=Error al ejecutar la actualizacion"</script>';
        }
      }
    }
  }
  

  catch (mysqli_sql_exception $e) {
    $errorMsg = urlencode("Error SQL: " . $e->getMessage());
    echo "<script>window.location.href= 'index.php?modulo=clientes&mensaje= ($errorMsg)'</script>";
  }
}

  $query = "SELECT * FROM clientes WHERE id=$id";
//echo $query;
  $resultset = mysqli_query($conexion, $query);
//print_r($resultset);  
$row= mysqli_fetch_assoc($resultset);

  if (!$row){
    
  echo '<div class="alert alert-danger float-right" role="alert">
    <strong>Atencion la consulta ha fallado  </strong>
   </div> ';
  } 


 ?>