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

	.btnBfrtip {
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

	.margen_input {
		position: relative;
		margin: 10px 0 20px;
	}

	input {
		font-size: 18px;
		padding: 10px 10px 10px 5px;
		display: block;
		width: 300px;
		border: none;
		border-bottom: 1px solid #757575;
	}

	input:focus {
		outline: none;
	}

	label {
		color: #757575;
		font-size: 18px;
		font-weight: normal;
		position: absolute;
		pointer-events: none;
		left: 5px;
		top: 10px;
		transition: 0.2s ease all;
		-moz-transition: 0.2s ease all;
		-webkit-transition: 0.2s ease all;
	}

	input:focus~label,

	input:valid~label {
		top: -20px;
		font-size: 14px;
		color: #757575;
	}
</style>
<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<div class="page-title-right">
				<ol class="breadcrumb p-0 m-0">
					<li class="breadcrumb-item"><a href="#">Erwin Torres</a></li>
					<li class="breadcrumb-item"><a href="#">Productos</a></li>
					<li class="breadcrumb-item"><a href="#">Inventario</a></li>

				</ol>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header bg-success py-3 text-white">
				<h5 class="card-title mb-0 text-white"><i class="mdi mdi-file-document-box-check"></i> Inventario</h5>
			</div>

			<div id="cardCollpase4" class="collapse show">
				<div class="card-body">
					<!-- Contenido  -->
					<div class="row">
						<div class="col-sm-12">
							<form>

								<div class="row">
									<div class="form-group col-lg-12 col-xs-12">
										<div class="alert alert-info alert-dismissible fade show" role="alert">
											<span><i class=" mdi mdi-information"></i>Descargar el programa "Barcode to PC" haciendo <a href="https://barcodetopc.com/" target="_blank">clic aquí.</a></span>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									</div>
									<div class="col-xl-12">

										<!-- Portlet card -->
										<div class="card">


											<div class="card-header bg-success py-3 text-white">
												<h5 class="card-title mb-0 text-white"><i class="mdi mdi-filter"></i> Filtros de busqueda</h5>
											</div>

											<div>
												<div class="card-body">

													<div class="row">

														<div class="col-lg-2">
															<div class="input-group margen_input">
																<input type="text" class="form-control" id="iptCodBarras" data-index="2" placeholder="Buscar por código">
																<label>Código de barras</label>
															</div>
														</div>

														<div class="col-lg-2">
															<div class="input-group margen_input">
																<input type="text" class="form-control" id="iptCategoria" data-index="3" placeholder="Buscar por categoría">
																<label>Categoría</label>
															</div>
														</div>

														<div class="col-lg-2">
															<div class="input-group margen_input">
																<input type="text" class="form-control" id="iptProducto" data-index="4" placeholder="Buscar por producto">
																<label>Producto</label>
															</div>
														</div>

														<div class="col-lg-2">
															<div class="input-group margen_input">
																<input type="text" class="form-control" id="iptPreVentDesde" placeholder="Buscar por precio desde">
																<label>P. Venta desde</label>
															</div>
														</div>

														<div class="col-lg-2">
															<div class="input-group margen_input">
																<input type="text" class="form-control" id="iptPreVentHasta" placeholder="Buscar por precio hasta">
																<label>P. Venta hasta</label>
															</div>
														</div>
														<div class="col-lg-2">
															<div class="input-group margen_input">
																<button class="btn btn-dark form-control" onclick="limpiarCampos('criteriosBusqueda')"> <i class="mdi mdi-broom"></i> Limpiar campos</button>
															</div>
														</div>
													</div>


												</div>
											</div>
										</div><!-- end card-->
									</div>
								</div>


								<div class="row">
									<div class="col-lg-3 mb-3">
										<button type="button" class="btn btn-primary form-control waves-effect waves-light" data-toggle="modal" data-target="#myModalNuevoProducto" id="btnModalNuevoUsuario" data-backdrop="static" data-keyboard="false">
											<i class="mdi mdi-plus"></i> Nuevo producto
										</button>
									</div>
									<div class="col-lg-1 mb-3">
										<button type="button" class="btn btn-success form-control waves-effect waves-light" id="reportExcel">
											<i class="mdi mdi-file-excel"></i>
										</button>
									</div>
									<div class="col-lg-1 mb-3">
										<button type="button" class="btn btn-danger form-control waves-effect waves-light" id="reportPdf">
											<i class=" mdi mdi-file-pdf"></i>
										</button>
									</div>
									<div class="col-lg-1 mb-3">
										<button type="button" class="btn btn-warning form-control waves-effect waves-light" id="btnPrint">
											<i class=" mdi mdi-printer"></i>
										</button>
									</div>
									<div class="col-lg-6 input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id=""><i class="fas fa-search"></i></span>
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
								<table id="tablaInventario" class="table  table-striped dt-responsive nowrap dataTable no-footer dtr-inline" style="width: 100%;">
									<thead>
										<tr role="row" class="bg-secondary text-white">
											<th></th>
											<th>N°</th>
											<th>Código</th>
											<th>Categoría</th>
											<th>Producto</th>
											<th>P. compra</th>
											<th>P. venta</th>
											<th>Utilidad</th>
											<th>Stock</th>
											<th>Min. Stock</th>
											<th>Ventas</th>
											<th>Fecha creación</th>
											<th>Fecha actualización</th>
											<th>Acciones</th>
										</tr>
									</thead>

									<tbody>


									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- Fin datatable-->


					<!-- Modal -->
					<div class="modal modalAnimate fade" id="myModalNuevoProducto" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabelcenter" style="display: none;" aria-hidden="true">
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
					<!-- Fin modal -->

					<!-- Fin Contenido  -->
				</div> <!-- Fin card-body(32) -->
			</div>
		</div>
		<!-- end card-->
	</div>


	<script src="./ajax/inventarioView.js"></script>