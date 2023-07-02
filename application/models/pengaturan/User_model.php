<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function read()
    {
        return $this->db->get('user')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->db->where('id', $post['id']);
        $this->db->update('user', $post);
    }

    public function resetPW($id)
    {
        $post = array('password' => 'username');
        $this->db->where('id', $id);
        $this->db->update('user', $post);
    }

    public function active($id)
    {
        $post = array('is_active' => 1);
        $this->db->where('id', $id);
        $this->db->update('user', $post);
    }

    public function deactive($id)
    {
        $post = array('is_active' => 0);
        $this->db->where('id', $id);
        $this->db->update('user', $post);
    }
}
    
    /* End of file User_model.php */
