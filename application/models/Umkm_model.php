<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umkm_model extends CI_Model {

    public function insert_umkm($data) {
        $this->db->insert('pemilik_umkm', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_user_status($id) {
        // Query to retrieve user status based on id
        $query = $this->db->select('status')
            ->from('pemilik_umkm')
            ->where('id', $id)
            ->get();
        
        // Check if query successful
        if ($query) {
            // Get user status
            $result = $query->row();
            return ($result) ? $result->status : null;
        } else {
            // Handle error (e.g., return null or show error message)
            return null;
        }
    }
    public function get_umkm_by_id($id) {
        $query = $this->db->get_where('pemilik_umkm', array('id' => $id));
        return $query->row();
    }

    public function get_umkms() {
        // Query to retrieve UMKMs data
        $query = $this->db->get('pemilik_umkm');

        // Check if query successful
        if ($query && $query->num_rows() > 0) {
            // Return UMKMs data
            return $query->result();
        } else {
            // Handle error (e.g., return empty array or show error message)
            return array();
        }
    }

    public function update_umkm($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('pemilik_umkm', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function delete_umkm($id) {
        $this->db->where('id', $id);
        $this->db->delete('pemilik_umkm');
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function update_status($id) {
        $this->db->where('id', $id);
        $this->db->where('status', 'menunggu');
        $this->db->update('pemilik_umkm', array('status' => 'disetujui'));
        return $this->db->affected_rows() > 0;
    }

    public function get_statuses() {
        $this->db->distinct();
        $this->db->select('status');
        $query = $this->db->get('pemilik_umkm');
        return $query->result_array();
    }

    public function get_all_umkm() {
        // Retrieve all UMKM data
        $query = $this->db->get('pemilik_umkm');
    
        // Return the result as an array of UMKM objects if UMKMs exist, otherwise return an empty array
        return ($query->num_rows() > 0) ? $query->result() : array();
    }
    
    public function getUmkmNameByUsername($username)
{
    $this->db->select('pemilik_umkm.nama_pemilik, pemilik_umkm.photo, pemilik_umkm.username, pemilik_umkm.jalan, pemilik_umkm.desa_kelurahan, pemilik_umkm.kecamatan, pemilik_umkm.nomor_hp, pemilik_umkm.email'); // Menggunakan alias untuk kolom yang diambil
    $this->db->from('users');
    $this->db->join('pemilik_umkm', 'users.username = pemilik_umkm.username');
    $this->db->where('users.username', $username);
    $query = $this->db->get();
    return $query->row(); // Mengembalikan satu baris hasil
}
public function get_kecamatan_counts() {
    // Query untuk mengambil jumlah kecamatan dari tabel
    $this->db->select('kecamatan, COUNT(*) as count');
    $this->db->from('pemilik_umkm'); // Ganti nama_tabel_anda dengan nama tabel Anda
    $this->db->group_by('kecamatan');
    
    $query = $this->db->get();
    return $query->result();
}

public function get_all_usernames() {
    $query = $this->db->select('username')
                     ->from('pemilik_umkm')
                     ->get();
    return $query->result();
}


public function get_desa_counts() {
    // Query untuk mengambil jumlah pemilik per desa/kelurahan
    $this->db->select('desa_kelurahan, COUNT(*) as count');
    $this->db->from('pemilik_umkm'); // Ganti nama_tabel_anda dengan nama tabel Anda
    $this->db->group_by('desa_kelurahan');
    
    $query = $this->db->get();
    return $query->result();
}

    public function count_all_umkm()
{
    return $this->db->count_all('pemilik_umkm');
}
public function get_umkm_report() {
    // Query to retrieve UMKMs data with their statuses
    $query = $this->db->get('pemilik_umkm');

    // Check if query successful
    if ($query && $query->num_rows() > 0) {
        // Return UMKMs data with their statuses
        return $query->result();
    } else {
        // Handle error (e.g., return empty array or show error message)
        return array();
    }
}
}
?>
