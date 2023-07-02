<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar nav-shadow navbar-expand navbar-light bg-light">
        <button style="margin-left:10px;" class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-align-left"></i></button>
        <a class="navbar-brand" href="index.html">Mission work</a>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">

            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('pengaturan/user/profile') ?>"><i class="fa fa-bug" aria-hidden="true"></i> Profile</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#logoutModal">
                        <i class="fa fa-power-off" aria-hidden="true"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>