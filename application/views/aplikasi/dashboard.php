<?php
$this->load->view('templates/admin/head');
$this->load->view('templates/admin/topbar');
$this->load->view('templates/admin/sidebar');
$this->load->view('templates/admin/breadcrumb');

?>



<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Rencana Baru [ <?= $countBaru; ?> ]</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="javascript:;" data-toggle="modal" data-target="#reset-data">Lihat Rencana Kerja</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">Permintaan Baru [ <?= $countBaruPerbaikan; ?> ]</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="javascript:;" data-toggle="modal" data-target="#permintaan-data">Lihat Permintaan Perbaikan</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Rencana Tidak Selesai [ <?= $countRencana; ?> ]</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="javascript:;" data-toggle="modal" data-target="#rencana-data-belum">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Permintaan Tidak Selesai [ <?= $countPermintaan; ?> ]</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="javascript:;" data-toggle="modal" data-target="#permintaan-data-belum">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-chart-area mr-1"></i>
        Grafik Penyelesaian Pekerjaan
    </div>
    <div class="card-body"><canvas id="myAreaChart" width="100%" height="25"></canvas></div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data rencana belum diselesaikan
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Rencana</th>
                        <th>Menu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($rencana as $list) : ?>
                        <tr>
                            <td width="50"><?= $i++; ?></td>
                            <td width="120"><?= $list->tanggal; ?></td>
                            <td><?= $list->rencana; ?></td>
                            <td width="120">
                                <a href="<?= base_url('aplikasi/kemajuanrencana/view/' . $list->id) ?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Progress
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>

<!-- Logout Delete Confirmation-->
<div class="modal fade  bd-example-modal-lg" id="reset-data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rencana Pekerjaan Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="container mt-3">
                <div class="table-responsive">
                    <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th>Tanggal</th>
                                <th>Rencana</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($rencanaBaru as $list1) : ?>
                                <tr>
                                    <td width="50"><?= $i++; ?></td>
                                    <td width="120"><?= $list1->tanggal; ?></td>
                                    <td><?= $list1->rencana; ?></td>
                                    <td width="120">
                                        <a href="<?= base_url('aplikasi/kemajuanrencana/view/' . $list1->id) ?>">
                                            <i class="fa fa-eye" aria-hidden="true"></i> Progress
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Logout Delete Confirmation-->
<div class="modal fade  bd-example-modal-lg" id="rencana-data-belum" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rencana Pekerjaan Belum Diselesaikan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="container mt-3">
                <div class="table-responsive">
                    <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th>Tanggal</th>
                                <th>Rencana</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($rencanaBelum as $list1) : ?>
                                <tr>
                                    <td width="50"><?= $i++; ?></td>
                                    <td width="120"><?= $list1->tanggal; ?></td>
                                    <td><?= $list1->rencana; ?></td>
                                    <td width="120">
                                        <a href="<?= base_url('aplikasi/kemajuanrencana/view/' . $list1->id) ?>">
                                            <i class="fa fa-eye" aria-hidden="true"></i> Progress
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Logout Delete Confirmation-->
<div class="modal fade  bd-example-modal-lg" id="permintaan-data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Permintaan Perbaikan Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="container mt-3">
                <div class="table-responsive">
                    <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th>Tanggal</th>
                                <th>Rencana</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($permintaanBaru as $list2) : ?>
                                <tr>
                                    <td width="50"><?= $i++; ?></td>
                                    <td width="120"><?= $list2->tanggal; ?></td>
                                    <td><?= $list2->permintaan; ?></td>
                                    <td width="120">
                                        <a href="<?= base_url('aplikasi/kemajuanpermintaan/view/' . $list2->id) ?>">
                                            <i class="fa fa-eye" aria-hidden="true"></i> Progress
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade  bd-example-modal-lg" id="permintaan-data-belum" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Permintaan Perbaikan Belum Selesai</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="container mt-3">
                <div class="table-responsive">
                    <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th>Tanggal</th>
                                <th>Rencana</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($permintaanBelum as $list2) : ?>
                                <tr>
                                    <td width="50"><?= $i++; ?></td>
                                    <td width="120"><?= $list2->tanggal; ?></td>
                                    <td><?= $list2->permintaan; ?></td>
                                    <td width="120">
                                        <a href="<?= base_url('aplikasi/kemajuanpermintaan/view/' . $list2->id) ?>">
                                            <i class="fa fa-eye" aria-hidden="true"></i> Progress
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('templates/admin/footer'); ?>