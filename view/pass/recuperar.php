<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Recuperar Clave</title>
		      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <!-- Bootstrap CSS -->
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<?php  
			if (isset($_POST['olvide']) || isset($_GET['error_tipo_usuario'])) 
			{
		?>
		<div class="container">
			<div class="row" style="margin-top: 10px;">
				<div class="col-md-4 col-xl-4"></div>

				<div class="col-md-4 col-xl-4" style=" border: 1px solid;">
					<form action="../../controller/verificar.php" method="POST">
						<div class="form-group">
							<label for="">Ingrese su número de carnet</label>
							<input type="text" placeholder="Ingrese número de carnet">
						</div>

  						<div class="form-group" >
    						<label for="exampleInputEmail1">Correro Electronico</label>
    						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese Email">
    						<small id="emailHelp" class="form-text text-muted">Su correo electronico debe ser el mismo de su perfil. </small>
  						</div>
  			
  						<button type="submit" class="btn btn-primary" name="procesar" style="margin: 10px;">Recuperar clave</button>


					</form>			
				</div>

				<div class="col-md-4 col-xl-4"></div>
			</div>
		</div>



			<?php

			}
		?>
		<script src="../../public/js/jquery-1.12.4-jquery.min.js"></script>
      	<script src="../../public/js/bootstrap.min.js"></script>
	</body>
</html>