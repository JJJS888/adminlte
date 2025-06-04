
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <?php
session_start();
$errorLogin = false;

// Mostrar errores de PHP
/*
ini_set('display_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);*/
include_once "db_connect.php";


if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["entrar"])){

$email = sanitizar($conexion, $_POST["email"]);
//echo $email;
$clave = hash("sha256", sanitizar($conexion, $_POST["clave"]));
//echo $clave;
$sql = "SELECT * FROM usuarios WHERE email ='$email' AND clave='$clave'";
//echo $sql;
$resultset = $conexion->query($sql);
$row = $resultset->fetch_assoc();

if($row){

$_SESSION["id"] = $row["id"];
$_SESSION["email"] = $row["email"];
$_SESSION["nombre"] = $row["nombre"];
$_SESSION["tipo"] = $row["tipo"];

  header("location: index.php");
  exit;
}else{
$errorLogin = true;
echo "<script>alert('Error: Usuario o contraseña incorrecta');</script>";

}

if ($conexion->errno){
  die ("<p>Error en la consulta: $conexion->error</p>");
}

}



?>

<!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login_usuarios</title>
<style>
  .card-body {
    width: 300px;
    height: 200px;
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  display: flex;
  justify-content: center;
  align-items: center;
}
body{
  background-color:cornsilk;
}
form{
  background-color:ivory;
  margin: 25px;
    padding: 25px;

}
</style>
 </head>
 <body>
      <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   <center><section class="content">
      <div class="container-fluid">
      
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                 <center><h3 class="card-title" style="margin-top:25px;"><b>LOGIN_USUARIOS</b></h3></center>
</div>

              <!-- /.card-header -->
              <div class="card-body" style="margin-top:75px;" >
                   <form method="POST" action="login_usuario.php">
                <center>
                  <div  class="input-group mb-3">
                  <label for="email"><b>EMAIL</b></label>
                  <input type="email" name="email" class="form-control value=" required placeholder="Email";>
                  </div>
                   <br> <br>
                  <div  class="input-group mb-3">
                  <label for="password"><b>PASSWORD</b></label>
                  <input type="password" name="clave" class="form-control value=" required placeholder="Password";>
                  </div>
                   <br> <br>
                  <div class="col-4">
                  <button type="submit" name="entrar" class="btn btn-primary">ENTRAR</button>
                  </div>
                 </center>
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
    </section></center> 
    <!-- /.content -->
  </div>
 </body>
 </html>




           