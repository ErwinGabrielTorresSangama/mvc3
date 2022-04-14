<?php

	require_once "./config/configGeneral.php";
	require_once "./controllers/routesController.php";

    //Traer la plantilla, instanciamos la clase y llamamos el metodo.
	
	$plantilla = new viewController();
	$plantilla->getCtrTemplate();





?>