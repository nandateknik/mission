<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public function get()
    {
        return $this->db->get('menu')->result();    
    }

    public function insert()
    {
        $post = $this->input->post();
        $this->db->insert('menu', $post);
    }

    public function getById($id)
    {
        return $this->db->get_where('menu',['id'=>$id])->row();
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->db->where('id', $id);
        $this->db->update('menu', $post);
    }

    public function delete($id)
    {
        return $this->db->delete('menu', array("id" => $id));
    }

}

/* End of file Menu_model.php */
