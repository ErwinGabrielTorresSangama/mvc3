<style>
	.campoObligatorio {
		color: red;
	}

	.error {
		color: red;
	}

	.dataTables_filter {
		display: none;
	}

	.modal.fade {
		opacity: 1
	}

	.modal.fade .modal-dialog {
		-webkit-transform: translate(0);
		-moz-transform: translate(0);
		transform: translate(0)
	}
</style>
<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<div class="page-title-right">
				<ol class="breadcrumb p-0 m-0">
					<li class="breadcrumb-item"><a href="#">Erwin Torres</a></li>
					<li class="breadcrumb-item"><a href="#">Usuarios</a></li>
					<li class="breadcrumb-item"><a href="#">Usuario</a></li>

				</ol>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header bg-success py-3 text-white">
				<h5 class="card-title mb-0 text-white"><i class="mdi mdi-account-multiple"></i> Usuario</h5>
			</div>

			<div id="cardCollpase4" class="collapse show">
				<div class="card-body">
					<!-- Contenido  -->
					<div class="row">
						<div class="col-sm-12">
							<form>
								<div class="row">
									<div class="col-lg-4 mb-3">
										<button type="button" class="btn btn-primary form-control waves-effect waves-light" data-toggle="modal" data-target="#myModalNuevoUsuario" id="btnModalNuevoUsuario" data-backdrop="static" data-keyboard="false">
											<i class="mdi mdi-plus"></i> Nuevo usuario
										</button>
									</div>

									<div class="col-lg-8 input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
										</div>
										<input type="search" class="form-control global_filter" id="inputSearch" placeholder="Realizar busqueda" aria-label="Username" aria-describedby="basic-addon1">
									</div>
								</div>
							</form>
						</div>
					</div> <!-- row(34)-->

					<!-- DataTable -->
					<div id="selection-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
						<div class="row">
							<div class="col-lg-12">
								<table id="tablaUsuarios" class="table  table-striped dt-responsive nowrap dataTable no-footer dtr-inline" style="width: 100%;">
									<thead>
										<tr role="row" class="bg-secondary text-white">
											<th>N°</th>
											<th>Tipo de rol</th>
											<th>Nombre</th>
											<th>Apellidos</th>
											<th>Estado</th>
											<th>Acciones</th>
										</tr>
									</thead>

									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- Fin datatable-->

										<!-- Modal nuevo usuario -->
										<div class="modal fade" id="myModalNuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabelcenter">
						<div class="modal-dialog modal-lg zoomInRight animated modal-dialog-centered">
							<div class="modal-content">

								<div class="modal-header ">
								</div>

								<div class="modal-body">
									<!--Contenido del modal -->

									<form id="formularioModal">
										<div class="row">

											<div class="form-group col-lg-12 col-xs-12">
												<div class="alert alert-info alert-dismissible fade show" role="alert">
													<span><i class=" mdi mdi-information"></i> El símbolo <label for="uname"><span class="campoObligatorio">(*)</span></label> hace referencia que el campo es obligatorio.</span>
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
											</div>

											<div class="form-group col-lg-12 col-xs-12" id="divRol">
												<label>Rol <span class="campoObligatorio">(*)</span></label>
												<select class="js-example-responsive form-control" id="selectTipRol" name="selectTipRol">
													<option value="">-- Seleccionar --</option>
												</select>
											</div>


											<div class="form-group col-lg-6 col-xs-12">
												<label>Tipo de documento <span class="campoObligatorio">(*)</span></label>
												<select class="js-example-responsive form-control" id="selectTipDoc" name="selectTipDoc">
													<option value="">-- Seleccionar --</option>
												</select>
											</div>

											<div class="form-group col-lg-6 col-xs-12">
												<label>Número de documento <span class="campoObligatorio">(*)</span></label>
												<input type="hidden" class="form-control" id="inputIdUser" name="inputIdUser">
												<input onkeypress="return soloNumeros(event)" type="text" class="form-control" placeholder="Numero de documento" id="inputNumDoc" name="inputNumDoc">
											</div>

											<div class="form-group col-lg-4 col-xs-12 mb-3">
												<label>Nombre's <span class="campoObligatorio">(*)</span></label>
												<input onkeypress="return soloLetras(event)" type="text" class="form-control" placeholder="Nombres" id="inputNombres" name="inputNombres">
											</div>

											<div class="form-group col-lg-4 col-xs-12 mb-3">
												<label>Apellido paterno <span class="campoObligatorio">(*)</span></label>
												<input onkeypress="return soloLetras(event)" type="text" class="form-control" placeholder="Apellido paterno" id="inputApePa" name="inputApePa">
											</div>

											<div class="form-group col-lg-4 col-xs-12 mb-3">
												<label>Apellido materno <span class="campoObligatorio">(*)</span></label>
												<input onkeypress="return soloLetras(event)" type="text" class="form-control" placeholder="Apellido materno" id="inputApeMa" name="inputApeMa">
											</div>

											<div class="form-group col-lg-4 col-xs-12 mb-3" id="divUsuario">
												<label>Usuario <span class="campoObligatorio">(*)</span></label>
												<input onkeypress="return soloLetras(event)" type="text" class="form-control" placeholder="Usuario" id="inputUsuario" name="inputUsuario">
											</div>

											<div class="form-group col-lg-4 col-xs-12 mb-3" id="divPass">
												<label>Password <span class="campoObligatorio">(*)</span></label>
												<input type="password" class="form-control" placeholder="Password" id="inputPass" name="inputPass">
											</div>

											<div class="form-group col-lg-4 col-xs-12 mb-3" id="divRePass">
												<label>Repetir password <span class="campoObligatorio">(*)</span></label>
												<input type="password" class="form-control" placeholder="Confirmar Password" id="inputRePass" name="inputRePass">
											</div>

											<div class="form-group col-lg-4 col-xs-12 mb-3">
												<label>Correo electrónico<span class="campoObligatorio">(*)</span></label>
												<input type="email" class="form-control" placeholder="Correo electrónico" id="inputCorreo" name="inputCorreo">
											</div>

											<div class="form-group col-lg-4 col-xs-12 mb-3">
												<label>Celular</label>
												<input onkeypress="return soloNumeros(event)" type="text" class="form-control" placeholder="Celular" id="inputCel" name="inputCel">
											</div>

											<div class="form-group col-lg-4 col-xs-12 mb-3">
												<label>Teléfono</label>
												<input onkeypress="return soloNumeros(event)" type="text" class="form-control" placeholder="Teléfono" id="inputTel" name="inputTel">
											</div>

											<div class="form-group col-lg-12 col-xs-12 mb-3">
												<label>Dirección</label>
												<input type="text" class="form-control" placeholder="Dirección actual" id="inputDirecc" name="inputDirecc">
											</div>

											<div class="form-group col-lg-6 col-xs-12 mb-3">
												<label>Imagen</label>

												<input type="file" class="form-control" name="inputFile" id="inputFile" accept="imagen/jpg,imagen/jpeg,imagen/png">
											</div>

											<div class="form-group col-lg-6 col-xs-12 mb-3 text-center" id="divImg">
												<input type="hidden" class="form-control" name="imagenactual" id="imagenactual">
												<img src="" width="150px" height="120px" id="imgPrevisualizar">
											</div>


										</div>
									</form>

									<!-- Fin del contenido del modal -->

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal" onclick="limpiarCampos('nuevoUsuario');"><i class=" mdi mdi-close-octagon"></i> Cerrar</button>
									<button type="button" class="btn btn-success waves-effect waves-light" onclick="guardar();"><i class="mdi mdi-content-save"></i> Guardar</button>
								</div>
							</div>
						</div>
					</div>
					<!-- Fin modal nuevo usuario -->

					<!-- Modal ver usuario -->
					<div class="modal modalAnimate fade" id="myModalVerUsuario" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabelcenter" style="display: none;" aria-hidden="true">
						<div class="modal-dialog modal-lg zoomInRight animated modal-dialog-centered">
							<div class="modal-content">

								<div class="modal-header">
								</div>

								<div class="modal-body">
									<!--Contenido del modal -->

									<div class="container">

										<form class="form-horizontal">

											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Tipo de rol</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" id="verUsuTipRol" name="verUsuTipRol" value="" readonly="">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Tipo documento</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" id="verUsuTipDoc" name="verUsuTipDoc" readonly="">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-lg-3 col-form-label">N° documento</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" id="verUsuNumDoc" name="verUsuNumDoc" value="" readonly="">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Nombres</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" id="verUsuNombres" name="verUsuNombres" readonly="">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Apellidos</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" id="verApeCom" name="verApeCom" readonly="">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Usuario</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" id="verUsuNomUsu" name="verUsuNomUsu" readonly="">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Correo electrónico</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" id="verUsuCorreo" name="verUsuCorreo" readonly="">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Celular</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" id="verUsuCel" name="verUsuCel" readonly="">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Telefono</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" id="verUsuTel" name="verUsuTel" readonly="">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Dirección</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" id="verUsuDirec" name="verUsuDirec" readonly="">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Imágen</label>
												<div class="col-lg-9" id="verUsuImg"></div>
											</div>

										</form>
									</div>



									<!-- Fin del contenido del modal -->

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i class=" mdi mdi-close-octagon"></i> Cerrar</button>
								</div>
							</div>
						</div>
					</div>
					<!-- Fin modal ver usuario -->

					<!-- Fin Contenido  -->
				</div> <!-- Fin card-body(32) -->
			</div>
		</div><!-- End card-->
	</div><!-- End col-lg-12-->
</div><!-- End row-->


<script src="./ajax/usuariosView.js"></script>