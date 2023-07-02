<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Rencana_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }


    public function insert()
    {
        $post = $this->input->post();
        $data = array(
            'tanggal' => Date('Y-m-d'),
            'rencana' => $post['rencana'],
            'bagian'  => $post['bagian'],
            'urgensi' => $post['urgensi'],
            'status' => 'BARU'
        );
        $this->db->insert('rencana', $data);
    }

    public function get($number, $offset, $keywoard = null)
    {
        if ($keywoard) {
            $this->db->like('rencana', $keywoard);
            $this->db->or_like('bagian', $keywoard);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('rencana', $number, $offset)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('rencana', ['id' => $id])->row();
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->db->where('id', $id);
        $this->db->update('rencana', $post);
    }

    public function delete($id)
    {
        $db = $this->db->get_where('kemajuan_rencana', ['id_rencana' => $id])->row();
        if (empty($db)) {
            $this->db->delete('rencana', array("id" => $id));
            return $this->db->affected_rows();

        } else {
            return false;
        }
    }
}

/* End of file Rencana_model.php */
