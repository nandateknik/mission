<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('aplikasi/Permintaan_model');
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

    public function create()
    {
        $this->form_validation->set_rules('bagian', 'Bagian', 'required');
        $this->form_validation->set_rules('permintaan', 'Permintaan', 'required');
        $this->form_validation->set_rules('urgensi', 'Urgensi', 'required');

        if ($this->form_validation->run()) {
            $this->pesanSukses('Berhasil tambah data baru !');
            $this->Permintaan_model->insert();
        }

        $this->load->view('aplikasi/permintaan/create');
    }

    public function read()
    {

        $this->load->library('pagination');

        if ($this->input->post('keywoard')) {
            $data['keywoard'] = $this->input->post('keywoard');
            $this->session->set_userdata('keywoard', $data['keywoard']);
        } else {
            $data['keywoard'] = $this->session->userdata('keywoard');
        }

        $this->db->like('permintaan', $data['keywoard']);
        $this->db->from('permintaan');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 4;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);

        $data['permintaan'] = $this->Permintaan_model->get($config['per_page'], $from, $data['keywoard']);
        $this->load->view('aplikasi/permintaan/read', $data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keywoard');
        echo "
        <script>
            alert('Berhasil Update data');
        </script>
        ";
        redirect(base_url('/aplikasi/permintaan/read/'));
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('permintaan', 'Permintaan', 'required');
        $this->session->unset_userdata('pesan');

        if ($this->form_validation->run()) {
            $this->Permintaan_model->update($id);
            $this->pesanSukses('Berhasil Edit Data !');
        }

        $data['permintaan'] = $this->Permintaan_model->getById($id);
        $this->load->view('aplikasi/permintaan/edit', $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Permintaan_model->delete($id)) {
            $this->pesanSukses('Berhasil Hapus Data !');
        }
        redirect(base_url('/aplikasi/permintaan/read/'));
    }
}
    
    /* End of file Permintaan.php */
