<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Cambiar Clave</title>
		<link href="../../public/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-4 ml-auto"></div>
				<div class="col-md-4 ml-auto">
					<form action="../../controller/actu_clave.php" method="POST">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" for=""><img src="../../public/img/login/user.png" width="25px" alt="User"></label>
							</div>
							<input class="form-control" type="text" name="usuario" placeholder="Usuario" required>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" for=""><img src="../../public/img/login/error.png" width="25px" alt="token"></label>
							</div>
							<input class="form-control" type="text" name="token" placeholder="Token" required>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" for=""><img src="../../public/img/login/passw2.png" width="25px" alt="clave"></label>
							</div>
							<input class="form-control" type="password" name="clave_a" placeholder="Nueva Clave" required>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" for=""><img src="../../public/img/login/passw2.png" width="25px" alt="clave"></label>
							</div>
							<input class="form-control" type="password" name="clave_b" placeholder="Repita Clave" required>
						</div>
				        <button class="btn btn-info" type="submit" name="enviar" >Cambiar</button>
				    </form>
				</div>
				<div class="col-md-4 ml-auto"></div>
			</div>
		</div>
		
	    <script src="../../public/js/jquery-1.12.4-jquery.min.js"></script>
	    <script src="../../public/js/bootstrap.min.js"></script>
	</body>
</html>