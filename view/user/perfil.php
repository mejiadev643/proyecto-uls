<?php 
  session_start();  
  if ($_SESSION["tipo"]==3)
  {
    header("location:../admin/Panel_admin.php");
  }
  elseif ($_SESSION["tipo"]==1)
  {
    
  }
  elseif ($_SESSION["tipo"]==2)
  {
    header("location:../operator/Panel_operator.php");

  }
  else
  {
    header("location:../../index.php");

  }
?>

<?php
   
  include_once("../../model/procesos_login.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <!-- Bootstrap CSS -->
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
  <?php if (isset($_GET['edit'])) {
    echo "<title>Editar Perfil</title>";
  }
  else{echo "<title>Perfil</title>";}
   ?>
</head>

    <body>
      <!--<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">-->

    <nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="Panel_user.php">ULS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=" #navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="Panel_user.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Perfil
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="perfil.php">Ver perfil</a>
                  <a class="dropdown-item" href="perfil.php?edit=actualizar&editar=<?php echo $_SESSION['id']; ?>">Editar perfil</a>
                  
              </div><!--Eliminar esta parte de l avista de moderador e incluirlo en la vista de cliente y egresado-->
            </li>
        

            <li class="nav-item">
              <a class="nav-link" href="empleo.php">Ofertas de Empleo</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="academica.php">Ofertas Academicas</a>
            </li>

            

        <li class="nav-item">
              <a class="nav-link" href="../../model/cerrar_sesion.php">Cerrar sesión</a>
            </li> 
        </ul>
        
      </div>
    </nav>
    <?php
      if (isset($_GET['edit'])) {
        include_once("../../controller/update.php");//llamamos al crud para hacer el recorrido
        require("../update.php");
      }
      else
      {
        $perfil= new Login();
        $id=$_SESSION['id'];
        $sql= "SELECT * FROM usuario WHERE id='$id'";
        $result=$perfil->getData($sql);
        if ($result) {
          $consulta=$perfil->getData2($sql);
          if (isset($consulta)) {?>
    <div class="container">
      <div class="row" style="justify-content: center;">


        <div class="col-sm-12 col-sm-12 col-md-6"style=" border: 2px solid black; margin-top: 1%;" >

          <img src="../../public/img/foto_user/<?php echo $consulta[0]['foto']; ?>" alt="..." class="img-thumbnail" style="float: right; width: 200px; height: 200px;">

          <label>Carnet:</label>
          <label><?php echo $consulta[0]['carnet']; ?></label><br>

          <label>Nombres: </label>
          <label><?php echo $consulta[0]['nombre']; ?></label><br>

          <label>Apellidos:</label>
          <label><?php echo $consulta[0]['apellido']; ?></label><br>

          <label>Telefono: </label>
          <label><?php echo $consulta[0]['telefono']; ?></label><br>
          <label>Direccion: </label>
          <label><?php echo $consulta[0]['direccion']; ?></label><br>
          <label>Correo electronico: </label>
          <label><?php echo $consulta[0]['correo_electronico']; ?></label><br>
          <label>Contraseña: </label>
          <label><?php echo $consulta[0]['contrasena']; ?></label><br>
          <a href="perfil.php?edit=actualizar&editar=<?php echo $_SESSION['id']; ?>">
            <button type="button" class="btn btn-info">Editar</button>
          </a>
        

        </div><!--enr row-->
      </div>
    </div>

          <?php
          }//end isset consulta
        }// end result
      }//end else
    ?>






  <script src="../../public/js/jquery-1.12.4-jquery.min.js"></script>
      <script src="../../public/js/bootstrap.min.js"></script>
</body>
</html>