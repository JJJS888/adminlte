<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<?php
include_once "controles/con_productos.php";

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


<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <script>
          $(".alert").alert();
        </script>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
             <h3 class="card-title">Gestor Ecommerce - Productos</h3>
             
          </div>

          <div class="card-body">
            <h1><i class="bi bi-basket2"></i>&nbsp;Productos</h1>
            <table id="tabla" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Precio</th>
                  <th>Existencia</th>
                  <th>Imagen</th>
                  <th>
                    <a href="index.php?modulo=creaproductos">
                      <i class="bi bi-database-add"></i>
                    </a>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row = mysqli_fetch_assoc($resultset)): ?>
                  <tr>
                    <td><?= htmlspecialchars($row["nombre"]) ?></td>
                    <td><?= htmlspecialchars($row["descripcion"]) ?></td>
                    <td><?= number_format($row["precio"], 2) ?></td>
                    <td><?= (int)$row["existencias"] ?></td>
                    <td><img src="http://192.168.1.66/AdminLTE/dist/pages/img/<?php print $row ['imagen']?>" style="width: 50px; height. auto;"/> </td>
                   <!-- <td>
                      <?php if (!empty($row["imagen"])): ?>
                        <img src="./img/<?= htmlspecialchars($row["imagen"]) ?>" alt="Imagen" style="width: 50px; height: auto;">
                      <?php else: ?>
                        Sin imagen
                      <?php endif; ?>
                    </td> -->
                    <td>
  <a href="index.php?modulo=editarproductos&id=<?php echo $row["id"] ?>"><i class="bi bi-pencil"></i></a> &nbsp &nbsp
  <?php
  if ($_SESSION["tipo"] === "administrador") {
    echo '<a href="index.php?modulo=eliminarproductos&id=' . $row["id"] . '"><i class="bi bi-trash3"></i></a>';
  }
  ?>
</td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>

            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>