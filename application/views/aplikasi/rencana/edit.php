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
                <h5 class="text-center">FORM EDIT MISSION</h5>
                <hr>
                <div class="form-group">
                    <label for="tanggal">TANGGAL</label>
                    <input type="date" name="tanggal" id="tanggal" value="<?= $rencana->tanggal ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="bagian">BAGIAN</label>
                    <select class="form-control" name="bagian" id="bagian">
                        <option <?php echo $rencana->bagian == 'Elektrik' ? 'selected' : '' ?> value="Elektrik">Elektrik</option>
                        <option <?php echo $rencana->bagian == 'Mekanik' ? 'selected' : '' ?> value="Mekanik">Mekanik</option>
                        <option <?php echo $rencana->bagian == 'Operator' ? 'selected' : '' ?> value="Operator">Operator</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="urgensi">URGENSI</label>
                    <select class="form-control" name="urgensi" id="urgensi">
                        <option <?php echo $rencana->urgensi == '1-3 Hari' ? 'selected' : '' ?> value="1-3 Hari">1-3 Hari</option>
                        <option <?php echo $rencana->urgensi == '1-2 Minggu' ? 'selected' : '' ?> value="1-2 Minggu">1-2 Minggu</option>
                        <option <?php echo $rencana->urgensi == '1-3 Bulan' ? 'selected' : '' ?> value="1-3 Bulan">1-3 Bulan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="rencana">RENCANA</label>
                    <textarea name="rencana" id="rencana" class="form-control" cols="30" rows="10"><?= $rencana->rencana ?></textarea>
                </div>
                <div class="form-group">
                    <label for="urgensi">STATUS</label>
                    <select class="form-control" name="status" id="status">
                        <option <?php echo $rencana->status == 'Baru' ? 'selected' : '' ?> value="Baru">Baru</option>
                        <option <?php echo $rencana->status == 'Dalam perbaikan' ? 'selected' : '' ?> value="Dalam perbaikan">Dalam perbaikan</option>
                        <option <?php echo $rencana->status == 'Selesai' ? 'selected' : '' ?> value="Selesai">Selesai</option>
                    </select>
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