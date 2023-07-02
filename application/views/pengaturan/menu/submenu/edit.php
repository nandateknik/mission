<?php
$this->load->view('templates/admin/head');
$this->load->view('templates/admin/topbar');
$this->load->view('templates/admin/sidebar');
$this->load->view('templates/admin/breadcrumb');
?>

<div class="container">
    <?= $this->session->flashdata('editmenu'); ?>
    <a href="<?= base_url('submenu/read/' . $submenu->id_menu) ?>" class="btn btn-secondary mb-4"><i class="fa fa-arrow-left"></i>Back</a>
    <form action="" method="post">
        <div class="card p-4">
            <div class="container">
                <h5 class="text-center">FORM EDIT SUBMENU</h5>
                <hr>
                <input type="hidden" value="<?= $submenu->id_menu; ?>" name="id_menu">
                <div class="form-group">
                    <label for="submenu">SUBMENU</label>
                    <input type="text" value="<?= $submenu->submenu; ?>" name="submenu" id="submenu" class="form-control">
                </div>
                <div class="form-group">
                    <label for="icon">ICON</label>
                    <input type="text" value="<?= $submenu->icon; ?>" name="icon" id="icon" class="form-control">
                </div>
                <div class="form-group">
                    <label for="link">LINK SUBMENU</label>
                    <input type="text" value="<?= $submenu->link; ?>" name="link" id="link" class="form-control">
                </div>
            </div>
            <hr>
            <div class="text-center">
                <button class="btn btn-primary">UPDATE</button>
            </div>
        </div>
    </form>
</div>

<?php $this->load->view('templates/admin/footer'); ?>