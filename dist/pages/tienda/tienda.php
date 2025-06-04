 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <?php
// Mostrar errores de PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include_once "db_connect.php";
try {
  $conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
    echo '<div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
            <div>Conexion correcta a la base de datos.</div>
            <a href="#" class="text-dark" data-dismiss="alert" aria-label="Cerrar" style="font-size: 1.5rem; text-decoration: none;">&times;</a>
          </div>';
} catch (mysqli_sql_exception $e) {
    echo '<div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
            <div>No se ha podido conectar a la base de datos: ' . $e->getMessage() . '</div>
            <a href="#" class="text-dark" data-dismiss="alert" aria-label="Cerrar" style="font-size: 1.5rem; text-decoration: none;">&times;</a>
            </button>
          </div>';
}



?>


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <script>
              $(".alert").alert();
            </script>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                 <h3 class="card-title">Gestor  ecommerce</h3>
</div>

              <!-- /.card-header -->
              <div class="card-body">
                <h1>Titulo</h1>  
                <p>Contenido de la pagina</p>
                <p>Esta es una plantilla basica de una pagina web.</p>
                <p>Puede agregar mas contenido aqui</p>

              <!-- /.card-header -->
         

                          
                  
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
           