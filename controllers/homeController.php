<?php

require_once "../models/HomeModel.php";

//Instanciamos la clase, para poder llamar sus metodos.
$home = new HomeModel();

//Capturamos los valores de POST que vienen de la vista,
//La funcion  trim de php elimina los espacios en blanco al inicio y al final de un texto.
$idRol          = isset($_POST["selectTipRol"]) ? trim($_POST["selectTipRol"])  :"";


switch($_GET["op"])
{
    
    case 'traerDatosHome':

            $rspta = $home->traerData();
            $arreglo = array(); 
            while($row = $rspta->fetchObject())
            {
                 $arreglo = $row;
    
            }
            echo json_encode($arreglo);
    break;

    case 'llenarGrafBarras':
            $rspta = $home->llenarGrafBarras();
            $arreglo = array(); 
            while($row = $rspta->fetchObject())
            {
                 $arreglo[] = $row;
    
            }
            echo json_encode($arreglo);

    break;

    case 'productosMasVendidos':
        $rspta = $home->productosMasVendidos();
        $data = Array();

        $i = 1;
        while($reg=$rspta->fetchObject())
        //con el $reg voy a ir recorriendo una a uno todos los metodos
        // y lo voy a ir trabajando de manera independiente.
        {
            
            //voy a especificar que todos los datos obteneidos lo voy almacenar
            //en el array $data[], dentro de los parentesis voy a indicarle uno a uno
            //los valores, mediante indices
            $data[]=array
            (
                //en el indice "0" => quiero que me muestre de mi tabla categorias el campo 
                "0"=>$i,
                "1"=>$reg->codigo_producto, //en el registro 0, voy a guardar el campo nombre de mi tabla categoria
                "2"=>$reg->descripcion_producto, //en el registro 1, voy a guardar el campo descripcion de mi tabla categoria
                "3"=>$reg->cantidad,  
                "4"=>'S/. '.$reg->total_venta,                            
            );

            //voy a recorrer entonces todos los registros lo voy a ir almacenando una a uno en $reg y voy a ir almacenando segun los indices
            //"0,1,2,3" los campos(igual el nombre) que estan en mi tabla categoria de mi base de datos 
        $i++;
        }
        //fuera del bluque while voy a declarar un nuevo array que se va llamar $results
        //y le voy a indicar las siguientes instrucciones. 
         $results = array
         (
            "sEcho"=>1, //Informacion para el datables
            "iTotalRecords" =>count($data), //enviamso el total de registros al datable
            "iTotalDisplayRecords" =>count($data), //enviamos el total de registros a visuaizar
            "aaData"=>$data //el array que alamcena todos los registros
        );
        echo json_encode($results); //este array que estamos mostrando va ser utilizado por datable
    break;

    case 'productosPocoStock':
        $rspta = $home->productosPocoStock();
        $data = Array();

        $i = 1;
        while($reg=$rspta->fetchObject())
        //con el $reg voy a ir recorriendo una a uno todos los metodos
        // y lo voy a ir trabajando de manera independiente.
        {
            
            //voy a especificar que todos los datos obteneidos lo voy almacenar
            //en el array $data[], dentro de los parentesis voy a indicarle uno a uno
            //los valores, mediante indices
            $data[]=array
            (
                //en el indice "0" => quiero que me muestre de mi tabla categorias el campo 
                "0"=>$i,
                "1"=>$reg->codigo_producto, //en el registro 0, voy a guardar el campo nombre de mi tabla categoria
                "2"=>$reg->descripcion_producto, //en el registro 1, voy a guardar el campo descripcion de mi tabla categoria
                "3"=>$reg->stock_producto,  
                "4"=>$reg->minimo_stock_producto,                            
            );

            //voy a recorrer entonces todos los registros lo voy a ir almacenando una a uno en $reg y voy a ir almacenando segun los indices
            //"0,1,2,3" los campos(igual el nombre) que estan en mi tabla categoria de mi base de datos 
        $i++;
        }
        //fuera del bluque while voy a declarar un nuevo array que se va llamar $results
        //y le voy a indicar las siguientes instrucciones. 
         $results = array
         (
            "sEcho"=>1, //Informacion para el datables
            "iTotalRecords" =>count($data), //enviamso el total de registros al datable
            "iTotalDisplayRecords" =>count($data), //enviamos el total de registros a visuaizar
            "aaData"=>$data //el array que alamcena todos los registros
        );
        echo json_encode($results); //este array que estamos mostrando va ser utilizado por datable
    break;


    default: "La opcion no se encuentra disponible.";

}
