<?php
$this->load->view('templates/admin/head');
$this->load->view('templates/admin/topbar');
$this->load->view('templates/admin/sidebar');
$this->load->view('templates/admin/breadcrumb');
?>

<div class="container">
    <?= $this->session->flashdata('menu'); ?>

    <form action="" method="post">
        <div class="card p-4">
            <div class="container">
                <h5 class="text-center">FORM PERMINTAAN PERBAIKAN</h5>
                <hr>
                <div class="form-group">
                    <label for="bagian">BAGIAN</label>
                    <select class="form-control" name="bagian" id="bagian">
                        <option <?php echo $permintaan->bagian == 'Elektrik' ? 'selected' : '' ?> value="Elektrik">Elektrik</option>
                        <option <?php echo $permintaan->bagian == 'Mekanik' ? 'selected' : '' ?> value="Mekanik">Mekanik</option>
                        <option <?php echo $permintaan->bagian == 'Operator' ? 'selected' : '' ?> value="Operator">Operator</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="permintaan">PERMINTAAN</label>
                    <textarea name="permintaan" id="permintaan" class="form-control" cols="30" rows="10"><?= $permintaan->permintaan; ?></textarea>
                </div>
                <label>URGENSI :</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" <?php echo $permintaan->urgensi == '1-3 Hari' ? 'checked' : '' ?> name="urgensi" id="inlineRadio1" value="1-3 Hari">
                    <label class="form-check-label text-danger" for="inlineRadio1">1-3 Hari</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" <?php echo $permintaan->urgensi == '1-2 Minggu' ? 'checked' : '' ?> name="urgensi" id="inlineRadio2" value="1-2 Minggu">
                    <label class="form-check-label text-warning" for="inlineRadio2">1-2 Minggu</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" <?php echo $permintaan->urgensi == '1-3 Bulan' ? 'checked' : '' ?> name="urgensi" id="inlineRadio3" value="1-3 Bulan">
                    <label class="form-check-label text-primary" for="inlineRadio3">1-3 Bulan</label>
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