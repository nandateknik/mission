<h1 class="mt-4"><?= ucfirst($this->uri->segment(1)) ?></h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"><a href="<?= base_url('aplikasi') ?>">Dashboard</a></li>
    <li class="breadcrumb-item active"><?= $this->uri->segment(1); ?></li>
    <li class="breadcrumb-item active"><?= $this->uri->segment(2); ?></li>

</ol>