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
      if (isset($_GET['publicar']))
    {
      echo "<title>Crear Oferta academica </title>";

    
    }
    elseif ($_GET['editar']=="empleo") {
      echo "<title>editar oferta de empleo</title>";
    }
    else{
      echo "<title>crear oferta de empleo</title>";
    } 
    ?>
    	<!-- Bootstrap CSS -->
		<link href="../../public/css/bootstrap.min.css" rel="stylesheet">
		
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

  		</div>
		</nav><!--inicio de tablas e interacciones-->
    <div class="container">
      <?php
      if (isset($_GET['publicar'])) {//seleccion del titulo atravez de get
        
        if ($_GET['publicar']=="academica") {//ofertas academicas
          echo "<h2 style='text-align: center;''>
          Crear oferta Academica
          </h2> ";
        }
        else//ofertas de empleo
        {
          echo "<h2 style='text-align: center;''>
          Crear oferta de empleo
          </h2> ";
        }
        
      }elseif ($_GET['editar']=="empleo") {//editar ofertas de empleo
        echo "<h2 style='text-align: center;''>
        Editar oferta de Empleo
        </h2>";
      }elseif ($_GET['editar']="academica") {//editar ofertas academicas
        echo "<h2 style='text-align: center;''>
        Editar oferta Academica
        </h2>";
      }
      
      ?>
      <hr>
      <div class="row" >
        <div class="col-2"></div>

        <div class="col-8">

        <?php
      if (isset($_GET['publicar'])) {//creacion de formularios para editar y crear a travez de deciciones
        
        if ($_GET['publicar']=="academica") {//ofertas academicas
          require("../publicar.php");
        }
      }?>
      </div>
      <div class="col-2"></div>
         
       </div>
         
      </div><!--end row-->
    </div><!--end container-->
  </body>
</html>
nota: esta pagina es obsoleta