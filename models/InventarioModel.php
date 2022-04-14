<?php
//Incluimos incialmente la conexion a la base de datos
require_once "../config/conexionBD.php";



class InventarioModel 
{

    /* Implementamos un constructor vacio, para poder crear instancias o metodos a esta clase
    sin enviar ningún parametro. */

    function __construct()
    {
      
    }

    //Creamos una función para verificar si el usuario  existe en los registros, si así que me traiga sus datos. 
    function listarInventario()
    {
        $sql = "CALL pcr_listarProductos";
        $resultado = Conexion::Conectar()->prepare($sql);
        $resultado->execute();
        return $resultado;
        $resultado->closeCursor();
    }


}

