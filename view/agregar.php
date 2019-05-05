
<!DOCTYPE html>
<html lang="es">
	<head>
    	<!-- Required meta tags -->
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Agregar Egresado</title>
		<?php
        if ($_GET['usuario']=='user')
    		{?>
      			<title>Agregar Moderadores</title>

    		<?php
    	}else
    	{?>
      		<title>Agregar Egresados</title>
    	<?php
    	} 
    	?>
    	<!-- Bootstrap CSS 
		<link href="../public/css/bootstrap.min.css" rel="stylesheet">
		-->
	</head>
	<body><!--inicio de tablas e interacciones-->
			


			
      			<?php
      				if ($_GET['usuario']=='user')
    			{?>
      				<h2 style="text-align: center;">
					Agregar Egresados
      				</h2>

    			<?php
    		}else
    		{?>
      			<h2 style="text-align: center;">
					Agregar Moderadores
      				</h2>
    		<?php
    		} 
    		?>
    		<hr>
			<div class="row">
				<div class="col-xs-12 col-md-4 col-xl-3"></div>
				<div class="col-xs-12 col-md-8 col-xl-6	">
					<form class="bg-dark" style="color: white; padding: 6px;" action="../../controller/create.php" enctype="multipart/form-data" method="post">
  						<div class="form-group ">
    						<label for="formGroupExampleInput">Carnet</label>
    						<input type="text" class="form-control" id="carnet" name="carnet" placeholder="carnet" >
  					    </div>
  					   <div class="row">
  							<div class="col">
    							<label for="formGroupExampleInput">Nombre</label>

      							<input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre del usuario" >
    						</div>
    						<div class="col">
    							<label for="formGroupExampleInput">Apellido</label>
      					   	<input type="text" class="form-control" id="apellido" name="apellido" >
    						</div>
    					</div>
    					<div class="form-group ">
    						<label for="formGroupExampleInput">telefono</label>
    						<input type="text" class="form-control" id="telefono" name="telefono"placeholder="xxxx-xxxx" >
  					    </div>
  					    <div class="form-group ">
    						<label for="formGroupExampleInput">direccion</label>
    						<input type="text" class="form-control" id="direccion" name="direccion" placeholder="barrio, ciudad, departamento">
  					    </div>
  					    <div class="form-group ">
    						<label for="formGroupExampleInput">correo electronico</label>
    						<input type="text" class="form-control" id="correo" name="correo"placeholder="micorreo@mail.com" >
  					    </div>
  					   
  					    
  					    <div class="form-group ">
    						<label for="formGroupExampleInput">contraseña</label>
    						<input type="text" class="form-control" id="contrasena" name="contrasena" placeholder="contraseña" >
  					    </div>
                <div>
                  <input hidden type="file" name="imagen">
                </div>
  					    
    					<div class="form-group"><!-- hago una entrada de nueva imagen-->
                  			<input hidden  name="tipousuario"  type="int" value="<?php if($_GET['usuario']=='user'){echo '1';}else{echo '2';} ?>" />
                  			

  						</div>
  						
  							<?php if ($_GET['usuario']=='user'){ ?>
  						   <div class="form-group">
  							<label>Carrera a la que pertenecio:</label>
  								<select class="form-control" name="carrera">
      							<option value="1">Lic. en Ciencias de la Computación</option>
      							<option value="2">Ing. Agroecologica</option>
      							<option value="3">Lic. en Ciencias Juridicas</option>
      							<option value="4">Lic. en contaduria publica</option>
      							<option value="5">Lic. en Administración de Empresas</option>
      							<option value="6">Tecnico en Desarrollo de Aplicaciones Informaticas</option>
      							<option value="7">Lic. en Trabajo Social</option>
      							<option value="8">Lic. en Teologia</option>
    						</select>
    						</div>

  					   <?php
  						}
  						?>
    					

    					
  					    
  					    <div class="form-group"><!-- echo de la imagen que se ha guardado-->
  					    	
  					    	<button class="btn btn-info" type="submit" name="create">Crear</button>
  					    	<a href="../Panel_admin.php">
  					    	<button class="btn btn-danger" name="cancel">Cancelar</button></a>
  					    	</a>
							
  					    </div>
					</form>

					
        			

				</div>
				<div class="col-xs-12 col-md-4 col-xl-3"></div>
			</div>
			
		
		<!--<script src="../public/js/jquery-1.12.4-jquery.min.js"></script>
      	<script src="../public/js/bootstrap.min.js"></script>-->
	</body>
</html>


