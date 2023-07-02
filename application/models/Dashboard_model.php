<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public function countBaru()
    {
        $this->db->like('status', 'Baru');
        $this->db->from('rencana');
        return $this->db->count_all_results();
    }

    public function countBaruPerbaikan()
    {
        $this->db->like('status', 'Baru');
        $this->db->from('permintaan');
        return $this->db->count_all_results();
    }

    public function countRencana()
    {
        $this->db->like('status', 'Dalam Perbaikan');
        $this->db->from('rencana');
        return $this->db->count_all_results();
    }

    public function countPermintaan()
    {
        $this->db->like('status', 'Dalam Perbaikan');
        $this->db->from('permintaan');
        return $this->db->count_all_results();
    }

    public function rencanaBaru()
    {
        return $this->db->get_where('rencana', ["status" => "Baru"])->result();
    }

    public function rencanaBelum()
    {
        return $this->db->get_where('rencana', ["status" => "Dalam Perbaikan"])->result();
    }


    public function permintaanBaru()
    {
        return $this->db->get_where('permintaan', ["status" => "Baru"])->result();
    }

    public function permintaanBelum()
    {
        return $this->db->get_where('permintaan', ["status" => "Dalam Perbaikan"])->result();
    }
}
    
    /* End of file Dashboard_model.php */
