<style>
	.campoObligatorio
	{
		color: red;
	}
	.error
	{
		color: red;
	}
	.dataTables_filter {
		display: none;
	}
	
.modal.fade{opacity:1}
.modal.fade .modal-dialog{-webkit-transform:translate(0);-moz-transform:translate(0);transform:translate(0)}

</style>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">Erwin Torres</a></li>
                        <li class="breadcrumb-item"><a href="#">Productos</a></li>
						<li class="breadcrumb-item"><a href="#">Categorías</a></li>

                    </ol>
                </div>
        </div>
    </div>
</div>


<div class="row">
	<div class="col-lg-12">
    	<div class="card">
            <div class="card-header bg-success py-3 text-white">
                <h5 class="card-title mb-0 text-white"><i class="mdi mdi-file-document-box-check"></i> Categorías</h5>
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
											<i class="mdi mdi-plus"></i> Nueva categoría
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
											<th >N°</th>
											<th >Nombre</th>
											<th >Aplica peso</th>
											<th >Fecha creación</th>
											<th >Fecha actualización</th>
											<th >Acciones</th>
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
                </div> <!-- Fin card-body(32) -->
            </div>
        </div>
         <!-- end card-->
</div>
    
					
<script src="./ajax/inventarioView.js"></script>
