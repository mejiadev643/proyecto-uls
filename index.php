<?php  
	session_start();
	$_SESSION = array();
	session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<head>
		<link rel="apple-touch-icon" sizes="180x180" href="./icon/apple-touch-icon.png">
	    <link rel="icon" type="image/png" sizes="32x32" href="./icon/favicon-32x32.png">
	    <link rel="icon" type="image/png" sizes="16x16" href="./icon/favicon-16x16.png">
	    <link rel="manifest" href="./icon/site.webmanifest">
	    <link rel="mask-icon" href="./icon/safari-pinned-tab.svg" color="#5bbad5">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <meta name="msapplication-TileColor" content="#da532c">
	    <meta name="theme-color" content="#ffffff">
		<meta charset="UTF-8">
		<title>Login</title>
		<?php include_once'./cdn/cdn.php'; ?>
		<link rel="stylesheet" href="./public/css/default.css"/>
		<link rel="stylesheet" href="./public/css/footer.css"/>
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
		<div class="row">
				<div class="col-md-6 ml-auto slider1 color1"><br>
					<br>
					<br>
			        <p>
				        <img src="./public/img/logos/logouls.png" width="200px" alt="Logo-ULS">
				        <h3>Universidad Luterana Salvadoreña</h3>
			        </p>
			        <span class=""><h4>Sistema de Comunicacion de empleos y ofertas academicas para Egresados<br></h4></span>
		    	</div>
		    	<div class="col-md-6 ml-auto slider2 color2 transparente form-group" style="display:block;text-align:center;" ><br><br> <br> <br>
			    	<div class="row">
						<div class="col-md-3 ml-auto"></div>
						<div class="col-md-6 ml-auto">
						<?php  
							if (isset($_REQUEST['mensaje'])) 
							{
								$mensaje = base64_decode($_REQUEST['mensaje']);
								echo '<label for="">'.$mensaje.'</label>';
							}
						?>
							<span >
			                	<h4><b>Iniciar Sesión</b></h4>
			              	</span><br>
							<form action="./controller/controller_login.php" method="POST">
								<div class="input-group mb-3">
					             <div class="input-group-prepend">
					                <label class="input-group-text" for="inputGroupSelect01"><img src="./public/img/login/sesion2.png" width="25px" alt=""></label>
					              </div>
					              <input type="text" name="usuario" class="form-control" placeholder="Ingrese Usuario" />  
					            </div>
					            <div class="input-group mb-3">
					              <div class="input-group-prepend">
					                <label class="input-group-text" for="inputGroupSelect01"><img src="./public/img/login/passw2.png" width="25px" alt=""></label>
					              </div>
					              <input type="password" name="password" class="form-control" placeholder="Ingrese Contraseña" />  
					            </div>

					            <button  type="submit" name="login" class="btn btn-primary" value="Iniciar Sesion">Iniciar Sesión </button>
							</form><br><br>
						
							<form action="./view/pass/recuperar.php" method="POST">
								<button class="btn btn-primary" type="submit" name="olvide" >He olvidado mi contraseña</button>
							</form>
			            
						</div>
						 <div class="col-md-3 ml-auto">
							<!--<a href="#">Registrarse</a>-->
						</div> 
					</div>
		    	</div>
			</div>
		</div>
		<footer style="text-align: center;"><br>Todos los Derechos Reservados. Universidad Luterana   Salvadoreña  
	      <?php 
		      $fecha_creacion = "2019";
		      $fecha = date("Y");
		      if ($fecha_creacion == $fecha) 
		      {
		        echo $fecha;
		      }
		      else
		      {
		        echo $fecha_creacion ." - ". $fecha;
		      }
	      ?>&nbsp;&nbsp;
	      <img src="./public/img/footer/cc.png" width="60px" alt="cc">
	    </footer>
	</body>
</html>
