    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Produk_model extends CI_Model {

        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        public function insert_produk($data) {
            $this->db->insert('umkm', $data);
            return ($this->db->affected_rows() > 0) ? true : false;
        }
        public function get_approved_produk() {
            $this->db->where('status', 'disetujui');
            $query = $this->db->get('umkm'); // Pastikan nama tabel sesuai dengan tabel di database Anda
            return $query->result_array(); // Mengembalikan hasil dalam bentuk array
        }

        public function get_statuses() {
            $this->db->distinct();
            $this->db->select('status');
            $query = $this->db->get('umkm');
            return $query->result_array();
        }

        public function get_produks() {
            // Query to retrieve UMKMs data
            $query = $this->db->get('umkm');
    
            // Check if query successful
            if ($query && $query->num_rows() > 0) {
                // Return UMKMs data
                return $query->result();
            } else {
                // Handle error (e.g., return empty array or show error message)
                return array();
            }
        }

        public function update_produk($id, $data) {
            $this->db->where('id', $id);
            return $this->db->update('umkm', $data);
        }

        public function delete_produk($id) {
            $this->db->where('id', $id);
            return $this->db->delete('umkm');
        }

        public function get_all_produk() {
            $query = $this->db->get('umkm');
            return $query->result();
        }

        public function get_produk_by_id($id) {
            $query = $this->db->get_where('umkm', array('id' => $id));
            return $query->row();
        }
        public function get_produk_by_username($username) {
            // Assuming you have a 'products' table in your database
            // Replace 'products' with your actual table name if different
            $this->db->where('username', $username);
            return $this->db->get('umkm')->result();
        }

        public function get_produk_with_platform($id) {
            $this->db->select('*');
            $this->db->from('umkm');
            $this->db->join('platform', 'produk.id = platform.id', 'left');
            $this->db->where('produk.id', $id);
            $query = $this->db->get();
            return $query->row();
        }
        public function count_all_produk()
{
    return $this->db->count_all('umkm');
}
public function get_produk_report() {
    // Query untuk mengambil semua produk
    $query = $this->db->get('umkm');

    // Periksa apakah query berhasil
    if ($query && $query->num_rows() > 0) {
        // Mengembalikan data produk
        return $query->result();
    } else {
        // Handle error (misalnya, mengembalikan array kosong atau menampilkan pesan error)
        return array();
    }
}       
public function searchProducts($nama_usaha, $nama_merek_produk, $kategori_produk, $online, $offline, $agen_reseller) {
    $this->db->select('*');
    $this->db->from('umkm');
    // Filtering conditions
    if (!empty($nama_usaha)) {
        $this->db->like('nama_usaha', $nama_usaha);
    }
    if (!empty($nama_merek_produk)) {
        $this->db->like('nama_merek_produk', $nama_merek_produk);
    }
    if (!empty($kategori_produk)) {
        $this->db->like('kategori_produk', $kategori_produk);
    }
    if ($online === 'on') {
        $this->db->where('online', 'Online');
    }
    if ($offline === 'on') {
        $this->db->where('offline', 'Offline');
    }
    if ($agen_reseller === 'on') {
        $this->db->where('agen_reseller', 'Agen/Reseller');
    }

    $query = $this->db->get();
    return $query->result_array();
}

public function get_kategori_counts() {
    // Query untuk mengambil jumlah produk per kategori
    $this->db->select('kategori_produk, COUNT(*) as count');
    $this->db->from('umkm'); // Ganti nama_tabel_anda dengan nama tabel Anda
    $this->db->group_by('kategori_produk');
    
    $query = $this->db->get();
    return $query->result();
}

public function get_photo_by_id($id) {
    $this->db->select('photo');
    $this->db->where('id', $id);
    $query = $this->db->get('umkm');
    
    if ($query->num_rows() > 0) {
        $row = $query->row();
        return $row->photo;
    }
    return NULL;
} 
}
