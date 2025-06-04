 <!-- Content Wrapper. Contains page content -->
 
  <?php

include_once "./controles/con_crearusuario.php";

?>
<div class="content-wrapper">
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
                <h1><i class="bi bi-person-add" style="color: green;"></i> &nbsp Crear Usuarios</h1>  
                <form method="get" action="index.php">
                <!-- <div class=" form-group">
                  <label for="id">ID:</label>
                  <input type="text" id="id" name="id"  required;>
                  </div>-->
                  <div class=" form-group">
                  <label for="Nombre">Nombre</label>
                  <input type="text" name="nombre" class="form-control value=" required;>
                  </div>
                  <div class=" form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control value=" required;>
                  </div>
                  <div class=" form-group">
                  <label for="password">password</label>
                  <input type="password" name="password" class="form-control value=" required;>
                  </div>
                  <label for="dni">Tipo</label>
                  <input type="text" name="tipo" class="form-control value=" required;>
                  </div>
                  <div class=" form-group">
                  <input type="hidden" name= "modulo" value= "crearUsuario">
                  <button type="submit" name= "guardar" class="btn btn-success">Guardar</button>
                  <a class="btn btn-secondary" href="index.php?modulo=usuarios">Cancelar</a>
                  </div>
                  </form>

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
           