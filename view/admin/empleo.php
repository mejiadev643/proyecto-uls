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
		<title>Inicio</title>
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
      			<input class="form-control mr-sm-2" type="search" placeholder="Buscar en empleo" aria-label="Search">
      			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    		</form>
  		</div>
		</nav>
    <!--Agregar la barra de empleo y un boton de buscar, y no de editar-->
    <?php
      if (isset($_GET['buscar']))
      {
        # code...
      } else { ?>

        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 col-xs-2">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      
            </div>
          </div>
        </div>
      <?php
      }
      
    ?>


      <script src="../../public/js/jquery-1.12.4-jquery.min.js"></script>
      <script src="../../public/js/bootstrap.min.js"></script>
      
    </body>
</html>