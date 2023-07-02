<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan_model extends CI_Model
{

    public function getRencanaByStatus()
    {
        $this->db->where('status !=', 'Selesai');
        return $this->db->get('rencana')->result();
    }
}

/* End of file Pengaturan_model.php */
