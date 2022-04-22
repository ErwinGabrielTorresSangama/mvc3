<?php
//Incluimos incialmente la conexion a la base de datos
include_once "../config/conexionBD.php";



class HomeModel
{

    /* Implementamos un constructor vacio, para poder crear instancias o metodos a esta clase
    sin enviar ningún parametro. */

    function __construct()
    {
    }



    function traerData()
    {
        $sql = "CALL prc_ObtenerDatos";
        $resultado = Conexion::Conectar()->prepare($sql);
        $resultado->execute();
        return $resultado;
        $resultado->closeCursor();
    }

    function llenarGrafBarras()
    {
        $sql = "CALL prc_LlenarGrafBarras";
        $resultado = Conexion::Conectar()->prepare($sql);
        $resultado->execute();
        return $resultado;
        $resultado->closeCursor();
    }

    function productosMasVendidos()
    {
        //$arreglo = array(); 

        $sql = "SELECT 
                    P.codigo_producto,
                    P.descripcion_producto,
                    SUM(VD.cantidad) AS cantidad,
                    SUM(ROUND(VD.total_venta,2)) AS total_venta
                FROM 
                    venta_detalle AS VD
                INNER JOIN
                    productos AS P
                ON
                    VD.codigo_producto = P.codigo_producto
                GROUP BY
                    P.codigo_producto,
                    P.descripcion_producto
                ORDER BY 
                    SUM(ROUND(VD.total_venta,2)) DESC
                LIMIT 10";
        $resultado = Conexion::Conectar()->prepare($sql);
        $resultado->execute();
        return $resultado;
        $resultado->closeCursor();
    }

    function productosPocoStock()
    {
        //$arreglo = array(); 

        $sql = "SELECT 
                    P.codigo_producto,
                    P.descripcion_producto,
                    P.stock_producto,
                    P.minimo_stock_producto
                FROM 
                    productos AS P
                WHERE
                    P.stock_producto <= P.minimo_stock_producto
                ORDER BY
                    P.stock_producto ASC";
        $resultado = Conexion::Conectar()->prepare($sql);
        $resultado->execute();
        return $resultado;
        $resultado->closeCursor();
    }





}
