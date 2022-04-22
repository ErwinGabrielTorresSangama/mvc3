<?php

	require_once "./config/configGeneral.php";
	require_once "./controllers/routesController.php";

    //Traer la plantilla, instanciamos la clase y llamamos el metodo.
	
	$plantilla = new viewController();
	$plantilla->getCtrTemplate();
	
/*Mostrar url
	$host = $_SERVER["HTTP_HOST"];
	$url = $_SERVER["REQUEST_URI"];
	echo "http://" . $host . $url;
*/
