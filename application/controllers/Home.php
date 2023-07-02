<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Auth_model');
        $this->load->library('form_validation');      
    }   


    public function index()
    {
        $this->load->view('home/index');
    }

    public function register()
    {
        $valid = $this->form_validation;
        $valid->set_rules('nama', 'Nama Lengkap', 'required');
        $valid->set_rules('username','username', 'trim|required|is_unique[user.username]');
        $valid->set_rules('password','Password','required|trim');

        if ($valid->run()) {
            $this->Auth_model->register();
            $this->session->set_flashdata('register', '<small style="color:green;">Berhasil pendaftaran, Hubungi admin untuk pengaktifan user :)</small>');
            redirect(base_url(''));
        } else {
            $this->session->set_flashdata('register', '<small style="color:red;">Gagal melakukan register, Periksa data kembali !</small>');
            redirect(base_url(''));
        }
        
    }

    public function login()
    {
        $valid = $this->form_validation;
        $valid->set_rules('username','Username', 'required');
        $valid->set_rules('password','Password','required|trim');

        if ($valid->run()) {
            $this->Auth_model->login();
        } else {
            $this->session->set_flashdata('register', '<small style="color:red;">Gagal login perikas username dan password kembali :)</small>');
            redirect(base_url(''));
        }
    }

}

/* End of file User.php */
