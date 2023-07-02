<?php


defined('BASEPATH') or exit('No direct script access allowed');

class KemajuanPermintaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('aplikasi/Kemajuan_permintaan_model');
        $this->load->model('aplikasi/permintaan_model');
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


    public function view($id)
    {
        $this->form_validation->set_rules('kemajuan', 'Kemajuan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->session->set_userdata('id_progress', $id);

        if ($this->form_validation->run()) {
            $this->Kemajuan_permintaan_model->create($id);
            $this->Kemajuan_permintaan_model->updatestatus($id);
            $this->pesanSukses('Berhasil kirim laporan kemajuan !');
        }
        $data['kemajuan'] = $this->Kemajuan_permintaan_model->get($id);
        $data['permintaan'] = $this->permintaan_model->getById($id);
        $this->load->view('aplikasi/kemajuanpermintaan/read', $data);
    }

    public function update()
    {
        $this->form_validation->set_rules('kemajuan', 'Kemajuan', 'required');
        if ($this->form_validation->run()) {
            $this->pesanSukses('Berhasil edit laporan kemajuan !');
            $this->Kemajuan_permintaan_model->update();
            redirect(base_url('/aplikasi/kemajuanpermintaan/view/' . $this->input->post('id_rencana')));
        }
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Kemajuan_permintaan_model->delete($id)) {
            $this->pesanSukses('Berhasil Hapus Data !');
            $id_progress = $this->session->id_progress;
            redirect(base_url('/aplikasi/kemajuanpermintaan/view/' . $id_progress));
        }
    }
}

/* End of file KemajuanPermintaan.php */
