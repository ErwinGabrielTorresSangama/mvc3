
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>ErwinTorres</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="./views/images/favicon.ico">

        <!-- Toastr css -->
        <link href="./views/libs/toastr/toastr.min.css" rel="stylesheet" type="text/css" />
     
        <link href="./views/libs/custombox/custombox.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">


        <link href="./views/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">

        <link href="./views/libs/select2/select2.min.css" rel="stylesheet" type="text/css">

          <!-- third party css -->
        <link href="./views/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="./views/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="./views/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="./views/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 

        <!-- App css -->
        <link href="./views/css/bootstrap.min.css" rel="stylesheet" />
        <link href="./views/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
        <link href="./views/css/icons.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
    
        <script src="./views/libs/custombox/custombox.min.js"></script>

        <!-- SweetAlert css -->
        <link href="./views/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery  -->
        <script src="./views/js/jquery.min.js"></script>

         <!-- Toastr js -->
        <script src="./views/libs/toastr/toastr.min.js"></script>
        <script src="./views/js/pages/toastr.init.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

       
    </head>

    <body>
        <?php
            /*Para nuestra conveniencia vamos a trabajr con include_once, para no tener problemas con el servidor*/
        
            include_once "controllers/RoutesController.php";
            $newView = new viewController();
            $vistaR = $newView->getCtrViews();
            //var_dump($vistaR);

            if($vistaR=="login" || $vistaR=="error404")
            {
                if($vistaR=="login")
                {
                    include_once "./views/content/loginView.php";  

                }else{
                    include_once "./views/content/error404View.php";  
                }

            }
            else
            {
                session_start();
                if (!isset($_SESSION['s_iduser'])) //Si la variable de session no viene definida
                {
                    header('Location: login');
                }
        ?>

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- Topbar Start -->
             <!-- Incluimos el header(cabezote)-->
             <?php include_once "modules/header.php"?>
            <!-- end Topbar --> 
            
            <!-- ========== Left Sidebar Start ========== -->
                 <!-- Incluimos el menu(navegación lateral) -->
                 <?php include_once "modules/menu.php"?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!--end page wrapper -->

                        
                        <!-- Aqui ira el contenido de las vistas -->
                        <div class="page-wrapper">
                                <?php
                                include_once $vistaR; 
                                ?> 
                        </div>

                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->

                

                <!-- Footer Start -->
                <?php include_once "modules/footer.php"?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>

        
    
        <!-- Vendor js -->
        <script src="./views/js/vendor.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
        
        <script src="./views/libs/sweetalert2/sweetalert2.min.js"></script>
        <script src="./views/libs/select2/select2.min.js"></script>

        <script src="./views/libs/custombox/custombox.min.js"></script>


        <!-- Required datatable js -->
        <script src="./views/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="./views/libs/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="./views/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="./views/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="./views/libs/jszip/jszip.min.js"></script>
        <script src="./views/libs/pdfmake/pdfmake.min.js"></script>
        <script src="./views/libs/pdfmake/vfs_fonts.js"></script>
        <script src="./views/libs/datatables/buttons.html5.min.js"></script>
        <script src="./views/libs/datatables/buttons.print.min.js"></script>

        <!-- Responsive examples -->
        <script src="./views/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="./views/libs/datatables/responsive.bootstrap4.min.js"></script>

        <script src="./views/libs/datatables/dataTables.keyTable.min.js"></script>
        <script src="./views/libs/datatables/dataTables.select.min.js"></script>

        <!-- Datatables init -->
        <script src="./views/js/pages/datatables.init.js"></script>

        <!-- App js -->
        <script src="./views/js/app.min.js"></script>
    </body>

</html>
   

<?php } ?>