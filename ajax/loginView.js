
$("#btnIngresar").on("click",function(){

    let inputUsuario = $("#inputUsuario").val();
    let inputPass = $("#inputPass").val();
    let msg = "";

    if(inputUsuario.length==0)
    {
        msg ="Debe ingresar su usuario";
        msgError(msg);
    }
    if(inputPass.length==0)
    {
        msg= "Debe ingresar su contraseña";
        msgError(msg);
    }
    else if(inputUsuario.length>0 && inputPass.length>0)
    {
        $.ajax({
            url:'./controllers/loginController.php?op=verificarUsuario',
            type:'POST',
            data:
                {
                    inputUsuario:inputUsuario,
                    inputPass:inputPass

                }

        }).done(function(resp) {
            console.log(resp);
            if(resp==0) 
            {
                msg = "Usuario o contraseña incorrecta.";
                msgError(msg);
                limpiarCampos("login");
            }else{
                //Convertimos resp en un Array para trabajar especificamente con la llave estado de nuestra tabla
                let data = JSON.parse(resp); 
                //console.log(data[0]["estado"]); --> Me va mostrar 1 si esta "Activo" ó 0 si esta "Inactivo" 

                //Guardamos el estado en una variable para trabajar 
                let estadoUsuario = data[0]["estadoUsuario"];

                //Si el usuario esta Activo, vamos a crear la sesión, para ello vamos a trabajar con ajax
                if(estadoUsuario==1)
                {
                    //Vamos enviar al controlador la opcion crearSesion
                    $.ajax({
                        url:'./controllers/loginController.php?op=crearSesion',
                        type:'POST',
                        data:
                            {
                                //usuId, usuNombres, usuApellidos, usuRol se va mandar al controlador
                                //todo las variables que vienen de data, son columnas de la tabla en la base de datos
                                usuId:data[0]['idUsuario'],
                                usuNombres:data[0]['nombres'],
                                usuApePa:data[0]['apePaterno'],
                                usuApeMa:data[0]['apeMaterno'],
                                usuNomUser:data[0]['nomUsuario'],
                                usuRol:data[0]['idRol']
                            }
                    }).done(function (resp)
                    {
                        //Debemos ir a la vista->loginView.php
                        location.reload();
                    });

                }else
                {
                    msg = "El usuario se encuentra inactivo. Comunicarse con el administrador.";
                    msgError(msg); 
                }
                
            }
        });
        
    }
      
    

});

//Funcion para notificaciones de error
function msgError(msg)
{
    Command: toastr["error"](msg);

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }


}

//La funcion LimpiarCampos me va limpiar los campos de las vistas, para que no haya confusión me va pedir en que vista.
function limpiarCampos(valor)
{
    if(valor=="login")
    {
        $("#inputUsuario").val("");
        $("#inputPass").val("");
    }
   

}

