<?php
//Incluimos incialmente la conexion a la base de datos
require_once "../config/conexionBD.php";



class LoginModel 
{

    /* Implementamos un constructor vacio, para poder crear instancias o metodos a esta clase
    sin enviar ningún parametro. */

    function __construct()
    {
      
    }

     //Creamos una función para verificar si el usuario  existe en los registros, si así que me traiga sus datos. 
    function verificarUsuario($user,$pass)
    {
        
        $pass_hash= hash('sha256', $pass); //Encryptamos el password
        $arreglo = array();  //Creamos un arreglo para guardar lo que nos trae al ejecutar el query, siempre y cuando exista el usuario
        
        $sql = "SELECT *FROM tablausuarios WHERE nomUsuario = BINARY ? AND passUsuario = ?";
        $resultado = Conexion::Conectar()->prepare($sql);
        $resultado->execute(array($user,$pass_hash));
        while($row = $resultado->fetch(PDO::FETCH_ASSOC))
        {
            $arreglo[] = $row;
        }
        //Me va regresar 0 si no encuentra el usuario o me regresa un array[0] lleno de datos si existe el usuario.
        return $arreglo;
        $resultado->closeCursor(); //Cerrar conexión

    }


}


 
  





