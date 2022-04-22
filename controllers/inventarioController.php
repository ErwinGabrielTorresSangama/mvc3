<?php

include_once "../models/InventarioModel.php";

//Instanciamos la clase, para poder llamar sus metodos.
$inventario = new InventarioModel();

//Capturamos los valores de POST que vienen de la vista,
//La funcion  trim de php elimina los espacios en blanco al inicio y al final de un texto.

$idProducto         = isset($_POST["inputIdProducto"]) ? trim($_POST["inputIdProducto"])  :"";
$codProducto          = isset($_POST["inputCodBarras"])  ? trim($_POST["inputCodBarras"])   :"";
$idCategoria        = isset($_POST["selectCategoria"]) ? trim($_POST["selectCategoria"])  :"";
$descripProducto    = isset($_POST["inputDescripcion"])  ? trim($_POST["inputDescripcion"])   :"";
$preCompra          = isset($_POST["inputPreCompra"]) ? trim($_POST["inputPreCompra"])  :"";
$precVenta          = isset($_POST["inputPreVenta"])   ? trim($_POST["inputPreVenta"])    :"";
$utilidad           = isset($_POST["inputUtilidad"])   ? trim($_POST["inputUtilidad"])    :"";
$stock              = isset($_POST["inputStock"]) ? trim($_POST["inputStock"])  :"";
$minStock           = isset($_POST["inputMinimoStock"])    ? trim($_POST["inputMinimoStock"])     :"";

switch($_GET["op"])
{
    
    case 'guardar':
    
        if(empty($$idProducto))
        {
            //vamos a insertar
            $rspta = $inventario->insertarProducto($codProducto,$idCategoria,$descripProducto,$preCompra,$precVenta,$utilidad,$stock,$minStock); 
            echo $rspta;
                       
            //Caso contrario vamos a editar
        }else //Si la variable idUsuario viene llena, es decir no esta vacia, entonces quiero editar
        {
           $rspta = $inventario->editarProducto($idUsuario,$idRol,$tipoDocumento,$numDocumento,$nombres,$apePaterno,$apeMaterno,$nameUsu,$password,$correo,$celular,$telefono,$direccion,$imagen); 
           echo $rspta;
           
        }

    break;
    

    case 'listarInventario':
            $rspta=$inventario->listarInventario();
            //Vamos a declarar un array  que se va llamar $data
            //para almacenar todos los registros que voy a listar
            $data = Array();
            $i=1;

            //mediante una estructura interactiva while voy ha recorrer
            //todos los registros que voy a obtener de mi tabla usuarios
            
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
                    "0"=>$reg->detalles,
                    "1"=>$i,
                    "2"=>$reg->codigo_producto, //en el registro 0, voy a guardar el campo nombre de mi tabla categoria
                    "3"=>$reg->nombre_categoria, //en el registro 1, voy a guardar el campo descripcion de mi tabla categoria
                    "4"=>$reg->descripcion_producto,
                    "5"=>$reg->precio_compra_producto,
                    "6"=>$reg->precio_venta_producto,
                    "7"=>$reg->utilidad,
                    "8"=>$reg->stock,
                    "9"=>$reg->minimo_stock_producto,
                    "10"=>$reg->ventas_producto,
                    "11"=>$reg->fecha_creacion_producto,
                    "12"=>$reg->fecha_actualizacion_producto,
                    "13"=>'<button type="button" class="btn btn-icon waves-effect btn-warning btn-sm"  title="Editar producto" onclick="editarProducto()"><i class="mdi mdi-lead-pencil"></i></button>'.
                    ' <button type="button" class="btn btn-icon waves-effect btn-danger btn-sm"   onclick="eliminarProducto()" ><i class=" mdi mdi-trash-can" title="Eliminar producto"></i></button>'.
                    '&nbsp&nbsp'. 
                    '<div class="btn-group"><button type="button" class="btn btn-icon waves-effect btn-success btn-sm" title="Ver usuario" onclick="verDatosUsuario()"><i class="fas fa-plus-circle"></i></button>&nbsp&nbsp'.
                    '<button type="button" class="btn btn-icon waves-effect btn-info btn-sm"   onclick="editarUsuario()" ><i class="fas fa-minus-circle" title="Editar usuario"></i></button>'.
                    '&nbsp&nbsp' . '<div class="btn-group">'                 
                );
                $i++;

                //voy a recorrer entonces todos los registros lo voy a ir almacenando una a uno en $reg y voy a ir almacenando segun los indices
                //"0,1,2,3" los campos(igual el nombre) que estan en mi tabla categoria de mi base de datos 
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

    case 'listarSelectCat':

        $rspta =$inventario->listarSelectCat(); 
        $arreglo = array(); 
        while($row = $rspta->fetchObject())
        {
             $arreglo[] = $row;

        }
        echo json_encode($arreglo);
    

    break;


    default: "La opcion no se encuentra disponible.";

}
?>
