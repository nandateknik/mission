<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('aplikasi/pengaturan_model');
        $this->load->model('dashboard_model');
        $this->load->library('form_validation');
    }

    public function pesanSukses($pesan)
    {
        $data = '
        <script>
        swal({
            title: "Berhasil!",
            text: "' . $pesan . '!",
            icon: "success",
            button: "Confirm",
        });
        </script>';
        $this->session->set_userdata('pesan', $data);
    }

    public function index()
    {
        $data['countBaru'] = $this->dashboard_model->countBaru();
        $data['countBaruPerbaikan'] = $this->dashboard_model->countBaruPerbaikan();
        $data['countPermintaan'] = $this->dashboard_model->countPermintaan();
        $data['countRencana'] = $this->dashboard_model->countRencana();

        $data['rencanaBaru'] = $this->dashboard_model->rencanaBaru();
        $data['permintaanBaru'] = $this->dashboard_model->permintaanBaru();
        $data['permintaanBelum'] = $this->dashboard_model->permintaanBelum();
        $data['rencanaBelum'] = $this->dashboard_model->rencanaBelum();


        $data['rencana'] = $this->pengaturan_model->getRencanaByStatus();
        $this->load->view('aplikasi/dashboard', $data);
    }

    public function bagian()
    {
        $this->form_validation->set_rules('bagian', 'Bagian', 'required');

        if ($this->form_validation->run()) {
            $this->pengaturan_model->insertBagian();
        }

        $this->load->view('aplikasi/pengaturan/bagian');
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(base_url(''));
    }
}

/* End of file Aplikasi.php */
