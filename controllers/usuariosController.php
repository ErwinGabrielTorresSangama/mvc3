<?php

require_once "../models/UsuariosModel.php";

//Instanciamos la clase, para poder llamar sus metodos.
$usuario = new UsariosModel();

//Capturamos los valores de POST que vienen de la vista,
//La funcion  trim de php elimina los espacios en blanco al inicio y al final de un texto.
$idRol          = isset($_POST["selectTipRol"]) ? trim($_POST["selectTipRol"])  :"";
$idUsuario      = isset($_POST["inputIdUser"])  ? trim($_POST["inputIdUser"])   :"";
$tipoDocumento  = isset($_POST["selectTipDoc"]) ? trim($_POST["selectTipDoc"])  :"";
$numDocumento   = isset($_POST["inputNumDoc"])  ? trim($_POST["inputNumDoc"])   :"";
$nombres        = isset($_POST["inputNombres"]) ? trim($_POST["inputNombres"])  :"";
$apePaterno     = isset($_POST["inputApePa"])   ? trim($_POST["inputApePa"])    :"";
$apeMaterno     = isset($_POST["inputApeMa"])   ? trim($_POST["inputApeMa"])    :"";
$nameUsu        = isset($_POST["inputUsuario"]) ? trim($_POST["inputUsuario"])  :"";
$password       = isset($_POST["inputPass"])    ? trim($_POST["inputPass"])     :"";
$correo         = isset($_POST["inputCorreo"])  ? trim($_POST["inputCorreo"])   :"";
$celular        = isset($_POST["inputCel"])     ? trim($_POST["inputCel"])      :"";
$telefono       = isset($_POST["inputTel"])     ? trim($_POST["inputTel"])      :"";
$direccion      = isset($_POST["inputDirecc"])  ? trim($_POST["inputDirecc"])   :"";
$imagen         = isset($_POST["inputFile"])    ? trim($_POST["inputFile"])     :"";
//GenerarUsuario
$nombresUser    = isset($_POST["nombresUser"])  ? trim($_POST["nombresUser"])    :"";
$apePaternoGen  = isset($_POST["apePaterno"])   ? trim($_POST["apePaterno"])     :"";



switch($_GET["op"])
{
    
    case 'guardar':
        //Si el usuario no a seleccionado ningun archivo en el objeto fornulario imgen,
        //Si no existe ningun archivo seleccionado  o si no ha sido cargado ningun archivo en el campo imagen del fornulario
        if(!isset($_FILES['inputFile']['tmp_name']) || !is_uploaded_file($_FILES['inputFile']['tmp_name'])) 
        {
            //la variable imagen va ser igual a vacia. Al momento de editar vamo a tener un inconveniente pero lo vamos arreglar 
            $imagen =" ";
            //caso contrario por seguridad para que los usuarios no suban codigo malicioso
        }else
        {
            print_r($imagen);
            //vamos obtener la extension de nuestro archivo
            $ext = explode(".", $_FILES['inputFile']['name']);
            //validar el tipo de extension que vamos a permitir
            //si mi objeto imagen es igual a tipo jpg
            if($_FILES['inputFile']['type'] =='image/jpg' || $_FILES['inputFile']['type'] =='image/jpeg' || $_FILES['inputFile']['type'] =='image/png')
            {
                //se va cargar en unca carpeta dentro de nuestro sistema
                //en nombre d ela variable se va renombrar urtilizando la funcion microtime(con un formato de tiempo)
                $imagen=round(microtime(true)).'.'.end($ext); 

                //subimos el archivo
                move_uploaded_file($_FILES['inputFile']['tmp_name'], "../views/images/files/" .$imagen);
            }
        }

       

        //Rempplazmos el atributo $clave por claveHash 
        if(empty($idUsuario)) //Si $idUsuario no esta vacio
        {
             //Encriptando la clave a HASH SHA256 
            $claveHash = hash("SHA256",$password);
            $rspta = $usuario->insertarUsuario($idRol,$tipoDocumento,$numDocumento,$nombres,$apePaterno,$apeMaterno,$nameUsu,$claveHash,$correo,$celular,$telefono,$direccion,$imagen); 
            echo $rspta;
                       

        }else //Si la variable idUsuario viene llena, es decir no esta vacia, entonces quiero editar
        {
           $rspta = $usuario->editarUsuario($idUsuario,$idRol,$tipoDocumento,$numDocumento,$nombres,$apePaterno,$apeMaterno,$nameUsu,$password,$correo,$celular,$telefono,$direccion,$imagen); 
           echo $rspta;
           
        }

    break;
    

    case 'desactivarUsuario':

            $rspta = $usuario->desactivarUsuario($idUsuario);
            echo $rspta;
    break;
    
    case 'activarUsuario':
            $rspta =$usuario->activarUsuario($idUsuario);
            echo $rspta;

    break;

    case 'listarSelectTipDoc':

        $rspta =$usuario->listarSelectTipDoc(); 
        $arreglo = array(); 
        while($row = $rspta->fetchObject())
        {
             $arreglo[] = $row;

        }
        echo json_encode($arreglo);
    

    break;

    case 'listarSelectRol':

        $rspta =$usuario->listarSelectRol(); 
        $arreglo = array(); 
        while($row = $rspta->fetchObject())
        {
             $arreglo[] = $row;

        }
        echo json_encode($arreglo);
    

    break;


    case 'listar':
            $rspta=$usuario->listarUsuarios();
            //Vamos a declarar un array  que se va llamar $data
            //para almacenar todos los registros que voy a listar
            $data = Array();

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
                    "0"=>$reg->nro,
                    "1"=>$reg->nombreRol, //en el registro 0, voy a guardar el campo nombre de mi tabla categoria
                    "2"=>$reg->nombres, //en el registro 1, voy a guardar el campo descripcion de mi tabla categoria
                    "3"=>$reg->apellidoCompleto,
                    "4"=>($reg->estadoUsuario) == '1' ?'<span class="badge badge-success">Activado</span>': '<span class="badge badge-danger">Desactivado</span>',
                    "5"=>($reg->estadoUsuario) == '1' ?'<button type="button" class="btn btn-icon waves-effect btn-info btn-sm" onmouseover="btnVerUsuario()"  title="Ver usuario" onclick="verDatosUsuario('.$reg->idUsuario.')"><i class="mdi mdi-eye"></i></button>'.
                    ' <button type="button" class="btn btn-icon waves-effect btn-warning btn-sm" onmouseover="btnEditarUsuario()"  onclick="editarUsuario('.$reg->idUsuario.')" ><i class="mdi mdi-lead-pencil" title="Editar usuario"></i></button>'.
                    '&nbsp&nbsp' . '<div class="btn-group">'.
                    '<button type="button" class="btn btn-success btn-sm" title="Activar usuario" disabled><i class="mdi mdi-power"></i></button>'.
                    '<button type="button"class="btn btn-danger btn-sm" title="Desactivar usuario" onclick="desactivarUsuario('.$reg->idUsuario.')"><i class="mdi mdi-power-off"></i></button></div>'                    
                    :
                    '<button type="button" class="btn btn-icon wafves-effect btn-info btn-sm" onmouseover="btnVerUsuario()" title="Ver usuario" onclick="verDatosUsuario('.$reg->idUsuario.')"> <i class="mdi mdi-eye"></i></button>'.
                    ' <button type="button" class="btn btn-icon waves-effect btn-warning btn-sm" onmouseover="btnEditarUsuario()" title="Editar usuario" onclick="editarUsuario('.$reg->idUsuario.')"><i class="mdi mdi-lead-pencil"></i></button>'.
                    '&nbsp&nbsp' . '<div class="btn-group">'.
                    '<button type="button" class="btn btn-success btn-sm" title="Activar usuario" onclick="activarUsuario('.$reg->idUsuario.')"><i class="mdi mdi-power"></i></button>'.
                    '<button type="button" class="btn btn-danger btn-sm" title="Desactivar usuario" disabled><i class="mdi mdi-power-off"></i></button></div>'  
                   
                );

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

    case 'verUsuario':

        //Llamamos al metodo  verUsuario  de nuetro modelo y le enviamo la variable $idUsuario .
        $rspta =$usuario->verUsuario($idUsuario); 
        //El modelo nos devuelve un array 
        $arreglo = array(); 
        while($row = $rspta->fetchObject())
        {
             $arreglo = $row;

        }
        //Me envia un Json a la vista
        echo json_encode($arreglo);
    



    break;


    case 'generarUsuario':
    /* Para generar el usuario vamos a trabajar con el metodo str_split 
    str_split — Convierte un string en un array.
    //Eliminar comillas dobles -> echo addslashes($tu_string);
    */
    
    $arreglo1 = str_split($nombresUser,1);
    //$arreglo2 = str_split($apePaterno,1);
    //Creamos una variable $userFinal donde se guardara el usuario generado.
    $userFinal = $arreglo1[0].$apePaternoGen;
    echo strtolower($userFinal);
    break;


    default: "La opcion no se encuentra disponible.";

}
?>
