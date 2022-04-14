$(document).ready(function(){
    
});



function cargarExcel()
{
    let msg = "";

    let verificarExcel = $("#inputFile").get(0).files.length;
    console.log(verificarExcel);// 0 o 1

    if (verificarExcel == 0) {
      msg= "Debe seleccionar un archivo.";
      msgError(msg);
    } else {
      let inputFile = $("#inputFile")[0].files[0];
      let formData = new FormData();
      formData.append("inputFile", inputFile);

      $.ajax({
        //en el parametro url, indico la ruta de mi modelo y hacia que caso voy enviar todos los valores del formulario
        url: "./controllers/cargaMasivaController.php?op=cargarArchivo",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        //si la funcion se ejecuta de manera correcta lo que va hacer es:
        success: function (e) {
          //console.log(e);
          if(e==0)
          {
            msg="Extensión del archivo no valido.";
            msgError(msg);
            $("#inputFile").val("");
          }else{
            let obj = JSON.parse(e);
            //console.log(obj.totalCatInsertadas);            
            $('#imgCargando').html('<div class="loading"><img src="./views/images/loader.gif" alt="loading" /><br/>Un momento, por favor...</div>');
            $("#btnCargar").attr("disabled",true);
            setTimeout(function(){ 
              Swal.fire("Se registraron "+obj.totalCatInsertadas+" categorías y "+obj.totalProducInsertadas+" productos correctamente.", "", "success");
              $('#imgCargando').html("");
              $("#btnCargar").attr("disabled",false);
              $("#inputFile").val("");
             }, 3000);
            

          }

        },
        error: function (data) {
          console.log(data);
        },
      });


    }
    

}



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