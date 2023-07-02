<?php
$this->load->view('templates/admin/head');
$this->load->view('templates/admin/topbar');
$this->load->view('templates/admin/sidebar');
$this->load->view('templates/admin/breadcrumb');
?>

<div class="container">
  <div class=" pb-3 d-flex align-items-center justify-content-between">
    <a class="btn btn-primary" href="javascript:;" data-toggle="modal" data-target="#edit-data">
      <i class="fa fa-plus"></i> Add Menu
    </a>
  </div>
  <div class="row">
    <div class="col">
      <table class="table table-hover">
        <thead>
          <tr class="text-center">
            <th width="8%" scope="col">#</th>
            <th scope="col">Menu</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($menu as $list) : ?>
            <tr>
              <th class="text-center" scope="row"><?= $i++; ?></th>
              <td>
                <div class="row">
                  <div class="col col-sm-9">
                    <p><?= $list->menu ?></p>
                    <a href="<?= base_url('pengaturan/submenu/read/' . $list->id) ?>" class="badge badge-primary">Submenu</a>
                    <a href="<?= base_url('pengaturan/menu/edit/' . $list->id) ?>" class="badge badge-warning">Edit</a>
                    <a onclick="deleteConfirm('<?php echo site_url('pengaturan/menu/delete/' . $list->id) ?>')" href="#!" class="badge badge-danger"> Hapus</a>
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


<!-- Modal Ubah -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?php echo base_url('/pengaturan/menu/create') ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <h5 class="text-center">Tambah Menu Baru</h5>
          <hr>
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="menu">MENU</label>
            <input type="text" name="menu" id="menu" class="form-control">
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

<?= $this->session->userdata('pesan'); ?>
<?php $this->load->view('templates/admin/footer'); ?>

<script>
  function deleteConfirm(url) {
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }
</script>