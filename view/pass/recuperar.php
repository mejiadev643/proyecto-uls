<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Recuperar Clave</title>
	</head>
	<body>
		<?php  
			if (isset($_POST['olvide']) || isset($_GET['error_tipo_usuario'])) 
			{
		?>
				<form action="../../controller/verificar.php" method="POST">
					<!-- <label for="">Tipo Usuario</label><br>
					<label for="">Operador
						<input type="checkbox" name="tipo[]" value="2">
					</label>
					<label for="">Usuario
						<input type="checkbox" name="tipo[]" value="3">
					</label>
					<br> -->
					<label for="">Usuario: </label><br>
					<input type="text" name="usuario" required><br>
					<label for="">Correo Electronico: </label><br>
					<input type="email" name="correo" required><br><br>
					<button type="submit" name="procesar">Enviar</button>
				</form>
		<?php
			}
		?>
	</body>
</html>