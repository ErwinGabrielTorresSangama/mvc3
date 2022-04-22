<?php 
	class routesModel{

		protected function getViewsModel($vista)
        {
			//Creamos un array de todas las vistas que existen dentro de la carpeta content.
			$listaBlanca=["home","usuario","roles","permisos","inventario","cargaMasiva","categorias"];
			if(in_array($vista, $listaBlanca)){
				
				if(is_file("./views/content/".$vista."View.php")){
					$contenido="./views/content/".$vista."View.php";
				}else{
					$contenido="login";
				}
			}elseif($vista=="login"){
				$contenido="login";
			}elseif($vista=="index"){
				$contenido="login";
			}else{
				$contenido="error404";
			}
			return $contenido;
		}
	}