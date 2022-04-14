var tablaMasVend;
var tablaPocoStock;
$(document).ready(function () {
  //Al cargar la vista lo primero que debe es:
  //Llamar a la funcion:
  traerDatosHome();
  llenarGrafBarras();
  productosMasVendidos();
  productosPocoStock();
});

//Función traer datos y mostrarlo  al inicio
function traerDatosHome() {
  $.ajax({
    //en el parametro url, indico la ruta de mi modelo y hacia que caso voy enviar todos los valores del formulario
    url: "./controllers/homeController.php?op=traerDatosHome",
    type: "POST",
    contentType: false,
    processData: false,

    //si la funcion se ejecuta de manera correcta lo que va hacer es:
    success: function (e) {
      let data = JSON.parse(e);
      //console.log(data);
      $("#spanTotalProductos").html(data.totalProductos);
      $("#spanTotalCompras").html(
        "S/. " + data.totalCompras.replace(/\d(?=(\d{3})+\.)/g, "$&,")
      );
      $("#spanTotalVentas").html(
        "S/. " + data.totalVentas.replace(/\d(?=(\d{3})+\.)/g, "$&,")
      );
      $("#spanGanancias").html(
        "S/. " + data.ganancias.replace(/\d(?=(\d{3})+\.)/g, "$&,")
      );
      $("#spanProductosPocoStock").html(data.productosPocoStock);
      $("#spanVentasHoy").html(
        "S/. " + data.ventasHoy.replace(/\d(?=(\d{3})+\.)/g, "$&,")
      );
    },
    error: function (data) {
      console.log(data);
    },
  });
}

//Cada 10 segundos me llame la funcion traerDatosHome(), con la finalidad de que se actulicen los cards o tarjetas informativas.
setInterval(() => {
  traerDatosHome();
}, 10000);

function llenarGrafBarras() {
  $.ajax({
    //en el parametro url, indico la ruta de mi modelo y hacia que caso voy enviar todos los valores del formulario
    url: "./controllers/homeController.php?op=llenarGrafBarras ",
    type: "POST",
    contentType: false,
    processData: false,

    //si la funcion se ejecuta de manera correcta lo que va hacer es:
    success: function (e) {
      let obj = JSON.parse(e);
      console.log(e);
      const arrayFechas = [];
      const ventasDia = [];
      let totalVentaMes = 0;

      obj.forEach(function (elemento, indice, array) {
        arrayFechas.push(elemento["fecha_venta"]);
        ventasDia.push(elemento["total_venta"]);
        totalVentaMes =
          parseFloat(totalVentaMes) + parseFloat(elemento["total_venta"]);
      });

      //console.log(arrayFechas);
      console.log(totalVentaMes);
      $("#h5TotalVent").html("Total de ventas del mes: S/. " +totalVentaMes.toString().replace(/\d(?=(\d{3})+\.)/g, "$&,")
      );

      const data = {
        labels: arrayFechas,
        datasets: [
          {
            label: "Total venta del dia",
            backgroundColor: "rgb(12, 36, 0,0.5)",
            //borderColor: 'rgb(255, 99, 132)',
            data: ventasDia,
          },
        ],
      };

      //let delayed;
      const config = {
        type: "bar",
        data: data,
        options: {
          animation: {
            onComplete: (x) => {
              const chart = x.chart;
              var { ctx } = chart;
              ctx.textAlign = "center";
              (ctx.fillStyle = "rgb(12, 36, 0)"), (ctx.textBaseline = "bottom");
              // Loop through each data in the datasets
              const metaFunc = this.getDatasetMeta;
              chart.data.datasets.forEach((dataset, i) => {
                var meta = chart.getDatasetMeta(i);
                meta.data.forEach((bar, index) => {
                  var data = dataset.data[index];
                  ctx.fillText(
                    `S/.${data}`.toString().replace(/\d(?=(\d{3})+\.)/g, "$&,"),
                    bar.x,
                    bar.y - 5
                  );
                });
              });
            },
          },
        },
      };

      const myChart = new Chart(document.getElementById("myChart"), config);
    },
    error: function (data) {
      console.log(data);
    },
  });
}

function productosMasVendidos() {
	tablaMasVend = $("#tablaProdMasVend")
	.dataTable({
		bInfo: false,
		bPaginate: false,
		//Para poner en español nuestra tabl
		language: {
		  url: "./views/js/dataTableSpanish.json",
		},
		
		//Agregamos un parametro ajax
		ajax: {
		  url: "./controllers/homeController.php?op=productosMasVendidos",
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
}


function productosPocoStock() {
	tablaPocoStock = $("#tablaProdPocStock")
	.dataTable({
		bInfo: false,
		bPaginate: false,
		//Para poner en español nuestra tabl
		language: {
		  url: "./views/js/dataTableSpanish.json",
		},
		
		//Agregamos un parametro ajax
		ajax: {
		  url: "./controllers/homeController.php?op=productosPocoStock",
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
}

