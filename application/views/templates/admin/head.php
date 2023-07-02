<?php if (!$this->session->login) 
{
    redirect(base_url());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="aplikasi rencana kerja harian berbasis website" />
    <meta name="author" content="Nanda Krisbianto" />
    <title>Mission - <?= ucfirst($this->uri->segment(1)); ?> <?= ucfirst($this->uri->segment(2)); ?></title>
    <link href="<?= base_url('assets/admin/') ?>css/styles.css" rel="stylesheet" />
    <link href="<?= base_url('assets/admin/') ?>css/custom.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/admin/') ?>js/sweetalert.js"></script>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
</head>