<style>
    .dataTables_filter {
        display: none;
    }
</style>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Erwin Torres</a></li>
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-success py-3 text-white">
                <h5 class="card-title mb-0 text-white"><i class="mdi mdi-home"></i> Inicio</h5>
            </div>

            <div id="cardCollpase4" class="collapse show">
                <div class="card-body">
                    <!-- Contenido  -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">

                                <div class="col-xl-3 col-sm-6">
                                    <div class="card bg-pink">
                                        <div class="card-body widget-style-2">
                                            <div class="text-white media">
                                                <div class="media-body align-self-center">
                                                    <h2 class="my-0 text-white">
                                                        <span data-plugin="counterup" id="spanTotalProductos"></span>
                                                    </h2>
                                                    <p class="mb-0">Productos registrados</p>
                                                </div>
                                                <i class="mdi mdi-file-document-box-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-6">
                                    <div class="card bg-purple">
                                        <div class="card-body widget-style-2">
                                            <div class="text-white media">
                                                <div class="media-body align-self-center">
                                                    <h2 class="my-0 text-white">
                                                        <span data-plugin="counterup" id="spanTotalCompras"></span>
                                                    </h2>
                                                    <p class="mb-0">Total compras</p>
                                                </div>
                                                <i class="mdi mdi-cash-multiple"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-6">
                                    <div class="card bg-info">
                                        <div class="card-body widget-style-2">
                                            <div class="text-white media">
                                                <div class="media-body align-self-center">
                                                    <h2 class="my-0 text-white">
                                                        <span data-plugin="counterup" id="spanTotalVentas"></span>
                                                    </h2>
                                                    <p class="mb-0">Total ventas</p>
                                                </div>
                                                <i class="mdi mdi-cart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-6">
                                    <div class="card bg-success">
                                        <div class="card-body widget-style-2">
                                            <div class="text-white media">
                                                <div class="media-body align-self-center">
                                                    <h2 class="my-0 text-white">
                                                        <span data-plugin="counterup" id="spanGanancias"></span>
                                                    </h2>
                                                    <p class="mb-0">Ganancias</p>
                                                </div>
                                                <i class="mdi mdi-square-inc-cash"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xl-3 col-sm-6">
                                    <div class="card bg-primary">
                                        <div class="card-body widget-style-2">
                                            <div class="text-white media">
                                                <div class="media-body align-self-center">
                                                    <h2 class="my-0 text-white">
                                                        <span data-plugin="counterup" id="spanProductosPocoStock"></span>
                                                    </h2>
                                                    <p class="mb-0">Productos con poco stock</p>
                                                </div>
                                                <i class="mdi mdi-alert-octagon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-6">
                                    <div class="card bg-warning">
                                        <div class="card-body widget-style-2">
                                            <div class="text-white media">
                                                <div class="media-body align-self-center">
                                                    <h2 class="my-0 text-white">
                                                        <span data-plugin="counterup">145</span>
                                                    </h2>
                                                    <p class="mb-0">Total usuarios</p>
                                                </div>
                                                <i class="mdi mdi-account-multiple-outline"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-6">
                                    <div class="card bg-danger">
                                        <div class="card-body widget-style-2">
                                            <div class="text-white media">
                                                <div class="media-body align-self-center">
                                                    <h2 class="my-0 text-white">
                                                        <span data-plugin="counterup" id="spanVentasHoy"></span>
                                                    </h2>
                                                    <p class="mb-0">Ventas del día</p>
                                                </div>
                                                <i class="mdi mdi-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-6">
                                    <div class="card bg-secondary">
                                        <div class="card-body widget-style-2">
                                            <div class="text-white media">
                                                <div class="media-body align-self-center">
                                                    <h2 class="my-0 text-white">
                                                        <span data-plugin="counterup">145</span>
                                                    </h2>
                                                    <p class="mb-0">New Users</p>
                                                </div>
                                                <i class="mdi mdi-comment-multiple"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End col-xl-12 -->
                    </div> <!-- row-->
                    <!-- Fin Contenido  -->
                </div> <!-- Fin card-body -->
            </div><!-- End collapse show-->
        </div> <!-- End card -->
    </div> <!-- End col-lg-12 -->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header py-3 bg-transparent">
                <div class="card-widgets">
                    <a data-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false" aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
                    <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                </div>
                <h5 class="card-title mb-2" id="h5TotalVent"></h5>
            </div>
            <div id="cardCollpase1" class="collapse show">
                <div class="col-lg-12">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- End col-lg-12-->

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header py-3 bg-transparent">
                <div class="card-widgets">
                    <a data-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                    <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                </div>
                <h5 class="card-title mb-4">Productos más vendidos</h5>
            </div>
            <div id="cardCollpase2" class="collapse show">
                <!-- DataTable -->
                <div id="selection-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="col-lg-12">
                        <table id="tablaProdMasVend" class="table  table-striped dt-responsive nowrap dataTable no-footer dtr-inline" style="width: 100%;">
                            <thead>
                                <tr role="row" class="bg-secondary text-white">
                                    <th>#</th>
                                    <th>Cod. producto</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Ventas</th>
                                </tr>
                            </thead>

                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <!-- Fin datatable-->
            </div>
        </div> <!-- End card-->
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header py-3 bg-transparent">
                <div class="card-widgets">
                    <a data-toggle="collapse" href="#cardCollpase3" role="button" aria-expanded="false" aria-controls="cardCollpase3"><i class="mdi mdi-minus"></i></a>
                    <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                </div>
                <h5 class="card-title mb-4">Productos con poco stock</h5>
            </div>
            <div id="cardCollpase3" class="collapse show">
                <!-- DataTable -->
                <div id="selection-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="col-lg-12">
                        <table id="tablaProdPocStock" class="table  table-striped dt-responsive nowrap dataTable no-footer dtr-inline" style="width: 100%;">
                            <thead>
                                <tr role="row" class="bg-secondary text-white">
                                    <th>#</th>
                                    <th>Cod. producto</th>
                                    <th>Producto</th>
                                    <th>Stock actual</th>
                                    <th>Mínimo stock</th>
                                </tr>
                            </thead>

                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <!-- Fin datatable-->
            </div>
        </div> <!-- End card-->
    </div>

</div> <!-- End row -->

<script src="./ajax/homeView.js"></script>