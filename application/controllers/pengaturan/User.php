<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('pengaturan/user_model');
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
        $data['user'] = $this->user_model->read();
        $this->load->view('pengaturan/user/read', $data);
    }

    public function edit($id = null)
    {
        if (empty($id)) {
            redirect(base_url('pengaturan/user'));
        }

        $data['user'] = $this->user_model->getById($id);
        $this->load->view('pengaturan/user/edit', $data);
    }

    public function update()
    {
        $validasi = $this->form_validation;
        $validasi->set_rules('nama', 'Nama', 'required');

        if ($validasi->run()) {
            $this->user_model->update();
            $this->pesanSukses('Berhasil Edit Data User !');
            redirect(base_url('pengaturan/user/edit/' . $this->input->post('id')));
        }
    }

    public function resetpw($id = null)
    {
        if (empty($id)) {
            redirect(base_url('pengaturan/user'));
        }

        $this->user_model->resetPW($id);
        $this->pesanSukses('Berhasil reset password User !');
        redirect(base_url('pengaturan/user/edit/' . $id));
    }

    public function active($id = null)
    {
        if (empty($id)) {
            redirect(base_url('pengaturan/user'));
        }

        $this->pesanSukses('Akun berhasil di aktifkan !');
        $this->user_model->active($id);
        redirect(base_url('pengaturan/user'));
    }

    public function deactive($id = null)
    {
        if (empty($id)) {
            redirect(base_url('pengaturan/user'));
        }

        $this->pesanSukses('Akun berhasil di nonaktifkan !');
        $this->user_model->deactive($id);
        redirect(base_url('pengaturan/user'));
    }

    public function profile()
    {
        $id = $this->session->id;
        $data['user'] = $this->user_model->getById($id);
        $this->load->view('pengaturan/user/profile', $data);
    }

    public function updateprofile()
    {
        $validasi = $this->form_validation;
        $validasi->set_rules('nama', 'Nama', 'required');

        if ($validasi->run()) {
            $id = $this->session->id;
            $this->user_model->update();
            $this->pesanSukses('Berhasil Edit Data User !');
            redirect(base_url('pengaturan/user/profile/' . $id));
        }
    }
}
    
    /* End of file User.php */
