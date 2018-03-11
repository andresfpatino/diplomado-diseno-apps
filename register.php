
	<?php 

	function __autoload($url){
		require $url.".php";
	}

	
 ?>
 

<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Registro | App registro de notas</title>
	<meta name="description" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.2, user-scalable=no">

	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/material.min.css">
	

</head>
<body class="demo">
	<!-- content -->			
	<div id="demo-content">

		<div id="loader-wrapper">
			<div id="loader"></div>
			<div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
		</div>

		<div>
			<div class="container">
			    <div class="row">
			        <div class="col-sm-6 col-md-4 col-md-offset-4">
			            <div class="account-wall">
			             	<h1 class="text-center login-title">Registro</h1>
				                <form  action="php/insertar.php"  class="form-signin" method="POST">
				             		<p class="text-center">Hola, registrate para usar la aplicación</p>
				               		<input name="nombre" type="text" class="form-control" placeholder="Ingrese su nombre" required autofocus>
					                <input name="usuario" type="text" class="form-control" placeholder="Ingrese un usuario" required>
					                <input name="correo" type="email" class="form-control" placeholder="Ingrese su correo" required>
					                <input name="clave" type="password" class="form-control" placeholder="Ingrese una constraseña" required>

						            <div style="display:none" class="mensaje alert alert-dismissible alert-success">
							            <button type="button" class="close" data-dismiss="alert">×</button>
							            <strong>Exito!</strong> te has registrado satisfactoriamente
							        </div>

					              	<button type="submit" class="button btn btn-lg btn-primary btn-block" >Registrarme</button>
					               
				            		<a href="login.php" class="text-center new-account">¿Ya tienes cuenta?, inicia sesión</a>
					                <span class="clearfix"></span>
				                </form>


			            </div>
			        </div>
			    </div>
			</div>
		</div>

	</div>

			
	<!-- /content -->
	<script type="text/javascript" src="js/vendor/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/material.min.js"></script>
	<script src="js/main.js"></script>

	<script type="text/javascript">
		$.material.init()
	</script>


</body>
</html>
