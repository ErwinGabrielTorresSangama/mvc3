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

														<div class="col-lg-2 mb-3">
															<div class="input-group margen_input">
																<input type="text" class="form-control" id="iptCodBarras" data-index="2" placeholder="Buscar por código">
															</div>
														</div>

														<div class="col-lg-2 mb-3">
															<div class="input-group margen_input">
																<input type="text" class="form-control" id="iptCategoria" data-index="3" placeholder="Buscar por categoría">
															</div>
														</div>

														<div class="col-lg-2 mb-3">
															<div class="input-group margen_input">
																<input type="text" class="form-control" id="iptProducto" data-index="4" placeholder="Buscar por producto">
															</div>
														</div>

														<div class="col-lg-2 mb-3">
															<div class="input-group margen_input">
																<input type="text" class="form-control" id="iptPreVentDesde" placeholder="Buscar por precio desde">
															</div>
														</div>

														<div class="col-lg-2 mb-3">
															<div class="input-group margen_input">
																<input type="text" class="form-control" id="iptPreVentHasta" placeholder="Buscar por precio hasta">
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
										<button type="button" class="btn btn-primary form-control waves-effect waves-light" data-toggle="modal" data-target="#myModalNuevoProducto" id="btnModalNuevoProducto" data-backdrop="static" data-keyboard="false">
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
					</div> <!-- End row-->

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

					<!-- Fin Contenido  -->
				</div> <!-- Fin card-body -->
			</div><!-- End cardCollpase4 -->
		</div><!-- End card -->
	</div><!-- End col-lg-12 -->
</div>



<!-- Modal nuevo usuario -->
<div class="modal fade" id="myModalNuevoProducto" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabelcenter">
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

						<div class="form-group col-lg-6 col-xs-12">
							<label>Código de barras <span class="campoObligatorio">(*)</span></label>
							<input type="hidden" class="form-control" id="inputIdProducto" name="inputIdProducto">
							<input onkeypress="return soloNumeros(event)" type="text" class="form-control" placeholder="Código de barras" id="inputCodBarras" name="inputCodBarras">
						</div>

						<div class="form-group col-lg-6 col-xs-12">
							<label>Categoría <span class="campoObligatorio">(*)</span></label>
							<select class="js-example-responsive form-control" id="selectCategoria" name="selectCategoria">
								<option value="">-- Seleccionar --</option>
							</select>
						</div>

					
						<div class="form-group col-lg-12 col-xs-12 mb-3">
							<label>Descripción <span class="campoObligatorio">(*)</span></label>
							<input type="text" class="form-control" placeholder="Descripción" id="inputDescripcion" name="inputDescripcion">
						</div>

						<div class="form-group col-lg-4 col-xs-12 mb-3">
							<label>Precio compra <span class="campoObligatorio">(*)</span></label>
							<input type="text" class="form-control" placeholder="Precio compra" id="inputPreCompra" name="inputPreCompra">
						</div>

						<div class="form-group col-lg-4 col-xs-12 mb-3">
							<label>Precio venta <span class="campoObligatorio">(*)</span></label>
							<input type="text" class="form-control" placeholder="Precio venta" id="inputPreVenta" name="inputPreVenta">
						</div>

						<div class="form-group col-lg-4 col-xs-12 mb-3" id="divUsuario">
							<label>Utilidad</label>
							<input type="text" class="form-control" placeholder="Utilidad" id="inputUtilidad" name="inputUtilidad" disabled>
						</div>

						<div class="form-group col-lg-6 col-xs-12 mb-3" id="divPass">
							<label>Stock <span class="campoObligatorio">(*)</span></label>
							<input type="number" class="form-control" placeholder="Stock" id="inputStock" name="inputStock">
						</div>

						<div class="form-group col-lg-6 col-xs-12 mb-3" id="divPass">
							<label>Minimo Stock <span class="campoObligatorio">(*)</span></label>
							<input type="number" class="form-control" placeholder="Minimo stock" id="inputMinimoStock" name="inputMinimoStock">
						</div>

					</div>
				</form>

				<!-- Fin del contenido del modal -->

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal" onclick="limpiarCampos('nuevoProducto');"><i class=" mdi mdi-close-octagon"></i> Cerrar</button>
				<button type="button" class="btn btn-success waves-effect waves-light" onclick="guardar();"><i class="mdi mdi-content-save"></i> Guardar</button>
			</div>
		</div>
	</div>
</div>
<!-- Fin modal -->



<script src="./ajax/inventarioView.js"></script>