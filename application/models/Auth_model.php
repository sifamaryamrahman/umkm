<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load database di sini jika belum dimuat secara otomatis
        // $this->load->database();
    }

    public function authenticate($username, $password) {
        // Query ke database untuk mencari pengguna dengan username yang diberikan
        $query = $this->db->get_where('users', array('username' => $username));

        // Jika pengguna ditemukan
        if ($query->num_rows() > 0) {
            $user = $query->row(); // Ambil data pengguna dari hasil query
            // Verifikasi password
            if (password_verify($password, $user->password)) {
                // Password cocok, kembalikan true
                return true;
            }
        }
        // Pengguna tidak ditemukan atau password tidak cocok, kembalikan false
        return false;
    }

}
?>
