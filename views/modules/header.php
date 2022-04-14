<div class="navbar-custom bg-success">
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <li class="dropdown notification-list">
                       
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="font-16 m-0">
                                    <span class="float-right">
                                        <a href="" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Chat
                                </h5>
                            </div>

                            <div class="slimscroll noti-scroll">

                                <div class="inbox-widget">
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="./views/images/users/avatar-1.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Cristina Pride</p>
                                            <p class="inbox-item-text text-truncate">Hi, How are you? What about our next meeting</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="./views/images/users/avatar-2.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Sam Garret</p>
                                            <p class="inbox-item-text text-truncate">Yeah everything is fine</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="./views/images/users/avatar-3.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Karen Robinson</p>
                                            <p class="inbox-item-text text-truncate">Wow that's great</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="./views/images/users/avatar-4.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Sherry Marshall</p>
                                            <p class="inbox-item-text text-truncate">Hi, How are you? What about our next meeting</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="./views/images/users/avatar-5.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Shawn Millard</p>
                                            <p class="inbox-item-text text-truncate">Yeah everything is fine</p>

                                        </div>
                                    </a>
                                </div> <!-- end inbox-widget -->

                            </div>
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                View all
                                <i class="fi-arrow-right"></i>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="./views/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1 text-white"><?php echo ucfirst($_SESSION['s_nomUser']);?> <i class="mdi mdi-chevron-down"></i> 
                        </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-outline"></i>
                                <span>Perfil</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-settings-outline"></i>
                                <span>Configuraciones</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-lock-outline"></i>
                                <span>Lock Screen</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="./controllers/loginController.php?op=cerrarSesion" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout-variant"></i>
                                <span>Salir</span>
                            </a>

                        </div>
                    </li>
                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="<?php echo SERVERURL; ?>home" class="logo text-center logo-light">
                        <span class="logo-lg">
                            <img src="./views/images/logo-light.png" alt="" height="30">
                            <!-- <span class="logo-lg-text-dark">Velonic</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">V</span> -->
                            <img src="./views/images/logo-sms.png" alt="" height="30">
                        </span>
                    </a>
                </div>

                <!-- LOGO -->
  

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect">
                            <i class="mdi mdi-menu text-white"></i>
                        </button>
                    </li>
        
                </ul>
</div>