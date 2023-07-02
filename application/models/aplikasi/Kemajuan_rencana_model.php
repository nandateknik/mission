<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kemajuan_rencana_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }


    public function create($id)
    {
        $post = $this->input->post();
        $data = array(
            'id_rencana' => $id,
            'jam' => Date('H:i'),
            'tanggal' => Date('Y-m-d'),
            'pelaksana' => $post['pelaksana'],
            'kemajuan' => $post['kemajuan'],
            'status' => $post['status']
        );
        $this->db->insert('kemajuan_rencana', $data);
    }

    public function updatestatus($id)
    {
        $post = $this->input->post();
        $data = array(
            'status' => $post['status']
        );
        $this->db->where('id', $id);
        $this->db->update('rencana', $data);
    }

    public function get($id)
    {
        return $this->db->get_where('kemajuan_rencana', ['id_rencana' => $id])->result();
    }

    public function update()
    {
        $post = $this->input->post();
        $data = array('kemajuan' => $post['kemajuan']);
        $this->db->where('id', $post['id']);
        $this->db->update('kemajuan_rencana', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('kemajuan_rencana', array("id" => $id));
    }
}
 
 /* End of file Kemajuan_rencana_model.php */
