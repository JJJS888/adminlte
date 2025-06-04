 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <?php
  include_once "./controles/con_editarcliente.php";

// Mostrar errores de PHP


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
                <h1><i class="bi bi-person-fill-check" style="color:grey;"></i> &nbsp Editar cliente</h1>  
                <form method="GET" action="index.php">
                  <div class=" form-group">
                  <label for="Nombre">Nombre</label>
                  <input type="text" name="nombre" class="form-control " value="<?= $row ['nombre']?>"requerid;>
                  </div>
                  <div class=" form-group">
                  <label for="Apellido">Apellido</label>
                  <input type="text" name="apellido" class="form-control"value="<?php print $row ['apellido']?>"requerid;>
                  </div>
                  <div class=" form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" value="<?php print $row ['email']?>"requerid;>
                  </div>
                  <div class=" form-group">
                  <label for="password">password</label>
                  <input type="password" name="password" class="form-control value=" placeholder= "rellenar al cambiar"> 
                  </div>
                 
                  <div class=" form-group">
                  <label for="dni">Dni</label>
                  <input type="text" name="dni" class="form-control" value="<?php print $row ['dni']?>"requerid;>
                  </div>
                  <label for="dni">Direccion</label>
                  <input type="text" name="direccion" class="form-control" value="<?php print $row ['direccion']?>"requerid;>
                  </div>
                  <div class=" form-group">
                  <input type="hidden" name= "modulo" value= "editarCliente">
                  <input type="hidden" name="id" value="<?= isset($row['id']) ? $row['id'] : '' ?>">

                  <button type="submit" name= "actualizar" class="btn btn-secondary">Actualizar</button>
                  <a class="btn btn-danger" href="index.php?modulo=clientes">Cancelar</a>
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
           