<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Platform_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Load database library
        $this->load->database();
    }

    // Function to get all platforms
    public function get_all_platforms()
    {
        $query = $this->db->get('platform');
        return $query->result();
    }

    // Function to get platform by ID
    public function get_platform_by_id($id)
    {
        $query = $this->db->get_where('platform', array('id_produk' => $id));
        return $query->row();
    }

    public function get_platform_by_username($username)
{
    $query = $this->db->get_where('platform', array('username' => $username));
    return $query->row();
}

public function insert_platform($data) {
    $this->db->insert('platform', $data);
    return ($this->db->affected_rows() > 0) ? true : false;
}
    public function update_platform($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('platform', $data);
    }

    public function delete_platform($id) {
        $this->db->where('id', $id);
        return $this->db->delete('platform');
    }
    public function check_id_produk_existence($id_produk) {
        // Query to check if id_produk exists
        $this->db->where('id_produk', $id_produk);
        $query = $this->db->get('platform');

        // If id_produk exists, return true; otherwise, return false
        return $query->num_rows() > 0;
    }
    public function count_all_platforms()
{
    return $this->db->count_all('platform');
}

}
