 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <?php
  include_once "./controles/con_eliminarusuario.php";
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
               <h3 class="card-title">Se eliminara el usuario del ecommerce</h3>
             </div>

             <!-- /.card-header -->
             <div class="card-body">
             <h1><i class="bi bi-person-dash-fill" style="color: red;"></i> &nbsp Borrar Usuario</h1>
              
             </div>
               <div>
               <form method="get" action="index.php?modulo=eliminarUsuario">
                 <input type="hidden" name="id" value="<?php print $row['id']; ?>">
                 <label for="Nombre">Nombre</label>
                 <input type="text" name="nombre" class="form-control " value="<?= $row['nombre'] ?>" readonly>
             </div>
             <div class=" form-group">
               <label for="email">Email</label>
               <input type="email" name="email" class="form-control" value="<?php print $row['email'] ?>" readonly>
             </div>
             <div class=" form-group">
               <label for="Password">Password</label>
               <input type="text" name="password" class="form-control " value="<?= $row['clave'] ?>" readonly>
             </div>
             <div>
             <input type="hidden" name="modulo" value="eliminarUsuario">
             <button type="submit" name="eliminarUsuario" class="btn btn-danger">Eliminar</button>
             <a class="btn btn-warning" href="index.php?modulo=usuarios">Cancelar</a>
           </div>
           </form>
           <!-- /.card-header -->
         </div>
         <!-- /.card-body -->
       </div>
       <!-- /.card -->
     </div>
     <!-- /.col -->
 </div>
 <!-- /.row -->
 <!-- </div> -->
 <!-- /.container-fluid -->
 </section>
 <!-- /.content -->
 <!-- </div> -->