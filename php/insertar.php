<?php 

	 function __autoload($url){
	 	require $url.".php";
	 }

	$mipersona=new Manipulacion();
	$mipersona->mitabla="docente";
	$mipersona->capturar();
	$mipersona->insertar();
 ?>

