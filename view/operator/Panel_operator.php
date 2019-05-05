<?php 
	session_start();  
	if ($_SESSION["tipo"]==2)
	{
		
	}
	elseif ($_SESSION["tipo"]==1)
	{
		header("location:../admin/Panel_user.php");
	}
	elseif ($_SESSION["tipo"]==3)
	{
		header("location:../user/Panel_admin.php");

	}
	else
	{
		header("location:../../index.php");

	}
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
        			<a class="nav-link" href="Panel_operator.php">Inicio <span class="sr-only">(current)</span></a>
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
			<div class="row" style="justify-content: center;">
				
				<div class="col-xs-12 col-sm-8 col-md-4 ">
					<div class="card-deck" style="margin-top: 60px;">
  						<div class="card">
    						<img src="../../public/img/system/examen.svg" class="card-img-top" alt="examen" >
    						<div class="card-body">
    							<h5 class="card-title">Ofertas de Empleo</h5>
      			   				<p class="card-text">Agregar ofertas de empleo, o Eliminar </p>
      							<center>
                      <a href="empleo.php">
                        <button type="button" class="btn btn-dark">Ver</button>
                      </a>
      								
                      <a href="empleo.php?nuevo=empleo">
      								<button type="button" class="btn btn-dark">Agregar</button>
                    </a>
      						   </center>

    						</div>
    				
						</div><!-- end card-->

					</div><!-- end card-deck-->
			</div><!-- end col-->

			<div class="col-xs-12 col-sm-8 col-md-4 ">
				<div class="card-deck" style="margin-top: 60px;">
  					<div class="card">
    					<img src="../../public/img/system/universidad.svg" class="card-img-top" alt="universidad" >
    					<div class="card-body">
    						<h5 class="card-title">Ofertas Academicas</h5>
      			   			<p class="card-text">Agregar ofertas academicas, o Eliminar</p>
      						<center>
                    <a href="academica.php">
      							 <button type="button" class="btn btn-dark">Ver</button>
                    </a>
                    <a href="academica.php?nuevo=academica">
                      <button type="button" class="btn btn-dark">Agregar</button>
                    </a>
      						</center>
    					</div>
    				
					</div><!-- end card-->

				</div><!-- end card-deck-->
			</div><!-- end col-->
			

			

		</div><!-- end row-->
	</div><!-- end container-->



	    <script src="../../public/js/jquery-1.12.4-jquery.min.js"></script>
	    <script src="../../public/js/bootstrap.min.js"></script>
	    
  	</body>
</html>