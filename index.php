<?php  
	session_start();
	if (isset($_SESSION["usuario"]))
	{
		
	}
	else
	{
		$msj = "<p style='text-align: right;'>Usted no se ha identificado</p>";
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    	<link rel="icon" href="">
		<title>Login</title>
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
		
		<!-- --><link href="./public/css/bootstrap.min.css" rel="stylesheet"> <!---->
    	<link href="./public/css/sticky-footer-navbar.css" rel="stylesheet">
	</head>
	<body>
		<script language="Javascript">
			document.oncontextmenu = function(){return false}
		</script> <!-- >Evita dar clic derecho en el navegador <-->
		<header>
		<div>
			<?php
				if (!isset($_SESSION['usuario'])) 
				{
				 	# code...
				}
				else
				{
					$msj="<p style='text-align: right;'><br>USTED NO SE HA IDENTIFICADO</b></p>";
					echo $msj;

				} 
				?>
		</div>
		</header>
		<div class="container">
			<div class="row">
				<div class="col-md-4 ml-auto"></div>
				<div class="col-md-4 ml-auto">
					<?php  
						if (isset($_GET['mensaje'])) 
						{
							$mensaje = base64_decode($_REQUEST['mensaje']);
							echo '<label for="">'.$mensaje.'</label>';
						}
					?>

					<form action="./controller/controller_login.php" method="POST">
						<div class="input-group mb-3">
			             <div class="input-group-prepend">
			                <label class="input-group-text" for="inputGroupSelect01"><img src="./public/img/login/user.png" width="25px" alt=""></label>
			              </div>
			              <input type="text" name="usuario" class="form-control" placeholder="Ingrese usuario" />  
			            </div>
			            <div class="input-group mb-3">
			              <div class="input-group-prepend">
			                <label class="input-group-text" for="inputGroupSelect01"><img src="./public/img/login/passw2.png" width="25px" alt=""></label>
			              </div>
			              <input type="password" name="password" class="form-control" placeholder="Ingrese Contraseña" />  
			            </div> 
			            <button  type="submit" name="login" class="btn btn-info" value="Iniciar Sesion">Iniciar Sesión <img src="./public/img/login/in.png" width="25px" alt=""></button>
					</form><br>
					<form action="./view/pass/recuperar.php" method="POST">
						<button type="submit" name="olvide">Olvide mi contraseña</button>
					</form>
				</div>
				<div class="col-md-4 ml-auto"></div>
			</div>
			
		</div>
		<footer>

		</footer>
		<script src="./public/js/jquery-1.12.4-jquery.min.js"></script> 
	    <script src="./public/js/jquery.validate.min.js"></script> 
	    <script src="./public/js/ValidarRegistro.js"></script> 
	    <script src="./public/js/bootstrap.min.js"></script>
	</body>
</html>
