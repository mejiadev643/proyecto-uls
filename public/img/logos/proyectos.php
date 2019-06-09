<?php  
	require_once '../models/conexion.php';
	require_once '../models/consultas_proyectos.php';
	require '../controllers/cargar_proyectos.php';
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<link rel="apple-touch-icon" sizes="180x180" href="../icon/apple-touch-icon.png">
	    <link rel="icon" type="image/png" sizes="32x32" href="../icon/favicon-32x32.png">
	    <link rel="icon" type="image/png" sizes="16x16" href="../icon/favicon-16x16.png">
	    <link rel="manifest" href="../icon/site.webmanifest">
	    <link rel="mask-icon" href="../icon/safari-pinned-tab.svg" color="#5bbad5">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <meta name="msapplication-TileColor" content="#da532c">
	    <meta name="theme-color" content="#ffffff">
		<meta charset="UTF-8">
		<title>Proyectos FESOL</title>
		<?php include_once'../cdn/cdn.php'; ?>
		<link rel="stylesheet" href="../public/css/default.css"/>
	</head>
	<body class="fondo">
		<div class="container-fluid">
			<?php $id_version = base64_decode($_REQUEST['id_version']); ?>
			<button class="btn"><a href="fesol.php?id_version=<?php echo base64_encode($id_version); ?>"><img src="../public/img/logos/regresar.png" width="100px" alt=""></a></button>
			<div style="text-align: center;">
				<?php InfoProyectos(base64_decode($_REQUEST['id_asignatura'])); ?>
			</div>
			<div class="row">
				<div class="col-md-2 ml-auto"></div>
				<div class="col-md-8 ml-auto">
					<?php
						BuscarProyectos(base64_decode($_REQUEST['id_asignatura']));
					?>
				</div>
				<div class="col-md-2 ml-auto"></div>
			</div>
		</div>
		
	</body>
</html>