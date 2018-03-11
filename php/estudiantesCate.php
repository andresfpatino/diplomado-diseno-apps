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
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Estudiantes | App teacher Helper</title>

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
                    <div class="row" style="display:none;">
                        <form role="form">
                          <div class="form-group">
                            <input type="text" class="form-control empty" id="iconified" placeholder="&#xF002;"/>
                          </div>
                        </form>
                    </div>
                </div>

                <h2>Estudiantes / Grado</h2>
                <hr>
                <p style="text-align: justify;">Aquí encontraras el filtro de los alumnos registrados en un grado determinado</p>
                <p style="text-align: justify;">
                  Pulsando en el icono <i class="fa fa-info-circle"></i> veras el detalle y nota del mismo
                </p>

                <p style="text-align: justify;">Para agregar un nuevo alumno, presiona el botón situado en la parte inferior</p>


                <div class="row">
                    <div class="col-md-12">
                        <div class="list-group">

                            <div class="list-group-separator"></div>

                              <?php 

                                  $estudiantes = new Manipulacion();
                                  $estudiantes->mitabla="estudiante";
                                  $estudiantes->mostararEcate($_GET['code'],$_GET['get']);

                              ?>
                            

                        </div>
                    </div>
                </div>

                <div class="row">
                   <div class="col-md-12">
                       <a class="btn btn-success new" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" style=" padding: 15px;font-size: 20px;"></i></a>
                   </div> 
                </div>

                <div class="modal" id="myModal" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Agrega un nuevo estudiante</h4>
                      </div>
                      <div class="modal-body">
                        <form id="estudiantes" class="form-horizontal" enctype="multipart/form-data" method="POST">
                            <div class="mensaje"></div>
                            <div class="form-group">
                              <div class="col-md-12">
                                <input class="form-control"  name="nombre" placeholder="Nombre" type="text">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-12">
                                <input class="form-control" name="correo" placeholder="correo" type="email">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-12">
                                <input class="form-control" name="grado" placeholder="Grado" type="text">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-12">
                                <input class="form-control" name="grupo" placeholder="Grupo" type="text">
                              </div>
                            </div>

                          <input type="file" name="foto">
                          <!-- <div class="form-group is-fileinput">
                            <input id="inputFile4" multiple="" type="file" name="foto">
                            <div class="input-group">
                              <input readonly="" class="form-control" placeholder="Placeholder w/file chooser..." type="text">
                                <span class="input-group-btn input-group-sm">
                                  <button type="button" class="btn btn-fab btn-fab-mini">
                                    <i class="material-icons">attach_file</i>
                                  </button>
                                </span>
                            </div>
                          <span class="material-input"></span></div> -->
                          <hr>
                          <button type="submit" class=" button btn btn-primary" id="b">Guardar</button>
                        </form>

                      </div>

                    </div>
                  </div>
                </div>

            </div>
        </div>

    </div>
  
    
    <script type="text/javascript" src="../js/vendor/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/material.min.js"></script>
    <script src="../js/main.js"></script>

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

        print '<script> window.location="../login.php"; </script>';
    }

    $profile = $_SESSION['usuario'];

 ?>