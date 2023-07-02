<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Submenu extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('pengaturan/submenu_model');
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

    public function read($id)
    {
        $data['submenu'] = $this->submenu_model->get($id);
        $this->load->view('pengaturan/menu/submenu/read', $data);
    }

    public function create($id)
    {
        $this->form_validation->set_rules('submenu', 'Submenu', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');

        if ($this->form_validation->run()) {
            $this->submenu_model->insert($id);
            $this->pesanSukses('Berhasil tambah  submenu !');
            redirect('pengaturan/submenu/read/' . $id);
        }

        $this->load->view('pengaturan/menu/submenu/create');
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('submenu', 'Submenu', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');

        if ($this->form_validation->run()) {
            $this->submenu_model->update($id);
            $this->pesanSukses('Berhasil Edit submenu !');
            redirect('pengaturan/submenu/read/' . $this->input->post('id_menu'));
        }

        $data['submenu'] = $this->submenu_model->getById($id);
        $this->load->view('pengaturan/menu/submenu/edit', $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->submenu_model->delete($id)) {
            $this->pesanSukses('Berhasil Hapus  submenu !');
            redirect(base_url('pengaturan/menu'));
        }
    }
}

/* End of file Submenu.php */
