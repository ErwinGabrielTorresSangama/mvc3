<?php

include_once "../models/LoginModel.php";

//Instanciamos la clase LoginModel para poder llamar sus metodos.
$login = new LoginModel();

//Capturamos el op que viene desde el ajax url:'../controllers/loginController.php?op=verificarUsuario',

switch ($_GET["op"])
{
    case 'verificarUsuario':

        $user = htmlspecialchars($_POST['inputUsuario'],ENT_QUOTES,'UTF-8');
        $pass = htmlspecialchars($_POST['inputPass'],ENT_QUOTES,'UTF-8');

        //Creamos una variable para guardar lo que viene desde el modelo.
        $consulta=$login->verificarUsuario($user,$pass);
        //Si encontro el usuario a la array lo convertimos en un json
        $data = json_encode($consulta);

        //Si consulta es mayor que 0, que nos regrese la data, caso contrario nos devuelve 0
        if (count($consulta)>0) {
            echo $data;
        }
        else
        {
            echo 0;
        }
    break;

    case 'crearSesion':

        //Recibimos los que viene desde el ajax
         $iduser = $_POST['usuId'];
         $user = $_POST['usuNombres'];
         $rol = $_POST['usuRol'];
         $nombreUsuario = $_POST['usuNomUser'];

        session_start(); //Creamos la sesion

        $_SESSION['s_iduser'] = $iduser;
        $_SESSION['s_user'] = $user;
        $_SESSION['s_rol'] = $rol;
        $_SESSION['s_nomUser'] = $nombreUsuario;

    break;

    case 'cerrarSesion':
        session_start();
        session_destroy();
        header('Location: ../login');
    break;

    case 'listarUsuarios':
     $consulta=$usuario->listarUsuarios();
     if($consulta)
     {
        echo json_encode($consulta);
       
     }
  
     else
     {
        echo '{
            "sEcho":1,
            "iTotalRecords":"0",
            "iTotalDisplayRecords": "0",
            "aaData":[]
        }';
     }
       
    break;

    default: "La opcion no se encontró";
}