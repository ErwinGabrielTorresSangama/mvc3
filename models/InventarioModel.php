<?php
//Incluimos incialmente la conexion a la base de datos
include_once "../config/conexionBD.php";



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


    function listarSelectCat()
    {
        $sql = "SELECT  C.id_categoria, C.nombre_categoria  FROM  categorias AS C ORDER BY C.nombre_categoria ASC ";
        $resultado = Conexion::Conectar()->prepare($sql);
        $resultado->execute();
        return $resultado;
        $resultado->closeCursor();
       
    }

    function insertarProducto($codProducto, $idCategoria, $descripProducto, $preCompra, $precVenta, $utilidad, $stock, $minStock)
    {

        try {
            $fechaRegistro = date('Y-m-d H:i:s');
            $sqlQuery = "INSERT INTO productos (codigo_producto, 
                                            id_categoria_producto, 
                                            descripcion_producto, 
                                            precio_compra_producto, 
                                            precio_venta_producto,
                                            utilidad,stock_producto, 
                                            minimo_stock_producto,
                                            ventas_producto,
                                            fecha_creacion_producto,
                                            fecha_actualizacion_producto) 
                            VALUES ($codProducto,
                                    $idCategoria,
                                    $descripProducto,
                                    $preCompra,
                                    $precVenta,
                                    $utilidad,
                                    $stock,)";
            $stmt = Conexion::Conectar()->prepare($sqlQuery);
            if ($stmt->execute()) {
                $resultado = 1;
            } else {
                $resultado = 0;
            }
        } catch (Exception $e) {
            $resultado = "Excepcion capturada: " . $e->getMessage() . "<br>";
        }
        return $resultado; //Mandamos el $resultado a nuestra vista
        $stmt->closeCursor();
    }


}

