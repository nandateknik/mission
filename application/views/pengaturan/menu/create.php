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
                <h5 class="text-center">FORM TAMBAH MENU</h5>
                <hr>
                <div class="form-group">
                    <label for="menu">MENU</label>
                    <input type="text" name="menu" id="menu" class="form-control">
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