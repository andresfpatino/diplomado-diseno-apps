
<?php 
	session_start();
	include("php/Conexion.php");
	
 ?>


<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Login | App registro de notas</title>
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
			            	<img class="img-responsive logo" src="css/logo.png" height="200" width="200">
			             	<!-- <h1 class="text-center login-title">Inicio de sesión</h1> -->
			                <form class="form-signin" method="POST">
				                <input name="usuario" type="text" class="form-control" placeholder="Ingrese su usuario" required autofocus>
				                <input name="password" type="password" class="form-control" placeholder="Ingrese su constraseña" required>

				              	
				                <button name="login" type="submit" class="button btn btn-lg btn-primary btn-block" >Iniciar sesión</button>
				               
			            		<a href="register.php" class="text-center new-account">Crear una cuenta</a>
				                <span class="clearfix"></span>
			                </form>
			            </div>
			        </div>
			    </div>
			</div>
		</div>

	</div>

		
	<?php 
			class login extends Conexion{

			public function __construct($s=NULL,$u=NULL,$c=NULL,$b=NULL){
			is_null($s) ? $s="localhost" : $s;
			is_null($u) ? $u="root" : $u;
			is_null($c) ? $c="root" : $c;
			is_null($b) ? $b="diplomado" : $b;

			parent::__construct($s,$u,$c,$b);
		}

			public function loguear() {
				if (isset($_POST['login'])) {
			
			$usuario = $_POST['usuario'];
			$password = $_POST['password'];
			$log =mysqli_query($this->conectar,"SELECT * FROM docente WHERE usuario ='$usuario' AND clave = '$password'");

			if (mysqli_num_rows($log)>0) {

				$row =mysqli_fetch_array($log);
				$_SESSION["usuario"] = $row['usuario'];
				echo '<script> location="content.php";</script>';

			}else{
					echo "<div class='row'>
							<div class='col-xs-12'>
								<div class='alert alert-dismissible alert-danger'>
									<button type='button' class='close' data-dismiss='alert'>×</button>
										<strong>Error</strong>
										Usuario o contraseña incorrectos.
								</div>
							</div>
						</div>";
				}

			}
				}
			}
				
		$loguear = new login();
		$loguear->loguear();

	 ?>
	
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
