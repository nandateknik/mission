<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Rencana extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('aplikasi/rencana_model');
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
        $this->form_validation->set_rules('rencana', 'Rencana', 'required');
        $this->session->unset_userdata('pesan');

        if ($this->form_validation->run()) {
            $this->rencana_model->insert();
            $this->pesanSukses('Berhasil tambah data !');
        }

        $this->load->view('aplikasi/rencana/create');
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

        $this->db->like('rencana', $data['keywoard']);
        $this->db->from('rencana');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 4;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);

        $data['rencana'] = $this->rencana_model->get($config['per_page'], $from, $data['keywoard']);
        $this->load->view('aplikasi/rencana/read', $data);
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('rencana', 'Rencana', 'required');
        $this->session->unset_userdata('pesan');

        if ($this->form_validation->run()) {
            $this->rencana_model->update($id);
            $this->pesanSukses('Berhasil Edit Data !');
        }

        $data['rencana'] = $this->rencana_model->getById($id);
        $this->load->view('aplikasi/rencana/edit', $data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keywoard');
        echo "
        <script>
            alert('Berhasil Update data');
        </script>
        ";
        redirect(base_url('/aplikasi/rencana/read/'));
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->rencana_model->delete($id)) {
            $this->pesanSukses('Berhasil Hapus Data !');
            redirect(base_url('/aplikasi/rencana/read/'));
        }
    }
}

/* End of file Rencana.php */
