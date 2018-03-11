 <?php 
 function __autoload($url){
	 	require $url.".php";
	 }
 	$estudiante=new Manipulacion();
 	$estudiante->mitabla="estudiante";
 	$estudiante->capturar();
 	$estudiante->insertarE();
 ?>