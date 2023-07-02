<?php
$this->load->view('templates/admin/head');
$this->load->view('templates/admin/topbar');
$this->load->view('templates/admin/sidebar');
$this->load->view('templates/admin/breadcrumb');
?>

<div class="container">
    <?= $this->session->userdata('pesan'); ?>

    <form action="" method="post">
        <div class="card p-4">
            <div class="container">
                <h5 class="text-center">FORM TAMBAH SUBMENU</h5>
                <hr>
                <div class="form-group">
                    <label for="IDmenu">ID MENU</label>
                    <input readonly type="text" value="<?= $this->uri->segment(4) ?>" name="IDmenu" id="IDmenu" class="form-control">
                </div>
                <div class="form-group">
                    <label for="icon">ICON</label>
                    <input type="text" name="icon" id="icon" class="form-control">
                </div>
                <div class="form-group">
                    <label for="submenu">SUBMENU</label>
                    <input type="text" name="submenu" id="submenu" class="form-control">
                </div>
                <div class="form-group">
                    <label for="link">LINK</label>
                    <input type="text" name="link" id="link" class="form-control">
                </div>
            </div>
            <hr>
            <div class="text-center">
                <button class="btn btn-primary">SIMPAN</button>
            </div>
        </div>
    </form>
</div>

<?php $this->load->view('templates/admin/footer'); ?>