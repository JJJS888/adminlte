<?php
include_once "controles/con_clientes.php";
?>

<style>
        .bi-database-add{
            color: green;
        }
        .bi-pencil{
            color: grey;
        }
        .bi-trash3 {
            color: red;
        }
      </style>
      

<section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-header">
    <h3 class="card-title">Gestor ecomerce - clientes</h3>
    </div>
    <div class="card-body">
<h1> <i class="bi bi-people-fill"></i> Clientes</h1>  
<table id="tabla" class="table">
    <thead>

<tr>
<th>Nombre</th>
<th>Apellido</th>
<th>Email</th>
<th>Dni</th>
<th>Direccion</th>
<th><a href="index.php?modulo=insertarCliente"><i class="bi bi-database-add"></i></a></th>
</tr>
    </thead>
    <tbody>
    <?php
    while($row = mysqli_fetch_assoc($resultset)){
?>
<tr>
<td> <?php print $row["nombre"] ?> </td>
<td> <?php print $row["apellido"] ?> </td>
<td> <?php print $row["email"] ?> </td>
<td> <?php print $row["dni"] ?> </td>
<td> <?php print $row["direccion"] ?> </td>
<td><a href="index.php?modulo=editarCliente&id=<?php echo $row["id"]?>"><i class="bi bi-pencil"></i></a> &nbsp &nbsp <a href="index.php?modulo=eliminarCliente&id=<?php echo $row["id"]?>"> <i class="bi bi-trash3"></i></a></td>

</tr>
<?php
 }
?>

    </tbody>
</table>

   </div>
     </div>
        </div>
             </div>
</section>
</div>