

<?php  
    session_start();
    
    if (isset($_SESSION['usuario'])) {
?>

<?php  
     function __autoload($url){
    require $url.".php";
  }
?>


<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detalle estudiante | App teacher helper</title>

    <!-- Bootstrap Core CSS -->
   <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/main.css">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="../css/material.min.css">


</head>

<body>



    <div id="wrapper">

        <!-- Sidebar -->
           <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a >App teacher Helper </a></li>
                <li>
                    <a href="lista-grados.php"><i class="fa fa-mortar-board"></i>&nbsp;Mis grados</a>  
                </li>
                <li>
                    <a href="estudiantes.php"><i class="fa fa-mortar-board"></i>&nbsp;Mis alumnos</a>  
                </li>
            </ul>
            <a href="../content.php"><img class="logo-menu img-responsive" src="../css/logo.png" height="80" width="80"></a>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                 <div class="row">
                    <div class="col-xs-2">
                        <a href="#menu-toggle" class="btn btn-link menu" id="menu-toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <div class="col-xs-10" style="text-align: right;">
                        <p class="name">Hola, <strong> <?php echo $_SESSION['usuario'] ?></strong></p> &nbsp;
                        <a id="mostrar-menu-secundario" class="btn btn-link"><i class="fa fa-ellipsis-v" style="font-size: 25px;color:#037CA8;"></i></a>
                        
                        <ul class="menu-bar menu-secundario">
                            <li><a href="php/logOut.php">Cerrar sesión</a></li>
                        </ul>

                    </div>
                </div>
                <br>

                <div class="container">
                    <div class="row">
                        <h2 style="text-align: center">Detalle estudiante</h2>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <center>                         
                              <?php 
                                $perfil = new Manipulacion();
                                $perfil->mitabla="estudiante";
                                $perfil->mostrarEperfil($_GET['code']);
                              ?>   
                              <div id="verde" style="display:none;" class="alert alert-dismissible alert-success">
                                  <button type="button" class="close" data-dismiss="alert">×</button>
                                  <strong id="mfinal" style="font-size: 20px;"></strong> 
                               </div> 
                            </center>
                               
                        </div>
                    </div>
                </div>

        </div>

    </div>
  
    
    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

    <script type="text/javascript">
        $.material.init()
    </script>

</body>

</html>

<?php
    }else{

        print '<script> window.location="login.php"; </script>';
    }

    $profile = $_SESSION['usuario'];

 ?>