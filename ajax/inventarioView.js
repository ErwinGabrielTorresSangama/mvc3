var tabla;
//Al cargar la página
$(document).ready(function () {
  
  //Llamamos a la función listarUsuarios para que nos liste todos los usuarios en la datatable al momento de cargar la página
  listarInventario();
  //Llamamos a la función  listarSelectTipDoc(); listarSelectRol(); para que se llene los combos del modal
  //listarSelectTipDoc();
  //listarSelectRol();
  //validarFormulario();

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



  function limpiarCampos(op)
  {
    if(op="criteriosBusqueda")
    {
      $("#iptCodBarras").val();
      $("#iptCategoria").val();
      $("#iptProducto").val();
      $("#iptPreVentDesde").val();
      $("#iptPreVentHasta").val();

      tabla.ajax.reload();
    }
  }
