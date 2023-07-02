<?php
$this->load->view('templates/admin/head');
$this->load->view('templates/admin/topbar');
$this->load->view('templates/admin/sidebar');
$this->load->view('templates/admin/breadcrumb');
?>
<?= $this->session->userdata('pesan'); ?>
<?php $this->session->unset_userdata('pesan'); ?>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>User</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($user as $list) : ?>
                    <tr>
                        <td>
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="mr-auto">
                                            <h5 class="">Informasi User #<?= $i++ ?></h5>
                                        </div>
                                        <div>
                                            <?php if ($list->is_active == 1) : ?>
                                                <p class="badge badge-primary"> Actived</p>
                                            <?php else : ?>
                                                <p class="badge badge-danger">Not Actived</p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="pl-2">
                                            <a href="void:javascript()" class="text-secondary " data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                            <!-- Default dropleft button -->

                                            <div class="dropdown-menu">
                                                <a class="small dropdown-item" href="<?= base_url('/pengaturan/user/edit/' . $list->id) ?>"><i class="fa fa-edit"></i> Edit</a>
                                                <?php if ($list->is_active == 1) : ?>
                                                    <a class="small dropdown-item" href="<?= base_url('pengaturan/user/deactive/' . $list->id) ?>"> <i class="fa fa-window-close" aria-hidden="true"></i> Deactived</a>
                                                <?php else : ?>
                                                    <a class="small dropdown-item" href="<?= base_url('pengaturan/user/active/' . $list->id) ?>"><i class="fa fa-check" aria-hidden="true"></i> Actived</a>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-xl-2 col-md-2 col-sm-3">
                                            <img width="150px" src="<?= base_url('assets/') ?>img/default.jpg" alt="" srcset="">
                                        </div>
                                        <div class="col-sm-9 mt-4">
                                            <div class="row p-1">
                                                <div class="col-sm-3 col-lg-2 col-xl-2">Nama</div>
                                                <div class="col">: <?= $list->nama; ?></div>
                                            </div>
                                            <div class="row p-1">
                                                <div class="col-sm-3 col-lg-2 col-xl-2">username</div>
                                                <div class="col">: <?= $list->username; ?></div>
                                            </div>
                                            <div class="row p-1">
                                                <div class="col-sm-3 col-lg-2 col-xl-2">Role</div>
                                                <div class="col">: <?php echo $list->role == '1' ? 'Super Admin' : '' ?> <?php echo $list->role == '2' ? 'Admin' : '' ?> <?php echo $list->role == '3' ? 'Admin Divisi Lain' : '' ?> <?php echo $list->role == '4' ? 'User Teknik' : '' ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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