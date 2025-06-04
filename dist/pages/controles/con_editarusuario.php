

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
if (isset($_GET["actualizar"])) {
    try {
        // Obtener datos del formulario
        $id = intval($_REQUEST['id']);
        $nombre = sanitizar($conexion, $_REQUEST['nombre']);
        $email = sanitizar($conexion, $_REQUEST['email']);
        $nueva_clave = sanitizar($conexion, $_REQUESTT['password']);
        $tipo = sanitizar($conexion, $_REQUEST['tipo']);

        // Consultar la clave actual desde la base de datos
        $clave_actual_query = "SELECT clave FROM usuarios WHERE id = ?";
        $stmt_actual = $conexion->prepare($clave_actual_query);
        $stmt_actual->bind_param("i", $id);
        $stmt_actual->execute();
        $resultado = $stmt_actual->get_result();
        $row = $resultado->fetch_assoc();
        $clave_actual = $row['clave'] ?? '';

        // Si se proporciona una nueva clave, actualizarla
        if (!empty($nueva_clave) && $clave_actual !== hash('sha256', $nueva_clave)) {
            // Actualización con nueva clave
            $query = "UPDATE usuarios SET nombre = ?, email = ?, clave = SHA2(?, 256), tipo = ? WHERE id = ?";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("ssssi", $nombre, $email, $nueva_clave, $tipo, $id);
        } else {
            // Si no se proporciona una nueva clave, actualizar solo los demás datos
            $query = "UPDATE usuarios SET nombre = ?, email = ?, tipo = ? WHERE id = ?";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("sssi", $nombre, $email, $tipo, $id);
        }

        // Ejecutar la consulta y redirigir
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo '<script>window.location.href="index.php?modulo=usuarios&mensaje=Usuario actualizado con éxito";</script>';
            } else {
                echo '<script>window.location.href="index.php?modulo=usuarios&mensaje=Error al ejecutar la actualización";</script>';
            }
        } else {
            echo '<script>window.location.href="index.php?modulo=usuarios&mensaje=No se pudo actualizar el usuario";</script>';
        }
    } catch (mysqli_sql_exception $e) {
        $errorMsg = urlencode("Error SQL: " . $e->getMessage());
        echo "<script>window.location.href='index.php?modulo=usuarios&mensaje=$errorMsg';</script>";
    }
}


$id = sanitizar($conexion, $_REQUEST ['id']);
//echo  $id;
$query = "SELECT * FROM usuarios WHERE id = $id";
//echo $query;
$resultset = mysqli_query($conexion, $query);

$row = mysqli_fetch_assoc($resultset);

//    echo "<pre>";
  //  print_r($row);
    //echo "</pre>";


if (!$row) {
    echo '<div class="alert alert-danger">El usuario no existe.</div>';
    exit;  // Termina la ejecución si no existe el usuario.
}


 ?>