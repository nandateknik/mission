<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kemajuan_permintaan_model extends CI_Model
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
            'id_permintaan' => $id,
            'jam' => Date('H:i'),
            'tanggal' => Date('Y-m-d'),
            'pelaksana' => $post['pelaksana'],
            'kemajuan' => $post['kemajuan'],
            'status' => $post['status']
        );
        $this->db->insert('kemajuan_perbaikan', $data);
    }

    public function updatestatus($id)
    {
        $post = $this->input->post();
        $data = array(
            'status' => $post['status']
        );
        $this->db->where('id', $id);
        $this->db->update('permintaan', $data);
    }

    public function get($id)
    {
        return $this->db->get_where('kemajuan_perbaikan', ['id_permintaan' => $id])->result();
    }

    public function update()
    {
        $post = $this->input->post();
        $data = array('kemajuan' => $post['kemajuan']);
        $this->db->where('id', $post['id']);
        $this->db->update('kemajuan_perbaikan', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('kemajuan_perbaikan', array("id" => $id));
    }
}
 
 /* End of file kemajuan_perbaikan_model.php */
