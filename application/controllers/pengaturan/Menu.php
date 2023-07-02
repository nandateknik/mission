<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengaturan/menu_model');
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
        $data['menu'] = $this->menu_model->get();
        $this->load->view('pengaturan/menu/read', $data);
        $this->session->unset_userdata('pesan');
    }

    public function create()
    {
        $this->session->unset_userdata('pesan');
        $validasi = $this->form_validation;
        $validasi->set_rules('menu', 'Menu', 'required');

        if ($validasi->run()) {
            $this->menu_model->insert();
            $this->pesanSukses('Berhasil tambah data !');
        }


        redirect(base_url('pengaturan/menu'), 'refresh');
    }

    public function edit($id)
    {
        $validasi = $this->form_validation;
        $validasi->set_rules('menu', 'Menu', 'required');

        if ($validasi->run()) {
            $this->menu_model->update($id);
            $this->pesanSukses('Berhasil edit data !');
            redirect(base_url('pengaturan/menu'));
        }

        $data['menu'] = $this->menu_model->getById($id);
        $this->load->view('pengaturan/menu/edit', $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->menu_model->delete($id)) {
            $this->pesanSukses('Berhasil hapus data !');
            redirect(base_url('pengaturan/menu'));
        }
    }
}

/* End of file Menu.php */
