

   <?php
  include_once "db_connect.php";


    $conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
    if ($conexion->connect_errno) {
      die("<p>Error de conexion Nº: $conexion->connect_errno - $conexion->connect_error</p>");
    }

    if (isset($_GET["eliminarUsuario"])) {
      $id = (int) $_GET["id"];
      //echo $id;
      $query = "DELETE FROM usuarios
   WHERE id = $id";
      // echo $query;
      $resultset = mysqli_query($conexion, $query);

      if ($resultset) {
        //echo '<div class="alert alert-success">entramos a eliminar ' . mysqli_error($conexion) . '</div>';
        echo "<script>window.location.href = 'index.php?modulo=usuarios&mensaje= Usuario eliminado';</script>";
        exit;
      } else {
        echo '<div class="alert alert-danger">Error al eliminar ' . mysqli_error($conexion) . '</div>';
      }
    }

    $id = (int) $_REQUEST["id"];
    $query = "SELECT * FROM usuarios
 WHERE id =$id";
    $resultset = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($resultset);

    if (!$row) {
      echo "<script>window.location.href = 'index.php?modulo=usuarios&mensaje= Usuario NO ENCONTRADO';</script>";
      exit;
    }

    $id = sanitizar($conexion, $_REQUEST["id"]);
    $query = "SELECT * FROM usuarios
  WHERE id =$id";
    $resultset = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($resultset);
    if (!$row) {
    ?> <div class="alert alert-danger  float-right" role="alert">
       <strong>Atencion! la consulta ha fallado <?php print mysqli_error($conexion) ?> </strong>
     </div>
   <?php
    }
    ?>