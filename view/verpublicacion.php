
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<center><h1><?php echo $titulo; ?></h1></center>
	</div><!--end col-->
	<div class="col-xs-12 col-sm-12 col-md-12">
		<center><img src="../../public/img/publicaciones/<?php echo $imagen; ?>" class="img-fluid" alt="Imagen de publicacion" style="height: 20rem; "></center><p></p>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 ">
		<p class="text-justify" ><?php echo $contenido ?></p>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<p style="text-align: right; color: red; font-size: 10px;"><?php echo $carrera; ?></p>
	</div>
	<a href="<?php if($id_publicacion== "2"){echo "academica.php";}else{echo "empleo.php";} ?>">
		<button type="button" class="btn btn-dark"> <<< Volver</button>
	</a>
	
	
</div><!--end row-->
