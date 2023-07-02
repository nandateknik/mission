<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light sidebar-shadow" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="<?= base_url('aplikasi') ?>">
                        <div class="sb-nav-link-icon"><i class="fa fa-tachometer-alt"></i></div> Dashboard
                    </a>

                    <?php if ($this->session->role == 1 || $this->session->role == 2) : ?>
                        <div class="sb-sidenav-menu-heading">Rencana Kerja</div>
                        <a class="nav-link" href="<?= base_url('aplikasi/rencana/read') ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-folder"></i></div> Data Rencana Kerja
                        </a>
                        <a class="nav-link" href="<?= base_url('aplikasi/rencana/create') ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-edit"></i></div> Input Rencana Kerja
                        </a>
                    <?php endif; ?>

                    <?php if ($this->session->role == 1 || $this->session->role == 3) : ?>
                        <div class="sb-sidenav-menu-heading">Permintaan Perbaikan</div>
                        <a class="nav-link" href="<?= base_url('aplikasi/permintaan/read') ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-archive"></i></div> Data Permintaan
                        </a>
                        <a class="nav-link" href="<?= base_url('aplikasi/permintaan/create') ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div> Input Permintaan
                        </a>
                    <?php endif; ?>


                    <?php if ($this->session->role == 4) : ?>
                        <div class="sb-sidenav-menu-heading">User</div>
                        <a class="nav-link" href="<?= base_url('aplikasi/rencana/read') ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-folder"></i></div> Data Rencana Kerja
                        </a>
                        <a class="nav-link" href="<?= base_url('aplikasi/permintaan/read') ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-archive"></i></div> Data Permintaan
                        </a>
                    <?php endif; ?>

                    <?php if ($this->session->role == 1) : ?>
                        <div class="sb-sidenav-menu-heading">Pengaturan</div>
                        <a class="nav-link" href="<?= base_url('pengaturan/user') ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-archive"></i></div> Data User
                        </a>
                    <?php endif; ?>

                    

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?= $this->session->nama; ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">