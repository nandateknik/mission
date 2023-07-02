<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function register()
    {
        $post = $this->input->post();

        $data = array(
            'nama' => $post['nama'],
            'username' => $post['username'],
            'password' => $post['password'],
            'role' => 3,
            'is_active' => 0
        );
        $this->db->insert('user', $data);
    }

    public function login()
    {
        $post = $this->input->post();
        $data = $this->db->get_where('user', ["username" => $post['username']])->row();
        $istrue = $data->password ==  $post['password'];
        $isactive = $data->is_active == 1;

        if (!$isactive) {
            $this->session->set_flashdata('register', '<small style="color:red;">Akun belum diaktifkan ! Silahkan hubungi admin.</small>');
        }

        if ($data && $istrue && $isactive) {
            $newdata = array(
                'nama'  => $data->nama,
                'id'     => $data->id,
                'role'     => $data->role,
                'login' => TRUE
            );
            $this->session->set_userdata($newdata);
            redirect(base_url('aplikasi'));
        } else {
            redirect(base_url());
        }
    }
}

/* End of file Auth_model.php */
