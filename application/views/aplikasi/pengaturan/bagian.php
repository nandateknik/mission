<?php
$this->load->view('templates/admin/head');
$this->load->view('templates/admin/topbar');
$this->load->view('templates/admin/sidebar');
$this->load->view('templates/admin/breadcrumb');
?>

    <div class="container">

    <div class="menu p-4">
      <a href="<?=base_url('menu')?>" class="btn btn-secondary"><i class="fa fa-arrow-left"></i>Back</a>
      <a href="<?=base_url('submenu/create/'.$this->uri->segment(3));?>" class="btn btn-primary"><i class="fa fa-plus"></i> Submenu</a>
    </div>
        <table class="table table-hover">
            <thead>
               <tr class="text-center">
                  <th width="8%" scope="col">#</th>
                  <th scope="col">Menu</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1;?>
                <?php foreach ($submenu as $list ) : ?>
                <tr>
                    <th class="text-center" scope="row"><?=$i++;?></th>
                    <td>
                        <div class="row">
                            <div class="col col-sm-9">
                                <p><?=$list->submenu?></p>
                                <a href="<?=base_url('submenu/edit/'.$list->id)?>" class="badge badge-warning">Edit</a>
                                <a onclick="deleteConfirm('<?php echo site_url('submenu/delete/'.$list->id) ?>')"
    href="#!" class="badge badge-danger"> Hapus</a>
                            </div>
                            <div class="col col-sm-3 text-right">
                                <small>STATUS : <span class="badge badge-success">ACTIVE</span></small>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>


<?php $this->load->view('templates/admin/footer');?>


<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>
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
