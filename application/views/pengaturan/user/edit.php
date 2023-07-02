<?php
$this->load->view('templates/admin/head');
$this->load->view('templates/admin/topbar');
$this->load->view('templates/admin/sidebar');
$this->load->view('templates/admin/breadcrumb');
?>
<?= $this->session->userdata('pesan'); ?>
<?php $this->session->unset_userdata('pesan'); ?>
<div class="row justify-content-center">
    <div class="col-12 col-xs-12 col-md-6 ">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="text-center">INFORMASI USER</h5>
                <div class="row">
                    <div class="col-lg-3 col-xl-3 col-md-12 col-sm-12 text-center">
                        <img width="150px" src="<?= base_url('assets/') ?>img/default.jpg" alt="" srcset="">
                    </div>
                    <div class="col-sm-12 col-lg-9 mt-4">
                        <div class="row p-1">
                            <div class="col-2 col-sm-3 col-lg-3 col-xl-2">Nama</div>
                            <div class="col">: <?= $user->nama; ?></div>
                        </div>
                        <div class="row p-1">
                            <div class="col-2 col-sm-3 col-lg-3 col-xl-2">username</div>
                            <div class="col">: <?= $user->username; ?></div>
                        </div>
                        <div class="row p-1">
                            <div class="col-2 col-sm-3 col-lg-3 col-xl-2">Role</div>
                            <div class="col">: <?php echo $user->role == '1' ? 'Super Admin' : '' ?> <?php echo $user->role == '2' ? 'Admin' : '' ?> <?php echo $user->role == '3' ? 'Admin Divisi Lain' : '' ?><?php echo $user->role == '4' ? 'User Teknik' : '' ?></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <a class="btn btn-primary" href="javascript:;" data-toggle="modal" data-target="#edit-data">
                        <i class="fa fa-edit"></i> Edit Profile
                    </a>
                    <a class="btn btn-warning" href="javascript:;" data-toggle="modal" data-target="#reset-data">
                        <i class="fa fa-eye"></i> Reset Password
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ubah -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url('/pengaturan/user/update') ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <h5 class="text-center">Edit Profile User</h5>
                    <hr>
                    <input type="hidden" name="id" value="<?= $user->id ?>" id="id">
                    <div class="form-group">
                        <label for="nama">NAMA</label>
                        <input type="text" value="<?= $user->nama ?>" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username">username</label>
                        <input disabled type="text" value="<?= $user->username ?>" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="role">ROLE</label>
                        <select class="form-control" name="role" id="role">
                            <option <?php echo $user->role == '1' ? 'selected' : '' ?> value="1">Super Admin</option>
                            <option <?php echo $user->role == '2' ? 'selected' : '' ?> value="2">Admin Teknik</option>
                            <option <?php echo $user->role == '3' ? 'selected' : '' ?> value="3">Admin Divisi Lain</option>
                            <option <?php echo $user->role == '4' ? 'selected' : '' ?> value="4">User Teknik</option>
                        </select>
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

<?php $this->load->view('templates/admin/footer'); ?>


<!-- Logout Delete Confirmation-->
<div class="modal fade" id="reset-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Password akan direset menjadi default "username". apa kamu yakin ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-delete" class="btn btn-warning" href="<?= base_url('pengaturan/user/resetpw/' . $user->id) ?>">Reset</a>
            </div>
        </div>
    </div>
</div>