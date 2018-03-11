
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

    <title>Lista grados | App teacher Helper</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/material.min.css">

</head>

<body>

    <div id="wrapper" >

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
                <div class="row">
                    <div class="col-md-12">
                        <h2> Mis grados</h2>
                        <p style="text-align:justify">
                          Aquí encontraras 3 grados determinados y sus grupos correspondientes.
                        </p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                              <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Sexto
                                </a>
                              </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                              <div class="panel-body">
                                 <?php 
                                    $grupos = new Manipulacion();
                                    $grupos->grado = "6";
                                    $grupos->mostrarEgrupo();
                                 ?>
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                              <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Septimo
                                </a>
                              </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <?php
                                     $grupos = new Manipulacion();
                                     $grupos->grado = "7";
                                     $grupos->mostrarEgrupo();
                                ?>
                            </div>
                          </div>

                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                              <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Octavo
                                </a>
                              </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                              <div class="panel-body">
                                 <?php 
                                    $grupos = new Manipulacion();
                                    $grupos->grado = "8";
                                    $grupos->mostrarEgrupo();
                                 ?>
                              </div>
                            </div>
                          </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    


    <!-- jQuery -->
    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.min.js"></script>

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