 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

 <?php
 include_once "./controles/con_editarusuario.php";
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
                <h1><i class="bi bi-person-fill-check" style="color:grey;"></i> &nbsp  Editar Usuario</h1>  

  <form method="GET" action="index.php?modulo=editarUsuario">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($row['nombre']) ?>" required;>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($row['email']) ?>" required;>
    </div>
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Rellenar al cambiar">
    </div>
    <?php 
    if($_SESSION["tipo"] === 'administrador'){
        echo '<div class="form-group">
        <label for="email">tipo</label>
        <input type="text" name="tipo" class="form-control" value="'.  htmlspecialchars($row['tipo']) .' " required;>
    </div>';
    }?>
    <div class="form-group">
        <input type="hidden" name="modulo" value="editarUsuario">
        <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
        <button type="submit" name="actualizar" class="btn btn-secondary">Actualizar</button>
        <a class="btn btn-danger" href="index.php?modulo=usuarios">Cancelar</a>
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
           