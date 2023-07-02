<?php
$this->load->view('templates/admin/head');
$this->load->view('templates/admin/topbar');
$this->load->view('templates/admin/sidebar');
$this->load->view('templates/admin/breadcrumb');
?>

<?php if ($submenu) : ?>
  <div class="container">

    <div class=" pb-3 d-flex align-items-center justify-content-between">
      <a href="<?= base_url('pengaturan/menu') ?>" class="btn btn-secondary"><i class="fa fa-arrow-left"></i>Back</a>
      <a href="<?= base_url('pengaturan/submenu/create/' . $this->uri->segment(4)); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Submenu</a>
    </div>

    <table class="table table-hover">
      <thead>
        <tr class="text-center">
          <th width="8%" scope="col">#</th>
          <th scope="col">Menu</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($submenu as $list) : ?>
          <tr>
            <th class="text-center" scope="row"><?= $i++; ?></th>
            <td>
              <div class="row">
                <div class="col col-sm-9">
                  <p><?= $list->submenu ?></p>
                  <a href="<?= base_url('pengaturan/submenu/edit/' . $list->id) ?>" class="badge badge-warning">Edit</a>
                  <a onclick="deleteConfirm('<?php echo site_url('pengaturan/submenu/delete/' . $list->id) ?>')" href="#!" class="badge badge-danger"> Hapus</a>
                </div>
                <div class="col col-sm-3 text-right">
                  <small>STATUS : <span class="badge badge-success">ACTIVE</span></small>
                </div>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

<?php else : ?>

  .<div class="jumbotron">
    <h1 class="display-3">SUBMENU TIDAK ADA !!</h1>
    <p class="lead">Ini adalah pemberitahuan bahwa submenu yang anda minta tidak ditemukan.</p>
    <hr class="my-2">
    <p>Untuk menambahkan submenu silahkan klik tombol dibawah ini, atau kembali ke menu sebelumnya</p>
    <p class="lead">
      <a class="btn btn-secondary btn-sm" href="<?= base_url('pengaturan/menu') ?>" role="button"><i class="fa fa-arrow-left"></i> Kembali</a>
      <a class="btn btn-primary btn-sm" href="<?= base_url('pengaturan/submenu/create/' . $this->uri->segment(3)); ?>" role="button"><i class="fa fa-plus"></i> Submenu</a>
    </p>
  </div>

<?php endif; ?>

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