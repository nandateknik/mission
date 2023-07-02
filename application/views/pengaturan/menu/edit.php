<?php
$this->load->view('templates/admin/head');
$this->load->view('templates/admin/topbar');
$this->load->view('templates/admin/sidebar');
$this->load->view('templates/admin/breadcrumb');
?>

<div class="container">
    <?= $this->session->flashdata('editmenu'); ?>
    <div class="menu p-4">
        <a href="<?= base_url('menu') ?>" class="btn btn-secondary"><i class="fa fa-arrow-left"></i>Back</a>
    </div>
    <form action="" method="post">
        <div class="card p-4">
            <div class="container">
                <h5 class="text-center">FORM EDIT MENU</h5>
                <hr>
                <div class="form-group">
                    <label for="menu">MENU</label>
                    <input type="text" value="<?= $menu->menu; ?>" name="menu" id="menu" class="form-control">
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