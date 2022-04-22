<?php

include_once "../models/CargaMasivaModel.php";
include_once '../vendor/autoload.php';


//Instanciamos la clase, para poder llamar sus metodos.
$cargaMasiva = new CargaMasivaModel();

switch($_GET["op"])
{
    
    case 'cargarArchivo':
        $formatosPermitidos =  array('xls','xlsx');
        $archivo = $_FILES['inputFile']['name'];
        $extension = pathinfo($archivo, PATHINFO_EXTENSION);
        if (!in_array($extension, $formatosPermitidos)) {
            echo 0;
        }else{
            $archivoExcel=round(microtime(true)).'.'.$extension; 
            //Subimos el archivo a la carpeta files del proyecto. 
            move_uploaded_file($_FILES['inputFile']['tmp_name'], "../files/".$archivoExcel);
            $rspta=$cargaMasiva->cargaMasivaProductos($archivoExcel);
            echo json_encode($rspta);

        }
        
    break;
    
    default: "La opcion no se encuentra disponible.";

}
?>

