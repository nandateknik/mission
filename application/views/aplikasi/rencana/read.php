<?php
$this->load->view('templates/admin/head');
$this->load->view('templates/admin/topbar');
$this->load->view('templates/admin/sidebar');
$this->load->view('templates/admin/breadcrumb');
?>
<div class="container">
    <h3 class="text-center mb-4">RENCANA KERJA HARIAN</h3>
    <div class=" pb-3 d-flex align-items-center justify-content-between">
        <?php if ($this->session->id == 1 || $this->session->id == 2) : ?>
            <a href="<?= base_url('aplikasi/rencana/create/') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Rencana</a>
        <?php endif; ?>
        <form method="post" class=" d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" name="keywoard" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary" name="submit" type="button"><i class="fas fa-search"></i></button>
                    <a href="<?= base_url('/aplikasi/rencana/reset') ?>" class="btn btn-warning">RESET</a>
                </div>
            </div>
        </form>
    </div>
    <?php if (empty($rencana)) : ?>
        <div class="alert alert-danger" role="alert">
            Data tidak ditemukan ! Reset pencarian atau buat rencana kerja baru.
        </div>
    <?php endif; ?>

    <div class="row">
        <?php foreach ($rencana as $data) : ?>
            <div class="col-12 col-xs-12 col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mr-auto">
                                <p class=""><?= $data->bagian; ?></p>
                            </div>
                            <div>
                                <p class="badge badge-secondary"><?= $data->urgensi; ?></p>
                            </div>
                            <?php if ($this->session->id == 1) : ?>
                                <div class="pl-2">
                                    <a href="void:javascript()" class="text-secondary " data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                    <!-- Default dropleft button -->

                                    <div class="dropdown-menu">
                                        <a class="small dropdown-item" href="<?= base_url('aplikasi/rencana/edit/' . $data->id) ?>"><i class="fa fa-edit"></i> Edit</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <hr>
                        <p><?= $data->rencana; ?></p>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="small"><?= $data->tanggal; ?></p>
                            <p class="small">Status : <span class="badge  <?= $data->status == 'Selesai' ? 'badge-success' : 'badge-primary' ?> "><?= $data->status; ?></span></p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small" href="<?= base_url('aplikasi/kemajuanrencana/view/' . $data->id); ?>">Laporan Kemajuan <i class="fa fa-arrow-right"></i></a>
                        <div class="small ">
                            <?php if ($this->session->id == 1) : ?>
                                <a onclick="deleteConfirm('<?php echo site_url('aplikasi/rencana/delete/' . $data->id) ?>')" href="#!"><i class="text-danger fa fa-trash"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="text-center">
        <hr>
        <?php
        echo $this->pagination->create_links();
        ?>
    </div>
</div>
<!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/admin/footer'); ?>

<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>