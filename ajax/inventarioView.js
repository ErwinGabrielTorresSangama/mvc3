var tabla;
let opcionLimpiar = "'nuevoProducto'";

//Al cargar la página
$(document).ready(function () {
  
  //Llamamos a la función listarUsuarios para que nos liste todos los usuarios en la datatable al momento de cargar la página
  listarInventario();
  //Llamamos a la función  listarSelectTipDoc(); listarSelectRol(); para que se llene los combos del modal
  listarSelectCategorias();
  //listarSelectRol();
  validarFormulario();

  //Inicializamos los select2 que tengan la clase  js-example-responsive.
  $(".js-example-responsive").select2({
    width: "100%", //Que nos ocupe todo el ancho de la pagina
    language: {
      //Cambiamos a español, el texto cuando no encuentre lo que buscamos en el select.
      noResults: function () {
        return "No se han encontrado resultados.";
      },
    },
  });
  //Ocultamos el div donde se muestra la previsualización de la imagen, que se encuentra en el modal de la vistaL.
  $("#divImg").hide();

  //Validamos el formulario
});



//Cuando hacemos cick en el boton de nuevoUsuario
$("#btnModalNuevoProducto").click(function () {
  //Limpiamos los campos
  limpiarCampos("nuevoProducto");
  $(".modal-header")
    .removeClass("modal-colored-header bg-warning bg-info")
    .addClass("modal-colored-header bg-primary");

  $(".modal-header").html(
    '<div class="col-lg-8 col-xs-12">' +
      '<h6 class="modal-title text-white" id="mySmallModalLabelcenter">' +
      '<i class="mdi mdi-plus"></i> Nuevo producto</h6>' +
      '</div>'+
      '<div class="col-lg-4 col-xs-12" >' +
      '<a href="#" data-dismiss="modal" onclick="limpiarCampos('+opcionLimpiar+')">'+
      '<img src="./views/images/logo-light.png" width="100" height="25" class="img-responsive float-right">' +
      '</div>');

  //Ocultamos el div donde se muestra el select Rol del formulario
  $("#divRol").hide();
  //Pero en lo oculta esta seleccionado el value=3 de No Asignado
  //Ya que cuando se crea un Nuevo Usuario para como No asignado.
  $("#selectTipRol option[value='3']").attr("selected", true);

  $("#divUsuario").show();
  $("#divPass").show();
  $("#divRePass").show();
});


function listarInventario() {
    tabla = $("#tablaInventario")
      .dataTable({
        //Agregar botones de exportar excel,pdf y imprimir

        dom: "Bfrtip",
        buttons: [
          {
            extend: "excel",
            className: "btnBfrtip",
          },
          {
            extend: "pdf",
            className: "btnBfrtip",
          },
          {
            extend: "print",
            className: "btnBfrtip",
          },
          {
            extend: "pageLength",
          },
        ],

        //Para poner en español nuestra tabl
        language: {
          url: "./views/js/dataTableSpanish.json",
        },
        columnDefs: [
          {
            targets: 0,
            visible: false,
          },
          {
            targets: 8,
            createdCell: function(td, cellData,rowData, row, col) {
              if(parseFloat(rowData[8]) <= parseFloat(rowData[9])){
                $(td).parent().css("background","#FF4B4B");
                $(td).parent().css("color","#FFFFFF");

              }
            },
          },
          {
            targets: 11,
            visible: false,
          },
          {
            targets: 12,
            visible: false,
          },
        ],
        //Agregamos un parametro ajax
        ajax: {
          url: "./controllers/inventarioController.php?op=listarInventario",
          type: "get", //mediante tipo GET
          dataType: "json", //los datos seran codificados en json
          error: function (
            e //si tenemos algun error para poder entender y verlo en texto plano median f12 inspeccionar del navegador
          ) {
            console.log(e.responseText);
          },
        },
      })
      .DataTable();
  
    /* Hacer un buscador input dinamico */
    //Apuntamos al documento
    $(document).on("keyup", "input[type='search']", function () {
      $("#tablaInventario").DataTable().search($("#inputSearch").val()).draw();
    });

    $("#iptCodBarras").keyup(function(){
      tabla.column($(this).data('index')).search(this.value).draw();
    });

    $("#iptCategoria").keyup(function(){
      tabla.column($(this).data('index')).search(this.value).draw();
    });

    $("#iptProducto").keyup(function(){
      tabla.column($(this).data('index')).search(this.value).draw();
    });

    $("#iptPreVentDesde, #iptPreVentHasta").keyup(function(){
      tabla.draw();
    });

    $.fn.dataTable.ext.search.push(

        function(settings, data, dataIndex)
        {
            let precioDesde = parseFloat($("#iptPreVentDesde").val());
            let precioHasta = parseFloat($("#iptPreVentHasta").val());

            let colVenta = parseFloat(data[6]);

            //Si es isNaN
            if(isNaN(precioDesde) && isNaN(precioHasta) ||
              (isNaN(precioDesde) && colVenta <= precioHasta) ||
              (precioDesde <=colVenta && isNaN(precioHasta)) ||
              (precioDesde <= colVenta && colVenta<=precioHasta)){
                return true;
              }

              return false;
        }
    )



}

/* 
Personalizar botones Bfrtip. Al hacer click  que se agrega tal funcion. 
*/
  $('#reportExcel').on('click', function() {
    $('.buttons-excel').click()
  });
  $('#reportPdf').on('click', function() {
    $('.buttons-pdf').click()
  });

  $('#btnPrint').on('click', function() {
    $('.buttons-print').click()
  });




  /* ############################################################################################################################### */

function validarFormulario() {
  var form = $("#formularioModal");
  form.validate({
    errorElement: "span",
    focusInvalid: false,
    ignore: [],
    rules: {
      //El select tiene que estar asi :<option value="">-- Seleccionar --</option>
      inputCodBarras: {
        required: true,
      },
      selectCategoria: {
        required: true,
      },
      inputDescripcion: {
        required: true,
        minlength: 8,
      },
      inputPreCompra: {
        required: true,
      },
      inputPreVenta: {
        required: true,
      },
      inputStock: {
        required: true,
      },
      inputMinimoStock: {
        required: true,
      },
    },
    // Specify validation error messages
    messages: {
      inputCodBarras: {
        required: "Ingrese el código de barra.",
      },
      selectCategoria: {
        required: "Seleccione una categoria.",
      },
      inputDescripcion: {
        required: "Ingrese una descripciónn.",
        minlength: "Minimo 8 carácteres."
      },
      inputPreCompra: {
        required: "Ingrese el precio compra."
      },
      inputPreVenta: {
        required: "Ingrese el precio venta.",
      },
      inputStock: {
        required: "Ingrese el stock.",
      },
      inputMinimoStock: {
        required: "Ingrese el mínimo stock.",
      },
   
    },
    //para que el mensaje de error no se vea encima de lo select. En este caso se utilizo el select2
    errorPlacement: function (error, element) {
      var elem = $(element);
      if (elem.hasClass("select2-hidden-accessible")) {
        element = $("#select2-" + elem.attr("id") + "-container").parent();
        error.insertAfter(element);
      } else {
        error.insertAfter(element);
      }
    },
  });
}
/* ############################################################################################################################### */



/* ############################################################################################################################### */

function guardar() {
  var tabla = $("#tablaInventario").DataTable();

  //esto es una instruccion j-query para indicar que no se activará la acción predeterminada del evento
  //ya que el boton btnGuardar del formulario es de tipo submit, no se va responder ese evento si no se va ejecutar las intrucciones en el orden que aparece.
  //una vez que yo haga en el boton guardar lo voy a deshabilitar
  // $("#btnGuardar").prop("disabled", true);
  //debajo declaro una variable de nombre formData y voy obtener todos los datos del formulario y se va almacenar en mi variable que he creado.

  //Creamos un FormData
  let formData = new FormData();

  let inputIdProducto = $("#inputIdProducto").val();
  let inputCodBarras = $("#inputCodBarras").val();
  let selectCategoria = $("#selectCategoria").val();
  let inputDescripcion = $("#inputDescripcion").val();
  let inputPreCompra = $("#inputPreCompra").val();
  let inputPreVenta = $("#inputPreVenta").val();
  let inputUtilidad = $("#inputUtilidad").val();
  let inputStock = $("#inputStock").val();
  let inputMinimoStock = $("#inputMinimoStock").val();


  formData.append("inputIdProducto", inputIdProducto);
  formData.append("inputCodBarras", inputCodBarras);
  formData.append("selectCategoria", selectCategoria);
  formData.append("inputDescripcion", inputDescripcion);
  formData.append("inputPreCompra", inputPreCompra);
  formData.append("inputPreVenta", inputPreVenta);
  formData.append("inputUtilidad", inputUtilidad);
  formData.append("inputStock", inputStock);
  formData.append("inputMinimoStock", inputMinimoStock);

  if ($("#formularioModal").valid()) {
    //Si el formulario esta correctamente validado
    console.log("-->"+inputIdUser);
    //console.log(formData);

    if (inputIdUser) {
      //Si el inputIdUser existe vamos editar.
      $.ajax({
        //en el parametro url, indico la ruta de mi modelo y hacia que caso voy enviar todos los valores del formulario
        url: "./controllers/usuariosController.php?op=guardar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        //si la funcion se ejecuta de manera correcta lo que va hacer es:
        success: function (e) {
          if (e == 1) {
            Swal.fire("Usuario editado.", "", "success");
          } else {
            Swal.fire(
              "Se presento un inconveniente, volver a intentar.",
              "",
              "error"
            );
          }
          $("#myModalNuevoUsuario").modal("hide");
          tabla.ajax.reload();
          limpiarCampos("nuevoUsuario");
        },
        error: function (data) {
          console.log(data);
        },
      });
    } else {
      //Si el inputIdUser no existe vamos a insertar
      $.ajax({
        //en el parametro url, indico la ruta de mi modelo y hacia que caso voy enviar todos los valores del formulario
        url: "./controllers/usuariosController.php?op=guardar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        //si la funcion se ejecuta de manera correcta lo que va hacer es:
        success: function (e) {
          if (e == 1) {
            Swal.fire("Usuario registrado.", "", "success");
          } else {
            Swal.fire(
              "Se presento un inconveniente, volver a intentar.",
              "",
              "error"
            );
          }
          $("#myModalNuevoUsuario").modal("hide");
          tabla.ajax.reload();
          limpiarCampos("nuevoUsuario");
        },
        error: function (data) {
          console.log(data);
        },
      });
    }
  } else {
    console.log("Formulario no validado");
  }
  return false;
}

/* ############################################################################################################################### */

  function limpiarCampos(opcion)
  {
    if(opcion="criteriosBusqueda")
    {
      $("#iptCodBarras").val();
      $("#iptCategoria").val();
      $("#iptProducto").val();
      $("#iptPreVentDesde").val();
      $("#iptPreVentHasta").val();
      $("span.error").hide();
      $(".error").removeClass("error");
    }
    if(opcion="nuevoProducto"){

      $("#inputIdProducto").val("");
      $("#inputCodBarras").val("");
      $("#selectCategoria").val("");
      $("#selectCategoria").change(); //Cuandos se utiliza select2
      $("#inputDescripcion").val("");
      $("#inputPreCompra").val("");
      $("#inputPreVenta").val("");
      $("#inputUtilidad").val("");
      $("#inputStock").val("");
      $("#inputMinimoStock").val("");
      $("span.error").hide();
      $(".error").removeClass("error");
      

    }
  }


  /* ############################################################################################################################### */

function soloNumeros(evt) {
  let charCode = evt.which ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
    return false;

  return true;
}
/* ############################################################################################################################### */



function listarSelectCategorias() {
  $.ajax({
    type: "POST",
    url: "./controllers/inventarioController.php?op=listarSelectCat",
    dataType: "json",
    success: function (data) {
      $.each(data, function (key, registro) {
        $("#selectCategoria").append(
          "<option value=" +
            registro.id_categoria +
            ">" +
            registro.nombre_categoria +
            "</option>"
        );
      });
    },
    error: function (data) {
      console.log(data);
    },
  });
}