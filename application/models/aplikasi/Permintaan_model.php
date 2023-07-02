<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan_model extends CI_Model
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
            'jam' => Date('H:i'),
            'tanggal' => Date('Y-m-d'),
            'bagian' => $post['bagian'],
            'permintaan' => $post['permintaan'],
            'status' => 'Baru',
            'urgensi' => $post['urgensi'],
            'pemohon' => $post['pemohon']
        );
        $this->db->insert('permintaan', $data);
    }

    public function get($number, $offset, $keywoard = null)
    {
        if ($keywoard) {
            $this->db->like('permintaan', $keywoard);
            $this->db->or_like('bagian', $keywoard);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('permintaan', $number, $offset)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('permintaan', ['id' => $id])->row();
    }

    public function update($id)
    {
        $post = $this->input->post();
        $data = array(
            'jam' => 'Telah Diedit ' . Date('H:i'),
            'tanggal' => Date('Y-m-d'),
            'urgensi' => $post['urgensi'],
            'bagian' => $post['bagian'],
            'permintaan' => $post['permintaan'],
        );
        $this->db->where('id', $id);
        $this->db->update('permintaan', $data);
    }

    public function delete($id)
    {
        $db = $this->db->get_where('kemajuan_rencana', ['id_rencana' => $id])->row();
        if (empty($db)) {
            $this->db->delete('rencana', array("id" => $id));
            return $this->db->affected_rows();
        } else {
            return false;
        };
    }
}

/* End of file Permintaan_model.php */
