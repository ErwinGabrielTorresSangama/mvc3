var tabla;
//Al cargar la página
$(document).ready(function () {
  //Llamamos a la función listarUsuarios para que nos liste todos los usuarios en la datatable al momento de cargar la página
  listarUsuarios();
  //Llamamos a la función  listarSelectTipDoc(); listarSelectRol(); para que se llene los combos del modal
  listarSelectTipDoc();
  listarSelectRol();
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

/* ############################################################################################################################### */

//Función para limpiar campos de nuestra vista.
function limpiarCampos(opcion) {
  if (opcion == "nuevoUsuario") {
    $("#inputIdUser").val("");
    $("#selectTipDoc").val("");
    $("#selectTipDoc").change();
    $("#inputNumDoc").val("");
    $("#inputNombres").val("");
    $("#inputApePa").val("");
    $("#inputApeMa").val("");
    $("#inputUsuario").val("");
    $("#inputPass").val("");
    $("#inputRePass").val("");
    $("#inputDirecc").val("");
    $("#inputCel").val("");
    $("#inputCorreo").val("");
    $("#inputFile").val("");
    $("#inputTel").val("");
    $("#divImg").hide();
    $("span.error").hide();
    $(".error").removeClass("error");
  }
}

/* ############################################################################################################################### */

/* ############################################################################################################################### */
//Funcion para previzualizar las Imagenes
function previzualizarImagen(input) {
  //Si existe input.files y input.files[0]
  if (input.files && input.files[0]) {
    //creamos un variable reader para instanciar
    /* 
			El objeto FileReader permite que las aplicaciones web lean ficheros 
			(o información en buffer) almacenados en el cliente de forma asíncrona, 
			usando los objetos File o Blob dependiendo de los datos que se pretenden leer.
		*/
    var reader = new FileReader();
    reader.onload = function (e) {
      // Asignamos el atributo src a la tag de imagen
      $("#imgPrevisualizar").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

//Cuando se produce un cambio en el change del inputFile, se va llamar a la función para previsualizar.
//Mostramos el div que estaba oculto.
$("#inputFile").change(function () {
  //Llamamos a la funcion previzualizarImagen y le mandomos el valor que se cargo con la funcion this
  previzualizarImagen(this);
  if ($("#inputFile").val() == "") {
    $("#divImg").hide();
  } else {
    $("#divImg").show();
  }
});
/* ############################################################################################################################### */

/* ############################################################################################################################### */
//Funcion para listar todos los usurios
function listarUsuarios() {
  tabla = $("#tablaUsuarios")
    .dataTable({
      //Para poner en español nuestra tabl
      language: {
        url: "./views/js/dataTableSpanish.json",
      },
      //Agregamos un parametro ajax
      ajax: {
        url: "./controllers/usuariosController.php?op=listar",
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
    $("#tablaUsuarios").DataTable().search($("#inputSearch").val()).draw();
  });
}
/* ############################################################################################################################### */

/* ############################################################################################################################### */

function activarUsuario(idUsuario) {
  Swal.fire({
    title: "¿Estás seguro que deseas activar el usuario?",
    text: "",
    type: "warning",
    showCancelButton: !0,
    confirmButtonColor: "#348cd4",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si",
    cancelButtonText: "No",
  }).then(function (t) {
    t.value &&
      $.post(
        "./controllers/usuariosController.php?op=activarUsuario",
        { inputIdUser: idUsuario },
        function (e) {
          if (e == 1) {
            Swal.fire("Usuario activado.", "", "success");
          } else {
            Swal.fire(
              "Se presento un inconveniente, volver a intentar.",
              "",
              "error"
            );
          }
          tabla.ajax.reload();
        }
      );
  });
}

/* ############################################################################################################################### */

/* ############################################################################################################################### */

function desactivarUsuario(idUsuario) {
  Swal.fire({
    title: "¿Estás seguro que deseas desactivar el usuario?",
    text: "",
    type: "warning",
    showCancelButton: !0,
    confirmButtonColor: "#348cd4",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si",
    cancelButtonText: "No",
  }).then(function (t) {
    t.value &&
      $.post(
        "./controllers/usuariosController.php?op=desactivarUsuario",
        { inputIdUser: idUsuario },
        function (e) {
          if (e == 1) {
            Swal.fire("Usuario desactivado.", "", "success");
          } else {
            Swal.fire(
              "Se presento un inconveniente, volver a intentar.",
              "",
              "error"
            );
          }
          tabla.ajax.reload();
        }
      );
  });
}
/* ############################################################################################################################### */

/* ############################################################################################################################### */

function listarSelectTipDoc() {
  $.ajax({
    type: "POST",
    url: "./controllers/usuariosController.php?op=listarSelectTipDoc",
    dataType: "json",
    success: function (data) {
      $.each(data, function (key, registro) {
        $("#selectTipDoc").append(
          "<option value=" +
            registro.idTipDoc +
            ">" +
            registro.abreDoc +
            "</option>"
        );
      });
    },
    error: function (data) {
      console.log(data);
    },
  });
}

/* ############################################################################################################################### */

/* ############################################################################################################################### */

function listarSelectRol() {
  $.ajax({
    type: "POST",
    url: "./controllers/usuariosController.php?op=listarSelectRol",
    dataType: "json",
    success: function (data) {
      $.each(data, function (key, registro) {
        $("#selectTipRol").append(
          "<option value=" +
            registro.idRol +
            ">" +
            registro.nombreRol +
            "</option>"
        );
      });
    },
    error: function (data) {
      console.log(data);
    },
  });
}

/* ############################################################################################################################### */

/* ############################################################################################################################### */

function guardar() {
  var tabla = $("#tablaUsuarios").DataTable();

  //esto es una instruccion j-query para indicar que no se activará la acción predeterminada del evento
  //ya que el boton btnGuardar del formulario es de tipo submit, no se va responder ese evento si no se va ejecutar las intrucciones en el orden que aparece.
  //una vez que yo haga en el boton guardar lo voy a deshabilitar
  // $("#btnGuardar").prop("disabled", true);
  //debajo declaro una variable de nombre formData y voy obtener todos los datos del formulario y se va almacenar en mi variable que he creado.

  //Creamos un FormData
  let formData = new FormData();

  let idRol = $("#selectTipRol").val();
  let inputIdUser = $("#inputIdUser").val();
  let selectTipDoc = $("#selectTipDoc").val();
  let inputNombres = $("#inputNombres").val();
  let inputNumDoc = $("#inputNumDoc").val();
  let inputApePa = $("#inputApePa").val();
  let inputApeMa = $("#inputApeMa").val();
  let inputUsuario = $("#inputUsuario").val();
  let inputPass = $("#inputPass").val();
  let inputCorreo = $("#inputCorreo").val();
  let inputCel = $("#inputCel").val();
  let inputTel = $("#inputTel").val();
  let inputDirecc = $("#inputDirecc").val();
  let inputFile = $("#inputFile")[0].files[0];

  formData.append("inputIdUser", inputIdUser);
  formData.append("selectTipRol", idRol);
  formData.append("selectTipDoc", selectTipDoc);
  formData.append("inputNumDoc", inputNumDoc);
  formData.append("inputNombres", inputNombres);
  formData.append("inputApePa", inputApePa);
  formData.append("inputApeMa", inputApeMa);
  formData.append("inputUsuario", inputUsuario);
  formData.append("inputPass", inputPass);
  formData.append("inputCorreo", inputCorreo);
  formData.append("inputCel", inputCel);
  formData.append("inputTel", inputTel);
  formData.append("inputDirecc", inputDirecc);
  formData.append("inputFile", inputFile);

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

/* ############################################################################################################################### */

function validarFormulario() {
  var form = $("#formularioModal");
  form.validate({
    errorElement: "span",
    focusInvalid: false,
    ignore: [],
    rules: {
      //El select tiene que estar asi :<option value="">-- Seleccionar --</option>
      selectTipRol: {
        required: true,
      },
      selectTipDoc: {
        required: true,
      },
      inputNumDoc: {
        required: true,
        minlength: 8,
      },
      inputNombres: {
        required: true,
        minlength: 3,
      },
      inputApePa: {
        required: true,
      },
      inputApeMa: {
        required: true,
      },
      inputUsuario: {
        required: true,
        minlength: 5,
      },
      inputPass: {
        required: true,
        minlength: 8,
      },
      inputRePass: {
        equalTo: "#inputPass",
      },
      inputCorreo: {
        required: true,
        email: true,
      },
    },
    // Specify validation error messages
    messages: {
      selectTipRol: {
        required: "Seleccione el rol",
      },
      selectTipDoc: {
        required: "Seleccione el tipo de documento",
      },
      inputNumDoc: {
        required: "Ingrese el número de su documento.",
        minlength: "Minimo 8 dígitos.",
      },
      inputNombres: {
        required: "Ingrese sus nombres",
        minlength: "Minimo 3 carácteres.",
      },
      inputApePa: {
        required: "Ingrese su apellido paterno.",
      },
      inputApeMa: {
        required: "Ingrese su apellido materno.",
      },
      inputUsuario: {
        required: "Ingrese el nombre de usuario.",
        minlength: "Minimo 5 carácteres.",
      },
      inputPass: {
        required: "Ingrese su contraseña.",
        minlength: "Minimo 8 carácteres",
      },
      inputRePass: {
        equalTo: "La contraseña no coincide",
      },
      inputCorreo: {
        required: "Ingrese su correo",
        email: "Ingrese un correo válido",
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

function verDatosUsuario(idUsuario) {
  //Abrimos el modal
  $("#myModalVerUsuario").modal("show");
  $(".modal-header")
    .removeClass("modal-colored-header bg-warning bg-primary")
    .addClass("modal-colored-header bg-info");

  //Cambiamos el titulo, el color y el icocno  del modal, con la ayuda de la clase modal-header
  $(".modal-header").html(
    '<div class="col-lg-8">' +
      '<h6 class="modal-title text-white" id="mySmallModalLabelcenter">' +
      '<i class="mdi mdi-eye"></i> Ver usuario</h6>' +
      "</div>" +
      '<div class="col-lg-4" >' +
      '<img src="./views/images/logo-light.png" width="100" height="25" class="img-responsive float-right">' +
      "</div>"
  );

  //$("#divContrasena").show();
  //$("#inputUsuario").prop("disabled", false);
  console.log(idUsuario);

  let formData = new FormData();
  formData.append("inputIdUser", idUsuario);

  //Usaremos ajax, para enviar el parametro al controlador

  //Si el inputIdUser no existe vamos a insertar
  $.ajax({
    //en el parametro url, indico la ruta de mi modelo y hacia que caso voy enviar todos los valores del formulario
    url: "./controllers/usuariosController.php?op=verUsuario",
    type: "POST",
    data: formData, //idUsuario va ser el POST que mandamos como la variable js donde se guarda.
    contentType: false,
    processData: false,

    //si la funcion se ejecuta de manera correcta lo que va hacer es:
    success: function (e) {
      let data = JSON.parse(e);
      $("#verUsuTipRol").val(data.nombreRol);
      $("#verUsuTipDoc").val(data.nombreDoc);
      $("#verUsuNumDoc").val(data.numDoc);
      $("#verUsuNombres").val(data.nombres);
      $("#verApeCom").val(data.apePaterno + " " + data.apeMaterno);
      $("#verUsuNomUsu").val(data.nomUsuario);
      $("#verUsuCorreo").val(data.correo);

      let celular =
        data.celular == "" || data.celular === null
          ? "No registra"
          : data.celular;
      $("#verUsuCel").val(celular);

      let telefono =
        data.telefono == "" || data.telefono === null
          ? "No registra"
          : data.telefono;
      $("#verUsuTel").val(telefono);

      let direccion =
        data.direccion == "" || data.direccion === null
          ? "No registra"
          : data.direccion;
      $("#verUsuDirec").val(direccion);

      let imageUrl = "./views/images/files/" + data.img;

      //Esta función me trae true o false
      imageExists(imageUrl, function (exists) {
        if (exists) {
          // Si existe la imágen me va traer true
          $("#verUsuImg").html(
            '<img id="verUsuImg" name="verUsuImg" width="150" height="100" src="' +
              imageUrl +
              '"/>'
          );
        } else {
          $("#verUsuImg").html(
            '<input type="text" class="form-control" value="No registra" readonly="">'
          );
        }
      });
    },
    error: function (e) {
      console.log(e);
    },
  });
}
/* ############################################################################################################################### */

/* ############################################################################################################################### */

function soloNumeros(evt) {
  let charCode = evt.which ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
    return false;

  return true;
}
/* ############################################################################################################################### */

/* ############################################################################################################################### */

function soloLetras(e) {
  var key = e.keyCode || e.which,
    tecla = String.fromCharCode(key).toLowerCase(),
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
    especiales = [8, 37, 39, 46],
    tecla_especial = false;

  for (var i in especiales) {
    if (key == especiales[i]) {
      tecla_especial = true;
      break;
    }
  }

  if (letras.indexOf(tecla) == -1 && !tecla_especial) {
    return false;
  }
}
/* ############################################################################################################################### */

//Función para saber si la imágen existe en nuestra carpeta
//Va requerir dos parametros(la url de la imagen, y callback, que solo llama true o false)
function imageExists(url, callback) {
  var img = new Image();
  img.onload = function () {
    callback(true);
  };
  img.onerror = function () {
    callback(false);
  };
  img.src = url;
}

//Cuando hacemos cick en el boton de nuevoUsuario
$("#btnModalNuevoUsuario").click(function () {
  //Limpiamos los campos
  limpiarCampos("nuevoUsuario");
  $(".modal-header")
    .removeClass("modal-colored-header bg-warning bg-info")
    .addClass("modal-colored-header bg-primary");
  //Cambiamos el titulo, el color y el icocno  del modal, con la ayuda de la clase modal-header
  //$("#divContrasena").show();
  //$("#inputUsuario").prop("disabled", false);

  $(".modal-header").html(
    '<div class="col-lg-8 col-xs-12">' +
      '<h6 class="modal-title text-white" id="mySmallModalLabelcenter">' +
      '<i class="mdi mdi-plus"></i> Nuevo usuario</h6>' +
      "</div>" +
      '<div class="col-lg-4 col-xs-12" >' +
      '<img src="./views/images/logo-light.png" width="100" height="25" class="img-responsive float-right">' +
      "</div>"
  );

  //Ocultamos el div donde se muestra el select Rol del formulario
  $("#divRol").hide();
  //Pero en lo oculta esta seleccionado el value=3 de No Asignado
  //Ya que cuando se crea un Nuevo Usuario para como No asignado.
  $("#selectTipRol option[value='3']").attr("selected", true);

  $("#divUsuario").show();
  $("#divPass").show();
  $("#divRePass").show();
});

function editarUsuario(idUsuario) {
  console.log(idUsuario);
  //Abrimos el modal
  $("#myModalNuevoUsuario").modal("show");

  //Cambiamos el color del header
  $(".modal-header").addClass("modal-colored-header bg-warning");

  //Cambiamos el titulo, el icono  del header
  $(".modal-header").html(
    '<div class="col-lg-8">' +
      '<h6 class="modal-title text-white" id="mySmallModalLabelcenter">' +
      '<i class="mdi mdi-lead-pencil"></i> Editar usuario</h6>' +
      "</div>" +
      '<div class="col-lg-4" >' +
      '<img src="./views/images/logo-light.png" width="100" height="25" class="img-responsive float-right">' +
      "</div>"
  );

  let formData = new FormData();
  formData.append("inputIdUser", idUsuario);

  //Si el inputIdUser no existe vamos a insertar
  $.ajax({
    //en el parametro url, indico la ruta de mi modelo y hacia que caso voy enviar todos los valores del formulario
    url: "./controllers/usuariosController.php?op=verUsuario",
    type: "POST",
    data: formData, //idUsuario va ser el POST que mandamos como la variable js donde se guarda.
    contentType: false,
    processData: false,

    //si la funcion se ejecuta de manera correcta lo que va hacer es:
    success: function (e) {
      let data = JSON.parse(e);
      console.log(data);
      //Mostramos el div donde se muestra el select rol
      $("#divRol").show();
      $("#divUsuario").hide();
      $("#divPass").hide();
      $("#divRePass").hide();

      $("#inputIdUser").val(data.idUsuario);

      $("#selectTipRol").val(data.idRol);
      $("#selectTipRol").change();

      $("#selectTipDoc").val(data.idTipDoc);
      $("#selectTipDoc").change();

      $("#inputNumDoc").val(data.numDoc);
      $("#inputNombres").val(data.nombres);
      $("#inputApePa").val(data.apePaterno);
      $("#inputApeMa").val(data.apeMaterno);
      $("#inputUsuario").val(data.nomUsuario);
      $("#inputPass").val(data.passUsuario);
      $("#inputRePass").val(data.passUsuario);
      $("#inputCorreo").val(data.correo);
      $("#inputCel").val(data.celular);
      $("#inputTel").val(data.telefono);
      $("#inputDirecc").val(data.direccion);

      let imageUrl = "./views/images/files/" + data.img;

      //Esta función me trae true o false
      imageExists(imageUrl, function (exists) {
        if (exists) {
          // Si existe la imágen me va traer true
          $("#divImg").show();
          $("#imgPrevisualizar").attr("src", imageUrl);
        } else {
          $("#divImg").hide();
        }
      });
    },

    error: function (e) {
      console.log(e);
    },
  });
}

/*#################################################################################################################################*/
function btnVerUsuario() {
  $(".btn-info").mouseover(function () {
    $(".btn-info").addClass("rubberBand animated");
  });

  $(".btn-info").mouseout(function () {
    $(".btn-info").removeClass("rubberBand animated");
  });
}

function btnEditarUsuario() {
  $(".btn-warning").mouseover(function () {
    $(".btn-warning").addClass("jello animated");
  });

  $(".btn-warning").mouseout(function () {
    $(".btn-warning").removeClass("jello animated");
  });
}

/* Cuando haga click con el mouse en el inputUsuario */
$("#inputUsuario").click(function () {
  generarUsuario();
});

$("#inputUsuario").keyup(function () {
  generarUsuario();
});

function generarUsuario() {
  let nombresUser = $("#inputNombres").val();
  let apePaterno = $("#inputApePa").val();

  let formData = new FormData();
  //Esto ira al contralador
  formData.append("nombresUser", nombresUser);
  formData.append("apePaterno", apePaterno);

  $.ajax({
    //en el parametro url, indico la ruta de mi modelo y hacia que caso voy enviar todos los valores del formulario
    url: "./controllers/usuariosController.php?op=generarUsuario",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function (e) {
      console.log(e);
      $("#inputUsuario").val(e);
    },
    error: function (data) {
      console.log(data);
    },
  });
}
