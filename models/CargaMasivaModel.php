<?php
//Incluimos incialmente la conexion a la base de datos
require_once "../config/conexionBD.php";

include '../vendor/autoload.php';

class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter {

    public function readCell($columnAddress, $row, $worksheetName = '') {
        // Read title row and rows 20 - 30
        if ($row>1) { //A parti de la fila 2, ya que en nuestro excel esta las categorias desde la la fila 2.
            return true;
        }
        return false;
    }
}


class CargaMasivaModel
{

    /* Implementamos un constructor vacio, para poder crear instancias o metodos a esta clase
    sin enviar ningún parametro. */

    function __construct()
    {
    }

    

    function cargaMasivaProductos($nombreArchivo)
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        $rutaArchivo = "../files/".$nombreArchivo;
        $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($rutaArchivo);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);

        $reader->setReadFilter( new MyReadFilter() );
        $archivoExcel = $reader->load($rutaArchivo);
        $hojaCategorias = $archivoExcel->getSheetByName("Categorias")->toArray();
        $hojaProductos = $archivoExcel->getSheetByName("Productos")->toArray();

        //echo count($hojaCategorias);

        $fecha_actualizacion_categoria=date("Y-m-d");
        $totalCatInsertadas=0;
        $totalProducInsertadas=0;
        $valoresFinales = array();

        //Foreach para registro de categorias. 
        foreach($hojaCategorias as $row)
        {
            if($row[0]!=""){
                $sql="INSERT INTO categorias (nombre_categoria, aplica_peso,fecha_actualizacion_categoria) 
                VALUES ('$row[0]','$row[1]','$fecha_actualizacion_categoria')";
                $resultado = Conexion::Conectar()->prepare($sql);
                $resultado->execute();
                if($resultado)
                { 
                    $totalCatInsertadas++;
                }else{
                    $totalCatInsertadas=0;
                }
            }
        }
        if($totalCatInsertadas>0)
        {
            foreach ($hojaProductos as $col) {
                if ($col[0] != "") {
                    $idCategoria = CargaMasivaModel::traerIdCategoria($col[1]);
                    $fecha_actualizacion_producto=date("Y-m-d");
                    $sql = "INSERT INTO productos ( codigo_producto, 
                                                    id_categoria_producto, 
                                                    descripcion_producto, 
                                                    precio_compra_producto, 
                                                    precio_venta_producto, 
                                                    utilidad, 
                                                    stock_producto, 
                                                    minimo_stock_producto, 
                                                    ventas_producto, 
                                                    fecha_actualizacion_producto) 
                            VALUES ('$col[0]', '$idCategoria', '$col[2]', '$col[3]', '$col[4]', '$col[5]', '$col[6]', '$col[7]', '$col[8]','$fecha_actualizacion_producto')";
        
                    $resultado = Conexion::Conectar()->prepare($sql);
                    $resultado->execute();
                    if ($resultado) {
                        $totalProducInsertadas++;
                    } else {
                        $totalProducInsertadas=0;
                    }
                }

            }
        }
        $valoresFinales["totalCatInsertadas"] = $totalCatInsertadas;
        $valoresFinales["totalProducInsertadas"] = $totalProducInsertadas;
        return $valoresFinales;
        $resultado->closeCursor();

    }

    function traerIdCategoria($nombreCategoria){
        $sql = "SELECT id_categoria FROM categorias WHERE nombre_categoria = ?";
        $resultado = Conexion::Conectar()->prepare($sql);
        $resultado->execute([$nombreCategoria]);
        return $resultado->fetchColumn();//Selecconamos el valor de la columna
        $resultado->closeCursor(); //Cerrar conexión

  

    }
}

