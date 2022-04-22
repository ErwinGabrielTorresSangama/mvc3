<?php
	
	//Vamos a requerir el la ruta modelos para llamar al metodo de la clase getViewsModel
    include_once "models/RoutesModel.php";

	class viewController extends routesModel{

		public function getCtrTemplate()
        {
			
            return include_once "./views/template.php";
		}

		public function getCtrViews()
        {
			$ruta= !empty($_GET['url']) ? $_GET['url'] : 'login';
			if(isset($_GET['url'])){
				$ruta=explode("/", $_GET['url']);
                
				$respuesta=routesModel::getViewsModel($ruta[0]);
                //var_dump("xxx".$respuesta);
			}else{
				$respuesta="login";
			}
			return $respuesta;
		}
	}