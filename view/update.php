
<!DOCTYPE html>
<html lang="es">
	<head>
    	<!-- Required meta tags -->
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Actualizar usuario</title>
    	<!-- Bootstrap CSS -->
		<link href="../../public/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body><br>
		<div class="container">
		</div>

			<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-4 col-xl-3"></div>
				<div class="col-xs-12 col-md-8 col-xl-6	">
					<form class="bg-dark" style="color: white; padding: 6px;" action="../../controller/update.php" enctype="multipart/form-data" method="post">
  						<div class="form-group ">
                <?php if ($_SESSION['tipo']!=1) {?>
                  <label for="formGroupExampleInput">Carnet</label>
                <input type="text" class="form-control" id="carnet" name="carnet" placeholder="<?php echo $carnet;?>" value="<?php echo $carnet;?>">
               <?php 
               }else{?>
                <input hidden type="text" class="form-control" id="carnet" name="carnet" placeholder="<?php echo $carnet;?>" value="<?php echo $carnet;?>">
                  
                <?php
              } ?>
    						
  					    </div>
  					   <div class="row">
  							<div class="col">
    							<label for="formGroupExampleInput">Nombre</label>

      							<input type="text" class="form-control" id="nombre" name="nombre" placeholder="<?php echo $nombre;?>" value="<?php echo $nombre;?>">
    						</div>
    						<div class="col">
    							<label for="formGroupExampleInput">Apellido</label>
      					   	<input type="text" class="form-control" id="apellido" name="apellido" placeholder="<?php echo $apellido;?>" value="<?php echo $apellido;?>">
    						</div>
    					</div>
    					<div class="form-group ">
    						<label for="formGroupExampleInput">telefono</label>
    						<input type="text" class="form-control" id="telefono" name="telefono"placeholder="<?php echo $telefono;?>" value="<?php echo $telefono;?>">
  					    </div>
  					    <div class="form-group ">
    						<label for="formGroupExampleInput">direccion</label>
    						<input type="text" class="form-control" id="direccion" name="direccion" placeholder="<?php echo $direccion;?>" value="<?php echo $direccion;?>">
  					    </div>
  					    <div class="form-group ">
    						<label for="formGroupExampleInput">correo electronico</label>
    						<input type="email" class="form-control" id="correo" name="correo"placeholder="<?php echo $correo;?>" value="<?php echo $correo;?>">
  					    </div>
  					    
  					    <div class="form-group ">
    						<label for="formGroupExampleInput">contraseña</label>
    						<input type="text" class="form-control" id="contrasena" name="contrasena" placeholder="<?php echo $contrasena;?>" value="<?php echo $contrasena;?>">
  					    </div>
  					    
    					<div class="form-group"><!-- hago una entrada de nueva imagen-->
    						<label for="exampleFormControlFile1" >Insertar nueva imagen</label>
    						<input  class="form-control-file" id="imagen2" name="imagen2" type="file" >

  						</div>

    					<div style=" margin-top: 15px; margin-left: 30px;">
                       		<img src="../../public/img/foto_user/<?php echo $foto; ?>" class="img-fluid" style="width: 100px; height: 100px"  alt="FOTO_USER">
                       					
              </div><br>
  					    
  					    <div class="form-group"><!-- echo de la imagen que se ha guardado-->
  					    	<input hidden id="imagen1" name="imagen1"  type="text" value="<?php echo $foto; ?>" />

  					    	<input hidden id="" name="id"  type="text" value="<?php echo $id; ?>" />
                  <input hidden  name="tipousuario"  type="text" value="<?php echo $tipousuario; ?>" />
  					    	
  					    	<button class="btn btn-info" type="submit" name="actualizar">Actualizar</button>
  					    	<button class="btn btn-danger" name="cancel">Cancelar</button></a>
							
  					    </div>
					</form>

					
        			

				</div>
				<div class="col-xs-12 col-md-4 col-xl-3"></div>
			</div>
			</div>
		
		<script src="../../public/js/jquery-1.12.4-jquery.min.js"></script>
      	<script src="../../public/js/bootstrap.min.js"></script>
	</body>
</html>