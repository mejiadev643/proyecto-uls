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
      
    <title>Ofertas Academicas</title>
      <!-- Bootstrap CSS -->
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    
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
                  <a class="dropdown-item" href="perfil.php?edit=actualizar&id=<?php echo $_SESSION['id']; ?>">Editar perfil</a>
                  
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
    <div class="container">
      <?php //formularios
      if (isset($_GET['ver'])) {//este es para ver el post
        include_once("../../controller/verpublicacion.php");
        include_once("../verpublicacion.php");
        echo "</div><!--end container-->";
      }else{//aqui ira las publicaciones
        echo "</div><!--end container-->";
        $consulta= new Login();
        $carrera= $_SESSION['carrera'];//nueva linea, para mostrar la carrera correspondiente
        $sql="SELECT imagen, titulo, descripcion, id_publicacion FROM publicacion WHERE carrera_public='$carrera' AND tipo_publicacion=2 ORDER BY id_publicacion DESC LIMIT 30";
        $result = $consulta->getData($sql);
        if ($result->num_rows>0) {
          $publicacion=$consulta->getData2($sql);
          if (isset($publicacion)) { ?>
            
            <div class="row">

            <?php
            for ($i=0; $i < count($publicacion) ; $i++) { ?>
              
            <div class="col-xs-12 col-sm-6 col-md-3 ">
            <div class="card-deck" style=" display: flex; justify-content: center; height: 27rem; margin-top: 15px;"> 
              <div class="card" style="width: 18rem;">
                <img src="../../public/img/publicaciones/<?php echo $publicacion[$i]["imagen"];  ?>" class="card-img-top" alt="..." style=" width:100%; height: 14rem;">
                <?php $ruta="../public/img/publicaciones/".$publicacion[$i]["imagen"];//se usara para eliminar ?>
                <div class="card-body">
                  <h5 class="card-title"><?php echo $publicacion[$i]["titulo"]; ?></h5>
                  <p class="card-text">
                    <?php

                    if(strlen($publicacion[$i]["descripcion"]) < 91){
                      echo $publicacion[$i]["descripcion"];
                    }else
                    {
                      echo substr($publicacion[$i]["descripcion"],0,91);
                      echo "...";
                       
                    }
                    ?>
                </p>
                <?php if ($_SESSION['tipo'] !='1') {?>
                <a href="academica.php?id=<?php echo $publicacion[$i]["id_publicacion"]; ?>&action=edit" class="btn btn-warning" style="position:absolute;bottom:5px;left:10px;">Editar</a>
                <a href="../../controller/publicacion.php?delete=<?php echo $publicacion[$i]["id_publicacion"]; ?>&img=<?php echo $ruta;?>" class="btn btn-danger" style="position:absolute;bottom:5px;left: 30%; "onClick="return confirm('¿Desea continuar para eliminar la publicacion? \n Recuerde que una vez eliminado no volvera a recuperarlo')">Eliminar</a>

                <?php
                
                } ?>
                

                <a href="academica.php?ver=<?php echo $publicacion[$i]["id_publicacion"]; ?>" class="btn btn-primary" style="position:absolute;bottom:5px;right:10px;">Ver mas>>></a>

                </div> 
            </div>
            </div>
            </div>

            <?php
            }//end for
            ?>
            
            </div>
            <?php
          }
        }?>
        

        <?php
        }?>
        
  
        <?php
      ?>
      

    


      <script src="../../public/js/jquery-1.12.4-jquery.min.js"></script>
      <script src="../../public/js/bootstrap.min.js"></script>
      
    </body>
</html>