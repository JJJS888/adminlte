 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <?php

  include_once "./controles/con_insertarCliente.php";

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
                <h1><i class="bi bi-person-add" style="color: green;"></i> &nbsp Insertar cliente</h1>  
                <form method="get" action="index.php">
                  <div class=" form-group">
                  <label for="Nombre">Nombre</label>
                  <input type="text" name="nombre" class="form-control value=" required;>
                  </div>
                  <div class=" form-group">
                  <label for="Apellido">Apellido</label>
                  <input type="text" name="apellido" class="form-control value=" required;>
                  </div>
                  <div class=" form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control value=" required;>
                  </div>
                  <div class=" form-group">
                  <label for="password">password</label>
                  <input type="password" name="password" class="form-control value=" required;>
                  </div>
                 
                  <div class=" form-group">
                  <label for="dni">Dni</label>
                  <input type="text" name="dni" class="form-control value=" required;>
                  </div>
                  <label for="dni">Direccion</label>
                  <input type="text" name="direccion" class="form-control value=" required;>
                  </div>
                  <div class=" form-group">
                  <input type="hidden" name= "modulo" value= "insertarCliente">
                  <button type="submit" name= "guardar" class="btn btn-success">Guardar</button>
                  <a class="btn btn-danger" href="index.php?modulo=clientes">Cancelar</a>
                  </div>
                  </form>
                  <script>
    function borrarCliente(bid) {
        if (confirm("¿Desea borrar este cliente?")) {
            window.location.href = 'panel.php?modulo=borrarcliente&id=' + bid;
        }
    }
</script>
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
           