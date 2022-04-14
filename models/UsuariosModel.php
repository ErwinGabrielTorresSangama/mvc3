<?php
//Incluimos incialmente la conexion a la base de datos
require_once "../config/conexionBD.php";



class UsariosModel 
{

    /* Implementamos un constructor vacio, para poder crear instancias o metodos a esta clase
    sin enviar ningún parametro. */

    function __construct()
    {
      
    }

    function listarUsuarios()
    {
        //$arreglo = array(); 

        $sql = "	SELECT 
                        @rownum:=@rownum+1 AS nro,
                        R.nombreRol,
                        U.nombres,
                        U.idUsuario,
                        CONCAT(U.apePaterno,' ',U.apeMaterno) AS apellidoCompleto,
                        U.estadoUsuario
                    FROM 
                        tablausuarios AS U 
                    INNER JOIN
                        tablaroles AS R
                    ON
                        U.idRol = R.idRol, 
                        (SELECT @rownum:=0) r 
                    ORDER BY 
                        idUsuario DESC
                ";
        $resultado = Conexion::Conectar()->prepare($sql);
        $resultado->execute();
        return $resultado;
        $resultado->closeCursor();

    }

    function listarSelectTipDoc()
    {
        $sql = "SELECT
                TD.idTipDoc,
                TD.abreDoc
                FROM 
                tabladocumento AS TD 
                WHERE 
                estadoDoc=1";
        $resultado = Conexion::Conectar()->prepare($sql);
        $resultado->execute();
        return $resultado;
        $resultado->closeCursor();
       
    }

    function listarSelectRol()
    {
        $sql = "SELECT
                R.idRol,
                R.nombreRol
                FROM 
                tablaroles AS R 
                WHERE 
                estadoRol=1";
        $resultado = Conexion::Conectar()->prepare($sql);
        $resultado->execute();
        return $resultado;
        $resultado->closeCursor();
       
    }

    public function insertarUsuario($idRol,$tipoDocumento,$numDocumento,$nombres,$apePaterno,$apeMaterno,$nameUsu,$claveHash,$correo,$celular,$telefono,$direccion,$imagen)
    {
        $fechaRegistro = date ('Y-m-d H:i:s');  
        $sql="INSERT INTO tablausuarios(idRol,idTipDoc,numDoc,nombres,apePaterno,apeMaterno,nomUsuario,passUsuario,correo,celular,telefono,direccion,img,fechaRegistro,estadoUsuario)
              VALUES($idRol,'$tipoDocumento','$numDocumento','$nombres','$apePaterno','$apeMaterno','$nameUsu','$claveHash','$correo','$celular','$telefono','$direccion','$imagen','$fechaRegistro','1')";
        $resultado = Conexion::Conectar()->prepare($sql);
        $resultado->execute();
        if($resultado)
        {
            return 1; //Se inserto correctamente
        
        }else
        {
            return 0; //No se actualizo
        }
        $resultado->closeCursor();
    

        //return ejecutarConsulta($sql); //Al ejecutar este metedo, si retornamos correctamente codigo sql vamos a devolver 1
                                     // caso contrario un 0, eso lo vamos a validar con ajax al momento de realizar las peticiones, mediante los archivos javascritp
    }

    public function editarUsuario($idUsuario,$idRol,$tipoDocumento,$numDocumento,$nombres,$apePaterno,$apeMaterno,$nameUsu,$password,$correo,$celular,$telefono,$direccion,$imagen)
    {
        $fechaModificacion = date('Y-m-d H:i:s');  
        $sql="  UPDATE  tablausuarios SET idRol = :idRol, idTipDoc= :tipoDocumento, numDoc = :numDocumento, nombres = :nombres, apePaterno = :apePaterno, apeMaterno= :apeMaterno,  nomUsuario= :nameUsu,  passUsuario= :password,  correo= :correo, celular= :celular, telefono= :telefono,  direccion= :direccion,  img= :imagen, fechaModificacion = :fechaModificacion
                WHERE idUsuario = :idUsuario";
        $resultado = Conexion::Conectar()->prepare($sql);
        $resultado->execute(['idRol'=> intval($idRol),
                            'tipoDocumento'=> intval($tipoDocumento),
                            'numDocumento'=> $numDocumento,
                            'nombres'=> $nombres,
                            'apePaterno'=> $apePaterno,
                            'apeMaterno'=> $apeMaterno,
                            'nameUsu'=> $nameUsu,
                            'password'=> $password,
                            'correo'=> $correo,
                            'celular'=> $celular,
                            'telefono'=> $telefono,
                            'direccion'=> $direccion,
                            'imagen'=> $imagen,
                            'fechaModificacion'=>$fechaModificacion,
                            'idUsuario'=> intval($idUsuario)]);
                        
        if($resultado)
        {
            return 1; //Se inserto correctamente
        
        }else
        {
            return 0; //No se actualizo
        }
        $resultado->closeCursor();

    }

    function desactivarUsuario($idUsuario)
    {
        $sql = "UPDATE  tablausuarios SET estadoUsuario = '0' WHERE idUsuario = ?";
        $resultado = Conexion::Conectar()->prepare($sql);
        $resultado->execute(array($idUsuario));
        if($resultado)
        {
            return 1; //Se actualizo correctamente
        
        }else
        {
            return 0; //No se actualizo
        }
        
        $resultado->closeCursor();

    }

    
    function activarUsuario($idUsuario)
    {
        $sql = "UPDATE  tablausuarios SET estadoUsuario = '1' WHERE idUsuario = ?";
        $resultado = Conexion::Conectar()->prepare($sql);
        $resultado->execute(array($idUsuario));
        if($resultado)
        {
            return 1; //Se actualizo correctamente
        
        }else
        {
            return 0; //No se actualizo
        }
        
        $resultado->closeCursor();

    }


    function verUsuario($idUsuario)
    {
        $sql = "SELECT
                    /*Ver Usuario*/ 
                    R.nombreRol,
                    D.nombreDoc,
                    U.numDoc,
                    U.nombres,
                    U.apePaterno,
                    U.apeMaterno,
                    U.nomUsuario,
                    U.correo,
                    U.celular,
                    U.telefono,
                    U.direccion,
                    U.img,
                     /*Editar Usuario*/ 
                    U.idUsuario,
                    U.idRol,
                    U.idTipDoc,
                    U.passUsuario     
                FROM 
                    tablausuarios AS U 
                INNER JOIN
                    tablaroles AS R
                ON
                    U.idRol = R.idRol
                INNER JOIN
                    tabladocumento AS D
                ON
                    U.idTipDoc = D.idTipDoc
                WHERE 
                    idUsuario = ?";
        $resultado = Conexion::Conectar()->prepare($sql);
        $resultado->execute(array($idUsuario));
        return $resultado; //Me devolver un array
        $resultado->closeCursor();

    }





    /*

      $sql = "SELECT @rownum:=@rownum+1 AS nro, i.idingreso,DATE(i.fecha_hora) as fecha, p.nombre  as proveedor,u.idusuario,u.nombre as usuario, i.tipo_comprobante, i.serie_comprobante, i.num_comprobante, i.total_compra, i.impuesto, i.estado 
        FROM ingreso AS i INNER JOIN persona AS  p ON i.idproveedor=p.idpersona INNER JOIN usuario u ON i.idusuario=u.idusuario, (SELECT @rownum := 0) r ORDER BY i.idingreso DESC";
        return ejecutarConsulta($sql);
    */


}


