
<?php

/*
PRIMER CONEXION A BASE DE DATOS
//Vamos a llamar a la sentencia require_once para que nos incluya todo el codigo que se encuentra en global.php
//Esto la hacemos con el fin de poder llamar a las variables que se han declarado en global.php, ya que, si no lo incluimos no podremos trabjar con estas mismas.
require_once "global.php";

//Creamos una clase que llamaremosConexion 
class Conexion
{
    //Vamos a declarar nuestro metodos. 
    //Los metodos no san nada mas y nada menos que funciones.
     

    static public function Conectar()
    {
        try {
            $Conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.'', DB_USERNAME, DB_PASSWORD);
            $Conn->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
            $Conn->exec("SET NAME".DB_ENCODE);
            return $Conn;
        }
        catch(PDOException $e)
        {
            echo "La conexión ha fallado: " . $e->getMessage();
        }


    }


}
*/
##SEGUNDO FORMA DE CONEXION A BASE DE DATOS

//Vamos a llamar a la sentencia require_once para que nos incluya todo el codigo que se encuentra en global.php
//Esto la hacemos con el fin de poder llamar a las variables que se han declarado en global.php, ya que, si no lo incluimos no podremos trabjar con estas mismas.
require_once "configGeneral.php";

//Creamos una clase que llamaremosConexion
class Conexion
{
    //Vamos a declarar nuestro metodos.
    //Los metodos no san nada mas y nada menos que funciones.


    static public function Conectar()
    {
        try {
            $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_ENCODE."";
            $opt = array(
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );
            $pdo = new PDO($dsn,DB_USERNAME,DB_PASSWORD, $opt);
            return $pdo;

        }
        catch(PDOException $e)
        {
            echo "La conexión ha fallado: " . $e->getMessage();
        }


    }


}