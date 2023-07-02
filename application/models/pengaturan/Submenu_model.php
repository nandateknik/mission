<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Submenu_model extends CI_Model
{

    public function get($id)
    {
        return $this->db->get_where('sub_menu', ['id_menu' => $id])->result();
    }

    public function insert($id)
    {
        $post = $this->input->post();

        $data = array(
            'id_menu' => $id,
            'submenu' => $post['submenu'],
            'link' => $post['link'],
            'icon' => $post['icon']
        );
        $this->db->insert('sub_menu', $data);
    }

    public function getById($id)
    {
        return $this->db->get_where('sub_menu', ['id' => $id])->row();
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->db->where('id', $id);
        $this->db->update('sub_menu', $post);
    }

    public function delete($id)
    {
        return $this->db->delete('sub_menu', array("id" => $id));
    }
}

/* End of file Submenu_model.php */
