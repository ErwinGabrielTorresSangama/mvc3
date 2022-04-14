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
					<li class="breadcrumb-item"><a href="#">Productos</a></li>
					<li class="breadcrumb-item"><a href="#">Carga masiva</a></li>

				</ol>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header bg-success py-3 text-white">
				<h5 class="card-title mb-0 text-white"><i class="mdi mdi-file-document-box-check"></i> Carga masiva</h5>
			</div>

			<div id="cardCollpase4" class="collapse show">
				<div class="card-body">
					<!-- Contenido  -->
					<div class="row">
						<div class="form-group col-lg-12 col-xs-12">
							<div class="alert alert-info alert-dismissible fade show" role="alert">
								<span><i class=" mdi mdi-information"></i> Debe seleccionar un archivo con extensión .xls .xlsx</span>
								<br>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
						
							<div class="alert alert-info alert-dismissible fade show" role="alert">
								<span><i class="mdi mdi-information"></i> Plantilla en excel </span>
								<a class="btn btn-success btn-xs" target="_blank" href="./files/Plantilla.xlsx"><i class="mdi mdi-download"></i> Descargar</a>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
						</div>



						<div class="col-sm-12">
							<form enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-10 input-group mb-3">
										<input type="file" class="form-control" id="inputFile" accept=".xls, .xlsx">
									</div>
									<div class="col-lg-2 mb-3">
										<button type="button" class="btn btn-primary form-control waves-effect waves-light" id="btnCargar" onclick="cargarExcel();">
											<i class="mdi mdi-upload-outline"></i> Cargar
										</button>
									</div>
								</div>
								<!-- Cragando -->
							</form>
						</div>
					</div> <!-- row(34)-->

					<!-- Fin Contenido  -->
				</div> <!-- Fin card-body(32) -->
			</div>
		</div>

		<div class="row text-center">
			<div class="col-lg-12 text-center" id="imgCargando">
			</div>
		</div>
		<!-- end card-->
	</div>


	<script src="./ajax/cargaMasivaView.js"></script>