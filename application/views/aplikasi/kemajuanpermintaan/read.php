<?php
$this->load->view('templates/admin/head');
$this->load->view('templates/admin/topbar');
$this->load->view('templates/admin/sidebar');
$this->load->view('templates/admin/breadcrumb');
?>

<div class="row justify-content-center">
    <div class="col-12 col-xs-12 col-md-6 ">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h5>BAGIAN : <?= $permintaan->bagian; ?></h5>
                    <a href="<?= base_url('aplikasi/rencana/read/') ?>"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <hr>
                <h5><?= $permintaan->permintaan; ?></h5>
                <div class="text-secondary d-flex align-items-center justify-content-between">
                    <p class="small">
                        <?= $permintaan->tanggal; ?> | <?= $permintaan->jam; ?> <br>
                        Pemohon : <?= $permintaan->pemohon; ?>
                    </p>
                    <p class="small">Status : <span class="badge <?= $permintaan->status == 'Selesai' ? 'badge-success' : 'badge-primary' ?>"><?= $permintaan->status; ?></span></p>
                </div>
                <hr>
                <?php if($this->session->role == 4) :?>
                <form class="form" method="post">
                    <input type="hidden" name="pelaksana" id="pelaksana" value="<?= $this->session->nama ?>">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" autocomplete="off" name="kemajuan" placeholder="Laporan Kemajuan.." aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="Dalam Perbaikan">
                        <label class="form-check-label" for="inlineRadio1">Dalam Perbaikan</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="Selesai">
                        <label class="form-check-label" for="inlineRadio2">Selesai</label>
                    </div>
                </form>
                <?php endif?>
            </div>
            <div class="container">
                <?php if (empty($kemajuan)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Belum ada laporan kemajuan !
                    </div>
                <?php else : ?>
                    <ul class="list-unstyled p-2">
                        <?php foreach ($kemajuan as $data) : ?>
                            <li class="media m-3">
                                <img src="<?= base_url('assets/img/default.jpg') ?>" class="align-self-start mr-3" alt="..." style="width: 70px">
                                <div class="media-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p><b><?= $data->pelaksana ?></b></p>
                                        <p class="small">Status : <span class="badge  <?= $data->status == 'Selesai' ? 'badge-success' : 'badge-primary' ?>"><?= $data->status ?></span></p>
                                    </div>
                                    <?= $data->kemajuan; ?>
                                    <div class="pt-2 text-secondary d-flex align-items-center justify-content-between">
                                        <div class="small"><?= $data->tanggal ?></div>
                                        <div class="small"><?= $data->jam ?></div>
                                    </div>
                                </div>
                                <?php if ($this->session->id == 1) : ?>
                                    <a href="void:javascript()" class="p-1 small text-secondary " data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                    <!-- Default dropleft button -->

                                    <div class="dropdown-menu">
                                        <a class="small dropdown-item" href="javascript:;" data-id="<?php echo $data->id ?>" data-id_rencana="<?php echo $data->id_permintaan ?>" data-kemajuan="<?php echo $data->kemajuan ?>" data-toggle="modal" data-target="#edit-data">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a class="small dropdown-item" onclick="deleteConfirm('<?php echo base_url('aplikasi/kemajuanpermintaan/delete/' . $data->id) ?>')" href="#!"><i class="fa fa-trash"></i> Hapus</a>
                                    </div>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <br />
                <hr>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ubah -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url('/aplikasi/kemajuanpermintaan/update') ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Edit Kemajuan</label>
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" name="id_rencana" id="id_rencana">
                        <textarea name="kemajuan" id="kemajuan" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Modal Ubah -->

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
    $(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value", div.data('id'));
            modal.find('#id_rencana').attr("value", div.data('id_rencana'));
            modal.find('#kemajuan').html(div.data('kemajuan'));
        });
    });
</script>


<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>