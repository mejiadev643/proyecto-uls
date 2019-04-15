<?php 
	session_start();  
	if ($_SESSION["tipo"]==1)
	{
		header("location:../user/Panel_user.php");
	}
	elseif ($_SESSION["tipo"]==2)
	{
		header("location:../operator/Panel_operator.php");

	}
	elseif ($_SESSION["tipo"]==3)
	{
		

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
		<?php
        if (isset($_GET['editar']))
    {?>
      <title>Editar Moderadores</title>

    <?php
    }else{?>
      <title>Moderadores</title>

    <?php
    } 
    ?>
    	<!-- Bootstrap CSS -->
		<link href="../../public/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="none.css">
  		</head>

  	<body>
  		<!--<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">-->

		<nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
  			<a class="navbar-brand" href="Panel_admin.php">ULS</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="	#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
      			<li class="nav-item active">
        			<a class="nav-link" href="Panel_admin.php">Inicio <span class="sr-only">(current)</span></a>
      			</li>
				<li class="nav-item dropdown">
        			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    	      			Perfil
        			</a>
        			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
        				<a class="dropdown-item" href="#">Ver perfil</a>
        		  		<a class="dropdown-item" href="#">Editar perfil</a>
        		  		<a class="dropdown-item" href="#">Something else here</a>
        			</div><!--Eliminar esta parte de l avista de moderador e incluirlo en la vista de cliente y egresado-->
      			</li>

      			<li class="nav-item">
        			<a class="nav-link" href="empleo.php">Ofertas de Empleo</a>
      			</li>

      			<li class="nav-item">
        			<a class="nav-link" href="academica.php">Ofertas Academicas</a>
      			</li>

      			<li class="nav-item">
        			<a class="nav-link" href="egresado.php">Egresados</a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link" href="moderador.php">moderadores</a>
      			</li>

				<li class="nav-item">
        			<a class="nav-link" href="../../model/cerrar_sesion.php">Cerrar sesión</a>
      			</li>	
    		</ul>
    		<form class="form-inline my-2 my-lg-0">
      			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    		</form>
  		</div>
		</nav><!--inicio de tablas e interacciones-->
    <?php 
      if (isset($_GET['edit']))
      {?>
            <div class="container">
        <h2 style="text-align: center;">
        Editar Moderadores
        </h2>
      </div>
      <hr>

      <?php
    }
      else
      {?>
            <div class="container">
      <h2 style="text-align: center;">
        Lista de Moderadores
      </h2>
    </div>
    <hr>
        <?php
      }//para modificar la frase que aparece, si se quiere editar la vista

    ?>

  
    <div class="row">
      <div class="col-xs-12 col-md-12">
        <?php
          $read= new Login();//uso de read
          if (isset($_GET['edit']))
          {
            include_once("../../controller/update.php");//llamamos al crud para hacer el recorrido
            require("../update.php");//editar esta localizacion
            
          }
          else
          {
            $sql="SELECT * FROM usuario WHERE id_tipo_usuario=2";//moderador
            $result = $read->getData($sql);
        
            if ($result->num_rows>0) {
              $datos= $read->getData2($sql);
              if (isset($_GET['delete'])) {
                echo "Moderador eliminado correctamente";
              }elseif(isset($_GET['update'])){
                echo "Moderador actualizado Exitosamente";
              }//solamente para mostrar un mensaje
              
            ?>
            <table class="table table-hover table-dark table-responsive">
              <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">carnet</th>
                    <th scope="col">nombres</th>
                    <th scope="col">apellidos</th>
                    <th scope="col">telefono</th>
                    <th scope="col" style="width: 40%">direccion</th>
                    <th scope="col">correo electronico</th>
                    <th scope="col">contraseña</th>
                    <th scope="col" style="width: 70%">Imagen</th>
                  
                    <th scope="col" style="width: 100%;">Acciones</th>
                  </tr>
              </thead>
              <tbody>
              <?php
              }
                if (isset($datos)) {//linea 106
                  for ($i=0; $i <count($datos) ; $i++) //para i=0 hasta i menor a la cantidad de datos 'count($datos) i autoincrementable'
                  {
                  ?>
                  <tr>
                    <th scope="row"><?php echo $datos[$i]["id"]; ?></th>
                    <td><?php echo $datos[$i]["carnet"]; ?></td>
                    <td><?php echo $datos[$i]["nombre"]; ?></td>
                    <td><?php echo $datos[$i]["apellido"]; ?></td>
                    <td><?php echo $datos[$i]["telefono"]; ?></td>
                    <td><?php echo $datos[$i]["direccion"]; ?></td>
                    <td><?php echo $datos[$i]["correo_electronico"]; ?></td>
                    <td><?php echo $datos[$i]["contrasena"]; ?></td>
                    <td>
                      <div>
                        <img src="../../public/img/foto_user/<?php echo $datos[$i]['foto']; ?>" class="img-fluid" style="width: 100px; height: 100px"  alt="FOTO_USER">
                                
                      </div>
                    </td>

                    <td>
                      <a href="egresado.php?edit=editar&editar=<?php echo $datos[$i]['id'];?>&edita=moderador">
                        <button type="button" class="btn btn-success">Editar</button>
                      </a>
                    </td>
                    <td>
                      <a href="../../controller/delete.php?delete=<?php echo $datos[$i]['id'];?>&del=moderador"><button type="button" onClick="return confirm('¿Desea continuar para eliminar el usuario <?php echo $datos[$i]["nombre"];  ?>?')" class="btn btn-danger">Eliminar</button>
                      </a>
                    </td>
                  </tr>
                </tbody>
                <?php
                }//end for
                    
            }//end if
            else
            {
              echo "No existen registros";
            }
          }//end else
          
          ?>


      </div><!--end col-->
    </div><!--end row-->  


      <script src="../../public/js/jquery-1.12.4-jquery.min.js"></script>
      <script src="../../public/js/bootstrap.min.js"></script>
      
    </body>
</html>